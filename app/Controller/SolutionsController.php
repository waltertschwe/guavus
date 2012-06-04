<?php 	
class SolutionsController extends AppController {
	
	
	private function handleCheckBox () {
		if (is_array($this->request->data['Solution']['products'])) {
		$this->request->data['Solution']['products'] = implode(',',$this->request->data['Solution']['products']);
	
		}
	}	


	
	private function uploadFile($field) {
		$target = 'c:/xampp2/htdocs/guavusImage/';
		$fileArray = $this->request->data['Solution'][$field];
	
		if ($fileArray['error'] > 0) {
									
			
			//$this->Solution->validationErrors[$field] = "Submit a file please";
			
			
			
		} else {
			//$now = date('Y-m-d-His');
			$filename = $fileArray['name'];
      		var_dump('$fileArray');
			move_uploaded_file($fileArray['tmp_name'],
			$target.$filename);
			$this->request->data['Solution'][$field.'_name'] = $filename;
			$this->request->data['Solution'][$field.'_type'] = $fileArray['type'];
			return true;
			
		}
			
	}
	


    public function beforeFilter() {

    }

    public function index() {
    	    	$this->layout = 'lame2';
		
        $this->Solution->recursive = 0;
        $this->set('solutions', $this->paginate());
    }

    public function view($id = null) {
        $this->Solution->id = $id;
        if (!$this->Solution->exists()) {
            throw new NotFoundException(__('Invalid solution'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
    	$this->Solution->recursive = 0;
        $this->set('solutions', $this->paginate());
		
    	$this->layout = 'lame';
        if ($this->request->is('post')) {
			
			$solution = $this->request->data;
			if (is_array($solution['Solution']['products'])) {
			
      			$solution['Solution']['products'] = implode(',',$solution['Solution']['products']);
			}		
			
			$this->Solution->set($solution);
            if ($this->Solution->validates()) {
            	$this->handleCheckBox();
				$this->uploadFile('video');
				$this->uploadFile('slide');
				$this->Solution->save($solution);			
               	$this->Session->setFlash(__('The Solution has been saved'));
               	$this->redirect(array('action' => 'index'));
			} else {
                $this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
            }
        } 
    }

    public function edit($id = null) {
    	$this->Solution->recursive = 0;
        $this->set('solutions', $this->paginate());
		
        $this->Solution->id = $id;
		    $this->layout = 'lame';
        if (!$this->Solution->exists()) {
            throw new NotFoundException(__('Invalid solution'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
        	
			$solution = $this->request->data;
			if (is_array($solution['Solution']['products'])) {
			
      			$solution['Solution']['products'] = implode(',',$solution['Solution']['products']);
			}
        	$this->Solution->set($solution);
			
            if ($this->Solution->validates()) {
    			$this->uploadFile('video');
				$this->uploadFile('slide');
				$this->handleCheckBox();
				$this->Solution->save($solution);
                $this->Session->setFlash(__('The customer key has been saved'));
                $this->redirect(array('action' => 'index'));
                //$this->redirect(array('action' => 'edit',$id));
                
            } else {
				
                $this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Solution->read(null, $id);
			$this->request->data['Solution']['products'] = explode(",",$this->request->data['Solution']['products']);
			
			
        }
    }

    public function delete($id = null) {
        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException();
        }
        $this->Solution->id = $id;
        if (!$this->Solution->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Solution->delete()) {
            $this->Session->setFlash(__('Solution deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Solution was not deleted'));
        $this->redirect(array('action' => 'index'));
    }
}