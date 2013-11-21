<?php /* Smarty version 2.6.26, created on 2013-11-19 10:37:43
         compiled from sectionEditor/meetings/meetings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/meetings/meetings.tpl', 12, false),array('function', 'translate', 'sectionEditor/meetings/meetings.tpl', 12, false),array('function', 'html_select_date', 'sectionEditor/meetings/meetings.tpl', 54, false),array('function', 'sort_heading', 'sectionEditor/meetings/meetings.tpl', 79, false),array('function', 'page_info', 'sectionEditor/meetings/meetings.tpl', 131, false),array('function', 'page_links', 'sectionEditor/meetings/meetings.tpl', 132, false),array('block', 'iterate', 'sectionEditor/meetings/meetings.tpl', 86, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/meetings/meetings.tpl', 94, false),array('modifier', 'date_format', 'sectionEditor/meetings/meetings.tpl', 103, false),)), $this); ?>

<?php echo ''; ?><?php $this->assign('pageTitle', "editor.meetings"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "reviewer.meetings"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
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
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</a></li>
</ul>
<div class="separator"></div>
<br/>
<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>
<form method="post" name="submit" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
">
<div id="search">
	<table align="left">
		<tr>
			<td><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</td>
			<td>
			<select name="status" size="1"  class="selectMenu" >
				<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.all"), $this);?>
</option>
				<option value="1" <?php if ($this->_tpl_vars['status'] == 1): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.final"), $this);?>
</option>
				<option value="2" <?php if ($this->_tpl_vars['status'] == 2): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.rescheduled"), $this);?>
</option>
				<option value="3" <?php if ($this->_tpl_vars['status'] == 3): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.cancelled"), $this);?>
</option>
				<option value="4" <?php if ($this->_tpl_vars['status'] == 4): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.scheduleStatus.new"), $this);?>
</option>
				<option value="5" <?php if ($this->_tpl_vars['status'] == 5): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.done"), $this);?>
</option>
			</select>
			</td>
			<td>Minutes</td>
			<td>
			<select name="minutesStatus" size="1"  class="selectMenu" >
				<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.all"), $this);?>
</option>
				<option value="128" <?php if ($this->_tpl_vars['minutesStatus'] == 128): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.complete"), $this);?>
</option>
				<option value="256" <?php if ($this->_tpl_vars['replyStatus'] == 256): ?>selected<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.incomplete"), $this);?>
</option>
			</select></td>
			</tr>
			<tr>
			<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.dateFrom"), $this);?>
</td>
			<td class="value"><?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>
</td>
			<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "search.dateTo"), $this);?>
</td>
			<td class="value">
				<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

				<input type="hidden" name="dateToHour" value="23" />
				<input type="hidden" name="dateToMinute" value="59" />
				<input type="hidden" name="dateToSecond" value="59" />
			</td>
			<td>
			
		</td>
		</tr>
	</table>
</div><br/><br/><br/>
<p align="left"><input type="submit" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
"/></p>
</form>
<div class="separator"></div>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.setMeeting"), $this);?>
</h4>
<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'setMeeting'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.clickHere"), $this);?>
</a>&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.toSetNewMeeting"), $this);?>

<br/>
<br/>
<div id="meetings">
<table class="listing" width="100%">
	<tr><td colspan="4" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "editor.meeting.id",'sort' => 'id'), $this);?>
</td>
		<td width="70%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.submissions"), $this);?>
</td>
		<td width="15%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "editor.meeting.schedule",'sort' => 'meetingDate'), $this);?>
</td>
		<td width="10%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'scheduleStatus'), $this);?>
</td>
	</tr>
	<tr><td colspan="4" class="headseparator">&nbsp;</td></tr>
	<p></p>
	<?php $this->_tag_stack[] = array('iterate', array('from' => 'meetings','item' => 'meeting')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('key', $this->_tpl_vars['meeting']->getId()); ?>
		<tr class="heading" valign="bottom">
			<td width="5%" valign="middle"><?php echo $this->_tpl_vars['meeting']->getPublicId(); ?>
</td>
			<td width="40%">
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
">
				<?php $_from = $this->_tpl_vars['map'][$this->_tpl_vars['key']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['submissions'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['submissions']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['submission']):
        $this->_foreach['submissions']['iteration']++;
?>
					<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
					&#9679;&nbsp;<?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>

					<?php if (($this->_foreach['submissions']['iteration'] == $this->_foreach['submissions']['total'])): ?><?php else: ?><br/><?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
				<?php if (empty ( $this->_tpl_vars['map'][$this->_tpl_vars['key']] )): ?>
					<i><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings.noSubmissions"), $this);?>
</i>
				<?php endif; ?>
				</a>
			</td>
			<td width="25%" align="right" valign="middle">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['meeting']->getDate())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatLong'])); ?>

			</td>
			<td width="30%" align="right" valign="middle">
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewMeeting','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
" class="action">
					<?php echo $this->_tpl_vars['meeting']->getStatusKey(); ?>

				</a>
				<?php if ($this->_tpl_vars['meeting']->isMinutesComplete()): ?>
						<br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
" class="action">
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.downloadMinutes"), $this);?>
</a>
				<?php elseif ($this->_tpl_vars['meeting']->getStatus() == 1): ?>
						<br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'manageMinutes','path' => $this->_tpl_vars['meeting']->getId()), $this);?>
" class="action">
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.minutes.manage"), $this);?>
</a>
				<?php endif; ?>
			</td>
		</tr>	
		<tr>
			<td colspan="4" class="<?php if ($this->_tpl_vars['meetings']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
		</tr>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
	<?php if ($this->_tpl_vars['meetings']->wasEmpty()): ?>
		<tr>
			<td colspan="4" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings.noMeetings"), $this);?>
</td>
		</tr>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
	<?php else: ?>
		<tr>
			<td colspan="2" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['meetings']), $this);?>
</td>
			<td colspan="2" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'meetings','name' => 'meetings','iterator' => $this->_tpl_vars['meetings'],'sort' => $this->_tpl_vars['sort'],'sortDirection' => $this->_tpl_vars['sortDirection']), $this);?>
</td>
		</tr>
	<?php endif; ?>
	</table>
</div>
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>