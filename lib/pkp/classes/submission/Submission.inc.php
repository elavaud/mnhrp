<?php

/**
 * @defgroup submission
 */

/**
 * @file classes/submission/Submission.inc.php
 *
 * Copyright (c) 2000-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class Submission
 * @ingroup submission
 *
 * @brief Submission class.
 */
 
define('PROPOSAL_STATUS_SUBMITTED',1);		//NEW
define('PROPOSAL_STATUS_RETURNED',2);		//INCOMPLETE
define('PROPOSAL_STATUS_CHECKED',3);		//COMPLETE
define('PROPOSAL_STATUS_FULL_REVIEW',4);	//ASSIGNED FOR A FULL REVIEW
define('PROPOSAL_STATUS_EXEMPTED',5);		//EXEMPTED FROM REVIEW
define('PROPOSAL_STATUS_REVIEWED',6);		//DECISION AFTER NORMAL/EXPEDITED REVIEW
define('PROPOSAL_STATUS_EXPEDITED',7);		//ASSIGNED FOR EXPEDITED REVIEW

define('PROPOSAL_STATUS_DRAFT',8);              //Replaces STATUS_INCOMPLETE
define('PROPOSAL_STATUS_WITHDRAWN',9); 		//Special tag, not part of lifecycle
define('PROPOSAL_STATUS_ARCHIVED',10); 		//To archive Not Approved and Exempt From Review
define('PROPOSAL_STATUS_COMPLETED',11); 
define('PROPOSAL_STATUS_RESUBMITTED',12); 	//Special tag for Revise and resubmit proposals that were resubmitted

class Submission extends DataObject {
	/** @var array Authors of this submission */
	var $authors;
	
	var $riskAssessment;
        
	var $proposalDetails;

        var $abstracts;
			
	/** @var array IDs of Authors removed from this submission */
	var $removedAuthors;
	
        var $removedAbstracts;
        
	/** @var DAO for article */
	var $articleDAO;
		
	/**
	 * Constructor.
	 */
	function Submission() {
		parent::DataObject();
		$this->authors = array();
		$this->removedAuthors = array();
		$this->abstracts = array();
		$this->removedAbstracts = array();
                $this->articleDAO =& DAORegistry::getDAO('ArticleDAO');        
	}

	/**
	 * Returns the association type of this submission
	 * @return integer one of the ASSOC_TYPE_* constants
	 */
	function getAssocType() {
		// Must be implemented by sub-classes.
		assert(false);
	}

	/**
	 * Get a piece of data for this object, localized to the current
	 * locale if possible.
	 * @param $key string
	 * @return mixed
	 */
	function &getLocalizedData($key) {
		$localePrecedence = array(Locale::getLocale(), $this->getLocale());
		foreach ($localePrecedence as $locale) {
			$value =& $this->getData($key, $locale);
			if (!empty($value)) return $value;
			unset($value);
		}

		// Fallback: Get the first available piece of data.
		$data =& $this->getData($key, null);
		if (!empty($data)) return $data[array_shift(array_keys($data))];

		// No data available; return null.
		unset($data);
		$data = null;
		return $data;
	}

	//
	// Get/set methods
	//

	/**
	 * Add an author.
	 * @param $author Author
	 */
	function addAuthor($author) {
		if ($author->getSequence() == null) {
			$author->setSequence(count($this->authors) + 1);
		}
		array_push($this->authors, $author);
	}

        /**
	 * Add an abstract.
	 * @param $abstract Abstract
	 */
	function addAbstract($abstract) {
		$this->abstracts[$abstract->getLocale()] = $abstract;
	}

	/**
	 * Remove an author.
	 * @param $authorId ID of the author to remove
	 * @return boolean author was removed
	 */
	function removeAuthor($authorId) {
		$found = false;

		if ($authorId != 0) {
			// FIXME maintain a hash of ID to author for quicker get/remove
			$authors = array();
			for ($i=0, $count=count($this->authors); $i < $count; $i++) {
				if ($this->authors[$i]->getId() == $authorId) {
					array_push($this->removedAuthors, $authorId);
					$found = true;
				} else {
					array_push($authors, $this->authors[$i]);
				}
			}
			$this->authors = $authors;
		}
		return $found;
	}

        /**
	 * Remove an abstract.
	 * @param $abstractId ID of the abstract to remove
	 * @return boolean abstract was removed
	 */
	function removeAbstract($abstractId) {
                $found = false;
		if ($abstractId != 0) {
                    $abstracts = array();
                    foreach ($this->abstracts as $abstract) {
                        if ($abstract->getAbstractId() == $abstractId) {
                            array_push($this->removedAbstracts, $abstract->getLocale());
                            $found = true;
                        }
                        else array_push($abstracts[$abstract->getLocale()], $abstract);       
                    }
                    $this->abstracts = $abstracts;
		}
		return $found;
	}

