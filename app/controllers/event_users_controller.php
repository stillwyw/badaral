<?php
class EventUsersController extends AppController {

	var $name = 'EventUsers';

	function index() {
		$this->EventUser->recursive = 0;
		$this->set('eventUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eventUser', $this->EventUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EventUser->create();
			if ($this->EventUser->save($this->data)) {
				$this->Session->setFlash(__('The event user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event user could not be saved. Please, try again.', true));
			}
		}
		$events = $this->EventUser->Event->find('list');
		$users = $this->EventUser->User->find('list');
		$this->set(compact('events', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventUser->save($this->data)) {
				$this->Session->setFlash(__('The event user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventUser->read(null, $id);
		}
		$events = $this->EventUser->Event->find('list');
		$users = $this->EventUser->User->find('list');
		$this->set(compact('events', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventUser->delete($id)) {
			$this->Session->setFlash(__('Event user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>