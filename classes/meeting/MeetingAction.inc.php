<?php

define ('STATUS_NEW', 0);
define ('STATUS_FINAL', 1);
define ('STATUS_RESCHEDULED', 2);
define ('STATUS_CANCELLED', 3);

import('classes.meeting.MeetingAttendance');

class MeetingAction extends Action {

	/**
	 * Constructor.
	 */
	function MeetingAction() {
		parent::Action();
	}
	

	function cancelMeeting($meetingId, $user = null){
		if ($user == null) $user =& Request::getUser();

		$meetingDao =& DAORegistry::getDAO('MeetingDAO');
		$meeting =& $meetingDao->getMeetingById($meetingId);
		
		/*Only the author can cancel the meeting*/
		if ($meeting->getUploader() == $user->getSecretaryCommitteeId()) {
			if (!HookRegistry::call('Action::cancelMeeting', array(&$meetingId))) {
				//$meetingDao->cancelMeeting($meetingId);
				$meetingDao->updateStatus($meetingId, STATUS_CANCELLED);
			} return $meetingId;		
		}
		return false;
	}
	
	/*
	 * Save the meeting
	 * @param $meetingId (int)
	 * @param $selectedSubmissions (array)
	 * @param $meetingDate (datetime)
	 * @param $meetingLength (int)
	 * @param $investigator (bool): specify if the investigator(s) is/are invited
	 */
	