	/**
	 * Return string of author names, separated by the specified token
	 * @param $lastOnly boolean return list of lastnames only (default false)
	 * @param $separator string separator for names (default comma+space)
	 * @return string
	 */
	function getAuthorString($lastOnly = false, $separator = ', ') {
		$str = '';
		foreach ($this->authors as $a) {
			if (!empty($str)) {
				$str .= $separator;
			}
			$str .= $lastOnly ? $a->getLastName() : $a->getFullName();
		}
		return $str;
	}

	/**
	 * Return a list of author email addresses.
	 * @return array
	 */
	function getAuthorEmails() {
		import('lib.pkp.classes.mail.Mail');
		$returner = array();
		foreach ($this->authors as $a) {
			$returner[] = Mail::encodeDisplayName($a->getFullName()) . ' <' . $a->getEmail() . '>';
		}
		return $returner;
	}

	/**
	 * Return first author
	 * @param $lastOnly boolean return lastname only (default false)
	 * @return string
	 */
	function getFirstAuthor($lastOnly = false) {
		$author = $this->authors[0];
		if (!$author) return null;
		return $lastOnly ? $author->getLastName() : $author->getFullName();
	}


	//
	// Get/set methods
	//

	/**
	 * Get all authors of this submission.
	 * @return array Authors
	 */
	function &getAuthors() {
		return $this->authors;
	}

	/**
	 * Get all abstracts for this submission.
	 * @return array Authors
	 */
	function &getAbstracts() {
		return $this->abstracts;
	}

        /**
	 * Get the risk assessment of this submission.
	 * @return object riskAssessment
	 */
	function &getRiskAssessment() {
		return $this->riskAssessment;
	}

        /**
	 * Get the proposal details of this submission.
	 * @return object proposal details
	 */
	function &getProposalDetails() {
		return $this->proposalDetails;
	}
        
	/**
	 * Get a specific author of this submission.
	 * @param $authorId int
	 * @return object Author
	 */
	function &getAuthor($authorId) {
		$author = null;

		if ($authorId != 0) {
			for ($i=0, $count=count($this->authors); $i < $count && $author == null; $i++) {
				if ($this->authors[$i]->getId() == $authorId) {
					$author =& $this->authors[$i];
				}
			}
		}
		return $author;
	}
        
        /**
	 * Get a specific abstract of this submission by locale.
	 * @param $locale string
	 * @return object Abstract
	 */
	function &getAbstractByLocale($locale) {
                $abstractToReturn = null;
                foreach ($this->abstracts as $abstract)
                    if ($abstract->getLocale() == $locale) $abstractToReturn = $abstract;
		return $abstractToReturn;
	}

        
        /**
	 * Get localized abstract. If no abstract on the current locale, try the primary locale, if not takes any.
	 * @param $locale string
	 * @return object Abstract
	 */
	function &getLocalizedAbstract() {
                $locale = Locale::getLocale();
                $abstract = $this->getAbstractByLocale($locale);
                if (!$abstract){
                    $primaryLocale = Locale::getPrimaryLocale();
                    if ($locale != $primaryLocale) $abstract = $this->getAbstractByLocale($primaryLocale);
                    if (!$abstract) {
                        $journal = Request::getJournal();
                        $supportedLocales = $journal->getSetting('supportedLocales');
                        foreach ($supportedLocales as $supportedLocale) {
                            if (!$abstract) $abstract = $this->getAbstractByLocale($supportedLocale);
                        }
                    }
                }
                return $abstract;
	}
        
        
	/**
	 * Get the IDs of all authors removed from this submission.
	 * @return array int
	 */
	function &getRemovedAuthors() {
		return $this->removedAuthors;
	}

        /**
	 * Get the IDs of all abstracts removed from this submission.
	 * @return array int
	 */
	function &getRemovedAbstracts() {
		return $this->removedAbstracts;
	}

	/**
	 * Set authors of this submission.
	 * @param $authors array Authors
	 */
	function setAuthors($authors) {
		return $this->authors = $authors;
	}

        /**
	 * Set abstracts of this submission.
	 * @param $abstracts array Abstracts
	 */
	function setAbstracts($abstracts) {
		return $this->abstracts = $abstracts;
	}

	/**
	 * Set risk assessment of this submission.
	 * @param $riskAssessment object riskAssessment
	 */
	function setRiskAssessment($riskAssessment) {
		return $this->riskAssessment = $riskAssessment;
	}

	/**
	 * Set proposal details of this submission.
	 * @param $proposalDetails object proposalDetails
	 */
	function setProposalDetails($proposalDetails) {
		return $this->proposalDetails = $proposalDetails;
	}
        
	/**
	 * Get user ID of the submitter.
	 * @return int
	 */
	function getUserId() {
		return $this->getData('userId');
	}

	/**
	 * Set user ID of the submitter.
	 * @param $userId int
	 */
	function setUserId($userId) {
		return $this->setData('userId', $userId);
	}

	/**
	 * Return the user of the submitter.
	 * @return User
	 */
	function getUser() {
		$userDao =& DAORegistry::getDAO('UserDAO');
		return $userDao->getUser($this->getUserId(), true);
	}

