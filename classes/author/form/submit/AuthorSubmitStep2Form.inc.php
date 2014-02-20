<?php

/**
 * @file classes/author/form/submit/AuthorSubmitStep2Form.inc.php
 *
 * @class AuthorSubmitStep2Form
 * @ingroup author_form_submit
 *
 * @brief Form for Step 2 of author article submission.
 */

import('classes.author.form.submit.AuthorSubmitForm');
import('classes.form.validation.FormValidatorArrayRadios');

class AuthorSubmitStep2Form extends AuthorSubmitForm {

	/**
	 * Constructor.
	 */
	function AuthorSubmitStep2Form(&$article, &$journal) {
		parent::AuthorSubmitForm($article, 2, $journal);
		
		$this->addCheck(new FormValidatorCustom($this, 'authors', 'required', 'author.submit.form.authorRequired', create_function('$authors', 'return count($authors) > 0;')));
		$this->addCheck(new FormValidatorArray($this, 'authors', 'required', 'author.submit.form.authorRequiredFields', array('firstName', 'lastName', 'affiliation', 'phone')));				
		$this->addCheck(new FormValidatorArray($this, 'abstracts', 'required', 'author.submit.form.abstractRequiredFields', array('scientificTitle', 'publicTitle', 'background', 'objectives', 'studyMethods', 'expectedOutcomes', 'keywords')));
		$this->addCheck(new FormValidatorArrayRadios($this, 'proposalDetails', 'required', 'author.submit.form.proposalDetails', array('studentInitiatedResearch', 'multiCountryResearch', 'nationwide', 'withHumanSubjects', 'reviewedByOtherErc')));
                $this->addCheck(new FormValidatorArray($this, 'studentResearch', 'required', 'author.submit.form.studentResearch'));
		$this->addCheck(new FormValidatorArray($this, 'sources', 'required', 'author.submit.form.sourceRequiredFields', array('institution', 'amount', 'otherInstitutionName', 'otherInstitutionAcronym', 'otherInstitutionType', 'otherInstitutionLocation')));                
                
                $this->addCheck(new FormValidatorArrayCustom($this, 'sources', 'required', 'author.submit.form.sourceNameAlreadyUsed', create_function('$otherInstitutionName', '$institutionDao = DAORegistry::getDAO("InstitutionDAO"); if($institutionDao->institutionExistsByName($otherInstitutionName)) return false; else return true;'), array(), false, array('otherInstitutionName')));                
                
                //$this->addCheck(new FormValidatorCustom($this, 'name', 'required', 'manager.institutions.form.nameExists', array(DAORegistry::getDAO('InstitutionDAO'), 'institutionExistsByName'), array($this->institutionId), true));
		//$this->addCheck(new FormValidatorArrayCustom($this, 'authors', 'required', 'user.profile.form.emailRequired', create_function('$email, $regExp', 'return String::regexp_match($regExp, $email);'), array(ValidatorEmail::getRegexp()), false, array('email')));
		//$this->addCheck(new FormValidatorArrayCustom($this, 'authors', 'required', 'user.profile.form.urlInvalid', create_function('$url, $regExp', 'return empty($url) ? true : String::regexp_match($regExp, $url);'), array(ValidatorUrl::getRegexp()), false, array('url')));
                
                
                
                
                $this->addCheck(new FormValidatorArrayRadios($this, "riskAssessment", 'required', 'author.submit.form.riskAssessment', array('identityRevealed', 'unableToConsent', 'under18', 'dependentRelationship', 'ethnicMinority', 'impairment', 'pregnant', 'newTreatment', 'bioSamples', 'radiation', 'distress', 'inducements', 'sensitiveInfo', 'deception', 'reproTechnology', 'genetic', 'stemCell', 'biosafety', 'multiInstitutions', 'conflictOfInterest')));
		
                
                
                
        }

