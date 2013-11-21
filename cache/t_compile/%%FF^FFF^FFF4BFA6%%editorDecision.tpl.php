<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:36
         compiled from sectionEditor/submission/editorDecision.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sectionEditor/submission/editorDecision.tpl', 11, false),array('modifier', 'date_format', 'sectionEditor/submission/editorDecision.tpl', 80, false),array('modifier', 'escape', 'sectionEditor/submission/editorDecision.tpl', 97, false),array('modifier', 'to_array', 'sectionEditor/submission/editorDecision.tpl', 254, false),array('modifier', 'assign', 'sectionEditor/submission/editorDecision.tpl', 270, false),array('function', 'translate', 'sectionEditor/submission/editorDecision.tpl', 35, false),array('function', 'url', 'sectionEditor/submission/editorDecision.tpl', 80, false),array('function', 'html_options_translate', 'sectionEditor/submission/editorDecision.tpl', 95, false),array('function', 'icon', 'sectionEditor/submission/editorDecision.tpl', 272, false),)), $this); ?>
<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js") : smarty_modifier_cat($_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js")); ?>
"></script>
<style type="text/css" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css")); ?>
"></style>

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$("#approvalDateRow").hide();
	$("#approvalDate").datepicker({changeMonth: true, changeYear: true, dateFormat: \'yy-mm-dd\'});
	$("#decision").change(
		function() {
			var decision = $("#decision option:selected").val();
			if(decision == 1) {
				$("#approvalDateRow").show();
			} else {
				$("#approvalDateRow").hide();
			}
		}
	);
});
function checkSize(){
	var fileToUpload = document.getElementById(\'finalDecisionFile\');
	var check = fileToUpload.files[0].fileSize;
	var valueInKb = Math.ceil(check/1024);
	if (check > 5242880){
		alert (\''; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileTooBig1"), $this);?>
<?php echo '\'+valueInKb+\''; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileTooBig2"), $this);?>
<?php echo '5 Mb.\');
		return false
	} 
}
</script>
'; ?>

 
<?php $this->assign('proposalStatus', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey($this->_tpl_vars['proposalStatus'])); ?>
<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_FULL_REVIEW || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED): ?> 
	<div>
		<?php if ($this->_tpl_vars['reviewAssignmentCount'] > 0): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/peerReview.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php else: ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/peerReviewSelection.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		<div class="separator"></div>
	</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['authorFees']): ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "sectionEditor/submission/authorFees.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div class="separator"></div>
<?php endif; ?>

<div id="editorDecision">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.editorDecision"), $this);?>
</h3>

<table id="table1" width="100%" class="data">
	<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.proposalStatus"), $this);?>
</td>
	<td width="80%" class="value">
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

		<?php if ($this->_tpl_vars['submission']->isSubmissionDue() && $this->_tpl_vars['proposalStatus'] != PROPOSAL_STATUS_COMPLETED): ?>
			(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.continuingReview"), $this);?>
)
		<?php endif; ?></td>
</tr>

<?php if ($this->_tpl_vars['meetingsCount'] > 0): ?>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.meetingInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.s"), $this);?>
</td>
		<td class="value" width="80%">
			<?php $_from = $this->_tpl_vars['meetings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['meeting']):
?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
"><?php echo $this->_tpl_vars['meeting']->getPublicId(); ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatLong'])); ?>
</a><br/>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
<?php endif; ?>
	<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordDecision'), $this);?>
" onSubmit="return checkSize()" enctype="multipart/form-data">
		<input type="hidden" name="articleId" value="<?php echo $this->_tpl_vars['submission']->getId(); ?>
" />
		<input type="hidden" name="lastDecisionId" value="<?php echo $this->_tpl_vars['lastDecision']->getId(); ?>
" />
		<input type="hidden" name="resubmitCount" value="<?php echo $this->_tpl_vars['submission']->getResubmitCount(); ?>
" />
 
	<tr valign="top">
	<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_SUBMITTED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RESUBMITTED): ?>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectInitialReviewInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectInitialReview"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['initialReviewOptions'],'selected' => 1), $this);?>

			</select>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.confirmInitialReview"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />			
		</td>

	<?php elseif ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_CHECKED): ?>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectReviewProcessInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectReviewProcess"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['exemptionOptions'],'selected' => 1), $this);?>

			</select>
			<input type="submit" id="notFullReview" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.confirmExemption"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />
		</td>
	<?php elseif ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['submission']->isSubmissionDue()): ?>
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectContinuingReview"), $this);?>
</td>
		<td width="80%" class="value">
				<select id="decision" name="decision" size="1" class="selectMenu">
					<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['continuingReviewOptions'],'selected' => 1), $this);?>

				</select>
				<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.confirmReviewSelection"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" />
		</td>	
	<?php endif; ?>
	</tr>

