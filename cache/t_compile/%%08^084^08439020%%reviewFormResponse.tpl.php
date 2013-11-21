<?php /* Smarty version 2.6.26, created on 2013-11-19 01:06:00
         compiled from submission/reviewForm/reviewFormResponse.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'submission/reviewForm/reviewFormResponse.tpl', 14, false),array('function', 'url', 'submission/reviewForm/reviewFormResponse.tpl', 29, false),array('modifier', 'assign', 'submission/reviewForm/reviewFormResponse.tpl', 14, false),array('modifier', 'to_array', 'submission/reviewForm/reviewFormResponse.tpl', 29, false),array('modifier', 'escape', 'submission/reviewForm/reviewFormResponse.tpl', 34, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['editorPreview']): ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "submission/comment/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php else: ?><?php echo ''; ?><?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.reviewFormResponse"), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'pageTitleTranslated') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'pageTitleTranslated'));?><?php echo ''; ?><?php $this->assign('pageCrumbTitle', "submission.reviewFormResponse"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?>


<?php $this->assign('disabled', 0); ?>
<?php if ($this->_tpl_vars['isLocked'] || $this->_tpl_vars['editorPreview']): ?>
	<?php $this->assign('disabled', 1); ?>
<?php endif; ?>
<div id="reviewFormResponse">
<h3><?php echo $this->_tpl_vars['reviewForm']->getLocalizedTitle(); ?>
</h3>
<p><?php echo $this->_tpl_vars['reviewForm']->getLocalizedDescription(); ?>
</p>

<form name="saveReviewFormResponse" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveReviewFormResponse','path' => ((is_array($_tmp=$this->_tpl_vars['reviewId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['reviewForm']->getId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['reviewForm']->getId()))), $this);?>
">
	<?php $_from = $this->_tpl_vars['reviewFormElements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['reviewFormElements'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['reviewFormElements']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['elementId'] => $this->_tpl_vars['reviewFormElement']):
        $this->_foreach['reviewFormElements']['iteration']++;
?>
		<p><?php echo $this->_tpl_vars['reviewFormElement']->getLocalizedQuestion(); ?>
 <?php if ($this->_tpl_vars['reviewFormElement']->getRequired() == 1): ?>*<?php endif; ?></p>
		<p>
			<?php if ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_SMALL_TEXT_FIELD): ?>
				<input <?php if ($this->_tpl_vars['disabled']): ?>onkeypress="return ((event.keyCode >= 37 && event.keyCode <= 40) || event.charCode == 99);" <?php endif; ?>type="text" name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="10" maxlength="40" class="textField" />
			<?php elseif ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_TEXT_FIELD): ?>
				<input <?php if ($this->_tpl_vars['disabled']): ?>onkeypress="return ((event.keyCode >= 37 && event.keyCode <= 40) || event.charCode == 99);" <?php endif; ?>type="text" name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="40" maxlength="120" class="textField" />
			<?php elseif ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_TEXTAREA): ?>
				<textarea <?php if ($this->_tpl_vars['disabled']): ?>onkeypress="return ((event.keyCode >= 37 && event.keyCode <= 40) || event.charCode == 99);" <?php endif; ?>name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
" rows="4" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea>
			<?php elseif ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_CHECKBOXES): ?>
				<?php $this->assign('possibleResponses', $this->_tpl_vars['reviewFormElement']->getLocalizedPossibleResponses()); ?>
				<?php $_from = $this->_tpl_vars['possibleResponses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['responses'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['responses']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['responseId'] => $this->_tpl_vars['responseItem']):
        $this->_foreach['responses']['iteration']++;
?>
					<input <?php if ($this->_tpl_vars['disabled']): ?>disabled="disabled" <?php endif; ?>type="checkbox" name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
][]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
-<?php echo $this->_foreach['responses']['iteration']; ?>
" value="<?php echo $this->_foreach['responses']['iteration']; ?>
"<?php if (! empty ( $this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']] ) && in_array ( $this->_foreach['responses']['iteration'] , $this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']] )): ?> checked="checked"<?php endif; ?> /><label for="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
-<?php echo $this->_foreach['responses']['iteration']; ?>
"><?php echo $this->_tpl_vars['responseItem']['content']; ?>
</label><br/>
				<?php endforeach; endif; unset($_from); ?>
			<?php elseif ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_RADIO_BUTTONS): ?>
				<?php $this->assign('possibleResponses', $this->_tpl_vars['reviewFormElement']->getLocalizedPossibleResponses()); ?>
				<?php $_from = $this->_tpl_vars['possibleResponses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['responses'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['responses']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['responseId'] => $this->_tpl_vars['responseItem']):
        $this->_foreach['responses']['iteration']++;
?>
					<input <?php if ($this->_tpl_vars['disabled']): ?>disabled="disabled" <?php endif; ?>type="radio"  name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
-<?php echo $this->_foreach['responses']['iteration']; ?>
" value="<?php echo $this->_foreach['responses']['iteration']; ?>
"<?php if ($this->_foreach['responses']['iteration'] == $this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']]): ?> checked="checked"<?php endif; ?>/><label for="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
-<?php echo $this->_foreach['responses']['iteration']; ?>
"><?php echo $this->_tpl_vars['responseItem']['content']; ?>
</label><br/>
				<?php endforeach; endif; unset($_from); ?>
			<?php elseif ($this->_tpl_vars['reviewFormElement']->getElementType() == REVIEW_FORM_ELEMENT_TYPE_DROP_DOWN_BOX): ?>
				<select <?php if ($this->_tpl_vars['disabled']): ?>disabled="disabled" <?php endif; ?>name="reviewFormResponses[<?php echo $this->_tpl_vars['elementId']; ?>
]" id="reviewFormResponses-<?php echo $this->_tpl_vars['elementId']; ?>
" size="1" class="selectMenu">
					<option label="" value=""></option>
					<?php $this->assign('possibleResponses', $this->_tpl_vars['reviewFormElement']->getLocalizedPossibleResponses()); ?>
					<?php $_from = $this->_tpl_vars['possibleResponses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['responses'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['responses']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['responseId'] => $this->_tpl_vars['responseItem']):
        $this->_foreach['responses']['iteration']++;
?>
						<option label="<?php echo $this->_tpl_vars['responseItem']['content']; ?>
" value="<?php echo $this->_foreach['responses']['iteration']; ?>
"<?php if ($this->_foreach['responses']['iteration'] == $this->_tpl_vars['reviewFormResponses'][$this->_tpl_vars['elementId']]): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['responseItem']['content']; ?>
</option>
					<?php endforeach; endif; unset($_from); ?>
				</select>
			<?php endif; ?>
		</p>
	<?php endforeach; endif; unset($_from); ?>

	<br />

	<?php if ($this->_tpl_vars['editorPreview']): ?>
		<p><input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.close"), $this);?>
" class="button defaultButton" onclick="window.close()" /></p>
	<?php else: ?>
		<p><input <?php if ($this->_tpl_vars['disabled']): ?>disabled="disabled" <?php endif; ?>type="submit" name="save" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.close"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['reviewId']), $this);?>
'" /></p>
	<?php endif; ?>

	<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>

</form>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
