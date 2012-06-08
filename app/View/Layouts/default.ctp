<html>
<head>
	<title>Guavus Home</title>
	<? echo $this->Html->css('global'); ?>
</head>	
<body>
	<div id="wrap">
		<div id="main">
			<div class="logo">
				<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'guavus-lounge', 'border' => '0')); ?>
			</div>
		</div>
		<div id="sidebar">
			<div id="demo">
				<?php echo $this->Html->image('demo.png', array('alt' => 'demo', 'border' => '0')); ?>
			</div>
			<div id="admin">
				<a href="customerkeys/">
				<?php 
				echo  $this->Html->image('admin.png', array('alt' => 'admin', 'border' => '0'));
				?>
				</a>
			</div>
		</div>
	</div>
</body>
</html>

