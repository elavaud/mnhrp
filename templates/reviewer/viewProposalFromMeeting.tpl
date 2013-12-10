{**
 * submissionForFullReview.tpl
 * $Id$
 *}
{strip}
{assign var="articleId" value=$submission->getArticleId()}
{assign var="proposalId" value=$submission->getLocalizedProposalId()}
{translate|assign:"pageTitleTranslated" key="submission.page.proposalFromMeeting" id=$proposalId}
{assign var="pageCrumbTitle" value="article.submission"}
{include file="common/header.tpl"}
{/strip}

<ul class="menu">
	<li><a href="{url op="meetings"}">{translate key="common.queue.short.meetingList"}</a></li>
	{if $isReviewer}
		<li><a href="{url op="proposalsFromMeetings"}">{translate key="common.queue.short.meetingProposals"}</a></li>
	{/if}
</ul>
<div class="separator"></div>

<script type="text/javascript">

</script>

<div id="submissionToBeReviewed">

	<h3>{translate key="reviewer.article.submissionToBeReviewed"}</h3>
	
	<table width="100%" class="data">
		
		<tr valign="top">
			<td width="30%" class="label">{translate key="common.proposalId"}</td>
			<td width="70%" class="value">{$sectionDecision->getProposalId()|strip_unsafe_html}</td>
		</tr>
		
		<tr valign="top">
			<td width="30%" class="label">{translate key="article.title"}</td>
			<td width="70%" class="value">{$sectionDecision->getLocalizedProposalTitle()|strip_unsafe_html}</td>
		</tr>
		
		<tr valign="top">
			<td class="label">{translate key="article.journalSection"}</td>
			<td class="value">{$ercTitle}</td>
		</tr>
		
		<tr valign="top">
			<td class="label">{translate key="submissions.reviewRound"}</td>
			<td class="value">{translate key=$sectionDecision->getReviewTypeKey()} - {$sectionDecision->getRound()}</td>
		</tr>

		<tr valign="top">
			<td class="label">{translate key="common.status"}</td>
			<td class="value">{translate key=$sectionDecision->getReviewStatusKey()}</td>
		</tr>
	</table>

</div>

<div class="separator"></div>

<div id="files">
<h3>{translate key="common.file.s"}</h3>
	<table width="100%" class="data">
		<tr valign="top">
			<td width="30%" class="label">
				{translate key="submission.submissionManuscript"}
			</td>
			<td class="value" width="70%">
				{if $submissionFile}
					<a href="{url op="downloadProposalFromMeetingFile" path=$submission->getArticleId()|to_array:$submissionFile->getFileId()}" class="file">{$submissionFile->getFileName()|escape}</a>
				&nbsp;&nbsp;{$submissionFile->getDateModified()|date_format:$dateFormatLong}
				{else}
					{translate key="common.none"}
				{/if}
			</td>
		</tr>
		{if count($previousFiles)>1}
		{assign var="count" value=0}
		<tr>
			<td class="label">{translate key="submission.previousProposalFile"}</td>
			<td width="70%" class="value">
				{foreach name="previousFiles" from=$previousFiles item=previousFile}
					{assign var="count" value=$count+1}
					{if $count > 1}
            			<a href="{url op="downloadProposalFromMeetingFile" path=$submission->getArticleId()|to_array:$previousFile->getFileId()}" class="file">{$previousFile->getFileName()|escape}</a><br />
					{/if}
				{/foreach}
			</td>
		</tr>
		{/if}
		<tr valign="top">
			<td class="label">
				{translate key="article.suppFiles"}
			</td>
			<td class="value">
				{assign var=sawSuppFile value=0}
				{foreach from=$suppFiles item=suppFile}
					{if $suppFile->getShowReviewers() }
						{assign var=sawSuppFile value=1}
						<a href="{url op="downloadProposalFromMeetingFile" path=$submission->getArticleId()|to_array:$suppFile->getFileId()}" class="file">{$suppFile->getFileName()|escape}</a><cite>&nbsp;&nbsp;({$suppFile->getType()})</cite><br />
					{/if}
				{/foreach}
				{if !$sawSuppFile}
					{translate key="common.none"}
				{/if}
			</td>
		</tr>
	</table>
