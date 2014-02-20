{**
 * javascript.tpl
 *
 * This file is used for incorporating all the javascript and jquery functions used during of the Step 2 of author article submission.
 * The javascript use some smarty variables. It's why it is currently in a tpl file.
 *
 * FIX ME: Finding a workaround for including the smarty variable into a real js file, but moreover reorganizing this file in order to use a modern way to call events.
 *
 *}
 
 {literal}
     <script type="text/javascript">

    
       var PROPOSAL_DETAIL_NO = "{/literal}{$smarty.const.PROPOSAL_DETAIL_NO}{literal}";
       var PROPOSAL_DETAIL_YES = "{/literal}{$smarty.const.PROPOSAL_DETAIL_YES}{literal}";
       
       var PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS = "{/literal}{$smarty.const.PROPOSAL_DETAIL_YES_WITH_RANDOM_AREAS}{literal}";
       
       var PROPOSAL_DETAIL_UNDER_REVIEW = "{/literal}{$smarty.const.PROPOSAL_DETAIL_UNDER_REVIEW}{literal}";
       var PROPOSAL_DETAIL_REVIEW_AVAILABLE = "{/literal}{$smarty.const.PROPOSAL_DETAIL_REVIEW_AVAILABLE}{literal}";
    
       var RISK_ASSESSMENT_NO = "{/literal}{$smarty.const.RISK_ASSESSMENT_NO}{literal}";
       var RISK_ASSESSMENT_YES = "{/literal}{$smarty.const.RISK_ASSESSMENT_YES}{literal}";
       var RISK_ASSESSMENT_NOT_PROVIDED = "{/literal}{$smarty.const.RISK_ASSESSMENT_NOT_PROVIDED}{literal}";

       var RISK_ASSESSMENT_NO_MORE_THAN_MINIMAL = "{/literal}{$smarty.const.RISK_ASSESSMENT_NO_MORE_THAN_MINIMAL}{literal}";
       var RISK_ASSESSMENT_MINORE_THAN_MINIMAL = "{/literal}{$smarty.const.RISK_ASSESSMENT_MINORE_THAN_MINIMAL}{literal}";
       var RISK_ASSESSMENT_MORE_THAN_MINIMAL = "{/literal}{$smarty.const.RISK_ASSESSMENT_MORE_THAN_MINIMAL}{literal}";

       var RISK_ASSESSMENT_CONFLICT_OF_INTEREST_YES = "{/literal}{$smarty.const.RISK_ASSESSMENT_CONFLICT_OF_INTEREST_YES}{literal}";
       var RISK_ASSESSMENT_CONFLICT_OF_INTEREST_NO = "{/literal}{$smarty.const.RISK_ASSESSMENT_CONFLICT_OF_INTEREST_NO}{literal}";
       var RISK_ASSESSMENT_CONFLICT_OF_INTEREST_NOT_SURE = "{/literal}{$smarty.const.RISK_ASSESSMENT_CONFLICT_OF_INTEREST_NOT_SURE}{literal}";

       function showOrHideStudentInfo(){
           var value = $("input:radio[name='proposalDetails[studentInitiatedResearch]']:checked").val();
           if (value === PROPOSAL_DETAIL_NO || typeof value === "undefined") {
                $('#studentInfo').hide();
                $('#studentInstitution').val("NA");
                if (!$('#academicDegree option[value="9"]').length > 0){
                    $('#academicDegree').append('<option value="9"></option>');
                }
                $('#academicDegree').val("9");
                $('#supervisorName').val("NA");
                $('#supervisorEmail').val("NA");
           } else {
                $('#studentInfo').show();               
                if($('#studentInstitution').val() === "NA") {
                    $('#studentInstitution').val("");
                }
                if ($('#academicDegree option[value="9"]').length > 0){
                    $('#academicDegree option[value="9"]').remove();
                }
                if($('#supervisorName').val() === "NA") {
                    $('#supervisorName').val("");
                }
                if($('#supervisorEmail').val() === "NA") {
                    $('#supervisorEmail').val("");
                }
           }
       }
       
       function showOrHideOherKeyImplementingInstitutionField(){
            var value = $("#keyImplInstitution").val();
            if (value === 'OTHER') {
                $('#otherInstitution').show();
                if($('#otherInstitutionName').val() === "NA") {
                    $('#otherInstitutionName').val("");
                }
                if($('#otherInstitutionAcronym').val() === "NA") {
                    $('#otherInstitutionAcronym').val("");
                }
                if ($('#otherInstitutionType option[value="9999"]').length > 0){
                    $('#otherInstitutionType option[value="9999"]').remove();
                }
                if ($('#otherInstitutionLocation option[value="9999"]').length > 0){
                    $('#otherInstitutionLocation option[value="9999"]').remove();
                }               
            } else {
                $('#otherInstitution').hide();
                $('#otherInstitutionName').val("NA");
                $('#otherInstitutionAcronym').val("NA");
                if (!$('#otherInstitutionType option[value="9999"]').length > 0){
                    $('#otherInstitutionType').append('<option value="9999"></option>');
                }
                $('#otherInstitutionType').val("9999");
                if (!$('#otherInstitutionLocation option[value="9999"]').length > 0){
                    $('#otherInstitutionLocation').append('<option value="9999"></option>');
                }
                $('#otherInstitutionLocation').val("9999");                
            } 	
        }
        
        function showOrHideMultiCountryResearch(){
            var value = $("input:radio[name='proposalDetails[multiCountryResearch]']:checked").val();
            if (value === PROPOSAL_DETAIL_NO || typeof value === "undefined") {
                 $('#firstMultiCountry').hide();
                 $('#addAnotherCountry').hide();
                 $("#proposalDetails tr.multiCountrySupp").remove();
                 if (!$('#multiCountry option[value="MCNA"]').length > 0){
                     $('#multiCountry').append('<option value="MCNA"></option>');
                 }
                 $('#multiCountry').val("MCNA");
            } else {
                 $('#firstMultiCountry').show();
                 $('#addAnotherCountry').show();
                 if ($('#multiCountry option[value="MCNA"]').length > 0){
                     $('#multiCountry option[value="MCNA"]').remove();
                 }
            }
        }

        function addCountry(){
            var multiCountryHtml = '<tr valign="top" class="multiCountrySupp">' + $('#firstMultiCountry').html() + '</tr>';
            if ($("#proposalDetails tr.multiCountrySupp")[0]){
                $('#proposalDetails tr.multiCountrySupp:last').after(multiCountryHtml);
                $('#proposalDetails tr.multiCountrySupp:last').find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.multiCountrySupp:last').find('.removeMultiCountry').show();
                $('#proposalDetails tr.multiCountrySupp:last').find('.removeMultiCountry').click(function(){$(this).closest('tr').remove();});
            } else {
                $('#firstMultiCountry').after(multiCountryHtml);
                $('#firstMultiCountry').next().find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.multiCountrySupp').find('.removeMultiCountry').show();
                $('#proposalDetails tr.multiCountrySupp').find('.removeMultiCountry').click(function(){$(this).closest('tr').remove();});
            }
        }
                
        function showOrHideGeoAreas(){
            var value = $("input:radio[name='proposalDetails[nationwide]']:checked").val();
            if (value === PROPOSAL_DETAIL_YES || typeof value === "undefined") {
                 $('#firstGeoArea').hide();
                 $('#addAnotherArea').hide();
                 $("#proposalDetails tr.geoAreaSupp").remove();
                 if (!$('#geoArea option[value="NW"]').length > 0){
                     $('#geoArea').append('<option value="NW"></option>');
                 }
                 $('#geoArea').val("NW");
            } else {
                 $('#firstGeoArea').show();
                 $('#addAnotherArea').show();
                 if ($('#geoArea option[value="NW"]').length > 0){
                     $('#geoArea option[value="NW"]').remove();
                 }
            }
        }    

        function addGeoArea(){
            var geoAreaHtml = '<tr valign="top" class="geoAreaSupp">' + $('#firstGeoArea').html() + '</tr>';
            if ($("#proposalDetails tr.geoAreaSupp")[0]){
                $('#proposalDetails tr.geoAreaSupp:last').after(geoAreaHtml);
                $('#proposalDetails tr.geoAreaSupp:last').find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.geoAreaSupp:last').find('.removeProposalProvince').show();
                $('#proposalDetails tr.geoAreaSupp:last').find('.removeProposalProvince').click(function(){$(this).closest('tr').remove();});
            } else {
                $('#firstGeoArea').after(geoAreaHtml);
                $('#firstGeoArea').next().find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.geoAreaSupp').find('.removeProposalProvince').show();
                $('#proposalDetails tr.geoAreaSupp').find('.removeProposalProvince').click(function(){$(this).closest('tr').remove();});
            }            
        } 
                
        function showOrHideOtherResearchField(){
            var other = false;
            $('select[name^=proposalDetails[researchFields]]').each(function() {
               var value = this.value;
               if (value === 'OTHER'){
                   other = true;
               }
            });
            if (other === false){
                $('#otherResearchFieldField').hide();
                $('#otherResearchField').val("NA");
            } else {
                $('#otherResearchFieldField').show();
                if($('#otherResearchField').val() === "NA") {
                    $('#otherResearchField').val("");
                }
            }        
        }

        function addResearchField(){
            var researchFieldHtml = '<tr valign="top" class="researchFieldSupp">' + $('#firstResearchField').html() + '</tr>';
            if ($("#proposalDetails tr.researchFieldSupp")[0]){
                $('#proposalDetails tr.researchFieldSupp:last').after(researchFieldHtml);
                $('#proposalDetails tr.researchFieldSupp:last').find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.researchFieldSupp:last').find('.removeResearchField').show();
                $('#proposalDetails tr.researchFieldSupp:last').find('.removeResearchField').click(function(){$(this).closest('tr').remove();});
                $('#proposalDetails tr.researchFieldSupp:last').find('.researchFieldTitle').hide();
                $('#proposalDetails tr.researchFieldSupp:last').find('.noResearchFieldTitle').show();
                $('#proposalDetails tr.researchFieldSupp:last').find('select').change(showOrHideOtherResearchField);
            } else {
                $('#firstResearchField').after(researchFieldHtml);
                $('#firstResearchField').next().find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.researchFieldSupp').find('.removeResearchField').show();
                $('#proposalDetails tr.researchFieldSupp').find('.researchFieldTitle').hide();
                $('#proposalDetails tr.researchFieldSupp').find('.noResearchFieldTitle').show();
                $('#proposalDetails tr.researchFieldSupp').find('.removeResearchField').click(function(){$(this).closest('tr').remove();showOrHideOtherResearchField();});
                $('#proposalDetails tr.researchFieldSupp').find('select').change(showOrHideOtherResearchField);
            }              
        }

        function showOrHideProposalTypes(){
            var value = $("input:radio[name='proposalDetails[withHumanSubjects]']:checked").val();
            if (value === PROPOSAL_DETAIL_NO || typeof value === "undefined") {
                 $('#firstProposalType').hide();
                 $('#addAnotherType').hide();
                 $('#otherProposalTypeField').hide();
                 $('#otherProposalType').val("NA");
                 $("#proposalDetails tr.proposalTypeSupp").remove();
                 if (!$('#proposalType option[value="PNHS"]').length > 0){
                     $('#proposalType').append('<option value="PNHS"></option>');
                 }
                 $('#proposalType').val("PNHS");
            } else {
                 $('#firstProposalType').show();
                 $('#addAnotherType').show();
                 if ($('#proposalType option[value="PNHS"]').length > 0){
                     $('#proposalType option[value="PNHS"]').remove();
                 }
            }
        }  

        function addProposalType(){
            var proposalTypeHtml = '<tr valign="top" class="proposalTypeSupp">' + $('#firstProposalType').html() + '</tr>';
            if ($("#proposalDetails tr.proposalTypeSupp")[0]){
                $('#proposalDetails tr.proposalTypeSupp:last').after(proposalTypeHtml);
                $('#proposalDetails tr.proposalTypeSupp:last').find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.proposalTypeSupp:last').find('.removeProposalType').show();
                $('#proposalDetails tr.proposalTypeSupp:last').find('.removeProposalType').click(function(){$(this).closest('tr').remove();});
                $('#proposalDetails tr.proposalTypeSupp:last').find('select').change(showOrHideOtherProposalType);
            } else {
                $('#firstProposalType').after(proposalTypeHtml);
                $('#firstProposalType').next().find('select').attr('selectedIndex', 0);
                $('#proposalDetails tr.proposalTypeSupp').find('.removeProposalType').show();
                $('#proposalDetails tr.proposalTypeSupp').find('.removeProposalType').click(function(){$(this).closest('tr').remove();});
                $('#proposalDetails tr.proposalTypeSupp').find('select').change(showOrHideOtherProposalType);
            }             
        }

        function showOrHideOtherProposalType(){
            var other = false;
            $('select[name^=proposalDetails[proposalTypes]]').each(function() {
               var value = this.value;
               if (value === 'OTHER'){
                   other = true;
               }
            });
            if (other === false){
                $('#otherProposalTypeField').hide();
                $('#otherProposalType').val("NA");
            } else {
                $('#otherProposalTypeField').show();
                if($('#otherProposalType').val() === "NA") {
                    $('#otherProposalType').val("");
                }
            }        
        }
        
        function showOrHideOtherErcDecision(){
            var value = $("input:radio[name='proposalDetails[reviewedByOtherErc]']:checked").val();
            if (value === PROPOSAL_DETAIL_NO || typeof value === "undefined") {
                $('#otherErcDecisionField').hide();
                if (!$('#otherErcDecision option[value="1"]').length > 0){
                    $('#otherErcDecision').append('<option value="1"></option>');
                }
                $('#otherErcDecision').val("1");
            } else {
               $('#otherErcDecisionField').show();
               if ($('#otherErcDecision option[value="1"]').length > 0){
                   $('#otherErcDecision option[value="1"]').remove();
               }
            }
        }      
                
        function isNumeric(){
            var numericExpression = /^([\s]*[0-9]+[\s]*)+$/;
            $('#SourceOfMonetary input.sourceAmount').each(function() {
                if ($(this).val().match(numericExpression)){
                    displayTotalBudget();
                    return true;
                } else {
                    alert('{/literal}{translate key="proposal.source.amount.instruct"}{literal}');
                    $(this).focus();
                    return false;
                }   
            });
        }

        function displayTotalBudget(){
            var totalBudget = Number(0);
            $('#SourceOfMonetary input.sourceAmount').each(function() {
                totalBudget += Number($(this).val());
            });            
            $("#totalBudgetVar").html(totalBudget);
        }
        
        function showOrHideOtherSource() {
            $("#SourceOfMonetary select[id^=sources-]").each(function () {
                var iterator = $(this).attr('id');
                iterator = iterator.replace('sources-', '');
                iterator = iterator.replace('-institution', '');
                
                var value = this.value;
                var idTr = "sources-"+iterator+"-otherInstitution";
                if(value === "OTHER"){
                    $('#' + idTr).show();
                    if($('#sources-'+iterator+'-otherInstitutionName').val() === 'NA'){
                        $('#sources-'+iterator+'-otherInstitutionName').val('');
                    }
                    if($('#sources-'+iterator+'-otherInstitutionAcronym').val() === 'NA'){
                        $('#sources-'+iterator+'-otherInstitutionAcronym').val('');
                    }
                    if ($('#sources-'+iterator+'-otherInstitutionType option[value="NA"]').length > 0){
                        $('#sources-'+iterator+'-otherInstitutionType option[value="NA"]').remove();
                    }
                    if ($('#sources-'+iterator+'-otherInstitutionLocation option[value="NA"]').length > 0){
                        $('#sources-'+iterator+'-otherInstitutionLocation option[value="NA"]').remove();
                    }
                } else {
                    $('#' + idTr).hide();
                    $('#sources-'+iterator+'-otherInstitutionName').val('NA');
                    $('#sources-'+iterator+'-otherInstitutionAcronym').val('NA');
                    if ($('#sources-'+iterator+'-otherInstitutionType option[value="NA"]').length > 0){
                        $('#sources-'+iterator+'-otherInstitutionType').append('<option value="NA"></option>');
                    }
                    $('#sources-'+iterator+'-otherInstitutionType').val('NA');
                    if ($('#sources-'+iterator+'-otherInstitutionLocation option[value="NA"]').length > 0){
                        $('#sources-'+iterator+'-otherInstitutionLocation').append('<option value="NA"></option>');
                    }
                    $('#sources-'+iterator+'-otherInstitutionLocation').val('NA');
                }
            });
        }

        function addSource(){
            
            var sourceHtml = '<table width="100%" valign="top" class="sourceSuppClass" style="border-top: dotted 1px #C0C0C0 !important; padding-bottom:10px; padding-top: 10px;">' + $('#firstSource').html() + '</table>';
            
            if ($("#SourceOfMonetary table.sourceSuppClass")[0]){
                $('#SourceOfMonetary table.sourceSuppClass:last').after(sourceHtml);
                var lastElement = $('#SourceOfMonetary table.sourceSuppClass:last');
            } else {
                $('#firstSource').after(sourceHtml);
                var lastElement = $('#firstSource').next();
            }
            
            var numItems = $('#SourceOfMonetary table.sourceSuppClass').length;
            
            lastElement.find("select[id$=-institution]").attr("id", "sources-"+numItems+"-institution")
                                                        .attr("name", "sources["+numItems+"][institution]")
                                                        .attr('selectedIndex', 0)
                                                        .change(showOrHideOtherSource);
                                                
            lastElement.find("input[id$=-amount]").attr("id", "sources-"+numItems+"-amount")
                                                  .attr("name", "sources["+numItems+"][amount]")
                                                  .val('')
                                                  .keyup(isNumeric);
                                          
            lastElement.find("tr[id$=-otherInstitution]").attr("id", "sources-"+numItems+"-otherInstitution")
                                                         .hide();
            
            lastElement.find("input[id$=-otherInstitutionName]").attr("id", "sources-"+numItems+"-otherInstitutionName")
                                                                .attr("name", "sources["+numItems+"][otherInstitutionName]")
                                                                .val('NA');
                                                        
            lastElement.find("input[id$=-otherInstitutionAcronym]").attr("id", "sources-"+numItems+"-otherInstitutionAcronym")
                                                                   .attr("name", "sources["+numItems+"][otherInstitutionAcronym]")
                                                                   .val('NA');
                                                           
            lastElement.find("select[id$=-otherInstitutionType]").attr("id", "sources-"+numItems+"-otherInstitutionType")
                                                                 .attr("name", "sources["+numItems+"][otherInstitutionType]")
                                                                 .append('<option value="NA"></option>')
                                                                 .val('NA');
                                                         
            lastElement.find("select[id$=-otherInstitutionLocation]").attr("id", "sources-"+numItems+"-otherInstitutionLocation")
                                                                     .attr("name", "sources["+numItems+"][otherInstitutionLocation]")
                                                                     .append('<option value="NA"></option>')
                                                                     .val('NA');

            lastElement.find('.removeSource').show();
            lastElement.find('.removeSource').click(function(){$(this).closest('table').remove();});

        }       
         
        function showOrHideOtherLevelOfRisk(){
            var value = $("#riskLevel").val();
            if (value === RISK_ASSESSMENT_NO_MORE_THAN_MINIMAL || typeof value === "undefined" || value === "") {
                $('#listRisksField').hide();
                $('#howRisksMinimizedField').hide();
                $('#listRisks').val("NA");
                $('#howRisksMinimized').val("NA");
            } else {
                $('#listRisksField').show();
                $('#howRisksMinimizedField').show();
                $('#listRisks').val("");
                $('#howRisksMinimized').val("");
            }
        }      
        ///////////
        // Events:
        ///////////
        
        $("[name='proposalDetails[studentInitiatedResearch]']").change(showOrHideStudentInfo);
        
        //Date picker + restrict end date to (start date) + 1
        $( "#startDate" ).datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd-M-yy', minDate: '-1 y', onSelect: function(dateText, inst){dayAfter = new Date();dayAfter = $("#startDate").datepicker("getDate");dayAfter.setDate(dayAfter.getDate() + 1);$("#endDate").datepicker("option","minDate", dayAfter);}});
        $( "#endDate" ).datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd-M-yy', minDate: '-1 y'});
        
        $("#keyImplInstitution").change(showOrHideOherKeyImplementingInstitutionField);
        
        $("[name='proposalDetails[multiCountryResearch]']").change(showOrHideMultiCountryResearch);
        
        $("#addAnotherCountryClick").click(addCountry);

        $("[name='proposalDetails[nationwide]']").change(showOrHideGeoAreas);
        
        $("#addAnotherAreaClick").click(addGeoArea);
        
        $('[name^=proposalDetails[researchFields]]').each(function() {$(this).change(showOrHideOtherResearchField);});
        
        $("#addAnotherFieldClick").click(addResearchField);
        
        $("[name='proposalDetails[withHumanSubjects]']").change(showOrHideProposalTypes);
        
        $('[name^=proposalDetails[proposalTypes]]').each(function() {$(this).change(showOrHideOtherProposalType);});
        
        $("#addAnotherTypeClick").click(addProposalType);
        
        $("[name='proposalDetails[reviewedByOtherErc]']").change(showOrHideOtherErcDecision);
        
        $("#riskLevel").change(showOrHideOtherLevelOfRisk);
        
        $("#SourceOfMonetary select[id$=-institution]").each(function() {$(this).change(showOrHideOtherSource);});
        
        $("#SourceOfMonetary input[id$=-amount]").each(function() {$(this).keyup(isNumeric);});
        
        $(document).ready(
            function() {
                
                showOrHideStudentInfo();
                                
                showOrHideOherKeyImplementingInstitutionField();
                
                showOrHideMultiCountryResearch();
                
                showOrHideGeoAreas();
                
                showOrHideOtherResearchField();
                
                showOrHideProposalTypes();
                
                showOrHideOtherProposalType();
                
                showOrHideOtherErcDecision();
                                
                displayTotalBudget();
                
                showOrHideOtherSource();
                
                showOrHideOtherLevelOfRisk();
            }
        );  
     </script>
 {/literal}