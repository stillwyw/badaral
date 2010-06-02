<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $uses = array('GroupPost','Group','User','GroupMembership');
	var $components = array('Session');
	var $current_group=null;
	var $current_group_id = null;
	function beforeFilter()
	{
		parent::beforeFilter();
		if(isset($this->params['gid'])){
			$group = $this->Group->findByGid($this->params['gid']);
			$this->current_group = $group;
			$this->current_group_id = $group['Group']['id'];
		}
	}


	function index() {
		//$this->Group->recursive = 0;
		$userId = $this->current_user['User']['id'];
/*
		$groups_joind = $this->User->GroupMembership->Group->find('all',array(
			'recursive'=>3,
			'conditions'=>array('User.id '=>$userId),
			'limit'=>10,
			'order'=>'GroupMembership.created'									
			));
*/
/*   
	//this is a useable code but little bit un-efficient ....
		$group_ids = $this->User->GroupMembership->find('list',array(
			'fields'=>array('GroupMembership.group_id','GroupMembership.group_id'),
			'conditions'=>array('GroupMembership.user_id'=>$userId)
			));
		$posts = $this->User->GroupMembership->Group->GroupPost->find('all',array(
																														'conditions'=>array('Group.id'=>$group_ids),
																														'limit'=>20,
																														'order'=>array('GroupPost.id','desc')
																														));
*/
		$posts = $this->GroupPost->query("SELECT * FROM `group_posts` as `GroupPost`
													join groups as `Group` on `Group`.id = `GroupPost`.group_id
													join group_memberships as `GroupMembership` on `GroupMembership`.group_id = `Group`.id
													join users as `User` on `User`.id = `GroupMembership`.user_id
													where `User`.id = ? order by `GroupPost`.id desc limit 20 ",array($userId));
		$groups_joined = $this->Group->query("SELECT * FROM `groups` as `Group` 
					JOIN group_memberships as `GroupMembership` on `GroupMembership`.group_id = `Group`.id
					where `GroupMembership`.user_id = ?	and `GroupMembership`.role = ? ", array($userId, GroupMembership::member));
		$groups_admined = $this->Group->query("SELECT * FROM `groups` as `Group` 
					JOIN group_memberships as `GroupMembership` on `GroupMembership`.group_id = `Group`.id
					where `GroupMembership`.user_id = ?	and `GroupMembership`.role = ? ", array($userId, GroupMembership::admin));
		$this->set('posts',$posts);
		$this->set('groups_joined',$groups_joined);
		$this->set('groups_admined',$groups_admined);
	}

	function view($gid = null) {
		if (!$gid) {
			$this->Session->setFlash(__('Invalid group', true));
			$this->redirect(array('action' => 'index'));
		}
		$creatorId = $this->GroupMembership->find('first',array(
				'conditions'=>array("GroupMembership.group_id "=> $id,"GroupMembership.role"=>GroupMembership::admin)
			));
		$creatorId = $creatorId['GroupMembership']['user_id'];
		$creator=$this->User->findById($creatorId);
		$memberIds = $this->GroupMembership->find('all',array(
				'conditions'=>array("GroupMembership.group_id "=> $this->current_group_id,"GroupMembership.role"=>GroupMembership::member)
			));
		$members = $this->User->find('all',array('condtions'=>array('User.id'=>$memberIds)));
		$posts = $this->GroupPost->findAllByGroupId($id);
		$this->set('group', $this->current_group);
		$this->set('posts',$posts);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$groupId = $this->Group->id;
				$this->Group->saveField('gid',"g{$groupId}");
				$gid = "g{$groupId}";
				$this->GroupMembership->create();
				$_data = array(
					'GtoupMembership'=>
						array(
						'user_id'=>$this->currentUserId,
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
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
		$users = $this->Group->User->find('list');
		$this->set(compact('users'));
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