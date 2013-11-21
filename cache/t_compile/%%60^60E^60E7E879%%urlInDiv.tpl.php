<?php /* Smarty version 2.6.26, created on 2013-11-19 19:27:19
         compiled from common/urlInDiv.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'common/urlInDiv.tpl', 15, false),)), $this); ?>

<div id="<?php echo $this->_tpl_vars['inDivDivId']; ?>
"<?php if ($this->_tpl_vars['inDivClass']): ?> class="<?php echo $this->_tpl_vars['inDivClass']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['inDivLoadMessage']; ?>
</div>
<script type='text/javascript'>
	<?php echo '
	$(function() {
		$.getJSON("'; ?>
<?php echo ((is_array($_tmp=$this->_tpl_vars['inDivUrl'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'javascript') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'javascript')); ?>
<?php echo '", function(jsonData) {
			if (jsonData.status === true) {
				$("#'; ?>
<?php echo $this->_tpl_vars['inDivDivId']; ?>
<?php echo '").html(jsonData.content);
			} else {
				// Alert that loading failed
				alert(jsonData.content);
			}
		});
	});
	'; ?>

</script>
