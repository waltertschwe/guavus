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
	</head>
<body id="dt_example">
<div id="container" style="width:90%">	
	<div id="header">
		<div id="logo">
		 	<?php echo $this->Html->image('guavus-lounge.png', array('alt' => 'Guavus Home')); ?>
		</div><!-- Header End -->
		<div id="new-key">
		</div>
		<div id="nav">
			<ul>
				<li>
					<?php echo $this->Html->link(
							$this->Html->image('keys-red.png', array('alt' => 'keys-red')),
							'../customerkeys',
							array('escape' => false));		
					 ?>
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
	
<div id="title">
	Activity
</div>

<div id="demo">
	<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
	<thead>
	<tr>
		<th>Solution</th>
		<th>Key</th>
		<th>Date</th>
		<th>Activity</th>
	</tr>
	</thead>

<?php foreach ($data as $activity) { ?>
	<tr class="gradeU">
 		<td class="center"><?php echo $activity['Activity']['solution']; ?></td>
 		<td class="center"><?php echo $activity['Activity']['accesskey']; ?></td>
 		<td><?php echo $activity['Activity']['date']; ?></td>
 		<td>
				<?php 
					$isDownload = $activity['Activity']['isDownload'];
					$isSlide    = $activity['Activity']['isSlide'];
					$isDemo     = $activity['Activity']['isDemo'];
					$isEmail    = $activity['Activity']['isEmail'];
					if($isDownload) {
						echo $this->Html->image('download.png'); 
						echo "&nbsp;";	
					}

					if($isSlide) {
						echo $this->Html->image('slides.png');
						echo "&nbsp;";	
					}
					
					if($isDemo) {
						echo $this->Html->image('launch-demo.png');
						echo "&nbsp;";	
					}
				
					if($isEmail) {
						echo $this->Html->image('email.png');
					}	
				?>
		</td>
 	</tr>
<?php } ?>
<tbody>
	<tfoot>
		<th>Solution</th>
		<th>Key</th>
		<th>Date</th>
		<th>Activity</th>
	</tfoot>
</table>
</div> <!-- datatable end -->
</div><!-- container end -->
</body>
</html>