	/**
	 * Get the locale of the submission.
	 * @return string
	 */
	function getLocale() {
		return $this->getData('locale');
	}

	/**
	 * Set the locale of the submission.
	 * @param $locale string
	 */
	function setLocale($locale) {
		return $this->setData('locale', $locale);
	}

	/**
	 * Return the localized discipline
	 * @return string
	 */
	function getLocalizedDiscipline() {
		return $this->getLocalizedData('discipline');
	}

	/**
	 * Get discipline
	 * @param $locale
	 * @return string
	 */
	function getDiscipline($locale) {
		return $this->getData('discipline', $locale);
	}

	/**
	 * Set discipline
	 * @param $discipline string
	 * @param $locale
	 */
	function setDiscipline($discipline, $locale) {
		return $this->setData('discipline', $discipline, $locale);
	}

	/**
	 * Return the localized subject classification
	 * @return string
	 */
	function getLocalizedSubjectClass() {
		return $this->getLocalizedData('subjectClass');
	}

	/**
	 * Get subject classification.
	 * @param $locale
	 * @return string
	 */
	function getSubjectClass($locale) {
		return $this->getData('subjectClass', $locale);
	}

	/**
	 * Set subject classification.
	 * @param $subjectClass string
	 * @param $locale
	 */
	function setSubjectClass($subjectClass, $locale) {
		return $this->setData('subjectClass', $subjectClass, $locale);
	}

	/**
	 * Return the localized subject
	 * @return string
	 */
	function getLocalizedSubject() {
		return $this->getLocalizedData('subject');
	}

	/**
	 * Get subject.
	 * @param $locale
	 * @return string
	 */
	function getSubject($locale) {
		return $this->getData('subject', $locale);
	}

	/**
	 * Set subject.
	 * @param $subject string
	 * @param $locale
	 */
	function setSubject($subject, $locale) {
		return $this->setData('subject', $subject, $locale);
	}

	/**
	 * Return the localized geographical coverage
	 * @return string
	 */
	function getLocalizedCoverageGeo() {
		return $this->getLocalizedData('coverageGeo');
	}

	/**
	 * Get geographical coverage.
	 * @param $locale
	 * @return string
	 */
	function getCoverageGeo($locale) {
		return $this->getData('coverageGeo', $locale);
	}

	/**
	 * Set geographical coverage.
	 * @param $coverageGeo string
	 * @param $locale
	 */
	function setCoverageGeo($coverageGeo, $locale) {
		return $this->setData('coverageGeo', $coverageGeo, $locale);
	}

	/**
	 * Return the localized chronological coverage
	 * @return string
	 */
	function getLocalizedCoverageChron() {
		return $this->getLocalizedData('coverageChron');
	}

	/**
	 * Get chronological coverage.
	 * @param $locale
	 * @return string
	 */
	function getCoverageChron($locale) {
		return $this->getData('coverageChron', $locale);
	}

	/**
	 * Set chronological coverage.
	 * @param $coverageChron string
	 * @param $locale
	 */
	function setCoverageChron($coverageChron, $locale) {
		return $this->setData('coverageChron', $coverageChron, $locale);
	}

	/**
	 * Return the localized sample coverage
	 * @return string
	 */
	function getLocalizedCoverageSample() {
		return $this->getLocalizedData('coverageSample');
	}

	/**
	 * Get research sample coverage.
	 * @param $locale
	 * @return string
	 */
	function getCoverageSample($locale) {
		return $this->getData('coverageSample', $locale);
	}

	/**
	 * Set geographical coverage.
	 * @param $coverageSample string
	 * @param $locale
	 */
	function setCoverageSample($coverageSample, $locale) {
		return $this->setData('coverageSample', $coverageSample, $locale);
	}

	/**
	 * Return the localized type (method/approach)
	 * @return string
	 */
	function getLocalizedType() {
		return $this->getLocalizedData('type');
	}

	/**
	 * Get type (method/approach).
	 * @param $locale
	 * @return string
	 */
	function getType($locale) {
		return $this->getData('type', $locale);
	}

	/**
	 * Set type (method/approach).
	 * @param $type string
	 * @param $locale
	 */
	function setType($type, $locale) {
		return $this->setData('type', $type, $locale);
	}

	/**
	 * Get language.
	 * @return string
	 */
	function getLanguage() {
		return $this->getData('language');
	}

	/**
	 * Set language.
	 * @param $language string
	 */
	function setLanguage($language) {
		return $this->setData('language', $language);
	}

	/**
	 * Return the localized sponsor
	 * @return string
	 */
	function getLocalizedSponsor() {
		return $this->getLocalizedData('sponsor');
	}

	/**
	 * Get sponsor.
	 * @param $locale
	 * @return string
	 */
	function getSponsor($locale) {
		return $this->getData('sponsor', $locale);
	}