	function saveMeeting($meetingId, $sectionDecisionsId, $meetingDate, $meetingLength, $investigator, $location = null, $final = null){
	
		$user =& Request::getUser();
				
		$journal =& Request::getJournal();
		$journalId = $journal->getId();
		//$selectedSubmissions =& $selectedSubmissions;
		$meetingDao =& DAORegistry::getDAO('MeetingDAO');
		$meetingSectionDecisionDao =& DAORegistry::getDAO('MeetingSectionDecisionDAO');
		$meetingAttendanceDao =& DAORegistry::getDAO('MeetingAttendanceDAO');		
		
		/**
		 * Parse date
		* */
		if ($meetingDate != null) {
			$meetingDateParts = explode('-', $meetingDate);
			$tmp = explode(' ', $meetingDateParts[2]);
			$meetingTime = $tmp[1];
			$meetingTimeMarker = $tmp[2];
			$meetingTimeParts = explode(':', $meetingTime);
			$hour = intval($meetingTimeParts[0]);
			
			if(strcasecmp($meetingTimeMarker, 'pm') == 0) {
				if($hour != 12) $hour += 12;
			}
			else {
				if($hour == 12) $hour = 0;
			}
			$meetingDate = mktime($hour, (int)$meetingTimeParts[1], 0, (int)$meetingDateParts[1], (int)$meetingDateParts[2], (int)$meetingDateParts[0]);
		}
		/**
		 * Create new meeting
		 */
		$isNew = true;
		if($meetingId == null) {
			if($meetingId == 0) {
				$meetingId = $meetingDao->createMeeting($user->getSecretaryCommitteeId(), $meetingDate, $meetingLength, $location, $investigator, 0);
				
				$ercReviewersDao =& DAORegistry::getDAO('ErcReviewersDAO');
				
				// Insert Attendance of the external reviewers & Investigators
				$articleDao =& DAORegistry::getDAO('ArticleDAO');
				$sectionDecisionDao =& DAORegistry::getDAO('SectionDecisionDAO');
				foreach ($sectionDecisionsId as $sectionDecisionId){
					
					// For external reviewers
					$sectionDecision =& $sectionDecisionDao->getSectionDecision($sectionDecisionId);
					$reviewAssignments =& $sectionDecision->getReviewAssignments();
					foreach ($reviewAssignments as $reviewAssignment) {
						$isReviewer = $ercReviewersDao->ercReviewerExists($journalId, $user->getSecretaryCommitteeId(), $reviewAssignment->getReviewerId());
						$willAttend = $meetingAttendanceDao->attendanceExists($meetingId, $reviewAssignment->getReviewerId());
						if (!$isReviewer && !$willAttend) {
							$meetingAttendanceDao->insertMeetingAttendance($meetingId, $reviewAssignment->getReviewerId(), MEETING_EXTERNAL_REVIEWER);
						}
					}
					
					// For investigator
					if ($investigator == 1)	{
						$article =& $articleDao->getArticle($sectionDecision->getArticleId());
						if (!$meetingAttendanceDao->attendanceExists($meetingId, $article->getUserId())) $meetingAttendanceDao->insertMeetingAttendance($meetingId, $article->getUserId(), MEETING_INVESTIGATOR);
					}			
				}
				
				// Insert Attendance of the reviewers
				$reviewers =& $ercReviewersDao->getReviewersBySectionId($journalId, $user->getSecretaryCommitteeId());						
				foreach($reviewers as $reviewer) if (!$meetingAttendanceDao->attendanceExists($meetingId, $reviewer->getId())) $meetingAttendanceDao->insertMeetingAttendance($meetingId, $reviewer->getId(), MEETING_ERC_MEMBER);
				
				
				// Insert Attendance of the secretary(ies)
				$sectionEditorsDao =& DAORegistry::getDAO('SectionEditorsDAO');
				$secretaries =& $sectionEditorsDao->getEditorsBySectionId($journalId, $user->getSecretaryCommitteeId());
				foreach($secretaries as $secretary) {
					if (!$meetingAttendanceDao->attendanceExists($meetingId, $secretary->getId())) {
						if ($secretary->getId() == $user->getId()) $meetingAttendanceDao->insertMeetingAttendance($meetingId,$secretary->getId(), MEETING_SECRETARY, MEETING_REPLY_ATTENDING);
						else $meetingAttendanceDao->insertMeetingAttendance($meetingId,$secretary->getId(), MEETING_SECRETARY);
					}
				}
			}
		/**
		 * Update an existing meeting
		 */
		}else{ 
			 $isNew = false;
			 $meetingSectionDecisionDao->deleteMeetingSectionDecisionsByMeetingId($meetingId);
			 $meeting = $meetingDao->getMeetingById($meetingId);
			 //check if new meeting date is equal to old meeting date
			 $oldDate = 0;
			 $diff = $meetingDate - strtotime($meeting->getDate());
			 if($diff != 0) $oldDate = $meeting->getDate();
			 
			 $oldLength = 0;
			 if (($meeting->getLength()) != $meetingLength) $oldLength = $meeting->getLength();
			 
			 $oldLocation = (string)'';
			 if (($meeting->getLocation()) != $location) $oldLocation = $meeting->getLocation();

			 $oldInvestigator = 2;
			 if (($meeting->getInvestigator()) != $investigator) $oldInvestigator = $meeting->getInvestigator();
			 			 			 
			 $meetingSectionDecisionDao->deleteMeetingSectionDecisionsByMeetingId($meetingId);
		}

		/**
		 * Store submissions to be discussed
		 */
		if (count($sectionDecisionsId) > 0) {
			for ($i=0;$i<count($sectionDecisionsId);$i++) {
				$meetingSectionDecisionDao->insertMeetingSectionDecision($meetingId,$sectionDecisionsId[$i]);
			}
		}
		
		if ($isNew) {
			if ($final) {
				$meetingDao->updateStatus($meetingId, STATUS_FINAL);
				Request::redirect(null, null, 'notifyUsersMeeting', array($meetingId, 'MEETING_FINAL'));
			} else {
				Request::redirect(null, null, 'notifyUsersMeeting', array($meetingId, 'MEETING_NEW'));
			}
		} elseif (($oldDate != 0) || ($oldLength != 0) || ($oldLocation != '')){
			//reset reply of all reviewers
			$meetingAttendanceDao->resetReplyOfUsers($meeting);
			
			// Set attending for this user
			$meetingAttendance =& $meetingAttendanceDao->getMeetingAttendance($meeting->getId(), $user->getId());
			$meetingAttendance->setIsAttending(1);
			$meetingAttendanceDao->updateReplyOfAttendance($meetingAttendance);
			
			//update meeting date 
			$meeting->setDate($meetingDate);
			$meeting->setLength($meetingLength);
			$meeting->setLocation($location);
			$meeting->setInvestigator($investigator);
			$meetingDao->updateMeeting($meeting);
			
			if ($final) {
				$meetingDao->updateStatus($meetingId, STATUS_FINAL);
				Request::redirect(null, null, 'notifyUsersMeeting', array($meetingId, 'MEETING_FINAL'));
			} else {
				$meetingDao->updateStatus($meetingId, STATUS_RESCHEDULED);
				Request::redirect(null, null, 'notifyUsersMeeting', array($meetingId, 'MEETING_CHANGE'));			
			}
		}
		
		return $meetingId;
	}
	
