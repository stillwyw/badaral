<?php
class AppController extends Controller {
	var $components = array('Auth','Cookie','Session');
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
			$this->current_user = $this->User->findById($this->current_user['User']['id']);
			$this->cuid = $this->current_user['User']['id'];
			$this->cuuid = $this->current_user['User']['uid'];
			$this->set('cuid',$this->cuid);
			$this->set('cuuid',$this->cuuid);
			$this->set('current_user',$this->current_user);

		}
		// user stuffs
		if(isset($this->params['uid'])){
			$user = $this->User->findById($this->params['uid']);
			if(empty($user)){
				$user = $this->User->findByUid($this->params['uid']);
			}
			$this->user = $user;
			if($this->user){
				$this->uid = $this->user['User']['id'];
				$this->uuid = $this->user['User']['uid'];
				$this->set('uuid', $this->uuid);
				$this->set('uid',$this->uid);
			}
		}
		// group stuffs
		if(isset($this->params['gid'])){
			$group = $this->Group->findByGid($this->params['gid']);
			$this->current_group = $group;
			$this->cgid = $group['Group']['id'];
			$this->cggid = $group['Group']['gid'];
			$this->set('gid',$this->params['gid']);
		}
		// ownership
		if (isset($this->cuid)&&isset($this->uid)) {
			$this->set('own',($this->cuid==$this->uid));
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

	function afterFilter()
	{

	}

}







?>