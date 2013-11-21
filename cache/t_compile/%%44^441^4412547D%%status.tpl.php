<?php /* Smarty version 2.6.26, created on 2013-11-19 01:11:39
         compiled from author/submission/status.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'author/submission/status.tpl', 12, false),array('function', 'url', 'author/submission/status.tpl', 46, false),array('modifier', 'date_format', 'author/submission/status.tpl', 81, false),)), $this); ?>
<div id="status">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</h3>


<table width="100%" class="data">
	<tr>
		<?php $this->assign('status', $this->_tpl_vars['submission']->getSubmissionStatus()); ?>
		<td width="20%" class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.status"), $this);?>
</td>
		<td width="80%" class="value">
                                                <!-- Edited by: AIM, July 4 2011 -->
                        <?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_DRAFT): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.draft"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_WITHDRAWN): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.withdrawn"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_COMPLETED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.completed"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_ARCHIVED): ?>
                            <?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>
                            <?php if ($this->_tpl_vars['decision'] == SUBMISSION_SECTION_DECISION_DECLINED): ?>
                                Archived(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.declined"), $this);?>
)
                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_SECTION_DECISION_EXEMPTED): ?>
                                Archived(<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.exempted"), $this);?>
)
                            <?php endif; ?>
                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_SUBMITTED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.submitted"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_CHECKED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.complete"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_EXPEDITED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.expeditedReview"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_FULL_REVIEW): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.fullReview"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_RETURNED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.incomplete"), $this);?>

                        <br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'resubmit','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action">Resubmit</a>
                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_EXEMPTED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.exempted"), $this);?>

                        <?php elseif ($this->_tpl_vars['status'] == PROPOSAL_STATUS_REVIEWED): ?>
                            <?php $this->assign('decision', $this->_tpl_vars['submission']->getMostRecentDecision()); ?>
                            <?php if ($this->_tpl_vars['decision'] == SUBMISSION_SECTION_DECISION_RESUBMIT): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.reviseAndResubmit"), $this);?>

                       		<br/><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'resubmit','path' => $this->_tpl_vars['submission']->getId()), $this);?>
" class="action">Resubmit</a>
                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_SECTION_DECISION_APPROVED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.approved"), $this);?>

                            <?php elseif ($this->_tpl_vars['decision'] == SUBMISSION_SECTION_DECISION_DECLINED): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.status.declined"), $this);?>

                            
                            <?php endif; ?>
                        <?php endif; ?>
		</td>
	</tr>
	<?php if ($this->_tpl_vars['status'] == PROPOSAL_STATUS_WITHDRAWN): ?>
		<tr>
			<td class="label">&nbsp;</td>
			<td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.withdrawnReason"), $this);?>
: 
				<?php if ($this->_tpl_vars['submission']->getWithdrawReason('en_US') == '0'): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.withdrawLack"), $this);?>

				<?php elseif ($this->_tpl_vars['submission']->getWithdrawReason('en_US') == '1'): ?>
					<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submission.withdrawAdverse"), $this);?>

				<?php else: ?>
					<?php echo $this->_tpl_vars['submission']->getWithdrawReason('en_US'); ?>

				<?php endif; ?>
			</td>
		</tr>
		<?php if ($this->_tpl_vars['submission']->getWithdrawComments('en_US')): ?>
			<tr>
				<td class="label">&nbsp;</td>
				<td class="value"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "submissions.proposal.withdrawnComment"), $this);?>
: <?php echo $this->_tpl_vars['submission']->getWithdrawComments('en_US'); ?>
</td>
			</tr>
		<?php endif; ?>
	<?php endif; ?>
	<tr>
		<td class="label"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.date"), $this);?>
</td>
		<td colspan="2" class="value"><?php echo ((is_array($_tmp=$this->_tpl_vars['submission']->getDateStatusModified())) ? $this->_run_mod_handler('date_format', true, $_tmp, $this->_tpl_vars['dateFormatLong']) : smarty_modifier_date_format($_tmp, $this->_tpl_vars['dateFormatLong'])); ?>
</td>
	</tr>
        </table>
</div>
<?php if ($this->_tpl_vars['articleComments']): ?>
    <div class="separator"></div>
    <div id="articleComments">
        <h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.comments"), $this);?>
</h3>
        <li>
        <?php $_from = $this->_tpl_vars['articleComments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comment']):
?>
            <ul><?php echo $this->_tpl_vars['comment']->getComments(); ?>
 (<?php echo $this->_tpl_vars['comment']->getAuthorName(); ?>
, <?php echo $this->_tpl_vars['comment']->getDatePosted(); ?>
)</ul>
        <?php endforeach; endif; unset($_from); ?>
        </li>
    </div>
<?php endif; ?>