	/**
	 * Notify reviewers of new meeting set by section editor
	 * Added by ayveemallare 7/12/2011
	 * Last modified by EL on February 26th 2013
	 * And moved from SectionEditorAction to here
	 */

	function notifyReviewersMeeting($meeting, $informationType, $reviewerAttendances, $sectionDecisionsId, $send = false) {
		$journal =& Request::getJournal();
		$user =& Request::getUser();
		$sectionDecisionDao =& DAORegistry::getDAO('SectionDecisionDAO');

                // EL on February 26th 2013
		// Definition of the variable
		$submissions = (string)'';
		$num=1;

		foreach($sectionDecisionsId as $sectionDecisionId) {
			$sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
			$submissions .= $num.". '".$sectionDecision->getLocalizedProposalTitle()."' by ".$sectionDecision->getAuthorString()."\n";
			$num++;
		}

		$userDao =& DAORegistry::getDAO('UserDAO');
		$reviewers = array();
		foreach($reviewerAttendances as $reviewerAttendance) {
			$reviewer = $userDao->getUser($reviewerAttendance->getUserId());
			array_push($reviewers, $reviewer);
		}

		$reviewerAccessKeysEnabled = $journal->getSetting('reviewerAccessKeysEnabled');

		$preventAddressChanges = $reviewerAccessKeysEnabled;

		import('classes.mail.MailTemplate');
		$email = new MailTemplate($informationType);

		if($preventAddressChanges) {
			$email->setAddressFieldsEnabled(false);
		}

		if($send && !$email->hasErrors()) {
			HookRegistry::call('MeetingAction::notifyReviewersMeeting', array(&$meeting, &$informationType, &$reviewers, &$submissions, &$email));
			// EL on February 26th 2013
			// Replaced "reviewerAccessKyesEnabled" by "reviewerAccessKeysEnabled"	
			if($reviewerAccessKeysEnabled) {
				import('lib.pkp.classes.security.AccessKeyManager');
				import('pages.reviewer.ReviewerHandler');
				$accessKeyManager = new AccessKeyManager();
			}
				
			if($preventAddressChanges) {
				// Ensure that this messages goes to the reviewers, and the reviewers ONLY.
				$email->clearAllRecipients();
				foreach($reviewers as $reviewer) {
					$email->addRecipient($reviewer->getEmail(), $reviewer->getFullName());
				}
			}
			$email->send();
			return true;
		} else {
			if(!Request::getUserVar('continued') || $preventAddressChanges) {
				foreach($reviewers as $reviewer) {
					$email->addRecipient($reviewer->getEmail(), $reviewer->getFullName());
				}
			}
			
			// CC the secretary(ies) of the committee
			$sectionEditorsDao =& DAORegistry::getDAO('SectionEditorsDAO');
			$secretaries =& $sectionEditorsDao->getEditorsBySectionId($journal->getId(), $user->getSecretaryCommitteeId());
			foreach ($secretaries as $secretary) $email->addCc($secretary->getEmail(), $secretary->getFullName());
			
							
			if(!Request::getUserVar('continued')) {
				$dateLocation = (string)'';
				if($meeting->getDate() != null) {
					$dateLocation .= 'Date: '.strftime('%B %d, %Y %I:%M %p', strtotime($meeting->getDate()))."\n";
				}
				if($meeting->getLength() != null) {
					$dateLocation .= 'Length: '.$meeting->getLength()."mn\n";
				}
				if($meeting->getLocation() != null) {
					$dateLocation .= 'Location: '.$meeting->getLocation()."\n";
				}
				$replyUrl = Request::url(null, 'reviewer', 'viewMeeting', $meeting->getId()
					, $reviewerAccessKeysEnabled?array('key' => 'ACCESS_KEY'):array()
				);
				$sectionDao =& DAORegistry::getDAO('SectionDAO');
				$erc =& $sectionDao->getSection($meeting->getUploader());
				$paramArray = array(
					'ercTitle' => $erc->getLocalizedTitle(),
					'ercAbbrev' => $erc->getLocalizedAbbrev(),
					'submissions' => $submissions,
					'dateLocation' => $dateLocation,
					'replyUrl' => $replyUrl,
					'secretaryName' => $user->getFullName(),
					'secretaryFunctions' => $user->getErcFunction($meeting->getUploader())
				);
				$email->assignParams($paramArray);
			}
			$email->displayEditForm(Request::url(null, null, 'notifyUsersMeeting', array($meeting->getId(), $informationType)));
			return false;
		}
		return true;
	}

