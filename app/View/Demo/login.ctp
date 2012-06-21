<!DOCTYPE html>
<html class="main-page">
<head>
	<title>Guavus Home</title>
	 <?php echo $this->Html->css('cda.css'); ?>
</head>	
<body>
	<div id="wrap">
			<?php echo $this->Session->flash(); ?>
		<div id="main">
			<div class="logo">
				<?php echo $this->Html->image('guavus-lounge.png'); ?>
				
		</div>
	<div id="sidebar">
	<?php  
		echo $this->Form->create('login', array('type' => 'POST', 'id' => 'key-word-form'));
		echo $this->Form->input('key', array('type' => 'text', 'placeholder' => 'key', 'label' => ''));
		echo $this->Form->submit('arrow.png', array('class' => 'submit-button'));
		echo $this->Form->end(); 
	?>	
	</div>
</div>
</body>
</html>