	/**
	 * Set sponsor.
	 * @param $sponsor string
	 * @param $locale
	 */
	function setSponsor($sponsor, $locale) {
		return $this->setData('sponsor', $sponsor, $locale);
	}

	/**
	 * Get citations.
	 * @return string
	 */
	function getCitations() {
		return $this->getData('citations');
	}

	/**
	 * Set citations.
	 * @param $citations string
	 */
	function setCitations($citations) {
		return $this->setData('citations', $citations);
	}

	/**
	 * Get the localized cover filename
	 * @return string
	 */
	function getLocalizedFileName() {
		return $this->getLocalizedData('fileName');
	}

	/**
	 * get file name
	 * @param $locale string
	 * @return string
	 */
	function getFileName($locale) {
		return $this->getData('fileName', $locale);
	}

	/**
	 * set file name
	 * @param $fileName string
	 * @param $locale string
	 */
	function setFileName($fileName, $locale) {
		return $this->setData('fileName', $fileName, $locale);
	}

	/**
	 * Get the localized submission cover width
	 * @return string
	 */
	function getLocalizedWidth() {
		return $this->getLocalizedData('width');
	}

	/**
	 * get width of cover page image
	 * @param $locale string
	 * @return string
	 */
	function getWidth($locale) {
		return $this->getData('width', $locale);
	}

	/**
	 * set width of cover page image
	 * @param $locale string
	 * @param $width int
	 */
	function setWidth($width, $locale) {
		return $this->setData('width', $width, $locale);
	}

	/**
	 * Get the localized submission cover height
	 * @return string
	 */
	function getLocalizedHeight() {
		return $this->getLocalizedData('height');
	}

	/**
	 * get height of cover page image
	 * @param $locale string
	 * @return string
	 */
	function getHeight($locale) {
		return $this->getData('height', $locale);
	}

	/**
	 * set height of cover page image
	 * @param $locale string
	 * @param $height int
	 */
	function setHeight($height, $locale) {
		return $this->setData('height', $height, $locale);
	}

	/**
	 * Get the localized cover filename on the uploader's computer
	 * @return string
	 */
	function getLocalizedOriginalFileName() {
		return $this->getLocalizedData('originalFileName');
	}

	/**
	 * get original file name
	 * @param $locale string
	 * @return string
	 */
	function getOriginalFileName($locale) {
		return $this->getData('originalFileName', $locale);
	}

	/**
	 * set original file name
	 * @param $originalFileName string
	 * @param $locale string
	 */
	function setOriginalFileName($originalFileName, $locale) {
		return $this->setData('originalFileName', $originalFileName, $locale);
	}

	/**
	 * Get the localized cover alternate text
	 * @return string
	 */
	function getLocalizedCoverPageAltText() {
		return $this->getLocalizedData('coverPageAltText');
	}

	/**
	 * get cover page alternate text
	 * @param $locale string
	 * @return string
	 */
	function getCoverPageAltText($locale) {
		return $this->getData('coverPageAltText', $locale);
	}

	/**
	 * set cover page alternate text
	 * @param $coverPageAltText string
	 * @param $locale string
	 */
	function setCoverPageAltText($coverPageAltText, $locale) {
		return $this->setData('coverPageAltText', $coverPageAltText, $locale);
	}

	/**
	 * Get the flag indicating whether or not to show
	 * a cover page.
	 * @return string
	 */
	function getLocalizedShowCoverPage() {
		return $this->getLocalizedData('showCoverPage');
	}

	/**
	 * get show cover page
	 * @param $locale string
	 * @return int
	 */
	function getShowCoverPage($locale) {
		return $this->getData('showCoverPage', $locale);
	}

	/**
	 * set show cover page
	 * @param $showCoverPage int
	 * @param $locale string
	 */
	function setShowCoverPage($showCoverPage, $locale) {
		return $this->setData('showCoverPage', $showCoverPage, $locale);
	}

	/**
	 * get hide cover page thumbnail in Toc
	 * @param $locale string
	 * @return int
	 */
	function getHideCoverPageToc($locale) {
		return $this->getData('hideCoverPageToc', $locale);
	}

	/**
	 * set hide cover page thumbnail in Toc
	 * @param $hideCoverPageToc int
	 * @param $locale string
	 */
	function setHideCoverPageToc($hideCoverPageToc, $locale) {
		return $this->setData('hideCoverPageToc', $hideCoverPageToc, $locale);
	}

	/**
	 * get hide cover page in abstract view
	 * @param $locale string
	 * @return int
	 */
	function getHideCoverPageAbstract($locale) {
		return $this->getData('hideCoverPageAbstract', $locale);
	}

	/**
	 * set hide cover page in abstract view
	 * @param $hideCoverPageAbstract int
	 * @param $locale string
	 */
	function setHideCoverPageAbstract($hideCoverPageAbstract, $locale) {
		return $this->setData('hideCoverPageAbstract', $hideCoverPageAbstract, $locale);
	}

