<?php
class NotesController extends AppController {

	var $name = 'Notes';
	var $uses = array('User','Note','NoteComment');
	var $components = array('Session');
	var $helpers = array('NoteLink');
	var $paginate=array(
			'limit'=>1
		);
		
	function beforeFilter()
	{
		parent::beforeFilter();
		parent::beforeFilter();
		if (empty($this->passedArgs) || !isset($this->passedArgs['0'])) {
				$note_id = false;
		} else {
				$note_id = $this->passedArgs['0'];
		}
		if(!empty($note_id)){
			$this->note = $this->Note->findById($note_id);
			$this->user = $this->User->findById($this->note['Note']['user_id']);
			$this->uid = $this->user['User']['uid'];
			$this->owner_id = $this->user['User']['id'];
			$this->own = ($this->owner_id == $this->cuid);
			$this->set('own',$this->own);
		}
	}
	function index() {
		if(isset($this->uid)){
		$datas = $this->paginate('Note',array('user_id'=>$this->uid));
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
				$this->Note->saveField('user_id',$this->current_user_id);
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
		if (!$this->own||empty($this->note)) {
			$this->Session->setFlash(__('日记不存在，或无权操作。', true));
			if(isset($this->uid)){
				$this->redirect("/people/{$this->uid}/diary");
			}else{
				$this->redirect('/');
			}
		}
		if (!empty($this->data)) {
			if ($this->Note->save($this->data)) {
				$this->Session->setFlash(__('The note has been saved', true));
				$this->redirect("/people/{$this->uid}/diary");
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
		if (!$this->own||empty($this->note)) {
			$this->Session->setFlash(__('Invalid id for note', true));
			if(isset($this->uid)){
				$this->redirect("/people/{$this->uid}/diary");
			}else{
				$this->redirect('/');
			}
		}
		$this->Note->id=$this->note['Note']['id'];
		if ($this->Note->delete($id)) {
			$this->Session->setFlash(__('Note deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Note was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>