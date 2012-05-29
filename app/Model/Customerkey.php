<?php
// app/Model/CustomerKeys.php
class Customerkey extends AppModel {
    public $name = 'Customerkey';
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
        'products' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A product is required'
            )
        ),
        'expires' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A expiration date is required'
            )
        )
    );
}