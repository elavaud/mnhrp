<?php /* Smarty version 2.6.26, created on 2013-11-19 10:38:40
         compiled from sectionEditor/meetings/setMeeting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', 'sectionEditor/meetings/setMeeting.tpl', 15, false),array('modifier', 'escape', 'sectionEditor/meetings/setMeeting.tpl', 64, false),array('modifier', 'date_format', 'sectionEditor/meetings/setMeeting.tpl', 65, false),array('modifier', 'truncate', 'sectionEditor/meetings/setMeeting.tpl', 66, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/meetings/setMeeting.tpl', 67, false),array('function', 'url', 'sectionEditor/meetings/setMeeting.tpl', 26, false),array('function', 'translate', 'sectionEditor/meetings/setMeeting.tpl', 26, false),array('function', 'fieldLabel', 'sectionEditor/meetings/setMeeting.tpl', 42, false),array('function', 'sort_heading', 'sectionEditor/meetings/setMeeting.tpl', 48, false),array('function', 'html_checkboxes', 'sectionEditor/meetings/setMeeting.tpl', 63, false),array('block', 'iterate', 'sectionEditor/meetings/setMeeting.tpl', 55, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.meetings.setMeeting"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.meetings.setMeeting"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js") : smarty_modifier_cat($_tmp, "/lib/pkp/js/lib/jquery/jquery-ui-timepicker-addon.js")); ?>
"></script>
<style type="text/css" src="<?php echo ((is_array($_tmp=$this->_tpl_vars['baseUrl'])) ? $this->_run_mod_handler('cat', true, $_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css") : smarty_modifier_cat($_tmp, "/lib/pkp/styles/jquery-ui-timepicker-addon.css")); ?>
"></style>

<?php echo '
<script type="text/javascript">
$(document).ready(function() {
	$( "#meetingDate" ).datetimepicker({changeMonth: true, changeYear: true, dateFormat: \'yy-mm-dd\', minDate: \'+0 d\', ampm:true});
});
</script>
'; ?>

<ul class="menu">
	<li><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.articles"), $this);?>
</a></li>
	<li><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'section','path' => $this->_tpl_vars['ercId']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "section.sectionAbbrev"), $this);?>
</a></li>
	<li class="current"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
</ul>
<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</a></li>
</ul>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div class="separator"></div>
<br>
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.proposals"), $this);?>
</h3>
<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting','path' => $this->_tpl_vars['meetingId']), $this);?>
" >

<div id="submissions">
<p><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'selectedProposals','required' => 'true','key' => "editor.meeting.addProposalsToDiscuss"), $this);?>
</p>
<table class="listing" width="100%">
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="5%" align="center"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.select"), $this);?>
</input></td>
		<td width="15%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.article"), $this);?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.id"), $this);?>
</td>
		<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<td width="20%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.authors",'sort' => 'authors'), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'status'), $this);?>
</td>
	</tr>
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	<p></p>
<?php $this->_tag_stack[] = array('iterate', array('from' => 'submissions','item' => 'submission')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
<?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>
<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
							
	<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
	<?php $this->assign('proposalId', $this->_tpl_vars['submission']->getProposalId($this->_tpl_vars['submission']->getLocale())); ?>
	<tr valign="top">
			<td><?php echo smarty_function_html_checkboxes(array('id' => 'selectedProposals','name' => 'selectedProposals','values' => $this->_tpl_vars['submission']->getId(),'checked' => $this->_tpl_vars['selectedProposals']), $this);?>
 </td>
			<td><?php if ($this->_tpl_vars['proposalId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['proposalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
   			<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor())) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->		
   			<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")); ?>
</a></td>
			<td align="right">
				<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

			</td>
	</tr>
<tr>
<td colspan="6" class="<?php if ($this->_tpl_vars['submissions']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['submissions']->wasEmpty()): ?>
	<tr>
		<td colspan="6" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="6" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="6" align="left"><?php echo ((is_array($_tmp=$this->_tpl_vars['submissions']->getCount())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.article.s"), $this);?>
</td>
	</tr>
<?php endif; ?>
</table>
</div>

<div id="meetingInfo">
<table class="listing" width="100%">
<tr valign="top">
	<td colspan="6"><h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.settings"), $this);?>
</h3></td>
</tr>
<tr valign="top">
	<td width="20%" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.dateAndTime.instruct"), $this);?>
" colspan="2" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'meetingDate','required' => 'true','key' => "editor.meeting.dateAndTime"), $this);?>
</td>
	<td width="80%" colspan="4" class="value"><input type="text" class="textField" name="meetingDate" id="meetingDate" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['meetingDate'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%Y-%m-%d %I:%M %p") : smarty_modifier_date_format($_tmp, "%Y-%m-%d %I:%M %p")); ?>
" size="20" maxlength="255" /></td>
</tr>
<tr valign="top">
	<td width="20%" colspan="2" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'meetingLength','required' => 'true','key' => "editor.meeting.length"), $this);?>
</td>
	<td width="20%" colspan="4" class="value">
		<select name="meetingLength" size="1"  class="selectMenu">
			<option value="">&nbsp;</option>
			<option value="15" <?php if ($this->_tpl_vars['meetingLength'] == '15'): ?> selected="selected"<?php endif; ?>>15 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.minutes"), $this);?>
</option>
			<option value="30" <?php if ($this->_tpl_vars['meetingLength'] == '30'): ?> selected="selected"<?php endif; ?>>30 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.minutes"), $this);?>
</option>
			<option value="45" <?php if ($this->_tpl_vars['meetingLength'] == '45'): ?> selected="selected"<?php endif; ?>>45 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.minutes"), $this);?>
</option>
			<option value="60" <?php if ($this->_tpl_vars['meetingLength'] == '60'): ?> selected="selected"<?php endif; ?>>60 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.minutes"), $this);?>
</option>
			<option value="90" <?php if ($this->_tpl_vars['meetingLength'] == '90'): ?> selected="selected"<?php endif; ?>>90 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.minutes"), $this);?>
</option>
			<option value="120" <?php if ($this->_tpl_vars['meetingLength'] == '120'): ?> selected="selected"<?php endif; ?>>2 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.hours"), $this);?>
</option>
			<option value="180" <?php if ($this->_tpl_vars['meetingLength'] == '180'): ?> selected="selected"<?php endif; ?>>3 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.time.hours"), $this);?>
</option>
		</select>
	</td>
</tr>
<tr>
	<td width="20%" colspan="2" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'location','key' => "editor.meeting.location"), $this);?>
</td>
	<td width="80%" colspan="4" class="value">
		<input type="text" class="textField" name="location" value="<?php echo $this->_tpl_vars['location']; ?>
" size="50" maxlength="255" />
	</td>
</tr>
<tr>
	<td width="20%" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.inviteInvestigator.instruct"), $this);?>
" colspan="2" class="label">[?] <?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'investigator','required' => 'true','key' => "editor.meeting.inviteInvestigator"), $this);?>
</td>
	<td width="80%" colspan="4" class="value">
    	<input type="radio" name="investigator" value="1" <?php if ($this->_tpl_vars['investigator'] == '1'): ?>checked="checked"<?php endif; ?>/> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.yes"), $this);?>

        &nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="investigator" value="0" <?php if ($this->_tpl_vars['investigator'] == '0'): ?>checked="checked"<?php endif; ?>/> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.no"), $this);?>

	</td>
</tr>
<tr>
	<td width="20%" colspan="2" class="label">&nbsp;</td>
	<td width="80%" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.setMeetingAsFinal.instruct"), $this);?>
" colspan="4" class="value"><br/>
		<input type="checkbox" name="final" value="1" />&nbsp;[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.setMeetingAsFinal"), $this);?>

	</td>
</tr>
</table>
</div>

<p><br/> <?php if ($this->_tpl_vars['meetingId'] == 0): ?>
		<input type="submit" name="saveMeeting" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" />
	<?php else: ?>
		<input type="submit" name="saveMeeting" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" onclick="ans=confirm('Do you want to save the changes?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveMeeting','path' => $this->_tpl_vars['meetingId']), $this);?>
'" />
	<?php endif; ?> 
 	  <input type="button" class="button" onclick="history.go(-1)" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.back"), $this);?>
" />
 	  </p>
</form>
<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.mouseOver"), $this);?>
</span></p>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>