<?php
class SiteController extends AppController {
	var $name='Site';
	var $uses = array('User');
	var $components = array('Session');

	function beforeFilter(){
		$this->Auth->allow('about');
		parent::beforeFilter();
	}
	function index(){
		if($this->Session->check('Auth.User')){
			$this->redirect(array('controller'=>'users','action' => 'home'));
		}else{
			
		}
		
	}
	function about(){
		
	}
}


?>