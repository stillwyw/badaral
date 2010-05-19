<?php
class DiaryPostsController extends AppController {

	var $name = 'DiaryPosts';
	var $uses = array('Diary','User','DiaryPost');
	var $components = array('Session');
	
	function beforeFilter()		
	{
		parent::beforeFilter();
		
	/*	if(!$this->current_user || $this->DiaryPost->findByUserId){
			$this->redirect_to('/login');
		}*/
	}

	function index() {
		if ($this->params[:userid]) {
			$uesr = $this->User->findBy
		}
		$this->paginate = array(
			'conditions'=>array('DiaryPost.user_id'=>$this->currentUserId),
			'limit'=>2
			);
		//$this->DiaryPost->findByUserId($this->currentUserId);
		$this->set('diaryPosts', $this->paginate('DiaryPost'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid diary post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('diaryPost', $this->DiaryPost->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['DiaryPost']['user_id'] = $this->currentUserId;
			$userDiary = $this->Diary->findByUserId($this->currentUserId);
			if(!$userDiary){
				$userDiary = 1;
			}
			$this->data['DiaryPost']['diary_id'] = $userDiary['Diary']['id'];
			if ($this->DiaryPost->save($this->data)) {
				$this->Session->setFlash(__('The diary post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary post could not be saved. Please, try again.', true));
			}
		}
		$diaries = $this->DiaryPost->Diary->find('list');
		$users = $this->DiaryPost->User->find('list');
		$this->set(compact('diaries', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid diary post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DiaryPost->save($this->data)) {
				$this->Session->setFlash(__('The diary post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The diary post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DiaryPost->read(null, $id);
		}
		$diaries = $this->DiaryPost->Diary->find('list');
		$users = $this->DiaryPost->User->find('list');
		$this->set(compact('diaries', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for diary post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DiaryPost->delete($id)) {
			$this->Session->setFlash(__('Diary post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Diary post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>