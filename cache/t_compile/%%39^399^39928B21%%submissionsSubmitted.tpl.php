<?php /* Smarty version 2.6.26, created on 2013-11-18 00:46:34
         compiled from sectionEditor/submissionsSubmitted.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'sectionEditor/submissionsSubmitted.tpl', 16, false),array('function', 'sort_heading', 'sectionEditor/submissionsSubmitted.tpl', 17, false),array('function', 'url', 'sectionEditor/submissionsSubmitted.tpl', 35, false),array('function', 'page_info', 'sectionEditor/submissionsSubmitted.tpl', 78, false),array('function', 'page_links', 'sectionEditor/submissionsSubmitted.tpl', 79, false),array('block', 'iterate', 'sectionEditor/submissionsSubmitted.tpl', 25, false),array('modifier', 'escape', 'sectionEditor/submissionsSubmitted.tpl', 32, false),array('modifier', 'date_format', 'sectionEditor/submissionsSubmitted.tpl', 33, false),array('modifier', 'truncate', 'sectionEditor/submissionsSubmitted.tpl', 34, false),)), $this); ?>
<br/><br/>
<div id="submissions">
<table class="listing" width="100%">
	<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
	<tr class="heading" valign="bottom">
		<td width="5%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.proposalId"), $this);?>
</td>
		<td width="5%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "submissions.submit",'sort' => 'submitDate'), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.authors",'sort' => 'authors'), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "article.title",'sort' => 'title'), $this);?>
</td>
		<td width="25%" align="right"><?php echo $this->_plugins['function']['sort_heading'][0][0]->smartySortHeading(array('key' => "common.status",'sort' => 'status'), $this);?>
</td>
	</tr>
	<tr><td colspan="5" class="headseparator">&nbsp;</td></tr>
<p></p>

<?php $this->_tag_stack[] = array('iterate', array('from' => 'submissions','item' => 'submission')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>

	<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
	<?php $this->assign('abstract', $this->_tpl_vars['submission']->getLocalizedAbstract()); ?>
            <?php $this->assign('articleId', $this->_tpl_vars['submission']->getArticleId()); ?>
            <?php $this->assign('proposalId', $this->_tpl_vars['submission']->getProposalId($this->_tpl_vars['submission']->getLocale())); ?>
			<tr valign="top">
				<td><?php if ($this->_tpl_vars['proposalId']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['proposalId'])) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
<?php else: ?>&mdash;<?php endif; ?></td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateSubmitted())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	   			<td><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['submission']->getFirstAuthor())) ? $this->_run_mod_handler('truncate', true, $_tmp, 40, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 40, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td> <!-- Get first author. Added by MSB, Sept 25, 2011 -->
           		<td><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'submissionReview','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action"><?php echo ((is_array($_tmp=$this->_tpl_vars['abstract']->getScientificTitle())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a></td>
				<td align="right">
					<?php $this->assign('proposalStatusKey', $this->_tpl_vars['submission']->getProposalStatusKey($this->_tpl_vars['status'])); ?>
					<?php if (( $this->_tpl_vars['submission']->getMostRecentDecision() ) == SUBMISSION_SECTION_DECISION_RESUBMIT): ?>
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.resubmittedMsg1"), $this);?>
 (<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['submission']->getEditorDecisionKey()), $this);?>
)						
					<?php else: ?>
						<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => $this->_tpl_vars['proposalStatusKey']), $this);?>

						<?php $this->assign('sectionDecision', $this->_tpl_vars['submission']->getLastSectionDecision()); ?>
						<?php if ($this->_tpl_vars['sectionDecision']): ?>
							<?php $this->assign('reviewAssignments', $this->_tpl_vars['sectionDecision']->getReviewAssignments()); ?>
							<?php $this->assign('decisionAllowed', 'false'); ?>
							<?php if ($this->_tpl_vars['reviewAssignments']): ?>
								<?php $this->assign('decisionAllowed', 'true'); ?>
								<?php $_from = $this->_tpl_vars['reviewAssignments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewAssignment']):
?>
									<?php if (! $this->_tpl_vars['reviewAssignment']->getRecommendation()): ?>
										<?php $this->assign('decisionAllowed', 'false'); ?>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php if (( $this->_tpl_vars['status'] == PROPOSAL_STATUS_FULL_REVIEW ) && ( $this->_tpl_vars['decisionAllowed'] == 'true' )): ?>
							&nbsp;(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.recommendationAvailable"), $this);?>
)
						<?php endif; ?>
						<?php if ($this->_tpl_vars['submission']->isSubmissionDue()): ?> 
							(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.continuingReview"), $this);?>
) 
						<?php endif; ?>
					<?php endif; ?>
				</td>		
			</tr>
			<tr>
				<td colspan="5" class="<?php if ($this->_tpl_vars['submissions']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
			</tr>
		<!---->
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
