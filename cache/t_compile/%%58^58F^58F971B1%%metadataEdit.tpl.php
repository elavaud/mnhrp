<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:51
         compiled from submission/metadata/metadataEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'submission/metadata/metadataEdit.tpl', 15, false),array('function', 'fieldLabel', 'submission/metadata/metadataEdit.tpl', 653, false),array('function', 'form_language_chooser', 'submission/metadata/metadataEdit.tpl', 670, false),array('function', 'translate', 'submission/metadata/metadataEdit.tpl', 671, false),array('function', 'call_hook', 'submission/metadata/metadataEdit.tpl', 737, false),array('function', 'html_options', 'submission/metadata/metadataEdit.tpl', 946, false),array('modifier', 'assign', 'submission/metadata/metadataEdit.tpl', 15, false),array('modifier', 'escape', 'submission/metadata/metadataEdit.tpl', 18, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "submission.editMetadata"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'information','op' => 'competingInterestGuidelines'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'competingInterestGuidelinesUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'competingInterestGuidelinesUrl'));?>


<form name="metadata" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveMetadata'), $this);?>
" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
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
		if (value == \'Yes\'){
			document.getElementById(\'governmentGrantNameField\').style.display = \'\';
			$(\'#governmentGrantName\').val("");
		} else {
			if (document.getElementById(\'governmentGrantY\').checked) {
				document.getElementById(\'governmentGrantNameField\').style.display = \'\';			
			} else {
				document.getElementById(\'governmentGrantNameField\').style.display = \'none\';
				$(\'#governmentGrantName\').val("NA");		
			}
		}
	}
	
	function showOrHideOtherPrimarySponsorField(value){
		if (value == \'OTHER\') {
			document.getElementById(\'otherPrimarySponsorField\').style.display = \'\';
			$(\'#otherPrimarySponsor\').val("");
		} else {
			var other = false
			var list = document.getElementsByName("primarySponsor[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == \'OTHER\'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById(\'otherPrimarySponsorField\').style.display = \'none\';
				$(\'#otherPrimarySponsor\').val("NA");
			} else {
				document.getElementById(\'otherPrimarySponsorField\').style.display = \'\';
			}
		} 	
	}
	
	function showOrHideOtherInternationalGrantName(value){
		if (value == \'OTHER\') {
			document.getElementById(\'otherInternationalGrantNameField\').style.display = \'\';
			$(\'#otherInternationalGrantName\').val("");
		} else {
			var other = false
			var list = document.getElementsByName("internationalGrantName[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == \'OTHER\'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById(\'otherInternationalGrantNameField\').style.display = \'none\';
				$(\'#otherInternationalGrantName\').val("NA");
			} else {
				document.getElementById(\'otherInternationalGrantNameField\').style.display = \'\';
			}
		}
	}

	function showOrHideOtherSecondarySponsor(value){
		if (value == \'OTHER\') {
			document.getElementById(\'otherSecondarySponsorField\').style.display = \'\';
			$(\'#otherSecondarySponsor\').val("");
		} else {
			var other = false
			var list = document.getElementsByName("secondarySponsors[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == \'OTHER\'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById(\'otherSecondarySponsorField\').style.display = \'none\';
				$(\'#otherSecondarySponsor\').val("NA");
			} else {
				document.getElementById(\'otherSecondarySponsorField\').style.display = \'\';
			}
		}
	}
	
	function showOrHideOtherResearchField(value){
		if (value == \'OTHER\') {
			document.getElementById(\'otherResearchFieldField\').style.display = \'\';
			$(\'#otherResearchField\').val("");
		} else {
			var other = false
			var list = document.getElementsByName("researchField[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == \'OTHER\'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById(\'otherResearchFieldField\').style.display = \'none\';
				$(\'#otherResearchField\').val("NA");
			}
		}
	}

	function showOrHideOtherProposalType(value){
		if (value == \'OTHER\') {
			document.getElementById(\'otherProposalTypeField\').style.display = \'\';
			$(\'#otherProposalType\').val("");
		} else {
			var other = false
			var list = document.getElementsByName("proposalType[en_US][]");
			for (i=0; i<list.length; i++){
				var strUser = list[i].options[list[i].selectedIndex].value;
				if (strUser == \'OTHER\'){
					other = true;
				}
			}
			if (other == false){
				document.getElementById(\'otherProposalTypeField\').style.display = \'none\';
				$(\'#otherProposalType\').val("NA");
			} else {
				document.getElementById(\'otherProposalTypeField\').style.display = \'\';
			}
		}
	}
	
    
    function isNumeric(elem, helperMsg){
    	var numericExpression = /^([\\s]*[0-9]+[\\s]*)+$/;
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
        	if($(\'input[name^="withHumanSubjects"]:checked\').val() == "No" || $(\'input[name^="withHumanSubjects"]:checked\').val() == null) {
            	$(\'#proposalTypeField\').hide();
            	$(\'#firstProposalType\').hide();
            	$(\'#otherProposalTypeField\').hide();
            	$(\'#addAnotherType\').hide();
            	$(\'#proposalType\').append(\'<option value="PNHS"></option>\');
            	$(\'#proposalType\').val("PNHS");
            	$(\'#otherProposalType\').val("NA");
        	} 

        	$(\'input[name^="withHumanSubjects"]\').change(
        		function(){
            		var answer = $(\'input[name^="withHumanSubjects"]:checked\').val();
            		if(answer == "Yes") {
                		$(\'#proposalTypeField\').show();
                		$(\'#firstProposalType\').show();
                		$(\'#addAnotherType\').show();
                		$(\'#proposalType option[value="PNHS"]\').remove();
            		} else {
            			$(\'.proposalTypeSupp\').remove();
                		$(\'#firstProposalType\').hide();
                		$(\'#otherProposalTypeField\').hide();
                		$(\'#otherProposalType\').val("NA");
                		$(\'#addAnotherType\').hide();
                		$(\'#proposalType\').append(\'<option value="PNHS"></option>\');
                		$(\'#proposalType\').val("PNHS");
            		}
        		}
        	); 
        	//Start code for multiple proposal types
        	
        	$(\'#addAnotherType\').click(
        		function(){
            		var proposalTypeHtml = \'<tr valign="top" class="proposalTypeSupp">\' + $(\'#firstProposalType\').html() + \'</tr>\';
            		$(\'#firstProposalType\').after(proposalTypeHtml);
            		$(\'#firstProposalType\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.proposalTypeSupp\').find(\'.removeProposalType\').show();
            		$(\'#firstProposalType\').find(\'.removeProposalType\').hide();
            		return false;
        		}
        	);

        	$(\'.removeProposalType\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
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
        	if($(\'input[name^="internationalGrant"]:checked\').val() == "No" || $(\'input[name^="industryGrant"]:checked\').val() == null) {
            	$(\'#internationalGrantNameField\').hide();
            	$(\'#firstInternationalGrantName\').hide();
            	$(\'#otherInternationalGrantNameField\').hide();
            	$(\'#addAnotherInternationalGrantName\').hide();
            	$(\'#internationalGrantName\').append(\'<option value="NA"></option>\');
            	$(\'#internationalGrantName\').val("NA");
            	$(\'#otherInternationalGrantName\').val("NA");
        	}
            
        	$(\'input[name^="internationalGrant"]\').change(
        		function(){
              		var answer = $(\'input[name^="internationalGrant"]:checked\').val();
              		if(answer == "Yes") {
            			$(\'#internationalGrantNameField\').show();
            			$(\'#firstInternationalGrantName\').show();
            			$(\'#addAnotherInternationalGrantName\').show();
        				$(\'#internationalGrantName option[value="NA"]\').remove();
              		} else {
            			$(\'.internationalGrantNameSupp\').remove();
            			$(\'#firstInternationalGrantName\').hide();
            			$(\'#otherInternationalGrantNameField\').hide();
            			$(\'#otherInternationalGrantName\').val("NA");
            			$(\'#addAnotherInternationalGrantName\').hide();
            			$(\'#internationalGrantName\').append(\'<option value="NA"></option>\');
            			$(\'#internationalGrantName\').val("NA");	
              		}
        		}
        	);
        	        	
        	//Start code for multiple international grants
        	$(\'#addAnotherInternationalGrantName\').click(
        		function(){
            		var internationalGrantNameHtml = \'<tr valign="top" class="internationalGrantNameSupp">\' + $(\'#firstInternationalGrantName\').html() + \'</tr>\';
            		$(\'#firstInternationalGrantName\').after(internationalGrantNameHtml);
            		$(\'#firstInternationalGrantName\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.internationalGrantNameSupp\').find(\'.removeInternationalGrantName\').show();
            		$(\'#firstInternationalGrantName\').find(\'.removeInternationalGrantName\').hide();
            		return false;
        		}
        	);

        	$(\'.removeInternationalGrantName\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
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
        	if($(\'input[name^="multiCountryResearch"]:checked\').val() == "No" || $(\'input[name^="multiCountryResearch"]:checked\').val() == null) {
            	$(\'#multiCountryField\').hide();
            	$(\'#firstMultiCountry\').hide();
            	$(\'#addAnotherCountry\').hide();
            	$(\'#multiCountry\').val("MCNA");
        	} else {
            	$(\'#multiCountry option[value="MCNA"]\').remove();
        	}
            
        	$(\'input[name^="multiCountryResearch"]\').change(
        		function(){
              		var answer = $(\'input[name^="multiCountryResearch"]:checked\').val();
              		if(answer == "Yes") {
                  		$(\'#multiCountryField\').show();
                  		$(\'#firstMultiCountry\').show();
                  		$(\'#addAnotherCountry\').show();
                  		$(\'#multiCountry option[value="MCNA"]\').remove();
              		} else {
                  		$(\'#multiCountryField\').hide();
            			$(\'#firstMultiCountry\').hide();
            			$(\'.multiCountrySupp\').remove();
            			$(\'#addAnotherCountry\').hide();
                  		$(\'#multiCountry\').append(\'<option value="MCNA"></option>\');
                  		$(\'#multiCountry\').val("MCNA");
              		}
        		}
        	);
        	
        	//Start code for multi-country proposals
        	$(\'#addAnotherCountry\').click(
        		function(){
            		var multiCountryHtml = \'<tr valign="top" class="multiCountrySupp">\' + $(\'#firstMultiCountry\').html() + \'</tr>\';
            		$(\'#firstMultiCountry\').after(multiCountryHtml);
            		$(\'#firstMultiCountry\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.multiCountrySupp\').find(\'.removeMultiCountry\').show();
            		$(\'#firstMultiCountry\').find(\'.removeMultiCountry\').hide();
            		return false;
        		}
        	);

        	$(\'.removeMultiCountry\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
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
        	if($(\'input[name^="nationwide"]:checked\').val() == "Yes" || $(\'input[name^="nationwide"]:checked\').val() == null) {
            	$(\'#proposalCountryField\').hide();
            	$(\'#firstProposalCountry\').hide();
            	$(\'#addAnotherRegion\').hide();
            	$(\'#proposalCountry\').append(\'<option value="NW"></option>\');
            	$(\'#proposalCountry\').val("NW");
        	} else {
            	$(\'#proposalCountry option[value="NW"]\').remove();
            	$(\'#proposalCountryField\').show();
            	$(\'#firstProposalCountry\').show();
            	$(\'#addAnotherRegion\').show();
        	}
            
        	$(\'input[name^="nationwide"]\').change(
        		function(){
              		var answer = $(\'input[name^="nationwide"]:checked\').val();
              		if(answer == "No" || answer == "Yes, with randomly selected regions") {
                  		$(\'#proposalCountryField\').show();
                  		$(\'#firstProposalCountry\').show();
                  		$(\'#addAnotherRegion\').show();
                  		$(\'#proposalCountry option[value="NW"]\').remove();
              		} else {
                  		$(\'#proposalCountryField\').hide();
            			$(\'#firstProposalCountry\').hide();
            			$(\'.proposalCountrySupp\').remove();
            			$(\'#addAnotherRegion\').hide();
                  		$(\'#proposalCountry\').append(\'<option value="NW"></option>\');
                  		$(\'#proposalCountry\').val("NW");
              		}
        		}
        	);
        	
        	//Start code for multi-regions proposals
        	$(\'#addAnotherRegion\').click(
        		function(){
            		var proposalCountryHtml = \'<tr valign="top" class="proposalCountrySupp">\' + $(\'#firstProposalCountry\').html() + \'</tr>\';
            		$(\'#firstProposalCountry\').after(proposalCountryHtml);
            		$(\'#firstProposalCountry\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.proposalCountrySupp\').find(\'.removeProposalRegion\').show();
            		$(\'#firstProposalCountry\').find(\'.removeProposalRegion\').hide();
            		return false;
        		}
        	);

        	$(\'.removeProposalRegion\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
            		return false;
        		}
        	);
        	
        	//End code for multi-regions proposals
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Student Research              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of sudent research
        	if($(\'input[name^="studentInitiatedResearch"]:checked\').val() == "No" || $(\'input[name^="withHumanSubjects"]:checked\').val() == null) {
            	$(\'#studentInstitutionField\').hide();
            	$(\'#academicDegreeField\').hide();
            	$(\'#studentInstitution\').val("NA");
            	$(\'#academicDegree\').append(\'<option value="NA"></option>\');
            	$(\'#academicDegree\').val("NA");
        	} else {
				$(\'#studentInstitutionField\').show();
				$(\'#academicDegreeField\').show();
				$(\'#academicDegree option[value="NA"]\').remove();
			}

        	$(\'input[name^="studentInitiatedResearch"]\').change(
        		function(){
            		var answer = $(\'input[name^="studentInitiatedResearch"]:checked\').val();
            		if(answer == "Yes") {
                		$(\'#studentInstitutionField\').show();
                		$(\'#academicDegreeField\').show();
                		$(\'#studentInstitution\').val("");
                		$(\'#academicDegree option[value="NA"]\').remove();
            		} else {
                		$(\'#studentInstitutionField\').hide();
                		$(\'#academicDegreeField\').hide();
                		$(\'#studentInstitution\').val("NA");
                		$(\'#academicDegree\').append(\'<option value="NA"></option>\');
                		$(\'#academicDegree\').val("NA");
            		}
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 ERC Decision                ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of ERC decisions
        	if($(\'input[name^="reviewedByOtherErc"]:checked\').val() == "No" || $(\'input[name^="reviewedByOtherErc"]:checked\').val() == null) {
            	$(\'#otherErcDecisionField\').hide();
            	$(\'#otherErcDecision\').val("NA");
        	} else {
            	$(\'#otherErcDecision option[value="NA"]\').remove();
        	}
            
        	$(\'input[name^="reviewedByOtherErc"]\').change(
        		function(){
              		var answer = $(\'input[name^="reviewedByOtherErc"]:checked\').val();
              		if(answer == "Yes") {
                  		$(\'#otherErcDecisionField\').show();
                  		$(\'#otherErcDecision option[value="NA"]\').remove();
              		} else {
                  		$(\'#otherErcDecisionField\').hide();
                  		$(\'#otherErcDecision\').append(\'<option value="NA"></option>\');
                  		$(\'#otherErcDecision\').val("NA");
              		}
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                Industry Grant               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

        	// Add filter of industry grant
        	if($(\'input[name^="industryGrant"]:checked\').val() == "No" || $(\'input[name^="industryGrant"]:checked\').val() == null) {
            	$(\'#nameOfIndustryField\').hide();
            	$(\'#nameOfIndustry\').val("NA");
        	} else {
        		$(\'#nameOfIndustryField\').show();
        	}
            
        	$(\'input[name^="industryGrant"]\').change(
        		function(){
              		var answer = $(\'input[name^="industryGrant"]:checked\').val();
              		if(answer == "Yes") {
                  		$(\'#nameOfIndustryField\').show();
                  		$(\'#nameOfIndustry\').val("");
              		} else {
                  		$(\'#nameOfIndustryField\').hide();
                  		$(\'#nameOfIndustry\').val("NA");
              		}
        		}
        	);
        	
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                 Other Grant                 ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

        	// Add filter of other grant
        	if($(\'input[name^="otherGrant"]:checked\').val() == "No" || $(\'input[name^="otherGrant"]:checked\').val() == null) {
            	$(\'#specifyOtherGrantField\').hide();
            	$(\'#specifyOtherGrant\').val("NA");
        	} else {
        		$(\'#specifyOtherGrantField\').show();
        	}
            
        	$(\'input[name^="otherGrant"]\').change(
        		function(){
              		var answer = $(\'input[name^="otherGrant"]:checked\').val();
              		if(answer == "Yes") {
                  		$(\'#specifyOtherGrantField\').show();
                  		$(\'#specifyOtherGrant\').val("");
              		} else {
                  		$(\'#specifyOtherGrantField\').hide();
                  		$(\'#specifyOtherGrant\').val("NA");
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
        			changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', minDate: \'-1 y\', onSelect: function(dateText, inst){
                        dayAfter = new Date();
                        dayAfter = $("#startDate").datepicker("getDate");
                        dayAfter.setDate(dayAfter.getDate() + 1);
                        $("#endDate").datepicker("option","minDate", dayAfter)
                	}
        		}
        	);
            
        	$( "#endDate" ).datepicker(
        		{
        			changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', minDate: \'-1 y\'
        		}
        	);

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Seconday Sponsor              ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

          	//Start code for multiple secondary sponsor
        	$(\'#addAnotherSecondarySponsor\').click(
        		function(){
            		var secondarySponsorHtml = \'<tr valign="top" class="secondarySponsorSupp">\' + $(\'#firstSecondarySponsor\').html() + \'</tr>\';
            		$(\'#firstSecondarySponsor\').after(secondarySponsorHtml);
            		$(\'#firstSecondarySponsor\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.secondarySponsorSupp\').find(\'.removeSecondarySponsor\').show();
                	$(\'.secondarySponsorSupp\').find(\'.secondarySponsorTitle\').hide();
        			$(\'.secondarySponsorSupp\').find(\'.noSecondarySponsorTitle\').show();
            		$(\'#firstSecondarySponsor\').find(\'.removeSecondarySponsor\').hide();
            		$(\'#firstSecondarySponsor\').find(\'.secondarySponsorTitle\').show();
        			$(\'#firstSecondarySponsor\').find(\'.noSecondarySponsorTitle\').hide();
            		return false;
        		}
        	);

        	$(\'.removeSecondarySponsor\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
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
        	$(\'#addAnotherField\').click(
        		function(){
            		var proposalFieldHtml = \'<tr valign="top" class="researchFieldSupp">\' + $(\'#firstResearchField\').html() + \'</tr>\';
            		$(\'#firstResearchField\').after(proposalFieldHtml);
            		$(\'#firstResearchField\').next().find(\'select\').attr(\'selectedIndex\', 0);
            		$(\'.researchFieldSupp\').find(\'.removeResearchField\').show();
            		$(\'.researchFieldSupp\').find(\'.researchFieldTitle\').hide();
            		$(\'.researchFieldSupp\').find(\'.noResearchFieldTitle\').show();
            		$(\'#firstResearchField\').find(\'.removeResearchField\').hide();
            		$(\'#firstResearchField\').find(\'.researchFieldTitle\').show();
            		$(\'#firstResearchField\').find(\'.noResearchFieldTitle\').hide();
            		return false;
        		}
        	);

        	$(\'.removeResearchField\').live(
        		\'click\', function(){
            		$(this).closest(\'tr\').remove();
            		showOrHideOtherResearchField();
            		return false;
        		}
        	);
        	//End code for multiple research fields

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Level of Risk                 ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        	// Add filter for level of risks
        	// EL on March 9th 2013
        	if (($(\'#riskLevel\').val() != \'1\') && ($(\'#riskLevel\').val() != \'\')){
            	$(\'#listRisksField\').show();
            	$(\'#howRisksMinimizedField\').show();
        	} else {
            	$(\'#listRisksField\').hide();
            	$(\'#howRisksMinimizedField\').hide();
            	$(\'#listRisks\').val("NA");
				$(\'#howRisksMinimized\').val("NA");
			}

        	$(\'#riskLevel\').change(
        		function(){
            		var answer = $(\'#riskLevel\').val();
            		if(answer != "1" && answer != "") {
            			$(\'#listRisksField\').show();
            			$(\'#howRisksMinimizedField\').show();
            			$(\'#listRisks\').val("");
						$(\'#howRisksMinimized\').val("");
            		} else {
            			$(\'#listRisksField\').hide();
            			$(\'#howRisksMinimizedField\').hide();
            			$(\'#listRisks\').val("NA");
						$(\'#howRisksMinimized\').val("NA");
            		}
        		}
        	);
        	
        	// End of filter for level of risks
    	}
    );

</script>
'; ?>


<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
    <div id="locales">
        <table width="100%" class="data">
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
                <td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submit','path' => '3','articleId' => $this->_tpl_vars['articleId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'submitFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'submitFormUrl'));?>

						<?php $_from = $this->_tpl_vars['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['authorIndex'] => $this->_tpl_vars['author']):
?>
				<?php if ($this->_tpl_vars['currentJournal']->getSetting('requireAuthorCompetingInterests')): ?>
					<?php $_from = $this->_tpl_vars['author']['competingInterests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisLocale'] => $this->_tpl_vars['thisCompetingInterests']):
?>
						<?php if ($this->_tpl_vars['thisLocale'] != $this->_tpl_vars['formLocale']): ?><input type="hidden" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][competingInterests][<?php echo ((is_array($_tmp=$this->_tpl_vars['thisLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisCompetingInterests'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
				<?php $_from = $this->_tpl_vars['author']['biography']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisLocale'] => $this->_tpl_vars['thisBiography']):
?>
					<?php if ($this->_tpl_vars['thisLocale'] != $this->_tpl_vars['formLocale']): ?><input type="hidden" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][biography][<?php echo ((is_array($_tmp=$this->_tpl_vars['thisLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisBiography'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php $_from = $this->_tpl_vars['author']['affiliation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['thisLocale'] => $this->_tpl_vars['thisAffiliation']):
?>
					<?php if ($this->_tpl_vars['thisLocale'] != $this->_tpl_vars['formLocale']): ?><input type="hidden" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][affiliation][<?php echo ((is_array($_tmp=$this->_tpl_vars['thisLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['thisAffiliation'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endforeach; endif; unset($_from); ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'submit','url' => $this->_tpl_vars['submitFormUrl']), $this);?>

                    <span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
                </td>
            </tr>
        </table>
    </div>
<?php endif; ?>


<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////                   Authors                   ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
-->
    <div id="authors">
        <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
</h3>

        <input type="hidden" name="deletedAuthors" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['deletedAuthors'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
        <input type="hidden" name="moveAuthor" value="0" />
        <input type="hidden" name="moveAuthorDir" value="" />
        <input type="hidden" name="moveAuthorIndex" value="" />

<?php $_from = $this->_tpl_vars['authors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['authors']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['authorIndex'] => $this->_tpl_vars['author']):
        $this->_foreach['authors']['iteration']++;
?>
        <input type="hidden" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][authorId]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['authorId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
        <input type="hidden" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][seq]" value="<?php echo $this->_tpl_vars['authorIndex']+1; ?>
" />

<?php if ($this->_foreach['authors']['total'] <= 1): ?>
        <input type="hidden" name="primaryContact" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php endif; ?>
<?php if ($this->_tpl_vars['authorIndex'] == 1): ?><h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.coinvestigator"), $this);?>
</h3><?php endif; ?>
        <table width="100%" class="data">
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-firstName",'required' => 'true','key' => "user.firstName"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][firstName]" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['firstName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-middleName",'key' => "user.middleName"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][middleName]" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-middleName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['middleName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-lastName",'required' => 'true','key' => "user.lastName"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][lastName]" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['lastName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="90" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-email",'required' => 'true','key' => "user.email"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][email]" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="90" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-phone",'required' => 'true','key' => "user.tel"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][phone]" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['author']['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" /></td>
            </tr>             
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-affiliation",'required' => 'true','key' => "user.affiliation"), $this);?>
</td>
                <td width="80%" class="value"><textarea name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][affiliation]" class="textArea" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-affiliation" rows="5" cols="40"><?php echo ((is_array($_tmp=$this->_tpl_vars['author']['affiliation'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea><br/>
                    <span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation.description"), $this);?>
</span>
                </td>
            </tr>
            
<?php if ($this->_tpl_vars['currentJournal']->getSetting('requireAuthorCompetingInterests')): ?>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => "authors-".($this->_tpl_vars['authorIndex'])."-competingInterests",'key' => "author.competingInterests",'competingInterestGuidelinesUrl' => $this->_tpl_vars['competingInterestGuidelinesUrl']), $this);?>
</td>
                <td width="80%" class="value"><textarea name="authors[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][competingInterests][<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" class="textArea" id="authors-<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
-competingInterests" rows="5" cols="40"><?php echo ((is_array($_tmp=$this->_tpl_vars['author']['competingInterests'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
            </tr>
<?php endif; ?>
<?php echo $this->_plugins['function']['call_hook'][0][0]->smartyCallHook(array('name' => "Templates::Author::Submit::Authors"), $this);?>


<?php if ($this->_foreach['authors']['total'] > 1): ?>
            <tr valign="top">
                <td width="80%" class="value" colspan="2">
                    <div style="display:none">
                        <input type="radio" name="primaryContact" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"<?php if ($this->_tpl_vars['primaryContact'] == $this->_tpl_vars['authorIndex']): ?> checked="checked"<?php endif; ?> /> <label for="primaryContact"></label>
                    </div>
            <?php if ($this->_tpl_vars['authorIndex'] > 0): ?>
                    <input type="submit" name="delAuthor[<?php echo ((is_array($_tmp=$this->_tpl_vars['authorIndex'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="Delete Co-Investigator" class="button" />
            <?php else: ?>
                    &nbsp;
            <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br/></td>
            </tr>
<?php endif; ?>


        </table>
<?php endforeach; endif; unset($_from); ?>
        <br /><br />
        <?php if ($this->_tpl_vars['authorIndex'] < 3): ?><p><input type="submit" class="button" name="addAuthor" value="Add a Co-Investigator" /></p><?php endif; ?>
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
        <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.titleAndAbstract"), $this);?>
</h3>

        <table width="100%" class="data">
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr valign="top" id="scientificTitleField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.scientificTitleInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'scientificTitle','required' => 'true','key' => "proposal.scientificTitle"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="scientificTitle" id="scientificTitle" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['scientificTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="50" maxlength="255" /></td>
            </tr>
            <tr valign="top" id="publicTitleField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.publicTitleInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'publicTitle','required' => 'true','key' => "proposal.publicTitle"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="publicTitle" id="publicTitle" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['publicTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="50" maxlength="255" /></td>
            </tr>
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr valign="top" id="backgroundField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.backgroundInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'background','required' => 'true','key' => "proposal.background"), $this);?>
</td>
                <td width="80%" class="value"><textarea name="background" id="background" class="textArea" rows="5" cols="70"><?php echo ((is_array($_tmp=$this->_tpl_vars['background'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
            </tr>
            <tr valign="top" id="objectivesField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.objectivesInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'objectives','required' => 'true','key' => "proposal.objectives"), $this);?>
</td>
                <td width="80%" class="value"><textarea name="objectives" id="objectives" class="textArea" rows="5" cols="70"><?php echo ((is_array($_tmp=$this->_tpl_vars['objectives'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
            </tr>
            <tr valign="top" id="studyMethodsField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studyMethodsInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'studyMethods','required' => 'true','key' => "proposal.studyMethods"), $this);?>
</td>
                <td width="80%" class="value"><textarea name="studyMethods" id="studyMethods" class="textArea" rows="5" cols="70"><?php echo ((is_array($_tmp=$this->_tpl_vars['studyMethods'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
            </tr>  
            <tr valign="top" id="expectedOutcomesField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.expectedOutcomesInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'expectedOutcomes','required' => 'true','key' => "proposal.expectedOutcomes"), $this);?>
</td>
                <td width="80%" class="value"><textarea name="expectedOutcomes" id="expectedOutcomes" class="textArea" rows="5" cols="70"><?php echo ((is_array($_tmp=$this->_tpl_vars['expectedOutcomes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
            </tr>   
            <tr><td colspan="2">&nbsp;</td></tr>
            <tr valign="top" id="keywordsField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.keywordsInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'keywords','required' => 'true','key' => "proposal.keywords"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="keywords" id="keywords" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['keywords'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="50" maxlength="255" /></td>
            </tr>
        </table>
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
        <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalDetails"), $this);?>
</h3>

        <table width="100%" class="data">
            <tr valign="top" id="studentInitiatedResearchField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInitiatedResearchInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'studentInitiatedResearch','required' => 'true','key' => "proposal.studentInitiatedResearch"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="studentInitiatedResearch[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="studentInitiatedResearch" value="Yes" <?php if ($this->_tpl_vars['studentInitiatedResearch'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="studentInitiatedResearch[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="studentInitiatedResearch" value="No" <?php if ($this->_tpl_vars['studentInitiatedResearch'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

                </td>
            </tr>
            <tr valign="top" id="studentInstitutionField">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitutionInstruct"), $this);?>
" style="font-style: italic;">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'studentInstitution','required' => 'false','key' => "proposal.studentInstitution"), $this);?>
</span>&nbsp;&nbsp;
            		<input type="text" class="textField" name="studentInstitution[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="studentInstitution" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['studentInstitution'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="40" maxlength="255" />
            	</td>
            </tr>
            <tr valign="top" id="academicDegreeField">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegreeInstruct"), $this);?>
" style="font-style: italic;">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'academicDegree','required' => 'false','key' => "proposal.academicDegree"), $this);?>
</span>&nbsp;&nbsp;
					<select name="academicDegree[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="academicDegree" class="selectMenu">
						<option value=""></option>
						<option value="Undergraduate" <?php if ($this->_tpl_vars['academicDegree'][$this->_tpl_vars['formLocale']] == 'Undergraduate'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.undergraduate"), $this);?>
</option>
						<option value="Master" <?php if ($this->_tpl_vars['academicDegree'][$this->_tpl_vars['formLocale']] == 'Master'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.master"), $this);?>
</option>
						<option value="Post-Doc" <?php if ($this->_tpl_vars['academicDegree'][$this->_tpl_vars['formLocale']] == "Post-Doc"): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.postDoc"), $this);?>
</option>
						<option value="Ph.D" <?php if ($this->_tpl_vars['academicDegree'][$this->_tpl_vars['formLocale']] == "Ph.D"): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.phd"), $this);?>
</option>
						<option value="Other" <?php if ($this->_tpl_vars['academicDegree'][$this->_tpl_vars['formLocale']] == 'Other'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.other"), $this);?>
</option>
					</select>
                </td>
            </tr>
            <tr valign="top" id="startDateField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDateInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'startDate','required' => 'true','key' => "proposal.startDate"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="startDate[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="startDate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['startDate'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="255" /></td>
            </tr>
            <tr valign="top" id="endDateField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDateInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'endDate','required' => 'true','key' => "proposal.endDate"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="endDate[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="endDate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['endDate'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="255" /></td>
            </tr>
            
<?php $this->assign('isOtherPrimarySponsorSelected', false); ?>
<?php $_from = $this->_tpl_vars['primarySponsor'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['sponsor']):
?>           
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstPrimarySponsor" class="primarySponsor"<?php else: ?>id="primarySponsorField"  class="primarySponsorSupp"<?php endif; ?>>
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsorInstruct"), $this);?>
" width="20%" class="label">
				<?php if ($this->_tpl_vars['i'] == 0): ?>[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'primarySponsor','required' => 'true','key' => "proposal.primarySponsor"), $this);?>
<?php endif; ?></td>
                <td width="80%" class="value">
                    <select name="primarySponsor[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="primarySponsor" class="selectMenu" onchange="showOrHideOtherPrimarySponsorField(this.value);">
                        <option value=""></option>
                        <?php $_from = $this->_tpl_vars['agencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['sponsor']):
?>
                            <?php if ($this->_tpl_vars['sponsor']['code'] != 'NA'): ?>
                                <?php $this->assign('isSelected', false); ?>
                                <?php $_from = $this->_tpl_vars['primarySponsor'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['selectedTypes']):
?>
                                    <?php if ($this->_tpl_vars['primarySponsor'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == $this->_tpl_vars['sponsor']['code']): ?>
                                        <?php $this->assign('isSelected', true); ?>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['primarySponsor'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == 'OTHER'): ?><?php $this->assign('isOtherPrimarySponsorSelected', true); ?><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <option value="<?php echo $this->_tpl_vars['sponsor']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['sponsor']['name']; ?>
</option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?>

            <tr valign="top" id="otherPrimarySponsorField" <?php if ($this->_tpl_vars['isOtherPrimarySponsorSelected'] == false): ?>style="display: none;"<?php endif; ?>>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                <span title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherPrimarySponsorInstruct"), $this);?>
" style="font-style: italic;">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherPrimarySponsor','required' => 'true','key' => "proposal.otherPrimarySponsor"), $this);?>
</span>&nbsp;&nbsp;
                <input type="text" class="textField" name="otherPrimarySponsor[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherPrimarySponsor" value="<?php if ($this->_tpl_vars['isOtherPrimarySponsorSelected'] == false): ?>NA<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['otherPrimarySponsor'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>" size="20" maxlength="255" />
                </td>
            </tr>
            
<?php $this->assign('isOtherSecondarySponsorSelected', false); ?>
<?php $_from = $this->_tpl_vars['secondarySponsors'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['sponsor']):
?>
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstSecondarySponsor" class="secondarySponsor"<?php else: ?>id="secondarySponsorField" class="secondarySponsorSupp"<?php endif; ?>>
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsorsInstruct"), $this);?>
"><?php if ($this->_tpl_vars['i'] == 0): ?>[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'secondarySponsors','key' => "proposal.secondarySponsors"), $this);?>
<?php endif; ?></td>
				<td class="noSecondarySponsorTitle" style="display: none;">&nbsp;</td>
                <td width="80%" class="value">
                    <select name="secondarySponsors[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="secondarySponsors" class="selectMenu" onchange="showOrHideOtherSecondarySponsor(this.value);">
                        <option value=""></option>
                        <?php $_from = $this->_tpl_vars['agencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['sponsor']):
?>
                            <?php if ($this->_tpl_vars['sponsor']['code'] != 'NA'): ?>
                                <?php $this->assign('isSelected', false); ?>
                                <?php $_from = $this->_tpl_vars['secondarySponsors'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['selectedTypes']):
?>
                                    <?php if ($this->_tpl_vars['secondarySponsors'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == $this->_tpl_vars['sponsor']['code']): ?>
                                        <?php $this->assign('isSelected', true); ?>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['secondarySponsors'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == 'OTHER'): ?><?php $this->assign('isOtherSecondarySponsorSelected', true); ?><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <option value="<?php echo $this->_tpl_vars['sponsor']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['sponsor']['name']; ?>
</option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <a href="" class="removeSecondarySponsor" <?php if ($this->_tpl_vars['i'] == 0): ?> style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?> 
            <tr id="addAnotherSecondarySponsor">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherSecondarySponsor"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.addAnotherSecondarySponsor"), $this);?>
</a></td>
            </tr>
            
            <tr valign="top" id="otherSecondarySponsorField" <?php if ($this->_tpl_vars['isOtherSecondarySponsorSelected'] == false): ?>style="display: none;"<?php endif; ?>>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                <span title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherSecondarySponsorInstruct"), $this);?>
" style="font-style: italic;">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherSecondarySponsor','required' => 'true','key' => "proposal.otherSecondarySponsor"), $this);?>
</span>&nbsp;&nbsp;
                <input type="text" class="textField" name="otherSecondarySponsor[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherSecondarySponsor" value="<?php if ($this->_tpl_vars['isOtherSecondarySponsorSelected'] == false): ?>NA<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['otherSecondarySponsor'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>" size="20" maxlength="255" />
                </td>
            </tr>
            
            <tr valign="top" id="multiCountryResearchField">
                <td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearchInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'multiCountryResearch','required' => 'true','key' => "proposal.multiCountryResearch"), $this);?>
</td>
                <td width="80%" class="value">
                	<input type="radio" name="multiCountryResearch[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="multiCountryResearch" value="Yes" <?php if ($this->_tpl_vars['multiCountryResearch'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="multiCountryResearch[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="multiCountryResearch" value="No" <?php if ($this->_tpl_vars['multiCountryResearch'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

                </td>
            </tr>
            
<?php $_from = $this->_tpl_vars['multiCountry'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['country']):
?>
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstMultiCountry" class="multiCountry"<?php else: ?>id="mutliCountryField" class="multiCountrySupp"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'multiCountry','required' => 'true','key' => "proposal.multiCountry"), $this);?>
</span>&nbsp;&nbsp;
                    <select name="multiCountry[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="multiCountry" class="selectMenu">
                        <option value="MCNA"></option><option value=""></option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['multiCountry'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']]), $this);?>

                    </select>
                    <a href="" class="removeMultiCountry" <?php if ($this->_tpl_vars['i'] == 0): ?>style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?>

            <tr id="addAnotherCountry">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherCountry"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.addAnotherCountry"), $this);?>
</a></td>
            </tr> 
            
            <tr valign="top" id="nationwideField">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'nationwide','required' => 'true','key' => "proposal.nationwide"), $this);?>
</td>
                <td width="80%" class="value">
                	<input type="radio" name="nationwide[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="nationwide" value="Yes" <?php if ($this->_tpl_vars['nationwide'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="nationwide[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="nationwide" value="Yes, with randomly selected provinces" <?php if ($this->_tpl_vars['nationwide'][$this->_tpl_vars['formLocale']] == "Yes, with randomly selected provinces"): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.randomlySelectedProvince"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="nationwide[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="nationwide" value="No" <?php if ($this->_tpl_vars['nationwide'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

                </td>
            </tr>
            
<?php $_from = $this->_tpl_vars['proposalCountry'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['country']):
?>
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstProposalCountry" class="proposalCountry"<?php else: ?>id="proposalCountryField" class="proposalCountrySupp"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'proposalCountry','required' => 'true','key' => "proposal.proposalCountry"), $this);?>
</span>&nbsp;&nbsp;
                    <select name="proposalCountry[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="proposalCountry" class="selectMenu">
                        <option value=""></option>
		<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['proposalCountries'],'selected' => $this->_tpl_vars['proposalCountry'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']]), $this);?>

                    </select>
                    <a href="" class="removeProposalProvince" <?php if ($this->_tpl_vars['i'] == 0): ?>style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?>

            <tr id="addAnotherProvince">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherProvince"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.addAnotherArea"), $this);?>
</a></td>
            </tr>        

<?php $this->assign('isOtherResearchFieldSelected', false); ?>
<?php $_from = $this->_tpl_vars['researchField'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['field']):
?>
            <tr valign="top"  <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstResearchField" class="researchField"<?php else: ?>id="researchFieldField" class="researchFieldSupp"<?php endif; ?>>
                <td width="20%" class="researchFieldTitle"><?php if ($this->_tpl_vars['i'] == 0): ?><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'researchField','required' => 'true','key' => "proposal.researchField"), $this);?>
<?php else: ?> &nbsp; <?php endif; ?></td>
				<td class="noResearchFieldTitle" style="display: none;">&nbsp;</td>
                <td width="80%" class="value">
                    <select name="researchField[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" class="selectMenu" onchange="showOrHideOtherResearchField(this.value);">
                    	<option value=""></option>
                            <?php $_from = $this->_tpl_vars['researchFields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['if'] => $this->_tpl_vars['rfield']):
?>
                            <?php if ($this->_tpl_vars['rfield']['code'] != 'NA'): ?>
                                <?php $this->assign('isSelected', false); ?>
                                <?php $_from = $this->_tpl_vars['researchField'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['if'] => $this->_tpl_vars['selectedFields']):
?>
                                    <?php if ($this->_tpl_vars['researchField'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == $this->_tpl_vars['rfield']['code']): ?>
                                        <?php $this->assign('isSelected', true); ?>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['researchField'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == 'OTHER'): ?><?php $this->assign('isOtherResearchFieldSelected', true); ?><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <option value="<?php echo $this->_tpl_vars['rfield']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['rfield']['name']; ?>
</option>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <a href="" class="removeResearchField" <?php if ($this->_tpl_vars['i'] == 0): ?>style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
                </td>
            </tr>           
<?php endforeach; endif; unset($_from); ?>
            <tr id="addAnotherField">
                <td width="20%">&nbsp;</td>
                <td><a href="#" id="addAnotherField"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.addAnotherFieldOfResearch"), $this);?>
</a></td>
            </tr>
            <tr valign="top" id="otherResearchFieldField" <?php if ($this->_tpl_vars['isOtherResearchFieldSelected'] == false): ?>style="display: none;"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherResearchField','key' => "proposal.otherResearchField"), $this);?>
</span>&nbsp;&nbsp;
            		<input type="text" class="textField" name="otherResearchField[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherResearchField" value="<?php if ($this->_tpl_vars['isOtherResearchFieldSelected'] == false): ?>NA<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['otherResearchField'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>" size="30" maxlength="255" />
            	</td>
            </tr>
            <tr valign="top" id="HumanSubjectField">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'withHumanSubjects','required' => 'true','key' => "proposal.withHumanSubjects"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="withHumanSubjects[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="withHumanSubjects" value="Yes" <?php if ($this->_tpl_vars['withHumanSubjects'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="withHumanSubjects[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="withHumanSubjects" value="No" <?php if ($this->_tpl_vars['withHumanSubjects'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

                </td>
            </tr>

<?php $this->assign('isOtherProposalTypeSelected', false); ?>
<?php $_from = $this->_tpl_vars['proposalType'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['type']):
?>
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstProposalType" class="proposalType"<?php else: ?>id="proposalTypeField" class="proposalTypeSupp"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'proposalType','required' => 'false','key' => "proposal.proposalType"), $this);?>
</span>&nbsp;&nbsp;
                    <select name="proposalType[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="proposalType" class="selectMenu" onchange="showOrHideOtherProposalType(this.value);">
                        <option value=""></option>
                            <?php $_from = $this->_tpl_vars['proposalTypes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ptype']):
?>
                            <?php if ($this->_tpl_vars['ptype']['code'] != 'PNHS'): ?>
                                <?php $this->assign('isSelected', false); ?>
                                <?php $_from = $this->_tpl_vars['proposalType'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['selectedTypes']):
?>
                                    <?php if ($this->_tpl_vars['proposalType'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == $this->_tpl_vars['ptype']['code']): ?>
                                        <?php $this->assign('isSelected', true); ?>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['proposalType'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == 'OTHER'): ?><?php $this->assign('isOtherProposalTypeSelected', true); ?><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <option value="<?php echo $this->_tpl_vars['ptype']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['ptype']['name']; ?>
</option>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <a href="" class="removeProposalType" <?php if ($this->_tpl_vars['i'] == 0): ?>style="display:none"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.remove"), $this);?>
</a>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?>          
            <tr id="addAnotherType">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherType"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.addAnotherProposalType"), $this);?>
</a></td>
            </tr>
            
            <tr valign="top" id="otherProposalTypeField" <?php if ($this->_tpl_vars['isOtherProposalTypeSelected'] == false): ?>style="display: none;"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherProposalType','key' => "proposal.otherProposalType",'required' => 'true'), $this);?>
</span>&nbsp;&nbsp;
            		<input type="text" class="textField" name="otherProposalType[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherProposalType" value="<?php if ($this->_tpl_vars['isOtherProposalTypeSelected'] == false): ?>NA<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['otherProposalType'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>" size="30" maxlength="255" />
            	</td>
            </tr>

            <tr valign="top" id="dataCollectionField">
            	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'dataCollection','required' => 'true','key' => "proposal.dataCollection"), $this);?>
</td>
            	<td width="80%" class="value">
            		<select name="dataCollection[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" class="selectMenu">
            			<option value=""></option>
            			<option value="Primary" <?php if ($this->_tpl_vars['dataCollection'][$this->_tpl_vars['formLocale']] == 'Primary'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primaryDataCollection"), $this);?>
</option>
            			<option value="Secondary" <?php if ($this->_tpl_vars['dataCollection'][$this->_tpl_vars['formLocale']] == 'Secondary'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondaryDataCollection"), $this);?>
</option>
            			<option value="Both" <?php if ($this->_tpl_vars['dataCollection'][$this->_tpl_vars['formLocale']] == 'Both'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.bothDataCollection"), $this);?>
</option>
					</select>
            	</td>
            </tr>

            <tr valign="top" id="otherErcField">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'reviewedByOtherErc','required' => 'true','key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="reviewedByOtherErc[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="reviewedByOtherErc" value="Yes" <?php if ($this->_tpl_vars['reviewedByOtherErc'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="reviewedByOtherErc[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="reviewedByOtherErc" value="No" <?php if ($this->_tpl_vars['reviewedByOtherErc'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

                </td>
            </tr>

            <tr valign="top" id="otherErcDecisionField">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherErcDecision','required' => 'false','key' => "proposal.otherErcDecision"), $this);?>
</span>&nbsp;&nbsp;
                    <select name="otherErcDecision[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherErcDecision" class="selectMenu">
                        <option value="NA"></option>
                        <option value="Under Review" <?php if ($this->_tpl_vars['otherErcDecision'][$this->_tpl_vars['formLocale']] == 'Under Review'): ?> selected="selected"<?php endif; ?> ><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionUnderReview"), $this);?>
</option>
                        <option value="Final Decision Available" <?php if ($this->_tpl_vars['otherErcDecision'][$this->_tpl_vars['formLocale']] == 'Final Decision Available'): ?> selected="selected"<?php endif; ?> ><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherErcDecisionFinalAvailable"), $this);?>
</option>
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
        <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.sourceOfMonetary"), $this);?>
</h3>
        <table width="100%" class="data">

            <tr><td><br/></td></tr>
            <tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'fundsRequired','required' => 'true','key' => "proposal.fundsRequired"), $this);?>
</td>
                <td width="80%" class="value"><input type="text" class="textField" name="fundsRequired[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="fundsRequired" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fundsRequired'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="255" /></td>
            </tr>
            <tr valign="top">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value"><span><i>Please enter a whole number without any comma or other separator.</i></span></td>
            </tr>
			<tr valign="top">
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                	<input type="radio" name="selectedCurrency[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="USD" <?php if ($this->_tpl_vars['selectedCurrency'][$this->_tpl_vars['formLocale']] == 'USD'): ?> checked="checked"<?php endif; ?>  />US Dollar(s)
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="selectedCurrency[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="MNT" <?php if ($this->_tpl_vars['selectedCurrency'][$this->_tpl_vars['formLocale']] == 'MNT'): ?> checked="checked"<?php endif; ?> />Tugrik(s)
                </td>
            </tr>
            <tr><td><br/></td></tr>

        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'industryGrant','required' => 'true','key' => "proposal.industryGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="industryGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="industryGrant" value="Yes" <?php if ($this->_tpl_vars['industryGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="industryGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="industryGrant" value="No" <?php if ($this->_tpl_vars['industryGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>
            <tr valign="top" id="nameOfIndustryField"  style="display: none;">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                    <span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'nameOfIndustry','required' => 'true','key' => "proposal.nameOfIndustry"), $this);?>
</span>&nbsp;&nbsp;
                    <input type="text" name="nameOfIndustry[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="nameOfIndustry" size="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['nameOfIndustry'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'internationalGrant','required' => 'true','key' => "proposal.internationalGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="internationalGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="internationalGrant" value="Yes" <?php if ($this->_tpl_vars['internationalGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="internationalGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="internationalGrant" value="No" <?php if ($this->_tpl_vars['internationalGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>
            
<?php $this->assign('isOtherInternationalGrantNameSelected', false); ?>
<?php $_from = $this->_tpl_vars['internationalGrantName'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i'] => $this->_tpl_vars['type']):
?>
            <tr valign="top" <?php if ($this->_tpl_vars['i'] == 0): ?>id="firstInternationalGrantName" class="internationalGrantName"<?php else: ?>id="internationalGrantNameField" class="internationalGrantNameSupp"<?php endif; ?>>
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                	<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'internationalGrantName','required' => 'true','key' => "proposal.internationalGrantName"), $this);?>
</span>&nbsp;&nbsp;
                    <select name="internationalGrantName[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
][]" id="internationalGrantName" class="selectMenu" onchange="showOrHideOtherInternationalGrantName(this.value);">
                        <option value=""></option>
                        <?php $_from = $this->_tpl_vars['agencies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['igName']):
?>
                            <?php if ($this->_tpl_vars['igName']['code'] != 'NA'): ?>
                                <?php $this->assign('isSelected', false); ?>
                                <?php $_from = $this->_tpl_vars['internationalGrantName'][$this->_tpl_vars['formLocale']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['selectedTypes']):
?>
                                    <?php if ($this->_tpl_vars['internationalGrantName'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == $this->_tpl_vars['igName']['code']): ?>
                                        <?php $this->assign('isSelected', true); ?>
                                    <?php endif; ?>
                                    <?php if ($this->_tpl_vars['internationalGrantName'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']] == 'OTHER'): ?><?php $this->assign('isOtherInternationalGrantNameSelected', true); ?><?php endif; ?>
                                <?php endforeach; endif; unset($_from); ?>
                                <option value="<?php echo $this->_tpl_vars['igName']['code']; ?>
" <?php if ($this->_tpl_vars['isSelected'] == true): ?>selected="selected"<?php endif; ?> ><?php echo $this->_tpl_vars['igName']['name']; ?>
</option>
                            <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?>
                    </select>
                    <a href="" class="removeInternationalGrantName" <?php if ($this->_tpl_vars['i'] == 0): ?> style="display:none"<?php endif; ?>>Remove</a>
                </td>
            </tr>
<?php endforeach; endif; unset($_from); ?> 
            <tr id="addAnotherInternationalGrantName">
                <td width="20%">&nbsp;</td>
                <td width="40%"><a href="#" id="addAnotherInternationalGrantName">Add another agency</a></td>
            </tr>
            
            <tr valign="top" id="otherInternationalGrantNameField" <?php if ($this->_tpl_vars['isOtherInternationalGrantNameSelected'] == false): ?>style="display: none;"<?php endif; ?>>
                <td width="20%" class="label"></td>
                <td width="80%" class="value">
                <span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherPrimarySponsor','required' => 'true','key' => "proposal.otherInternationalGrantName"), $this);?>
</span>&nbsp;&nbsp;
                <input type="text" class="textField" name="otherInternationalGrantName[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherInternationalGrantName" value="<?php if ($this->_tpl_vars['isOtherInternationalGrantNameSelected'] == false): ?>NA<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['otherInternationalGrantName'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>" size="20" maxlength="255" />
                </td>
            </tr>
            
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'mohGrant','required' => 'true','key' => "proposal.mohGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="mohGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="mohGrant" value="Yes" <?php if ($this->_tpl_vars['mohGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="mohGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="mohGrant" value="No" <?php if ($this->_tpl_vars['mohGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'governmentGrant','required' => 'true','key' => "proposal.governmentGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="governmentGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="governmentGrantY" value="Yes" <?php if ($this->_tpl_vars['governmentGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  onclick="showOrHideGovernmentGrant('Yes')"/>Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="governmentGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="governmentGrant" value="No" <?php if ($this->_tpl_vars['governmentGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> onclick="showOrHideGovernmentGrant('No')"/>No
                </td>
            </tr>
            <tr valign="top" id="governmentGrantNameField" style="display: none;">
                <td width="20%" class="label">&nbsp;</td>
                <td width="80%" class="value">
                    <span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'governmentGrantName','required' => 'true','key' => "proposal.governmentGrantName"), $this);?>
</span>&nbsp;&nbsp;
                    <input type="text" name="governmentGrantName[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="governmentGrantName" size="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['governmentGrantName'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'universityGrant','required' => 'true','key' => "proposal.universityGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="universityGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="universityGrant" value="Yes" <?php if ($this->_tpl_vars['universityGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="universityGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="universityGrant" value="No" <?php if ($this->_tpl_vars['universityGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'selfFunding','required' => 'true','key' => "proposal.selfFunding"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="selfFunding[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="selfFunding" value="Yes" <?php if ($this->_tpl_vars['selfFunding'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="selfFunding[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="selfFunding" value="No" <?php if ($this->_tpl_vars['selfFunding'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>
        	<tr valign="top">
                <td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'otherGrant','required' => 'true','key' => "proposal.otherGrant"), $this);?>
</td>
                <td width="80%" class="value">
                    <input type="radio" name="otherGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherGrant" value="Yes" <?php if ($this->_tpl_vars['otherGrant'][$this->_tpl_vars['formLocale']] == 'Yes'): ?> checked="checked"<?php endif; ?>  />Yes
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="otherGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="otherGrant" value="No" <?php if ($this->_tpl_vars['otherGrant'][$this->_tpl_vars['formLocale']] == 'No'): ?> checked="checked"<?php endif; ?> />No
                </td>
            </tr>

            <tr valign="top" id="specifyOtherGrantField"  style="display: none;">
            	<td width="20%" class="label">&nbsp;</td>
            	<td width="80%" class="value">
					<span style="font-style: italic;"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'specifyOtherGrant','required' => 'true','key' => "proposal.specifyOtherGrantField"), $this);?>
</span>&nbsp;&nbsp;
                    <input type="text" name="specifyOtherGrant[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="specifyOtherGrant" size="20" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['specifyOtherGrant'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
            	</td>
            </tr>
            
        </table>
    </div>
    
<!--
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////               Risk Assessment               ///////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   
-->
    <div class="separator"></div>

	<div id="riskAssessment">
		<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskAssessment"), $this);?>
</h3>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        	<tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludesHumanSubject"), $this);?>
</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="identityRevealedField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'identityRevealed','required' => 'true','key' => "proposal.identityRevealed"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="identityRevealed" value="1" <?php if ($this->_tpl_vars['identityRevealed'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['identityRevealed'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="identityRevealed" value="0" <?php if ($this->_tpl_vars['identityRevealed'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['identityRevealed'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
       		
        		</td>
        	</tr>
        	<tr valign="top" id="unableToConsentField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'unableToConsent','required' => 'true','key' => "proposal.unableToConsent"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="unableToConsent" value="1" <?php if ($this->_tpl_vars['unableToConsent'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['unableToConsent'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="unableToConsent" value="0" <?php if ($this->_tpl_vars['unableToConsent'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['unableToConsent'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="under18Field">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'under18','required' => 'true','key' => "proposal.under18"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="under18" value="1" <?php if ($this->_tpl_vars['under18'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['under18'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="under18" value="0" <?php if ($this->_tpl_vars['under18'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['under18'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="dependentRelationshipField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'dependentRelationship','required' => 'true','key' => "proposal.dependentRelationship"), $this);?>
<br/><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dependentRelationshipInstruct"), $this);?>
</i></td>
        		<td width="60%" class="value">
                	<input type="radio" name="dependentRelationship" value="1" <?php if ($this->_tpl_vars['dependentRelationship'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['dependentRelationship'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="dependentRelationship" value="0" <?php if ($this->_tpl_vars['dependentRelationship'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['dependentRelationship'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="ethnicMinorityField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'ethnicMinority','required' => 'true','key' => "proposal.ethnicMinority"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="ethnicMinority" value="1" <?php if ($this->_tpl_vars['ethnicMinority'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['ethnicMinority'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="ethnicMinority" value="0" <?php if ($this->_tpl_vars['ethnicMinority'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['ethnicMinority'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="impairmentField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'impairment','required' => 'true','key' => "proposal.impairment"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="impairment" value="1" <?php if ($this->_tpl_vars['impairment'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['impairment'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="impairment" value="0" <?php if ($this->_tpl_vars['impairment'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['impairment'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="pregnantField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'pregnant','required' => 'true','key' => "proposal.pregnant"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="pregnant" value="1" <?php if ($this->_tpl_vars['pregnant'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['pregnant'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="pregnant" value="0" <?php if ($this->_tpl_vars['pregnant'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['pregnant'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchIncludes"), $this);?>
</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="newTreatmentField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'newTreatment','required' => 'true','key' => "proposal.newTreatment"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="newTreatment" value="1" <?php if ($this->_tpl_vars['newTreatment'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['newTreatment'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="newTreatment" value="0" <?php if ($this->_tpl_vars['newTreatment'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['newTreatment'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="bioSamplesField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'bioSamples','required' => 'true','key' => "proposal.bioSamples"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="bioSamples" value="1" <?php if ($this->_tpl_vars['bioSamples'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['bioSamples'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="bioSamples" value="0" <?php if ($this->_tpl_vars['bioSamples'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['bioSamples'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="radiationField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'radiation','required' => 'true','key' => "proposal.radiation"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="radiation" value="1" <?php if ($this->_tpl_vars['radiation'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['radiation'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="radiation" value="0" <?php if ($this->_tpl_vars['radiation'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['radiation'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="distressField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'distress','required' => 'true','key' => "proposal.distress"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="distress" value="1" <?php if ($this->_tpl_vars['distress'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['distress'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="distress" value="0" <?php if ($this->_tpl_vars['distress'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['distress'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="inducementsField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'inducements','required' => 'true','key' => "proposal.inducements"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="inducements" value="1" <?php if ($this->_tpl_vars['inducements'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['inducements'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="inducements" value="0" <?php if ($this->_tpl_vars['inducements'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['inducements'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="sensitiveInfoField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'sensitiveInfo','required' => 'true','key' => "proposal.sensitiveInfo"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="sensitiveInfo" value="1" <?php if ($this->_tpl_vars['sensitiveInfo'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['sensitiveInfo'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="sensitiveInfo" value="0" <?php if ($this->_tpl_vars['sensitiveInfo'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['sensitiveInfo'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="deceptionField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'deception','required' => 'true','key' => "proposal.deception"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="deception" value="1" <?php if ($this->_tpl_vars['deception'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['deception'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="deception" value="0" <?php if ($this->_tpl_vars['deception'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['deception'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="reproTechnologyField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'reproTechnology','required' => 'true','key' => "proposal.reproTechnology"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="reproTechnology" value="1" <?php if ($this->_tpl_vars['reproTechnology'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['reproTechnology'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="reproTechnology" value="0" <?php if ($this->_tpl_vars['reproTechnology'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['reproTechnology'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="geneticField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'genetic','required' => 'true','key' => "proposal.genetic"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="genetic" value="1" <?php if ($this->_tpl_vars['genetic'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['genetic'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="genetic" value="0" <?php if ($this->_tpl_vars['genetic'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['genetic'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="stemCellField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'stemCell','required' => 'true','key' => "proposal.stemCell"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="stemCell" value="1" <?php if ($this->_tpl_vars['stemCell'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['stemCell'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="stemCell" value="0" <?php if ($this->_tpl_vars['stemCell'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['stemCell'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="biosafetyField">
        		<td width="40%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'genetics','required' => 'true','key' => "proposal.biosafety"), $this);?>
</td>
        		<td width="60%" class="value">
                	<input type="radio" name="biosafety" value="1" <?php if ($this->_tpl_vars['biosafety'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['biosafety'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="biosafety" value="0" <?php if ($this->_tpl_vars['biosafety'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['biosafety'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top"><td colspan="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.potentialRisk"), $this);?>
</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        	<tr valign="top" id="riskLevelField">
        		<td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'riskLevel','required' => 'true','key' => "proposal.riskLevel"), $this);?>
</td>
        		<td width="70%" class="value">
            		<select name="riskLevel" class="selectMenu" id="riskLevel">
            			<option value=""></option>
            			<option value="1" <?php if ($this->_tpl_vars['riskLevel'] == '1'): ?> selected="selected" <?php elseif ($this->_tpl_vars['riskAssessment']['riskLevel'] == '1'): ?> selected="selected" <?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelNoMore"), $this);?>
</option>
            			<option value="2" <?php if ($this->_tpl_vars['riskLevel'] == '2'): ?> selected="selected" <?php elseif ($this->_tpl_vars['riskAssessment']['riskLevel'] == '2'): ?> selected="selected" <?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMinore"), $this);?>
</option>
            			<option value="3" <?php if ($this->_tpl_vars['riskLevel'] == '3'): ?> selected="selected" <?php elseif ($this->_tpl_vars['riskAssessment']['riskLevel'] == '3'): ?> selected="selected" <?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.riskLevelMore"), $this);?>
</option>
					</select>
				</td>
        	</tr>
        	<tr valign="top" id="listRisksField">
                <td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'listRisks','required' => 'true','key' => "proposal.listRisks"), $this);?>
</td>
                <td width="70%" class="value">
                    <textarea name="listRisks" class="textArea" id="listRisks" rows="5" cols="40"><?php if ($this->_tpl_vars['listRisks']): ?><?php echo $this->_tpl_vars['listRisks']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['riskAssessment']['listRisks'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?></textarea><br/>
                </td>
            </tr>
            <tr valign="top" id="howRisksMinimizedField">
                <td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'howRisksMinimized','required' => 'true','key' => "proposal.howRisksMinimized"), $this);?>
</td>
                <td width="70%" class="value">
                    <textarea name="howRisksMinimized" class="textArea" id="howRisksMinimized" rows="5" cols="40"><?php if ($this->_tpl_vars['howRisksMinimized']): ?><?php echo $this->_tpl_vars['listRisks']; ?>
<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['riskAssessment']['howRisksMinimized'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?></textarea><br/>
                </td>
            </tr>
            <tr valign="top" id="riskApplyToField">
                <td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'riskApplyTo','key' => "proposal.riskApplyTo"), $this);?>
</td>
                <td width="70%" class="value">
                	<input type="checkbox" name="risksToTeam" value="1" <?php if ($this->_tpl_vars['risksToTeam'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['risksToTeam'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchTeam"), $this);?>
<br/>
                	<input type="checkbox" name="risksToSubjects" value="1" <?php if ($this->_tpl_vars['risksToSubjects'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['risksToSubjects'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchSubjects"), $this);?>
<br/>
                	<input type="checkbox" name="risksToCommunity" value="1" <?php if ($this->_tpl_vars['risksToCommunity'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['risksToCommunity'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.widerCommunity"), $this);?>

                </td>
            </tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
        </table>
        <table width="100%" class="data">
        	<tr valign="top"><td colspan="2"><b><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.potentialBenefits"), $this);?>
</b></td></tr>
        	<tr valign="top"><td colapse="2">&nbsp;</td></tr>
           	<tr valign="top" id="benefitsFromTheProjectField">
                <td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'benefitsFromTheProject','key' => "proposal.benefitsFromTheProject"), $this);?>
</td>
                <td width="70%" class="value">
                	<input type="checkbox" name="benefitsToParticipants" value="1" <?php if ($this->_tpl_vars['benefitsToParticipants'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['benefitsToParticipants'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.directBenefits"), $this);?>
<br/>
                	<input type="checkbox" name="knowledgeOnCondition" value="1" <?php if ($this->_tpl_vars['knowledgeOnCondition'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['knowledgeOnCondition'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.participantCondition"), $this);?>
<br/>
                	<input type="checkbox" name="knowledgeOnDisease" value="1" <?php if ($this->_tpl_vars['knowledgeOnDisease'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['knowledgeOnDisease'] == '1'): ?> checked="checked" <?php endif; ?>/><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.diseaseOrCondition"), $this);?>

                </td>
            </tr>
        	<tr valign="top" id="multiInstitutionsField">
        		<td width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'multiInstitutions','required' => 'true','key' => "proposal.multiInstitutions"), $this);?>
</td>
        		<td width="70%" class="value">
                	<input type="radio" name="multiInstitutions" value="1" <?php if ($this->_tpl_vars['multiInstitutions'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['multiInstitutions'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="multiInstitutions" value="0" <?php if ($this->_tpl_vars['multiInstitutions'] == '0'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['multiInstitutions'] == '0'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
        		
        		</td>
        	</tr>
        	<tr valign="top" id="conflictOfInterestField">
        		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.conflictOfInterestInstruct"), $this);?>
" width="30%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'conflictOfInterest','required' => 'true','key' => "proposal.conflictOfInterest"), $this);?>
</td>
        		<td width="70%" class="value">
                	<input type="radio" name="conflictOfInterest" value="1" <?php if ($this->_tpl_vars['conflictOfInterest'] == '1'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['conflictOfInterest'] == '1'): ?> checked="checked" <?php endif; ?>  /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="conflictOfInterest" value="2" <?php if ($this->_tpl_vars['conflictOfInterest'] == '2'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['conflictOfInterest'] == '2'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>
  
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="conflictOfInterest" value="3" <?php if ($this->_tpl_vars['conflictOfInterest'] == '3'): ?> checked="checked" <?php elseif ($this->_tpl_vars['riskAssessment']['conflictOfInterest'] == '3'): ?> checked="checked" <?php endif; ?> /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.notSure"), $this);?>

        		</td>
        	</tr>
        </table>
	</div>

<div class="separator"></div>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.saveMetadata"), $this);?>
" class="button defaultButton"/> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="history.go(-1)" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
