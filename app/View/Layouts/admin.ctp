<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title_for_layout; ?></title>

	</head>
<body>
<div id="container">	
	<div id="header">
		<div id="logo">
		 	<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')); ?>
		</div><!-- Header End -->
		<div id="new-key">
		 <?php	echo $this->Html->link(
		 				$this->Html->image('new-key-button.png'),
    					'add/',
						array('escape' => false));
		?>
		</div>
		<div id="nav">
			<ul>
				<li>
					<?php echo $this->Html->image('keys-red.png', array('alt' => 'keys-red')); ?>
				</li>
				<li>
					<a href=""><?php echo $this->Html->image('products.png', array('alt' => 'products')); ?></a>
				</li>
				<li>
					<a href=""><?php echo $this->Html->image('activity.png', array('alt' => 'activity')); ?></a>
				</li>
			</ul>
		</div>
	</div>
	<hr/>
	
</div><!-- container end -->
</body>
</html>
