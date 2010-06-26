<?php
class WordsController extends AppController {

	var $name = 'Words';

	function index() {
		$this->Word->recursive = 0;
		$this->set('words', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid word', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('word', $this->Word->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Word->create();
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The word has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.', true));
			}
		}
		$languages = $this->Word->Language->find('list');
		$this->set(compact('languages'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid word', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Word->save($this->data)) {
				$this->Session->setFlash(__('The word has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The word could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Word->read(null, $id);
		}
		$users = $this->Word->User->find('list');
		$languages = $this->Word->Language->find('list');
		$this->set(compact('users', 'languages'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for word', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Word->delete($id)) {
			$this->Session->setFlash(__('Word deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Word was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>