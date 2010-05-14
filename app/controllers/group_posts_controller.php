<?php
class GroupPostsController extends AppController {

	var $name = 'GroupPosts';

	function index() {
		$this->GroupPost->recursive = 0;
		$this->set('groupPosts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid group post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('groupPost', $this->GroupPost->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GroupPost->create();
			if ($this->GroupPost->save($this->data)) {
				$this->Session->setFlash(__('The group post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->GroupPost->User->find('list');
		$groups = $this->GroupPost->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid group post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GroupPost->save($this->data)) {
				$this->Session->setFlash(__('The group post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GroupPost->read(null, $id);
		}
		$users = $this->GroupPost->User->find('list');
		$groups = $this->GroupPost->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for group post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GroupPost->delete($id)) {
			$this->Session->setFlash(__('Group post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>