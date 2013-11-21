<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:45
         compiled from submission/metadata/metadata.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'submission/metadata/metadata.tpl', 14, false),array('function', 'translate', 'submission/metadata/metadata.tpl', 14, false),array('function', 'call_hook', 'submission/metadata/metadata.tpl', 15, false),array('function', 'icon', 'submission/metadata/metadata.tpl', 28, false),array('modifier', 'concat', 'submission/metadata/metadata.tpl', 26, false),array('modifier', 'to_array', 'submission/metadata/metadata.tpl', 27, false),array('modifier', 'strip_tags', 'submission/metadata/metadata.tpl', 27, false),array('modifier', 'assign', 'submission/metadata/metadata.tpl', 27, false),array('modifier', 'escape', 'submission/metadata/metadata.tpl', 28, false),)), $this); ?>

<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>

<?php if ($this->_tpl_vars['canEditMetadata'] && $this->_tpl_vars['isSectionEditor'] && $this->_tpl_vars['status'] != PROPOSAL_STATUS_COMPLETED && $this->_tpl_vars['status'] != PROPOSAL_STATUS_ARCHIVED && $this->_tpl_vars['decision'] != SUBMISSION_SECTION_DECISION_EXEMPTED && $this->_tpl_vars['decision'] != SUBMISSION_SECTION_DECISION_APPROVED): ?>
	<p><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMetadata','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.editMetadata"), $this);?>
</a></p>
	<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Submission::Metadata::Metadata::AdditionalEditItems"), $this);?>

<?php endif; ?>

<div id="authors">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
</h4>
	
<table width="100%" class="data">
	<?php $_from = $this->_tpl_vars['submission']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
	<tr valign="top">
		<td <?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?>title="First investigator of the research."<?php else: ?>title="Co-Investigator of the research."<?php endif; ?>width="20%" class="label"><?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?>[?] Investigator<?php else: ?>[?] Co-Investigator<?php endif; ?></td>
		<td width="80%" class="value">
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['author']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['author']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','redirectUrl' => $this->_tpl_vars['currentUrl'],'to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'subject' => ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)),'articleId' => $this->_tpl_vars['submission']->getId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>
<br />
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
			<?php if (( $this->_tpl_vars['author']->getAffiliation() ) != ""): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br /><?php endif; ?>
			<?php if (( $this->_tpl_vars['author']->getPhoneNumber() ) != ""): ?><?php echo $this->_tpl_vars['author']->getPhoneNumber(); ?>

			<?php endif; ?>
		</td>
	</tr>

        
	<?php if (! ($this->_foreach['authors']['iteration'] == $this->_foreach['authors']['total'])): ?>
		<tr>
			<td colspan="2" class="separator">&nbsp;</td>
		</tr>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</table>
</div>

<div id="titleAndAbstract">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.titleAndAbstract"), $this);?>
</h4>
        
<table width="100%" class="data">
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.scientificTitleInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.scientificTitle"), $this);?>
</td>
        <td class="value" width="80%"><?php echo $this->_tpl_vars['abstract']->getScientificTitle(); ?>
</td>
    </tr>
	<tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.publicTitleInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.publicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getPublicTitle(); ?>
</td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.backgroundInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getBackground(); ?>
</td>
    </tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectivesInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getObjectives(); ?>
</td>
    </tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMethodsInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMethods"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getStudyMethods(); ?>
</td>
    </tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomesInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getExpectedOutcomes(); ?>
</td>
    </tr>
	<tr><td colspan="2">&nbsp;</td></tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.keywordsInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.keywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getKeywords(); ?>
</td>
    </tr>
</table>
</div>

<div id="proposalDetails">

<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</h4>

<table width="100%" class="data">
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearchInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label">&nbsp;</td>
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitutionInstruct"), $this);?>
" class="value">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitution"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getLocalizedStudentInstitution(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label">&nbsp;</td>
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegreeInstruct"), $this);?>
" class="value">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegree"), $this);?>
 <?php echo $this->_tpl_vars['submission']->getLocalizedAcademicDegree(); ?>