<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_WITHDRAWN): ?>
	<tr id="withdrawnReasons">
		<td class="label">&nbsp;</td>
		<td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.reason"), $this);?>
: 
		<?php if ($this->_tpl_vars['submission']->getWithdrawReason('en_US') == '0'): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.withdrawLack"), $this);?>

		<?php elseif ($this->_tpl_vars['submission']->getWithdrawReason('en_US') == '1'): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.withdrawAdverse"), $this);?>

		<?php else: ?>
			<?php echo $this->_tpl_vars['submission']->getWithdrawReason('en_US'); ?>

		<?php endif; ?>
		</td>
	</tr>
	<?php if ($this->_tpl_vars['submission']->getWithdrawComments('en_US')): ?>
		<tr id="withdrawComments">
			<td class="label">&nbsp;</td>
			<td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.comments"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getWithdrawComments('en_US'); ?>
</td>
		</tr>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_FULL_REVIEW): ?>	
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectDecisionInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectDecision"), $this);?>
</td>
		<td width="80%" class="value">
			<select id="decision" name="decision" <?php if ($this->_tpl_vars['authorFees'] && ! $this->_tpl_vars['submissionPayment'] && $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?>disabled="disabled"<?php endif; ?> size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['sectionDecisionOptions'],'selected' => 0), $this);?>

			</select> <?php if ($this->_tpl_vars['authorFees'] && ! $this->_tpl_vars['submissionPayment'] && $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() != 'Yes'): ?><i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.payment.paymentConfirm"), $this);?>
</i><?php endif; ?>			
		</td>		
	</tr>
<?php endif; ?>
	<tr id="approvalDateRow">
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.setApprovalDateInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.setApprovalDate"), $this);?>
</td>
		<td class="value">
			<input type="text" name="approvalDate" id="approvalDate" class="textField" size="19" />
		</td>
	</tr>
<?php if ($this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXPEDITED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_FULL_REVIEW): ?>	
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadFinalDecisionFileInstruct"), $this);?>
" class="label" width="20%">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadFinalDecisionFile"), $this);?>
</td>
		<td width="80%" class="value">
			<input type="file" class="uploadField" name="finalDecisionFile" id="finalDecisionFile"/>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadRecordDecision"), $this);?>
"  class="button" />						
		</td>
	</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['proposalStatus'] != PROPOSAL_STATUS_COMPLETED): ?>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.finalDecision"), $this);?>
</td>
	<td class="value">
		<?php if (! $this->_tpl_vars['submission']->isSubmissionDue() && $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED || $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_EXEMPTED): ?>
			<?php $this->assign('decision', $this->_tpl_vars['submission']->getEditorDecisionKey()); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['decision']), $this);?>

			<?php if ($this->_tpl_vars['submission']->isSubmissionDue()): ?>&nbsp;(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.due"), $this);?>
)&nbsp;<?php endif; ?>
			<?php if ($this->_tpl_vars['lastDecision']->getDecision() == SUBMISSION_SECTION_DECISION_APPROVED): ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getApprovalDate($this->_tpl_vars['submission']->getLocale()))) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['lastDecision']->getDateDecided())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			<?php endif; ?>
		<?php else: ?>
			<?php $this->assign('decisionAllowed', 'false'); ?>
			<?php if ($this->_tpl_vars['reviewAssignments']): ?>
				<!-- Change false to true for allowing decision only if all reviewers submitted a recommendation-->
				<?php $this->assign('decisionAllowed', 'false'); ?>
				<?php $_from = $this->_tpl_vars['reviewAssignments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewAssignment']):
?>
					<?php if (! $this->_tpl_vars['reviewAssignment']->getRecommendation()): ?>
						<?php $this->assign('decisionAllowed', 'false'); ?>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['decisionAllowed'] == 'true'): ?>
			<select id="decision" name="decision" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['editorDecisionOptions'],'selected' => 0), $this);?>

			</select>
			<input type="submit" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.submissionReview.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadRecordDecision"), $this);?>
"  class="button" />
			<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; ?>
		<?php endif; ?>		
	</td>
</tr>
<?php endif; ?>
</form>

<?php if (( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RETURNED ) || ( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_RESUBMITTED ) || ( $this->_tpl_vars['proposalStatus'] == PROPOSAL_STATUS_REVIEWED && $this->_tpl_vars['lastDecision']->getDecision() == SUBMISSION_SECTION_DECISION_RESUBMIT )): ?>
	<tr valign="top">
		<?php $this->assign('articleLastModified', $this->_tpl_vars['submission']->getLastModified()); ?>
		<?php if ($this->_tpl_vars['articleMoreRecent'] && $this->_tpl_vars['resubmitCount'] != null && $this->_tpl_vars['resubmitCount'] != 0): ?>
			<td class="label"></td>
			<td width="80%" class="value">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.resubmittedMsg1"), $this);?>
 <?php echo $this->_tpl_vars['resubmitCount']; ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.resubmittedMsg2"), $this);?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['articleLastModified'])) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			</td>
		<?php endif; ?>
	</tr>
	<tr valign="top">
	<?php if (! $this->_tpl_vars['articleMoreRecent']): ?>
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.submissionStatus"), $this);?>
</td>
		<td width="80%" class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.waitingForResubmission"), $this);?>
