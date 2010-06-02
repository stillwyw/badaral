<?php
class AppController extends Controller {
	var $components = array('Auth');
	var $uses = array('User');
	
	function beforeFilter()
	{
	
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
	
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home');
		
		$this->Auth->logoutRedirect = '/';
		
		$this->Auth->loginError = 'Invalid e-mail / password combination.  Please try again';
		
		$this->Auth->authorize = 'controller';
		
		$this->Auth->autoRedirect = false;

		
		if($this->Auth->user()){
			$this->current_user = $this->Auth->user();
			$this->currentUserId = $this->current_user['User']['id'];
			$this->set('cuid',$this->currentUserId);
			$this->set('current_user',$this->current_user);

		}
	
		if(isset($this->params['userid'])){
			$user = $this->User->findById($this->params['userid']);
			if(empty($user)){
				$user = $this->User->findByUid($this->params['userid']);
			}
			$this->user = $user;
			if($this->user){
				$this->userid = $this->user['User']['id'];
			}
		}


	}
	
	function isAuthorized() {
		
	return true;	
		
		
/*		
		if ($this->action == 'delete') {
			if ($this->Auth->user('role') == 'admin') {
				return true;
			} else {
				return false;
			}
		}
		return true;
*/
	}



}







?>