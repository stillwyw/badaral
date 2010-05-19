<?php
class GroupsController extends AppController {

	var $name = 'Groups';
	var $uses = array('GroupPost','GroupsUser','Group','User','GroupMembership');
	var $components = array('Session');


	function index() {
		//$this->Group->recursive = 0;
		$userId = $this->current_user['User']['id'];

		$groups_joind = $this->User->GroupMembership->Group->find('all',array(
			'recursive'=>3,
			'conditions'=>array('User.id '=>$userId),
			'limit'=>10,
			'order'=>'GroupMembership.created'									
			));

		$group_ids = $this->User->GroupMembership->find('list',array(
			'fields'=>array('GroupMembership.group_id','GroupMembership.group_id'),
			'conditions'=>array('GroupMembership.user_id'=>$userId)
			));
		$posts = $this->User->GroupMembership->Group->GroupPost->find('all',array(
																																	'conditions'=>array('Group.id'=>$group_ids),
																																	'limit'=>20,
																																	'order'=>array('GroupPost.idd','desc')
																																	));


		$this->set('posts',$posts);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('group', $this->Group->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash(__('The group has been saved', true));
				$this->redirect(array('action' => 'index'));
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