</td>
    </tr>  
    <?php endif; ?>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDateInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedStartDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDateInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedEndDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsorInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedPrimarySponsor()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsorsInstruct"), $this);?>
" class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?>        
        </td>
    </tr>
    <?php endif; ?>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nationwide"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedNationwide(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedNationwide() == 'No' ) || ( $this->_tpl_vars['submission']->getLocalizedNationwide() == "Yes, with randomly selected regions" )): ?>
    <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedProposalCountryText(); ?>
</td>
    </tr>
    <?php endif; ?>
    <tr valign="top">
        <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearchInstruct"), $this);?>
"  class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearch"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryResearch(); ?>
</td>
    </tr>
	<?php if (( $this->_tpl_vars['submission']->getLocalizedMultiCountryResearch() ) == 'Yes'): ?>
	<tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryText(); ?>
</td>
    </tr>
	<?php endif; ?>
    <tr valign="top">
        <td class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedWithHumanSubjects(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedWithHumanSubjects() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['submission']->getLocalizedProposalType() )): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedProposalTypeText(); ?>

        	<?php endif; ?>         
        </td>
    </tr>
    <?php endif; ?>
    
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value">
            <?php if ($this->_tpl_vars['submission']->getLocalizedResearchField()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedResearchFieldText(); ?>

        	<?php endif; ?>
        </td>
    </tr>

    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedDataCollection(); ?>
</td>
    </tr>   
    <tr valign="top">
        <td class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedReviewedByOtherErc(); ?>
<?php if ($this->_tpl_vars['submission']->getLocalizedOtherErcDecision() != 'NA'): ?>(<?php echo $this->_tpl_vars['submission']->getLocalizedOtherErcDecision(); ?>
)<?php endif; ?></td>
    </tr>
</table>
</div>

<div id="sourceOfMonetary">

<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sourceOfMonetary"), $this);?>
</h4>

<table width="100%" class="data">
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequired"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedFundsRequired(); ?>
 <?php echo $this->_tpl_vars['submission']->getLocalizedSelectedCurrency(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedIndustryGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedIndustryGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedNameOfIndustry(); ?>
</td>
    </tr>   
    <?php endif; ?>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedInternationalGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedInternationalGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedInternationalGrantName()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedInternationalGrantNameText(); ?>
 
        	<?php endif; ?>
        </td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMohGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedGovernmentGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedGovernmentGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedGovernmentGrantName(); ?>
</td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedUniversityGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedSelfFunding(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedOtherGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedOtherGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedSpecifyOtherGrant(); ?>
</td>
    </tr>    
    <?php endif; ?>
</table>
</div>

<h4><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</h4>
<div id=riskAssessments>
	<table class="listing" width="100%">
    	<tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludesHumanSubject"), $this);?>
</b></td></tr>
    	<tr valign="top" id="identityRevealedField">
    	    <td class="label" width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.identityRevealed"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getIdentityRevealed() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="unableToConsentField">
        	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.unableToConsent"), $this);?>
</td>
        	<td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getUnableToConsent() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="under18Field">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.under18"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getUnder18() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="dependentRelationshipField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dependentRelationship"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getDependentRelationship() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="ethnicMinorityField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.ethnicMinority"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getEthnicMinority() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="impairmentField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.impairment"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getImpairment() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="pregnantField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.pregnant"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getPregnant() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    	<tr valign="top" id="newTreatmentField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.newTreatment"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getNewTreatment() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="bioSamplesField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bioSamples"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getBioSamples() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="radiationField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.radiation"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getRadiation() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="distressField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.distress"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getDistress() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="inducementsField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.inducements"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getInducements() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="sensitiveInfoField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sensitiveInfo"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getSensitiveInfo() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="deceptionField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.deception"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getDeception() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="reproTechnologyField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reproTechnology"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getReproTechnology() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="geneticsField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.genetic"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getGenetic() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="stemCellField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.stemCell"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getStemCell() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="biosafetyField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.biosafety"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getBiosafety() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
    	<tr valign="top" id="riskLevelField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevel"), $this);?>
</td>
    	    <td class="value">
    	    <?php if ($this->_tpl_vars['riskAssessment']->getRiskLevel() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelNoMore"), $this);?>

    	    <?php elseif ($this->_tpl_vars['riskAssessment']->getRiskLevel() == '2'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMinore"), $this);?>

    	    <?php elseif ($this->_tpl_vars['riskAssessment']->getRiskLevel() == '3'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMore"), $this);?>

    	    <?php endif; ?>
    	    </td>
    	</tr>
    	<?php if ($this->_tpl_vars['riskAssessment']->getRiskLevel() != '1'): ?>
    	<tr valign="top" id="listRisksField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.listRisks"), $this);?>
</td>
    	    <td class="value"><?php echo $this->_tpl_vars['riskAssessment']->getListRisks(); ?>
</td>
    	</tr>
    	<tr valign="top" id="howRisksMinimizedField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.howRisksMinimized"), $this);?>
