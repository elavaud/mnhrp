<?php /* Smarty version 2.6.26, created on 2013-11-18 00:39:13
         compiled from author/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'author/index.tpl', 26, false),array('function', 'translate', 'author/index.tpl', 26, false),array('function', 'html_options_translate', 'author/index.tpl', 38, false),array('function', 'html_select_date', 'author/index.tpl', 53, false),array('modifier', 'escape', 'author/index.tpl', 46, false),array('modifier', 'assign', 'author/index.tpl', 67, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "common.queue.long.".($this->_tpl_vars['pageToDisplay'])); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>



<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>

<ul class="menu">
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'proposalsToSubmit' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'proposalsToSubmit'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.proposalsToSubmit"), $this);?>
</a></li>
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'proposalsInReview' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'proposalsInReview'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.proposalsInReview"), $this);?>
</a></li>
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'ongoingResearches' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'ongoingResearches'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.ongoingResearches"), $this);?>
</a></li>
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'completedResearches' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'completedResearches'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.completedResearches"), $this);?>
</a></li>
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'submissionsArchives' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => 'submissionsArchives'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.submissionsArchives"), $this);?>
</a></li>
</ul>

<br />
<form method="post" name="submit" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index','path' => $this->_tpl_vars['pageToDisplay']), $this);?>
">
	<input type="hidden" name="sort" value="id"/>
	<input type="hidden" name="sortDirection" value="ASC"/>
	<select name="searchField" size="1" class="selectMenu" style="display: none;">
		<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['fieldOptions'],'selected' => $this->_tpl_vars['searchField']), $this);?>

	</select>
	<strong>Title &nbsp;</strong> 
	<select name="searchMatch" size="1" class="selectMenu">
		<option value="contains"<?php if ($this->_tpl_vars['searchMatch'] == 'contains'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.contains"), $this);?>
</option>
		<option value="is"<?php if ($this->_tpl_vars['searchMatch'] == 'is'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.is"), $this);?>
</option>
		<option value="startsWith"<?php if ($this->_tpl_vars['searchMatch'] == 'startsWith'): ?> selected="selected"<?php endif; ?>><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.startsWith"), $this);?>
</option>
	</select>
	<input type="text" size="15" name="search" class="textField" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['search'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
	<br/>
		<select name="dateSearchField" size="1" class="selectMenu" style="display: none;">
		<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['dateFieldOptions'],'selected' => $this->_tpl_vars['dateSearchField']), $this);?>

	</select>
	<strong>Submitted between :&nbsp;</strong>
	<?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.and"), $this);?>

	<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>

	<input type="hidden" name="dateToHour" value="23" />
	<input type="hidden" name="dateToMinute" value="59" />
	<input type="hidden" name="dateToSecond" value="59" />
	<br/>
    <br/>
	<input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
" class="button" />
</form>

<br />
<div id="submitStart">
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.startHereTitle"), $this);?>
</h4>
<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submit'), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'submitUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'submitUrl'));?>

<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('submitUrl' => $this->_tpl_vars['submitUrl'],'key' => "author.submit.startHereLink"), $this);?>
<br />
</div>

<br /><br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/".($this->_tpl_vars['pageToDisplay']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<!-- Comment out, AIM, May 31, 2011 -->
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
