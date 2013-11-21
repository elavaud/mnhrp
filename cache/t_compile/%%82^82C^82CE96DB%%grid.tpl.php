<?php /* Smarty version 2.6.26, created on 2013-11-19 19:27:20
         compiled from controllers/grid/grid.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'concat', 'controllers/grid/grid.tpl', 13, false),array('modifier', 'is_a', 'controllers/grid/grid.tpl', 15, false),array('modifier', 'translate', 'controllers/grid/grid.tpl', 34, false),array('modifier', 'str_repeat', 'controllers/grid/grid.tpl', 37, false),array('function', 'translate', 'controllers/grid/grid.tpl', 80, false),)), $this); ?>

<?php $this->assign('gridId', ((is_array($_tmp="component-")) ? $this->_run_mod_handler('concat', true, $_tmp, $this->_tpl_vars['grid']->getId()) : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, $this->_tpl_vars['grid']->getId()))); ?>
<?php $this->assign('gridTableId', ((is_array($_tmp=$this->_tpl_vars['gridId'])) ? $this->_run_mod_handler('concat', true, $_tmp, "-table") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, "-table"))); ?>
<?php if (((is_array($_tmp=$this->_tpl_vars['grid'])) ? $this->_run_mod_handler('is_a', true, $_tmp, 'CategoryGridHandler') : is_a($_tmp, 'CategoryGridHandler'))): ?>
	<?php $this->assign('gridActOnId', $this->_tpl_vars['gridTableId']); ?>
<?php else: ?>
	<?php $this->assign('gridActOnId', ((is_array($_tmp=$this->_tpl_vars['gridTableId'])) ? $this->_run_mod_handler('concat', true, $_tmp, ">tbody:first") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, ">tbody:first"))); ?>
<?php endif; ?>
<div id="<?php echo $this->_tpl_vars['gridId']; ?>
" class="grid">
	<?php if (! $this->_tpl_vars['grid']->getIsSubcomponent()): ?><div class="wrapper"><?php endif; ?>
		<?php if ($this->_tpl_vars['grid']->getActions(@GRID_ACTION_POSITION_ABOVE)): ?>
			<span class="options">
				<?php $_from = $this->_tpl_vars['grid']->getActions(@GRID_ACTION_POSITION_ABOVE); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
					<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_AJAX): ?>
						<?php $this->assign('actionActOnId', $this->_tpl_vars['action']->getActOn()); ?>
					<?php else: ?>
						<?php $this->assign('actionActOnId', $this->_tpl_vars['gridActOnId']); ?>
					<?php endif; ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "linkAction/linkAction.tpl", 'smarty_include_vars' => array('action' => $this->_tpl_vars['action'],'id' => $this->_tpl_vars['gridId'],'actOnId' => $this->_tpl_vars['actionActOnId'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endforeach; endif; unset($_from); ?>
			</span>
		<?php endif; ?>
		<?php if (! $this->_tpl_vars['grid']->getIsSubcomponent()): ?><h3><?php echo ((is_array($_tmp=$this->_tpl_vars['grid']->getTitle())) ? $this->_run_mod_handler('translate', true, $_tmp) : Locale::translate($_tmp)); ?>
</h3><?php endif; ?>
		<table id="<?php echo $this->_tpl_vars['gridTableId']; ?>
">
		    <colgroup>
		    	<?php echo ((is_array($_tmp="<col />")) ? $this->_run_mod_handler('str_repeat', true, $_tmp, $this->_tpl_vars['numColumns']) : str_repeat($_tmp, $this->_tpl_vars['numColumns'])); ?>

		    </colgroup>
		    <thead>
	    				    	<tr>
		    		<?php $_from = $this->_tpl_vars['columns']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['columns'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['columns']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['column']):
        $this->_foreach['columns']['iteration']++;
?>
		        		<th scope="col">
		        			<?php echo $this->_tpl_vars['column']->getLocalizedTitle(); ?>

							<?php if (($this->_foreach['columns']['iteration'] == $this->_foreach['columns']['total']) && $this->_tpl_vars['grid']->getActions(@GRID_ACTION_POSITION_LASTCOL)): ?>
								<span class="options">
									<?php $_from = $this->_tpl_vars['grid']->getActions(@GRID_ACTION_POSITION_LASTCOL); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
										<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_AJAX): ?>
											<?php $this->assign('actionActOnId', $this->_tpl_vars['action']->getActOn()); ?>
										<?php else: ?>
											<?php $this->assign('actionActOnId', $this->_tpl_vars['gridActOnId']); ?>
										<?php endif; ?>
										<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "linkAction/linkAction.tpl", 'smarty_include_vars' => array('action' => $this->_tpl_vars['action'],'id' => $this->_tpl_vars['gridId'],'actOnId' => $this->_tpl_vars['actionActOnId'],'hoverTitle' => true)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
									<?php endforeach; endif; unset($_from); ?>
								</span>
							<?php endif; ?>
						</th>
					<?php endforeach; endif; unset($_from); ?>
		        </tr>
		    </thead>
			<?php if ($this->_tpl_vars['grid']->getIsSubcomponent()): ?>
								</table>
				<div class="scrollable">
				<table>
			<?php endif; ?>
			<?php $_from = $this->_tpl_vars['gridBodyParts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['bodyPart']):
?>
				<?php echo $this->_tpl_vars['bodyPart']; ?>

			<?php endforeach; else: ?>
				<tbody></tbody>
			<?php endif; unset($_from); ?>
		    <tbody class="empty"<?php if (count ( $this->_tpl_vars['gridBodyParts'] ) > 0): ?> style="display: none;"<?php endif; ?>>
								<tr>
					<td colspan="<?php echo $this->_tpl_vars['numColumns']; ?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "grid.noItems"), $this);?>
</td>
				</tr>
		    </tbody>
		</table>
		<?php if ($this->_tpl_vars['grid']->getIsSubcomponent()): ?>
			</div>
		<?php endif; ?>
		<div class="actions">
			<?php $_from = $this->_tpl_vars['grid']->getActions(@GRID_ACTION_POSITION_BELOW); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['action']):
?>
				<?php if ($this->_tpl_vars['action']->getMode() == @LINK_ACTION_MODE_AJAX): ?>
					<?php $this->assign('actionActOnId', $this->_tpl_vars['action']->getActOn()); ?>
				<?php else: ?>
					<?php $this->assign('actionActOnId', $this->_tpl_vars['gridActOnId']); ?>
				<?php endif; ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "linkAction/linkAction.tpl", 'smarty_include_vars' => array('action' => $this->_tpl_vars['action'],'id' => $this->_tpl_vars['gridId'],'actOnId' => $this->_tpl_vars['actionActOnId'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php if (! $this->_tpl_vars['grid']->getIsSubcomponent()): ?></div><?php endif; ?>
</div>
