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
	        
        function display() {
                $journal = Request::getJournal();
            
		$countryDao =& DAORegistry::getDAO('CountryDAO');
                $proposalDetailsDao =& DAORegistry::getDAO('ProposalDetailsDAO');
                $regionDAO =& DAORegistry::getDAO('AreasOfTheCountryDAO');
		$institutionDao =& DAORegistry::getDAO('InstitutionDAO');
		$riskAssessmentDao =& DAORegistry::getDAO('RiskAssessmentDAO');
		$currencyDao =& DAORegistry::getDAO('CurrencyDAO');
		$sectionDao =& DAORegistry::getDAO('SectionDAO');
		
                $sectionOptions = array('0' => Locale::translate('editor.reports.anyCommittee')) + $sectionDao->getSectionTitles($journal->getId());
                $decisionTypes = array(
                    INITIAL_REVIEW => 'submission.initialReview',
                    CONTINUING_REVIEW => 'submission.continuingReview',
                    PROTOCOL_AMENDMENT => 'submission.protocolAmendment',
                    SERIOUS_ADVERSE_EVENT => 'submission.seriousAdverseEvents',
                    END_OF_STUDY => 'submission.endOfStudy'
		);
		$decisionOptions = array(
                    98 => 'editor.reports.aDecisionsIUR',
                    99 => 'editor.reports.aDecisionsEUR',
                    SUBMISSION_SECTION_DECISION_APPROVED => 'editor.article.decision.approved',
                    SUBMISSION_SECTION_DECISION_RESUBMIT => 'editor.article.decision.resubmit',
                    SUBMISSION_SECTION_DECISION_DECLINED => 'editor.article.decision.declined'
		);
                $budgetOptions = array(
                    ">=" => 'editor.reports.budgetSuperiorTo',
                    "<=" => 'editor.reports.budgetInferiorTo'
		);
                $sourceCurrencyId = $journal->getSetting('sourceCurrency');
                $reportTypeOptions = array(
                    0 => 'editor.reports.type.spreadsheet',
                    1 => 'editor.reports.type.linePLot',
                    2 => 'editor.reports.type.barPlot',
                    3 => 'editor.reports.type.piePlot'
		);
                
                $templateMgr =& TemplateManager::getManager();
                $templateMgr->assign('sectionOptions', $sectionOptions);
		$templateMgr->assign('decisionTypes', $decisionTypes);
		$templateMgr->assign('decisionOptions', $decisionOptions);
                $templateMgr->assign('proposalDetailYesNoArray', $proposalDetailsDao->getYesNoArray());
                $templateMgr->assign('institutionsList', $institutionDao->getInstitutionsList());
                $templateMgr->assign('coutryList', $countryDao->getCountries());
                $templateMgr->assign('geoAreasList', $regionDAO->getAreasOfTheCountry());
                $templateMgr->assign('researchFieldsList', $proposalDetailsDao->getResearchFields());
                $templateMgr->assign('proposalTypesList', $proposalDetailsDao->getProposalTypes());
                $templateMgr->assign('dataCollectionArray', $proposalDetailsDao->getDataCollectionArray());
                $templateMgr->assign('budgetOptions', $budgetOptions);                
                $templateMgr->assign('sourceCurrency', $currencyDao->getCurrencyByAlphaCode($sourceCurrencyId));
                $templateMgr->assign('riskAssessmentYesNoArray', $riskAssessmentDao->getYesNoArray());
                $templateMgr->assign('reportTypeOptions', $reportTypeOptions);
                
     	        parent::display();
	}     
}

?>