</div>

<div class="separator"></div>

<div id="titleAndAbstract">

	<h4><br/>{translate key="submission.titleAndAbstract"}</h4>
	<div class="separator"></div>
	
	{assign var="abstracts" value=$submission->getAbstracts()}
	
	{foreach from=$abstractLocales item=localeName key=localeKey}
	
		<h6>{$localeName} {translate key="common.language"}</h6>
		
		{assign var="abstract" value=$abstracts[$localeKey]}

		<table class="listing" width="100%">
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.scientificTitle"}</td>
        		<td class="value">{$abstract->getScientificTitle()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.publicTitle"}</td>
        		<td class="value">{$abstract->getPublicTitle()}</td>
    		</tr>
    		<tr><td colspan="2">&nbsp;</td></tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.background"}</td>
        		<td class="value">{$abstract->getBackground()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.objectives"}</td>
        		<td class="value">{$abstract->getObjectives()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.studyMethods"}</td>
        		<td class="value">{$abstract->getStudyMethods()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.expectedOutcomes"}</td>
        		<td class="value">{$abstract->getExpectedOutcomes()}</td>
    		</tr>
    		<tr><td colspan="2">&nbsp;</td></tr>
    		<tr valign="top">
        		<td class="label" width="30%">{translate key="proposal.keywords"}</td>
        		<td class="value">{$abstract->getKeywords()}</td>
    		</tr>
		</table>
	{/foreach}
</div>

<div id="proposalDetails">
	<h4><br/>{translate key="submission.proposalDetails"}</h4>
	<div class="separator"></div>

	{assign var="proposalDetails" value=$submission->getProposalDetails()}
	
	<table class="listing" width="100%">
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.studentInitiatedResearch"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getStudentResearch())}</td>
    	</tr>
    	{if ($proposalDetails->getStudentResearch()) == PROPOSAL_DETAIL_YES}
			{assign var="studentResearch" value=$proposalDetails->getStudentResearchInfo()}
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{translate key="proposal.studentInstitution"}: {$studentResearch->getInstitution()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{translate key="proposal.academicDegree"}: {translate key=$studentResearch->getDegreeKey()}</td>
    		</tr>
        	<tr valign="top" id="supervisor"><td class="label" width="30%">&nbsp;</td><td class="value"><b>{translate key="proposal.studentSupervisor"}</b></td></tr>
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{translate key="proposal.studentSupervisorName"}: {$studentResearch->getSupervisorName()}</td>
    		</tr>
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{translate key="user.email"}: {$studentResearch->getSupervisorEmail()}</td>
    		</tr>
        	<tr valign="top"><td class="label" width="30%">&nbsp;</td><td class="value">&nbsp;</td></tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.startDate"}</td>
        	<td class="value">{$proposalDetails->getStartDate()}</td>
   	 	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.endDate"}</td>
        	<td class="value">{$proposalDetails->getEndDate()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.primarySponsor"}</td>
        	<td class="value">{$proposalDetails->getLocalizedPrimarySponsorText()}</td>
    	</tr>
    	{if $proposalDetails->getSecondarySponsors()}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.secondarySponsors"}</td>
        	<td class="value">{$proposalDetails->getLocalizedSecondarySponsorText()}</td>
    	</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.multiCountryResearch"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getMultiCountryResearch())}</td>
    	</tr>
		{if ($proposalDetails->getMultiCountryResearch()) == PROPOSAL_DETAIL_YES}
			<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedMultiCountryText()}</td>
    		</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.nationwide"}</td>
        	<td class="value">{translate key=$proposalDetails->getNationwideKey()}</td>
   	 	</tr>
    	{if $proposalDetails->getNationwide() == PROPOSAL_DETAIL_NO || $proposalDetails->getNationwide() == PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS}
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedGeoAreasText()}</td>
    		</tr>
		{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.researchField"}</td>
        	<td class="value">{$proposalDetails->getLocalizedResearchFieldText()}</td>
    	</tr>	
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.withHumanSubjects"}</td>
        	<td class="value">{translate key=$proposalDetails->getYesNoKey($proposalDetails->getHumanSubjects())}</td>
    	</tr>
    	{if ($proposalDetails->getHumanSubjects()) == PROPOSAL_DETAIL_YES}
    		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$proposalDetails->getLocalizedProposalTypeText()}</td>
   			</tr>
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.dataCollection"}</td>
        	<td class="value">{translate key=$proposalDetails->getDataCollectionKey()}</td>
    	</tr>   
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.reviewedByOtherErc"}</td>
        	<td class="value">{translate key=$proposalDetails->getCommitteeReviewedKey()}</td>
    	</tr>
	</table>
</div>

<div id="sourceOfMonetary">
	<h4><br/>{translate key="proposal.sourceOfMonetary"}</h4>
	<div class="separator"></div>
	<table class="listing" width="100%">
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.fundsRequired"}</td>
        	<td class="value">{$submission->getLocalizedFundsRequired()} {$submission->getLocalizedSelectedCurrency()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.industryGrant"}</td>
        	<td class="value">{$submission->getLocalizedIndustryGrant()}</td>
    	</tr>
    	{if ($submission->getLocalizedIndustryGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$submission->getLocalizedNameOfIndustry()}</td>
    		</tr>   
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.internationalGrant"}</td>
        	<td class="value">{$submission->getLocalizedInternationalGrant()}</td>
    	</tr>
    	{if ($submission->getLocalizedInternationalGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">
        			{if $submission->getLocalizedInternationalGrantName()}
        				{$submission->getLocalizedInternationalGrantNameText()} 
        			{/if}
        		</td>
    		</tr>     
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.mohGrant"}</td>
        	<td class="value">{$submission->getLocalizedMohGrant()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.governmentGrant"}</td>
        	<td class="value">{$submission->getLocalizedGovernmentGrant()}</td>
    	</tr>
    	{if ($submission->getLocalizedGovernmentGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$submission->getLocalizedGovernmentGrantName()}</td>
    		</tr>     
    	{/if}
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.universityGrant"}</td>
        	<td class="value">{$submission->getLocalizedUniversityGrant()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.selfFunding"}</td>
        	<td class="value">{$submission->getLocalizedSelfFunding()}</td>
    	</tr>
    	<tr valign="top">
        	<td class="label" width="30%">{translate key="proposal.otherGrant"}</td>
        	<td class="value">{$submission->getLocalizedOtherGrant()}</td>
    	</tr>
    	{if ($submission->getLocalizedOtherGrant()) == "Yes"}
     		<tr valign="top">
        		<td class="label" width="30%">&nbsp;</td>
        		<td class="value">{$submission->getLocalizedSpecifyOtherGrant()}</td>
    		</tr>    
    	{/if}
	</table>
</div>

<div id=riskAssessments>
	<h4><br/>{translate key="proposal.riskAssessment"}</h4>
	<div class="separator"></div>

	{assign var="riskAssessment" value=$submission->getRiskAssessment()}

	<table class="listing" width="100%">
    	<tr valign="top"><td colspan="2"><b>{translate key="proposal.researchIncludesHumanSubject"}</b></td></tr>
    	<tr valign="top" id="identityRevealedField">
    	    <td class="label" width="30%">{translate key="proposal.identityRevealed"}</td>
    	    <td class="value">{if $riskAssessment->getIdentityRevealed() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="unableToConsentField">
        	<td class="label" width="30%">{translate key="proposal.unableToConsent"}</td>
        	<td class="value">{if $riskAssessment->getUnableToConsent() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="under18Field">
    	    <td class="label" width="30%">{translate key="proposal.under18"}</td>
    	    <td class="value">{if $riskAssessment->getUnder18() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="dependentRelationshipField">
    	    <td class="label" width="30%">{translate key="proposal.dependentRelationship"}</td>
    	    <td class="value">{if $riskAssessment->getDependentRelationship() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="ethnicMinorityField">
    	    <td class="label" width="30%">{translate key="proposal.ethnicMinority"}</td>
    	    <td class="value">{if $riskAssessment->getEthnicMinority() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="impairmentField">
    	    <td class="label" width="30%">{translate key="proposal.impairment"}</td>
    	    <td class="value">{if $riskAssessment->getImpairment() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="pregnantField">
    	    <td class="label" width="30%">{translate key="proposal.pregnant"}</td>
    	    <td class="value">{if $riskAssessment->getPregnant() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/>{translate key="proposal.researchIncludes"}</b></td></tr>
    	<tr valign="top" id="newTreatmentField">
    	    <td class="label" width="30%">{translate key="proposal.newTreatment"}</td>
    	    <td class="value">{if $riskAssessment->getNewTreatment() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="bioSamplesField">
    	    <td class="label" width="30%">{translate key="proposal.bioSamples"}</td>
    	    <td class="value">{if $riskAssessment->getBioSamples() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="radiationField">
    	    <td class="label" width="30%">{translate key="proposal.radiation"}</td>
    	    <td class="value">{if $riskAssessment->getRadiation() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="distressField">
    	    <td class="label" width="30%">{translate key="proposal.distress"}</td>
    	    <td class="value">{if $riskAssessment->getDistress() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="inducementsField">
    	    <td class="label" width="30%">{translate key="proposal.inducements"}</td>
    	    <td class="value">{if $riskAssessment->getInducements() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="sensitiveInfoField">
    	    <td class="label" width="30%">{translate key="proposal.sensitiveInfo"}</td>
    	    <td class="value">{if $riskAssessment->getSensitiveInfo() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="deceptionField">
    	    <td class="label" width="30%">{translate key="proposal.deception"}</td>
    	    <td class="value">{if $riskAssessment->getDeception() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="reproTechnologyField">
    	    <td class="label" width="30%">{translate key="proposal.reproTechnology"}</td>
    	    <td class="value">{if $riskAssessment->getReproTechnology() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="geneticsField">
    	    <td class="label" width="30%">{translate key="proposal.genetic"}</td>
    	    <td class="value">{if $riskAssessment->getGenetic() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="stemCellField">
    	    <td class="label" width="30%">{translate key="proposal.stemCell"}</td>
    	    <td class="value">{if $riskAssessment->getStemCell() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="biosafetyField">
    	    <td class="label" width="30%">{translate key="proposal.biosafety"}</td>
    	    <td class="value">{if $riskAssessment->getBiosafety() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top"><td colspan="2"><b><br/>{translate key="proposal.potentialRisk"}</b></td></tr>
    	<tr valign="top" id="riskLevelField">
    	    <td class="label" width="30%">{translate key="proposal.riskLevel"}</td>
    	    <td class="value">
    	    {if $riskAssessment->getRiskLevel() == "1"}{translate key="proposal.riskLevelNoMore"}
    	    {elseif $riskAssessment->getRiskLevel() == "2"}{translate key="proposal.riskLevelMinore"}
    	    {elseif $riskAssessment->getRiskLevel() == "3"}{translate key="proposal.riskLevelMore"}
    	    {/if}
    	    </td>
    	</tr>
    	{if $riskAssessment->getRiskLevel() != '1'}
    	<tr valign="top" id="listRisksField">
    	    <td class="label" width="30%">{translate key="proposal.listRisks"}</td>
    	    <td class="value">{$riskAssessment->getListRisks()}</td>
    	</tr>
    	<tr valign="top" id="howRisksMinimizedField">
    	    <td class="label" width="30%">{translate key="proposal.howRisksMinimized"}</td>
    	    <td class="value">{$riskAssessment->getHowRisksMinimized()}</td>
    	</tr>
    	{/if}
    	<tr valign="top" id="riskApplyToField">
    	    <td class="label" width="30%">{translate key="proposal.riskApplyTo"}</td>
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
    	    <td class="label" width="30%">{translate key="proposal.benefitsFromTheProject"}</td>
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
    	    <td class="label" width="30%">{translate key="proposal.multiInstitutions"}</td>
    	    <td class="value">{if $riskAssessment->getMultiInstitutions() == "1"}{translate key="common.yes"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    	<tr valign="top" id="conflictOfInterestField">
    	    <td class="label" width="30%">{translate key="proposal.conflictOfInterest"}</td>
    	    <td class="value">{if $riskAssessment->getConflictOfInterest() == "1"}{translate key="common.yes"}{elseif $riskAssessment->getConflictOfInterest() == "3"}{translate key="common.notSure"}{else}{translate key="common.no"}{/if}</td>
    	</tr>
    </table>
</div>

{include file="common/footer.tpl"}


