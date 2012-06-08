<?php
// app/Model/Solution.php
class Solution extends AppModel {
    public $name = 'Solution';
/*
	public $hasOne = array(
        'Product' => array(
            'className'    => 'Product',
            'foreignKey'   => 'solution_id',
            'dependent'    => true
        )
    );
 * 
 */
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A name is required'
            )
        ),
        'product' => array(
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
        ),
        'slide_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A slide name is required'
            )
        ),
       'slide_type' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A slide type is required'
            )
        ),
        'video_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A video name is required'
            )
        ),
        'video_type' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A video type is required'
            )
        ) 

        
    );
}