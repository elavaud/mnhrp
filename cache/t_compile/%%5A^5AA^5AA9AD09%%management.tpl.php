<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:36
         compiled from sectionEditor/submission/management.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/submission/management.tpl', 12, false),array('function', 'url', 'sectionEditor/submission/management.tpl', 31, false),array('function', 'icon', 'sectionEditor/submission/management.tpl', 67, false),array('modifier', 'escape', 'sectionEditor/submission/management.tpl', 17, false),array('modifier', 'strip_unsafe_html', 'sectionEditor/submission/management.tpl', 25, false),array('modifier', 'to_array', 'sectionEditor/submission/management.tpl', 31, false),array('modifier', 'concat', 'sectionEditor/submission/management.tpl', 65, false),array('modifier', 'strip_tags', 'sectionEditor/submission/management.tpl', 66, false),array('modifier', 'assign', 'sectionEditor/submission/management.tpl', 66, false),array('modifier', 'date_format', 'sectionEditor/submission/management.tpl', 72, false),array('modifier', 'nl2br', 'sectionEditor/submission/management.tpl', 78, false),)), $this); ?>
<div id="submission">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.submission"), $this);?>
</h3>

<table width="100%" class="data">
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authorInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.authors"), $this);?>
</td>
		<td width="80%" colspan="2" class="data"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
        <tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.idInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
		<td width="80%" colspan="2" class="data"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getLocalizedProposalId())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "proposal.scientificTitleInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.title"), $this);?>
</td>
		<td width="80%" colspan="2" class="data"><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)); ?>
</td>
	</tr>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.originalFileInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.originalFile"), $this);?>
</td>
		<td width="80%" colspan="2" class="data">
			<?php if ($this->_tpl_vars['submissionFile']): ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getArticleId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['submissionFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['submissionFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['submissionFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
			<?php else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; ?>
		</td>
	</tr>
	<?php if (count ( $this->_tpl_vars['previousFiles'] ) > 1): ?>
	<?php $this->assign('count', 0); ?>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.previousProposalFileInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.previousProposalFile"), $this);?>
</td>
		<td width="80%" class="value">
			<?php $_from = $this->_tpl_vars['previousFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['previousFiles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['previousFiles']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['previousFile']):
        $this->_foreach['previousFiles']['iteration']++;
?>
				<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
				<?php if ($this->_tpl_vars['count'] > 1): ?>
            		<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getArticleId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['previousFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['previousFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['previousFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a><br />
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
		</td>
	</tr>
	<?php endif; ?>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.suppFilesAbbrevInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.suppFilesAbbrev"), $this);?>
</td>
		<td width="80%" class="value">
			<?php $_from = $this->_tpl_vars['suppFiles']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['suppFiles'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['suppFiles']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['suppFile']):
        $this->_foreach['suppFiles']['iteration']++;
?>
                <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'downloadFile','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getArticleId())) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['suppFile']->getFileId()) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['suppFile']->getFileId()))), $this);?>
" class="file"><?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getFileName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>&nbsp;&nbsp;(<?php echo ((is_array($_tmp=$this->_tpl_vars['suppFile']->getType())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
)<br />
			<?php endforeach; else: ?>
				<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.none"), $this);?>

			<?php endif; unset($_from); ?>
		</td> 
	</tr>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.submitterInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.submitter"), $this);?>
</td>
		<td colspan="2" class="value">
			<?php $this->assign('submitter', $this->_tpl_vars['submission']->getUser()); ?>
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['submitter']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['submitter']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['submitter']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'redirectUrl' => $this->_tpl_vars['currentUrl'],'subject' => ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('strip_tags', true, $_tmp) : smarty_modifier_strip_tags($_tmp)),'articleId' => $this->_tpl_vars['submission']->getArticleId()), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=$this->_tpl_vars['submitter']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
 <?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
	</tr>
	<tr>
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateSubmittedInstruct"), $this);?>
" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.dateSubmitted"), $this);?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['datetimeFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['datetimeFormatLong'])); ?>
</td>
	</tr>
	
	<?php if ($this->_tpl_vars['submission']->getCommentsToEditor()): ?>
	<tr valign="top">
		<td title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.commentsToEditorInstruct"), $this);?>
" width="20%" class="label">[?] <?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.commentsToEditor"), $this);?>
</td>
		<td width="80%" colspan="2" class="data"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getCommentsToEditor())) ? $this->_run_mod_handler('strip_unsafe_html', true, $_tmp) : String::stripUnsafeHtml($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>
</td>
	</tr>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['publishedArticle']): ?>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.abstractViews"), $this);?>
</td>
		<td><?php echo $this->_tpl_vars['publishedArticle']->getViews(); ?>
</td>
	</tr>
	<?php endif; ?>
</table>
</div>
