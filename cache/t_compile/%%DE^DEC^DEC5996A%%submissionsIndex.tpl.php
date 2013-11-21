<?php /* Smarty version 2.6.26, created on 2013-11-19 01:04:00
         compiled from reviewer/submissionsIndex.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'reviewer/submissionsIndex.tpl', 24, false),array('function', 'translate', 'reviewer/submissionsIndex.tpl', 24, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "common.queue.long.".($this->_tpl_vars['pageToDisplay'])); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<?php if (! $this->_tpl_vars['dateFrom']): ?>
<?php $this->assign('dateFrom', "--"); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['dateTo']): ?>
<?php $this->assign('dateTo', "--"); ?>
<?php endif; ?>
<ul class="menu">
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'active' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => 'active'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.active"), $this);?>
</a></li>
	<li<?php if (( $this->_tpl_vars['pageToDisplay'] == 'completed' )): ?> class="current"<?php endif; ?>><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => 'completed'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.queue.short.completed"), $this);?>
</a></li>
</ul>
<p style="text-align:right"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('journal' => $this->_tpl_vars['journalPath'],'page' => 'reviewer','op' => 'meetings'), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "reviewer.meetings"), $this);?>
</a></p>
<br />

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "reviewer/".($this->_tpl_vars['pageToDisplay']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>