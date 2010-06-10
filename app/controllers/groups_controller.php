<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $uses = array('GroupPost','Group','User','GroupMembership');
	var $components = array('Session');
	var $paginate=array(
			'limit'=>4
			);

	function beforeFilter()
	{
		parent::beforeFilter();
		if ($this->params['action']!='index'and$this->params['action']!='add') {
		if((!empty($this->current_group)&&!empty($this->current_user))){
			$membership = $this->GroupMembership->find('first',array(
			'conditions'=>array(
				'GroupMembership.group_id'=>$this->cgid,
				'GroupMembership.user_id'=>$this->cuid				
				)));
			$this->role = $membership['GroupMembership']['role'];
			$this->set('group_role',$this->role);
		}else{
			$this->Session->setFlash('页面不存在，无权访问。');
			$this->redirect(array('action'=>'index'));
		}
		}

	}
	function index() {

		$group_ids = $this->GroupMembership->find('list',array('fields'=>array('GroupMembership.group_id'),'conditions'=>array('GroupMembership.user_id'=>$this->cuid)));
		
		$posts = $this->paginate('GroupPost',array("GroupPost.group_id"=>$group_ids));
		
		$groups_joined = $this->Group->query("SELECT * FROM `groups` as `Group` 
					JOIN group_memberships as `GroupMembership` on `GroupMembership`.group_id = `Group`.id
					where `GroupMembership`.user_id = ?	and `GroupMembership`.role = ? ", array($this->cuid, GroupMembership::member));
		$groups_admined = $this->Group->query("SELECT * FROM `groups` as `Group` 
					JOIN group_memberships as `GroupMembership` on `GroupMembership`.group_id = `Group`.id
					where `GroupMembership`.user_id = ?	and `GroupMembership`.role = ? ", array($this->cuid, GroupMembership::admin));
		$this->set('posts',$posts);
		$this->set('groups_joined',$groups_joined);
		$this->set('groups_admined',$groups_admined);
	}

	function view($gid = null) {
		$group = $this->current_group;
		$group_id = $this->cgid;
		if (!isset($group)&&!$group) {
			$this->Session->setFlash(__('Invalid group', true));
			$this->redirect(array('action' => 'index'));
		}
		$creatorId = $this->GroupMembership->find('first',array(
				'conditions'=>array("GroupMembership.group_id "=> $group_id,"GroupMembership.role"=>GroupMembership::admin)
			));
		$creatorId = $creatorId['GroupMembership']['user_id'];
		$creator=$this->User->findById($creatorId);
		$memberShips = $this->GroupMembership->find('list',array('fields'=>'GroupMembership.user_id',
				'conditions'=>array("GroupMembership.group_id"=>$this->cgid, "GroupMembership.role <>"=>GroupMembership::blocked)
				));
		$members = $this->User->find('all',array('conditions'=>array('User.id '=>$memberShips),'limit'=>10,'order'=>'id desc'));
		$this->set('members',$members);
		$this->set('group', $this->current_group);
		$this->set('posts',$this->paginate('GroupPost',array("GroupPost.group_id "=>$group_id)));
	}

	function add() {
		if (!empty($this->data)) {
			echo 'here';
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$groupId = $this->Group->id;
				$this->Group->saveField('gid',"g{$groupId}");
				$gid = "g{$groupId}";
				$this->GroupMembership->create();
				$_data = array(
					'GroupMembership'=>
						array(
						'user_id'=>$this->cuid,
						'group_id'=>$groupId,
						'role'=>GroupMembership::admin
					));
				$this->GroupMembership->save($_data);
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect("/group/{$gid}");
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('users'));
	}

	function edit() {
					echo $this->role;

		if (!isset($this->role)) {
			$this->Session->setFlash(__('您无权访问该页面。', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->Group->id=$this->current_group_id;
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('修改成功。', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->current_group;
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash(__('Group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>