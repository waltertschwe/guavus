
<?php 
	$this->Html->css('datatables_page.css',null, array('inline' => false));
	$this->Html->css('datatables_table.css',null,array('inline' => false));
	$this->Html->script(array('jquery.dataTables.js'), array('inline' => false));
			  

	$this->Html->scriptBlock("
		
			$(document).ready(function() {
				 oTable = $('#example').dataTable({
				 	//'sScrollY': '400px',
					'iDisplayLength': 10,
					'sDom': '<\"top\"iflp<\"clear\">>rt<\"bottom\"iflp<\"clear\">>',
     	 		    'aaSorting': [[1,'asc']],
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

  <?php echo $this->Html->link('Add New',
array('controller' => 'solutions', 'action' => 'add')); ?>

<div id="demo">

<table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
    <thead>
    <tr>
    	<th>Action</th>
        <th>Vertical</th>
        <th>Solution</th>
        <th>Category</th>
		<th>Media</th>
    </tr>
	</thead>
    <!-- Here is where we loop through our $posts array, printing out post info -->

    <?php foreach ($solutions as $solution): ?>
	<tr class="gradeX">
		<td>
			 <?php 
			 		$solutionId = $solution['Solution']['id'];
			 		echo $this->Html->link(
		 				$this->Html->image('edit-icon.png', array('alt' => 'activity', 'width' => '25', 'height' => '25')),
    					'edit/' . $solutionId,
						array('escape' => false));
			?>	
		</td>    	
    	
        <td class="center"><?php echo $solution['Solution']['product']; ?></td>
        <td class="center"><?php echo $solution['Solution']['name']; ?></td>
        <td class="center"><?php echo $solution['Solution']['category']; ?></td>
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

    </tr>
    <?php endforeach; ?>
    <tfoot>
   		<th>Action</th>
        <th>Vertical</th>
        <th>Solution</th>
        <th>Category</th>
        <th>Media</th>
	</tfoot>
</table>
</div>


 
