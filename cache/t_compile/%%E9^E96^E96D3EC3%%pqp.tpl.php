<?php /* Smarty version 2.6.26, created on 2013-11-17 19:53:03
         compiled from /Applications/MAMP/htdocs/mnhrp/lib/pkp/lib/pqp/pqp.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', '/Applications/MAMP/htdocs/mnhrp/lib/pkp/lib/pqp/pqp.tpl', 127, false),array('function', 'cycle', '/Applications/MAMP/htdocs/mnhrp/lib/pkp/lib/pqp/pqp.tpl', 167, false),)), $this); ?>
<!-- JavaScript -->
<?php echo '
<script type="text/javascript">
	var PQP_DETAILS = false;
	var PQP_HEIGHT = "short";
	var PQP_METRICS = false;
	
	addEvent(window, \'load\', loadCSS);

	function changeTab(tab) {
		var pQp = document.getElementById(\'pQp\');
		hideAllTabs();
		addClassName(pQp, tab, true);
	}
	
	function hideAllTabs() {
		var pQp = document.getElementById(\'pQp\');
		removeClassName(pQp, \'console\');
		removeClassName(pQp, \'speed\');
		removeClassName(pQp, \'queries\');
		removeClassName(pQp, \'memory\');
		removeClassName(pQp, \'files\');
	}
	
	function toggleMetrics(){
		var container = document.getElementById(\'pqp-metrics\');
		
		if(PQP_METRICS){
			addClassName(container, \'hideMetrics\', true);
			PQP_METRICS = false;
		}
		else{
			removeClassName(container, \'hideMetrics\');
			PQP_METRICS = true;
		}
	}
	function toggleDetails(){
		var container = document.getElementById(\'pqp-container\');
		
		if(PQP_DETAILS){
			addClassName(container, \'hideDetails\', true);
			PQP_DETAILS = false;
		}
		else{
			removeClassName(container, \'hideDetails\');
			PQP_DETAILS = true;
		}
	}
	function toggleHeight(){
		var container = document.getElementById(\'pqp-container\');
		
		if(PQP_HEIGHT == "short"){
			addClassName(container, \'tallDetails\', true);
			PQP_HEIGHT = "tall";
		}
		else{
			removeClassName(container, \'tallDetails\');
			PQP_HEIGHT = "short";
		}
	}
	
	function loadCSS() {
		var sheet = document.createElement("link");
		sheet.setAttribute("rel", "stylesheet");
		sheet.setAttribute("type", "text/css");
		sheet.setAttribute("href", "'; ?>
<?php echo $this->_tpl_vars['pqpCss']; ?>
<?php echo '");
		document.getElementsByTagName("head")[0].appendChild(sheet);
		setTimeout(function(){document.getElementById("pqp-container").style.display = "block"}, 10);
	}
	
	
	//http://www.bigbold.com/snippets/posts/show/2630
	function addClassName(objElement, strClass, blnMayAlreadyExist){
	   if ( objElement.className ){
	      var arrList = objElement.className.split(\' \');
	      if ( blnMayAlreadyExist ){
	         var strClassUpper = strClass.toUpperCase();
	         for ( var i = 0; i < arrList.length; i++ ){
	            if ( arrList[i].toUpperCase() == strClassUpper ){
	               arrList.splice(i, 1);
	               i--;
	             }
	           }
	      }
	      arrList[arrList.length] = strClass;
	      objElement.className = arrList.join(\' \');
	   }
	   else{  
	      objElement.className = strClass;
	      }
	}

	//http://www.bigbold.com/snippets/posts/show/2630
	function removeClassName(objElement, strClass){
	   if ( objElement.className ){
	      var arrList = objElement.className.split(\' \');
	      var strClassUpper = strClass.toUpperCase();
	      for ( var i = 0; i < arrList.length; i++ ){
	         if ( arrList[i].toUpperCase() == strClassUpper ){
	            arrList.splice(i, 1);
	            i--;
	         }
	      }
	      objElement.className = arrList.join(\' \');
	   }
	}

	//http://ejohn.org/projects/flexible-javascript-events/
	function addEvent( obj, type, fn ) {
	  if ( obj.attachEvent ) {
	    obj["e"+type+fn] = fn;
	    obj[type+fn] = function() { obj["e"+type+fn]( window.event ) };
	    obj.attachEvent( "on"+type, obj[type+fn] );
	  } 
	  else{
	    obj.addEventListener( type, fn, false );	
	  }
	}
</script>
'; ?>


<div id="pqp-container" class="pQp hideDetails" style="display:none">
<div id="pQp" class="console">
	<table id="pqp-metrics" class="hideMetrics" cellspacing="0">
		<tr>
			<td class="green" onclick="changeTab('console');">
				<var><?php echo count($this->_tpl_vars['logs']['console']); ?>
</var>
				<h4>Console</h4>
			</td>
			<td class="blue" onclick="changeTab('speed');">
				<var><?php echo $this->_tpl_vars['speedTotals']['total']; ?>
</var>
				<h4>Load Time</h4>
			</td>
			<td class="purple" onclick="changeTab('queries');">
				<var><?php echo $this->_tpl_vars['queryTotals']['count']; ?>
 Queries</var>
				<h4>Database</h4>
			</td>
			<td class="orange" onclick="changeTab('memory');">
				<var><?php echo $this->_tpl_vars['memoryTotals']['used']; ?>
</var>
				<h4>Memory Used</h4>
			</td>
			<td class="red" onclick="changeTab('files');">
				<var><?php echo count($this->_tpl_vars['files']); ?>
 Files</var>
				<h4>Included</h4>
			</td>
		</tr>
	</table>
	
	<div id='pqp-console' class='pqp-box'>
		<?php if (count($this->_tpl_vars['logs']['console']) == 0): ?>
			<h3>This panel has no log items.</h3>
		<?php else: ?>
			<table class='side' cellspacing='0'>
			<tr>
				<td class='alt1'><var><?php echo $this->_tpl_vars['logs']['logCount']; ?>
</var><h4>Logs</h4></td>
				<td class='alt2'><var><?php echo $this->_tpl_vars['logs']['errorCount']; ?>
</var> <h4>Errors</h4></td>
			</tr>
			<tr>
				<td class='alt3'><var><?php echo $this->_tpl_vars['logs']['memoryCount']; ?>
</var> <h4>Memory</h4></td>
				<td class='alt4'><var><?php echo $this->_tpl_vars['logs']['speedCount']; ?>
</var> <h4>Speed</h4></td>
			</tr>
			</table>
			<table class='main' cellspacing='0'>
				<?php $_from = $this->_tpl_vars['logs']['console']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
					<tr class='log-<?php echo $this->_tpl_vars['log']['type']; ?>
'>
						<td class='type'><?php echo $this->_tpl_vars['log']['type']; ?>
</td>
						<td class="<?php echo smarty_function_cycle(array('values' => "alt,"), $this);?>
">
							<?php if ($this->_tpl_vars['log']['type'] == 'log'): ?> 
								<div><pre style="background: transparent;"><?php echo $this->_tpl_vars['log']['data']; ?>
</pre></div>
							<?php elseif ($this->_tpl_vars['log']['type'] == 'memory'): ?>
								<div><pre style="background: transparent;"><?php echo $this->_tpl_vars['log']['data']; ?>
</pre> <em><?php echo $this->_tpl_vars['log']['dataType']; ?>
</em>: <?php echo $this->_tpl_vars['log']['name']; ?>
 </div>
							<?php elseif ($this->_tpl_vars['log']['type'] == 'speed'): ?>
								<div><pre style="background: transparent;"><?php echo $this->_tpl_vars['log']['data']; ?>
</pre> <em><?php echo $this->_tpl_vars['log']['name']; ?>
</em></div>
							<?php elseif ($this->_tpl_vars['log']['type'] == 'error'): ?>
								<div><em>Line <?php echo $this->_tpl_vars['log']['line']; ?>
</em> : <?php echo $this->_tpl_vars['log']['data']; ?>
 <pre><?php echo $this->_tpl_vars['log']['file']; ?>
</pre></div>
							<?php endif; ?>
						</td>
						</tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
		<?php endif; ?>
	</div>
	
	<div id="pqp-speed" class="pqp-box">
		<?php if ($this->_tpl_vars['logs']['speedCount'] == 0): ?>
			<h3>This panel has no log items.</h3>
		<?php else: ?>
			<table class='side' cellspacing='0'>
				<tr><td><var><?php echo $this->_tpl_vars['speedTotals']['total']; ?>
</var><h4>Load Time</h4></td></tr>
				<tr><td class='alt'><var><?php echo $this->_tpl_vars['speedTotals']['allowed']; ?>
 s</var> <h4>Max Execution Time</h4></td></tr>
			</table>
		
			<table class='main' cellspacing='0'>
			<?php $_from = $this->_tpl_vars['logs']['console']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
				<?php if ($this->_tpl_vars['log']['type'] == 'speed'): ?>
					<tr class='log-<?php echo $this->_tpl_vars['log']['type']; ?>
'>
						<td class="<?php echo smarty_function_cycle(array('values' => "alt,"), $this);?>
"><b><?php echo $this->_tpl_vars['log']['data']; ?>
</b> <?php echo $this->_tpl_vars['log']['name']; ?>
</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			</table>
		<?php endif; ?>
	</div>
	
	<div id='pqp-queries' class='pqp-box'>
		<?php if ($this->_tpl_vars['queryTotals']['count'] == 0): ?>
			<h3>This panel has no log items.</h3>
		<?php else: ?>
			<table class='side' cellspacing='0'>
			<tr><td><var><?php echo $this->_tpl_vars['queryTotals']['count']; ?>
</var><h4>Total Queries</h4></td></tr>
			<tr><td class='alt'><var><?php echo $this->_tpl_vars['queryTotals']['time']; ?>
</var> <h4>Total Time</h4></td></tr>
			<tr><td><var>0</var> <h4>Duplicates</h4></td></tr>
			</table>
			
				<table class='main' cellspacing='0'>
				<?php $_from = $this->_tpl_vars['queries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['query']):
?>
						<tr>
							<td class="<?php echo smarty_function_cycle(array('values' => "alt,"), $this);?>
">
								<?php echo $this->_tpl_vars['query']['sql']; ?>

								<?php if ($this->_tpl_vars['query']['explain']): ?>
								<em>
									Possible keys: <b><?php echo $this->_tpl_vars['query']['explain']['possible_keys']; ?>
</b> &middot; 
									Key Used: <b><?php echo $this->_tpl_vars['query']['explain']['key']; ?>
</b> &middot; 
									Type: <b><?php echo $this->_tpl_vars['query']['explain']['type']; ?>
</b> &middot; 
									Rows: <b><?php echo $this->_tpl_vars['query']['explain']['rows']; ?>
</b> &middot; 
								</em>
								<?php endif; ?>
								<em>Speed: <b><?php echo $this->_tpl_vars['query']['time']; ?>
</b></em>
							</td>
						</tr>
				<?php endforeach; endif; unset($_from); ?>
				</table>
		<?php endif; ?>
	</div>

	<div id="pqp-memory" class="pqp-box">
		<?php if ($this->_tpl_vars['logs']['memoryCount'] == 0): ?>
			<h3>This panel has no log items.</h3>
		<?php else: ?>
			<table class='side' cellspacing='0'>
				<tr><td><var><?php echo $this->_tpl_vars['memoryTotals']['used']; ?>
</var><h4>Used Memory</h4></td></tr>
				<tr><td class='alt'><var><?php echo $this->_tpl_vars['memoryTotals']['total']; ?>
</var> <h4>Total Available</h4></td></tr>
			</table>
		
			<table class='main' cellspacing='0'>
			<?php $_from = $this->_tpl_vars['logs']['console']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['log']):
?>
				<?php if ($this->_tpl_vars['log']['type'] == 'memory'): ?>
					<tr class='log-<?php echo $this->_tpl_vars['log']['type']; ?>
'>
						<td class="<?php echo smarty_function_cycle(array('values' => "alt,"), $this);?>
"><b><?php echo $this->_tpl_vars['log']['data']; ?>
</b> <em><?php echo $this->_tpl_vars['log']['dataType']; ?>
</em>: <?php echo $this->_tpl_vars['log']['name']; ?>
</td>
					</tr>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			</table>
		<?php endif; ?>
	</div>

	<div id='pqp-files' class='pqp-box'>
			<table class='side' cellspacing='0'>
				<tr><td><var><?php echo $this->_tpl_vars['fileTotals']['count']; ?>
</var><h4>Total Files</h4></td></tr>
				<tr><td class='alt'><var><?php echo $this->_tpl_vars['fileTotals']['size']; ?>
</var> <h4>Total Size</h4></td></tr>
				<tr><td><var><?php echo $this->_tpl_vars['fileTotals']['largest']; ?>
</var> <h4>Largest</h4></td></tr>
			</table>
			<table class='main' cellspacing='0'>
				<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['file']):
?>
					<tr><td class="<?php echo smarty_function_cycle(array('values' => "alt,"), $this);?>
"><b><?php echo $this->_tpl_vars['file']['size']; ?>
</b> <?php echo $this->_tpl_vars['file']['name']; ?>
</td></tr>
				<?php endforeach; endif; unset($_from); ?>
			</table>
	</div>
	
	<table id="pqp-footer" cellspacing="0">
		<tr>
			<td class="credit">
				<a href="http://particletree.com/features/php-quick-profiler/" target="_blank">
				<strong>PHP</strong> 
				<b class="green">Q</b><b class="blue">u</b><b class="purple">i</b><b class="orange">c</b><b class="red">k</b>
				Profiler</a></td>
			<td class="actions">
				<a href="#" onclick="toggleMetrics();return false">Metrics</a>
				<a href="#" onclick="toggleDetails();return false">Details</a>
				<a class="heightToggle" href="#" onclick="toggleHeight();return false">Height</a>
			</td>
		</tr>
	</table>
</div>
</div>