	/**
	 * Notify an investigator of a new meeting set by section editor
	 * Added by EL on February 28th 2013
	 * And moved from SectionEditorAction to here
	 */

	function notifyExternalReviewerMeeting($meeting, $informationType, $externalReviewerAttendance, $attendanceIncrementNumber, $sectionDecisionsId, $send = false) {
		$journal =& Request::getJournal();
		$user =& Request::getUser();
		$sectionDecisionDao =& DAORegistry::getDAO('SectionDecisionDAO');
		$num=1;
		$submissions = (string)'';

		foreach($sectionDecisionsId as $sectionDecisionId) {
			$sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
			$reviewAssignments =& $sectionDecision->getReviewAssignments();
			foreach ($reviewAssignments as $reviewAssignment) {
				if ($reviewAssignment->getReviewerId() == $externalReviewerAttendance->getUserId()){
					$submissions .= $num.". '".$sectionDecision->getLocalizedProposalTitle()."' by ".$sectionDecision->getAuthorString()."\n";
					$num++;
				}
			}
		}

		$reviewerAccessKeysEnabled = $journal->getSetting('reviewerAccessKeysEnabled');

		$preventAddressChanges = $reviewerAccessKeysEnabled;
		
		$userDao =& DAORegistry::getDAO('UserDAO');
		$extReviewer =& $userDao->getUser($externalReviewerAttendance->getUserId());

		import('classes.mail.MailTemplate');
		$email = new MailTemplate($informationType);
		
		if($preventAddressChanges) {
			$email->setAddressFieldsEnabled(false);
		}
		
		if($send && !$email->hasErrors()) {
			HookRegistry::call('MeetingAction::notifyExternalReviewerMeeting', array(&$meeting, &$informationType, &$extReviewer, $attendanceIncrementNumber, &$submissions, &$email));

			if($reviewerAccessKeysEnabled) {
				import('lib.pkp.classes.security.AccessKeyManager');
				import('pages.reviewer.ReviewerHandler');
				$accessKeyManager = new AccessKeyManager();
			}
				
			if($preventAddressChanges) {
				// Ensure that this messages goes to the reviewers, and the reviewers ONLY.
				$email->clearAllRecipients();
				$email->addRecipient($extReviewer->getEmail(), $extReviewer->getFullName());
			}
			
			$email->send();
			return true;
		} else {
			if(!Request::getUserVar('continued') || $preventAddressChanges) {
				$email->addRecipient($extReviewer->getEmail(), $extReviewer->getFullName());
			}
			
			// CC the secretary(ies) of the committee
			$sectionEditorsDao =& DAORegistry::getDAO('SectionEditorsDAO');
			$secretaries =& $sectionEditorsDao->getEditorsBySectionId($journal->getId(), $user->getSecretaryCommitteeId());
			foreach ($secretaries as $secretary) $email->addCc($secretary->getEmail(), $secretary->getFullName());
			
							
			if(!Request::getUserVar('continued')) {
				$dateLocation = (string)'';
				if($meeting->getDate() != null) {
					$dateLocation .= 'Date: '.strftime('%B %d, %Y %I:%M %p', strtotime($meeting->getDate()))."\n";
				}
				if($meeting->getLength() != null) {
					$dateLocation .= 'Length: '.$meeting->getLength()."mn\n";
				}
				if($meeting->getLocation() != null) {
					$dateLocation .= 'Location: '.$meeting->getLocation()."\n";
				}
				$dateLocation .= 'Number of proposal(s) to review: '.count($sectionDecisionsId)."\n";
				
				$replyUrl = Request::url(null, 'reviewer', 'viewMeeting', $meeting->getId(), $reviewerAccessKeysEnabled?array('key' => 'ACCESS_KEY'):array());
				
				$sectionDao =& DAORegistry::getDAO('SectionDAO');
				$erc =& $sectionDao->getSection($meeting->getUploader());
				$paramArray = array(
					'ercTitle' => $erc->getLocalizedTitle(),
					'extReviewerFullName' => $extReviewer->getFullName(),
					'submissions' => $submissions,
					'dateLocation' => $dateLocation,
					'replyUrl' => $replyUrl,
					'secretaryName' => $user->getFullName(),
					'secretaryFunctions' => $user->getErcFunction($meeting->getUploader())
				);
				$email->assignParams($paramArray);
			}
			$email->displayEditForm(Request::url(null, null, 'notifyExternalReviewersMeeting', array($meeting->getId(), $attendanceIncrementNumber, $informationType)));
			return false;
		}
		return true;
	}
	
