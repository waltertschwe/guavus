<!-- app/View/Users/add.ctp -->
<div class="solutions form">
<?php echo $this->Form->create('Solution'); ?>
    <fieldset>
        <legend><?php echo __('Solution'); ?></legend>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('products');
       	echo $this->Form->input('category'); 
       	echo $this->Form->input('demo_url');
		echo $this->Form->file('slide_name',array('name'=>'Slide'));
		echo $this->Form->file('video_name');
		echo $this->Form->textarea('notes');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>