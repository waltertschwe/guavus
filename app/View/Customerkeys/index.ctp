<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Customer Keys</title>
		<?php echo $this->Html->css('datatables_page.css');
		      echo $this->Html->css('datatables_table.css');
			  echo $this->Html->css('core.css');
			  echo $this->Html->script(array('jquery-1.7.2.min.js'));
			  echo $this->Html->script(array('jquery.dataTables.js'));
			  
		?>
		<script type="text/javascript" charset="utf-8">
				var handleIndexExpand = function() {
					$('tbody').on('click','.product-expand',function(event) {
					event.preventDefault();
					$(this).closest('.prod-group').find('.prod-items').toggle();
			
			
					})		
		
				}
		
				$(document).ready(function() {
				 oTable = $('#example').dataTable({
				 	//"sScrollY": "400px",
					"iDisplayLength": 100,
				});
				handleIndexExpand();
			} );
			

		</script> 
		<style type="text/css">
			#example_length
			{ display: none; }
			<?php if(count($customerkeys) < 99) {  
					echo "#example_paginate { display: none; }";
			} ?>
		</style> 

	</head>
<body id="dt_example">
<div id="container" style="width:90%">	
	<div id="header">
		<div id="logo">
		 	<?php echo
		 		$this->Html->link( 
		 			$this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')),
		 			'../',
		 			array('escape' => false));
		 	?>
		</div><!-- Header End -->
		<div id="new-key">
		 <?php	
				echo $this->Form->create('Customerkey', array('action' => 'add', 'type' => 'GET')); 
				echo $this->Form->input('New Key', array('type'=>'submit','label'=>false));
				echo $this->Form->end();
		?>
		</div>
		<div id="nav">
			<ul>
				<li>	
					<?php echo $this->Html->image('keys-red.png', array('alt' => 'keys-red')); ?>
				</li>
				<li>
					<?php  echo $this->Html->link( 
					          		$this->Html->image('products.png', array('alt' => 'products')),
					          		'../solutions',
					          		array('escape' => false));
					 ?>
				<li>
					<?php echo $this->Html->link(
							       $this->Html->image('activity.png', array('alt' => 'activity')),
							       '../activity',
							       array('escape' => false));
					?>
				</li>
			</ul>
		</div>
	</div>
	
<div id="title">
	Access Keys
</div>
<div id="flash">
<?php echo $this->Session->flash(); ?>
</div>
<div id="demo">
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
	<tr>
		<th>Customer</th>
		<th>Key</th>
		<th>Expires</th>
		<th>Products</th>
		<th>Notes</th>
	</tr>
	</thead>

<?php foreach ($customerkeys as $customerkey) { ?>
	<tr class="gradeU">
 		<td class="center"><?php echo $customerkey['Customerkey']['customer']; ?></td>
 		<td class="center">
 			<?php 
 				echo $this->Html->link($customerkey['Customerkey']['accesskey'], array('action' => 'edit', $customerkey['Customerkey']['id']));?>
 			
 		</td>
 		<td class="center"><?php 
 				$expires = $customerkey['Customerkey']['expires']; 
				$parts = explode(" ", $expires);
				$fullMonth = $parts[0];
				$date = explode("-", $fullMonth);
				$monthNum = $date[1];
				$month = monthMap($monthNum);
				//echo $parts[0];
				echo $date[0]. "-" .$month . "-" . $date[2];
 			?></td>
 		<td><?php 
 			echo $this->App->displayCustomerIndexProducts($customerkey['Solution']);
 		?></td>
 		<td><?php echo $customerkey['Customerkey']['notes']; ?></td>
 	</tr>
<?php } ?>
<tbody>
	<tfoot>
		<th>Customer</th>
		<th>Key</th>
		<th>Expires</th>
		<th>Products</th>
		<th>Notes</th>
	</tfoot>
</table>
</div> <!-- datatable end -->
</div><!-- container end -->
</body>
</html>
