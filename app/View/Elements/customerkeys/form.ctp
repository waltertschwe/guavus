<?php
/*
    echo $this->Form->create('Customerkey');
    echo $this->Form->input('customer');
    echo $this->Form->input('accesskey');
    echo $this->Form->input('Product',array('multiple'=>'checkbox',"div" => "required")); 
    echo $this->Form->input('expires',array('type'=>'date', 'dateFormat'=>'MDY'));
	echo $this->Form->input('notes');
*/
?>

	 	<?php echo $this->Form->create('Customerkey', array('class' => 'form')); ?>
        <?php echo $this->Form->input('customer'); ?>       
        <?php echo $this->Form->input('accesskey'); ?>
      
      <div id='products'><label>Product</label>  
      	<div class="groups">
 <?php  
    foreach (array_keys($groupProducts) as $key) {
		echo "<div class='prod-group'>";
		echo "<span><input class='group-check' type='checkbox' name='_group'/>".$key."<a href='#' class='product-expand'>&gt;</a></span>";
		echo $this->Form->input('Solution', array('div'=>array('class'=>'prod-items'),'label'=>false,'multiple' => 'checkbox','hiddenField'=>false,'options'=>$groupProducts[$key]));
		echo "</div>";
		echo "<div class='clearfix'></div>";
	}
       
 ?>
 		</div>
 </div>       
 		<div class="clearfix"></div>      


        <?php /* echo $this->Form->input('Product',array('multiple'=>'checkbox' ,'style' => 'float: left; display: inline') ); */?>
        <?php echo $this->Form->input('expires',array('class'=>'datepicker','type'=>'text'));?>
       	<?php echo $this->Form->input('notes',array('type'=>'textarea')); ?>
         
        
   	    
     
