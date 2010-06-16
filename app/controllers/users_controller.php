<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Session','Cookie');
	var $uses = array('User','Guest','Group','Note');
	
	function beforeFilter(){
	//  $this->Cookie->name = 'baker_id';
	//  $this->Cookie->time =  3600;  // or '1 hour'
	  $this->Cookie->path = '/'; 
	//  $this->Cookie->domain = 'example.com';   
	  $this->Cookie->secure = false;  //i.e. only sent if using secure HTTPS
	  $this->Cookie->key = 'qSI232qs*&sXOw!';
		$this->Auth->allow('login','logout','signup');
		parent::beforeFilter();


	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function mine()
	{
		if(isset($this->cuid) and isset($this->cuuid)){
			$this->redirect("/people/{$this->cuuid}/");
		}else{
			$this->redirect('/');
		}
	}
	 function signup() {
		 if ($this->data) {
 			if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
	 			$this->User->create();
 				if($this->User->save($this->data)){
 					$this->User->saveField('uid',"u{$this->User->id}");
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
		if ($this->Auth->user()) {
			if (!empty($this->data['User']['remember_me'])) {
				$cookie = array();
				$cookie['email'] = $this->data['User']['email'];
				$cookie['password'] = $this->data['User']['password'];
				$this->Cookie->write('Auth.User', $cookie, true, '+4 weeks');
				unset($this->data['User']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
		}
		if (empty($this->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
				if ($this->Auth->login($cookie)) {						
					//  Clear auth message, just in case we use it.
					$this->Session->delete('Message.auth');
					$this->redirect($this->Auth->redirect());
				}
			}
		}
	}
	
	
	
	function logout(){
		$this->Cookie->delete('Auth.User');
		$this->redirect($this->Auth->logout());
	}
	
	function home(){
		if (true==true){
			$this->set('user', $this->Auth->user());
		}else{
			$this->redirect(array('action' => 'login'));
		}
	}
	

	function view() {
		if (!isset($this->params['uid'])) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect('/');
		}
		$notes = $this->Note->find('all',array('conditions'=>array('Note.user_id'=>$this->uid),'limit'=>5,'order'=>'Note.created desc'));
		$guests=$this->Guest->find('all',array('conditions'=>array('Guest.user_id'=>$this->uid),'limit'=>5,'order'=>'Guest.created desc'));
		$this->set('guests', $guests);
		$this->set('user', $this->user);
		$this->set('notes',$notes);
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