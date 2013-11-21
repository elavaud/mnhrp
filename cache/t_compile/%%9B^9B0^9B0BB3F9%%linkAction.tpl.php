<?php /* Smarty version 2.6.26, created on 2013-11-19 19:27:20
         compiled from linkAction/linkAction.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'concat', 'linkAction/linkAction.tpl', 8, false),array('function', 'modal', 'linkAction/linkAction.tpl', 17, false),array('function', 'confirm', 'linkAction/linkAction.tpl', 26, false),)), $this); ?>
<?php if (! $this->_tpl_vars['actOnId']): ?>
	<?php $this->assign('actOnId', $this->_tpl_vars['id']); ?>
<?php endif; ?>

<?php if (! $this->_tpl_vars['buttonId']): ?>
	<?php $this->assign('buttonId', ((is_array($_tmp=$this->_tpl_vars['id'])) ? $this->_run_mod_handler('concat', true, $_tmp, "-", $this->_tpl_vars['action']->getId(), "-button") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, "-", $this->_tpl_vars['action']->getId(), "-button"))); ?>
	<?php if ($this->_tpl_vars['action']->getImage()): ?>
		<a href="<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_LINK): ?><?php echo $this->_tpl_vars['action']->getUrl(); ?>
<?php endif; ?>" id="<?php echo $this->_tpl_vars['buttonId']; ?>
" class="<?php if ($this->_tpl_vars['actionCss']): ?><?php echo $this->_tpl_vars['actionCss']; ?>
 <?php endif; ?><?php echo $this->_tpl_vars['action']->getImage(); ?>
" <?php if ($this->_tpl_vars['hoverTitle']): ?>title="<?php echo $this->_tpl_vars['action']->getLocalizedTitle(); ?>
">&nbsp;<?php else: ?>><?php echo $this->_tpl_vars['action']->getLocalizedTitle(); ?>
<?php endif; ?></a>
	<?php else: ?>
		<a href="<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_LINK): ?><?php echo $this->_tpl_vars['action']->getUrl(); ?>
<?php endif; ?>" id="<?php echo $this->_tpl_vars['buttonId']; ?>
" <?php if ($this->_tpl_vars['actionCss']): ?>class="<?php echo $this->_tpl_vars['actionCss']; ?>
"<?php endif; ?> <?php if ($this->_tpl_vars['hoverTitle']): ?> title="<?php echo $this->_tpl_vars['action']->getLocalizedTitle(); ?>
"><?php else: ?>><?php echo $this->_tpl_vars['action']->getLocalizedTitle(); ?>
<?php endif; ?></a>
	<?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_MODAL): ?>
	<?php echo $this->_plugins['function']['modal'][0][0]->smartyModal(array('url' => $this->_tpl_vars['action']->getUrl(),'actOnType' => $this->_tpl_vars['action']->getType(),'actOnId' => ((is_array($_tmp="#")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['actOnId']) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['actOnId'])),'button' => ((is_array($_tmp="#")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['buttonId']) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['buttonId']))), $this);?>


<?php elseif ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_CONFIRM): ?>
	<?php if ($this->_tpl_vars['action']->getLocalizedConfirmMessage()): ?>
		<?php $this->assign('dialogText', $this->_tpl_vars['action']->getLocalizedConfirmMessage()); ?>
	<?php else: ?>
		<?php $this->assign('dialogText', $this->_tpl_vars['action']->getLocalizedTitle()); ?>
	<?php endif; ?>

	<?php echo $this->_plugins['function']['confirm'][0][0]->smartyConfirm(array('url' => $this->_tpl_vars['action']->getUrl(),'dialogText' => $this->_tpl_vars['dialogText'],'actOnType' => $this->_tpl_vars['action']->getType(),'actOnId' => ((is_array($_tmp="#")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['actOnId']) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['actOnId'])),'button' => ((is_array($_tmp="#")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['buttonId']) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['buttonId'])),'translate' => false), $this);?>


<?php elseif ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_AJAX): ?>
	<script type="text/javascript">
		$(function() {
			ajaxAction(
				'<?php echo $this->_tpl_vars['action']->getType(); ?>
',
				'#<?php echo $this->_tpl_vars['actOnId']; ?>
',
				'#<?php echo $this->_tpl_vars['buttonId']; ?>
',
				'<?php echo $this->_tpl_vars['action']->getUrl(); ?>
'
			);
		});
	</script>
<?php endif; ?>
