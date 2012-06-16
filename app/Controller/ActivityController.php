<?php

class ActivityController extends AppController {
	
	public function beforeFilter() {

    }
	
	public function index() {
		
		$data = $this->Activity->find('all');	
		$this->layout = 'viewlayout';	
		$this->set('data', $data);
	}
}
