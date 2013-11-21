<?php /* Smarty version 2.6.26, created on 2013-11-18 00:44:59
         compiled from author/submit/step4.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submit/step4.tpl', 20, false),array('function', 'url', 'author/submit/step4.tpl', 55, false),array('function', 'html_options_translate', 'author/submit/step4.tpl', 96, false),array('function', 'get_help_id', 'author/submit/step4.tpl', 111, false),array('modifier', 'escape', 'author/submit/step4.tpl', 56, false),array('modifier', 'date_format', 'author/submit/step4.tpl', 78, false),)), $this); ?>
<?php $this->assign('pageTitle', "author.submit.step4"); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "author/submit/submitHeader.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php echo '
<script type="text/javascript">
<!--
function confirmForgottenUpload() {
	var fieldValue = document.submitForm.uploadSuppFile.value;
	if (fieldValue) {
		return confirm("'; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.forgottenSubmitSuppFile"), $this);?>
<?php echo '");
	}
	return true;
}
// -->

function checkSize(){
	var fileToUpload = document.getElementById(\'uploadSuppFile\');
	var check = fileToUpload.files[0].fileSize;
	var valueInKb = Math.ceil(check/1024);
	if (check > 5242880){
		alert (\''; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileTooBig1"), $this);?>
<?php echo '\'+valueInKb+\''; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.fileTooBig2"), $this);?>
<?php echo '5 Mb.\');
		return false
	}
}

$(document).ready(function() {
   $(\'#fileType\').change(function(){
        var isOtherSelected = false;
        $.each($(\'#fileType\').val(), function(key, value){
            if(value == "'; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.other"), $this);?>
<?php echo '") {
                isOtherSelected = true;
            }
        });
        if(isOtherSelected) {
            $(\'#divOtherFileType\').show();
        } else {
            $(\'#divOtherFileType\').hide();
        }
    });
});

</script>
'; ?>


<form name="submitForm" method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'saveSubmit','path' => $this->_tpl_vars['submitStep']), $this);?>
" onSubmit="return checkSize()" enctype="multipart/form-data">
<input type="hidden" name="articleId" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['articleId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<p><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.supplementaryFilesInstructions"), $this);?>
</p>

<table class="listing" width="100%">
<tr>
	<td colspan="5" class="headseparator">&nbsp;</td>
</tr>
<tr class="heading" valign="bottom">
	<td width="40%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.title"), $this);?>
</td>
	<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.originalFileName"), $this);?>
</td>
	<td width="15%" class="nowrap"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateUploaded"), $this);?>
</td>
	<td width="15%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
</tr>
<tr>
	<td colspan="6" class="headseparator">&nbsp;</td>
</tr>
<?php $_from = $this->_tpl_vars['suppFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
<tr valign="top">
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getSuppFileTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getOriginalFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['file']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatTrunc']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatTrunc'])); ?>
</td>
	<td align="right">
            <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'deleteSubmitSuppFile','path' => $this->_tpl_vars['file']->getSuppFileId(),'articleId' => $this->_tpl_vars['articleId']), $this);?>
" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.confirmDeleteSuppFile"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.delete"), $this);?>
</a></td>
</tr>
<?php endforeach; else: ?>
<tr valign="top">
	<td colspan="6" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.noSupplementaryFiles"), $this);?>
</td>
</tr>
<?php endif; unset($_from); ?>
</table>

<div class="separator"></div>

<table class="data" width="100%">
<tr>
	<td width="30%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.suppFileInstruct"), $this);?>
</td>
	<td width="35%" class="value">
    	<select name="fileType[]" id="fileType" multiple="multiple" size="8" class="selectMenu">
        	<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['typeOptions'],'translateValues' => 'true','selected' => $this->_tpl_vars['fileType']), $this);?>

        </select>
    </td>
    <td style="vertical-align: bottom;">
    	<div id="divOtherFileType" style="display: none;">
        	<span class="label" style="font-style: italic;"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.suppFileSpecify"), $this);?>
</span> <br />
        	<input type="text" name="otherFileType" id="otherFileType" size="20" /> <br />
    	</div>
    </td>
</tr>
<tr>
        <td width="30%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.suppFileUploadInstruct"), $this);?>
</td>
        <td width="70%" class="value" colspan="2">
                <input type="file" name="uploadSuppFile" id="uploadSuppFile"  class="uploadField" />
                <input name="submitUploadSuppFile" type="submit" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.upload"), $this);?>
" /> 
		<?php if ($this->_tpl_vars['currentJournal']->getSetting('showEnsuringLink')): ?><a class="action" href="javascript:openHelp('<?php echo $this->_plugins['function']['get_help_id'][0][0]->smartyGetHelpId(array('key' => "editorial.sectionEditorsRole.review.blindPeerReview",'url' => 'true'), $this);?>
')"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.article.ensuringBlindReview"), $this);?>
</a><?php endif; ?>
	</td>
</tr>
</table>

<div class="separator"></div>

<p><input type="submit" onclick="return confirmForgottenUpload()" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.saveAndContinue"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="confirmAction('<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'author'), $this);?>
', '<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.cancelSubmission"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" /></p>

</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
