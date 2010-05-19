<?php
class AppController extends Controller {
	var $components = array('Auth');
	
	function beforeFilter()
	{
	
		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
	
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home');
		
		$this->Auth->logoutRedirect = '/';
		
		$this->Auth->loginError = 'Invalid e-mail / password combination.  Please try again';
		
		$this->Auth->authorize = 'controller';
		
		if($this->Auth->user()){
			$this->current_user = $this->Auth->user();
			$this->currentUserId = $this->current_user['User']['id'];
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