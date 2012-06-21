<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title_for_layout; ?></title>
		<?php 
			  echo $this->Html->css('core.css');
			  echo $this->Html->css('jquery-ui-1.8.20.custom.css');
			  echo $this->Html->script(array('jquery-1.7.2.min.js'));
			  echo $this->Html->script(array('jquery-ui-1.8.20.custom.min.js'));
			  echo $this->Html->script(array('cms.js'));
			  echo $this->fetch('meta');
			  echo $this->fetch('css');
			  echo $this->fetch('script');
		?>
	</head>
<body>
<div id="container" style="width:90%">		
	<div id="header">
		<div id="logo">
		 	<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')); ?>
		</div><!-- Header End -->
		<div id="new-key">
		<?php echo $this->Html->link('Add New Solution',
array('controller' => 'solutions', 'action' => 'add')); ?>
	
		</div>
		<div id="nav">
			<ul>
				<li>
					<?php	echo $this->Html->link(
		 				$this->Html->image('keys-red.png', array('alt' => 'keys-red')),
    					array('controller' => 'customerkeys', 'action' => 'index'),
						array('escape' => false));
					?>
					
				</li>
				<li>
					<?php	echo $this->Html->link(
		 				$this->Html->image('products.png', array('alt' => 'products')),
    					array('controller' => 'solutions', 'action' => 'index'),
						array('escape' => false));
					?>
	
					
				</li>
				<li>
					<?php	echo $this->Html->link(
		 				$this->Html->image('activity.png', array('alt' => 'activity')),
    					array('controller' => 'activity', 'action' => 'index'),
						array('escape' => false));
					?>
				</li>
			</ul>
		</div>
	</div>
	
	<?php echo $this->fetch('content'); ?>

</div><!-- container end -->
</body>
</html>
