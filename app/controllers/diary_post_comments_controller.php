<?php
class DiaryPostCommentsController extends AppController {

	var $name = 'DiaryPostComments';

	function index() {
		$this->DiaryPostComment->recursive = 0;
		$this->set('diaryPostComments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid diary post comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('diaryPostComment', $this->DiaryPostComment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DiaryPostComment->create();
			if ($this->DiaryPostComment->save($this->data)) {
				$this->Session->setFlash(__('The diary post comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary post comment could not be saved. Please, try again.', true));
			}
		}
		$users = $this->DiaryPostComment->User->find('list');
		$diaryPosts = $this->DiaryPostComment->DiaryPost->find('list');
		$this->set(compact('users', 'diaryPosts'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid diary post comment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DiaryPostComment->save($this->data)) {
				$this->Session->setFlash(__('The diary post comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary post comment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DiaryPostComment->read(null, $id);
		}
		$users = $this->DiaryPostComment->User->find('list');
		$diaryPosts = $this->DiaryPostComment->DiaryPost->find('list');
		$this->set(compact('users', 'diaryPosts'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for diary post comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DiaryPostComment->delete($id)) {
			$this->Session->setFlash(__('Diary post comment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Diary post comment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>