<!DOCTYPE html>
<html>
	<head>
		<title>Customer Keys</title>
		<?php 
			  echo $this->Html->css('core.css');
			  echo $this->Html->css('jquery-ui-1.8.20.custom.css');
			  #echo $this->Html->css('jquery.ui.datepicker.css');
			  echo $this->Html->script(array('jquery-1.7.2.min.js'));
			  echo $this->Html->script(array('jquery-ui-1.8.20.custom.min.js'));
			  #echo $this->Html->script(array('jquery.ui.widget.js'));
			  #echo $this->Html->script(array('jquery.ui.datepicker.js'));
			  echo $this->Html->script(array('cms.js'));
			 			  
			  $url = $this->Html->url(array('controller'=>'customerkeys',
    					'action'=>'index'));
		?>
		<script type="text/javascript">			
			$(document).ready(function() { 
	 
    			$('.cancel button').click(function(event) {
			    location.href='<?php echo $url;?>' 			
     		});
	 		})
		</script>

	</head>
<body>
<div id="container" style="width:90%">
	<div id="header">
		<div id="logo">
		<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')); ?>
		</div>
		<div id="new-key">
			
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
	<div id="centered">	
<?php 
 
	echo $this->element('customerkeys/form');
		echo "<div class='buttons'>";
		echo '<div class="cancel">';	
			echo $this->Form->button('Cancel', array('type'=>'button'));	
		echo '</div>';
		echo $this->Form->input('Save', array('type'=>'submit','label'=>false));	
		echo "</div>";
		echo $this->Form->end();
	
?>
	</div>
	</div>
</div>
</body>
</html>