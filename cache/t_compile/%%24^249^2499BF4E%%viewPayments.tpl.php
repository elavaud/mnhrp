<?php /* Smarty version 2.6.26, created on 2013-11-21 14:57:21
         compiled from payments/viewPayments.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'payments/viewPayments.tpl', 17, false),array('function', 'translate', 'payments/viewPayments.tpl', 17, false),array('function', 'page_info', 'payments/viewPayments.tpl', 88, false),array('function', 'page_links', 'payments/viewPayments.tpl', 89, false),array('block', 'iterate', 'payments/viewPayments.tpl', 38, false),array('modifier', 'escape', 'payments/viewPayments.tpl', 53, false),array('modifier', 'wordwrap', 'payments/viewPayments.tpl', 53, false),array('modifier', 'to_array', 'payments/viewPayments.tpl', 58, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "common.payments"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>


<ul class="menu">
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'payments'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.options"), $this);?>
</a></li>
	<li><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'payMethodSettings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.paymentMethods"), $this);?>
</a></li>
	<li class="current"><a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPayments'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.records"), $this);?>
</a></li>		
</ul>

<br />

<table width="100%" class="listing">
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.user"), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.paymentType"), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.timestamp"), $this);?>
</td>
		<td width="25%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.action"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>

	<?php $this->_tag_stack[] = array('iterate', array('from' => 'payments','item' => 'payment')); $_block_repeat=true;$this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
	<?php $this->assign('isSubscription', $this->_tpl_vars['payment']->isSubscription()); ?>
	<?php if ($this->_tpl_vars['isSubscription']): ?>
		<?php $this->assign('subscriptionId', $this->_tpl_vars['payment']->getAssocId()); ?>
		<?php if ($this->_tpl_vars['individualSubscriptionDao']->subscriptionExists($this->_tpl_vars['subscriptionId'])): ?>
			<?php $this->assign('isIndividual', true); ?>
		<?php elseif ($this->_tpl_vars['institutionalSubscriptionDao']->subscriptionExists($this->_tpl_vars['subscriptionId'])): ?>
			<?php $this->assign('isInstitutional', true); ?>
		<?php else: ?>
			<?php $this->assign('isIndividual', false); ?>
			<?php $this->assign('isInstitutional', false); ?>
		<?php endif; ?>
	<?php endif; ?>
	<tr valign="top">
		<td>
			<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'userProfile','path' => $this->_tpl_vars['payment']->getUserId()), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['payment']->getUsername())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, ' ', true) : smarty_modifier_wordwrap($_tmp, 15, ' ', true)); ?>
</a>
		</td>
		<td>
			<?php if ($this->_tpl_vars['isSubscription']): ?>
				<?php if ($this->_tpl_vars['isIndividual']): ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'subscriptionManager','op' => 'editSubscription','path' => ((is_array($_tmp='individual')) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['subscriptionId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['subscriptionId']))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->getName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
				<?php elseif ($this->_tpl_vars['isInstitutional']): ?>
					<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'subscriptionManager','op' => 'editSubscription','path' => ((is_array($_tmp='institutional')) ? $this->_run_mod_handler('to_array', true, $_tmp, $this->_tpl_vars['subscriptionId']) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp, $this->_tpl_vars['subscriptionId']))), $this);?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->getName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</a>
				<?php else: ?>
					<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->getName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

				<?php endif; ?>
			<?php else: ?>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->getName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

			<?php endif; ?>
		</td>
		<td class="nowrap">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['payment']->getTimestamp())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>

		</td>
		<td>
			<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'viewPayment','path' => $this->_tpl_vars['payment']->getPaymentId()), $this);?>
" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.details"), $this);?>
</a>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="<?php if ($this->_tpl_vars['payments']->eof()): ?>end<?php endif; ?>separator">&nbsp;</td>
	</tr>
	<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo $this->_plugins['block']['iterate'][0][0]->smartyIterate($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
<?php if ($this->_tpl_vars['payments']->wasEmpty()): ?>
	<tr>
		<td colspan="4" class="nodata"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.payment.noPayments"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
<?php else: ?>
	<tr>
		<td colspan="3" align="left"><?php echo $this->_plugins['function']['page_info'][0][0]->smartyPageInfo(array('iterator' => $this->_tpl_vars['payments']), $this);?>
</td>
		<td align="right"><?php echo $this->_plugins['function']['page_links'][0][0]->smartyPageLinks(array('anchor' => 'payments','name' => 'payments','iterator' => $this->_tpl_vars['payments']), $this);?>
</td>
	</tr>
<?php endif; ?>
</table>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