	/**
	 * Get localized hide cover page in abstract view
	 */
	function getLocalizedHideCoverPageAbstract() {
		return $this->getLocalizedData('hideCoverPageAbstract');
	}

	/**
	 * Get submission date.
	 * @return date
	 */
	function getDateSubmitted() {
		return $this->getData('dateSubmitted');
	}

	/**
	 * Set submission date.
	 * @param $dateSubmitted date
	 */
	function setDateSubmitted($dateSubmitted) {
		return $this->setData('dateSubmitted', $dateSubmitted);
	}

	/**
	 * Get the date of the last status modification.
	 * @return date
	 */
	function getDateStatusModified() {
		return $this->getData('dateStatusModified');
	}

	/**
	 * Set the date of the last status modification.
	 * @param $dateModified date
	 */
	function setDateStatusModified($dateModified) {
		return $this->setData('dateStatusModified', $dateModified);
	}

	/**
	 * Get the date of the last modification.
	 * @return date
	 */
	function getLastModified() {
		return $this->getData('lastModified');
	}

	/**
	 * Set the date of the last modification.
	 * @param $dateModified date
	 */
	function setLastModified($dateModified) {
		return $this->setData('lastModified', $dateModified);
	}

	/**
	 * Stamp the date of the last modification to the current time.
	 */
	function stampModified() {
		return $this->setLastModified(Core::getCurrentDate());
	}

	/**
	 * Stamp the date of the last status modification to the current time.
	 */
	function stampStatusModified() {
		return $this->setDateStatusModified(Core::getCurrentDate());
	}

	/**
	 * Get submission status.
	 * @return int
	 */
	function getStatus() {
		return $this->getData('status');
	}

	/**
	 * Set submission status.
	 * @param $status int
	 */
	function setStatus($status) {
		return $this->setData('status', $status);
	}

	/**
	 * Get a map for status constant to locale key.
	 * @return array
	 */
	function &getStatusMap() {
		static $statusMap;
		if (!isset($statusMap)) {
			$statusMap = array(
				STATUS_ARCHIVED => 'submissions.archived',
				STATUS_QUEUED => 'submissions.queued',
				STATUS_PUBLISHED => 'submissions.published',
				STATUS_DECLINED => 'submissions.declined',
				STATUS_QUEUED_UNASSIGNED => 'submissions.queuedUnassigned',
				STATUS_QUEUED_REVIEW => 'submissions.queuedReview',
				STATUS_QUEUED_EDITING => 'submissions.queuedEditing',
				STATUS_INCOMPLETE => 'submissions.incomplete'
			);
		}
		return $statusMap;
	}

	/**
	 * Get a locale key for the paper's current status.
	 * @return string
	 */
	function getStatusKey() {
		$statusMap =& $this->getStatusMap();
		return $statusMap[$this->getStatus()];
	}

	/**
	 * Get submission progress (most recently completed submission step).
	 * @return int
	 */
	function getSubmissionProgress() {
		return $this->getData('submissionProgress');
	}

	/**
	 * Set submission progress.
	 * @param $submissionProgress int
	 */
	function setSubmissionProgress($submissionProgress) {
		return $this->setData('submissionProgress', $submissionProgress);
	}

	/**
	 * Get submission file id.
	 * @return int
	 */
	function getSubmissionFileId() {
		return $this->getData('submissionFileId');
	}

	/**
	 * Set submission file id.
	 * @param $submissionFileId int
	 */
	function setSubmissionFileId($submissionFileId) {
		return $this->setData('submissionFileId', $submissionFileId);
	}

	/**
	 * Get revised file id.
	 * @return int
	 */
	function getRevisedFileId() {
		return $this->getData('revisedFileId');
	}

	/**
	 * Set revised file id.
	 * @param $revisedFileId int
	 */
	function setRevisedFileId($revisedFileId) {
		return $this->setData('revisedFileId', $revisedFileId);
	}

	/**
	 * Get review file id.
	 * @return int
	 */
	function getReviewFileId() {
		return $this->getData('reviewFileId');
	}

	/**
	 * Set review file id.
	 * @param $reviewFileId int
	 */
	function setReviewFileId($reviewFileId) {
		return $this->setData('reviewFileId', $reviewFileId);
	}

	/**
	 * get pages
	 * @return string
	 */
	function getPages() {
		return $this->getData('pages');
	}

	/**
	 * set pages
	 * @param $pages string
	 */
	function setPages($pages) {
		return $this->setData('pages',$pages);
	}

	/**
	 * Return submission RT comments status.
	 * @return int
	 */
	function getCommentsStatus() {
		return $this->getData('commentsStatus');
	}

	/**
	 * Set submission RT comments status.
	 * @param $commentsStatus boolean
	 */
	function setCommentsStatus($commentsStatus) {
		return $this->setData('commentsStatus', $commentsStatus);
	}

        /**
	 * Get "localized" funds required (if applicable).
	 * @return string
	 */
	function getLocalizedFundsRequired() {
		return $this->getLocalizedData('fundsRequired');
	}

