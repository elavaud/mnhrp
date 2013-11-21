<?php /* Smarty version 2.6.26, created on 2013-11-17 19:53:02
         compiled from file:/Applications/MAMP/htdocs/mnhrp/plugins/blocks/notification/block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/blocks/notification/block.tpl', 14, false),array('function', 'url', 'file:/Applications/MAMP/htdocs/mnhrp/plugins/blocks/notification/block.tpl', 16, false),)), $this); ?>
 <?php if ($this->_tpl_vars['currentJournal']): ?>
<div class="block" id="notification">
<?php if ($this->_tpl_vars['isUserLoggedIn']): ?>
	<span class="blockTitle"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notifications"), $this);?>
</span>
	<ul>
		<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'notification'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.view"), $this);?>
</a>
		<?php if ($this->_tpl_vars['unreadNotifications'] > 0): ?>
			<?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "notification.notificationsNew",'numNew' => $this->_tpl_vars['unreadNotifications']), $this);?>

		<?php endif; ?>
		</li>
	</ul>
<?php endif; ?>
</div>
<?php endif; ?>