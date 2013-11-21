<?php /* Smarty version 2.6.26, created on 2013-11-19 10:31:39
         compiled from sectionEditor/section.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'url', 'sectionEditor/section.tpl', 13, false),array('function', 'translate', 'sectionEditor/section.tpl', 13, false),array('function', 'icon', 'sectionEditor/section.tpl', 62, false),array('modifier', 'escape', 'sectionEditor/section.tpl', 55, false),array('modifier', 'wordwrap', 'sectionEditor/section.tpl', 55, false),array('modifier', 'concat', 'sectionEditor/section.tpl', 59, false),array('modifier', 'assign', 'sectionEditor/section.tpl', 60, false),array('modifier', 'to_array', 'sectionEditor/section.tpl', 61, false),array('modifier', 'truncate', 'sectionEditor/section.tpl', 62, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "editor.article.ethicsCommittee"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<ul class="menu">
	<li><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'index'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "article.articles"), $this);?>
</a></li>
	<li class="current"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'section','path' => $this->_tpl_vars['ercId']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "section.sectionAbbrev"), $this);?>
</a></li>
	<li><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'meetings'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.meetings"), $this);?>
</a></li>
</ul>

<h3><b><?php echo $this->_tpl_vars['erc']->getLocalizedTitle(); ?>
</b></h3>
<p><br/></p>
<table width="100%">
	<tr>
		<td width="10%">&nbsp;</td>
		<td width="40%" valign="middle" align="center"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'enrollSearch','path' => $this->_tpl_vars['sectionId']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "sectionEditor.review.enrollReviewer"), $this);?>
</a></td>
		<td width="40%" valign="middle" align="center"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createReviewer','path' => $this->_tpl_vars['sectionId']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "sectionEditor.review.createReviewer"), $this);?>
</a></td>
		<td width="10%">&nbsp;</td>
	</tr>
	<tr><td colspan="2" class="separator">&nbsp;</td></tr>
	<tr>
		<td width="10%">&nbsp;</td>
		<td width="40%" valign="middle" align="center"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'sendEmailERCMembers'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "editor.email.ERCMembers"), $this);?>
</a></td>
		<td width="40%" valign="middle" align="center"><a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'createExternalReviewer','path' => $this->_tpl_vars['sectionId']), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "sectionEditor.review.createExternalReviewer"), $this);?>
</a></td>
		<td width="10%">&nbsp;</td>
	</tr>
</table>
<p><br/></p>
<h4><?php if (count ( $this->_tpl_vars['secretaries'] ) > 1): ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.editors"), $this);?>
<?php else: ?><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.role.sectionEditor"), $this);?>
<?php endif; ?></h4>

<table width="100%" class="listing">
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.username",'sort' => 'username'), $this);?>
</td>
		<td width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name",'sort' => 'name'), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email",'sort' => 'email'), $this);?>
</td>
		<td width="150%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	
<?php $_from = $this->_tpl_vars['secretaries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['secretary']):
?>
	<tr valign="top">
		<td>
			<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'userProfile','path' => $this->_tpl_vars['secretary']->getId()), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['secretary']->getUsername())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, ' ', true) : smarty_modifier_wordwrap($_tmp, 15, ' ', true)); ?>
</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['secretary']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td class="nowrap">
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['secretary']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['secretary']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['secretary']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => $this->_tpl_vars['erc']->getSectionId(),'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'redirectUrl' => $this->_tpl_vars['redirectUrl']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['secretary']->getEmail())) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 25, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
&nbsp;<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
		<td align="right">
			<?php if ($this->_tpl_vars['thisUser']->getId() == $this->_tpl_vars['secretary']->getId()): ?>&mdash;
			<?php else: ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'unEnroll','path' => '512','userId' => $this->_tpl_vars['secretary']->getId(),'journalId' => $this->_tpl_vars['currentJournal']->getId(),'sectionId' => $this->_tpl_vars['erc']->getSectionId()), $this);?>
" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.confirmUnenroll"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.unenroll"), $this);?>
</a>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="separator">&nbsp;</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
</table>
<p><br/></p>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.ercrole.chair"), $this);?>
</h4>

<table width="100%" class="listing">
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.username",'sort' => 'username'), $this);?>
</td>
		<td width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name",'sort' => 'name'), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email",'sort' => 'email'), $this);?>
</td>
		<td width="150%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	
<?php $_from = $this->_tpl_vars['chairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chair']):
?>
	<tr valign="top">
		<td>
			<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'userProfile','path' => $this->_tpl_vars['chair']->getId()), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['chair']->getUsername())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, ' ', true) : smarty_modifier_wordwrap($_tmp, 15, ' ', true)); ?>
</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['chair']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td class="nowrap">
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['chair']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['chair']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['chair']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => $this->_tpl_vars['erc']->getSectionId(),'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'redirectUrl' => $this->_tpl_vars['redirectUrl']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['chair']->getEmail())) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 25, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
&nbsp;<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
		<td align="right">
			<?php if ($this->_tpl_vars['thisUser']->getId() == $this->_tpl_vars['chair']->getId()): ?>&mdash;
			<?php else: ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'unEnroll','path' => '512','userId' => $this->_tpl_vars['chair']->getId(),'journalId' => $this->_tpl_vars['currentJournal']->getId(),'sectionId' => $this->_tpl_vars['erc']->getSectionId()), $this);?>
" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.confirmUnenroll"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.unenroll"), $this);?>
</a>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="separator">&nbsp;</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
</table>
<p><br/></p>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.ercrole.viceChair"), $this);?>
</h4>

<table width="100%" class="listing">
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.username",'sort' => 'username'), $this);?>
</td>
		<td width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name",'sort' => 'name'), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email",'sort' => 'email'), $this);?>
</td>
		<td width="150%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	
<?php $_from = $this->_tpl_vars['viceChairs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['viceChair']):
?>
	<tr valign="top">
		<td>
			<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'userProfile','path' => $this->_tpl_vars['viceChair']->getId()), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['viceChair']->getUsername())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, ' ', true) : smarty_modifier_wordwrap($_tmp, 15, ' ', true)); ?>
</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['viceChair']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td class="nowrap">
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['viceChair']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['viceChair']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['viceChair']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => $this->_tpl_vars['erc']->getSectionId(),'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'redirectUrl' => $this->_tpl_vars['redirectUrl']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['viceChair']->getEmail())) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 25, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
&nbsp;<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
		<td align="right">
			<?php if ($this->_tpl_vars['thisUser']->getId() == $this->_tpl_vars['viceChair']->getId()): ?>&mdash;
			<?php else: ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'unEnroll','path' => '512','userId' => $this->_tpl_vars['viceChair']->getId(),'journalId' => $this->_tpl_vars['currentJournal']->getId(),'sectionId' => $this->_tpl_vars['erc']->getSectionId()), $this);?>
" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.confirmUnenroll"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.unenroll"), $this);?>
</a>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="separator">&nbsp;</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
</table>
<p><br/></p>
<h4><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.ercrole.ercMembers"), $this);?>
</h4>

<table width="100%" class="listing">
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	<tr class="heading" valign="bottom">
		<td width="20%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.username",'sort' => 'username'), $this);?>
</td>
		<td width="30%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.name",'sort' => 'name'), $this);?>
</td>
		<td width="35%"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "user.email",'sort' => 'email'), $this);?>
</td>
		<td width="150%" align="right"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "common.action"), $this);?>
</td>
	</tr>
	<tr>
		<td colspan="4" class="headseparator">&nbsp;</td>
	</tr>
	
<?php $_from = $this->_tpl_vars['members']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['member']):
?>
	<tr valign="top">
		<td>
			<a class="action" href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'userProfile','path' => $this->_tpl_vars['member']->getId()), $this);?>
"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['member']->getUsername())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)))) ? $this->_run_mod_handler('wordwrap', true, $_tmp, 15, ' ', true) : smarty_modifier_wordwrap($_tmp, 15, ' ', true)); ?>
</a>
		</td>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['member']->getFullName())) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
</td>
		<td class="nowrap">
			<?php $this->assign('emailString', ((is_array($_tmp=$this->_tpl_vars['member']->getFullName())) ? $this->_run_mod_handler('concat', true, $_tmp, " <", $this->_tpl_vars['member']->getEmail(), ">") : $this->_plugins['modifier']['concat'][0][0]->smartyConcat($_tmp, " <", $this->_tpl_vars['member']->getEmail(), ">"))); ?>
			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('path' => $this->_tpl_vars['erc']->getSectionId(),'escape' => false), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'redirectUrl') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'redirectUrl'));?>

			<?php echo ((is_array($_tmp=$this->_plugins['function']['url'][0][0]->smartyUrl(array('page' => 'user','op' => 'email','to' => ((is_array($_tmp=$this->_tpl_vars['emailString'])) ? $this->_run_mod_handler('to_array', true, $_tmp) : $this->_plugins['modifier']['to_array'][0][0]->smartyToArray($_tmp)),'redirectUrl' => $this->_tpl_vars['redirectUrl']), $this))) ? $this->_run_mod_handler('assign', true, $_tmp, 'url') : $this->_plugins['modifier']['assign'][0][0]->smartyAssign($_tmp, 'url'));?>

			<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['member']->getEmail())) ? $this->_run_mod_handler('truncate', true, $_tmp, 25, "...") : $this->_plugins['modifier']['truncate'][0][0]->smartyTruncate($_tmp, 25, "...")))) ? $this->_run_mod_handler('escape', true, $_tmp) : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp)); ?>
&nbsp;<?php echo $this->_plugins['function']['icon'][0][0]->smartyIcon(array('name' => 'mail','url' => $this->_tpl_vars['url']), $this);?>

		</td>
		<td align="right">
			<?php if ($this->_tpl_vars['thisUser']->getId() == $this->_tpl_vars['member']->getId()): ?>&mdash;
			<?php else: ?>
				<a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'unEnroll','path' => '4096','userId' => $this->_tpl_vars['member']->getId(),'journalId' => $this->_tpl_vars['currentJournal']->getId(),'sectionId' => $this->_tpl_vars['erc']->getSectionId()), $this);?>
" onclick="return confirm('<?php echo ((is_array($_tmp=$this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.confirmUnenroll"), $this))) ? $this->_run_mod_handler('escape', true, $_tmp, 'jsparam') : $this->_plugins['modifier']['escape'][0][0]->smartyEscape($_tmp, 'jsparam'));?>
')" class="action"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "manager.people.unenroll"), $this);?>
</a>
			<?php endif; ?>
		</td>
	</tr>
	<tr>
		<td colspan="4" class="separator">&nbsp;</td>
	</tr>
<?php endforeach; endif; unset($_from); ?>
	<tr>
		<td colspan="4" class="endseparator">&nbsp;</td>
	</tr>
</table>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>