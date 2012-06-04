<?php 
class CustomerkeysController extends AppController {

    public function beforeFilter() {

    }

    public function index() {
        
		$keys = $this->Customerkey->find('all');
		$this->layout = 'viewlayout';
        $this->set('customerkeys', $keys);
		 //$this->set('customerkeys', "");
    }

   
    public function add() {
     	$this->layout = 'viewlayout';
    	$products = $this->Customerkey->Product->find('list');
		$this->set(compact('products'));
		
        if ($this->request->is('post')) {
            $this->Customerkey->create();
            if ($this->Customerkey->save($this->request->data)) {
                $this->Session->setFlash(__('The Access Key has been saved'));
                $this->redirect(array('action' => 'index'));
               //$this->redirect(array('action' => 'edit',$this->Customerkey->getLastInsertID()));
                
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
    	$this->layout = 'viewlayout';
        $this->Customerkey->id = $id;
		$products = $this->Customerkey->Product->find('list');
		$this->set(compact('products'));
		
        if (!$this->Customerkey->exists()) {
            throw new NotFoundException(__('Invalid Customerkey'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
  
			$this->Customerkey->set($this->request->data);
			
            if ($this->Customerkey->validates()) {
            	if ($this->request->data['submitaction'] == 'Expire Now') {
        			$datArr = explode('-',date("Y-m-d", time() - (60*60*48)));
					$this->request->data['Customerkey']['expires']['year'] = $datArr[0];
        			$this->request->data['Customerkey']['expires']['month'] = $datArr[1];
        			$this->request->data['Customerkey']['expires']['day'] = $datArr[2];	
        		}
				$this->Customerkey->save($this->request->data);
				
                $this->Session->setFlash(__('The customer key has been updated.'));
                //var_dump($this->request->data);
                //$this->redirect(array('action' => 'edit',$id));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Customerkey->read(null, $id);
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}