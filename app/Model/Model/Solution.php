<?php
// app/Model/Solution.php
class Solution extends AppModel {
    public $name = 'Solution';
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            )
        ),
        'products' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A product is required'
            )
        ),
        'category' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A category is required'
            )
        ),
        'demo_url' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A demo url is required'
            )
        )
 

        
    );
	
	
}