	/**
	 * Get funds required.
	 * @param $locale
	 * @return string
	 */
	function getFundsRequired($locale) {
		return $this->getData('fundsRequired', $locale);
	}

	/**
	 * Set funds required.
	 * @param $fundsRequired string
	 * @param $locale
	 */
	function setFundsRequired($fundsRequired, $locale) {
		return $this->setData('fundsRequired', $fundsRequired, $locale);
	}


    /**
	 * Get "localized" selected Currency (if applicable).
	 * @return string
	 */
	function getLocalizedSelectedCurrency() {
		return $this->getLocalizedData('selectedCurrency');
	}

	/**
	 * Get selected currency.
	 * @param $locale
	 * @return string
	 */
	function getSelectedCurrency($locale) {
		return $this->getData('selectedCurrency', $locale);
	}

	/**
	 * Set selected Currency.
	 * @param $selectedCurrency string
	 * @param $locale
	 */
	function setSelectedCurrency($selectedCurrency, $locale) {
		return $this->setData('selectedCurrency', $selectedCurrency, $locale);
	}
	

	/***********************************************
	 *
	 * Proposal status getters and setters and locale key methods
	 * Added by Gay Figueroa
	 * Last Update: 5/3/2011
	 *
	************************************************/

	function getProposalStatus() {
		return $this->getData('proposalStatus');
	}

	function setProposalStatus($proposalStatus) {
		return $this->setData('proposalStatus', $proposalStatus);
	}

	/**
	 * Get a map for proposal status constant to locale key.
	 * @return array
	 */
	function &getProposalStatusMap() {
		static $proposalStatusMap;
		if (!isset($proposalStatusMap)) {
			$proposalStatusMap = array(
				PROPOSAL_STATUS_SUBMITTED => 'submission.status.submitted',
				PROPOSAL_STATUS_RETURNED => 'submission.status.incomplete',
				PROPOSAL_STATUS_CHECKED => 'submission.status.complete',
				PROPOSAL_STATUS_EXEMPTED => 'submission.status.exempted',
				PROPOSAL_STATUS_FULL_REVIEW => 'submission.status.fullReview',
				PROPOSAL_STATUS_EXPEDITED => 'submission.status.expeditedReview',
				PROPOSAL_STATUS_REVIEWED => 'submission.status.reviewed',
				PROPOSAL_STATUS_DRAFT => 'submission.status.draft',
				PROPOSAL_STATUS_WITHDRAWN => 'submission.status.withdrawn',
				PROPOSAL_STATUS_ARCHIVED => 'submissions.proposal.archived',
				PROPOSAL_STATUS_COMPLETED => 'submission.status.completed',
				PROPOSAL_STATUS_RESUBMITTED => 'submission.status.resubmitted'
				);
		}
		return $proposalStatusMap;
	}
	
	/**
	 * Get a locale ke for the submission status
	 * @param $submissionStatus
	 */
	function getProposalStatusKey($submissionStatus = 0) {
		$submissionStatus = $submissionStatus > 0 ? $submissionStatus : $this->getProposalStatus(); 
		$proposalStatusMap =& $this->getProposalStatusMap();
		return $proposalStatusMap[$submissionStatus];
	}

        
    /**
	 * Get "localized" Proposal ID (if applicable).
	 * @return string
	 */
	function getLocalizedProposalId() {
		return $this->getLocalizedData('proposalId');
	}

	/**
	 * Get Proposal ID.
	 * @param $locale
	 * @return string
	 */
	function getProposalId($locale) {
		return $this->getData('proposalId', $locale);
	}

	/**
	 * Set Proposal ID.
	 * @param $proposalId string
	 * @param $locale
	 */
	function setProposalId($proposalId, $locale) {
		return $this->setData('proposalId', $proposalId, $locale);
	}

        /**
	 * Get withdraw reason.
	 * @param $locale
	 * @return string
	 */
	function getWithdrawReason($locale) {
		return $this->getData('withdrawReason', $locale);
	}
	
	/**
	 * Set withdraw reason.
	 * @param $proposalId string
	 * @param $locale
	 */
	function setWithdrawReason($withdrawReason, $locale) {
		return $this->setData('withdrawReason', $withdrawReason, $locale);
	}

        /**
	 * Get withdraw comments.
	 * @param $locale
	 * @return string
	 */
	function getWithdrawComments($locale) {
		return $this->getData('withdrawComments', $locale);
	}

	/**
	 * Set withdraw comments.
	 * @param $proposalId string
	 * @param $locale
	 */
	function setWithdrawComments($withdrawComments, $locale) {
		return $this->setData('withdrawComments', $withdrawComments, $locale);
	}
	
	/**
	 * Set approval date
	 * @param $approvalDate string
	 * @param $locale string
	 */
	function setApprovalDate($approvalDate, $locale) {
		return $this->setData('approvalDate', $approvalDate, $locale);
	}
	
