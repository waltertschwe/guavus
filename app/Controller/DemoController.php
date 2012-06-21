<?php
class DemoController extends AppController {
	var $uses = array('Customerkey','Solution');
	public function index() {
		$this->layout = 'cda';
		$lhash = $this -> Session -> read('lhash');
		$accesskey = $lhash['accesskey'];
		$menuItems = $this->Customerkey->find('first',array('conditions'=>array('accesskey'=>$accesskey)));
		$menuItems = $menuItems['Solution'];
		$this->set('menuItems',$menuItems);
			
	}
	
	public function index2() {
		$this->layout = 'cda';
		$lhash = $this -> Session -> read('lhash');
		$accesskey = $lhash['accesskey'];
		$menuItems = $this->Customerkey->find('first',array('conditions'=>array('accesskey'=>$accesskey)));
		$menuItems = $menuItems['Solution'];
		$this->set('menuItems',$menuItems);
			
	}
	
	public function beforeFilter() {
		if (!in_array($this->action,array('login','logout'),true)) {
			$lhash = $this -> Session -> read('lhash');
			if ($lhash == "") {
				$this->Session->setFlash(__('Not logged in'));
				$this->redirect(array('action' => 'login'));		
			} else {
				$this->Session->setFlash(__('Logged in'));
				if(strtotime($lhash['expiration_date']) < strtotime(date('Y-m-d')) ) {
					$this->Session->setFlash(__('Date Expired'));
					$this -> Session -> destroy();	
					$this->redirect(array('action' => 'login'));		
				
				}
			}
		}
	}
		
	public function login()  {
		$this->layout = 'cda';

		if ($this->request->is('post')) {
			$accesskey = trim($this->request['data']['login']['key']);
			$customerkey = $this->Customerkey->find('first',array('conditions'=>array('accesskey'=>$accesskey)));
	
			if ($customerkey) {
				$cdate = $customerkey['Customerkey']['expires'];
				
				
				if(strtotime($cdate) < strtotime(date('Y-m-d')) ) {
					$this->Session->setFlash(__('Key has already Expired'));
					$this->redirect(array('action' => 'login'));		
					
				} else {
					$this->Session->setFlash(__('You have logged in'));
					$this->Session->write('lhash',
					array('accesskey'=>$customerkey['Customerkey']['accesskey'],
					 'expiration_date'=>$customerkey['Customerkey']['expires']						
					));
					$this->redirect(array('action' => 'index'));
				}
				
		
			} else {
				$this->Session->setFlash(__('Customerkey does not exist'));	
				$this->redirect(array('action' => 'login'));		
							
			}

				
		}
		
	}
	
	
	public function solution($id) {
		#need to work on not displaying solutions  for not valid customers
		
		$this->layout = 'cda';
		$solution = $this->Solution->find('first',array('id'=>$id));
		$this->set('solution',$solution);
		

		#hardcoded customerkey
		$customerkey_id = 1;
		#find menu items.
		
		$menuItems = $this->Customerkey->find('first',array('id'=>$id));
		$menuItems = $menuItems['Solution'];
		$this->set('menuItems',$menuItems);
		
		
		
	}
		
	

}