<?php

/**
 * @file classes/article/ProposalDetailsDAO.inc.php
 *
 * @class ProposalDetailsDAO
 *
 * @brief Operations for retrieving and modifying proposal details objects.
 */

// $Id$

import('classes.article.ProposalDetails');

class ProposalDetailsDAO extends DAO{

	var $studentResearchDao;
 
        /**
	 * Constructor.
	 */
	function ProposalDetailsDAO() {
		parent::DAO();
		$this->studentResearchDao =& DAORegistry::getDAO('StudentResearchDAO');
        }

        /**
	 * Get the proposal details for a submission.
	 * @param $submissionId int
	 * @return proposalDetails object
	 */
	function &getProposalDetailsByArticleId($submissionId) {

		$result =& $this->retrieve(
			'SELECT * FROM article_details WHERE article_id = ? LIMIT 1',
			(int) $submissionId
		);

		$proposalDetails =& $this->_returnProposalDetailsFromRow($result->GetRowAssoc(false));

		$result->Close();
		unset($result);

		return $proposalDetails;
	}

	/**
	 * Insert a new proposal details.
	 * @param $proposalDetails object
	 */
	function insertProposalDetails(&$proposalDetails) {
		$this->update(
                        sprintf(
			'INSERT INTO article_details
				(article_id, student, start_date, end_date, primary_sponsor, secondary_sponsors, multi_country, countries, nationwide, geo_areas, research_fields, human_subjects, proposal_types, data_collection, committee_reviewed)
				VALUES			
                                (?, ?, %s, %s, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                        $this->dateToDB(strtotime($proposalDetails->getStartDate())), $this->dateToDB(strtotime($proposalDetails->getEndDate()))),
			array(
				(int) $proposalDetails->getArticleId(),
				(int) $proposalDetails->getStudentResearch(),
				(string) $proposalDetails->getPrimarySponsor(),
				(string) $proposalDetails->getSecondarySponsors(),
				(int) $proposalDetails->getMultiCountryResearch(),
				(string) $proposalDetails->getCountries(),
				(int) $proposalDetails->getNationwide(),
				(string) $proposalDetails->getGeoAreas(),
				(string) $proposalDetails->getResearchFields(),
				(int) $proposalDetails->getHumanSubjects(),
				(string) $proposalDetails->getProposalTypes(),
				(int) $proposalDetails->getDataCollection(),
				(int) $proposalDetails->getCommitteeReviewed()
			)
		);
		
                // inser student research
		$studentResearch =& $proposalDetails->getStudentResearchInfo();
		if ($this->studentResearchDao->studentResearchExists($proposalDetails->getArticleId())) {
                        if ($proposalDetails->getStudentResearch() == PROPOSAL_DETAIL_YES) $this->studentResearchDao->updateStudentResearch($studentResearch);
                        else $this->studentResearchDao->deleteStudentResearch($proposalDetails->getArticleId());
		} elseif ($studentResearch->getArticleId() != null) {
                        if ($proposalDetails->getStudentResearch() == PROPOSAL_DETAIL_YES) $this->studentResearchDao->insertStudentResearch($studentResearch);
		}

		return true;
	}

	/**
	 * Update an existing proposal details object.
	 * @param $proposalDetails ProposalDetails object
	 */
	function updateProposalDetails(&$proposalDetails) {
		$returner = $this->update(sprintf(
			'UPDATE article_details
			SET	
				student = ?,
				start_date = %s,
				end_date = %s,
				primary_sponsor = ?, 
				secondary_sponsors = ?,
				multi_country = ?,
				countries = ?,
				nationwide = ?,
				geo_areas = ?,
				research_fields = ?,
				human_subjects = ?,
				proposal_types = ?,
				data_collection = ?,
				committee_reviewed = ?
			WHERE	article_id = ?',
                        $this->datetimeToDB(strtotime($proposalDetails->getStartDate())), 
                        $this->datetimeToDB(strtotime($proposalDetails->getEndDate()))),
			array(
				(int) $proposalDetails->getStudentResearch(),
				(string) $proposalDetails->getPrimarySponsor(),
				(string) $proposalDetails->getSecondarySponsors(),
				(int) $proposalDetails->getMultiCountryResearch(),
				(string) $proposalDetails->getCountries(),
				(int) $proposalDetails->getNationwide(),
				(string) $proposalDetails->getGeoAreas(),
				(string) $proposalDetails->getResearchFields(),
				(int) $proposalDetails->getHumanSubjects(),
				(string) $proposalDetails->getProposalTypes(),
				(int) $proposalDetails->getDataCollection(),
				(int) $proposalDetails->getCommitteeReviewed(),
				(int) $proposalDetails->getArticleId()
			)
		);

                // update student research for this proposail details
		$studentResearch =& $proposalDetails->getStudentResearchInfo();
		if ($this->studentResearchDao->studentResearchExists($proposalDetails->getArticleId())) {
                        if ($proposalDetails->getStudentResearch() == PROPOSAL_DETAIL_YES) $this->studentResearchDao->updateStudentResearch($studentResearch);
                        else $this->studentResearchDao->deleteStudentResearch($proposalDetails->getArticleId());
		} elseif ($studentResearch->getArticleId() != null) {
                        if ($proposalDetails->getStudentResearch() == PROPOSAL_DETAIL_YES) $this->studentResearchDao->insertStudentResearch($studentResearch);
		}
                
		return true;
	}

	/**
	 * Delete a specific proposal details by article ID
	 * @param $submissionId int
	 */
	function deleteProposalDetails($submissionId) {
		$returner = $this->update(
			'DELETE FROM article_details WHERE article_id = ?',
			$submissionId
		);

		return $this->studentResearchDao->deleteStudentResearch($submissionId);
	}

	/**
	 * Check if a proposal details object exists
	 * @param $submissionId int
	 * @return boolean
	 */
	function proposalDetailsExists($submissionId) {
		$result =& $this->retrieve('SELECT count(*) FROM article_details WHERE article_id = ?', (int) $submissionId);
		$returner = $result->fields[0]?true:false;
		$result->Close();
		return $returner;
	}
        
        /**
	 * Internal function to return a proposal details object from a row.
	 * @param $row array
	 * @return ProposalDetails object
	 */
	function &_returnProposalDetailsFromRow(&$row) {
            
		$proposalDetails = new ProposalDetails();
                
		$proposalDetails->setArticleId($row['article_id']);
		$proposalDetails->setStudentResearch($row['student']);
		if(isset($row['start_date']))$proposalDetails->setStartDate(date("d-M-Y", strtotime($this->dateFromDB($row['start_date']))));
		if(isset($row['end_date']))$proposalDetails->setEndDate(date("d-M-Y", strtotime($this->dateFromDB($row['end_date']))));
                $proposalDetails->setPrimarySponsor($row['primary_sponsor']);
		$proposalDetails->setSecondarySponsors($row['secondary_sponsors']);
		$proposalDetails->setMultiCountryResearch($row['multi_country']);
		$proposalDetails->setCountries($row['countries']);
		$proposalDetails->setNationwide($row['nationwide']);
		$proposalDetails->setGeoAreas($row['geo_areas']);
		$proposalDetails->setResearchFields($row['research_fields']);
		$proposalDetails->setHumanSubjects($row['human_subjects']);
		$proposalDetails->setProposalTypes($row['proposal_types']);
		$proposalDetails->setDataCollection($row['data_collection']);
		$proposalDetails->setCommitteeReviewed($row['committee_reviewed']);

                $proposalDetails->setStudentResearchInfo($this->studentResearchDao->getStudentResearchByArticleId($row['article_id']));
                        
		HookRegistry::call('ProposalDetailsDAO::_returnProposalDetailsFromRow', array(&$proposalDetails, &$row));

		return $proposalDetails;
	}

        /**
	 * Get all possible proposal types.
	 * @param none
	 * @return array proposalTypes
	 */
	function getProposalTypes() {
		$locale = Locale::getLocale();
		$filename = "lib/pkp/locale/".$locale."/proposaltypes.xml";

		$xmlDao = new XMLDAO();
		$data = $xmlDao->parseStruct($filename, array('proposaltypes', 'proposaltype'));

		$proposalTypes = array();
		if (isset($data['proposaltypes'])) {
			$i=0;
			foreach ($data['proposaltype'] as $proposalTypeData) {
				$proposalType['code'] = $proposalTypeData['attributes']['code'];
				$proposalType['name'] = $proposalTypeData['attributes']['name'];
				array_push($proposalTypes, $proposalType);
			}
			$i++;
		}


		return $proposalTypes;

	}
	
	/**
	 * Get proposal type by code
	 */
	function getProposalType($code) {
                $proposalTypeCodeArray = explode("+", $code);
                $proposalTypeTextArray = array();
                foreach($proposalTypeCodeArray as $ptypeCode) {
                    $typeText = $this->getProposalTypeSingle($ptypeCode);
                    array_push($proposalTypeTextArray, $typeText);
                }
                
                $proposalTypeText = "";
                foreach($proposalTypeTextArray as $i => $ptype) {
                    $proposalTypeText = $proposalTypeText . $ptype;
                    if($i < count($proposalTypeTextArray)-1) $proposalTypeText = $proposalTypeText . ", ";
                }

                return $proposalTypeText;
	}

        function getProposalTypeSingle($code) {
            $proposalTypes = $this->getProposalTypes();
            foreach($proposalTypes as $pt) {
                if ($pt['code'] == $code) {
                    return $pt['name'];
                }
            }
            return $code;
        }

	/**
	 * Get all possible research fields.
	 * @param none
	 * @return array researchFields
	 */
	function getResearchFields() {
		$locale = Locale::getLocale();
		$filename = "lib/pkp/locale/".$locale."/researchFields.xml";

		$xmlDao = new XMLDAO();
		$data = $xmlDao->parseStruct($filename, array('researchFields', 'researchField'));

		$researchFields = array();
		if (isset($data['researchFields'])) {
			$i=0;
			foreach ($data['researchField'] as $researchFieldData) {
				$researchField['code'] = $researchFieldData['attributes']['code'];
				$researchField['name'] = $researchFieldData['attributes']['name'];
				array_push($researchFields, $researchField);
			}
			$i++;
		}


		return $researchFields;

	}
	
	/**
	 * Get research field by code
	 */
	function getResearchField($code) {
                $researchFieldCodeArray = explode("+", $code);
                $researchFieldTextArray = array();
                foreach($researchFieldCodeArray as $rFieldCode) {
                    $fieldText = $this->getResearchFieldSingle($rFieldCode);
                    array_push($researchFieldTextArray, $fieldText);
                }
                
                $researchFieldText = "";
                foreach($researchFieldTextArray as $i => $rField) {
                    $researchFieldText = $researchFieldText . $rField;
                    if($i < count($researchFieldTextArray)-1) $researchFieldText = $researchFieldText . ", ";
                }

                return $researchFieldText;
	}

        function getResearchFieldSingle($code) {
            $researchFields = $this->getResearchFields();
            foreach($researchFields as $rf) {
                if ($rf['code'] == $code) {
                    return $rf['name'];
                }
            }
            return $code;
        }
        

	/**
	 * Get all agencies.
	 * @param none
	 * @return array agencies
	 */
	function getAgencies() {
		$locale = Locale::getLocale();
		$filename = "lib/pkp/locale/".$locale."/agencies.xml";

		$xmlDao = new XMLDAO();
		$data = $xmlDao->parseStruct($filename, array('agencies', 'agency'));

		$agencies = array();
		if (isset($data['agencies'])) {
			$i=0;
			foreach ($data['agency'] as $agencyData) {
				$agency['code'] = $agencyData['attributes']['code'];
				$agency['name'] = $agencyData['attributes']['name'];
				array_push($agencies, $agency);
			}
			$i++;
		}


		return $agencies;

	}
	
        
	/**
	 * Get agency by code
	 */
	function getAgency($code) {
                $agencyCodeArray = explode("+", $code);
                $agencyTextArray = array();
                foreach($agencyCodeArray as $agencyCode) {
                    $aText = $this->getAgencySingle($agencyCode);
                    array_push($agencyTextArray, $aText);
                }
                
                $agencyText = "";
                foreach($agencyTextArray as $i => $agency) {
                    $agencyText = $agencyText . $agency;
                    if($i < count($agencyTextArray)-1) $agencyText = $agencyText . ", ";
                }

                return $agencyText;
	}
        
        function getAgencySingle($code) {
            $agencies = $this->getAgencies();
            foreach($agencies as $a) {
                if ($a['code'] == $code) {
                    return $a['name'];
                }
            }
            return $code;
        }

}

?>