	/**
	 * Notify an investigator of a new meeting set by section editor
	 * Added by EL on February 28th 2013
	 * And moved from SectionEditorAction to here
	 */

	function notifyInvestigatorMeeting($meeting, $informationType, $investigatorAttendance, $attendanceIncrementNumber, $sectionDecisionsId, $send = false) {
		$journal =& Request::getJournal();
		$user =& Request::getUser();
		$articleDao =& DAORegistry::getDAO('ArticleDAO');
		$sectionDecisionDao =& DAORegistry::getDAO('SectionDecisionDAO');
		$num=1;
		$submissions = (string)'';

		foreach($sectionDecisionsId as $sectionDecisionId) {
			$sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
			$submission = $articleDao->getArticle($sectionDecision->getArticleId(), $journal->getId(), false);
			$abstract = $submission->getLocalizedAbstract();
			if ($submission->getUserId() == $investigatorAttendance->getUserId()) {
				$submissions .= $num.". '".$abstract->getScientificTitle()."'\n";
				$num++;
			}
		}

		$userDao =& DAORegistry::getDAO('UserDAO');
		$investigator =& $userDao->getUser($investigatorAttendance->getUserId());

		import('classes.mail.MailTemplate');
		$email = new MailTemplate($informationType);

		if($send && !$email->hasErrors()) {
			HookRegistry::call('MeetingAction::notifyInvestigatorMeeting', array(&$meeting, &$informationType, &$investigator, $attendanceIncrementNumber, &$submissions, &$email));
			$email->send();
			return true;
		} else {
			if(!Request::getUserVar('continued')) {
				// Add email of the submitter
				$email->addRecipient($investigator->getEmail(), $investigator->getFullName());

				// Add emails of the investigator(s) if different from the submitter
				foreach($sectionDecisionsId as $sectionDecisionId) {
                                        $sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
					$submission = $articleDao->getArticle($sectionDecision->getArticleId(), $journal->getId(), false);
					if ($submission->getUserId() == $investigatorAttendance->getUserId()) {
						$authors = $submission->getAuthors();
						foreach ($authors as $author) {
							if ($author->getEmail() != $investigator->getEmail()) $email->addRecipient($author->getEmail(), $author->getFirstName().' '.$author->getLastName());	
						}
					}
				}
			}
			
			// CC the secretary(ies) of the committee
			$sectionEditorsDao =& DAORegistry::getDAO('SectionEditorsDAO');
			$secretaries =& $sectionEditorsDao->getEditorsBySectionId($journal->getId(), $user->getSecretaryCommitteeId());
			foreach ($secretaries as $secretary) $email->addCc($secretary->getEmail(), $secretary->getFullName());
			
							
			if(!Request::getUserVar('continued')) {
				$dateLocation = (string)'';
				if($meeting->getDate() != null) {
					$dateLocation .= 'Date: '.strftime('%B %d, %Y %I:%M %p', strtotime($meeting->getDate()))."\n";
				}
				if($meeting->getLength() != null) {
					$dateLocation .= 'Length: '.$meeting->getLength()."mn\n";
				}
				if($meeting->getLocation() != null) {
					$dateLocation .= 'Location: '.$meeting->getLocation()."\n";
				}
				$dateLocation .= 'Number of proposal(s) to review: '.count($sectionDecisionsId)."\n";
				
				$replyUrl = (string)'';
				$investigatorFullName = (string)$investigator->getFullName();
				$urlFirst = true;
				foreach($sectionDecisionsId as $sectionDecisionId) {
                                        $sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
                                        $submission = $articleDao->getArticle($sectionDecision->getArticleId(), $journal->getId(), false);
                                        if ($urlFirst) { 
						$replyUrl .= Request::url(null, 'author', 'submissionReview', $sectionDecision->getArticleId());
						$urlFirst = false;
					} else $replyUrl .= 'Or:\n'.Request::url(null, 'author', 'submissionReview', $sectionDecision->getArticleId());
					// Add name of the investigators if different from submitter
					if ($submission->getUserId() == $investigatorAttendance->getUserId()) {
						$authors = $submission->getAuthors();
						foreach ($authors as $author) {
							if (($author->getFirstName() != $investigator->getFirstName()) || ($author->getLastName() != $investigator->getLastName())) $investigatorFullName .= ', '.$author->getFirstName().' '.$author->getLastName();
						}
					}					
				}
				
				
				
				$sectionDao =& DAORegistry::getDAO('SectionDAO');
				$erc =& $sectionDao->getSection($meeting->getUploader());
				$paramArray = array(
					'ercTitle' => $erc->getLocalizedTitle(),
					'investigatorFullName' => $investigatorFullName,
					'submissions' => $submissions,
					'dateLocation' => $dateLocation,
					'replyUrl' => $replyUrl,
					'secretaryName' => $user->getFullName(),
					'secretaryFunctions' => $user->getErcFunction($meeting->getUploader())
				);
				$email->assignParams($paramArray);
			}
			// EL on February 26th 2013
			// Replaced submissionsIds by submissionIds
			// + moved the paramters as additional parameters
			$email->displayEditForm(Request::url(null, null, 'notifyInvestigatorsMeeting', array($meeting->getId(), $attendanceIncrementNumber, $informationType)));
			return false;
		}
		return true;
	}

