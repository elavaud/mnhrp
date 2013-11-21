<?php /* Smarty version 2.6.26, created on 2013-11-17 19:54:52
         compiled from about/index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'translate', 'about/index.tpl', 17, false),array('function', 'url', 'about/index.tpl', 20, false),)), $this); ?>
<?php echo ''; ?><?php $this->assign('pageTitle', "about.aboutTheJournal"); ?><?php echo ''; ?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php echo ''; ?>

<!--
<div id="aboutPeople">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.people"), $this);?>
</h3>
<ul class="plain">
			<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'contact'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.contact"), $this);?>
</a></li>
		<li>&#187; <a href="<?php echo $this->_plugins['function']['url'][0][0]->smartyUrl(array('op' => 'editorialTeam'), $this);?>
"><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.editorialTeam"), $this);?>
</a></li>
	</ul>
</div>
-->
<div id="aboutPolicies">

<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.policies"), $this);?>
</h3>
<ul class="plain">
<li>&#187; Standard Operating Procedures (engl) <i>...soon available...</i></li>
</ul>
</div>

<div id="userGuides">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.userGuides"), $this);?>
</h3>
<ul class="plain">
<li>&#187;  Userguide for investigators (engl) <i>...soon available...</i></li>
</ul>
</div>

<div id="userGuides">
<h3><?php echo $this->_plugins['function']['translate'][0][0]->smartyTranslate(array('key' => "about.templates"), $this);?>
</h3>
<ul class="plain">
<li>&#187;  <a href="/hrp/public/FINAL_REPORT_Template.doc" target="_blank"> Final Report (engl)</a></li>
<li>&#187;  <a href="/hrp/public/PROGRESS_REPORT_Template.doc" target="_blank"> Progress Report (engl)</a></li>
<li>&#187;  <a href="/hrp/public/PROPOSAL_REVIEW_template.doc" target="_blank"> Proposal Review (engl)</a></li>
</ul>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "common/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
