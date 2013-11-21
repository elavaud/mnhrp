<?php /* Smarty version 2.6.26, created on 2013-11-19 11:36:41
         compiled from search/search.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'search/search.tpl', 35, false),array('function', 'html_select_date', 'search/search.tpl', 47, false),array('function', 'html_options', 'search/search.tpl', 63, false),array('function', 'translate', 'search/search.tpl', 78, false),array('modifier', 'escape', 'search/search.tpl', 40, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "navigation.search"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<script type="text/javascript">
<?php echo '
<!--
function ensureKeyword() {
	document.search.submit();
	return true;
}
// -->
'; ?>

</script>

<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>
<div id="advancedSearch">
<form method="post" name="search" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'advancedResults'), $this);?>
">

<table class="data" width="100%">
<tr valign="top">
	<td width="25%" class="label"><label for="advancedQuery">Search from Title or Keyword(s)</label></td>
	<td width="75%" class="value"><input type="text" id="advancedQuery" name="query" size="40" maxlength="255" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['query'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" class="textField" /></td>
</tr>
<tr valign="top">
	<td colspan="2" class="formSubLabel"><h4>Start Date of the research</h4></td>
</tr>
<tr valign="top">
	<td class="label">From</td>
	<td class="value"><?php echo smarty_function_html_select_date(array('prefix' => 'dateFrom','time' => $this->_tpl_vars['dateFrom'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>
 &nbsp;&nbsp;&nbsp;&nbsp;(inclusive)</td>
</tr>
<tr valign="top">
	<td class="label">To</td>
	<td class="value">
		<?php echo smarty_function_html_select_date(array('prefix' => 'dateTo','time' => $this->_tpl_vars['dateTo'],'all_extra' => "class=\"selectMenu\"",'year_empty' => "",'month_empty' => "",'day_empty' => "",'start_year' => "-5",'end_year' => "+1"), $this);?>
 &nbsp;&nbsp;&nbsp;&nbsp;(inclusive)
			<input type="hidden" name="dateToHour" value="23" />
		<input type="hidden" name="dateToMinute" value="59" />
		<input type="hidden" name="dateToSecond" value="59" />
	</td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><h4>Region</h4></td>
	<td width="80%" class="value"><br/>
        <select name="proposalCountry" id="proposalCountry" class="selectMenu">
            <option value="ALL">All</option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['proposalCountries'],'selected' => $this->_tpl_vars['proposalCountry'][$this->_tpl_vars['formLocale']][$this->_tpl_vars['i']]), $this);?>

        </select>
    </td>
</tr>
<tr valign="top">
	<td width="20%" class="label"><h4>Status</h4></td>
	<td width="80%" class="value">
		<br/>
    	<input type="radio" name="status" value="1"/> Complete
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="status" value="2"/> Ongoing	
    </td>
</tr>
</table>

<p><input type="button" onclick="ensureKeyword();" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
" class="button defaultButton" /></p>

<script type="text/javascript">
<!--
	document.search.query.focus();
// -->
</script>
</form>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