	/**
	 * Initialize form data from current article.
	 */
	function initData() {
		$sectionDao =& DAORegistry::getDAO('SectionDAO');
		if (isset($this->article)) {
			$article =& $this->article;
                        // Initialize th proposal details
                        $proposalDetails =& $article->getProposalDetails();

                        $countriesArray = $proposalDetails->getCountries();
			$countries = explode(",", $countriesArray);
                        
                        $geoAreasArray = $proposalDetails->getGeoAreas();
                        $geoAreas = explode(",", $geoAreasArray);
            
                        $researchFieldsArray = $proposalDetails->getResearchFields();
                        $researchFields = explode("+", $researchFieldsArray);
			$i = 0;     
                        foreach ($researchFields as $field){
                            if (preg_match('#^Other\s\(.+\)$#', $field)){
                                    $tempField = $field;
                                $field = preg_replace('#^Other\s\(.+\)$#','OTHER', $field);
                                $tempField = preg_replace('#^Other\s\(#','', $tempField);
                                $tempField = preg_replace('#\)$#','', $tempField);
                                $proposalDetails->setOtherResearchField($tempField);
                            }
                            $test = array($i => $field);
                            $researchFields = array_replace ($researchFields, $test);
                            $i++;
                            unset ($field);
                        }

                        $proposalTypesArray = $proposalDetails->getProposalTypes();
                        $proposalTypes = explode("+", $proposalTypesArray);
                        $f = 0;
                        foreach ($proposalTypes as $type){
                            if (preg_match('#^Other\s\(.+\)$#', $type)){
                                $tempType = $type;
                                $type = preg_replace('#^Other\s\(.+\)$#','OTHER', $type);
                                $tempType = preg_replace('#^Other\s\(#','', $tempType);
                                $tempType = preg_replace('#\)$#','', $tempType);
                                $proposalDetails->setOtherProposalType($tempType);
                            }
                            $test2 = array($f => $type);
                            $proposalTypes = array_replace ($proposalTypes, $test2);
                            $f++;
                            unset ($type);
                        }
  

                        
                        $proposalDetailsArray = array(
                            'studentInitiatedResearch' => $proposalDetails->getStudentResearch(),
                            'startDate' => $proposalDetails->getStartDate(),
                            'endDate' => $proposalDetails->getEndDate(),
                            'keyImplInstitution' => $proposalDetails->getKeyImplInstitution(),
                            'multiCountryResearch' => $proposalDetails->getMultiCountryResearch(),
                            'countries' => $countries,
                            'nationwide' => $proposalDetails->getNationwide(),
                            'geoAreas' => $geoAreas,
                            'researchFields' => $researchFields,
                            'otherResearchField' => $proposalDetails->getOtherResearchField(),
                            'withHumanSubjects' => $proposalDetails->getHumanSubjects(),
                            'proposalTypes' => $proposalTypes,
                            'otherProposalType' => $proposalDetails->getOtherProposalType(),
                            'dataCollection' => $proposalDetails->getDataCollection(),
                            'committeeReviewed' => $proposalDetails->getCommitteeReviewed()
                        );
                        
                        // Student research
                        $studentResearch =& $proposalDetails->getStudentResearchInfo();
                        $studentResearchArray = array(
                            'studentInstitution' => $studentResearch->getInstitution(), 
                            'academicDegree' => $studentResearch->getDegree(),
                            'supervisorName' => $studentResearch->getSupervisorName(),
                            'supervisorEmail' => $studentResearch->getSupervisorEmail()                            
                        );
			
                        
                        // Risk Assessments
			$riskAssessment =& $article->getRiskAssessment();
			$riskAssessmentArray = array(	
                            'identityRevealed' => $riskAssessment->getIdentityRevealed(),
                            'unableToConsent' => $riskAssessment->getUnableToConsent(),
                            'under18' => $riskAssessment->getUnder18(),
                            'dependentRelationship' => $riskAssessment->getDependentRelationship(),
                            'ethnicMinority' => $riskAssessment->getEthnicMinority(),
                            'impairment' => $riskAssessment->getImpairment(),
                            'pregnant' => $riskAssessment->getPregnant(),
                            'newTreatment' => $riskAssessment->getNewTreatment(),
                            'bioSamples' => $riskAssessment->getBioSamples(),
                            'radiation' => $riskAssessment->getRadiation(),
                            'distress' => $riskAssessment->getDistress(),
                            'inducements' => $riskAssessment->getInducements(),
                            'sensitiveInfo' => $riskAssessment->getSensitiveInfo(),
                            'deception' => $riskAssessment->getDeception(),
                            'reproTechnology' => $riskAssessment->getReproTechnology(),
                            'genetic' => $riskAssessment->getGenetic(),
                            'stemCell' => $riskAssessment->getStemCell(),
                            'biosafety' => $riskAssessment->getBiosafety(),
                            'riskLevel' => $riskAssessment->getRiskLevel(),
                            'listRisks' => $riskAssessment->getListRisks(),
                            'howRisksMinimized' => $riskAssessment->getHowRisksMinimized(),
                            'risksToTeam' => $riskAssessment->getRisksToTeam(),
                            'risksToSubjects' => $riskAssessment->getRisksToSubjects(),
                            'risksToCommunity' => $riskAssessment->getRisksToCommunity(),
                            'benefitsToParticipants' => $riskAssessment->getBenefitsToParticipants(),
                            'knowledgeOnCondition' => $riskAssessment->getKnowledgeOnCondition(),
                            'knowledgeOnDisease' => $riskAssessment->getKnowledgeOnDisease(),
                            'conflictOfInterest' => $riskAssessment->getConflictOfInterest(),
                            'multiInstitutions' => $riskAssessment->getMultiInstitutions()			
			);
			                                                						
			$this->_data = array(
				'authors' => array(),

                            	'abstracts' => array(),

                            	'proposalDetails' => $proposalDetailsArray,
                            
				'sources' => array(),

                                'studentResearch' => $studentResearchArray,
                                
                                'riskAssessment' => $riskAssessmentArray,
                            
				'section' => $sectionDao->getSection($article->getSectionId())                                 
			);
			
                       
			$authors =& $article->getAuthors();
			for ($i=0, $count=count($authors); $i < $count; $i++) {
				array_push(
					$this->_data['authors'],
					array(
						'authorId' => $authors[$i]->getId(),
						'firstName' => $authors[$i]->getFirstName(),
						'middleName' => $authors[$i]->getMiddleName(),
						'lastName' => $authors[$i]->getLastName(),
						'affiliation' => $authors[$i]->getAffiliation(),
						'phone' => $authors[$i]->getPhoneNumber(),
						'email' => $authors[$i]->getEmail()
					)
				);
				if ($authors[$i]->getPrimaryContact()) {
					$this->setData('primaryContact', $i);
				}
			}

                        
                        $sources =& $article->getSources();
                        if (empty($sources)) {
                            array_push ($sources, new ProposalSource());
                        }
                        for ($i=0, $count=count($sources); $i < $count; $i++) {
                            array_push(
                                    $this->_data['sources'],
                                    array(
                                            'sourceId' => $sources[$i]->getSourceId(),
                                            'institutionId' => $sources[$i]->getInstitutionId(),
                                            'amount' => $sources[$i]->getSourceAmount()
                                    )
                            );
                        }
			
                        
                        $journal = Request::getJournal();
                        $abstracts =& $article->getAbstracts();
                        foreach ($journal->getSupportedLocaleNames() as $localeKey => $localeValue) {
                            if (isset($abstracts[$localeKey])) {
                                $this->_data['abstracts'][$localeKey] = array(
                                        'abstractId' => $abstracts[$localeKey]->getAbstractId(),
                                        'scientificTitle' => $abstracts[$localeKey]->getScientificTitle(),
                                        'publicTitle' => $abstracts[$localeKey]->getPublicTitle(),
                                        'background' => $abstracts[$localeKey]->getBackground(),
                                        'objectives' => $abstracts[$localeKey]->getObjectives(),
                                        'studyMethods' => $abstracts[$localeKey]->getStudyMethods(),
                                        'expectedOutcomes' => $abstracts[$localeKey]->getExpectedOutcomes(),
                                        'keywords' => $abstracts[$localeKey]->getKeywords(),
                                    );
                            }
                        }


		}
		return parent::initData();
	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(
			array(
				'authors',
				'deletedAuthors',
				'primaryContact',				
				'abstracts',                
                                'proposalDetails',                            
				'studentResearch',                            
				'sources',
                                'riskAssessment'
			)
		);

                // Load the section. This is used in the step 2 form to
		// determine whether or not to display indexing options.
		$sectionDao =& DAORegistry::getDAO('SectionDAO');
		$this->_data['section'] =& $sectionDao->getSection($this->article->getSectionId());

		/*
		if ($this->_data['section']->getAbstractsNotRequired() == 0) {
			$this->addCheck(new FormValidatorLocale($this, 'abstract', 'required', 'author.submit.form.abstractRequired', $this->getRequiredLocale()));
		}
		*/
	}

