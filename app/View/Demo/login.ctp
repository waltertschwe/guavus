<div class="users form">
	
<?php echo $this->Session->flash(); ?>
	
<?php echo $this->Form->create('login'); ?>
    <fieldset>
        <legend><?php echo __('Please enter a key'); ?></legend>
    <?php
        echo $this->Form->input('key');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>