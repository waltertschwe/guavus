<h1>Edit Key</h1>
<?php
    echo $this->Form->create('Customerkey', array('action' => 'edit'));
    echo $this->Form->input('customer');
    echo $this->Form->input('accesskey');
    echo $this->Form->input('products'); 
    echo $this->Form->input('expires');
	echo $this->Form->input('notes');
	echo $this->Form->end('Save Customer');
	