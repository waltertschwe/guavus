<!DOCTYPE html>
<html>
	<head>
		<title>Customer Keys</title>
		<?php echo $this->Html->css('datatables_page.css');
		      echo $this->Html->css('datatables_table.css');
			  echo $this->Html->css('core.css');
			  echo $this->Html->script(array('jquery-1.7.2.min.js'));
			  echo $this->Html->script(array('jquery.dataTables.js'));
		?>
		<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
				 oTable = $('#example').dataTable({
				 	//"sScrollY": "400px",
					"iDisplayLength": 10,
					"sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
     	 		    "aaSorting": [[0,'asc']],
					"sPaginationType": "two_button",
				});
			} );
		</script> 
	</head>
<body id="dt_example">
<div id="container" style="width:90%">	
	<div id="header">
		<div id="logo">
		 	<img src="/guavus/cakephp/img/guavus-lounge.png" /> 
		</div><!-- Header End -->
		<div id="new-key">
			<a href="/guavus/cakephp/customerkeys/add"><img src="/guavus/cakephp/img/new-key-button.png" /></a>
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
<!--<div class="full_width big">
	Access Keys
</div>
-->
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
		<th>Products</th>
		<th>Expires</th>
		<th>Notes</th>
	</tr>
	</thead>

<?php foreach ($customerkeys as $customerkey) { ?>
	<tr class="gradeX">
 		<td class="center"><?php echo $customerkey['Customerkey']['customer']; ?></td>
 		<td class="center"><?php echo $customerkey['Customerkey']['accesskey']; ?></td>
 		<td><?php 
 		echo implode(", ",array_map(function($arr) {return $arr['name'];},$customerkey['Product']));?></td>
 		<td><?php echo $customerkey['Customerkey']['expires']; ?></td>
 		<td><?php echo $customerkey['Customerkey']['notes']; ?></td>
 	</tr>
<?php } ?>
<tbody>
	<tfoot>
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
