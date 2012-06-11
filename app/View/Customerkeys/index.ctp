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
					"iDisplayLength": 10,
					"sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
     	 		    "aaSorting": [[1,'asc']],
					"sPaginationType": "two_button",
				});
				handleIndexExpand();
			} );
			

		</script> 
	</head>
<body id="dt_example">
<div id="container" style="width:90%">	
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
					<?php echo $this->Html->link( 
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
	<hr/>
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
		<th>Action</th>
		<th>Customer</th>
		<th>Key</th>
		<th>Products</th>
		<th>Expires</th>
		<th>Notes</th>
	</tr>
	</thead>

<?php foreach ($customerkeys as $customerkey) { ?>
	<tr class="gradeX">
		<td>
			 <?php 
			 		$customerId = $customerkey['Customerkey']['id'];
			 		echo $this->Html->link(
		 				$this->Html->image('edit-icon.png', array('alt' => 'activity', 'width' => '25', 'height' => '25')),
    					'edit/' . $customerId,
						array('escape' => false));
			?>	
		</td>
 		<td class="center"><?php echo $customerkey['Customerkey']['customer']; ?></td>
 		<td class="center"><?php echo $customerkey['Customerkey']['accesskey']; ?></td>
 		<td><?php /*
 		var_dump($customerkey['Solution']);
 		echo implode(", ",array_map(function($arr) {return $arr['name'];},$customerkey['Solution']));*/
 		echo $this->App->displayCustomerIndexProducts($customerkey['Solution']);
 		?></td>
 		<td><?php echo $customerkey['Customerkey']['expires']; ?></td>
 		<td><?php echo $customerkey['Customerkey']['notes']; ?></td>
 	</tr>
<?php } ?>
<tbody>
	<tfoot>
		<th>Action</th>
		<th>Customer</th>
		<th>Key</th>
		<th>Products</th>
		<th>Expires</th>
		<th>Notes</th>
	</tfoot>
</table>
</div> <!-- datatable end -->
</div><!-- container end -->
</body>
</html>
