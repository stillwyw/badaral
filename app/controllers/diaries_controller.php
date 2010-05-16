<?php
class DiariesController extends AppController {

	var $name = 'Diaries';

	function index() {
		
		$diary_posts = $this->current_user->Diary->DiaryPost->find('all');
		$this->set('diary_posts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid diary', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('diary', $this->Diary->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Diary->create();
			if ($this->Diary->save($this->data)) {
				$this->Session->setFlash(__('The diary has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Diary->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid diary', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Diary->save($this->data)) {
				$this->Session->setFlash(__('The diary has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Diary->read(null, $id);
		}
		$users = $this->Diary->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for diary', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Diary->delete($id)) {
			$this->Session->setFlash(__('Diary deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Diary was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>