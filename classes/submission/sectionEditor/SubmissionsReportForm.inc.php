<?php

/**
 * @defgroup sectionEditor_form
 */

/**
 * @file /classes/submission/sectionEditor/form/SubmissionReportForm.inc.php
 *
 * Added by MSB. Last Updated: Oct 13, 2011
 * @class SubmissionsReportForm
 * @ingroup sectionEditor_form
 *
 * @brief Form for section editors to generate meeting attendance report form.
 */


import('lib.pkp.classes.form.Form');
import('classes.submission.common.Action');

class SubmissionsReportForm extends Form {
	/**
	 * Constructor.
	 */
	function SubmissionsReportForm() {
		parent::Form('sectionEditor/reports/submissionsReport.tpl');
		// Validation checks for this form
		$this->addCheck(new FormValidatorPost($this));
		//$this->addCheck(new FormValidator($this,'countries', 'required', 'editor.reports.countryRequired'));
		//$this->addCheck(new FormValidator($this,'decisions', 'required', 'editor.reports.decisionRequired'));
	}
	
	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(array(
			'decisions',
			'countries',
		));
	}

	function display() {
                $journal = Request::getJournal();
            
		$countryDao =& DAORegistry::getDAO('CountryDAO');
                $proposalDetailsDao =& DAORegistry::getDAO('ProposalDetailsDAO');
                $studentResearchDao =& DAORegistry::getDAO('StudentResearchDAO');
                $regionDAO =& DAORegistry::getDAO('AreasOfTheCountryDAO');
		$institutionDao =& DAORegistry::getDAO('InstitutionDAO');
		$riskAssessmentDao =& DAORegistry::getDAO('RiskAssessmentDAO');
		$currencyDao =& DAORegistry::getDAO('CurrencyDAO');
                
                $institutionsList = $institutionDao->getInstitutionsList();
                $institutionsListWithOther = $institutionsList + array('OTHER' => Locale::translate('common.other'));
                $sourceCurrencyId = $journal->getSetting('sourceCurrency');

                $templateMgr =& TemplateManager::getManager();
		$decisionOptions = array(
                    SUBMISSION_SECTION_DECISION_APPROVED => 'editor.article.decision.approved',
                    SUBMISSION_SECTION_DECISION_RESUBMIT => 'editor.article.decision.resubmit',
                    SUBMISSION_SECTION_DECISION_DECLINED => 'editor.article.decision.declined',
                    SUBMISSION_SECTION_DECISION_COMPLETE => 'editor.article.decision.complete',
                    SUBMISSION_SECTION_DECISION_INCOMPLETE => 'editor.article.decision.incomplete',
                    SUBMISSION_SECTION_DECISION_EXEMPTED => 'editor.article.decision.exempted',
                    SUBMISSION_SECTION_DECISION_FULL_REVIEW => 'editor.article.decision.fullReview',
                    SUBMISSION_SECTION_DECISION_EXPEDITED => 'editor.article.decision.expedited'
		);
		$templateMgr->assign_by_ref('decisionsOptions', $decisionOptions);
                
                $templateMgr->assign('coutryList', $countryDao->getCountries());
                $templateMgr->assign('proposalTypesList', $proposalDetailsDao->getProposalTypes());
                $templateMgr->assign('researchFieldsList', $proposalDetailsDao->getResearchFields());
                $templateMgr->assign('dataCollectionArray', $proposalDetailsDao->getDataCollectionArray());
                $templateMgr->assign('otherErcDecisionArray', $proposalDetailsDao->getOtherErcDecisionArray());
                $templateMgr->assign('academicDegreesArray', $studentResearchDao->getAcademicDegreesArray());
                $templateMgr->assign('geoAreasList', $regionDAO->getAreasOfTheCountry());
                $templateMgr->assign('institutionsList', $institutionsListWithOther);
                $templateMgr->assign('sourceCurrency', $currencyDao->getCurrencyByAlphaCode($sourceCurrencyId));
                $templateMgr->assign('riskAssessmentYesNoArray', $riskAssessmentDao->getYesNoArray());
                $templateMgr->assign('riskAssessmentLevelsOfRisk', $riskAssessmentDao->getLevelOfRiskArray());
                $templateMgr->assign('riskAssessmentConflictOfInterestArray', $riskAssessmentDao->getConflictOfInterestArray());
                
                $fromDate = Request::getUserDateVar('dateFrom', 1, 1);
                if ($fromDate !== null) $fromDate = date('Y-m-d H:i:s', $fromDate);
                $toDate = Request::getUserDateVar('dateTo', 32, 12, null, 23, 59, 59);
                if ($toDate !== null) $toDate = date('Y-m-d H:i:s', $toDate);
                $templateMgr->assign('dateFrom', $fromDate);
                $templateMgr->assign('dateTo', $toDate);
        
     	        parent::display();
	}

	
}

?>