	/**
	 * Get the names of fields for which data should be localized
	 * @return array
	 */
	function getLocaleFieldNames() {
		return array();
	}

	/**
	 * Display the form.
	 */
	function display() {
                $journal = Request::getJournal();
                
		$countryDao =& DAORegistry::getDAO('CountryDAO');
                $proposalDetailsDao =& DAORegistry::getDAO('ProposalDetailsDAO');
                $studentResearchDao =& DAORegistry::getDAO('StudentResearchDAO');
                $regionDAO =& DAORegistry::getDAO('AreasOfTheCountryDAO');
		$institutionDao =& DAORegistry::getDAO('InstitutionDAO');
		$riskAssessmentDao =& DAORegistry::getDAO('RiskAssessmentDAO');
                
                $geoAreas =& $regionDAO->getAreasOfTheCountry();

                $coveredArea = $journal->getLocalizedSetting('location'); 
                $institutionLocations = array('EXT' => Locale::translate('common.outside').' '.$coveredArea) + $geoAreas;
                
                $institutionsList = $institutionDao->getInstitutionsList();
                $institutionsListWithOther = $institutionsList + array('OTHER' => Locale::translate('common.other'));
                $sourcesList = $institutionsListWithOther + array('KIS' => Locale::translate('proposal.keyImplInstitution'));
                
		$templateMgr =& TemplateManager::getManager();
                
		if (Request::getUserVar('addAuthor') || Request::getUserVar('delAuthor')  || Request::getUserVar('moveAuthor')) {
			$templateMgr->assign('scrollToAuthor', true);
		}
                
                $templateMgr->assign('abstractLocales', $journal->getSupportedLocaleNames());
                $templateMgr->assign('coutryList', $countryDao->getCountries());
                $templateMgr->assign('proposalTypesList', $proposalDetailsDao->getProposalTypes());
                $templateMgr->assign('researchFieldsList', $proposalDetailsDao->getResearchFields());
                $templateMgr->assign('proposalDetailYesNoArray', $proposalDetailsDao->getYesNoArray());
                $templateMgr->assign('nationwideRadioButtons', $proposalDetailsDao->getNationwideRadioButtons());
                $templateMgr->assign('dataCollectionArray', $proposalDetailsDao->getDataCollectionArray());
                $templateMgr->assign('otherErcDecisionArray', $proposalDetailsDao->getOtherErcDecisionArray());
                $templateMgr->assign('academicDegreesArray', $studentResearchDao->getAcademicDegreesArray());
                $templateMgr->assign('geoAreasList', $geoAreas);
                $templateMgr->assign('institutionsList', $institutionsListWithOther);
                $templateMgr->assign('sourcesList', $sourcesList);
                $templateMgr->assign('institutionTypes', $institutionDao->getInstitutionTypes());                
                $templateMgr->assign('institutionLocations', $institutionLocations);
                $templateMgr->assign('riskAssessmentYesNoArray', $riskAssessmentDao->getYesNoArray());
                $templateMgr->assign('riskAssessmentLevelsOfRisk', $riskAssessmentDao->getLevelOfRiskArray());
                $templateMgr->assign('riskAssessmentConflictOfInterestArray', $riskAssessmentDao->getConflictOfInterestArray());

                parent::display();
	}

