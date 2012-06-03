<!DOCTYPE html>
<html>
	<head>
		<title>Customer Keys</title>
		<link rel="stylesheet" href="css/datatables_page.css"  />
		<link rel="stylesheet" href="css/datatables_table.css" />
		<link rel="stylesheet" href="css/core.css" />
		<script type="text/javascript" language="javascript" src="js/jquery-1.7.2.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {
				oTable = $('#example').dataTable({
					"sDom": '<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>',
     	 		    "aaSorting": [[1,'asc']],
					"sPaginationType": "two_button"
				});
			} );
		</script> 
	</head>
<body id="dt_example">
<div id="container" style="width:80%">	
	<div id="header">
		<div id="logo">
		 <img src="img/guavus-lounge.png" /> 
		</div>
	</div><!-- Header End -->
<div class="full_width big">
	Access Keys
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
