<?php
class NoteCommentsController extends AppController {

	var $name = 'NoteComments';
	var $components = array('Session');



	function add() {
		if (!empty($this->data)) {
			$this->NoteComment->create();
			if ($this->NoteComment->save($this->data)) {
				$this->Session->setFlash(__('The note comment has been saved', true));
				$this->redirect(array('controller'=>'notes','action' => 'view',$this->data['NoteComment']['note_id']));
			} else {
				$this->Session->setFlash(__('The note comment could not be saved. Please, try again.', true));
			}
		}
		$users = $this->NoteComment->User->find('list');
		$notes = $this->NoteComment->Note->find('list');
		$this->set(compact('users', 'notes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for note comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->NoteComment->delete($id)) {
			$this->Session->setFlash(__('Note comment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Note comment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>