	/**
	 * Save changes to article.
	 * @param $request Request
	 * @return int the article ID
	 */
	function execute(&$request) {
		$articleDao =& DAORegistry::getDAO('ArticleDAO');
		$article =& $this->article;
                
		// Retrieve the previous citation list for comparison.
		$previousRawCitationList = $article->getCitations();

                
                ///////////////////////////////////////////
		////////////// Update Authors /////////////
                ///////////////////////////////////////////

                $authors = $this->getData('authors');
		for ($i=0, $count=count($authors); $i < $count; $i++) {
			if ($authors[$i]['authorId'] > 0) {
			// Update an existing author
				$author =& $article->getAuthor($authors[$i]['authorId']);
				$isExistingAuthor = true;
			} else {
				// Create a new author
				$author = new Author();
				$isExistingAuthor = false;
			}

			if ($author != null) {
				$author->setSubmissionId($article->getId());
				if (isset($authors[$i]['firstName'])) $author->setFirstName($authors[$i]['firstName']);
				if (isset($authors[$i]['middleName'])) $author->setMiddleName($authors[$i]['middleName']);
				if (isset($authors[$i]['lastName'])) $author->setLastName($authors[$i]['lastName']);
				if (isset($authors[$i]['affiliation'])) $author->setAffiliation($authors[$i]['affiliation']);
				if (isset($authors[$i]['phone'])) $author->setPhoneNumber($authors[$i]['phone']);
				if (isset($authors[$i]['email'])) $author->setEmail($authors[$i]['email']);
				$author->setPrimaryContact($this->getData('primaryContact') == $i ? 1 : 0);
				$author->setSequence($authors[$i]['seq']);

				if ($isExistingAuthor == false) {
					$article->addAuthor($author);
				}
			}
			unset($author);
		}

                // Remove deleted authors
		$deletedAuthors = explode(':', $this->getData('deletedAuthors'));
		for ($i=0, $count=count($deletedAuthors); $i < $count; $i++) {
			$article->removeAuthor($deletedAuthors[$i]);
		}
                
                ///////////////////////////////////////////
		//////////// Update Abstract(s) ///////////
                ///////////////////////////////////////////
                
		import('classes.article.ProposalAbstract');
                $journal = Request::getJournal();
                $abstracts = $this->getData('abstracts');
                foreach ($journal->getSupportedLocaleNames() as $localeKey => $localeValue) {
                    if ($abstracts[$localeKey]['abstractId'] > 0) {
                        $abstract = $article->getAbstractByLocale($localeKey);
                        $isExistingAbstract = true;
                    } else {
                        $abstract = new ProposalAbstract();
                        $isExistingAbstract = false;
                    }
                    
                    if ($abstract != null) {
                        
                        $abstract->setArticleId($article->getId());		
                        $abstract->setLocale($localeKey);
                        $abstract->setScientificTitle($abstracts[$localeKey]['scientificTitle']);
                        $abstract->setPublicTitle($abstracts[$localeKey]['publicTitle']);
                        $abstract->setBackground($abstracts[$localeKey]['background']);
                        $abstract->setObjectives($abstracts[$localeKey]['objectives']);
                        $abstract->setStudyMethods($abstracts[$localeKey]['studyMethods']);
                        $abstract->setExpectedOutcomes($abstracts[$localeKey]['expectedOutcomes']);		
                        $abstract->setKeywords($abstracts[$localeKey]['keywords']);
                        if ($isExistingAbstract == false) {
                                $article->addAbstract($abstract);
                        }

                    }
                    unset($abstract);
                }

                ///////////////////////////////////////////
		///////// Update Proposal Details /////////
                ///////////////////////////////////////////
                
                import('classes.article.ProposalDetails');
		$proposalDetails = new ProposalDetails();

		$proposalDetails->setArticleId($article->getId());
                
                $proposalDetails->setStudentResearch($this->getData('proposalDetails.studentInitiatedResearch'));
                
                $proposalDetails->setStartDate($this->getData('startDate'));
                
                $proposalDetails->setEndDate($this->getData('endDate'));
                
                $primarySponsor = $this->getData('primarySponsor');
                if($primarySponsor == "OTHER") {
                    $otherSponsor = $this->getData('otherPrimarySponsor');
                    if($otherSponsor != "") {
                                $primarySponsor = "Other (". $otherSponsor .")";
                    }
                }
                $proposalDetails->setPrimarySponsor($primarySponsor);
                
                $secondarySponsorArray = $this->getData('secondarySponsors');
                foreach($secondarySponsorArray as $i => $sponsor) {
                        if($sponsor == "OTHER") {
                                $otherSponsor = $this->getData('otherSecondarySponsor');
                                if($otherSponsor != "") {
                                        $secondarySponsorArray[$i] = "Other (". $otherSponsor .")";
                                }
                        }
                }
                $secondarySponsors = implode("+", $secondarySponsorArray);
                $proposalDetails->setSecondarySponsors($secondarySponsors);
                
                $proposalDetails->setMultiCountryResearch($this->getData('multiCountryResearch'));
                
                if ($this->getData('multiCountryResearch') == PROPOSAL_DETAIL_YES) {
                    $countriesArray = $this->getData('countries');
                    $countries = implode(",", $countriesArray);
                    $proposalDetails->setCountries($countries);                    
                }
		
                $proposalDetails->setNationwide($this->getData('nationwide'));
                
                if ($this->getData('nationwide') != PROPOSAL_DETAIL_YES) {
                    $geoAreasArray = $this->getData('geoAreas');
                    $geoAreas = implode(",", $geoAreasArray);
                    $proposalDetails->setGeoAreas($geoAreas);
                }
                
                $researchFieldsArray = $this->getData('researchFields');
                foreach($researchFieldsArray as $i => $field) {
                        if($field == "OTHER") {
                                $otherField = $this->getData('otherResearchField');
                                if($otherField != "") {
                                        $researchFieldsArray[$i] = "Other (". $otherField .")";
                                }
                        }
                }   
                $researchFields = implode("+", $researchFieldsArray);
                $proposalDetails->setResearchFields($researchFields);
                
                $proposalDetails->setHumanSubjects($this->getData('withHumanSubjects'));    

                if ($this->getData('withHumanSubjects') == PROPOSAL_DETAIL_YES) {
                    $proposalTypesArray = $this->getData('proposalTypes');
                    foreach($proposalTypesArray as $i => $type) {
                            if($type == "OTHER") {
                                    $otherType = $this->getData('otherProposalType');
                                    if($otherType != "") {
                                            $proposalTypesArray[$i] = "Other (". $otherType .")";
                                    }
                            }
                    }
                    $proposalTypes = implode("+", $proposalTypesArray);
                    $proposalDetails->setProposalTypes($proposalTypes);
                }
                
                $proposalDetails->setDataCollection($this->getData('dataCollection'));
                
                if ($this->getData('reviewedByOtherErc') == PROPOSAL_DETAIL_YES) {
                    $proposalDetails->setCommitteeReviewed($this->getData('otherErcDecision'));    
                } else $proposalDetails->setCommitteeReviewed(PROPOSAL_DETAIL_NO);    
                
                // Update or insert student research
                import('classes.article.StudentResearch');
		$studentResearchInfo = new StudentResearch();
                $studentResearchInfo->setArticleId($article->getId());
                $studentResearchInfo->setInstitution($this->getData('studentInstitution'));
                $studentResearchInfo->setDegree($this->getData('academicDegree'));
                $studentResearchInfo->setSupervisorName($this->getData('supervisorName'));
                $studentResearchInfo->setSupervisorEmail($this->getData('supervisorEmail'));
                
                $proposalDetails->setStudentResearchInfo($studentResearchInfo);
                $article->setProposalDetails($proposalDetails);
                
                ///////////////////////////////////////////
		//////// Update Sources of Monetary ///////
                ///////////////////////////////////////////

                $sources = $this->getData('sources');
		for ($i=0, $count=count($sources); $i < $count; $i++) {
			if ($sources[$i]['sourceId'] > 0) {
			// Update an existing source
				$source =& $article->getSource($sources[$i]['sourceId']);
				$isExistingSource = true;
			} else {
				// Create a new source
				$source = new ProposalSource();
				$isExistingSource = false;
			}

			if ($source != null) {
				$source->setArticleId($article->getId());
				if (isset($sources[$i]['type'])) $source->setSourceType($sources[$i]['type']);
				if (isset($sources[$i]['name'])) $source->setSourceName($sources[$i]['name']);
				if (isset($sources[$i]['amount'])) $source->setSourceAmount($sources[$i]['amount']);
				if ($isExistingSource == false) {
					$article->addSource($source);
				}
			}
			unset($source);
		} 


                ///////////////////////////////////////////
		///////////// Risk Assessment /////////////
                ///////////////////////////////////////////

                import('classes.article.RiskAssessment');
		$riskAssessment = new RiskAssessment();
                $riskAssessment->setArticleId($article->getId());
                $riskAssessment->setIdentityRevealed($this->getData('identityRevealed'));
                $riskAssessment->setUnableToConsent($this->getData('unableToConsent'));
                $riskAssessment->setUnder18($this->getData('under18'));
                $riskAssessment->setDependentRelationship($this->getData('dependentRelationship'));
                $riskAssessment->setEthnicMinority($this->getData('ethnicMinority'));
                $riskAssessment->setImpairment($this->getData('impairment'));
                $riskAssessment->setPregnant($this->getData('pregnant'));
                $riskAssessment->setNewTreatment($this->getData('newTreatment'));
                $riskAssessment->setBioSamples($this->getData('bioSamples'));
                $riskAssessment->setRadiation($this->getData('radiation'));
                $riskAssessment->setDistress($this->getData('distress'));
                $riskAssessment->setInducements($this->getData('inducements'));
                $riskAssessment->setSensitiveInfo($this->getData('sensitiveInfo'));
                $riskAssessment->setDeception($this->getData('deception'));
                $riskAssessment->setReproTechnology($this->getData('reproTechnology'));
                $riskAssessment->setGenetic($this->getData('genetic'));
                $riskAssessment->setStemCell($this->getData('stemCell'));
                $riskAssessment->setBiosafety($this->getData('biosafety'));
                $riskAssessment->setRiskLevel($this->getData('riskLevel'));
                $riskAssessment->setListRisks($this->getData('listRisks'));
                $riskAssessment->setHowRisksMinimized($this->getData('howRisksMinimized'));

                $riskAssessment->setRisksToTeam($this->getData('risksToTeam') ? 1 : 0);
                $riskAssessment->setRisksToSubjects($this->getData('risksToSubjects') ? 1 : 0);
                $riskAssessment->setRisksToCommunity($this->getData('risksToCommunity') ? 1 : 0);
                $riskAssessment->setBenefitsToParticipants($this->getData('benefitsToParticipants') ? 1 : 0);
                $riskAssessment->setKnowledgeOnCondition($this->getData('knowledgeOnCondition') ? 1 : 0);
                $riskAssessment->setKnowledgeOnDisease($this->getData('knowledgeOnDisease') ? 1 : 0);

                $riskAssessment->setMultiInstitutions($this->getData('multiInstitutions'));
                $riskAssessment->setConflictOfInterest($this->getData('conflictOfInterest'));           
                $article->setRiskAssessment($riskAssessment);
		
		

                //update step
                if ($article->getSubmissionProgress() <= $this->step) {
			$article->stampStatusModified();
			$article->setSubmissionProgress($this->step + 1);
		}                

		parent::execute();

		// Save the article
		$articleDao->updateArticle($article);

		// Update references list if it changed.
		$citationDao =& DAORegistry::getDAO('CitationDAO');
		$rawCitationList = $article->getCitations();
		if ($previousRawCitationList != $rawCitationList) {
			$citationDao->importCitations($request, ASSOC_TYPE_ARTICLE, $article->getId(), $rawCitationList);
		}
		return $this->articleId;
	}
}

?>
