<?php /* Smarty version 2.6.26, created on 2013-11-19 15:47:11
         compiled from sectionEditor/submissionsArchives.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/submissionsArchives.tpl', 15, false),array('function', 'sort_heading', 'sectionEditor/submissionsArchives.tpl', 16, false),array('function', 'url', 'sectionEditor/submissionsArchives.tpl', 32, false),array('function', 'page_info', 'sectionEditor/submissionsArchives.tpl', 56, false),array('function', 'page_links', 'sectionEditor/submissionsArchives.tpl', 57, false),array('block', 'iterate', 'sectionEditor/submissionsArchives.tpl', 24, false),array('modifier', 'escape', 'sectionEditor/submissionsArchives.tpl', 29, false),array('modifier', 'date_format', 'sectionEditor/submissionsArchives.tpl', 30, false),array('modifier', 'truncate', 'sectionEditor/submissionsArchives.tpl', 31, false),)), $this); ?>
<div id="submissions">
<table class="listing" width="100%">
	<tr><td class="headseparator" colspan="<?php if ($this->_tpl_vars['statViews']): ?>7<?php else: ?>6<?php endif; ?>">&nbsp;</td></tr>
	<tr valign="bottom" class="heading">
		<td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
		<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<td width="23%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.authors",'sort' => 'authors'), $this);?>
</td>
		<td width="32%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<?php if ($this->_tpl_vars['statViews']): ?><td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submission.views",'sort' => 'views'), $this);?>
</td><?php endif; ?>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'status'), $this);?>
</td>
	</tr>
	<tr><td colspan="6" class="headseparator">&nbsp;</td></tr>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'submissions','item' => 'submission')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
	<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
    <?php $this->assign('proposalId', $this->_tpl_vars['submission']->getProposalId($this->_tpl_vars['submission']->getLocale())); ?>
	<tr valign="top">
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['proposalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	   	<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor())) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->
        <td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
		<td align="right">
			<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
			<?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_ARCHIVED): ?>
				<?php $this->assign('statusKey', $this->_tpl_vars['submission']->getEditorDecisionKey()); ?>				
			<?php else: ?>
				<?php $this->assign('statusKey', $this->_tpl_vars['submission']->getProposalStatusKey()); ?>			
			<?php endif; ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['statusKey']), $this);?>

		</td>
	</tr>
	<tr>
		<td colspan="6" class="<?php if ($this->_tpl_vars['submissions']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['submissions']->wasEmpty()): ?>
	<tr>
		<td colspan="5" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.noSubmissions"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="5" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="5" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['submissions']), $this);?>
</td>
		<td align="right" colspan="2"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'submissions','name' => 'submissions','iterator' => $this->_tpl_vars['submissions'],'searchField' => $this->_tpl_vars['searchField'],'searchMatch' => $this->_tpl_vars['searchMatch'],'search' => $this->_tpl_vars['search'],'dateFromDay' => $this->_tpl_vars['dateFromDay'],'dateFromYear' => $this->_tpl_vars['dateFromYear'],'dateFromMonth' => $this->_tpl_vars['dateFromMonth'],'dateToDay' => $this->_tpl_vars['dateToDay'],'dateToYear' => $this->_tpl_vars['dateToYear'],'dateToMonth' => $this->_tpl_vars['dateToMonth'],'dateSearchField' => $this->_tpl_vars['dateSearchField'],'section' => $this->_tpl_vars['section'],'sort' => $this->_tpl_vars['sort'],'sortDirection' => $this->_tpl_vars['sortDirection']), $this);?>
</td>
	</tr>
<?php endif; ?>
		
</table>
</div>
