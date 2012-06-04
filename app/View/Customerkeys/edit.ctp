<!DOCTYPE html>
<html>
	<head>
		<title>Customer Keys</title>
		<?php 
			  echo $this->Html->css('core.css');
			  echo $this->Html->css('jquery-ui-1.8.20.custom.css');
			  echo $this->Html->css('jquery.ui.datepicker.css');
			  echo $this->Html->script(array('jquery-1.7.2.min.js'));
			  echo $this->Html->script(array('jquery-ui-1.8.20.custom.min.js'));
			  echo $this->Html->script(array('jquery.ui.widget.js'));
			  echo $this->Html->script(array('jquery.ui.datepicker.js'));
		?>
		
 		<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
	</script>
	</head>
<body>
<div id="container" style="width:90%">
	<div id="header">
		<div id="logo">
		<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')); ?>
		</div>
		<div id="new-key">
			<a href=""><img src="/guavus/cakephp/img/new-key-button.png" /></a>
		</div>
		<div id="nav">
			<ul>
				<li><img src="/guavus/cakephp/img/keys-red.png" /></li>
				<a href=""><li><img src="/guavus/cakephp/img/products.png" /></li></a>
				<a href=""><li><img src="/guavus/cakephp/img/activity.png" /></li></a>
			</ul>
		</div>
	</div>
	<hr/>
	<div id="content">
<?php 
 
	echo $this->element('customerkeys/edit');
	
	
	
?>
</body>
</html>