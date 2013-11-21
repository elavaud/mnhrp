<?php /* Smarty version 2.6.26, created on 2013-11-19 01:04:02
         compiled from reviewer/submission.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'reviewer/submission.tpl', 16, false),array('function', 'url', 'reviewer/submission.tpl', 73, false),array('function', 'icon', 'reviewer/submission.tpl', 215, false),array('function', 'get_help_id', 'reviewer/submission.tpl', 353, false),array('function', 'html_options_translate', 'reviewer/submission.tpl', 381, false),array('modifier', 'assign', 'reviewer/submission.tpl', 16, false),array('modifier', 'escape', 'reviewer/submission.tpl', 26, false),array('modifier', 'strip_unsafe_html', 'reviewer/submission.tpl', 45, false),array('modifier', 'to_array', 'reviewer/submission.tpl', 73, false),array('modifier', 'date_format', 'reviewer/submission.tpl', 75, false),array('modifier', 'nl2br', 'reviewer/submission.tpl', 257, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('articleId', $this->_tpl_vars['submission']->getLocalizedProposalId()); ?><?php echo ''; ?><?php $this->assign('reviewId', $this->_tpl_vars['reviewAssignment']->getId()); ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.page.review",'id' => $this->_tpl_vars['articleId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.review"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript">
<?php echo '
<!--
function confirmSubmissionCheck() {
	if (document.recommendation.recommendation.value==\'\') {
		alert(\''; ?>
<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.mustSelectDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
<?php echo '\');
		return false;
	}
	return confirm(\''; ?>
<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.confirmDecision"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
<?php echo '\');
}

$(document).ready(function() {
	$( "#proposedDate" ).datepicker({changeMonth: true, changeYear: true, dateFormat: \'dd-M-yy\', minDate: \'-6 m\'});
});
// -->
'; ?>



</script>
<div id="submissionToBeReviewed">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.submissionToBeReviewed"), $this);?>
</h3>
<table width="100%" class="data">
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
	<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedProposalId())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.title"), $this);?>
</td>
	<td width="80%" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.journalSection"), $this);?>
</td>
	<td class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getSectionTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
</tr>

</table>
</div>
<div class="separator"></div>

<div id="files">
<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.files"), $this);?>
</h3>
	<table width="100%" class="data">
	<?php if (( $this->_tpl_vars['confirmedStatus'] && ! $this->_tpl_vars['declined'] ) || ! $this->_tpl_vars['journal']->getSetting('restrictReviewerFileAccess')): ?>
		<tr valign="top">
			<td width="20%" class="label">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.submissionManuscript"), $this);?>

			</td>
			<td class="value" width="80%">
				<?php if ($this->_tpl_vars['reviewFile']): ?>
				<?php if ($this->_tpl_vars['submission']->getDateConfirmed() || ! $this->_tpl_vars['journal']->getSetting('restrictReviewerAccessToFile')): ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['reviewFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['reviewFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
				<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php endif; ?>
				&nbsp;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

				<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

				<?php endif; ?>
			</td>
		</tr>
		<?php if (count ( $this->_tpl_vars['previousFiles'] ) > 1): ?>
		<?php $this->assign('count', 0); ?>
		<tr>
			<td class="label">Previous proposal files</td>
			<td width="80%" class="value">
				<?php $_from = $this->_tpl_vars['previousFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['previousFiles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['previousFiles']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['previousFile']):
        $this->_foreach['previousFiles']['iteration']++;
?>
					<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
					<?php if ($this->_tpl_vars['count'] > 1): ?>
            			<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['previousFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['previousFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['previousFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a><br />
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
		<?php endif; ?>
		<tr valign="top">
			<td class="label">
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.suppFiles"), $this);?>

			</td>
			<td class="value">
				<?php $this->assign('sawSuppFile', 0); ?>
				<?php $_from = $this->_tpl_vars['suppFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['suppFile']):
?>
					<?php if ($this->_tpl_vars['suppFile']->getShowReviewers()): ?>
						<?php $this->assign('sawSuppFile', 1); ?>
						<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['suppFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['suppFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a><cite>&nbsp;&nbsp;(<?php echo $this->_tpl_vars['suppFile']->getType(); ?>
)</cite><br />
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if (! $this->_tpl_vars['sawSuppFile']): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

				<?php endif; ?>
			</td>
		</tr>
		<?php else: ?>
		<tr><td class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.restrictedFileAccess"), $this);?>
</td></tr>
		<?php endif; ?>
	</table>
</div>

<?php if ($this->_tpl_vars['submission']->getDateDue()): ?>

<div class="separator"></div>

<div id="reviewSchedule">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.reviewSchedule"), $this);?>
</h3>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'reviewMeetingSchedule'), $this);?>
" >
<table width="100%" class="data">
<tr valign="top">
	<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.request"), $this);?>
</td>
	<td class="value" width="80%"><?php if ($this->_tpl_vars['submission']->getDateNotified()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateNotified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.response"), $this);?>
</td>
	<td class="value"><?php if ($this->_tpl_vars['submission']->getDateConfirmed()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateConfirmed())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.submitted"), $this);?>
</td>
	<td class="value"><?php if ($this->_tpl_vars['submission']->getDateCompleted()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateCompleted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.due"), $this);?>
</td>
	<td class="value"><?php if ($this->_tpl_vars['submission']->getDateDue()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateDue())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
</tr>
<?php if ($this->_tpl_vars['reviewAssignment']->getDateCompleted() || $this->_tpl_vars['reviewAssignment']->getDeclined() == 1 || $this->_tpl_vars['reviewAssignment']->getCancelled() == 1): ?>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.schedule.decision"), $this);?>
</td>
	<td class="value">
		<?php if ($this->_tpl_vars['submission']->getCancelled()): ?>
			Canceled
		<?php elseif ($this->_tpl_vars['submission']->getDeclined()): ?>
			Declined
		<?php else: ?>
			<?php $this->assign('recommendation', $this->_tpl_vars['submission']->getRecommendation()); ?>
			<?php if ($this->_tpl_vars['recommendation'] === '' || $this->_tpl_vars['recommendation'] === null): ?>
				&mdash;
			<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reviewerRecommendationOptions'][$this->_tpl_vars['recommendation']]), $this);?>

			<?php endif; ?>
		<?php endif; ?>
	</td>
</tr>
<?php endif; ?>
</table>
</form>
</div>

<?php if (! $this->_tpl_vars['reviewAssignment']->getDateCompleted() && ( $this->_tpl_vars['reviewAssignment']->getDeclined() != 1 ) && ( ! $this->_tpl_vars['reviewAssignment']->getCancelled() || ( $this->_tpl_vars['reviewAssignment']->getCancelled() == 0 ) ) && ( ( $this->_tpl_vars['submission']->getMostRecentDecision() == 7 ) || ( $this->_tpl_vars['submission']->getMostRecentDecision() == 8 ) )): ?>
<div class="separator"></div>

<div id="reviewSteps">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.reviewSteps"), $this);?>
</h3>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $this->assign('currentStep', 1); ?>

<table width="100%" class="data">
<tr valign="top">
		<td width="3%"><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
	<td width="97%"><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.notifyEditorA"), $this);?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.notifyEditorB"), $this);?>
</span></td>
</tr>
<tr valign="top">
	<td>&nbsp;</td>
	<td>
		<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.response"), $this);?>
&nbsp;&nbsp;&nbsp;&nbsp;
		<?php if (! $this->_tpl_vars['confirmedStatus']): ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReview','reviewId' => $this->_tpl_vars['reviewId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'acceptUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'acceptUrl'));?>

			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReview','reviewId' => $this->_tpl_vars['reviewId'],'declineReview' => 1), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'declineUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'declineUrl'));?>


			<?php if (! $this->_tpl_vars['submission']->getCancelled()): ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.canDoReview"), $this);?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['acceptUrl']), $this);?>

				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.cannotDoReview"), $this);?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['declineUrl']), $this);?>

			<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReview','reviewId' => $this->_tpl_vars['reviewId']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.canDoReview"), $this);?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','disabled' => 'disabled','url' => $this->_tpl_vars['acceptUrl']), $this);?>

				&nbsp;&nbsp;&nbsp;&nbsp;
				<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'confirmReview','reviewId' => $this->_tpl_vars['reviewId'],'declineReview' => 1), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.cannotDoReview"), $this);?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','disabled' => 'disabled','url' => $this->_tpl_vars['declineUrl']), $this);?>

			<?php endif; ?>
		<?php else: ?>
			<?php if (! $this->_tpl_vars['declined']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.accepted"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.rejected"), $this);?>
<?php endif; ?>
		<?php endif; ?>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<?php if ($this->_tpl_vars['journal']->getLocalizedSetting('reviewGuidelines') != ''): ?>
<tr valign="top">
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
	<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.consultGuidelines"), $this);?>
</span></td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<?php endif; ?>
<tr valign="top">
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
	<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.downloadSubmission"), $this);?>
</span></td>
</tr>

<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<?php if ($this->_tpl_vars['currentJournal']->getSetting('requireReviewerCompetingInterests')): ?>
	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
		<td>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'information','op' => 'competingInterestGuidelines'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'competingInterestGuidelinesUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'competingInterestGuidelinesUrl'));?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.enterCompetingInterests",'competingInterestGuidelinesUrl' => $this->_tpl_vars['competingInterestGuidelinesUrl']), $this);?>
</span>
			<?php if (! $this->_tpl_vars['confirmedStatus'] || $this->_tpl_vars['declined'] || $this->_tpl_vars['submission']->getCancelled() || $this->_tpl_vars['submission']->getRecommendation()): ?><br/>
				<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getCompetingInterests())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

			<?php else: ?>
				<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveCompetingInterests','reviewId' => $this->_tpl_vars['reviewId']), $this);?>
" method="post">
					<textarea <?php if ($this->_tpl_vars['cannotChangeCI']): ?>disabled="disabled" <?php endif; ?>name="competingInterests" class="textArea" id="competingInterests" rows="5" cols="40"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewAssignment']->getCompetingInterests())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea><br />
					<input <?php if ($this->_tpl_vars['cannotChangeCI']): ?>disabled="disabled" <?php endif; ?>class="button defaultButton" type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" />
				</form>
			<?php endif; ?>
		</td>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['reviewAssignment']->getReviewFormId()): ?>
	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
		<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.enterReviewForm"), $this);?>
</span></td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewForm"), $this);?>
 
			<?php if ($this->_tpl_vars['confirmedStatus'] && ! $this->_tpl_vars['declined']): ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editReviewFormResponse','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewAssignment']->getReviewFormId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewAssignment']->getReviewFormId()))), $this);?>
" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>
			<?php else: ?>
				 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment','disabled' => 'disabled'), $this);?>

			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
<?php else: ?>	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
		<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.enterReviewA"), $this);?>
</span></td>
	</tr>
	<tr valign="top">
		<td>&nbsp;</td>
		<td>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.chatRoom"), $this);?>
&nbsp; 
			<?php if ($this->_tpl_vars['confirmedStatus'] && ! $this->_tpl_vars['declined']): ?>
				<a href="javascript:openComments('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPeerReviewComments','path' => ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewId']))), $this);?>
');" class="icon"><?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment'), $this);?>
</a>
			<?php else: ?>
				 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'comment','disabled' => 'disabled'), $this);?>

			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
<?php endif; ?><tr valign="top">
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
	<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.uploadFile"), $this);?>
</span></td>
</tr>
<tr valign="top">
	<td>&nbsp;</td>
	<td>
		<table class="data" width="100%">
			<?php $this->assign('reviewerFile', $this->_tpl_vars['reviewAssignment']->getReviewerFile()); ?>
			<?php if ($this->_tpl_vars['reviewerFile']): ?>
				<?php $this->assign('uploadedFileExists', '1'); ?>
				<tr valign="top">
				<td class="label" width="20%">
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.uploadedFile"), $this);?>

				</td>
				<td class="value" width="80%">
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['reviewerFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['articleId'], $this->_tpl_vars['reviewerFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewerFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
					&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewerFile']->getDateModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
&nbsp;
					<?php if (( $this->_tpl_vars['submission']->getRecommendation() === null || $this->_tpl_vars['submission']->getRecommendation() === '' ) && ( ! $this->_tpl_vars['submission']->getCancelled() )): ?>
						<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'deleteReviewerVersion','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewerFile']->getFileId(), $this->_tpl_vars['articleId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewerFile']->getFileId(), $this->_tpl_vars['articleId']))), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
</a>
					<?php endif; ?>
				</td>
				</tr>
			<?php else: ?>
				<tr valign="top">
				<td class="label" width="20%">
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.uploadedFile"), $this);?>

				</td>
				<td class="nodata">
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

				</td>
				</tr>
			<?php endif; ?>
		</table>
		&nbsp;
		<?php if ($this->_tpl_vars['submission']->getRecommendation() === null || $this->_tpl_vars['submission']->getRecommendation() === ''): ?>
			<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'uploadReviewerVersion'), $this);?>
" enctype="multipart/form-data">
				<input type="hidden" name="reviewId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<input type="file" name="upload" <?php if (! $this->_tpl_vars['confirmedStatus'] || $this->_tpl_vars['declined'] || $this->_tpl_vars['submission']->getCancelled()): ?>disabled="disabled"<?php endif; ?> class="uploadField" />
				<input type="submit" name="submit" value="<?php if ($this->_tpl_vars['uploadedFileExists']): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.replaceFile"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
<?php endif; ?>" <?php if (! $this->_tpl_vars['confirmedStatus'] || $this->_tpl_vars['declined'] || $this->_tpl_vars['submission']->getCancelled()): ?>disabled="disabled"<?php endif; ?> class="button" />
			</form>

			<?php if ($this->_tpl_vars['currentJournal']->getSetting('showEnsuringLink')): ?>
			<span class="instruct">
				<a class="action" href="javascript:openHelp('<?php echo $this->_plugins['function']['get_help_id'][0][0]->smartyGetHelpId(array('key' => "editorial.sectionEditorsRole.review.blindPeerReview",'url' => 'true'), $this);?>
')"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.ensuringBlindReview"), $this);?>
</a>
			</span>
			<?php endif; ?>
		<?php endif; ?>
	</td>
</tr>
<tr>
	<td colspan="2">&nbsp;</td>
</tr>
<tr valign="top">
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['currentStep'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
.<?php $this->assign('currentStep', $this->_tpl_vars['currentStep']+1); ?></td>
	<td><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.selectRecommendation"), $this);?>
</span></td>
</tr>
<tr valign="top">
	<td>&nbsp;</td>
	<td>
		<table class="data" width="100%">
			<tr valign="top">
				<td class="label" width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.recommendation"), $this);?>
</td>
				<td class="value" width="70%">
					<?php if ($this->_tpl_vars['submission']->getRecommendation() !== null && $this->_tpl_vars['submission']->getRecommendation() !== ''): ?>
						<?php $this->assign('recommendation', $this->_tpl_vars['submission']->getRecommendation()); ?>
						<strong><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['reviewerRecommendationOptions'][$this->_tpl_vars['recommendation']]), $this);?>
</strong>&nbsp;&nbsp;
						<?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateCompleted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

					<?php else: ?>
						<form name="recommendation" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'recordRecommendation'), $this);?>
">
							<input type="hidden" name="reviewId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
							<select name="recommendation" <?php if (! $this->_tpl_vars['confirmedStatus'] || $this->_tpl_vars['declined'] || $this->_tpl_vars['submission']->getCancelled() || ( ! $this->_tpl_vars['reviewFormResponseExists'] && ! $this->_tpl_vars['uploadedFileExists'] )): ?>disabled="disabled"<?php endif; ?> class="selectMenu">
								<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['reviewerRecommendationOptions'],'selected' => ''), $this);?>

							</select>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="submit" name="submit" onclick="return confirmSubmissionCheck()" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.submitReview"), $this);?>
" <?php if (! $this->_tpl_vars['confirmedStatus'] || $this->_tpl_vars['declined'] || $this->_tpl_vars['submission']->getCancelled() || ( ! $this->_tpl_vars['reviewFormResponseExists'] && ! $this->_tpl_vars['reviewAssignment']->getMostRecentPeerReviewComment() && ! $this->_tpl_vars['uploadedFileExists'] )): ?>disabled="disabled"<?php endif; ?> />
						</form>					
				<?php endif; ?>
				</td>		
			</tr>
		</table>
	</td>
</tr>
</table>
</div>
<?php endif; ?>
<div class="separator"></div>
<div id="proposalDetails">
<table class="listing" width="100%">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.metadata"), $this);?>
</h3>
<table class="listing" width="100%">
    <tr valign="top">
        <td colspan="5" class="headseparator">&nbsp;</td>
    </tr>
<?php $_from = $this->_tpl_vars['submission']->getAuthors(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['authors'] = array('total' => count($_from), 'iteration' => 0);
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
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedStudentInitiatedResearch() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.studentInstitution"), $this);?>
 <?php echo $this->_tpl_vars['submission']->getLocalizedStudentInstitution(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.academicDegree"), $this);?>
 <?php echo $this->_tpl_vars['submission']->getLocalizedAcademicDegree(); ?>
</td>
    </tr>  
    <?php endif; ?>

    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.startDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedStartDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.endDate"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedEndDate(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.fundsRequired"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedFundsRequired(); ?>
 <?php echo $this->_tpl_vars['submission']->getLocalizedSelectedCurrency(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.primarySponsor"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedPrimarySponsor()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedPrimarySponsorText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.secondarySponsors"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedSecondarySponsors()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedSecondarySponsorText(); ?>

        	<?php endif; ?>        
        </td>
    </tr>
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.nationwide"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedNationwide(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedNationwide() == 'No' ) || ( $this->_tpl_vars['submission']->getLocalizedNationwide() == "Yes, with randomly selected regions" )): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedProposalCountryText(); ?>
</td>
    </tr>
    <?php endif; ?>

    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.multiCountryResearch"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryResearch(); ?>
</td>
    </tr>
	<?php if (( $this->_tpl_vars['submission']->getLocalizedMultiCountryResearch() ) == 'Yes'): ?>
	<tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMultiCountryText(); ?>
</td>
    </tr>
	<?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.withHumanSubjects"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedWithHumanSubjects(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedWithHumanSubjects() ) == 'Yes'): ?>
    <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if (( $this->_tpl_vars['submission']->getLocalizedProposalType() )): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedProposalTypeText(); ?>

        	<?php endif; ?>      
        </td>
    </tr>
    <?php endif; ?>
    
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.researchField"), $this);?>
</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedResearchField()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedResearchFieldText(); ?>

        	<?php endif; ?>
        </td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.dataCollection"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedDataCollection(); ?>
</td>
    </tr>   
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.reviewedByOtherErc"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedReviewedByOtherErc(); ?>
<?php if ($this->_tpl_vars['submission']->getLocalizedOtherErcDecision() != 'NA'): ?>(<?php echo $this->_tpl_vars['submission']->getLocalizedOtherErcDecision(); ?>
)<?php endif; ?></td>
    </tr>

	<tr><td colspan="2"><br/><h4>Source(s) of monetary or material support</h4></td></tr>
    
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.industryGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedIndustryGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedIndustryGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedNameOfIndustry(); ?>
</td>
    </tr>   
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.internationalGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedInternationalGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedInternationalGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value">
        	<?php if ($this->_tpl_vars['submission']->getLocalizedInternationalGrantName()): ?>
        		<?php echo $this->_tpl_vars['submission']->getLocalizedInternationalGrantNameText(); ?>
 
        	<?php endif; ?>
        </td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.mohGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedMohGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.governmentGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedGovernmentGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedGovernmentGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedGovernmentGrantName(); ?>
</td>
    </tr>     
    <?php endif; ?>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.universityGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedUniversityGrant(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.selfFunding"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedSelfFunding(); ?>
</td>
    </tr>
    <tr valign="top">
        <td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.otherGrant"), $this);?>
</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedOtherGrant(); ?>
</td>
    </tr>
    <?php if (( $this->_tpl_vars['submission']->getLocalizedOtherGrant() ) == 'Yes'): ?>
     <tr valign="top">
        <td class="label" width="20%">&nbsp;</td>
        <td class="value"><?php echo $this->_tpl_vars['submission']->getLocalizedSpecifyOtherGrant(); ?>
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


<?php endif; ?>
<?php if ($this->_tpl_vars['journal']->getLocalizedSetting('reviewGuidelines') != ''): ?>
<div class="separator"></div>
<div id="reviewerGuidelines">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.reviewerGuidelines"), $this);?>
</h3>
<p><?php echo ((is_array($_tmp=$this->_tpl_vars['journal']->getLocalizedSetting('reviewGuidelines'))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</p>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