	/**
	 * Remind reviewers of a meeting
	 * Added by ayveemallare 7/12/2011
	 * Moved from sectionEditorAction by EL on March 5th
	 */

	function remindUserMeeting($meeting, $addresseeId, $sectionDecisionsId, $send = false) {
		$journal =& Request::getJournal();
		$user = & Request::getUser();
		$sectionDecisionDao =& DAORegistry::getDAO('SectionDecisionDAO');
		
                $submissions = (string)'';
		$num=1;
		foreach($sectionDecisionsId as $sectionDecisionId) {
			$sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
			$submissions .= $num.". '".$sectionDecision->getLocalizedProposalTitle()."' by ".$sectionDecision->getAuthorString(true)."\n";
			$num++;
		}
		$userDao =& DAORegistry::getDAO('UserDAO');
		$addressee = $userDao->getUser($addresseeId);

		$reviewerAccessKeysEnabled = $journal->getSetting('reviewerAccessKeysEnabled');

		$preventAddressChanges = $reviewerAccessKeysEnabled;

		import('classes.mail.MailTemplate');
		$email = new MailTemplate('MEETING_REMIND');

		if($preventAddressChanges) {
			$email->setAddressFieldsEnabled(false);
		}
		if($send && !$email->hasErrors()) {
			HookRegistry::call('MeetingAction::remindUserMeeting', array(&$meeting, &$addressee, &$submissions, &$email));

			// EL on February 26th 2013
			// Replaced "reviewerAccessKyesEnabled" by "reviewerAccessKeysEnabled"			
			if($reviewerAccessKeysEnabled) {
				import('lib.pkp.classes.security.AccessKeyManager');
				import('pages.reviewer.ReviewerHandler');
				$accessKeyManager = new AccessKeyManager();
			}
				
			if($preventAddressChanges) {
				// Ensure that this messages goes to the reviewers, and the reviewers ONLY.
				$email->clearAllRecipients();
				$email->addRecipient($addressee->getEmail(), $addressee->getFullName());
			}
			$email->send();
				
			$meetingAttendanceDao =& DAORegistry::getDAO('MeetingAttendanceDAO');
			$meetingAttendanceDao->updateDateReminded(Core::getCurrentDate(), $addresseeId, $meeting);
			return true;
		} else {
			if(!Request::getUserVar('continued') || $preventAddressChanges) {
				$email->addRecipient($addressee->getEmail(), $addressee->getFullName());
			}
			if(!Request::getUserVar('continued')) {
				$dateLocation = (string)'';
				if($meeting->getDate() != null) {
					$dateLocation .= 'Date: '.strftime('%B %d, %Y %I:%M %p', strtotime($meeting->getDate()))."\n";
				}
				if($meeting->getLength() != null) {
					$dateLocation .= 'Length: '.$meeting->getLength()."mn\n";
				}
				if($meeting->getLocation() != null) {
					$dateLocation .= 'Location: '.$meeting->getLocation()."\n";
				}
				$dateLocation .= 'Number of proposal(s) to review: '.count($sectionDecisionsId)."\n";
				
				$type = $meetingAttendanceDao->getTypeOfUser($meeting->getId(), $addressee->getId());
				
				$replyUrl = (string)'';
				if ($type == MEETING_INVESTIGATOR) {
					$urlFirst = true;
					foreach ($sectionDecisionsId as $sectionDecisionId){
                                                $sectionDecision = $sectionDecisionDao->getSectionDecision($sectionDecisionId);
						if ($urlFirst) {
							$replyUrl .= Request::url(null, 'author', 'submissionReview', $sectionDecision->getArticleId());
							$urlFirst = false;
						} else $replyUrl .= 'Or:\n'.Request::url(null, 'author', 'submissionReview', $sectionDecision->getArticleId());					
					}
				} elseif ($type == MEETING_SECRETARY) {
					$replyUrl = Request::url(null, 'sectionEditor', 'viewMeeting', $meeting->getId());
				} elseif (($type == MEETING_EXTERNAL_REVIEWER) || ($type == MEETING_ERC_MEMBER)) {
					$replyUrl = Request::url(null, 'reviewer', 'viewMeeting', $meeting->getId(), $reviewerAccessKeysEnabled?array('key' => 'ACCESS_KEY'):array());
				} else return false;
				
				$replyUrl = Request::url(null, 'reviewer', 'viewMeeting', $meeting->getId()
					// EL on february 26th 2013
					// Undefined - replaced "reviewerAccessKeyEnabled" by "reviewerAccessKeysEnabled"
					, $reviewerAccessKeysEnabled?array('key' => 'ACCESS_KEY'):array()
				);
				
				$sectionDao =& DAORegistry::getDAO('SectionDAO');
				$erc =& $sectionDao->getSection($meeting->getUploader());
				
				$paramArray = array(
					'ercTitle' => $erc->getLocalizedTitle(),
					'addresseeFullName' => $addressee->getFullName(),
					'submissions' => $submissions,
					'dateLocation' => $dateLocation,
					'replyUrl' => $replyUrl,
					'secretaryName' => $user->getFullName(),
					'secretaryFunctions' => $user->getErcFunction($meeting->getUploader())
				);
				$email->assignParams($paramArray);
			}
			// EL on February 26th 2013
			// Replaced submissionsIds by submissionIds
			// + moved the paramters as additional parameters
			$email->displayEditForm(Request::url(null, null, 'remindUserMeeting', array($meeting->getId(), $addresseeId)));
			return false;
		}
		return true;
	}
			
	function setMeetingFinal($meetingId, $user=null){
		if ($user == null) $user =& Request::getUser();

		$meetingDao =& DAORegistry::getDAO('MeetingDAO');
		$meeting =& $meetingDao->getMeetingById($meetingId);

		/*Only the secretary can set the meeting final*/
		if ($meeting->getUploader() == $user->getSecretaryCommitteeId()) {
			if (!HookRegistry::call('Action::setMeetingFinal', array(&$meetingId))) {
				$meetingDao->updateStatus($meetingId, STATUS_FINAL);
			}
			return $meetingId;	
		}
		return false;
	}

	/**
	 * Added by EL on February 27th 2013
	 * Reply the attendance of the user
	 */
	function replyAttendanceForUser($meetingId, $userId, $attendance){
		$meetingAttendanceDao =& DAORegistry::getDAO('MeetingAttendanceDAO');

		$meetingAttendance = $meetingAttendanceDao->getMeetingAttendance($meetingId, $userId);

		$meetingAttendance->setIsAttending($attendance);
		
		$meetingAttendanceDao->updateReplyOfAttendance($meetingAttendance);
		return true;	
	}	
}
