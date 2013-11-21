<?php /* Smarty version 2.6.26, created on 2013-11-21 13:46:28
         compiled from file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 16, false),array('function', 'url', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 37, false),array('function', 'page_info', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 54, false),array('function', 'page_links', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 55, false),array('block', 'iterate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 32, false),array('modifier', 'escape', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/index.tpl', 34, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "plugins.generic.translator.name"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.longdescription"), $this);?>
</p>
<?php if (! $this->_tpl_vars['tarAvailable']): ?>
	<p><span class="formError"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.tarMissing"), $this);?>
</span></p>
<?php endif; ?>

<div id="locales">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.availableLocales"), $this);?>
</h3>
<table class="listing" width="100%">
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="15%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeKey"), $this);?>
</td>
		<td width="60%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.localeName"), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr><td colspan="3" class="headseparator">&nbsp;</td></tr>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'locales','key' => 'localeKey','item' => 'localeName')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['localeKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['localeName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td>
			<?php if ($this->_tpl_vars['masterLocale'] != $this->_tpl_vars['localeKey']): ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'check','path' => $this->_tpl_vars['localeKey']), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.check"), $this);?>
</a>&nbsp;|&nbsp;<?php endif; ?><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'edit','path' => $this->_tpl_vars['localeKey']), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.edit"), $this);?>
</a><?php if ($this->_tpl_vars['tarAvailable']): ?>&nbsp;|&nbsp;<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'export','path' => $this->_tpl_vars['localeKey']), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.export"), $this);?>
</a><?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="3" class="<?php if ($this->_tpl_vars['locales']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

<?php if ($this->_tpl_vars['locales']->wasEmpty()): ?>
	<tr>
		<td colspan="3" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="3" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="2" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['locales']), $this);?>
</td>
		<td align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'locales','name' => 'locales','iterator' => $this->_tpl_vars['locales']), $this);?>
</td>
	</tr>
<?php endif; ?>

</table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>