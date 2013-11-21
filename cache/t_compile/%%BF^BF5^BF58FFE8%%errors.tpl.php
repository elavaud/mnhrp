<?php /* Smarty version 2.6.26, created on 2013-11-21 14:00:53
         compiled from file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 17, false),array('function', 'translate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 17, false),array('modifier', 'explode', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 48, false),array('modifier', 'count', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 48, false),array('modifier', 'escape', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 52, false),array('modifier', 'to_array', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 63, false),array('modifier', 'assign', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/generic/translator/errors.tpl', 63, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "plugins.generic.translator.errors"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'edit','path' => $this->_tpl_vars['locale']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.edit"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'check','path' => $this->_tpl_vars['locale']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.check"), $this);?>
</a></li>
</ul>

<br/>

<form action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveLocaleChanges','path' => $this->_tpl_vars['locale']), $this);?>
" method="post">
<input type="hidden" name="redirectUrl" value="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'translate'), $this);?>
" />

<?php if ($this->_tpl_vars['error']): ?>
	<div id="unwriteableFiles">
	<span class="formError"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.filesNotWriteable"), $this);?>
</span>
	<ul class="formErrorList">
		<?php $_from = $this->_tpl_vars['unwriteableFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unwriteableFile']):
?>
			<li><?php echo $this->_tpl_vars['unwriteableFile']; ?>
</li>
		<?php endforeach; endif; unset($_from); ?>
	</ul>
	</div>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['categoryErrors']):
?>
	<?php if (! empty ( $this->_tpl_vars['categoryErrors'] )): ?>
		<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.errors.".($this->_tpl_vars['type']).".title"), $this);?>
</h2>
		<ul>
	<?php endif; ?>
	<?php $this->assign('categoryCount', 0); ?>
	<?php $_from = $this->_tpl_vars['categoryErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
		<li>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.errors.".($this->_tpl_vars['type']).".message",'params' => $this->_tpl_vars['error']), $this);?>

			<?php $this->assign('defaultValue', $this->_tpl_vars['error']['reference']); ?>
			<?php if ($this->_tpl_vars['type'] == 'LOCALE_ERROR_DIFFERING_PARAMS'): ?>
				<?php $this->assign('wordCount', count(((is_array($_tmp=$this->_tpl_vars['error']['reference'])) ? $this->_run_mod_handler('explode', true, $_tmp, ' ') : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, ' ')))); ?>
				<?php $this->assign('categoryCount', $this->_tpl_vars['categoryCount']+$this->_tpl_vars['wordCount']); ?>
				<ul>
					<?php $_from = $this->_tpl_vars['error']['mismatch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['param']):
?>
						<li><?php echo ((is_array($_tmp=$this->_tpl_vars['param'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			<?php elseif ($this->_tpl_vars['type'] == 'LOCALE_ERROR_EXTRA_KEY'): ?>
				<br />
				<?php $this->assign('counter', $this->_tpl_vars['counter']+1); ?>
				<input type="checkbox" name="deleteKey[]" id="checkbox-<?php echo ((is_array($_tmp=$this->_tpl_vars['counter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error']['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url')); ?>
/<?php echo ((is_array($_tmp=$this->_tpl_vars['error']['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<label for="checkbox-<?php echo ((is_array($_tmp=$this->_tpl_vars['counter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.deleteKey"), $this);?>
</label>
			<?php elseif ($this->_tpl_vars['type'] == 'LOCALE_ERROR_MISSING_FILE'): ?>
				<?php $this->assign('filenameEscaped', ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error']['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url')))) ? $this->_run_mod_handler('escape', true, $_tmp, 'url') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'url'))); ?>
				<?php if (in_array ( $this->_tpl_vars['error']['filename'] , $this->_tpl_vars['localeFiles'] )): ?>
					<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editLocaleFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

				<?php else: ?>
					<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editMiscFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped']))), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

				<?php endif; ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createFile','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['filenameEscaped']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['filenameEscaped'])),'redirectUrl' => $this->_tpl_vars['redirectUrl']), $this);?>
" onclick='return confirm("<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.saveBeforeContinuing"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'quotes'));?>
")' class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.create"), $this);?>
</a>
			<?php else: ?>				<?php $this->assign('defaultValue', $this->_tpl_vars['error']['reference']); ?>
				<?php $this->assign('wordCount', count(((is_array($_tmp=$this->_tpl_vars['defaultValue'])) ? $this->_run_mod_handler('explode', true, $_tmp, ' ') : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, ' ')))); ?>
				<?php $this->assign('categoryCount', $this->_tpl_vars['categoryCount']+$this->_tpl_vars['wordCount']); ?>
				<input type="hidden" name="stack[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['error']['filename'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<input type="hidden" name="stack[]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['error']['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<br />
				<?php if (( count(((is_array($_tmp=$this->_tpl_vars['defaultValue'])) ? $this->_run_mod_handler('explode', true, $_tmp, "\n") : $this->_plugins['modifier']['explode'][0][0]->smartyExplode($_tmp, "\n"))) > 1 ) || ( strlen ( $this->_tpl_vars['defaultValue'] ) > 80 )): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.reference"), $this);?>
<br/>
					<textarea name="junk[]" class="textArea" cols="80" onkeypress="return (event.keyCode >= 37 && event.keyCode <= 40);" rows="5"><?php echo ((is_array($_tmp=$this->_tpl_vars['defaultValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea><br/>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.translation"), $this);?>
<br/>
					<textarea name="stack[]" class="textArea" cols="80" rows="5"></textarea>
				<?php else: ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.reference"), $this);?>
<br/>
					<input type="text" class="textField" name="junk[]" size="80" onkeypress="return (event.keyCode >= 37 && event.keyCode <= 40);" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['defaultValue'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" /><br/>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.file.translation"), $this);?>
<br/>
					<input type="text" class="textField" name="stack[]" size="80" value="" />
				<?php endif; ?>
				<br />&nbsp;
			<?php endif; ?>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
	<?php if ($this->_tpl_vars['categoryCount']): ?>
		&nbsp;&nbsp;&nbsp;&nbsp;(Total <?php echo ((is_array($_tmp=$this->_tpl_vars['categoryCount'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 Words)
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['emailErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['categoryErrors']):
?>
	<?php if (! empty ( $this->_tpl_vars['categoryErrors'] )): ?>
		<h2><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.errors.".($this->_tpl_vars['type']).".title"), $this);?>
</h2>
		<ul>
	<?php endif; ?>
	<?php $_from = $this->_tpl_vars['categoryErrors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['error']):
?>
		<li>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.errors.".($this->_tpl_vars['type']).".message",'params' => $this->_tpl_vars['error']), $this);?>

			<?php if ($this->_tpl_vars['type'] == 'EMAIL_ERROR_EXTRA_EMAIL'): ?>
				<br />
				<?php $this->assign('counter', $this->_tpl_vars['counter']+1); ?>
				<input type="checkbox" name="deleteEmail[]" id="checkbox-<?php echo ((is_array($_tmp=$this->_tpl_vars['counter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['error']['key'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
				<label for="checkbox-<?php echo ((is_array($_tmp=$this->_tpl_vars['counter'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.deleteEmail"), $this);?>
</label>
			<?php else: ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editEmail','path' => ((is_array($_tmp=$this->_tpl_vars['locale'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['error']['key']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['error']['key'])),'returnToCheck' => 1), $this);?>
" class="action" onclick='return confirm("<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "plugins.generic.translator.saveBeforeContinuing"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'quotes'));?>
")'><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.edit"), $this);?>
</a>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['type'] == 'EMAIL_ERROR_DIFFERING_PARAMS'): ?>
				<ul>
					<?php $_from = $this->_tpl_vars['error']['mismatch']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['param']):
?>
						<li><?php echo ((is_array($_tmp=$this->_tpl_vars['param'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</li>
					<?php endforeach; endif; unset($_from); ?>
				</ul>
			<?php endif; ?>
		</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
<?php endforeach; endif; unset($_from); ?>

<?php if (! empty ( $this->_tpl_vars['errors'] )): ?>
	<input type="submit" class="button defaultButton" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" />
<?php endif; ?>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>