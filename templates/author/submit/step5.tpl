{**
 * step5.tpl
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Step 5 of author article submission.
 *
 * $Id$
 *}
{assign var="pageTitle" value="author.submit.step5"}
{include file="author/submit/submitHeader.tpl"}

<script type="text/javascript">
{literal}
<!--
function checkSubmissionChecklist(elements) {
	if (elements.type == 'checkbox' && !elements.checked) {
		alert({/literal}'Please confirm that you sent the proposal review fee to the appropriate ethics committee.'{literal});
		return false;
	}
	return true;
}
// -->
{/literal}
</script>

<p>{translate key="author.submit.confirmationDescription" journalTitle=$journal->getLocalizedTitle()}</p>

<form method="post" action="{url op="saveSubmit" path=$submitStep}">
<input type="hidden" name="articleId" value="{$articleId|escape}" />
{include file="common/formErrors.tpl"}

<h1>{translate key="article.metadata"}</h1>
<p>{$section->getSectionTitle()}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="1" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></p>

<div id="Authors">
<h4>{translate key="article.authors"}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="2" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></h4>
<table class="listing" width="100%">
    <tr valign="top">
        <td colspan="5" class="headseparator">&nbsp;</td>
    </tr>
{foreach name=authors from=$article->getAuthors() item=author}
	<tr valign="top">
		<td width="20%" class="label">{if $author->getPrimaryContact()}{translate key="user.role.primaryInvestigator"}{else}{translate key="user.role.coinvestigator"}{/if}</td>
        <td class="value">
			{$author->getFullName()|escape}<br />
			{$author->getEmail()|escape}<br />
			{if ($author->getAffiliation()) != ""}{$author->getAffiliation()|escape}<br/>{/if}
			{if ($author->getPhoneNumber()) != ""}{$author->getPhoneNumber()|escape}<br/>{/if}
        </td>
    </tr>
{/foreach}
</table>
</div>


<div id="titleAndAbstract">

<h4><br/>{translate key="submission.titleAndAbstract"}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="2" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></h4>
<div class="separator"></div>

{assign var="abstracts" value=$article->getAbstracts()}

