<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:16
         compiled from author/submit/complete.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submit/complete.tpl', 18, false),array('function', 'url', 'author/submit/complete.tpl', 407, false),array('modifier', 'escape', 'author/submit/complete.tpl', 29, false),array('modifier', 'to_array', 'author/submit/complete.tpl', 407, false),array('modifier', 'date_format', 'author/submit/complete.tpl', 410, false),array('modifier', 'assign', 'author/submit/complete.tpl', 425, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "author.track"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<div id="submissionComplete">

<p style="font-size: larger;"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submissionComplete",'journalTitle' => $this->_tpl_vars['journal']->getLocalizedTitle()), $this);?>
</p>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.metadata"), $this);?>
</h3>
<table class="listing" width="100%">
    <tr valign="top">
        <td colspan="5" class="headseparator">&nbsp;</td>
    </tr>
<?php $_from = $this->_tpl_vars['article']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
	<tr valign="top">
        <td class="label"><?php if ($this->_tpl_vars['author']->getPrimaryContact()): ?>Investigator<?php else: ?>Co-Investigator<?php endif; ?></td>
        <td class="value">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
			<?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getEmail())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br />
			<?php if (( $this->_tpl_vars['author']->getAffiliation() ) != ""): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['author']->getAffiliation())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<br/><?php endif; ?>
			<?php if (( $this->_tpl_vars['author']->getPhoneNumber() ) != ""): ?><?php echo $this->_tpl_vars['author']->getPhoneNumber(); ?>
<?php endif; ?>
        </td>
    </tr>
<?php endforeach; endif; unset($_from); ?>
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.titleAndAbstract"), $this);?>
</h4></td></tr>
	
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.scientificTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getScientificTitle(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.publicTitle"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getPublicTitle(); ?>
</td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.background"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getBackground(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectives"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getObjectives(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMethods"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getStudyMethods(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomes"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getExpectedOutcomes(); ?>
</td>
    </tr>
    <tr><td colspan="2">&nbsp;</td></tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.keywords"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['abstract']->getKeywords(); ?>
</td>
    </tr>
	<tr valign="top"><td colspan="2"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</h4></td></tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedStudentInitiatedResearch(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedStudentInitiatedResearch() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitution"), $this);?>
 <?php echo $this->_tpl_vars['article']->getLocalizedStudentInstitution(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegree"), $this);?>
 <?php echo $this->_tpl_vars['article']->getLocalizedAcademicDegree(); ?>
</td>
    </tr>  
    <?php endif; ?>

    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedStartDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedEndDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequired"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedFundsRequired(); ?>
 <?php echo $this->_tpl_vars['article']->getLocalizedSelectedCurrency(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedPrimarySponsor()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['article']->getLocalizedSecondarySponsors()): ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?>        
        </td>
    </tr>
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nationwide"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedNationwide(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedNationwide() == 'No' ) || ( $this->_tpl_vars['article']->getLocalizedNationwide() == "Yes, with randomly selected regions" )): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedProposalCountryText(); ?>
</td>
    </tr>
    <?php endif; ?>

    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearch"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedMultiCountryResearch(); ?>
</td>
    </tr>
	<?php if (( $this->_tpl_vars['article']->getLocalizedMultiCountryResearch() ) == 'Yes'): ?>
	<tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedMultiCountryText(); ?>
</td>
    </tr>
	<?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedWithHumanSubjects(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedWithHumanSubjects() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['article']->getLocalizedProposalType() )): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedProposalTypeText(); ?>

        	<?php endif; ?>      
        </td>
    </tr>
    <?php endif; ?>
    
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedResearchField()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedResearchFieldText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedDataCollection(); ?>
</td>
    </tr>   
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedReviewedByOtherErc(); ?>
<?php if ($this->_tpl_vars['article']->getLocalizedOtherErcDecision() != 'NA'): ?>(<?php echo $this->_tpl_vars['article']->getLocalizedOtherErcDecision(); ?>
)<?php endif; ?></td>
    </tr>

	<tr><td colspan="2"><br/><h4>Source(s) of monetary or material support</h4></td></tr>
    
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedIndustryGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedIndustryGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedNameOfIndustry(); ?>
</td>
    </tr>   
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedInternationalGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedInternationalGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['article']->getLocalizedInternationalGrantName()): ?>
        		<?php echo $this->_tpl_vars['article']->getLocalizedInternationalGrantNameText(); ?>
 
        	<?php endif; ?>
        </td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedMohGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedGovernmentGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedGovernmentGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedGovernmentGrantName(); ?>
</td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedUniversityGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedSelfFunding(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedOtherGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['article']->getLocalizedOtherGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['article']->getLocalizedSpecifyOtherGrant(); ?>
</td>
    </tr>    
    <?php endif; ?>
</table>
<div class="separator"></div>

<br />

<h3><br/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</h3>
<div id=riskAssessments>
	<table class="listing" width="100%">
	    <tr valign="top">
        	<td colspan="2" class="headseparator">&nbsp;</td>
   		</tr>
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

<div class="separator"></div>

<br/> 

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.filesSummary"), $this);?>
</h3>
<table class="listing" width="100%">
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<tr class="heading" valign="bottom">
	<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
	<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.originalFileName"), $this);?>
</td>
	<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.type"), $this);?>
</td>
	<td width="20%" class="nowrap"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileSize"), $this);?>
</td>
	<td width="10%" class="nowrap"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateUploaded"), $this);?>
</td>
</tr>
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
<?php if (( $this->_tpl_vars['file']->getType() == 'supp' || $this->_tpl_vars['file']->getType() == 'submission/original' )): ?>
<tr valign="top">
	<td><?php echo $this->_tpl_vars['file']->getFileId(); ?>
</td>
	<td><a class="file" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'download','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['file']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['file']->getFileId()))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getOriginalFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
	<td><?php if (( $this->_tpl_vars['file']->getType() == 'supp' )): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.suppFile"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submissionFile"), $this);?>
<?php endif; ?></td>
	<td><?php echo $this->_tpl_vars['file']->getNiceFileSize(); ?>
</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getDateUploaded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
</tr>
<?php endif; ?>
<?php endforeach; else: ?>
<tr valign="top">
<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.noFiles"), $this);?>
</td>
</tr>
<?php endif; unset($_from); ?>
</table>

<div class="separator"></div>

<br />
<!--
<?php if ($this->_tpl_vars['canExpedite']): ?>
	<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'expediteSubmission','articleId' => $this->_tpl_vars['articleId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'expediteUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'expediteUrl'));?>

	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.expedite",'expediteUrl' => $this->_tpl_vars['expediteUrl']), $this);?>

<?php endif; ?>
<?php if ($this->_tpl_vars['paymentButtonsTemplate']): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['paymentButtonsTemplate'], 'smarty_include_vars' => array('orientation' => 'vertical')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php endif; ?>
-->

<p>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.track"), $this);?>
</a></p>

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