</td>
	<?php endif; ?>
	</tr>
<?php endif; ?>


<?php if ($this->_tpl_vars['submission']->getMostRecentDecision() == SUBMISSION_SECTION_DECISION_EXEMPTED): ?>
	<?php $this->assign('localizedReasons', $this->_tpl_vars['submission']->getLocalizedReasonsForExemption()); ?>
	<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordReasonsForExemption'), $this);?>
">
		<input type="hidden" name="articleId" value="<?php echo $this->_tpl_vars['submission']->getId(); ?>
" />
		<input type="hidden" name="decision" value="<?php echo $this->_tpl_vars['lastDecision']->getDecision(); ?>
" />	
	
		<tr valign="top">
			<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.reasonsForExemptionInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.reasonsForExemption"), $this);?>
</td>
			<td class="value"><!--  --></td>
		</tr>
		<?php $_from = $this->_tpl_vars['reasonsMap']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reasonVal'] => $this->_tpl_vars['reasonLocale']):
?>
			<tr valign="top">
				<td class="label" align="center">
					<input type="checkbox" name="exemptionReasons[]" id="reason<?php echo $this->_tpl_vars['reasonVal']; ?>
" value=<?php echo $this->_tpl_vars['reasonVal']; ?>
	 <?php if ($this->_tpl_vars['localizedReasons'] > 0): ?>disabled="true"<?php endif; ?> <?php if ($this->_tpl_vars['reasonsForExemption'][$this->_tpl_vars['reasonVal']] == 1): ?>checked="checked"<?php endif; ?>/>				
				</td>
				<td class="value">
					<label for="reason<?php echo $this->_tpl_vars['reasonVal']; ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reasonLocale']), $this);?>
</label>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>	
		<?php if (! $this->_tpl_vars['localizedReasons']): ?>
		<tr>
			<td align="center"><input type="submit"  name="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.record"), $this);?>
"  class="button" /></td>
		</tr>			
		<?php endif; ?>
	</form>
<?php endif; ?>

<?php $this->assign('lastSectionDecision', $this->_tpl_vars['submission']->getLastSectionDecision()); ?>
<?php if ($this->_tpl_vars['lastSectionDecision']): ?>
	<?php $this->assign('decisionFiles', $this->_tpl_vars['lastSectionDecision']->getDecisionFiles()); ?>
	<?php if (( ( $this->_tpl_vars['submission']->getMostRecentDecision() == SUBMISSION_SECTION_DECISION_EXEMPTED ) || ( $this->_tpl_vars['submission']->getMostRecentDecision() == SUBMISSION_SECTION_DECISION_APPROVED ) || ( $this->_tpl_vars['submission']->getMostRecentDecision() == SUBMISSION_SECTION_DECISION_DECLINED ) ) && count ( $this->_tpl_vars['decisionFiles'] ) < 1): ?>
	<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadDecisionFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['submission']->getLastSectionDecisionId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['submission']->getLastSectionDecisionId()))), $this);?>
"  enctype="multipart/form-data">
		<tr valign="top">
			<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadFinalDecisionFileInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.uploadFinalDecisionFile"), $this);?>
</td>
			<td class="value">
				<input type="file" class="uploadField" name="finalDecisionFile" id="finalDecisionFile"/>
				<input type="submit" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" />
			</td>
		</tr>
	</form>
	<?php endif; ?>
<?php endif; ?>

<tr valign="top">
	<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.notifyAuthorInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.notifyAuthor"), $this);?>
</td>
	<td class="value">
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "email.compose"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;
		<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'emailEditorDecisionComment','articleId' => $this->_tpl_vars['submission']->getId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'notifyAuthorUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'notifyAuthorUrl'));?>

		
		<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['notifyAuthorUrl']), $this);?>

	
		<br/>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.editorAuthorRecord"), $this);?>

		<?php if ($this->_tpl_vars['submission']->getMostRecentEditorDecisionComment()): ?>
			<?php $this->assign('comment', $this->_tpl_vars['submission']->getMostRecentEditorDecisionComment()); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewEditorDecisionComments','path' => $this->_tpl_vars['submission']->getId(),'anchor' => $this->_tpl_vars['comment']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.lastComment"), $this);?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['comment']->getDatePosted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

		<?php else: ?>
			&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewEditorDecisionComments','path' => $this->_tpl_vars['submission']->getId()), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.noComments"), $this);?>

		<?php endif; ?>
	</td>
</tr>
</table>

</div>