{foreach from=$abstractLocales item=localeName key=localeKey}
	
	<h6>{$localeName} {translate key="common.language"}</h6>
	
	{assign var="abstract" value=$abstracts[$localeKey]}

	<table class="listing" width="100%">
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.scientificTitle"}</td>
        	<td class="value">{$abstract->getScientificTitle()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.publicTitle"}</td>
        	<td class="value">{$abstract->getPublicTitle()}</td>
    	</tr>
    	<tr><td colspan="2">&nbsp;</td></tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.background"}</td>
        	<td class="value">{$abstract->getBackground()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.objectives"}</td>
        	<td class="value">{$abstract->getObjectives()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.studyMethods"}</td>
        	<td class="value">{$abstract->getStudyMethods()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.expectedOutcomes"}</td>
        	<td class="value">{$abstract->getExpectedOutcomes()}</td>
    	</tr>
    	<tr><td colspan="2">&nbsp;</td></tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.keywords"}</td>
        	<td class="value">{$abstract->getKeywords()}</td>
    	</tr>
	</table>
{/foreach}
</div>

<div id="proposalDetails">
	<h4><br/>{translate key="submission.proposalDetails"}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="2" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></h4>
	<div class="separator"></div>

	{assign var="proposalDetails" value=$article->getProposalDetails()}
	
	<table class="listing" width="100%">
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.studentInitiatedResearch"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getStudentResearch())}</td>
    	</tr>
    	{if ($proposalDetails->getStudentResearch()) == PROPOSAL_DETAIL_YES}
			{assign var="studentResearch" value=$proposalDetails->getStudentResearchInfo()}
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{translate key="proposal.studentInstitution"}: {$studentResearch->getInstitution()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{translate key="proposal.academicDegree"}: {translate key=$studentResearch->getDegreeKey()}</td>
    		</tr>
        	<tr valign="top" id="supervisor"><td class="label" width="20%">&nbsp;</td><td class="value"><b>{translate key="proposal.studentSupervisor"}</b></td></tr>
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{translate key="proposal.studentSupervisorName"}: {$studentResearch->getSupervisorName()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{translate key="user.email"}: {$studentResearch->getSupervisorEmail()}</td>
    		</tr>
        	<tr valign="top"><td class="label" width="20%">&nbsp;</td><td class="value">&nbsp;</td></tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.startDate"}</td>
        	<td class="value">{$proposalDetails->getStartDate()}</td>
   	 	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.endDate"}</td>
        	<td class="value">{$proposalDetails->getEndDate()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.primarySponsor"}</td>
        	<td class="value">{$proposalDetails->getLocalizedPrimarySponsorText()}</td>
    	</tr>
    	{if $proposalDetails->getSecondarySponsors()}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.secondarySponsors"}</td>
        	<td class="value">{$proposalDetails->getLocalizedSecondarySponsorText()}</td>
    	</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.multiCountryResearch"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getMultiCountryResearch())}</td>
    	</tr>
		{if ($proposalDetails->getMultiCountryResearch()) == PROPOSAL_DETAIL_YES}
			<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedMultiCountryText()}</td>
    		</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.nationwide"}</td>
        	<td class="value">{translate key=$proposalDetails->getNationwideKey()}</td>
   	 	</tr>
    	{if $proposalDetails->getNationwide() == PROPOSAL_DETAIL_NO || $proposalDetails->getNationwide() == PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS}
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedGeoAreasText()}</td>
    		</tr>
		{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.researchField"}</td>
        	<td class="value">{$proposalDetails->getLocalizedResearchFieldText()}</td>
    	</tr>	
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.withHumanSubjects"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getHumanSubjects())}</td>
    	</tr>
    	{if ($proposalDetails->getHumanSubjects()) == PROPOSAL_DETAIL_YES}
    		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedProposalTypeText()}</td>
   			</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.dataCollection"}</td>
        	<td class="value">{translate key=$proposalDetails->getDataCollectionKey()}</td>
    	</tr>   
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.reviewedByOtherErc"}</td>
        	<td class="value">{translate key=$proposalDetails->getCommitteeReviewedKey()}</td>
    	</tr>
	</table>
</div>

<div id="sourceOfMonetary">
	<h4><br/>{translate key="proposal.sourceOfMonetary"}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="2" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></h4>
	<div class="separator"></div>
	<table class="listing" width="100%">
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.fundsRequired"}</td>
        	<td class="value">{$article->getLocalizedFundsRequired()} {$article->getLocalizedSelectedCurrency()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.industryGrant"}</td>
        	<td class="value">{$article->getLocalizedIndustryGrant()}</td>
    	</tr>
    	{if ($article->getLocalizedIndustryGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$article->getLocalizedNameOfIndustry()}</td>
    		</tr>   
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.internationalGrant"}</td>
        	<td class="value">{$article->getLocalizedInternationalGrant()}</td>
    	</tr>
    	{if ($article->getLocalizedInternationalGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">
        			{if $article->getLocalizedInternationalGrantName()}
        				{$article->getLocalizedInternationalGrantNameText()} 
        			{/if}
        		</td>
    		</tr>     
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.mohGrant"}</td>
        	<td class="value">{$article->getLocalizedMohGrant()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.governmentGrant"}</td>
        	<td class="value">{$article->getLocalizedGovernmentGrant()}</td>
    	</tr>
    	{if ($article->getLocalizedGovernmentGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$article->getLocalizedGovernmentGrantName()}</td>
    		</tr>     
    	{/if}
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.universityGrant"}</td>
        	<td class="value">{$article->getLocalizedUniversityGrant()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.selfFunding"}</td>
        	<td class="value">{$article->getLocalizedSelfFunding()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="20%">{translate key="proposal.otherGrant"}</td>
        	<td class="value">{$article->getLocalizedOtherGrant()}</td>
    	</tr>
    	{if ($article->getLocalizedOtherGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="20%">&nbsp;</td>
        		<td class="value">{$article->getLocalizedSpecifyOtherGrant()}</td>
    		</tr>    
    	{/if}
	</table>
</div>

<div id=riskAssessments>
	<h4><br/>{translate key="proposal.riskAssessment"}&nbsp;&nbsp;&nbsp;<a href="{url op="submit" path="2" articleId=$article->getId()}"><i>{translate key="common.modify"}</i></a></h4>
	<div class="separator"></div>

	{assign var="riskAssessment" value=$article->getRiskAssessment()}

	<table class="listing" width="100%">
    	<tr valign="top"><td colspan="2"><b>{translate key="proposal.researchIncludesHumanSubject"}</b></td></tr>
    	<tr valign="top" id="identityRevealedField">
    	    <td class="label" width="30%">{translate key="proposal.identityRevealed"}</td>
    	    <td class="value">{if $riskAssessment->getIdentityRevealed() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="unableToConsentField">
        	<td class="label" width="20%">{translate key="proposal.unableToConsent"}</td>
        	<td class="value">{if $riskAssessment->getUnableToConsent() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="under18Field">
    	    <td class="label" width="20%">{translate key="proposal.under18"}</td>
    	    <td class="value">{if $riskAssessment->getUnder18() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="dependentRelationshipField">
    	    <td class="label" width="20%">{translate key="proposal.dependentRelationship"}</td>
    	    <td class="value">{if $riskAssessment->getDependentRelationship() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="ethnicMinorityField">
    	    <td class="label" width="20%">{translate key="proposal.ethnicMinority"}</td>
    	    <td class="value">{if $riskAssessment->getEthnicMinority() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="impairmentField">
    	    <td class="label" width="20%">{translate key="proposal.impairment"}</td>
    	    <td class="value">{if $riskAssessment->getImpairment() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="pregnantField">
    	    <td class="label" width="20%">{translate key="proposal.pregnant"}</td>
    	    <td class="value">{if $riskAssessment->getPregnant() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/>{translate key="proposal.researchIncludes"}</b></td></tr>
    	<tr valign="top" id="newTreatmentField">
    	    <td class="label" width="20%">{translate key="proposal.newTreatment"}</td>
    	    <td class="value">{if $riskAssessment->getNewTreatment() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="bioSamplesField">
    	    <td class="label" width="20%">{translate key="proposal.bioSamples"}</td>
    	    <td class="value">{if $riskAssessment->getBioSamples() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="radiationField">
    	    <td class="label" width="20%">{translate key="proposal.radiation"}</td>
    	    <td class="value">{if $riskAssessment->getRadiation() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="distressField">
    	    <td class="label" width="20%">{translate key="proposal.distress"}</td>
    	    <td class="value">{if $riskAssessment->getDistress() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="inducementsField">
    	    <td class="label" width="20%">{translate key="proposal.inducements"}</td>
    	    <td class="value">{if $riskAssessment->getInducements() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="sensitiveInfoField">
    	    <td class="label" width="20%">{translate key="proposal.sensitiveInfo"}</td>
    	    <td class="value">{if $riskAssessment->getSensitiveInfo() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="deceptionField">
    	    <td class="label" width="20%">{translate key="proposal.deception"}</td>
    	    <td class="value">{if $riskAssessment->getDeception() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="reproTechnologyField">
    	    <td class="label" width="20%">{translate key="proposal.reproTechnology"}</td>
    	    <td class="value">{if $riskAssessment->getReproTechnology() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="geneticsField">
    	    <td class="label" width="20%">{translate key="proposal.genetic"}</td>
    	    <td class="value">{if $riskAssessment->getGenetic() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="stemCellField">
    	    <td class="label" width="20%">{translate key="proposal.stemCell"}</td>
    	    <td class="value">{if $riskAssessment->getStemCell() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="biosafetyField">
    	    <td class="label" width="20%">{translate key="proposal.biosafety"}</td>
    	    <td class="value">{if $riskAssessment->getBiosafety() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/>{translate key="proposal.potentialRisk"}</b></td></tr>
    	<tr valign="top" id="riskLevelField">
    	    <td class="label" width="20%">{translate key="proposal.riskLevel"}</td>
    	    <td class="value">
    	    {if $riskAssessment->getRiskLevel() == "1"}{translate key="proposal.riskLevelNoMore"}
    	    {elseif $riskAssessment->getRiskLevel() == "2"}{translate key="proposal.riskLevelMinore"}
    	    {elseif $riskAssessment->getRiskLevel() == "3"}{translate key="proposal.riskLevelMore"}
    	    {/if}
    	    </td>
    	</tr>
    	{if $riskAssessment->getRiskLevel() != '1'}
    	<tr valign="top" id="listRisksField">
    	    <td class="label" width="20%">{translate key="proposal.listRisks"}</td>
    	    <td class="value">{$riskAssessment->getListRisks()}</td>
    	</tr>
    	<tr valign="top" id="howRisksMinimizedField">
    	    <td class="label" width="20%">{translate key="proposal.howRisksMinimized"}</td>
    	    <td class="value">{$riskAssessment->getHowRisksMinimized()}</td>
    	</tr>
    	{/if}
    	<tr valign="top" id="riskApplyToField">
    	    <td class="label" width="20%">{translate key="proposal.riskApplyTo"}</td>
    	    <td class="value">
    	    {assign var="firstRisk" value="0"}
    	    {if $riskAssessment->getRisksToTeam() == '1'}
    	    	{if $firstRisk == '1'} & {/if}{translate key="proposal.researchTeam"}
    	    	{assign var="firstRisk" value="1"}	
    	    {/if}
    	    {if $riskAssessment->getRisksToSubjects() == '1'}
    	    	{if $firstRisk == '1'} & {/if}{translate key="proposal.researchSubjects"}
    	    	{assign var="firstRisk" value="1"}
    	    {/if}
    	    {if $riskAssessment->getRisksToCommunity() == '1'}
    	    	{if $firstRisk == '1'} & {/if}{translate key="proposal.widerCommunity"}
    	    	{assign var="firstRisk" value="1"}
    	    {/if}
    	    {if $riskAssessment->getRisksToTeam() != '1' && $riskAssessment->getRisksToSubjects() != '1' && $riskAssessment->getRisksToCommunity() != '1'}
    	    	{translate key="proposal.nobody"}
    	    {/if}
    	    </td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/>{translate key="proposal.potentialBenefits"}</b></td></tr>
    	<tr valign="top" id="benefitsFromTheProjectField">
    	    <td class="label" width="20%">{translate key="proposal.benefitsFromTheProject"}</td>
    	    <td class="value">
    	    {assign var="firstBenefits" value="0"}
    	    {if $riskAssessment->getBenefitsToParticipants() == '1'}
    	    	{if $firstBenefits == '1'} & {/if}{translate key="proposal.directBenefits"}
    	    	{assign var="firstBenefits" value="1"}
    	    {/if}
    	    {if $riskAssessment->getKnowledgeOnCondition() == '1'}
    	    	{if $firstBenefits == '1'} & {/if}{translate key="proposal.participantCondition"}
    	    	{assign var="firstBenefits" value="1"}
    	    {/if}
    	    {if $riskAssessment->getKnowledgeOnDisease() == '1'}
    	    	{if $firstBenefits == '1'} & {/if}{translate key="proposal.diseaseOrCondition"}
    	    	{assign var="firstBenefits" value="1"}
    	    {/if}
    	    {if $riskAssessment->getBenefitsToParticipants() != '1' && $riskAssessment->getKnowledgeOnCondition() != '1' && $riskAssessment->getKnowledgeOnDisease() != '1'}
    	    	{translate key="proposal.noBenefits"}
    	    {/if}
    	    </td>
    	</tr>
    	<tr valign="top" id="multiInstitutionsField">
    	    <td class="label" width="20%">{translate key="proposal.multiInstitutions"}</td>
    	    <td class="value">{if $riskAssessment->getMultiInstitutions() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="conflictOfInterestField">
    	    <td class="label" width="20%">{translate key="proposal.conflictOfInterest"}</td>
    	    <td class="value">{if $riskAssessment->getConflictOfInterest() == "1"}{translate key="common.yes"}{elseif $riskAssessment->getConflictOfInterest() == "3"}{translate key="common.notSure"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    </table>
</div>

<div class="separator"></div>

{* Commented out by EL on May 2 2012: Unuseful*}
{* <span style="font-size: smaller; font-style: italic;">To edit proposal details, <a href="{url op="submit" path="3" articleId=$articleId}">click here to go back Step 3.</a></span> *}

<br />
<br />

<h3>{translate key="author.submit.filesSummary"}</h3>
<table class="listing" width="100%">
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<tr class="heading" valign="bottom">
	<!--td width="10%">{translate key="common.id"}</td-->
	<td width="35%">{translate key="common.originalFileName"}</td>
	<td width="25%">{translate key="common.type"}</td>
	<td width="20%" class="nowrap">{translate key="common.fileSize"}</td>
	<td width="10%" class="nowrap">{translate key="common.dateUploaded"}</td>
</tr>
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
{foreach from=$files item=file}
<tr valign="top">
	<!--td>{$file->getFileId()}</td-->
	<td><a class="file" href="{url op="download" path=$articleId|to_array:$file->getFileId()}">{$file->getOriginalFileName()|escape}</a></td>
	<td>{if ($file->getType() == 'supp')}{translate key="article.suppFile"}{elseif ($file->getType() == 'previous')}{translate key="author.submit.previousSubmissionFile"}{else}{translate key="author.submit.submissionFile"}{/if}</td>
	<td>{$file->getNiceFileSize()}</td>
	<td>{$file->getDateUploaded()|date_format:$dateFormatTrunc}</td>
</tr>
{foreachelse}
<tr valign="top">
<td colspan="5" class="nodata">{translate key="author.submit.noFiles"}</td>
</tr>
{/foreach}
</table>
<div class="separator"></div>

{* Commented out by EL on May 2 2012: Unuseful*}
{* <span style="font-size: smaller; font-style: italic;">To add or remove supplementary files, <a href="{url op="submit" path="4" articleId=$articleId}">click here to go back Step 4.</a></span>*}

<br />
<br />

<div id="commentsForEditor">
<h3>{translate key="author.submit.commentsForEditor"}</h3>

<table width="100%" class="data">
<tr valign="top">
	<td width="20%" class="label">{fieldLabel name="commentsToEditor" key="author.submit.comments"}</td>
	<td width="80%" class="value"><textarea name="commentsToEditor" id="commentsToEditor" rows="3" cols="40" class="textArea">{$commentsToEditor|escape}</textarea></td>
</tr>
</table>

</div>{* commentsForEditor *}

<div class="separator"></div>

{if $authorFees && $article->getLocalizedFundsRequired() > 5000}
	{include file="author/submit/authorFees.tpl" showPayLinks=1}
	{if $currentJournal->getLocalizedSetting('waiverPolicy') != ''}
		{if $manualPayment}
			{*<h3>{translate key="payment.alreadyPaid"}</h3>*}
			<p>Here are the instructions on how the payment should be made.</p>
			<table class="data" width="100%">
				<tr valign="top">
				<td width="5%" align="left"><input type="checkbox" id="paymentSent" name="paymentSent" value="1" {if $paymentSent}checked="checked"{/if} /></td>
				<td width="95%">{*translate key="payment.paymentSent"*}I sent my payment to the appropriate Ethics Review Committee.</td>
				</tr>
				<tr>
				<td />
				{*<td>{translate key="payment.alreadyPaidMessage"}</td>*}
				<tr>
			</table>
		{/if}
		{*
		<h3>{translate key="author.submit.requestWaiver"}</h3>
		<table class="data" width="100%">
			<tr valign="top">
				<td width="5%" align="left"><input type="checkbox" name="qualifyForWaiver" value="1" {if $qualifyForWaiver}checked="checked"{/if}/></td>
				<td width="95%">{translate key="author.submit.qualityForWaiver"}</td>
			</tr>
			<tr>
				<td />
				<td>
					<label for="commentsToEditor">{translate key="author.submit.addReasonsForWaiver"}</label><br />
					<textarea name="commentsToEditor" id="commentsToEditor" rows="3" cols="40" class="textArea">{$commentsToEditor|escape}</textarea>
				</td>
			</tr>
		</table>
		*}
	{/if}

	<div class="separator"></div>
{/if}

{call_hook name="Templates::Author::Submit::Step5::AdditionalItems"}
<p><font color=#FF0000>Attention:<br />Before finishing the submission please make sure that all data you entered are correct. Once submitted the proposal can't be modified.</font></p>
<p><input type="submit" value="{translate key="author.submit.finishSubmission"}" class="button defaultButton" {if $authorFees && $article->getLocalizedFundsRequired() > 5000} onclick="return checkSubmissionChecklist(document.getElementById('paymentSent'))"{/if} /> <input type="button" value="{translate key="common.cancel"}" class="button" onclick="confirmAction('{url page="author"}', '{translate|escape:"jsparam" key="author.submit.cancelSubmission"}')" /></p>
</form>

{include file="common/footer.tpl"}

