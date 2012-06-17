<?php
class DemoController extends AppController {
			
	var $uses = array('Customerkey','Solution');
	
	public function login() {
	    if ($this->request->is('post')) {
	        if ($this->Auth->login()) {
	            $this->redirect($this->Auth->redirect());
	        } else {
	            $this->Session->setFlash(__('Invalid username or password, try again'));
	        }
	    }
	}

	public function logout() {
	    $this->redirect($this->Auth->logout());
	}	
		
	public function index() {
		$this->layout = 'cda';
		
	}
	
	
	public function solution($id) {
		#need to work on not displaying solutions  for not valid customers
		
		$this->layout = 'cda';
		$solution = $this->Solution->find('first',array('conditions'=>array('id'=>$id)));
		$this->set('solution',$solution);
		

		#hardcoded customerkey
		$customerkey_id = 43;
		#find menu items.
		
		$menuItems = $this->Customerkey->find('first',array('conditions'=>array('id'=>$customerkey_id)));
		
		$menuItems = $menuItems['Solution'];
		$this->set('menuItems',$menuItems);
		
		
	}
	
}