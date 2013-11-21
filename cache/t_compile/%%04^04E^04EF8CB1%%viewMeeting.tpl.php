<?php /* Smarty version 2.6.26, created on 2013-11-20 15:08:32
         compiled from sectionEditor/meetings/viewMeeting.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/meetings/viewMeeting.tpl', 15, false),array('function', 'translate', 'sectionEditor/meetings/viewMeeting.tpl', 15, false),array('modifier', 'date_format', 'sectionEditor/meetings/viewMeeting.tpl', 36, false),array('modifier', 'escape', 'sectionEditor/meetings/viewMeeting.tpl', 70, false),array('modifier', 'truncate', 'sectionEditor/meetings/viewMeeting.tpl', 72, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/meetings/viewMeeting.tpl', 73, false),array('modifier', 'count', 'sectionEditor/meetings/viewMeeting.tpl', 91, false),array('modifier', 'to_array', 'sectionEditor/meetings/viewMeeting.tpl', 126, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.meeting"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "editor.meeting"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

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
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</a></li>
</ul>

<div class="separator"></div>
<br/>
<div id="details">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.details"), $this);?>
</h3>
<div class="separator"></div>
<table width="100%" class="data">
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.id"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getPublicId(); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.schedule"), $this);?>
</td>
		<td class="value" width="80%"><?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.length"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getLength(); ?>
 mn</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.location"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getLocation(); ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td class="value" width="80%"><?php echo $this->_tpl_vars['meeting']->getStatusKey(); ?>
</td>
	</tr>
</table>
</div>
<br>
<div id="submissions">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.proposals"), $this);?>
</h3>
<table width="100%" class="listing">
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
		<td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.submit"), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.title"), $this);?>
</td>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
	</tr>
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>
	
	<?php $_from = $this->_tpl_vars['submissions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['submission']):
?>
	<?php $this->assign('proposalId', $this->_tpl_vars['submission']->getProposalId($this->_tpl_vars['submission']->getLocale())); ?>
	<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
	<tr valign="top">
		<td><?php if ($this->_tpl_vars['proposalId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['proposalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
   		<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor())) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> 
   		<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</a></td>
		<td align="right">
			<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

		</td>
	</tr>
	<tr><td colspan="6" class="separator"></td></tr>
	<?php endforeach; endif; unset($_from); ?>
	
	<?php if (empty ( $this->_tpl_vars['submissions'] )): ?>
	<tr>
		<td colspan="6" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td colspan="6" class="endseparator">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="6" align="left"><?php echo count($this->_tpl_vars['submissions']); ?>
 <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.article.s"), $this);?>
</td>
	</tr>
</table>
</div>
<br>
<div id="users">
	<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.guests"), $this);?>
</h3>
	<table class="listing" width="100%">
		<tr><td colspan="5" class="headseparator" ></td></tr>
		<tr class="heading" valign="bottom">
			<td width="20%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name"), $this);?>
</td>
			<td width="20%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.functions"), $this);?>
</td>
			<td width="30%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.guest.remarks"), $this);?>
 </td>
			<td width="15%"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.guest.replyStatus"), $this);?>
 </td>
			<td width="15%" align="right"> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
 </td>
		</tr>
		<tr><td colspan="5" class="headseparator" ></td></tr>
		<?php $this->assign('attendingGuests', 0); ?>
		<?php $this->assign('notAttendingGuests', 0); ?>
		<?php $this->assign('undecidedGuests', 0); ?>
		<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
		<tr>
			<td width="20%">
				<?php echo $this->_tpl_vars['user']->getSalutation(); ?>
 &nbsp; <?php echo $this->_tpl_vars['user']->getFirstName(); ?>
 &nbsp; <?php echo $this->_tpl_vars['user']->getLastName(); ?>

				<br/>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'remindUserMeeting','meetingId' => $this->_tpl_vars['meeting']->getId(),'addresseeId' => $this->_tpl_vars['user']->getUserId()), $this);?>
" class="action">Send Reminder</a>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['user']->getDateReminded())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatShort']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatShort'])); ?>

			</td>
			<td width="20%"><?php echo $this->_tpl_vars['user']->getFunctions(); ?>
</td>
			<td width="30%"><?php if ($this->_tpl_vars['user']->getRemarks() == null): ?>&mdash;<?php else: ?><?php echo $this->_tpl_vars['user']->getRemarks(); ?>
<?php endif; ?></td>
			<td width="15%"><?php echo $this->_tpl_vars['user']->getReplyStatus(); ?>
</td>
			<td width="15%" align="right">
				<?php if (( $this->_tpl_vars['meeting']->getStatus() == STATUS_CANCELLED ) || ( $this->_tpl_vars['meeting']->getStatus() == STATUS_DONE )): ?>
					&mdash;
				<?php else: ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'replyAttendanceForUser','path' => ((is_array($_tmp=$this->_tpl_vars['meeting']->getId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['user']->getUserId(), 1) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['user']->getUserId(), 1))), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.guest.available"), $this);?>
</a>
					<br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'replyAttendanceForUser','path' => ((is_array($_tmp=$this->_tpl_vars['meeting']->getId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['user']->getUserId(), 2) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['user']->getUserId(), 2))), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.guest.unavailable"), $this);?>
</a>
				<?php endif; ?>
			</td>

			<?php if ($this->_tpl_vars['user']->getIsAttending() == 1): ?>
				<span style="display:none"><?php echo $this->_tpl_vars['attendingGuests']++; ?>
</span> 
			<?php elseif ($this->_tpl_vars['user']->getIsAttending() == 2): ?>
				<span style="display:none"><?php echo $this->_tpl_vars['notAttendingGuests']++; ?>
</span> 
			<?php else: ?>
				<span style="display:none"><?php echo $this->_tpl_vars['undecidedGuests']++; ?>
</span> 
			<?php endif; ?>
		</tr>
		<tr>
		<td colspan="5" class="separator"></td>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<?php if (empty ( $this->_tpl_vars['users'] )): ?>
		<tr>
			<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.noGuests"), $this);?>
</td>
		</tr>
		<?php endif; ?>
		<tr>
			<td colspan="5" class="endseparator">&nbsp;</td>
		</tr>
		<?php if (! empty ( $this->_tpl_vars['users'] )): ?>
		<tr>
			<td colspan="5" align="left"><?php echo count($this->_tpl_vars['users']); ?>
 users(s)</td>
		</tr>
		<?php endif; ?>
	</table>
</div>
<br>
<div>
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.tentativeAttendance"), $this);?>
</h3>
<div class="separator"></div>
<table width="100%" class="data">
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.numberOfAttendingGuests"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['attendingGuests']; ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.numberOfNotAttendingGuests"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['notAttendingGuests']; ?>
</td>
	</tr>
	<tr valign="top">
		<td class="label" width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.numberOfUndecidedGuests"), $this);?>
</td>
		<td class="value" width="60%"><?php echo $this->_tpl_vars['undecidedGuests']; ?>
</td>
	</tr>
</table>
</div>
<p> <?php if ($this->_tpl_vars['meeting']->getStatus() == 1): ?>
    <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.manage"), $this);?>
" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'manageMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'"/> 
	<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meeting.cancel"), $this);?>
" class="button" onclick="ans=confirm('This cannot be undone. Do you want to proceed?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'cancelMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	<?php else: ?>
		<?php if ($this->_tpl_vars['meeting']->getStatus() == 2 || $this->_tpl_vars['meeting']->getStatus() == 4): ?>
		<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.setFinal"), $this);?>
" class="button defaultButton" onclick="ans=confirm('This cannot be undone. Do you want to proceed?'); if(ans) document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeetingFinal','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	    <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.edit"), $this);?>
" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	   	<?php endif; ?>
	   	<?php if ($this->_tpl_vars['meeting']->getStatus() == 5): ?>
		<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.downloadMinutes"), $this);?>
" class="button defaultButton" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
'" />
	   	<?php endif; ?>
   	<?php endif; ?>
   	<input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.back"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
'" />
	
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>