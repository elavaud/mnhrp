<?php /* Smarty version 2.6.26, created on 2013-11-19 00:58:01
         compiled from manager/sections/sectionForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'manager/sections/sectionForm.tpl', 18, false),array('function', 'fieldLabel', 'manager/sections/sectionForm.tpl', 28, false),array('function', 'form_language_chooser', 'manager/sections/sectionForm.tpl', 33, false),array('function', 'translate', 'manager/sections/sectionForm.tpl', 34, false),array('function', 'html_options', 'manager/sections/sectionForm.tpl', 53, false),array('modifier', 'assign', 'manager/sections/sectionForm.tpl', 30, false),array('modifier', 'escape', 'manager/sections/sectionForm.tpl', 40, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "section.section"); ?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "section.section"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<form name="section" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'updateSection','path' => $this->_tpl_vars['sectionId']), $this);?>
">
<input type="hidden" name="editorAction" value="" />
<input type="hidden" name="userId" value="" />


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="sectionForm">
<table class="data" width="100%">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php if ($this->_tpl_vars['sectionId']): ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editSection','path' => $this->_tpl_vars['sectionId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'sectionFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'sectionFormUrl'));?>

			<?php else: ?><?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createSection','path' => $this->_tpl_vars['sectionId'],'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'sectionFormUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'sectionFormUrl'));?>

			<?php endif; ?>
			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'section','url' => $this->_tpl_vars['sectionFormUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'title','required' => 'true','key' => "section.title"), $this);?>
</td>
	<td width="80%" class="value"><input type="text" name="title[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['title'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" id="title" size="40" maxlength="120" class="textField" /></td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'abbrev','required' => 'true','key' => "section.abbreviation"), $this);?>
</td>
	<td class="value"><input type="text" name="abbrev[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="abbrev" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['abbrev'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="20" class="textField" />&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "section.abbreviation.example"), $this);?>
</td>
</tr>
<!-- Requesting the region -->
<!-- EL on February 11th 2013 -->
<tr valign="top">
	<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'region','required' => 'true','key' => "section.region"), $this);?>
</td>
    <td width="80%" class="value">
		<select name="region[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="region" class="selectMenu">
        	<option value=""></option>
				<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['regions'],'selected' => $this->_tpl_vars['region'][$this->_tpl_vars['formLocale']]), $this);?>

        </select>
    </td>
</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'reviewFormId','key' => "submission.reviewForm"), $this);?>
</td>
	<td class="value">
		<select name="reviewFormId" size="1" id="reviewFormId" class="selectMenu">
			<option value=""><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.reviewForms.noneChosen"), $this);?>
</option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['reviewFormOptions'],'selected' => $this->_tpl_vars['reviewFormId']), $this);?>

		</select>
	</td>
</tr>

</table>
</div>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'sections','escape' => false), $this);?>
'" /></p>

</form>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
