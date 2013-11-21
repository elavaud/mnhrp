<?php /* Smarty version 2.6.26, created on 2013-11-20 11:44:11
         compiled from sectionEditor/createExternalReviewerForm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'sectionEditor/createExternalReviewerForm.tpl', 24, false),array('modifier', 'to_array', 'sectionEditor/createExternalReviewerForm.tpl', 33, false),array('modifier', 'assign', 'sectionEditor/createExternalReviewerForm.tpl', 67, false),array('modifier', 'urldecode', 'sectionEditor/createExternalReviewerForm.tpl', 142, false),array('function', 'url', 'sectionEditor/createExternalReviewerForm.tpl', 33, false),array('function', 'translate', 'sectionEditor/createExternalReviewerForm.tpl', 45, false),array('function', 'fieldLabel', 'sectionEditor/createExternalReviewerForm.tpl', 65, false),array('function', 'form_language_chooser', 'sectionEditor/createExternalReviewerForm.tpl', 68, false),array('function', 'html_options_translate', 'sectionEditor/createExternalReviewerForm.tpl', 99, false),array('function', 'html_options', 'sectionEditor/createExternalReviewerForm.tpl', 159, false),)), $this); ?>
<?php echo ''; ?><?php echo ''; ?><?php $this->assign('pageTitle', "sectionEditor.review.createExternalReviewer"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php echo '
<script type="text/javascript">
	$(document).ready(function(){
		$("#interestsTextOnly").hide();
		$("#interests").tagit({
			'; ?>
<?php if ($this->_tpl_vars['existingInterests']): ?><?php echo '
			// This is the list of interests in the system used to populate the autocomplete
			availableTags: ['; ?>
<?php $_from = $this->_tpl_vars['existingInterests']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['existingInterests'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['existingInterests']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['interest']):
        $this->_foreach['existingInterests']['iteration']++;
?>"<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['interest'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript')); ?>
"<?php if (! ($this->_foreach['existingInterests']['iteration'] == $this->_foreach['existingInterests']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php echo '],'; ?>
<?php endif; ?>
			// This is the list of the user's interests that have already been saved
			<?php if ($this->_tpl_vars['interestsKeywords']): ?><?php echo 'currentTags: ['; ?>
<?php $_from = $this->_tpl_vars['interestsKeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['currentInterests'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['currentInterests']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['interest']):
        $this->_foreach['currentInterests']['iteration']++;
?>"<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['interest'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript')); ?>
"<?php if (! ($this->_foreach['currentInterests']['iteration'] == $this->_foreach['currentInterests']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?><?php echo ']'; ?>

			<?php else: ?><?php echo 'currentTags: []'; ?>
<?php endif; ?><?php echo '
		});
	});
</script>
'; ?>


<form method="post" name="reviewerForm" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createExternalReviewer','path' => ((is_array($_tmp=$this->_tpl_vars['sectionId'])) ? $this->_run_mod_handler('to_array', true, $_tmp, 'create') : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, 'create'))), $this);?>
">

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/formErrors.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<script type="text/javascript">
<?php echo '
// <!--

	function generateUsername() {
		var req = makeAsyncRequest();

		if (document.reviewerForm.lastName.value == "") {
			alert("'; ?>
<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.mustProvideName"), $this);?>
<?php echo '");
			return;
		}

		req.onreadystatechange = function() {
			if (req.readyState == 4) {
				document.reviewerForm.username.value = req.responseText;
			}
		}
		sendAsyncRequest(req, \''; ?>
<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'suggestUsername','firstName' => 'REPLACE1','lastName' => 'REPLACE2','escape' => false), $this);?>
<?php echo '\'.replace(\'REPLACE1\', escape(document.reviewerForm.firstName.value)).replace(\'REPLACE2\', escape(document.reviewerForm.lastName.value)), null, \'get\');
	}


// -->
'; ?>

</script>
<div id="createReviewerForm">
<table width="100%" class="data">
<?php if (count ( $this->_tpl_vars['formLocales'] ) > 1): ?>
	<tr valign="top">
		<td width="20%" class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'formLocale','key' => "form.formLanguage"), $this);?>
</td>
		<td width="80%" class="value">
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createReviewer','escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'createReviewerUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'createReviewerUrl'));?>

			<?php echo $this->_plugins['function']['form_language_chooser'][0][0]->smartyFormLanguageChooser(array('form' => 'reviewerForm','url' => $this->_tpl_vars['createReviewerUrl']), $this);?>

			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "form.formLanguage.description"), $this);?>
</span>
		</td>
	</tr>
<?php endif; ?>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'salutation','key' => "user.salutation"), $this);?>
</td>
		<td class="value"><input type="text" name="salutation" id="salutation" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['salutation'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'firstName','required' => 'true','key' => "user.firstName"), $this);?>
</td>
		<td class="value"><input type="text" name="firstName" id="firstName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['firstName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'middleName','key' => "user.middleName"), $this);?>
</td>
		<td class="value"><input type="text" name="middleName" id="middleName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['middleName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="40" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'lastName','required' => 'true','key' => "user.lastName"), $this);?>
</td>
		<td class="value"><input type="text" name="lastName" id="lastName" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['lastName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="90" class="textField" /></td>
	</tr>
	<!--
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'initials','key' => "user.initials"), $this);?>
</td>
		<td class="value"><input type="text" name="initials" id="initials" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['initials'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="5" maxlength="5" class="textField" />&nbsp;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.initialsExample"), $this);?>
</td>
	</tr>
	-->
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'gender','key' => "user.gender"), $this);?>
</td>
		<td class="value">
			<select name="gender" id="gender" size="1" class="selectMenu">
				<?php echo $this->_plugins['function']['html_options_translate'][0][0]->smartyHtmlOptionsTranslate(array('options' => $this->_tpl_vars['genderOptions'],'selected' => $this->_tpl_vars['gender']), $this);?>

			</select>
		</td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'username','required' => 'true','key' => "user.username"), $this);?>
</td>
		<td class="value">
			<input type="text" name="username" id="username" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['username'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="20" maxlength="32" class="textField" />&nbsp;&nbsp;<input type="button" class="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.suggest"), $this);?>
" onclick="generateUsername()" />
			<br />
			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.register.usernameRestriction"), $this);?>
</span>
		</td>
	</tr>
	<tr valign="top">
		<td class="label">&nbsp;</td>
		<td class="value"><input type="checkbox" name="sendNotify" id="sendNotify" value="1"<?php if ($this->_tpl_vars['sendNotify']): ?> checked="checked"<?php endif; ?> /> <label for="sendNotify"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.createUserSendNotify"), $this);?>
</label></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'affiliation','key' => "user.affiliation"), $this);?>
</td>
		<td class="value">
			<textarea name="affiliation[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="affiliation" rows="5" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['affiliation'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea><br/>
			<span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.affiliation.description"), $this);?>
</span>
		</td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'email','required' => 'true','key' => "user.email"), $this);?>
</td>
		<td class="value"><input type="text" name="email" id="email" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['email'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="90" class="textField" /></td>
	</tr>
	<!--
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'userUrl','key' => "user.url"), $this);?>
</td>
		<td class="value"><input type="text" name="userUrl" id="userUrl" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['userUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="30" maxlength="255" class="textField" /></td>
	</tr>
	-->
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'phone','key' => "user.phone"), $this);?>
</td>
		<td class="value"><input type="text" name="phone" id="phone" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['phone'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="24" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'fax','key' => "user.fax"), $this);?>
</td>
		<td class="value"><input type="text" name="fax" id="fax" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['fax'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" size="15" maxlength="24" class="textField" /></td>
	</tr>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('for' => 'interests','key' => "user.interests"), $this);?>
</td>
		<td class="value"><ul id="interests"><li></li></ul><textarea name="interests" id="interestsTextOnly" rows="5" cols="40" class="textArea"><?php $_from = $this->_tpl_vars['interestsKeywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['currentInterests'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['currentInterests']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['interest']):
        $this->_foreach['currentInterests']['iteration']++;
?><?php echo ((is_array($_tmp=$this->_tpl_vars['interest'])) ? $this->_run_mod_handler('urldecode', true, $_tmp) : urldecode($_tmp)); ?>
<?php if (! ($this->_foreach['currentInterests']['iteration'] == $this->_foreach['currentInterests']['total'])): ?>, <?php endif; ?><?php endforeach; endif; unset($_from); ?></textarea><span class="instruct"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.interests.description"), $this);?>
</span></td>
	</tr>
	<!--
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'gossip','key' => "user.gossip"), $this);?>
</td>
		<td class="value"><textarea name="gossip[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="gossip" rows="3" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['gossip'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
	</tr>
	-->
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'mailingAddress','key' => "common.mailingAddress"), $this);?>
</td>
		<td class="value"><textarea name="mailingAddress" id="mailingAddress" rows="3" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['mailingAddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
	</tr>
<tr valign="top">
	<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'country','key' => "common.country"), $this);?>
</td>
	<td class="value">
		<select name="country" id="country" class="selectMenu">
			<option value=""></option>
			<?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['countries'],'selected' => $this->_tpl_vars['country']), $this);?>

		</select>
	</td>
</tr>
	<!--
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['fieldLabel'][0][0]->smartyFieldLabel(array('name' => 'biography','key' => "user.biography"), $this);?>
<br /><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.biography.description"), $this);?>
</td>
		<td class="value"><textarea name="biography[<?php echo ((is_array($_tmp=$this->_tpl_vars['formLocale'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
]" id="biography" rows="5" cols="40" class="textArea"><?php echo ((is_array($_tmp=$this->_tpl_vars['biography'][$this->_tpl_vars['formLocale']])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</textarea></td>
	</tr>
	<?php if (count ( $this->_tpl_vars['availableLocales'] ) > 1): ?>
	<tr valign="top">
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.workingLanguages"), $this);?>
</td>
		<td><?php $_from = $this->_tpl_vars['availableLocales']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['localeKey'] => $this->_tpl_vars['localeName']):
?>
			<input type="checkbox" name="userLocales[]" id="userLocales-<?php echo ((is_array($_tmp=$this->_tpl_vars['localeKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['localeKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"<?php if ($this->_tpl_vars['userLocales'] && in_array ( $this->_tpl_vars['localeKey'] , $this->_tpl_vars['userLocales'] )): ?> checked="checked"<?php endif; ?> /> <label for="userLocales-<?php echo ((is_array($_tmp=$this->_tpl_vars['localeKey'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['localeName'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</label><br />
		<?php endforeach; endif; unset($_from); ?></td>
	</tr>
	<?php endif; ?>
	-->
</table>

<p><input type="submit" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.save"), $this);?>
" class="button defaultButton" /> <input type="button" value="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.cancel"), $this);?>
" class="button" onclick="document.location.href='<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'section','path' => $this->_tpl_vars['sectionId'],'escape' => false), $this);?>
'" /></p>

<p><span class="formRequired"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.requiredField"), $this);?>
</span></p>
</div>
</form>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
