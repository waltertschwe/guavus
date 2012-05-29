<?php 
class SolutionsController extends AppController {

    public function beforeFilter() {

    }

    public function index() {
        $this->Solution->recursive = 0;
        $this->set('solutions', $this->paginate());
    }

    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Solution->create();
            if ($this->Solution->save($this->request->data)) {
                $this->Session->setFlash(__('The Solution has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The solution could not be saved. Please, try again.'));
            }
        }
    }

    public function edit($id = null) {
        $this->Solution->id = $id;
        if (!$this->Solution->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Solution->save($this->request->data)) {
                $this->Session->setFlash(__('The customer key has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $this->request->data = $this->Solution->read(null, $id);
            
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