	/**
	 * Get localized approvalDate
	 * @return string
	 */
	function getLocalizedApprovalDate() {
		return $this->getData("approvalDate");
	}
	
	/**
	 * Get approvalDate
	 * @return string
	 */
	function getApprovalDate($locale) {
		return $this->getData("approvalDate", $locale);
	}
	
	function setPrimaryAuthor($author) {
		return $this->setData('primaryAuthor', $author);
	}
	
	function getPrimaryAuthor() {
		return $this->getData("primaryAuthor");
	}
	
	function setPrimaryEditor($editor) {
		return $this->setData('primaryEditor', $editor);
	}
	
	function getPrimaryEditor() {
		return $this->getData("primaryEditor");
	}
	
	function setAuthorEmail($email) {
		return $this->setData("authorEmail", $email);
	}
	function getAuthorEmail() {
		return $this->getData("authorEmail");
	}
	
	
 	/**
	 * Get "localized" industryGrant (if applicable).
	 * @return string
	 */
	function getLocalizedIndustryGrant() {
		return $this->getLocalizedData('industryGrant');
	}

	/**
	 * Get industryGrant.
	 * @param $locale
	 * @return string
	 */
	function getIndustryGrant($locale) {
		return $this->getData('industryGrant', $locale);
	}

	/**
	 * Set industryGrant (yes/no).
	 * @param $industryGrant string
	 * @param $locale
	 */
	function setIndustryGrant($industryGrant, $locale) {
		return $this->setData('industryGrant', $industryGrant, $locale);
	}
	
 	/**
	 * Get "localized" nameOfIndustry (if applicable).
	 * @return string
	 */
	function getLocalizedNameOfIndustry() {
		return $this->getLocalizedData('nameOfIndustry');
	}

	/**
	 * Get nameOfIndustry.
	 * @param $locale
	 * @return string
	 */
	function getNameOfIndustry($locale) {
		return $this->getData('nameOfIndustry', $locale);
	}

	/**
	 * Set nameOfIndustry.
	 * @param $nameOfIndustry string
	 * @param $locale
	 */
	function setNameOfIndustry($nameOfIndustry, $locale) {
		return $this->setData('nameOfIndustry', $nameOfIndustry, $locale);
	}
	
	/**
	 * Get "localized" internationalGrant (if applicable).
	 * @return string
	 */
	function getLocalizedInternationalGrant() {
		return $this->getLocalizedData('internationalGrant');
	}
	
    /**
	 * Get "localized" internationalGrant full text.
	 * @return string
	 */	
	function getLocalizedInternationalGrantNameText(){
		return $this->articleDAO->getAgency($this->getLocalizedInternationalGrantName());
	}

	/**
	 * Get internationalGrant.
	 * @param $locale
	 * @return string
	 */
	function getInternationalGrant($locale) {
		return $this->getData('internationalGrant', $locale);
	}

	/**
	 * Set reviewedByOtherErc (yes/no).
	 * @param $reviewedByOtherErc string
	 * @param $locale
	 */
	function setInternationalGrant($internationalGrant, $locale) {
		return $this->setData('internationalGrant', $internationalGrant, $locale);
	}
	
 	/**
	 * Get "localized" internationalGrantName (if applicable).
	 * @return string
	 */
	function getLocalizedInternationalGrantName() {
		return $this->getLocalizedData('internationalGrantName');
	}

	/**
	 * Get internationalGrantName.
	 * @param $locale
	 * @return string
	 */
	function getInternationalGrantName($locale) {
		return $this->getData('internationalGrantName', $locale);
	}

	/**
	 * Set internationalGrantName.
	 * @param $internationalGrantName string
	 * @param $locale
	 */
	function setInternationalGrantName($internationalGrantName, $locale) {
		return $this->setData('internationalGrantName', $internationalGrantName, $locale);
	}

	/**
	 * Get "localized" otherInternationalGrantName (if applicable).
	 * @return string
	 */
	function getLocalizedOtherInternationalGrantName() {
		return $this->getLocalizedData('otherInternationalGrantName');
	}

	/**
	 * Get otherInternationalGrantName.
	 * @param $locale
	 * @return string
	 */
	function getOtherInternationalGrantName($locale) {
		return $this->getData('otherInternationalGrantName', $locale);
	}

	/**
	 * Set otherInternationalGrantName (yes/no).
	 * @param $otherInternationalGrantName string
	 * @param $locale
	 */
	function setOtherInternationalGrantName($otherInternationalGrantName, $locale) {
		return $this->setData('otherInternationalGrantName', $otherInternationalGrantName, $locale);
	}	
 	/**
	 * Get "localized" mohGrant (if applicable).
	 * @return string
	 */
	function getLocalizedMohGrant() {
		return $this->getLocalizedData('mohGrant');
	}

	/**
	 * Get reviewedByOtherErc.
	 * @param $locale
	 * @return string
	 */
	function getMohGrant($locale) {
		return $this->getData('mohGrant', $locale);
	}