</td>
    	    <td class="value"><?php echo $this->_tpl_vars['riskAssessment']->getHowRisksMinimized(); ?>
</td>
    	</tr>
    	<?php endif; ?>
    	<tr valign="top" id="riskApplyToField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskApplyTo"), $this);?>
</td>
    	    <td class="value">
    	    <?php $this->assign('firstRisk', '0'); ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getRisksToTeam() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchTeam"), $this);?>

    	    	<?php $this->assign('firstRisk', '1'); ?>	
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getRisksToSubjects() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchSubjects"), $this);?>

    	    	<?php $this->assign('firstRisk', '1'); ?>
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getRisksToCommunity() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstRisk'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.widerCommunity"), $this);?>

    	    	<?php $this->assign('firstRisk', '1'); ?>
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getRisksToTeam() != '1' && $this->_tpl_vars['riskAssessment']->getRisksToSubjects() != '1' && $this->_tpl_vars['riskAssessment']->getRisksToCommunity() != '1'): ?>
    	    	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nobody"), $this);?>

    	    <?php endif; ?>
    	    </td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.potentialBenefits"), $this);?>
</b></td></tr>
    	<tr valign="top" id="benefitsFromTheProjectField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.benefitsFromTheProject"), $this);?>
</td>
    	    <td class="value">
    	    <?php $this->assign('firstBenefits', '0'); ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getBenefitsToParticipants() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.directBenefits"), $this);?>

    	    	<?php $this->assign('firstBenefits', '1'); ?>
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getKnowledgeOnCondition() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.participantCondition"), $this);?>

    	    	<?php $this->assign('firstBenefits', '1'); ?>
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getKnowledgeOnDisease() == '1'): ?>
    	    	<?php if ($this->_tpl_vars['firstBenefits'] == '1'): ?> & <?php endif; ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.diseaseOrCondition"), $this);?>

    	    	<?php $this->assign('firstBenefits', '1'); ?>
    	    <?php endif; ?>
    	    <?php if ($this->_tpl_vars['riskAssessment']->getBenefitsToParticipants() != '1' && $this->_tpl_vars['riskAssessment']->getKnowledgeOnCondition() != '1' && $this->_tpl_vars['riskAssessment']->getKnowledgeOnDisease() != '1'): ?>
    	    	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.noBenefits"), $this);?>

    	    <?php endif; ?>
    	    </td>
    	</tr>
    	<tr valign="top" id="multiInstitutionsField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiInstitutions"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getMultiInstitutions() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    	<tr valign="top" id="conflictOfInterestField">
    	    <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.conflictOfInterest"), $this);?>
</td>
    	    <td class="value"><?php if ($this->_tpl_vars['riskAssessment']->getConflictOfInterest() == '1'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>
<?php elseif ($this->_tpl_vars['riskAssessment']->getConflictOfInterest() == '3'): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.notSure"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
<?php endif; ?></td>
    	</tr>
    </table>
</div>