<?php /* Smarty version 2.6.26, created on 2013-11-19 01:11:37
         compiled from author/ongoingResearches.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/ongoingResearches.tpl', 12, false),array('function', 'sort_heading', 'author/ongoingResearches.tpl', 13, false),array('function', 'url', 'author/ongoingResearches.tpl', 26, false),array('function', 'page_info', 'author/ongoingResearches.tpl', 51, false),array('function', 'page_links', 'author/ongoingResearches.tpl', 52, false),array('block', 'iterate', 'author/ongoingResearches.tpl', 19, false),array('modifier', 'escape', 'author/ongoingResearches.tpl', 24, false),array('modifier', 'date_format', 'author/ongoingResearches.tpl', 25, false),)), $this); ?>

<div id="submissions">
<table class="listing" width="100%">
	<tr class="heading" valign="bottom">
		<td width="10%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
		<td width="10%"><span class="disabled"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<td width="50%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<td width="30%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr><td colspan="4" class="headseparator">&nbsp;</td></tr>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'submissions','item' => 'submission')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
	<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
    <?php $this->assign('proposalId', $this->_tpl_vars['submission']->getLocalizedProposalId()); ?>
        <tr valign="top">
            <td><?php if ($this->_tpl_vars['proposalId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['proposalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
            <td><?php if ($this->_tpl_vars['submission']->getDateSubmitted()): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
<?php else: ?>&mdash;<?php endif; ?></td>                
            <td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submission','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action"><?php if ($this->_tpl_vars['abstract']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.untitled"), $this);?>
<?php endif; ?></a></td>
            <td align="right">
                <?php if ($this->_tpl_vars['submission']->isSubmissionDue()): ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'addExtensionRequest','path' => $this->_tpl_vars['articleId']), $this);?>
" title="<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submitExtensionRequestInstruct"), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submitExtensionRequest.short"), $this);?>
 &#8226;</a><br />
                <?php endif; ?>
                <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'addProgressReport','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action")><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submitInterimProgressReport.short"), $this);?>
 &#8226;</a><br />
                <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'addCompletionReport','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "author.submit.submitFinalReport.short"), $this);?>
 &#8226;</a><br />
                Adverse Events &#8226;<br />
                Protocol Amendment &#8226;<br />
                <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'withdrawSubmission','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.withdraw"), $this);?>
 &#8226;</a><br />            
            </td>
        </tr>
        <tr>
        	<td colspan="4" class="<?php if ($this->_tpl_vars['submissions']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
        </tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['submissions']->wasEmpty()): ?>
	<tr>
		<td colspan="4" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="2" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['submissions']), $this);?>
</td>
		<td colspan="2" align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'submissions','name' => 'submissions','iterator' => $this->_tpl_vars['submissions'],'sort' => $this->_tpl_vars['sort'],'sortDirection' => $this->_tpl_vars['sortDirection']), $this);?>
</td>
	</tr>
<?php endif; ?>
</table>
</div>