	/**
	 * Set mohGrant (yes/no).
	 * @param $mohGrant string
	 * @param $locale
	 */
	function setMohGrant($mohGrant, $locale) {
		return $this->setData('mohGrant', $mohGrant, $locale);
	}
	
 	/**
	 * Get "localized" governmentGrant (if applicable).
	 * @return string
	 */
	function getLocalizedGovernmentGrant() {
		return $this->getLocalizedData('governmentGrant');
	}

	/**
	 * Get governmentGrant.
	 * @param $locale
	 * @return string
	 */
	function getGovernmentGrant($locale) {
		return $this->getData('governmentGrant', $locale);
	}

	/**
	 * Set governmentGrant (yes/no).
	 * @param $governmentGrant string
	 * @param $locale
	 */
	function setGovernmentGrant($governmentGrant, $locale) {
		return $this->setData('governmentGrant', $governmentGrant, $locale);
	}

 	/**
	 * Get "localized" governmentGrantName (if applicable).
	 * @return string
	 */
	function getLocalizedGovernmentGrantName() {
		return $this->getLocalizedData('governmentGrantName');
	}

	/**
	 * Get governmentGrantName.
	 * @param $locale
	 * @return string
	 */
	function getGovernmentGrantName($locale) {
		return $this->getData('governmentGrantName', $locale);
	}

	/**
	 * Set governmentGrantName (yes/no).
	 * @param $governmentGrantName string
	 * @param $locale
	 */
	function setGovernmentGrantName($governmentGrantName, $locale) {
		return $this->setData('governmentGrantName', $governmentGrantName, $locale);
	}
		
 	/**
	 * Get "localized" universityGrant (if applicable).
	 * @return string
	 */
	function getLocalizedUniversityGrant() {
		return $this->getLocalizedData('universityGrant');
	}

	/**
	 * Get reviewedByOtherErc.
	 * @param $locale
	 * @return string
	 */
	function getUniversityGrant($locale) {
		return $this->getData('universityGrant', $locale);
	}

	/**
	 * Set universityGrant (yes/no).
	 * @param $universityGrant string
	 * @param $locale
	 */
	function setUniversityGrant($universityGrant, $locale) {
		return $this->setData('universityGrant', $universityGrant, $locale);
	}
	
 	/**
	 * Get "localized" selfFunding (if applicable).
	 * @return string
	 */
	function getLocalizedSelfFunding() {
		return $this->getLocalizedData('selfFunding');
	}

	/**
	 * Get selfFunding.
	 * @param $locale
	 * @return string
	 */
	function getSelfFunding($locale) {
		return $this->getData('selfFunding', $locale);
	}

	/**
	 * Set selfFunding (yes/no).
	 * @param $selfFunding string
	 * @param $locale
	 */
	function setSelfFunding($selfFunding, $locale) {
		return $this->setData('selfFunding', $selfFunding, $locale);
	}
	
 	/**
	 * Get "localized" otherGrant (if applicable).
	 * @return string
	 */
	function getLocalizedOtherGrant() {
		return $this->getLocalizedData('otherGrant');
	}

	/**
	 * Get otherGrant.
	 * @param $locale
	 * @return string
	 */
	function getOtherGrant($locale) {
		return $this->getData('otherGrant', $locale);
	}

	/**
	 * Set otherGrant (yes or no).
	 * @param $otherGrant string
	 * @param $locale
	 */
	function setOtherGrant($otherGrant, $locale) {
		return $this->setData('otherGrant', $otherGrant, $locale);
	}
	
 	/**
	 * Get "localized" specifyOtherGrant (if applicable).
	 * @return string
	 */
	function getLocalizedSpecifyOtherGrant() {
		return $this->getLocalizedData('specifyOtherGrant');
	}

	/**
	 * Get specifyOtherGrant.
	 * @param $locale
	 * @return string
	 */
	function getSpecifyOtherGrant($locale) {
		return $this->getData('specifyOtherGrant', $locale);
	}

	/**
	 * Set specifyOtherGrant (yes/no).
	 * @param $specifyOtherGrantField string
	 * @param $locale
	 */
	function setSpecifyOtherGrant($specifyOtherGrant, $locale) {
		return $this->setData('specifyOtherGrant', $specifyOtherGrant, $locale);
	}

	function getInvestigatorAffiliation(){
		return $this->getData('investigatorAffiliation');
	}
	
	function setInvestigatorAffiliation($investigatorAffiliation){
		return $this->setData('investigatorAffiliation', $investigatorAffiliation);
	}

	/*
	 * check if the submission is due
	 */
    function isSubmissionDue() {
    	if ($this->getApprovalDate($this->getLocale()) == null) $startdate = strtotime($this->getDateStatusModified());   
    	else $startdate = strtotime($this->getApprovalDate($this->getLocale()));
        $afteroneyear = $newdate = strtotime ('+1 year', $startdate);
        $today = time();
        return ($today >= $afteroneyear);
    }
}

?>
