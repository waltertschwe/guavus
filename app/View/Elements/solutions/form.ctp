<?php
/*
    $this->Html->scriptBlock("
    $(document).ready(function() { 
	   	$('#SolutionCategory').autocomplete({
	  		source:".$jscatarray." ,		        
	     	minLength:0
	     	
		});
		$('#showall').on('click', function () {
	 	   $('#SolutionCategory').autocomplete('search' , '');
	 	   return false;
		});
   });
   
   ",array('inline'=>false));
 * 
 */
?>
  
  
   <?php
   		
   		echo $this->Form->create('Solution',array('type' => 'file')); 
        echo $this->Form->input('name');
		$products = array('Wireless'=>'Wireless','Broadband'=> 'Broadband','Cable'=>'Cable');
		//$options = array('product1'=>'product11','product2'=>'product22','product3'=>'product3');
        //echo $this->Form->input('products',array('options'=>$options,'multiple'=>'checkbox'));
		//$options = array('cat1' => 'cat11', 'cat2' => 'cat22'); 
    	echo $this->Form->input('product',array('options'=>$products,'type'=>'radio')); 
		
		
		$options = array('cat1' => 'cat11', 'cat2' => 'cat22'); 
		
		echo $this->Form->input('category',array('options'=>$options)); 
		#$options = array('cat1' => 'cat11', 'cat2' => 'cat22'); 
		
		//echo $this->Form->input('category');
		//echo '<button id="showall">Show all</button>';
		?>
		 
	<?php	
	    echo $this->Form->input('demo_url');
		echo $this->Form->input('slide', array('type' => 'file'));
		echo $this->Form->input('video', array('type' => 'file'));
		echo $this->Form->input('notes',array('type'=>'textbox'));
		echo $this->Form->end($submittext);
		
    ?>