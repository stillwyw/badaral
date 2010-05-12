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
		


	}



}







?>