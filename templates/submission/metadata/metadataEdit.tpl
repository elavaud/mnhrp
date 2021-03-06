{**
 * metadataEdit.tpl
 *
 * Copyright (c) 2003-2011 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Form for changing metadata of an article (used in MetadataForm)
 *}

{strip}
{assign var="pageTitle" value="submission.editMetadata"}
{include file="common/header.tpl"}
{/strip}

{url|assign:"competingInterestGuidelinesUrl" page="information" op="competingInterestGuidelines"}

<form name="metadata" method="post" action="{url op="saveMetadata"}" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="{$articleId|escape}" />
{include file="common/formErrors.tpl"}

{literal}
<script type="text/javascript">

    // Move author up/down
    function moveAuthor(dir, authorIndex) {
            var form = document.submit;
            form.moveAuthor.value = 1;
            form.moveAuthorDir.value = dir;
            form.moveAuthorIndex.value = authorIndex;
            form.submit();
    }


	function showOrHideGovernmentGrant(value){
		if (value == 'Yes'){
			document.getElementById('governmentGrantNameField').style.display = '';
			$('#governmentGrantName').val("");
		} else {
			if (document.getElementById('governmentGrantY').checked) {
				document.getElementById('governmentGrantNameField').style.display = '';			
			} else {
				document.getElementById('governmentGrantNameField').style.display = 'none';
				$('#governmentGrantName').val("NA");		
			}
		}
	}
	
	function showOrHideOtherPrimarySponsorField(value){
		if (value == 'OTHER') {
			document.getElementById('otherPrimarySponsorField').style.display = '';
			$('#otherPrimarySponsor').val("");
		} else {
			var other = false
			var list = document.getElementsByName("primarySponsor[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == 'OTHER'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById('otherPrimarySponsorField').style.display = 'none';
				$('#otherPrimarySponsor').val("NA");
			} else {
				document.getElementById('otherPrimarySponsorField').style.display = '';
			}
		} 	
	}
	
	function showOrHideOtherInternationalGrantName(value){
		if (value == 'OTHER') {
			document.getElementById('otherInternationalGrantNameField').style.display = '';
			$('#otherInternationalGrantName').val("");
		} else {
			var other = false
			var list = document.getElementsByName("internationalGrantName['en_US'][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == 'OTHER'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById('otherInternationalGrantNameField').style.display = 'none';
				$('#otherInternationalGrantName').val("NA");
			} else {
				document.getElementById('otherInternationalGrantNameField').style.display = '';
			}
		}
	}

	function showOrHideOtherSecondarySponsor(value){
		if (value == 'OTHER') {
			document.getElementById('otherSecondarySponsorField').style.display = '';
			$('#otherSecondarySponsor').val("");
		} else {
			var other = false
			var list = document.getElementsByName("secondarySponsors[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == 'OTHER'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById('otherSecondarySponsorField').style.display = 'none';
				$('#otherSecondarySponsor').val("NA");
			} else {
				document.getElementById('otherSecondarySponsorField').style.display = '';
			}
		}
	}
	
	function showOrHideOtherResearchField(value){
		if (value == 'OTHER') {
			document.getElementById('otherResearchFieldField').style.display = '';
			$('#otherResearchField').val("");
		} else {
			var other = false
			var list = document.getElementsByName("researchField[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == 'OTHER'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById('otherResearchFieldField').style.display = 'none';
				$('#otherResearchField').val("NA");
			}
		}
	}

	function showOrHideOtherProposalType(value){
		if (value == 'OTHER') {
			document.getElementById('otherProposalTypeField').style.display = '';
			$('#otherProposalType').val("");
		} else {
			var other = false
			var list = document.getElementsByName("proposalType[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == 'OTHER'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById('otherProposalTypeField').style.display = 'none';
				$('#otherProposalType').val("NA");
			} else {
				document.getElementById('otherProposalTypeField').style.display = '';
			}
		}
	}
	
    
    function isNumeric(elem, helperMsg){
    	var numericExpression = /^([\s]*[0-9]+[\s]*)+$/;
    	if (elem.value.match(numericExpression)){
    		return true;
    	} else {
    		alert(helperMsg);
    		elem.focus();
    		return false;
    	}
    }
    
    $(document).ready(
    	function() {
        	showOrHideGovernmentGrant();
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Human Subject               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of proposal types: with Human Subjects vs. without Human Subjects
        	if($('input[name^="withHumanSubjects"]:checked').val() == {/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal} || $('input[name^="withHumanSubjects"]:checked').val() == null) {
            	$('#proposalTypeField').hide();
            	$('#firstProposalType').hide();
            	$('#otherProposalTypeField').hide();
            	$('#addAnotherType').hide();
            	$('#proposalType').append('<option value="PNHS"></option>');
            	$('#proposalType').val("PNHS");
            	$('#otherProposalType').val("NA");
        	} 

        	$('input[name^="withHumanSubjects"]').change(
        		function(){
            		var answer = $('input[name^="withHumanSubjects"]:checked').val();
            		if(answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal}) {
                		$('#proposalTypeField').show();
                		$('#firstProposalType').show();
                		$('#addAnotherType').show();
                		$('#proposalType option[value="PNHS"]').remove();
            		} else {
            			$('.proposalTypeSupp').remove();
                		$('#firstProposalType').hide();
                		$('#otherProposalTypeField').hide();
                		$('#otherProposalType').val("NA");
                		$('#addAnotherType').hide();
                		$('#proposalType').append('<option value="PNHS"></option>');
                		$('#proposalType').val("PNHS");
            		}
        		}
        	); 
        	//Start code for multiple proposal types
        	
        	$('#addAnotherType').click(
        		function(){
            		var proposalTypeHtml = '<tr valign="top" class="proposalTypeSupp">' + $('#firstProposalType').html() + '</tr>';
            		$('#firstProposalType').after(proposalTypeHtml);
            		$('#firstProposalType').next().find('select').attr('selectedIndex', 0);
            		$('.proposalTypeSupp').find('.removeProposalType').show();
            		$('#firstProposalType').find('.removeProposalType').hide();
            		return false;
        		}
        	);

        	$('.removeProposalType').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		showOrHideOtherProposalType();
            		return false;
        		}
        	);
        	//End code for multiple proposal types
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Agency Grant               ////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of international grant
        	if($('input[name^="internationalGrant"]:checked').val() == "No" || $('input[name^="industryGrant"]:checked').val() == null) {
            	$('#internationalGrantNameField').hide();
            	$('#firstInternationalGrantName').hide();
            	$('#otherInternationalGrantNameField').hide();
            	$('#addAnotherInternationalGrantName').hide();
            	$('#internationalGrantName').append('<option value="NA"></option>');
            	$('#internationalGrantName').val("NA");
            	$('#otherInternationalGrantName').val("NA");
        	}
            
        	$('input[name^="internationalGrant"]').change(
        		function(){
              		var answer = $('input[name^="internationalGrant"]:checked').val();
              		if(answer == "Yes") {
            			$('#internationalGrantNameField').show();
            			$('#firstInternationalGrantName').show();
            			$('#addAnotherInternationalGrantName').show();
        				$('#internationalGrantName option[value="NA"]').remove();
              		} else {
            			$('.internationalGrantNameSupp').remove();
            			$('#firstInternationalGrantName').hide();
            			$('#otherInternationalGrantNameField').hide();
            			$('#otherInternationalGrantName').val("NA");
            			$('#addAnotherInternationalGrantName').hide();
            			$('#internationalGrantName').append('<option value="NA"></option>');
            			$('#internationalGrantName').val("NA");	
              		}
        		}
        	);
        	        	
        	//Start code for multiple international grants
        	$('#addAnotherInternationalGrantName').click(
        		function(){
            		var internationalGrantNameHtml = '<tr valign="top" class="internationalGrantNameSupp">' + $('#firstInternationalGrantName').html() + '</tr>';
            		$('#firstInternationalGrantName').after(internationalGrantNameHtml);
            		$('#firstInternationalGrantName').next().find('select').attr('selectedIndex', 0);
            		$('.internationalGrantNameSupp').find('.removeInternationalGrantName').show();
            		$('#firstInternationalGrantName').find('.removeInternationalGrantName').hide();
            		return false;
        		}
        	);

        	$('.removeInternationalGrantName').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		showOrHideOtherInternationalGrantName();
            		return false;
        		}
        	);
        	//End code for international grants
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Multi Country               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        	//Add filter of multi-country research
        	if($('input[name^="multiCountryResearch"]:checked').val() == {/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal} || $('input[name^="multiCountryResearch"]:checked').val() == null) {
            	$('#multiCountryField').hide();
            	$('#firstMultiCountry').hide();
            	$('#addAnotherCountry').hide();
            	$('#multiCountry').val("MCNA");
        	} else {
            	$('#multiCountry option[value="MCNA"]').remove();
        	}
            
        	$('input[name^="multiCountryResearch"]').change(
        		function(){
              		var answer = $('input[name^="multiCountryResearch"]:checked').val();
              		if(answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal}) {
                  		$('#multiCountryField').show();
                  		$('#firstMultiCountry').show();
                  		$('#addAnotherCountry').show();
                  		$('#multiCountry option[value="MCNA"]').remove();
              		} else {
                  		$('#multiCountryField').hide();
            			$('#firstMultiCountry').hide();
            			$('.multiCountrySupp').remove();
            			$('#addAnotherCountry').hide();
                  		$('#multiCountry').append('<option value="MCNA"></option>');
                  		$('#multiCountry').val("MCNA");
              		}
        		}
        	);
        	
        	//Start code for multi-country proposals
        	$('#addAnotherCountry').click(
        		function(){
            		var multiCountryHtml = '<tr valign="top" class="multiCountrySupp">' + $('#firstMultiCountry').html() + '</tr>';
            		$('#firstMultiCountry').after(multiCountryHtml);
            		$('#firstMultiCountry').next().find('select').attr('selectedIndex', 0);
            		$('.multiCountrySupp').find('.removeMultiCountry').show();
            		$('#firstMultiCountry').find('.removeMultiCountry').hide();
            		return false;
        		}
        	);

        	$('.removeMultiCountry').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		return false;
        		}
        	);
        	
        	//End code for multi-country proposals
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Nationwide                  ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

			//Add filter of nationwide
        	if($('input[name^="nationwide"]:checked').val() == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal} || $('input[name^="nationwide"]:checked').val() == null) {
            	$('#geoAreaField').hide();
            	$('#firstGeoArea').hide();
            	$('#addAnotherArea').hide();
            	$('#geoArea').append('<option value="NW"></option>');
            	$('#geoArea').val("NW");
        	} else {
            	$('#geoArea option[value="NW"]').remove();
            	$('#geoAreaField').show();
            	$('#firstGeoArea').show();
            	$('#addAnotherArea').show();
        	}
            
        	$('input[name^="nationwide"]').change(
        		function(){
              		var answer = $('input[name^="nationwide"]:checked').val();
              		if(answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal} || answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS}{literal}) {
                  		$('#geoAreaField').show();
                  		$('#firstGeoArea').show();
                  		$('#addAnotherArea').show();
                  		$('#geoArea option[value="NW"]').remove();
              		} else {
                  		$('#geoAreaField').hide();
            			$('#firstGeoArea').hide();
            			$('.geoAreaSupp').remove();
            			$('#addAnotherArea').hide();
                  		$('#geoArea').append('<option value="NW"></option>');
                  		$('#geoArea').val("NW");
              		}
        		}
        	);
        	
        	//Start code for multi-provinces proposals
        	$('#addAnotherArea').click(
        		function(){
            		var geoAreaHtml = '<tr valign="top" class="geoAreaSupp">' + $('#firstGeoArea').html() + '</tr>';
            		$('#firstGeoArea').after(geoAreaHtml);
            		$('#firstGeoArea').next().find('select').attr('selectedIndex', 0);
            		$('.geoAreaSupp').find('.removeProposalProvince').show();
            		$('#firstGeoArea').find('.removeProposalProvince').hide();
            		return false;
        		}
        	);

        	$('.removeProposalProvince').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		return false;
        		}
        	);
        	
        	//End code for multi-provinces proposals
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Student Research              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of sudent research
        	if($('input[name^="studentInitiatedResearch"]:checked').val() == {/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal} || $('input[name^="studentInitiatedResearch"]:checked').val() == null) {
            	$('#academicDegreeField').hide();
            	$('#supervisorNameField').hide();
            	$('#supervisorName').val("NA");
            	$('#supervisorEmailField').hide();
            	$('#supervisorEmail').val("NA");
            	$('#academicDegree').append('<option value="NA"></option>');
            	$('#academicDegree').val("NA");
            	$('#studentInstitutionField').hide();
            	$('#studentInstitution').val("NA");
            	$('#supervisor').hide();
        	} else {
            	$('#studentInstitutionField').show();
				$('#academicDegreeField').show();
				$('#supervisor').show();
				$('#academicDegree option[value="NA"]').remove();
            	$('#supervisorNameField').show();
            	$('#supervisorEmailField').show();
			}

        	$('input[name^="studentInitiatedResearch"]').change(
        		function(){
            		var answer = $('input[name^="studentInitiatedResearch"]:checked').val();
            		if(answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal}) {
            			$('#studentInstitutionField').show();
            			$('#studentInstitution').val("");
                		$('#academicDegreeField').show();
                		$('#supervisor').show();
                		$('#academicDegree option[value="NA"]').remove();
            			$('#supervisorNameField').show();
            			$('#supervisorName').val("");
            			$('#supervisorEmailField').show();
            			$('#supervisorEmail').val("");
            		} else {
                		$('#academicDegreeField').hide();
            			$('#supervisorNameField').hide();
            			$('#supervisorName').val("NA");
            			$('#supervisorEmailField').hide();
            			$('#supervisorEmail').val("NA");
            			$('#supervisor').hide();
                		$('#academicDegree').append('<option value="NA"></option>');
                		$('#academicDegree').val("NA");
                		$('#studentInstitutionField').hide();
            			$('#studentInstitution').val("NA");
            		}
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 ERC Decision                ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of ERC decisions
        	if($('input[name^="reviewedByOtherErc"]:checked').val() == {/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal} || $('input[name^="reviewedByOtherErc"]:checked').val() == null) {
            	$('#otherErcDecisionField').hide();
            	$('#otherErcDecision').val("NA");
        	} else {
            	$('#otherErcDecision option[value="NA"]').remove();
        	}
            
        	$('input[name^="reviewedByOtherErc"]').change(
        		function(){
              		var answer = $('input[name^="reviewedByOtherErc"]:checked').val();
              		if(answer == {/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal}) {
                  		$('#otherErcDecisionField').show();
                  		$('#otherErcDecision option[value="NA"]').remove();
              		} else {
                  		$('#otherErcDecisionField').hide();
                  		$('#otherErcDecision').append('<option value="NA"></option>');
                  		$('#otherErcDecision').val("NA");
              		}
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                Industry Grant               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of industry grant
        	if($('input[name^="industryGrant"]:checked').val() == "No" || $('input[name^="industryGrant"]:checked').val() == null) {
            	$('#nameOfIndustryField').hide();
            	$('#nameOfIndustry').val("NA");
        	} else {
        		$('#nameOfIndustryField').show();
        	}
            
        	$('input[name^="industryGrant"]').change(
        		function(){
              		var answer = $('input[name^="industryGrant"]:checked').val();
              		if(answer == "Yes") {
                  		$('#nameOfIndustryField').show();
                  		$('#nameOfIndustry').val("");
              		} else {
                  		$('#nameOfIndustryField').hide();
                  		$('#nameOfIndustry').val("NA");
              		}
        		}
        	);
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Other Grant                 ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        	// Add filter of other grant
        	if($('input[name^="otherGrant"]:checked').val() == "No" || $('input[name^="otherGrant"]:checked').val() == null) {
            	$('#specifyOtherGrantField').hide();
            	$('#specifyOtherGrant').val("NA");
        	} else {
        		$('#specifyOtherGrantField').show();
        	}
            
        	$('input[name^="otherGrant"]').change(
        		function(){
              		var answer = $('input[name^="otherGrant"]:checked').val();
              		if(answer == "Yes") {
                  		$('#specifyOtherGrantField').show();
                  		$('#specifyOtherGrant').val("");
              		} else {
                  		$('#specifyOtherGrantField').hide();
                  		$('#specifyOtherGrant').val("NA");
              		}
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                    Dates                    ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        	//Restrict end date to (start date) + 1
        	$( "#startDate" ).datepicker(
        		{
        			changeMonth: true, changeYear: true, dateFormat: 'dd-M-yy', minDate: '-1 y', onSelect: function(dateText, inst){
                        dayAfter = new Date();
                        dayAfter = $("#startDate").datepicker("getDate");
                        dayAfter.setDate(dayAfter.getDate() + 1);
                        $("#endDate").datepicker("option","minDate", dayAfter)
                	}
        		}
        	);
            
        	$( "#endDate" ).datepicker(
        		{
        			changeMonth: true, changeYear: true, dateFormat: 'dd-M-yy', minDate: '-1 y'
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Seconday Sponsor              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

          	//Start code for multiple secondary sponsor
        	$('#addAnotherSecondarySponsor').click(
        		function(){
            		var secondarySponsorHtml = '<tr valign="top" class="secondarySponsorSupp">' + $('#firstSecondarySponsor').html() + '</tr>';
            		$('#firstSecondarySponsor').after(secondarySponsorHtml);
            		$('#firstSecondarySponsor').next().find('select').attr('selectedIndex', 0);
            		$('.secondarySponsorSupp').find('.removeSecondarySponsor').show();
                	$('.secondarySponsorSupp').find('.secondarySponsorTitle').hide();
        			$('.secondarySponsorSupp').find('.noSecondarySponsorTitle').show();
            		$('#firstSecondarySponsor').find('.removeSecondarySponsor').hide();
            		$('#firstSecondarySponsor').find('.secondarySponsorTitle').show();
        			$('#firstSecondarySponsor').find('.noSecondarySponsorTitle').hide();
            		return false;
        		}
        	);

        	$('.removeSecondarySponsor').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		showOrHideOtherSecondarySponsor();
            		return false;
        		}
        	);
        	//End code for multiple secondary sponsors
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Research Fields               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////        
   
   			//Start code for multiple research fields
        	$('#addAnotherField').click(
        		function(){
            		var proposalFieldHtml = '<tr valign="top" class="researchFieldSupp">' + $('#firstResearchField').html() + '</tr>';
            		$('#firstResearchField').after(proposalFieldHtml);
            		$('#firstResearchField').next().find('select').attr('selectedIndex', 0);
            		$('.researchFieldSupp').find('.removeResearchField').show();
            		$('.researchFieldSupp').find('.researchFieldTitle').hide();
            		$('.researchFieldSupp').find('.noResearchFieldTitle').show();
            		$('#firstResearchField').find('.removeResearchField').hide();
            		$('#firstResearchField').find('.researchFieldTitle').show();
            		$('#firstResearchField').find('.noResearchFieldTitle').hide();
            		return false;
        		}
        	);

        	$('.removeResearchField').live(
        		'click', function(){
            		$(this).closest('tr').remove();
            		showOrHideOtherResearchField();
            		return false;
        		}
        	);
        	//End code for multiple research fields
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////              Level of Risk                  ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        	// Add filter for level of risks
        	// EL on March 9th 2013
        	if (($('#riskLevel').val() != '1') && ($('#riskLevel').val() != '')){
            	$('#listRisksField').show();
            	$('#howRisksMinimizedField').show();
        	} else {
            	$('#listRisksField').hide();
            	$('#howRisksMinimizedField').hide();
            	$('#listRisks').val("NA");
				$('#howRisksMinimized').val("NA");
			}

        	$('#riskLevel').change(
        		function(){
            		var answer = $('#riskLevel').val();
            		if(answer != "1" && answer != "") {
            			$('#listRisksField').show();
            			$('#howRisksMinimizedField').show();
            			$('#listRisks').val("");
						$('#howRisksMinimized').val("");
            		} else {
            			$('#listRisksField').hide();
            			$('#howRisksMinimizedField').hide();
            			$('#listRisks').val("NA");
						$('#howRisksMinimized').val("NA");
            		}
        		}
        	);     	
        	// End of filter for level of risks
    	}
    );

</script>
{/literal}

<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                   Authors                   ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
-->
    <div id="authors">
        <h3>{translate key="article.authors"}</h3>

        <input type="hidden" name="deletedAuthors" value="{$deletedAuthors|escape}" />
        <input type="hidden" name="moveAuthor" value="0" />
        <input type="hidden" name="moveAuthorDir" value="" />
        <input type="hidden" name="moveAuthorIndex" value="" />

{foreach name=authors from=$authors key=authorIndex item=author}
        <input type="hidden" name="authors[{$authorIndex|escape}][authorId]" value="{$author.authorId|escape}" />
        <input type="hidden" name="authors[{$authorIndex|escape}][seq]" value="{$authorIndex+1}" />

{if $smarty.foreach.authors.total <= 1}
        <input type="hidden" name="primaryContact" value="{$authorIndex|escape}" />
{/if}
{if $authorIndex == 1}<h3>{translate key="user.role.coinvestigator"}</h3>{/if}
        <table width="100%" class="data">
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-firstName" required="true" key="user.firstName"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[{$authorIndex|escape}][firstName]" id="authors-{$authorIndex|escape}-firstName" value="{$author.firstName|escape}" size="20" maxlength="40" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-middleName" key="user.middleName"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[{$authorIndex|escape}][middleName]" id="authors-{$authorIndex|escape}-middleName" value="{$author.middleName|escape}" size="20" maxlength="40" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-lastName" required="true" key="user.lastName"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[{$authorIndex|escape}][lastName]" id="authors-{$authorIndex|escape}-lastName" value="{$author.lastName|escape}" size="20" maxlength="90" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-email" required="true" key="user.email"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[{$authorIndex|escape}][email]" id="authors-{$authorIndex|escape}-email" value="{$author.email|escape}" size="30" maxlength="90" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-phone" required="true" key="user.tel"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[{$authorIndex|escape}][phone]" id="authors-{$authorIndex|escape}-phone" value="{$author.phone|escape}" size="20" /></td>
            </tr>            
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-affiliation" required="true" key="user.affiliation"}</td>
                <td width="80%" class="value"><textarea name="authors[{$authorIndex|escape}][affiliation]" class="textArea" id="authors-{$authorIndex|escape}-affiliation" rows="5" cols="40">{$author.affiliation|escape}</textarea><br/>
                    <span class="instruct">{translate key="user.affiliation.description"}</span>
                </td>
            </tr>
            
{if $currentJournal->getSetting('requireAuthorCompetingInterests')}
            <tr valign="top">
                <td width="20%" class="label">{fieldLabel name="authors-$authorIndex-competingInterests" key="author.competingInterests" competingInterestGuidelinesUrl=$competingInterestGuidelinesUrl}</td>
                <td width="80%" class="value"><textarea name="authors[{$authorIndex|escape}][competingInterests][{$formLocale|escape}]" class="textArea" id="authors-{$authorIndex|escape}-competingInterests" rows="5" cols="40">{$author.competingInterests[$formLocale]|escape}</textarea></td>
            </tr>
{/if}{* requireAuthorCompetingInterests *}

{call_hook name="Templates::Author::Submit::Authors"}

{if $smarty.foreach.authors.total > 1}
            <tr valign="top">
                <td width="80%" class="value" colspan="2">
                    <div style="display:none">
                        <input type="radio" name="primaryContact" value="{$authorIndex|escape}"{if $primaryContact == $authorIndex} checked="checked"{/if} /> <label for="primaryContact">{*translate key="author.submit.selectPrincipalContact"*}</label>
                    </div>
            {if $authorIndex > 0}
                    <input type="submit" name="delAuthor[{$authorIndex|escape}]" value="{*translate key="author.submit.deleteAuthor"*}Delete Co-Investigator" class="button" />
            {else}
                    &nbsp;
            {/if}
                </td>
            </tr>
            <tr>
                <td colspan="2"><br/></td>
            </tr>
{/if}


        </table>
{/foreach}
        <br /><br />
        {if $authorIndex<3}<p><input type="submit" class="button" name="addAuthor" value="{*translate key="author.submit.addAuthor"*}Add a Co-Investigator" /></p>{/if}
    </div>
    <div class="separator"></div>
<!--    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////              Title and Abstract             ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->
    <div id="titleAndAbstract">
        <h3>{translate key="submission.titleAndAbstract"}</h3>
		
		{foreach from=$abstractLocales item=localeName key=localeKey}
			{assign var="abstract" value=$abstracts[$localeKey]}
			<input type="hidden" name="abstracts[{$localeKey|escape}][abstractId]" value="{$abstract.abstractId|escape}" />

			<h6>{$localeName} {translate key="common.language"}</h6>
			
        	<table width="100%" class="data">
            	<tr><td colspan="2">&nbsp;</td></tr>
            	<tr valign="top" id="scientificTitleField">
                	<td title="{translate key="proposal.scientificTitleInstruct"}" width="20%" class="label">[?] {fieldLabel name="scientificTitle" required="true" key="proposal.scientificTitle"}</td>
                	<td width="80%" class="value"><input type="text" class="textField" name="abstracts[{$localeKey|escape}][scientificTitle]" id="scientificTitle" value="{$abstract.scientificTitle|escape}" size="50" maxlength="255" /></td>
            	</tr>
            	<tr valign="top" id="publicTitleField">
                	<td title="{translate key="proposal.publicTitleInstruct"}" width="20%" class="label">[?] {fieldLabel name="publicTitle" required="true" key="proposal.publicTitle"}</td>
                	<td width="80%" class="value"><input type="text" class="textField" name="abstracts[{$localeKey|escape}][publicTitle]" id="publicTitle" value="{$abstract.publicTitle|escape}" size="50" maxlength="255" /></td>
            	</tr>
            	<tr><td colspan="2">&nbsp;</td></tr>
            	<tr valign="top" id="backgroundField">
                	<td title="{translate key="proposal.backgroundInstruct"}" width="20%" class="label">[?] {fieldLabel name="background" required="true" key="proposal.background"}</td>
                	<td width="80%" class="value"><textarea name="abstracts[{$localeKey|escape}][background]" id="background" class="textArea" rows="5" cols="70">{$abstract.background|escape}</textarea></td>
            	</tr>
            	<tr valign="top" id="objectivesField">
                	<td title="{translate key="proposal.objectivesInstruct"}" width="20%" class="label">[?] {fieldLabel name="objectives" required="true" key="proposal.objectives"}</td>
                	<td width="80%" class="value"><textarea name="abstracts[{$localeKey|escape}][objectives]" id="objectives" class="textArea" rows="5" cols="70">{$abstract.objectives|escape}</textarea></td>
            	</tr>
            	<tr valign="top" id="studyMethodsField">
                	<td title="{translate key="proposal.studyMethodsInstruct"}" width="20%" class="label">[?] {fieldLabel name="studyMethods" required="true" key="proposal.studyMethods"}</td>
                	<td width="80%" class="value"><textarea name="abstracts[{$localeKey|escape}][studyMethods]" id="studyMethods" class="textArea" rows="5" cols="70">{$abstract.studyMethods|escape}</textarea></td>
            	</tr>  
            	<tr valign="top" id="expectedOutcomesField">
                	<td title="{translate key="proposal.expectedOutcomesInstruct"}" width="20%" class="label">[?] {fieldLabel name="expectedOutcomes" required="true" key="proposal.expectedOutcomes"}</td>
                	<td width="80%" class="value"><textarea name="abstracts[{$localeKey|escape}][expectedOutcomes]" id="expectedOutcomes" class="textArea" rows="5" cols="70">{$abstract.expectedOutcomes|escape}</textarea></td>
            	</tr>   
            	<tr><td colspan="2">&nbsp;</td></tr>
            	<tr valign="top" id="keywordsField">
                	<td title="{translate key="proposal.keywordsInstruct"}" width="20%" class="label">[?] {fieldLabel name="keywords" required="true" key="proposal.keywords"}</td>
                	<td width="80%" class="value"><input type="text" class="textField" name="abstracts[{$localeKey|escape}][keywords]" id="keywords" value="{$abstract.keywords|escape}" size="50" maxlength="255" /></td>
            	</tr>
        	</table>
        {/foreach}
    </div>
    <div class="separator"></div>
<!--    
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Proposal Details              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
-->
    <div id="proposalDetails">
        <h3>{translate key="submission.proposalDetails"}</h3>

        <table width="100%" class="data">

            <tr valign="top" id="studentInitiatedResearchField">
                <td title="{translate key="proposal.studentInitiatedResearchInstruct"}" width="20%" class="label">[?] {fieldLabel name="studentInitiatedResearch" required="true" key="proposal.studentInitiatedResearch"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="studentInitiatedResearch" id="studentInitiatedResearch" value="{$smarty.const.PROPOSAL_DETAIL_YES}" {if $studentInitiatedResearch == PROPOSAL_DETAIL_YES} checked="checked" {elseif  $proposalDetails.studentInitiatedResearch == PROPOSAL_DETAIL_YES } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="studentInitiatedResearch" id="studentInitiatedResearch" value="{$smarty.const.PROPOSAL_DETAIL_NO}" {if $studentInitiatedResearch == PROPOSAL_DETAIL_NO} checked="checked" {elseif  $proposalDetails.studentInitiatedResearch == PROPOSAL_DETAIL_NO } checked="checked"{/if} />{translate key="common.no"}
                	<table width="100%" class="data">
               			<tr valign="top" id="studentInstitutionField">
                			<td title="{translate key="proposal.studentInstitutionInstruct"}" width="20%" class="label">[?] {fieldLabel name="studentInstitution" required="false" key="proposal.studentInstitution"}</td>
                			<td width="80%" class="value">
            					<input type="text" class="textField" name="studentInstitution" id="studentInstitution" value="{if $studentInstitution}{$studentInstitution|escape}{else}{$studentResearch.studentInstitution|escape}{/if}" size="40" maxlength="255" />
            				</td>
            			</tr>
             			<tr valign="top" id="academicDegreeField">
                			<td title="{translate key="proposal.academicDegreeInstruct"}" width="20%" class="label">[?] {fieldLabel name="academicDegree" required="false" key="proposal.academicDegree"}</td>
                			<td width="80%" class="value">
								<select name="academicDegree" id="academicDegree" class="selectMenu">
									<option value=""></option>
									<option value="{$smarty.const.STUDENT_DEGREE_UNDERGRADUATE}" {if  $academicDegree == STUDENT_DEGREE_UNDERGRADUATE } selected="selected" {elseif $studentResearch.academicDegree == STUDENT_DEGREE_UNDERGRADUATE} selected="selected" {/if}>{translate key="proposal.undergraduate"}</option>
									<option value="{$smarty.const.STUDENT_DEGREE_MASTER}" {if  $academicDegree == STUDENT_DEGREE_MASTER } selected="selected" {elseif $studentResearch.academicDegree == STUDENT_DEGREE_MASTER} selected="selected"{/if}>{translate key="proposal.master"}</option>
									<option value="{$smarty.const.STUDENT_DEGREE_POST_DOC}" {if  $academicDegree == STUDENT_DEGREE_POST_DOC } selected="selected" {elseif $studentResearch.academicDegree == STUDENT_DEGREE_POST_DOC} selected="selected"{/if}>{translate key="proposal.postDoc"}</option>
									<option value="{$smarty.const.STUDENT_DEGREE_PHD}" {if  $academicDegree == STUDENT_DEGREE_PHD } selected="selected" {elseif $studentResearch.academicDegree == STUDENT_DEGREE_PHD} selected="selected"{/if}>{translate key="proposal.phd"}</option>
									<option value="{$smarty.const.STUDENT_DEGREE_OTHER}" {if  $academicDegree == STUDENT_DEGREE_OTHER } selected="selected" {elseif $studentResearch.academicDegree == STUDENT_DEGREE_OTHER} selected="selected"{/if}>{translate key="common.other"}</option>
								</select>
                			</td>
            			</tr>
                		<tr valign="top" id="supervisor"><td colspan="2"><b>{translate key="proposal.studentSupervisor"}</b></td></tr>
                		<tr valign="top" id="supervisorNameField">
                			<td title="{translate key="proposal.studentSupervisorNameInstruct"}" width="20%" class="label">[?] {fieldLabel name="supervisorName" required="false" key="proposal.studentSupervisorName"}</td>
                			<td width="80%" class="value">
            					<input type="text" class="textField" name="supervisorName" id="supervisorName" value="{if $supervisorName}{$supervisorName|escape}{else}{$studentResearch.supervisorName|escape}{/if}" size="50" maxlength="255" />
            				</td>
            			</tr>
                		<tr valign="top" id="supervisorEmailField">
                			<td title="{translate key="proposal.studentSupervisorEmailInstruct"}" width="20%" class="label">[?] {fieldLabel name="supervisorEmail" required="false" key="user.email"}</td>
                			<td width="80%" class="value">
            					<input type="text" class="textField" name="supervisorEmail" id="supervisorEmail" value="{if $supervisorEmail}{$supervisorEmail|escape}{else}{$studentResearch.supervisorEmail|escape}{/if}" size="50" maxlength="255" />
            				</td>
            			</tr>
            		</table>
            	</td>
            </tr>
            
            <tr valign="top" id="startDateField">
                <td title="{translate key="proposal.startDateInstruct"}" width="20%" class="label">[?] {fieldLabel name="startDate" required="true" key="proposal.startDate"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="startDate" id="startDate" value="{if $startDate}{$startDate|escape}{else}{$proposalDetails.startDate|escape}{/if}" size="20" maxlength="255" /></td>
            </tr>
            
            <tr valign="top" id="endDateField">
                <td title="{translate key="proposal.endDateInstruct"}" width="20%" class="label">[?] {fieldLabel name="endDate" required="true" key="proposal.endDate"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="endDate" id="endDate" value="{if $endDate}{$endDate|escape}{else}{$proposalDetails.endDate|escape}{/if}" size="20" maxlength="255" /></td>
            </tr>
            
            <tr valign="top" id="primarySponsorField">
                <td title="{translate key="proposal.primarySponsorInstruct"}" width="20%" class="label">[?] {fieldLabel name="primarySponsor" required="true" key="proposal.primarySponsor"}</td>
                <td width="80%" class="value">
                    <select name="primarySponsor" id="primarySponsor" class="selectMenu" onchange="showOrHideOtherPrimarySponsorField(this.value);">
                        <option value=""></option>
                        {foreach from=$agencies key=id item=sponsor}
                            {if $sponsor.code != "NA"}
                                {assign var="isSelected" value=false}
                                	{if $primarySponsor == $sponsor.code}
                                        {assign var="isSelected" value=true}
                                    {elseif $proposalDetails.primarySponsor == $sponsor.code}
                                        {assign var="isSelected" value=true}
                                    {/if}
                                    {if $primarySponsor == "OTHER"}
                                    	{assign var="isOtherPrimarySponsorSelected" value=true}
                                    {elseif $proposalDetails.primarySponsor == "OTHER"}
                                    	{assign var="isOtherPrimarySponsorSelected" value=true}
                                    {/if}
                                <option value="{$sponsor.code}" {if $isSelected==true}selected="selected"{/if} >{$sponsor.name}</option>
                            {/if}
                        {/foreach}
                    </select>
                </td>
            </tr>
            <tr valign="top" id="otherPrimarySponsorField" {if $isOtherPrimarySponsorSelected == false}style="display: none;"{/if}>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                <span title="{translate key="proposal.otherPrimarySponsorInstruct"}" style="font-style: italic;">[?] {fieldLabel name="otherPrimarySponsor" required="true" key="proposal.otherPrimarySponsor"}</span>&nbsp;&nbsp;
                <input type="text" class="textField" name="otherPrimarySponsor" id="otherPrimarySponsor" value="{if $isOtherPrimarySponsorSelected == false}NA{elseif $otherPrimarySponsor != 'NA' && $otherPrimarySponsor}{$otherPrimarySponsor|escape}{else}{$proposalDetails.otherPrimarySponsor|escape}{/if}" size="20" maxlength="255" />
                </td>
            </tr>
            
			{assign var="isOtherSecondarySponsorSelected" value=false}
			{if !empty($secondarySponsors)}
				{foreach from=$secondarySponsors key=i item=sponsor}
            		<tr valign="top" {if $i == 0}id="firstSecondarySponsor" class="secondarySponsor"{else}id="secondarySponsorField" class="secondarySponsorSupp"{/if}>
                		<td width="20%" class="secondarySponsorTitle" title="{translate key="proposal.secondarySponsorsInstruct"}">{if $i == 0}[?] {fieldLabel name="secondarySponsors" key="proposal.secondarySponsors"}{/if}</td>
						<td class="noSecondarySponsorTitle" style="display: none;">&nbsp;</td>
                		<td width="80%" class="value">
                    		<select name="secondarySponsors[]" id="secondarySponsors" class="selectMenu" onchange="showOrHideOtherSecondarySponsor(this.value);">
                    	    	<option value=""></option>
                        		{foreach from=$agencies key=id item=sponsor}
                            		{if $sponsor.code != "NA"}
                                		{assign var="isSelected" value=false}
                                		{foreach from=$secondarySponsors key=id item=selectedTypes}
                                    		{if $secondarySponsors[$i] == $sponsor.code}
                                        		{assign var="isSelected" value=true}
                                    		{/if}
                                    		{if $secondarySponsors[$i] == "OTHER"}
                                    			{assign var="isOtherSecondarySponsorSelected" value=true}
                                    		{/if}
                                		{/foreach}
                                		<option value="{$sponsor.code}" {if $isSelected==true}selected="selected"{/if} >{$sponsor.name}</option>
                            		{/if}
                        		{/foreach}
                    		</select>
                    		<a href="" class="removeSecondarySponsor" {if $i == 0} style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{else}
				{foreach from=$proposalDetails.secondarySponsors key=i item=sponsor}
            		<tr valign="top" {if $i == 0}id="firstSecondarySponsor" class="secondarySponsor"{else}id="secondarySponsorField" class="secondarySponsorSupp"{/if}>
                		<td width="20%" class="secondarySponsorTitle" title="{translate key="proposal.secondarySponsorsInstruct"}">{if $i == 0}[?] {fieldLabel name="secondarySponsors" key="proposal.secondarySponsors"}{/if}</td>
						<td class="noSecondarySponsorTitle" style="display: none;">&nbsp;</td>
                		<td width="80%" class="value">
                    		<select name="secondarySponsors[]" id="secondarySponsors" class="selectMenu" onchange="showOrHideOtherSecondarySponsor(this.value);">
                    	    	<option value=""></option>
                        		{foreach from=$agencies key=id item=sponsor}
                            		{if $sponsor.code != "NA"}
                                		{assign var="isSelected" value=false}
                                		{foreach from=$proposalDetails.secondarySponsors key=id item=selectedTypes}
                                    		{if $proposalDetails.secondarySponsors[$i] == $sponsor.code}
                                        		{assign var="isSelected" value=true}
                                    		{/if}
                                    		{if $proposalDetails.secondarySponsors[$i] == "OTHER"}
                                    			{assign var="isOtherSecondarySponsorSelected" value=true}
                                    		{/if}
                                		{/foreach}
                                		<option value="{$sponsor.code}" {if $isSelected==true}selected="selected"{/if} >{$sponsor.name}</option>
                            		{/if}
                        		{/foreach}
                    		</select>
                    		<a href="" class="removeSecondarySponsor" {if $i == 0} style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{/if}
            <tr id="addAnotherSecondarySponsor">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherSecondarySponsor">{translate key="proposal.addAnotherSecondarySponsor"}</a></td>
            </tr> 
            <tr valign="top" id="otherSecondarySponsorField" {if $isOtherSecondarySponsorSelected == false}style="display: none;"{/if}>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                	<span title="{translate key="proposal.otherSecondarySponsorInstruct"}" style="font-style: italic;">[?] {fieldLabel name="otherSecondarySponsor" required="true" key="proposal.otherSecondarySponsor"}</span>&nbsp;&nbsp;
                	<input type="text" class="textField" name="otherSecondarySponsor" id="otherSecondarySponsor" value="{if $isOtherSecondarySponsorSelected == false}NA{elseif $otherSecondarySponsor && $otherSecondarySponsor != 'NA'}{$otherSecondarySponsor|escape}{else}{$proposalDetails.otherSecondarySponsor|escape}{/if}" size="20" maxlength="255" />
                </td>
            </tr>
            
            <tr valign="top" id="multiCountryResearchField">
                <td title="{translate key="proposal.multiCountryResearchInstruct"}" width="20%" class="label">[?] {fieldLabel name="multiCountryResearch" required="true" key="proposal.multiCountryResearch"}</td>
                <td width="80%" class="value">
                	<input type="radio" name="multiCountryResearch" id="multiCountryResearch" value="{$smarty.const.PROPOSAL_DETAIL_YES}" {if  $multiCountryResearch == PROPOSAL_DETAIL_YES } checked="checked" {elseif $proposalDetails.multiCountryResearch == PROPOSAL_DETAIL_YES } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="multiCountryResearch" id="multiCountryResearch" value="{$smarty.const.PROPOSAL_DETAIL_NO}" {if  $multiCountryResearch == PROPOSAL_DETAIL_NO } checked="checked" {elseif $proposalDetails.multiCountryResearch == PROPOSAL_DETAIL_NO } checked="checked" {/if} />{translate key="common.no"}
                </td>
            </tr>
            {if !empty($countries)}
				{foreach from=$countries key=i item=country}
            		<tr valign="top" {if $i == 0}id="firstMultiCountry" class="multiCountry"{else}id="mutliCountryField" class="multiCountrySupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="multiCountry" required="true" key="proposal.multiCountry"}</span>&nbsp;&nbsp;
                    		<select name="countries[]" id="multiCountry" class="selectMenu">
                        		<option value="MCNA"></option><option value=""></option>
								{html_options options=$coutryList selected=$countries[$i]}
                    		</select>
                    		<a href="" class="removeMultiCountry" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
            {else}
				{foreach from=$proposalDetails.countries key=i item=country}
            		<tr valign="top" {if $i == 0}id="firstMultiCountry" class="multiCountry"{else}id="mutliCountryField" class="multiCountrySupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="multiCountry" required="true" key="proposal.multiCountry"}</span>&nbsp;&nbsp;
                    		<select name="countries[]" id="multiCountry" class="selectMenu">
                        		<option value="MCNA"></option><option value=""></option>
								{html_options options=$coutryList selected=$proposalDetails.countries[$i]}
                    		</select>
                    		<a href="" class="removeMultiCountry" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{/if}
            <tr id="addAnotherCountry">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherCountry">{translate key="proposal.addAnotherCountry"}</a></td>
            </tr> 
            
            <tr valign="top" id="nationwideField">
                <td width="20%" class="label">{fieldLabel name="nationwide" required="true" key="proposal.nationwide"}</td>
                <td width="80%" class="value">
                	<input type="radio" name="nationwide" id="nationwide" value="{$smarty.const.PROPOSAL_DETAIL_YES}" {if  $nationwide == PROPOSAL_DETAIL_YES } checked="checked"{elseif  $proposalDetails.nationwide == PROPOSAL_DETAIL_YES } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="nationwide" id="nationwide" value="{$smarty.const.PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS}" {if  $nationwide == PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS } checked="checked"{elseif  $proposalDetails.nationwide == PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS } checked="checked"{/if}  />{translate key="proposal.randomlySelectedProvince"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="nationwide" id="nationwide" value="{$smarty.const.PROPOSAL_DETAIL_NO}" {if  $nationwide == PROPOSAL_DETAIL_NO } checked="checked"{elseif  $proposalDetails.nationwide == PROPOSAL_DETAIL_NO } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
            {if !empty($geoAreas)}
				{foreach from=$geoAreas key=i item=country}
            		<tr valign="top" {if $i == 0}id="firstGeoArea" class="geoArea"{else}id="geoAreaField" class="geoAreaSupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="geoArea" required="true" key="proposal.geoArea"}</span>&nbsp;&nbsp;
                    		<select name="geoAreas[]" id="geoArea" class="selectMenu">
                        		<option value=""></option>
								{html_options options=$geoAreasList selected=$geoAreas[$i]}
                    		</select>
                    		<a href="" class="removeProposalProvince" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{else}
				{foreach from=$proposalDetails.geoAreas key=i item=country}
            		<tr valign="top" {if $i == 0}id="firstGeoArea" class="geoArea"{else}id="geoAreaField" class="geoAreaSupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="geoArea" required="true" key="proposal.geoArea"}</span>&nbsp;&nbsp;
                    		<select name="geoAreas[]" id="geoArea" class="selectMenu">
                        		<option value=""></option>
								{html_options options=$geoAreasList selected=$proposalDetails.geoAreas[$i]}
                    		</select>
                    		<a href="" class="removeProposalProvince" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{/if}
            <tr id="addAnotherArea">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherArea">{translate key="proposal.addAnotherArea"}</a></td>
            </tr>        

			{assign var="isOtherResearchFieldSelected" value=false}
			{if !empty($researchFields)}
				{foreach from=$researchFields key=i item=field}
            		<tr valign="top"  {if $i == 0}id="firstResearchField" class="researchField"{else}id="researchFieldField" class="researchFieldSupp"{/if}>
                		<td width="20%" class="researchFieldTitle">{if $i == 0}{fieldLabel name="researchField" required="true" key="proposal.researchField"}{else} &nbsp; {/if}</td>
						<td class="noResearchFieldTitle" style="display: none;">&nbsp;</td>
                		<td width="80%" class="value">
                    		<select name="researchFields[]" class="selectMenu" onchange="showOrHideOtherResearchField(this.value);">
                    			<option value=""></option>
                            		{foreach from=$researchFieldsList key=if item=rfield}
                            			{if $rfield.code != "NA"}
                                			{assign var="isSelected" value=false}
                                			{foreach from=$researchFields key=if item=selectedFields}
                                   				{if $researchFields[$i] == $rfield.code}
                                        			{assign var="isSelected" value=true}
                                    			{/if}
                                    			{if $researchFields[$i] == "OTHER"}
                                    				{assign var="isOtherResearchFieldSelected" value=true}
                                    			{/if}
                                			{/foreach}
                                			<option value="{$rfield.code}" {if $isSelected==true}selected="selected"{/if} >{$rfield.name}</option>
                            			{/if}
                            		{/foreach}
                    		</select>
                    		<a href="" class="removeResearchField" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
               			</td>
            		</tr>           
				{/foreach}
			{else}
				{foreach from=$proposalDetails.researchFields key=i item=field}
            		<tr valign="top"  {if $i == 0}id="firstResearchField" class="researchField"{else}id="researchFieldField" class="researchFieldSupp"{/if}>
                		<td width="20%" class="researchFieldTitle">{if $i == 0}{fieldLabel name="researchField" required="true" key="proposal.researchField"}{else} &nbsp; {/if}</td>
						<td class="noResearchFieldTitle" style="display: none;">&nbsp;</td>
                		<td width="80%" class="value">
                    		<select name="researchFields[]" class="selectMenu" onchange="showOrHideOtherResearchField(this.value);">
                    			<option value=""></option>
                            		{foreach from=$researchFieldsList key=if item=rfield}
                            			{if $rfield.code != "NA"}
                                			{assign var="isSelected" value=false}
                                			{foreach from=$proposalDetails.researchFields key=if item=selectedFields}
                                   				{if $proposalDetails.researchFields[$i] == $rfield.code}
                                        			{assign var="isSelected" value=true}
                                    			{/if}
                                    			{if $proposalDetails.researchFields[$i] == "OTHER"}
                                    				{assign var="isOtherResearchFieldSelected" value=true}
                                    			{/if}
                                			{/foreach}
                                			<option value="{$rfield.code}" {if $isSelected==true}selected="selected"{/if} >{$rfield.name}</option>
                            			{/if}
                            		{/foreach}
                    		</select>
                    		<a href="" class="removeResearchField" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
               			</td>
            		</tr>           
				{/foreach}
			{/if}
            <tr id="addAnotherField">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherField">{translate key="proposal.addAnotherFieldOfResearch"}</a></td>
            </tr>
            <tr valign="top" id="otherResearchFieldField" {if $isOtherResearchFieldSelected == false}style="display: none;"{/if}>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;">{fieldLabel name="otherResearchField" key="proposal.otherResearchField"}</span>&nbsp;&nbsp;
            		<input type="text" class="textField" name="otherResearchField" id="otherResearchField" value="{if $isOtherResearchFieldSelected == false}NA{elseif $otherResearchField && $otherResearchField != 'NA'}{$otherResearchField|escape}{else}{$proposalDetails.otherResearchField|escape}{/if}" size="30" maxlength="255" />
            	</td>
            </tr>
            
            <tr valign="top" id="HumanSubjectField">
                <td width="20%" class="label">{fieldLabel name="withHumanSubjects" required="true" key="proposal.withHumanSubjects"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="withHumanSubjects" id="withHumanSubjects" value="{$smarty.const.PROPOSAL_DETAIL_YES}" {if  $withHumanSubjects == PROPOSAL_DETAIL_YES } checked="checked"{elseif  $proposalDetails.withHumanSubjects == PROPOSAL_DETAIL_YES } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="withHumanSubjects" id="withHumanSubjects" value="{$smarty.const.PROPOSAL_DETAIL_NO}" {if  $withHumanSubjects == PROPOSAL_DETAIL_NO } checked="checked"{elseif  $proposalDetails.withHumanSubjects == PROPOSAL_DETAIL_NO } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
			{assign var="isOtherProposalTypeSelected" value=false}
			{if !empty($proposalTypes)}
				{foreach from=$proposalTypes key=i item=type}
            		<tr valign="top" {if $i == 0}id="firstProposalType" class="proposalType"{else}id="proposalTypeField" class="proposalTypeSupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="proposalType" required="false" key="proposal.proposalType"}</span>&nbsp;&nbsp;
                    		<select name="proposalTypes[]" id="proposalType" class="selectMenu" onchange="showOrHideOtherProposalType(this.value);">
                        		<option value=""></option>
                            	{foreach from=$proposalTypesList key=id item=ptype}
                            		{if $ptype.code != "PNHS"}
                                		{assign var="isSelected" value=false}
                                		{foreach from=$proposalTypes key=id item=selectedTypes}
                                    		{if $proposalTypes[$i] == $ptype.code}
                                        		{assign var="isSelected" value=true}
                                    		{/if}
                                    		{if $proposalTypes[$i] == "OTHER"}{assign var="isOtherProposalTypeSelected" value=true}{/if}
                                		{/foreach}
                                		<option value="{$ptype.code}" {if $isSelected==true}selected="selected"{/if} >{$ptype.name}</option>
                            		{/if}
                            	{/foreach}
                    		</select>
                    		<a href="" class="removeProposalType" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{else}
				{foreach from=$proposalDetails.proposalTypes key=i item=type}
            		<tr valign="top" {if $i == 0}id="firstProposalType" class="proposalType"{else}id="proposalTypeField" class="proposalTypeSupp"{/if}>
                		<td width="20%" class="label">&nbsp;</td>
                		<td width="80%" class="value">
                			<span style="font-style: italic;">{fieldLabel name="proposalType" required="false" key="proposal.proposalType"}</span>&nbsp;&nbsp;
                    		<select name="proposalTypes[]" id="proposalType" class="selectMenu" onchange="showOrHideOtherProposalType(this.value);">
                        		<option value=""></option>
                            	{foreach from=$proposalTypesList key=id item=ptype}
                            		{if $ptype.code != "PNHS"}
                                		{assign var="isSelected" value=false}
                                		{foreach from=$proposalDetails.proposalTypes key=id item=selectedTypes}
                                    		{if $proposalDetails.proposalTypes[$i] == $ptype.code}
                                        		{assign var="isSelected" value=true}
                                    		{/if}
                                    		{if $proposalDetails.proposalTypes[$i] == "OTHER"}{assign var="isOtherProposalTypeSelected" value=true}{/if}
                                		{/foreach}
                                		<option value="{$ptype.code}" {if $isSelected==true}selected="selected"{/if} >{$ptype.name}</option>
                            		{/if}
                            	{/foreach}
                    		</select>
                    		<a href="" class="removeProposalType" {if $i == 0}style="display:none"{/if}>{translate key="common.remove"}</a>
                		</td>
            		</tr>
				{/foreach}
			{/if}
            <tr id="addAnotherType">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherType">{translate key="proposal.addAnotherProposalType"}</a></td>
            </tr>    
            <tr valign="top" id="otherProposalTypeField" {if $isOtherProposalTypeSelected == false}style="display: none;"{/if}>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;">{fieldLabel name="otherProposalType" key="proposal.otherProposalType" required="true"}</span>&nbsp;&nbsp;
            		<input type="text" class="textField" name="otherProposalType" id="otherProposalType" value="{if $isOtherProposalTypeSelected == false}NA{elseif $otherProposalType && $otherProposalType != 'NA'}{$otherProposalType|escape}{else}{$proposalDetails.otherProposalType|escape}{/if}" size="30" maxlength="255" />
            	</td>
            </tr>

            <tr valign="top" id="dataCollectionField">
            	<td width="20%" class="label">{fieldLabel name="dataCollection" required="true" key="proposal.dataCollection"}</td>
            	<td width="80%" class="value">
            		<select name="dataCollection" class="selectMenu">
            			<option value=""></option>
            			<option value="{$smarty.const.PROPOSAL_DETAIL_PRIMARY_DATA_COLLECTION}" {if $dataCollection == PROPOSAL_DETAIL_PRIMARY_DATA_COLLECTION } selected="selected" {elseif  $proposalDetails.dataCollection == PROPOSAL_DETAIL_PRIMARY_DATA_COLLECTION } selected="selected"{/if}>{translate key="proposal.primaryDataCollection"}</option>
            			<option value="{$smarty.const.PROPOSAL_DETAIL_SECONDARY_DATA_COLLECTION}" {if $dataCollection == PROPOSAL_DETAIL_SECONDARY_DATA_COLLECTION } selected="selected"{elseif $proposalDetails.dataCollection == PROPOSAL_DETAIL_SECONDARY_DATA_COLLECTION } selected="selected"{/if}>{translate key="proposal.secondaryDataCollection"}</option>
            			<option value="{$smarty.const.PROPOSAL_DETAIL_BOTH_DATA_COLLECTION}" {if $dataCollection == PROPOSAL_DETAIL_BOTH_DATA_COLLECTION } selected="selected"{elseif $proposalDetails.dataCollection == PROPOSAL_DETAIL_BOTH_DATA_COLLECTION } selected="selected"{/if}>{translate key="proposal.bothDataCollection"}</option>
					</select>
            	</td>
            </tr>

            <tr valign="top" id="otherErcField">
                <td width="20%" class="label">{fieldLabel name="reviewedByOtherErc" required="true" key="proposal.reviewedByOtherErc"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="reviewedByOtherErc" id="reviewedByOtherErc" value="{$smarty.const.PROPOSAL_DETAIL_YES}" {if $reviewedByOtherErc == PROPOSAL_DETAIL_YES } checked="checked"{elseif $proposalDetails.committeeReviewed == PROPOSAL_DETAIL_YES } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="reviewedByOtherErc" id="reviewedByOtherErc" value="{$smarty.const.PROPOSAL_DETAIL_NO}" {if $reviewedByOtherErc == PROPOSAL_DETAIL_NO } checked="checked"{elseif $proposalDetails.committeeReviewed == PROPOSAL_DETAIL_NO } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>

            <tr valign="top" id="otherErcDecisionField">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;">{fieldLabel name="otherErcDecision" required="false" key="proposal.otherErcDecision"}</span>&nbsp;&nbsp;
                    <select name="otherErcDecision" id="otherErcDecision" class="selectMenu">
                        <option value="NA"></option>
                        <option value="{$smarty.const.PROPOSAL_DETAIL_UNDER_REVIEW}" {if  $otherErcDecision == PROPOSAL_DETAIL_UNDER_REVIEW } selected="selected"{elseif  $proposalDetails.committeeReviewed == PROPOSAL_DETAIL_UNDER_REVIEW } selected="selected"{/if} >{translate key="proposal.otherErcDecisionUnderReview"}</option>
                        <option value="{$smarty.const.PROPOSAL_DETAIL_REVIEW_AVAILABLE}" {if  $otherErcDecision == PROPOSAL_DETAIL_REVIEW_AVAILABLE } selected="selected"{elseif  $proposalDetails.committeeReviewed == PROPOSAL_DETAIL_REVIEW_AVAILABLE } selected="selected"{/if} >{translate key="proposal.otherErcDecisionFinalAvailable"}</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>
    <div class="separator"></div>
<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////             Source of Monetary              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
-->
    <div id="sourcesOfGrant">
        <h3>{translate key="proposal.sourceOfMonetary"}</h3>
        <table width="100%" class="data">
			{assign var="eng" value="en_US"}
            <tr><td><br/></td></tr>
            <tr valign="top" id="fundsRequiredField">
                <td width="20%" class="label">{fieldLabel name="fundsRequired" required="true" key="proposal.fundsRequired"}</td>
                <td width="80%" class="value"><input type="text" class="textField" name="fundsRequired[{$eng|escape}]" id="fundsRequired" value="{$fundsRequired[$eng]|escape}" size="20" maxlength="255" />&nbsp;US$</td>
            </tr>
            <tr valign="top" id="fundsRequiredInstructField">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value"><span><i>{translate key="proposal.fundsRequiredInstruct"}</i></span></td>
            </tr>
			<tr valign="top" style="display: none;">
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                	<input type="radio" name="selectedCurrency[{$eng|escape}]" value="USD"  checked="checked" />US Dollar(s)
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="selectedCurrency[{$eng|escape}]" value="MNT"/>Tugrik(s)
                </td>
            </tr>
            <tr><td><br/></td></tr>

        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="industryGrant" required="true" key="proposal.industryGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="industryGrant[{$eng|escape}]" id="industryGrant" value="Yes" {if  $industryGrant[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="industryGrant[{$eng|escape}]" id="industryGrant" value="No" {if  $industryGrant[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
            <tr valign="top" id="nameOfIndustryField"  style="display: none;">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                    <span style="font-style: italic;">{fieldLabel name="nameOfIndustry" required="true" key="proposal.nameOfIndustry"}</span>&nbsp;&nbsp;
                    <input type="text" name="nameOfIndustry[{$eng|escape}]" id="nameOfIndustry" size="20" value="{$nameOfIndustry[$eng]|escape}" />
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="internationalGrant" required="true" key="proposal.internationalGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="internationalGrant[{$eng|escape}]" id="internationalGrant" value="Yes" {if  $internationalGrant[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="internationalGrant[{$eng|escape}]" id="internationalGrant" value="No" {if  $internationalGrant[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
            
{assign var="isOtherInternationalGrantNameSelected" value=false}
{foreach from=$internationalGrantName[$eng] key=i item=type}
            <tr valign="top" {if $i == 0}id="firstInternationalGrantName" class="internationalGrantName"{else}id="internationalGrantNameField" class="internationalGrantNameSupp"{/if}>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span  style="font-style: italic;">{fieldLabel name="internationalGrantName" required="true" key="proposal.internationalGrantName"}</span>&nbsp;&nbsp;
                    <select name="internationalGrantName[{$eng|escape}][]" id="internationalGrantName" class="selectMenu" onchange="showOrHideOtherInternationalGrantName(this.value);">
                        <option value=""></option>
                        {foreach from=$agencies key=id item=igName}
                            {if $igName.code != "NA"}
                                {assign var="isSelected" value=false}
                                {foreach from=$internationalGrantName[$eng] key=id item=selectedTypes}
                                    {if $internationalGrantName[$eng][$i] == $igName.code}
                                        {assign var="isSelected" value=true}
                                    {/if}
                                    {if $internationalGrantName[$eng][$i] == "OTHER"}{assign var="isOtherInternationalGrantNameSelected" value=true}{/if}
                                {/foreach}
                                <option value="{$igName.code}" {if $isSelected==true}selected="selected"{/if} >{$igName.name}</option>
                            {/if}
                        {/foreach}
                    </select>
                    <a href="" class="removeInternationalGrantName" {if $i == 0} style="display:none"{/if}>{translate key="common.remove"}</a>
                </td>
            </tr>
{/foreach} 
            <tr id="addAnotherInternationalGrantName">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherInternationalGrantName">Add another agency</a></td>
            </tr>
            
            <tr valign="top" id="otherInternationalGrantNameField" {if $isOtherInternationalGrantNameSelected == false}style="display: none;"{/if}>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                <span style="font-style: italic;">{fieldLabel name="otherPrimarySponsor" required="true" key="proposal.otherInternationalGrantName"}</span>&nbsp;&nbsp;
                <input type="text" class="textField" name="otherInternationalGrantName[{$eng|escape}]" id="otherInternationalGrantName" value="{if $isOtherInternationalGrantNameSelected == false}NA{else}{$otherInternationalGrantName[$eng]|escape}{/if}" size="20" maxlength="255" />
                </td>
            </tr>
            
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="mohGrant" required="true" key="proposal.mohGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="mohGrant[{$eng|escape}]" id="mohGrant" value="Yes" {if  $mohGrant[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="mohGrant[{$eng|escape}]" id="mohGrant" value="No" {if  $mohGrant[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="governmentGrant" required="true" key="proposal.governmentGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="governmentGrant[{$eng|escape}]" id="governmentGrantY" value="Yes" {if  $governmentGrant[$eng] == "Yes"} checked="checked"{/if}  onclick="showOrHideGovernmentGrant('Yes')"/>{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="governmentGrant[{$eng|escape}]" id="governmentGrant" value="No" {if  $governmentGrant[$eng] == "No" } checked="checked"{/if} onclick="showOrHideGovernmentGrant('No')"/>{translate key="common.no"}
                </td>
            </tr>
            <tr valign="top" id="governmentGrantNameField" style="display: none;">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                    <span style="font-style: italic;">{fieldLabel name="governmentGrantName" required="true" key="proposal.governmentGrantName"}</span>&nbsp;&nbsp;
                    <input type="text" name="governmentGrantName[{$eng|escape}]" id="governmentGrantName" size="20" value="{$governmentGrantName[$eng]|escape}" />
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="universityGrant" required="true" key="proposal.universityGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="universityGrant[{$eng|escape}]" id="universityGrant" value="Yes" {if  $universityGrant[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="universityGrant[{$eng|escape}]" id="universityGrant" value="No" {if  $universityGrant[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="selfFunding" required="true" key="proposal.selfFunding"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="selfFunding[{$eng|escape}]" id="selfFunding" value="Yes" {if  $selfFunding[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="selfFunding[{$eng|escape}]" id="selfFunding" value="No" {if  $selfFunding[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label">{fieldLabel name="otherGrant" required="true" key="proposal.otherGrant"}</td>
                <td width="80%" class="value">
                    <input type="radio" name="otherGrant[{$eng|escape}]" id="otherGrant" value="Yes" {if  $otherGrant[$eng] == "Yes" } checked="checked"{/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="otherGrant[{$eng|escape}]" id="otherGrant" value="No" {if  $otherGrant[$eng] == "No" } checked="checked"{/if} />{translate key="common.no"}
                </td>
            </tr>

            <tr valign="top" id="specifyOtherGrantField"  style="display: none;">
            	<td width="20%" class="label">&nbsp;</td>
            	<td width="80%" class="value">
					<span style="font-style: italic;">{fieldLabel name="specifyOtherGrant" required="true" key="proposal.specifyOtherGrantField"}</span>&nbsp;&nbsp;
                    <input type="text" name="specifyOtherGrant[{$eng|escape}]" id="specifyOtherGrant" size="20" value="{$specifyOtherGrant[$eng]|escape}" />
            	</td>
            </tr>
            
        </table>
    </div>
    <div class="separator"></div>
<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Risk Assessment               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
-->
	<div id="riskAssessment">
		<h3>{translate key="proposal.riskAssessment"}</h3>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        	<tr valign="top"><td colspan="2"><b>{translate key="proposal.researchIncludesHumanSubject"}</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="identityRevealedField">
        		<td width="40%" class="label">{fieldLabel name="identityRevealed" required="true" key="proposal.identityRevealed"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="identityRevealed" value="1" {if $identityRevealed == "1"} checked="checked" {elseif $riskAssessment.identityRevealed == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="identityRevealed" value="0" {if $identityRevealed == "0"} checked="checked" {elseif $riskAssessment.identityRevealed == "0" } checked="checked" {/if} />{translate key="common.no"}       		
        		</td>
        	</tr>
        	<tr valign="top" id="unableToConsentField">
        		<td width="40%" class="label">{fieldLabel name="unableToConsent" required="true" key="proposal.unableToConsent"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="unableToConsent" value="1" {if $unableToConsent == "1"} checked="checked" {elseif $riskAssessment.unableToConsent == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="unableToConsent" value="0" {if $unableToConsent == "0"} checked="checked" {elseif $riskAssessment.unableToConsent == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="under18Field">
        		<td width="40%" class="label">{fieldLabel name="under18" required="true" key="proposal.under18"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="under18" value="1" {if $under18 == "1"} checked="checked" {elseif $riskAssessment.under18 == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="under18" value="0" {if $under18 == "0"} checked="checked" {elseif $riskAssessment.under18 == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="dependentRelationshipField">
        		<td width="40%" class="label">{fieldLabel name="dependentRelationship" required="true" key="proposal.dependentRelationship"}<br/><i>{translate key="proposal.dependentRelationshipInstruct"}</i></td>
        		<td width="60%" class="value">
                	<input type="radio" name="dependentRelationship" value="1" {if $dependentRelationship == "1"} checked="checked" {elseif $riskAssessment.dependentRelationship == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="dependentRelationship" value="0" {if $dependentRelationship == "0"} checked="checked" {elseif $riskAssessment.dependentRelationship == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="ethnicMinorityField">
        		<td width="40%" class="label">{fieldLabel name="ethnicMinority" required="true" key="proposal.ethnicMinority"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="ethnicMinority" value="1" {if $ethnicMinority == "1"} checked="checked" {elseif $riskAssessment.ethnicMinority == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="ethnicMinority" value="0" {if $ethnicMinority == "0"} checked="checked" {elseif $riskAssessment.ethnicMinority == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="impairmentField">
        		<td width="40%" class="label">{fieldLabel name="impairment" required="true" key="proposal.impairment"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="impairment" value="1" {if $impairment == "1"} checked="checked" {elseif $riskAssessment.impairment == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="impairment" value="0" {if $impairment == "0"} checked="checked" {elseif $riskAssessment.impairment == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="pregnantField">
        		<td width="40%" class="label">{fieldLabel name="pregnant" required="true" key="proposal.pregnant"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="pregnant" value="1" {if $pregnant == "1"} checked="checked" {elseif $riskAssessment.pregnant == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="pregnant" value="0" {if $pregnant == "0"} checked="checked" {elseif  $riskAssessment.pregnant == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b>{translate key="proposal.researchIncludes"}</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="newTreatmentField">
        		<td width="40%" class="label">{fieldLabel name="newTreatment" required="true" key="proposal.newTreatment"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="newTreatment" value="1" {if $newTreatment == "1"} checked="checked" {elseif $riskAssessment.newTreatment == "1"} checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="newTreatment" value="0" {if $newTreatment == "0"} checked="checked" {elseif $riskAssessment.newTreatment == "0"} checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="bioSamplesField">
        		<td width="40%" class="label">{fieldLabel name="bioSamples" required="true" key="proposal.bioSamples"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="bioSamples" value="1" {if $bioSamples == "1"} checked="checked" {elseif $riskAssessment.bioSamples == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="bioSamples" value="0" {if $bioSamples == "0"} checked="checked" {elseif $riskAssessment.bioSamples == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="radiationField">
        		<td width="40%" class="label">{fieldLabel name="radiation" required="true" key="proposal.radiation"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="radiation" value="1" {if $radiation == "1"} checked="checked" {elseif $riskAssessment.radiation == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="radiation" value="0" {if $radiation == "0"} checked="checked" {elseif $riskAssessment.radiation == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="distressField">
        		<td width="40%" class="label">{fieldLabel name="distress" required="true" key="proposal.distress"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="distress" value="1" {if $distress == "1"} checked="checked" {elseif $riskAssessment.distress == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="distress" value="0" {if $distress == "0"} checked="checked" {elseif $riskAssessment.distress == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="inducementsField">
        		<td width="40%" class="label">{fieldLabel name="inducements" required="true" key="proposal.inducements"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="inducements" value="1" {if $inducements == "1"} checked="checked" {elseif $riskAssessment.inducements == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="inducements" value="0" {if $inducements == "0"} checked="checked" {elseif $riskAssessment.inducements == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="sensitiveInfoField">
        		<td width="40%" class="label">{fieldLabel name="sensitiveInfo" required="true" key="proposal.sensitiveInfo"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="sensitiveInfo" value="1" {if $sensitiveInfo == "1"} checked="checked" {elseif $riskAssessment.sensitiveInfo == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="sensitiveInfo" value="0" {if $sensitiveInfo == "0"} checked="checked" {elseif $riskAssessment.sensitiveInfo == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="deceptionField">
        		<td width="40%" class="label">{fieldLabel name="deception" required="true" key="proposal.deception"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="deception" value="1" {if $deception == "1"} checked="checked" {elseif $riskAssessment.deception == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="deception" value="0" {if $deception == "0"} checked="checked" {elseif $riskAssessment.deception == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="reproTechnologyField">
        		<td width="40%" class="label">{fieldLabel name="reproTechnology" required="true" key="proposal.reproTechnology"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="reproTechnology" value="1" {if $reproTechnology == "1"} checked="checked" {elseif $riskAssessment.reproTechnology == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="reproTechnology" value="0" {if $reproTechnology == "0"} checked="checked" {elseif $riskAssessment.reproTechnology == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="geneticField">
        		<td width="40%" class="label">{fieldLabel name="genetic" required="true" key="proposal.genetic"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="genetic" value="1" {if $genetic == "1"} checked="checked" {elseif $riskAssessment.genetic == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="genetic" value="0" {if $genetic == "0"} checked="checked" {elseif $riskAssessment.genetic == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="stemCellField">
        		<td width="40%" class="label">{fieldLabel name="stemCell" required="true" key="proposal.stemCell"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="stemCell" value="1" {if $stemCell == "1"} checked="checked" {elseif $riskAssessment.stemCell == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="stemCell" value="0" {if $stemCell == "0"} checked="checked" {elseif $riskAssessment.stemCell == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="biosafetyField">
        		<td width="40%" class="label">{fieldLabel name="genetics" required="true" key="proposal.biosafety"}</td>
        		<td width="60%" class="value">
                	<input type="radio" name="biosafety" value="1" {if $biosafety == "1"} checked="checked" {elseif $riskAssessment.biosafety == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="biosafety" value="0" {if $biosafety == "0"} checked="checked" {elseif $riskAssessment.biosafety == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b>{translate key="proposal.potentialRisk"}</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="riskLevelField">
        		<td width="30%" class="label">{fieldLabel name="riskLevel" required="true" key="proposal.riskLevel"}</td>
        		<td width="70%" class="value">
            		<select name="riskLevel" class="selectMenu" id="riskLevel">
            			<option value=""></option>
            			<option value="1" {if $riskLevel == "1"} selected="selected" {elseif $riskAssessment.riskLevel == "1" } selected="selected" {/if}>{translate key="proposal.riskLevelNoMore"}</option>
            			<option value="2" {if $riskLevel == "2"} selected="selected" {elseif $riskAssessment.riskLevel == "2" } selected="selected" {/if}>{translate key="proposal.riskLevelMinore"}</option>
            			<option value="3" {if $riskLevel == "3"} selected="selected" {elseif $riskAssessment.riskLevel == "3" } selected="selected" {/if}>{translate key="proposal.riskLevelMore"}</option>
					</select>
				</td>
        	</tr>
        	<tr valign="top" id="listRisksField">
                <td width="30%" class="label">{fieldLabel name="listRisks" required="true" key="proposal.listRisks"}</td>
                <td width="70%" class="value">
                    <textarea name="listRisks" class="textArea" id="listRisks" rows="5" cols="40">{if $listRisks}{$listRisks}{else}{$riskAssessment.listRisks|escape}{/if}</textarea><br/>
                </td>
            </tr>
            <tr valign="top" id="howRisksMinimizedField">
                <td width="30%" class="label">{fieldLabel name="howRisksMinimized" required="true" key="proposal.howRisksMinimized"}</td>
                <td width="70%" class="value">
                    <textarea name="howRisksMinimized" class="textArea" id="howRisksMinimized" rows="5" cols="40">{if $howRisksMinimized}{$listRisks}{else}{$riskAssessment.howRisksMinimized|escape}{/if}</textarea><br/>
                </td>
            </tr>
            <tr valign="top" id="riskApplyToField">
                <td width="30%" class="label">{fieldLabel name="riskApplyTo" key="proposal.riskApplyTo"}</td>
                <td width="70%" class="value">
                	<input type="checkbox" name="risksToTeam" value="1" {if $risksToTeam == "1"} checked="checked" {elseif $riskAssessment.risksToTeam == '1'} checked="checked" {/if}/>{translate key="proposal.researchTeam"}<br/>
                	<input type="checkbox" name="risksToSubjects" value="1" {if $risksToSubjects == "1"} checked="checked" {elseif $riskAssessment.risksToSubjects == '1'} checked="checked" {/if}/>{translate key="proposal.researchSubjects"}<br/>
                	<input type="checkbox" name="risksToCommunity" value="1" {if $risksToCommunity == "1"} checked="checked" {elseif $riskAssessment.risksToCommunity == '1'} checked="checked" {/if}/>{translate key="proposal.widerCommunity"}
                </td>
            </tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b>{translate key="proposal.potentialBenefits"}</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
           	<tr valign="top" id="benefitsFromTheProjectField">
                <td width="30%" class="label">{fieldLabel name="benefitsFromTheProject" key="proposal.benefitsFromTheProject"}</td>
                <td width="70%" class="value">
                	<input type="checkbox" name="benefitsToParticipants" value="1" {if $benefitsToParticipants == "1"} checked="checked" {elseif $riskAssessment.benefitsToParticipants == '1'} checked="checked" {/if}/>{translate key="proposal.directBenefits"}<br/>
                	<input type="checkbox" name="knowledgeOnCondition" value="1" {if $knowledgeOnCondition == "1"} checked="checked" {elseif $riskAssessment.knowledgeOnCondition == '1'} checked="checked" {/if}/>{translate key="proposal.participantCondition"}<br/>
                	<input type="checkbox" name="knowledgeOnDisease" value="1" {if $knowledgeOnDisease == "1"} checked="checked" {elseif $riskAssessment.knowledgeOnDisease == '1'} checked="checked" {/if}/>{translate key="proposal.diseaseOrCondition"}
                </td>
            </tr>
        	<tr valign="top" id="multiInstitutionsField">
        		<td width="30%" class="label">{fieldLabel name="multiInstitutions" required="true" key="proposal.multiInstitutions"}</td>
        		<td width="70%" class="value">
                	<input type="radio" name="multiInstitutions" value="1" {if $multiInstitutions == "1"} checked="checked" {elseif  $riskAssessment.multiInstitutions== "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="multiInstitutions" value="0" {if $multiInstitutions == "0"} checked="checked" {elseif  $riskAssessment.multiInstitutions == "0" } checked="checked" {/if} />{translate key="common.no"}        		
        		</td>
        	</tr>
        	<tr valign="top" id="conflictOfInterestField">
        		<td title="{translate key="proposal.conflictOfInterestInstruct"}" width="30%" class="label">{fieldLabel name="conflictOfInterest" required="true" key="proposal.conflictOfInterest"}</td>
        		<td width="70%" class="value">
                	<input type="radio" name="conflictOfInterest" value="1" {if $conflictOfInterest == "1"} checked="checked" {elseif  $riskAssessment.conflictOfInterest == "1" } checked="checked" {/if}  />{translate key="common.yes"}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="conflictOfInterest" value="2" {if $conflictOfInterest == "2"} checked="checked" {elseif  $riskAssessment.conflictOfInterest == "2" } checked="checked" {/if} />{translate key="common.no"}  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="conflictOfInterest" value="3" {if $conflictOfInterest == "3"} checked="checked" {elseif  $riskAssessment.conflictOfInterest == "3" } checked="checked" {/if} />{translate key="common.notSure"}
        		</td>
        	</tr>
        </table>
	</div>
    <div class="separator"></div>


	<p><input type="submit" value="{translate key="submission.saveMetadata"}" class="button defaultButton"/> <input type="button" value="{translate key="common.cancel"}" class="button" onclick="history.go(-1)" /></p>

	<p><span class="formRequired">{translate key="common.requiredField"}</span></p>

</form>

{include file="common/footer.tpl"}