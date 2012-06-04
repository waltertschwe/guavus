<?php
// app/Model/CustomerKeys.php
class Customerkey extends AppModel {
    public $name = 'Customerkey';
	public $hasAndBelongsToMany = array(
	 	'Product' =>
	 		array(
				'className' => 'Product',
				'joinTable' => 'customer_products',
				'foreignKey' => 'customerkey_id',
				'associatingForeignKey' => 'product_id',
				'unique' => true,
				'conditions'             => '',
                'fields'                 => '',
                'order'                  => '',
                'limit'                  => '',
                'offset'                 => '',
                'finderQuery'            => '',
                'deleteQuery'            => '',
                'insertQuery'            => ''
			
			)
	);	
	
    public $validate = array(
        'customer' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A customer is required'
            )
        ),
        'accesskey' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A key is required'
            )
        ),
        'Product' => array(
               'multiple' => array(
                'rule' => array('multiple',array('min' => 1)),
                'message' => 'Please select at least 1 category')
            
        ),
        'expires' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A expiration date is required'
            )
        )
    );
}