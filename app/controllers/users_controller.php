<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Session');
	
	function beforeFilter(){
		$this->Auth->allow('login','logout','signup');
		parent::beforeFilter();
	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}


	 function signup() {
		 if ($this->data) {
 			if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
	 			$this->User->create();
 				if($this->User->save($this->data)){
	 				if($this->Auth->login($this->data)){
                                 
						$this->redirect("home"); 					
	 				}else{
                                     	}
 				}else{
                    $this->data['User']['password']='';
                    $this->data['User']['password_confirm']='';
                    $this->Session->setFlash('something wrong!');

                                }
 			}
 		}
 	}
 	
	function login()
	{
	
		if($this->data){
			$this->Auth->login($this->data);
		}
		
	}
	
	
	
	function logout(){
		$this->redirect($this->Auth->logout());
	}
	
	function home(){
		if (true==true){
			$this->set('user', $this->Auth->user());
		}else{
			$this->redirect(array('action' => 'login'));
		}
	}
	
	function show(){
		
		
		
		
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>