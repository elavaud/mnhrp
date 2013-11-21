<?php /* Smarty version 2.6.26, created on 2013-11-18 00:47:37
         compiled from sectionEditor/submission/peerReviewSelection.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/submission/peerReviewSelection.tpl', 13, false),array('function', 'translate', 'sectionEditor/submission/peerReviewSelection.tpl', 15, false),array('modifier', 'to_array', 'sectionEditor/submission/peerReviewSelection.tpl', 15, false),array('modifier', 'ord', 'sectionEditor/submission/peerReviewSelection.tpl', 25, false),array('modifier', 'chr', 'sectionEditor/submission/peerReviewSelection.tpl', 33, false),array('modifier', 'escape', 'sectionEditor/submission/peerReviewSelection.tpl', 36, false),)), $this); ?>


<form method="post" action="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectReviewers','path' => $this->_tpl_vars['submission']->getId()), $this);?>
">
<div id="peerReview">
<table><tr width="100%"><td width="30%"><h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.ercrole.ercMembers"), $this);?>
</h3><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'selectReviewer','path' => ((is_array($_tmp=$this->_tpl_vars['submission']->getId())) ? $this->_run_mod_handler('to_array', true, $_tmp, 0, true) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, 0, true))), $this);?>
" class="action">&#187;&nbsp;<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.article.selectExternalReviewer"), $this);?>
</a></td></tr></table>
<table class="data" width="100%">
	<tr id="reviewersHeader" valign="middle">
		<td width="10%"></td>
		<td width="40%" valign="left"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.name"), $this);?>
</h4></td>
		<td width="50%" valign="left"><h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.interests"), $this);?>
</h4></td>
	</tr>
</table>


<?php $this->assign('start', ((is_array($_tmp='A')) ? $this->_run_mod_handler('ord', true, $_tmp) : ord($_tmp))); ?>
<?php $this->assign('reviewIndex', 0); ?>
<?php $_from = $this->_tpl_vars['reviewers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewer']):
?>
	<?php $this->assign('reviewIndex', $this->_tpl_vars['reviewIndex']+1); ?>
	<div class="separator"></div>
	<table class="data" width="100%">		
			<tr class="reviewer">
				<td class="r1" width="10%" align="center">
					<h4><input type="checkbox" id="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
" name="selectedReviewers[]" value="<?php echo $this->_tpl_vars['reviewer']->getId(); ?>
" /></h4>					
				</td>
				<td class="r2" width="40%" align="left">
					<label for="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
"><h4><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewer']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h4></label>
				</td>	
				<td class="r3" width="50%" align="left">
					<label for="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
"><h7><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewer']->getUserInterests())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h7></label>
				</td>
			</tr>	
	</table>
<?php endforeach; endif; unset($_from); ?>
<div class="separator"></div>
<!--
<table class="title">
	<tr>
		<td>
			<h3>External Reviewers</h3>
		</td>
	</tr>
	<tr>
		<td>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createExternalReviewer','path' => $this->_tpl_vars['articleId']), $this);?>
" class="action">&#187;Create External Reviewer</a>
		</td>
	</tr>
</table>
<table class="data" width="100%">
	<tr id="reviewersHeader" valign="middle">
		<td width="10%"></td>
		<td width="40%" valign="left"><h4>Name</h4></td>
		<td width="50%" valign="left"><h4>Reviewing Interests</h4></td>
	</tr>
</table>
<?php $this->assign('start', ((is_array($_tmp='A')) ? $this->_run_mod_handler('ord', true, $_tmp) : ord($_tmp))); ?>
<?php $this->assign('reviewIndex', 0); ?>
<?php $_from = $this->_tpl_vars['extReviewers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reviewer']):
?>
	<?php $this->assign('reviewIndex', $this->_tpl_vars['reviewIndex']+1); ?>
	<div class="separator"></div>
	<table class="data" width="100%">		
			<tr class="reviewer">
				<td class="r1" width="10%" align="center">
					<h4><input type="checkbox" id="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
" name="selectedReviewers[]" value="<?php echo $this->_tpl_vars['reviewer']->getId(); ?>
" /></h4>					
				</td>
				<td class="r2" width="40%" align="left">
					<label for="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
"><h4><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewer']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h4></label>
				</td>	
				<td class="r3" width="50%" align="left">
					<label for="reviewer_<?php echo ((is_array($_tmp=$this->_tpl_vars['reviewIndex']+$this->_tpl_vars['start'])) ? $this->_run_mod_handler('chr', true, $_tmp) : chr($_tmp)); ?>
"><h7><?php echo ((is_array($_tmp=$this->_tpl_vars['reviewer']->getUserInterests())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</h7></label>
				</td>
			</tr>	
	</table>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->_tpl_vars['reviewIndex'] == 0): ?>
	<div class="separator"></div>
	<table class="data" width="100%">		
			<tr class="reviewer">
				<td align="center"><i>No external reviewers into the database.</i></td>
			</tr>	
	</table>
<?php endif; ?>
<div class="separator"></div>
-->
<br/><input type="submit" class="button" value="Select And Notify ERC Members for Primary Review" />						
</form>
</div>