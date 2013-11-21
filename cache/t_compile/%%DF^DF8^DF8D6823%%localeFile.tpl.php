<?php /* Smarty version 2.6.26, created on 2013-11-21 14:01:12
         compiled from file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 12, false),array('function', 'url', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 29, false),array('function', 'page_info', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 95, false),array('function', 'page_links', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 96, false),array('modifier', 'assign', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 12, false),array('modifier', 'escape', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 16, false),array('modifier', 'to_array', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 29, false),array('modifier', 'explode', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 61, false),array('modifier', 'count', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 61, false),array('block', 'iterate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/localeFile.tpl', 49, false),)), $this); ?>
<?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.locale",'locale' => $this->_tpl_vars['locale']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php $this->assign('filenameEscaped', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url'))); ?>

<form name="reference">
<?php $_from = 'referenceLocaleContents'; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?><input type="hidden" name="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"/><?php endforeach; endif; unset($_from); ?>
</form>

<?php if ($this->_tpl_vars['error']): ?>
	<span class="formError"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.errorsOccurred"), $this);?>
:</span>
	<ul class="formErrorList">
		<li><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.fileNotWriteable"), $this);?>
</li>
	</ul>
<?php endif; ?>

<form name="localeSearch" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editLocaleFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped'])),'anchor' => 'localeContents'), $this);?>
" method="post">
	<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeKey"), $this);?>
&nbsp;&nbsp;
	<input type="text" name="searchKey" class="textField" />&nbsp;&nbsp;
	<input type="submit" class="button defaultButton" onclick="document.locale.redirectUrl.value=document.localeSearch.action);document.locale.submit();return false;" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.search"), $this);?>
" /> <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeKey.description"), $this);?>

</form>

<form name="locale" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveLocaleFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped']))), $this);?>
" method="post">
<input type="hidden" name="redirectUrl" value="" />

<div id="localeContents">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.edit",'filename' => $this->_tpl_vars['filename']), $this);?>
</h3>
<table class="listing" width="100%">
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeKey"), $this);?>
</td>
		<td width="60%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeKeyValue"), $this);?>
</td>
		<td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'localeContents','key' => 'key','item' => 'value')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<?php $this->assign('filenameEscaped', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url'))); ?>
		<tr valign="top"<?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['searchKey']): ?> class="highlight"<?php endif; ?>>
		<td colspan="3"><?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
	<tr valign="top"<?php if ($this->_tpl_vars['key'] == $this->_tpl_vars['searchKey']): ?> class="highlight"<?php endif; ?>>
				<td>&nbsp;</td>
		<td>
			<input type="hidden" name="changes[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
			<?php $this->assign('referenceValue', $this->_tpl_vars['referenceLocaleContents'][$this->_tpl_vars['key']]); ?>
			<?php if (( count(((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('explode', true, $_tmp, "\n") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "\n"))) > 1 ) || ( strlen ( $this->_tpl_vars['value'] ) > 80 ) || ( count(((is_array($_tmp=$this->_tpl_vars['referenceValue'])) ? $this->_run_mod_handler('explode', true, $_tmp, "\n") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "\n"))) > 1 ) || ( strlen ( $this->_tpl_vars['referenceValue'] ) > 80 )): ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.reference"), $this);?>
<br/>
				<textarea name="junk[]" class="textArea" rows="5" cols="50" onkeypress="return (event.keyCode >= 37 && event.keyCode <= 40);">
<?php echo ((is_array($_tmp=$this->_tpl_vars['referenceValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

</textarea>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.translation"), $this);?>
<br/>
				<textarea name="changes[]" class="textArea" rows="5" cols="50">
<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

</textarea>
			<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.reference"), $this);?>
<br/>
				<input name="junk[]" class="textField" class="textField" type="text" size="50" onkeypress="return (event.keyCode >= 37 && event.keyCode <= 40);" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['referenceValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><br/>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.translation"), $this);?>
<br/>
				<input name="changes[]" class="textField" class="textField" type="text" size="50" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['value'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
			<?php endif; ?>
		</td>
		<td>
			<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'deleteLocaleKey','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped'], $this->_tpl_vars['key']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped'], $this->_tpl_vars['key']))), $this);?>
" onclick='if (confirm("<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.confirmDelete",'filename' => $this->_tpl_vars['filename']), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript'));?>
")) <?php echo '{document.locale.redirectUrl.value=this.href;this.href="javascript:document.locale.submit()";return true;} else {return false;}'; ?>
' class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
</a>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="<?php if ($this->_tpl_vars['localeContents']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['localeContents']->wasEmpty()): ?>
	<tr>
		<td colspan="3" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="3" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['localeContents']), $this);?>
</td>
		<td colspan="2" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('all_extra' => "onclick=\"document.locale.redirectUrl.value=this.href;this.href='javascript:document.locale.submit()';return true;\"",'anchor' => 'localeContents','name' => 'localeContents','iterator' => $this->_tpl_vars['localeContents']), $this);?>
</td>
	</tr>
<?php endif; ?>

</table>

<?php if ($this->_tpl_vars['localeContents']->getPage() < $this->_tpl_vars['localeContents']->getPageCount()): ?>
	<input type="submit" onclick="document.locale.redirectUrl.value='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editLocaleFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped'])),'localeContentsPage' => $this->_tpl_vars['localeContents']->getPage()+1,'escape' => 'false'), $this);?>
';return true;" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.saveAndContinue"), $this);?>
" />
<?php else: ?>
	<input type="submit" onclick="document.locale.redirectUrl.value='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editLocaleFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped'])),'localeContentsPage' => $this->_tpl_vars['localeContents']->getPage(),'escape' => 'false'), $this);?>
';return true;" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" />
<?php endif; ?>

<input type="submit" onclick="document.locale.redirectUrl.value='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'edit','path' => $this->_tpl_vars['locale'],'escape' => 'false'), $this);?>
';return true;" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.done"), $this);?>
" />

<input type="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'edit','path' => $this->_tpl_vars['locale'],'escape' => 'false'), $this);?>
';" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" />
</div>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>