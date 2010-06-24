<?php
class GuestsController extends AppController {

	var $name = 'Guests';
	var $components = array('Session');
	var $helpers = array('Avatar','Format');

	function index() {
		$this->Guest->recursive = 0;
		$this->set('guests', $this->paginate());
	}

	function view($gid = null) {
		if (!$gid) {
			$this->Session->setFlash(__('Invalid guest', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('guest', $this->Guest->read(null, $id));
	}

	function add() {
		if(is_null($this->referer())){
			$this->redirect('/signin');
		}
		if (!empty($this->data)) {
			$this->Guest->create();
			if ($this->Guest->save($this->data)) {
				$this->Session->setFlash(__('The guest has been saved', true));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The guest could not be saved. Please, try again.', true));
			}
		}
		$this->set(compact('users'));
	}

	function edit($gid = null) {
		if (!$gid && empty($this->data)) {
			$this->Session->setFlash(__('Invalid guest', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Guest->save($this->data)) {
				$this->Session->setFlash(__('The guest has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guest could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Guest->read(null, $id);
		}
		$users = $this->Guest->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for guest', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Guest->delete($id)) {
			$this->Session->setFlash(__('Guest deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Guest was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>