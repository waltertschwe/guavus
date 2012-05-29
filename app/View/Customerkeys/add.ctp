<!-- app/View/Users/add.ctp -->
<div class="users form">
<?php echo $this->Form->create('Customerkey'); ?>
    <fieldset>
        <legend><?php echo __('Add Customer Key'); ?></legend>
    <?php
        echo $this->Form->input('customer');
        echo $this->Form->input('accesskey');
       	echo $this->Form->input('products'); 
       	echo $this->Form->input('expires');
		echo $this->Form->input('notes');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>