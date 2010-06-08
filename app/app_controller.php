<?php
class AppController extends Controller {
	var $components = array('Auth','Cookie');
	var $uses = array('User','Group','GroupMembership');
	
	function beforeFilter()
	{

		$this->Auth->fields = array('username' => 'email', 'password' => 'password');
	
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		
		$this->Auth->loginRedirect = array('controller' => 'users', 'action' => 'home');
		
		$this->Auth->logoutRedirect = '/';
		
		$this->Auth->loginError = '用户名或密码错误，请重试。';
		
		$this->Auth->authError = "对不起，请先登录。";
		
		$this->Auth->authorize = 'controller';
		
		$this->Auth->autoRedirect = false;

		// current user
		if($this->Auth->user()){
			$this->current_user = $this->Auth->user();
			$this->current_user_id = $this->current_user['User']['id'];
			
			
			$this->set('cuid',$this->current_user_id);
			$this->set('current_user',$this->current_user);

		}
		// user stuffs
		if(isset($this->params['userid'])){
			$user = $this->User->findById($this->params['userid']);
			if(empty($user)){
				$user = $this->User->findByUid($this->params['userid']);
			}
			$this->user = $user;
			if($this->user){
				$this->userid = $this->user['User']['id'];
				$this->uid = $this->user['User']['uid'];
				$this->set('uid',$this->user['User']['uid']);
			}
		}
		// group stuffs
		if(isset($this->params['gid'])){
			$group = $this->Group->findByGid($this->params['gid']);
			$this->current_group = $group;
			$this->current_group_id = $group['Group']['id'];
			$this->current_gid = $group['Group']['gid'];
			$this->set('gid',$this->params['gid']);
		}
		// ownership
		$this->set('own',($this->current_user_id==$this->userid));

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