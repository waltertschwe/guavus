
<?php 
	$this->Html->css('datatables_page.css',null, array('inline' => false));
	$this->Html->css('datatables_table.css',null,array('inline' => false));
	$this->Html->script(array('jquery.dataTables.js'), array('inline' => false));
			  

	$this->Html->scriptBlock("
		
			$(document).ready(function() {
				 oTable = $('#example').dataTable({
				 	//'sScrollY': '400px',
					'iDisplayLength': 100,
     	 		    'aaSorting': [[0,'asc']],
					'sPaginationType': 'two_button',
				});
			} );
	",array('inline'=>false));			

?>

<div id="title">
	Solutions
</div>
<div id="flash">
<?php echo $this->Session->flash(); ?>
</div>

<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
    <thead>
    <tr>
    	<th>Name</th>
        <th>Vertical</th>
        <th>Category</th>
        <th>Demo URL</th>
		<th>Slides</th>
		<th>Notes</th>
    </tr>
	</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($solutions as $solution): ?>
	<tr class="gradeU">
		<td>
			 <?php 
			 	echo $this->Html->link($solution['Solution']['name'], array('action' => 'edit', $solution['Solution']['id']));?> 		
		</td>    	
    	
        <td class="center"><?php echo $solution['Solution']['product']; ?></td>
        <td class="center"><?php echo $solution['Solution']['category']; ?></td>
        <td class="center"><?php echo $solution['Solution']['demo_url']; ?></td>
        <td>
        	<?php
        		$video = $solution['Solution']['video_name'];
        		$slide = $solution['Solution']['slide_name'];
				
				if(!empty($video)) {
					echo $this->Html->image('video.png');
					echo "&nbsp;";
				}
				
				if(!empty($slide)) {
				    echo $this->Html->image('slides.png');
				}
				
				
        	?>
        	
        </td>
        <td><?php echo $solution['Solution']['notes']; ?></td>

    </tr>
    <?php endforeach; ?>
    <tfoot>
   		<th>Name</th>
        <th>Vertical</th>
        <th>Category</th>
        <th>Demo URL</th>
		<th>Slides</th>
		<th>Notes</th>
	</tfoot>
</table>
</div>


 
