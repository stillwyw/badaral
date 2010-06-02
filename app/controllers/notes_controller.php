<?php
class NotesController extends AppController {

	var $name = 'Notes';
	var $uses = array('User','Note','NoteComment');
	var $components = array('Session');
	var $helpers = array('NoteLink');
	var $paginate=array(
		'limit'=>5
		);
	function index() {
		if(isset($this->userid)){
		$datas = $this->paginate('Note',array('user_id'=>$this->userid));
		}
		$this->set('notes', $datas);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid note', true));
	//		$this->redirect(array('action' => 'index'));
		}
		$this->set('note', $this->Note->read(null, $id));
		$this->set('noteComments',$this->NoteComment->findAllByNoteId($id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Note->create();
			if ($this->Note->save($this->data)) {
		//		$this->Session->setFlash(__('', true));
				$this->redirect(array('action' => 'view',$this->Note->id));
			} else {
				$this->Session->setFlash(__('The note could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Note->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid note', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Note->save($this->data)) {
				$this->Session->setFlash(__('The note has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The note could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Note->read(null, $id);
		}
		$users = $this->Note->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for note', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Note->delete($id)) {
			$this->Session->setFlash(__('Note deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Note was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>