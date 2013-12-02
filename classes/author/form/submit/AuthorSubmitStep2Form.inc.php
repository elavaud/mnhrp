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

class AuthorSubmitStep2Form extends AuthorSubmitForm {

	/**
	 * Constructor.
	 */
	function AuthorSubmitStep2Form(&$article, &$journal) {
		parent::AuthorSubmitForm($article, 2, $journal);
		
                // Authors
		$this->addCheck(new FormValidatorCustom($this, 'authors', 'required', 'author.submit.form.authorRequired', create_function('$authors', 'return count($authors) > 0;')));
		$this->addCheck(new FormValidatorArray($this, 'authors', 'required', 'author.submit.form.authorRequiredFields', array('firstName', 'lastName', 'affiliation', 'phone')));
		$this->addCheck(new FormValidatorArrayCustom($this, 'authors', 'required', 'user.profile.form.urlInvalid', create_function('$url, $regExp', 'return empty($url) ? true : String::regexp_match($regExp, $url);'), array(ValidatorUrl::getRegexp()), false, array('url')));
				
		// Abstract
		$this->addCheck(new FormValidatorArray($this, 'abstracts', 'required', 'author.submit.form.abstractRequiredFields', array('scientificTitle', 'publicTitle', 'background', 'objectives', 'studyMethods', 'expectedOutcomes', 'keywords')));
		/*
		$abstractWordCount = $section->getAbstractWordCount();
		
		if (isset($abstractWordCount) && $abstractWordCount > 0) {
			$this->addCheck(new FormValidatorCustom($this, 'abstract', 'required', 'author.submit.form.wordCountAlert', create_function('$abstract, $wordCount', 'foreach ($abstract as $localizedAbstract) {return count(explode(" ",$localizedAbstract)) < $wordCount; }'), array($abstractWordCount)));
		}
		*/
                
                // Proposal Details
		$this->addCheck(new FormValidator($this, 'studentInitiatedResearch', 'required', 'author.submit.form.studentInitiatedResearch'));
                $this->addCheck(new FormValidator($this, 'startDate', 'required', 'author.submit.form.startDateRequired'));
                $this->addCheck(new FormValidator($this, 'endDate', 'required', 'author.submit.form.endDateRequired'));
                $this->addCheck(new FormValidator($this, 'primarySponsor', 'required', 'author.submit.form.primarySponsor'));
                $this->addCheck(new FormValidator($this, 'otherPrimarySponsor', 'required', 'author.submit.form.otherPrimarySponsor'));
                $this->addCheck(new FormValidator($this, 'otherSecondarySponsor', 'required', 'author.submit.form.otherSecondarySponsor'));
                $this->addCheck(new FormValidator($this, 'multiCountryResearch', 'required', 'author.submit.form.multiCountry'));
                $this->addCheck(new FormValidator($this, 'countries', 'required', 'author.submit.form.country'));
                $this->addCheck(new FormValidator($this, 'nationwide', 'required', 'author.submit.form.nationwide'));
                $this->addCheck(new FormValidator($this, 'geoAreas', 'required', 'author.submit.form.geoAreaRquired'));
                $this->addCheck(new FormValidator($this, 'researchFields', 'required', 'author.submit.form.researchField'));
                $this->addCheck(new FormValidator($this, 'otherResearchField', 'required', 'author.submit.form.otherResearchField'));
                $this->addCheck(new FormValidator($this, 'withHumanSubjects', 'required', 'author.submit.form.withHumanSubjectsRequired'));	        
                $this->addCheck(new FormValidator($this, 'proposalTypes', 'required', 'author.submit.form.proposalTypeRequired'));
                $this->addCheck(new FormValidator($this, 'otherProposalType', 'required', 'author.submit.form.otherProposalTypeRequired'));
                $this->addCheck(new FormValidator($this, 'dataCollection', 'required', 'author.submit.form.dataCollection'));
                $this->addCheck(new FormValidator($this, 'reviewedByOtherErc', 'required', 'author.submit.form.reviewedByOtherErcRequired'));
                $this->addCheck(new FormValidator($this, 'otherErcDecision', 'required', 'author.submit.form.otherErcDecisionRequired'));

                // Student
		$this->addCheck(new FormValidator($this, 'studentInstitution', 'required', 'author.submit.form.studentInstitution'));		
		$this->addCheck(new FormValidator($this, 'academicDegree', 'required', 'author.submit.form.academicDegree'));
		$this->addCheck(new FormValidator($this, 'supervisorName', 'required', 'author.submit.form.supervisorName'));
		$this->addCheck(new FormValidator($this, 'supervisorEmail', 'required', 'author.submit.form.supervisorEmail'));
                
                // Source of Monetary and Material Support
                $this->addCheck(new FormValidatorLocale($this, 'fundsRequired', 'required', 'author.submit.form.fundsRequiredRequired', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'selectedCurrency', 'required', 'author.submit.form.selectedCurrency', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'industryGrant', 'required', 'author.submit.form.industryGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'nameOfIndustry', 'required', 'author.submit.form.nameOfIndustry', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'internationalGrant', 'required', 'author.submit.form.internationalGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'internationalGrantName', 'required', 'author.submit.form.internationalGrantName', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'otherInternationalGrantName', 'required', 'author.submit.form.otherInternationalGrantName', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'mohGrant', 'required', 'author.submit.form.mohGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'governmentGrant', 'required', 'author.submit.form.governmentGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'governmentGrantName', 'required', 'author.submit.form.governmentGrantName', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'universityGrant', 'required', 'author.submit.form.universityGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'selfFunding', 'required', 'author.submit.form.selfFunding', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'otherGrant', 'required', 'author.submit.form.otherGrant', $this->getRequiredLocale()));
                $this->addCheck(new FormValidatorLocale($this, 'specifyOtherGrant', 'required', 'author.submit.form.specifyOtherGrantField', $this->getRequiredLocale()));
 		
 		// Risk Assessment
                $this->addCheck(new FormValidator($this, 'identityRevealed', 'required', 'author.submit.form.identityRevealedRequired'));
		$this->addCheck(new FormValidator($this, 'unableToConsent', 'required', 'author.submit.form.unableToConsentRequired'));
		$this->addCheck(new FormValidator($this, 'under18', 'required', 'author.submit.form.under18Required'));
		$this->addCheck(new FormValidator($this, 'dependentRelationship', 'required', 'author.submit.form.dependentRelationshipRequired'));
		$this->addCheck(new FormValidator($this, 'ethnicMinority', 'required', 'author.submit.form.ethnicMinorityRequired'));
		$this->addCheck(new FormValidator($this, 'impairment', 'required', 'author.submit.form.impairmentRequired'));
		$this->addCheck(new FormValidator($this, 'pregnant', 'required', 'author.submit.form.pregnantRequired'));
		$this->addCheck(new FormValidator($this, 'newTreatment', 'required', 'author.submit.form.newTreatmentRequired'));
		$this->addCheck(new FormValidator($this, 'bioSamples', 'required', 'author.submit.form.bioSamplesRequired'));
		$this->addCheck(new FormValidator($this, 'radiation', 'required', 'author.submit.form.radiationRequired'));
		$this->addCheck(new FormValidator($this, 'distress', 'required', 'author.submit.form.distressRequired'));
		$this->addCheck(new FormValidator($this, 'inducements', 'required', 'author.submit.form.inducementsRequired'));
		$this->addCheck(new FormValidator($this, 'sensitiveInfo', 'required', 'author.submit.form.sensitiveInfoRequired'));
		$this->addCheck(new FormValidator($this, 'deception', 'required', 'author.submit.form.deceptionRequired'));
		$this->addCheck(new FormValidator($this, 'reproTechnology', 'required', 'author.submit.form.reproTechnologyRequired'));
		$this->addCheck(new FormValidator($this, 'genetic', 'required', 'author.submit.form.geneticsRequired'));
		$this->addCheck(new FormValidator($this, 'stemCell', 'required', 'author.submit.form.stemCellRequired'));
		$this->addCheck(new FormValidator($this, 'biosafety', 'required', 'author.submit.form.biosafetyRequired'));
		$this->addCheck(new FormValidator($this, 'riskLevel', 'required', 'author.submit.form.riskLevelRequired'));
		$this->addCheck(new FormValidator($this, 'listRisks', 'required', 'author.submit.form.listRisksRequired'));
		$this->addCheck(new FormValidator($this, 'howRisksMinimized', 'required', 'author.submit.form.howRisksMinimizedRequired'));
		$this->addCheck(new FormValidator($this, 'multiInstitutions', 'required', 'author.submit.form.multiInstitutionsRequired'));
		$this->addCheck(new FormValidator($this, 'conflictOfInterest', 'required', 'author.submit.form.conflictOfInterestRequired'));

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
                                      
                        $primarySponsor = $proposalDetails->getPrimarySponsor();
                        if (preg_match('#^Other\s\(.+\)$#', $primarySponsor)){
                            $tempSponsor = $primarySponsor;
                            $sponsor = preg_replace('#^Other\s\(.+\)$#','OTHER', $primarySponsor);
                            $tempSponsor = preg_replace('#^Other\s\(#','', $tempSponsor);
                            $tempSponsor = preg_replace('#\)$#','', $tempSponsor);
                            $proposalDetails->setOtherPrimarySponsor($tempSponsor);
                            $primarySponsor = $sponsor;
                        }
                        
                        $secondarySponsorsArray = $proposalDetails->getSecondarySponsors();
                        $secondarySponsors = explode("+", $secondarySponsorsArray);
                        $h = 0;
                        foreach ($secondarySponsors as $sponsor){
                            if (preg_match('#^Other\s\(.+\)$#', $sponsor)){
                                $tempSponsor = $sponsor;
                                $sponsor = preg_replace('#^Other\s\(.+\)$#','OTHER', $sponsor);
                                $tempSponsor = preg_replace('#^Other\s\(#','', $tempSponsor);
                                $tempSponsor = preg_replace('#\)$#','', $tempSponsor);
                                $proposalDetails->setOtherSecondarySponsor($tempSponsor);
                            }
                            $test4 = array($h => $sponsor);
                            $secondarySponsors = array_replace ($secondarySponsors, $test4);
                            $h++;
                            unset ($sponsor);
                        }

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
                            'primarySponsor' => $primarySponsor,
                            'otherPrimarySponsor' => $proposalDetails->getOtherPrimarySponsor(),
                            'secondarySponsors' => $secondarySponsors,
                            'otherSecondarySponsor' => $proposalDetails->getOtherSecondarySponsor(),
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
			
                        
                        
                        $internationalGrantNameArray = $article->getInternationalGrantName(null);
                        if (empty($internationalGrantNameArray)) {
                            $internationalGrantNameArray = array ('en_US' => (string) '');
                        }
                        $internationalGrantName[Locale::getLocale()] = explode("+", $internationalGrantNameArray[Locale::getLocale()]);
                        $g = 0;
                        foreach ($internationalGrantName[Locale::getLocale()] as $grant){
                            if (preg_match('#^Other\s\(.+\)$#', $grant)){
                                $tempGrant = $grant;
                                $grant = preg_replace('#^Other\s\(.+\)$#','OTHER', $grant);
                                $tempGrant = preg_replace('#^Other\s\(#','', $tempGrant);
                                $tempGrant = preg_replace('#\)$#','', $tempGrant);
                                $article->setOtherInternationalGrantName($tempGrant, Locale::getLocale());
                            }
                            $test3 = array($g => $grant);
                            $internationalGrantName[Locale::getLocale()] = array_replace ($internationalGrantName[Locale::getLocale()], $test3);
                            $g++;
                            unset ($grant);
                        }
                        
                        $articleDao =& DAORegistry::getDAO('ArticleDAO');
                        						
			$this->_data = array(
				'authors' => array(),

                            	'abstracts' => array(),

                            	'proposalDetails' => $proposalDetailsArray,

                                'studentResearch' => $studentResearchArray,
                                
                                'riskAssessment' => $riskAssessmentArray,
                            
				'section' => $sectionDao->getSection($article->getSectionId()),                                 
                                'fundsRequired' => $article->getFundsRequired(null),
                                'selectedCurrency' => $article->getSelectedCurrency(null),
                                'industryGrant' => $article->getIndustryGrant(null),
                                'nameOfIndustry' => $article->getNameOfIndustry(null),
                                'internationalGrant' => $article->getInternationalGrant(null),
                                'internationalGrantName' => $internationalGrantName,
                                'otherInternationalGrantName' =>$article->getOtherInternationalGrantName(null),
                                'mohGrant' => $article->getMohGrant(null),
                                'governmentGrant' => $article->getGovernmentGrant(null),
                                'governmentGrantName' => $article->getGovernmentGrantName(null),
                                'universityGrant' => $article->getUniversityGrant(null),
                                'selfFunding' => $article->getSelfFunding(null),
                                'otherGrant' => $article->getOtherGrant(null),
                                'specifyOtherGrant' => $article->getSpecifyOtherGrant(null)
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
				// Authors
				'authors',
				'deletedAuthors',
				'primaryContact',
				
				// Abstract
				'abstracts',
                
                                // Proposal Details
				'studentInitiatedResearch',
                                'startDate',
                                'endDate',
                                'primarySponsor',
                                'otherPrimarySponsor',
                                'secondarySponsors',
                                'otherSecondarySponsor',
                                'multiCountryResearch',
                                'countries',
                                'nationwide',
                                'geoAreas',
                                'researchFields',
                                'otherResearchField',
                                'withHumanSubjects',
                                'proposalTypes',
                                'otherProposalType',
                                'dataCollection',
                                'reviewedByOtherErc',
                                'otherErcDecision',
				
                                // Student Research
				'studentInstitution',
				'academicDegree',
				'supervisorName',
				'supervisorEmail',
                            
				// Source of Monetary and Material Support
                                'fundsRequired',
                                'selectedCurrency',
                                'industryGrant',
                                'nameOfIndustry',
                                'internationalGrant',
                                'internationalGrantName',
                                'otherInternationalGrantName',
                                'mohGrant',
                                'governmentGrant',
                                'governmentGrantName',
                                'universityGrant',
                                'selfFunding',
                                'otherGrant',
                                'specifyOtherGrant',
                
                                // Risk Assessment
				'identityRevealed',
				'unableToConsent',
				'under18',
				'dependentRelationship',
				'ethnicMinority',
				'impairment',
				'pregnant',
				'newTreatment',
				'bioSamples',
				'radiation',
				'distress',
				'inducements',
				'sensitiveInfo',
				'deception',
				'reproTechnology',
				'genetic',
				'stemCell',
				'biosafety',
				'riskLevel',
				'listRisks',
				'howRisksMinimized',
				'risksToTeam',
				'risksToSubjects',
				'risksToCommunity',
				'benefitsToParticipants',
				'knowledgeOnCondition',
				'knowledgeOnDisease',
				'multiInstitutions',
				'conflictOfInterest'
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
		return array('fundsRequired', 'selectedCurrency', 'industryGrant', 'nameOfIndustry', 'internationalGrant', 'internationalGrantName', 'otherInternationalGrantName', 'mohGrant', 'governmentGrant', 'governmentGrantName', 'universityGrant', 'selfFunding', 'otherGrant', 'specifyOtherGrant');
	}

	/**
	 * Display the form.
	 */
	function display() {
		$templateMgr =& TemplateManager::getManager();
                
		$countryDao =& DAORegistry::getDAO('CountryDAO');
		$countries =& $countryDao->getCountries();
                $templateMgr->assign_by_ref('coutryList', $countries);
                
		if (Request::getUserVar('addAuthor') || Request::getUserVar('delAuthor')  || Request::getUserVar('moveAuthor')) {
			$templateMgr->assign('scrollToAuthor', true);
		}

                $proposalDetailsDao =& DAORegistry::getDAO('ProposalDetailsDAO');

                // Get proposal types
                $proposalTypes = $proposalDetailsDao->getProposalTypes();
                $templateMgr->assign('proposalTypesList', $proposalTypes);

                //Get research fields
                $researchFields = $proposalDetailsDao->getResearchFields();
                $templateMgr->assign('researchFieldsList', $researchFields);

                //Get list of agencies
                $agencies = $proposalDetailsDao->getAgencies();
                $templateMgr->assign('agencies', $agencies);

                //Get list of regions of geographical areas of the country
                $regionDAO =& DAORegistry::getDAO('AreasOfTheCountryDAO');
                $geoAreas =& $regionDAO->getAreasOfTheCountry();
                $templateMgr->assign_by_ref('geoAreasList', $geoAreas);

                $journal = Request::getJournal();
                $templateMgr->assign_by_ref('abstractLocales', $journal->getSupportedLocaleNames());

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
                
                $proposalDetails->setStudentResearch($this->getData('studentInitiatedResearch'));
                
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

                $countriesArray = $this->getData('countries');
                $countries = implode(",", $countriesArray);
                $proposalDetails->setCountries($countries);
		
                $proposalDetails->setNationwide($this->getData('nationwide'));
		
                $geoAreasArray = $this->getData('geoAreas');
                $geoAreas = implode(",", $geoAreasArray);
                $proposalDetails->setGeoAreas($geoAreas);

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
		///////// Update Source of Monetary ///////
                ///////////////////////////////////////////
                $article->setInternationalGrant($this->getData('internationalGrant'), null); 
                $internationalGrantNameArray = $this->getData('internationalGrantName');
                foreach($internationalGrantNameArray[Locale::getLocale()] as $i => $grant) {
                        if($grant == "OTHER") {
                                $otherGrant = $this->getData('otherInternationalGrantName');
                        if($otherGrant != "") {
                                $internationalGrantNameArray[Locale::getLocale()][$i] = "Other (". $otherGrant[Locale::getLocale()] .")";
                        }
                        }
                }

                $internationalGrantName[Locale::getLocale()] = implode("+", $internationalGrantNameArray[Locale::getLocale()]);
                $article->setInternationalGrantName($internationalGrantName, null); // Localized

                $article->setFundsRequired($this->getData('fundsRequired'), null); // Localized
                $article->setSelectedCurrency($this->getData('selectedCurrency'), null);
                $article->setIndustryGrant($this->getData('industryGrant'), null);
                $article->setNameOfIndustry($this->getData('nameOfIndustry'), null); 
                $article->setMohGrant($this->getData('mohGrant'), null);
                $article->setGovernmentGrant($this->getData('governmentGrant'), null);
                $article->setGovernmentGrantName($this->getData('governmentGrantName'), null); 
                $article->setUniversityGrant($this->getData('universityGrant'), null); 
                $article->setSelfFunding($this->getData('selfFunding'), null); 
                $article->setOtherGrant($this->getData('otherGrant'), null); 
                $article->setSpecifyOtherGrant($this->getData('specifyOtherGrant'), null);         


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
