<?php
class FollowshipsController extends AppController {

	var $name = 'Followships';
	var $uses  = array('User','Followship');
	var $helpers = array('Avatar');
	function index() {
		$this->paginate= array(
			'limit'=>20,
			"joins"=>array(array(
			'table'=>'followships',
			'alias'=>'Followship',
			'conditions'=>array("User.id = Followship.following_id")			
			)),
			'order'=>'Followship.id desc'
			);
		$followings = $this->paginate('User',array('Followship.user_id'=>$this->cuid));
		$this->set('followings', $followings);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid followship', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('followship', $this->Followship->read(null, $id));
	}

	function add($user_id=null) {
		if (isset($this->cuid) and !is_null($user_id)) {
			$_data = array(
				'Followship'=>array(
					'user_id'=>$this->cuid,
					'following_id'=>$user_id
					)
				);
			$this->Followship->create();
			if ($this->Followship->save($_data)) {
				$this->Session->setFlash(__('The followship has been saved', true));
				$user = $this->User->findById($user_id);
				$this->redirect("/people/{$user['User']['uid']}");
			} else {
				$this->Session->setFlash(__('The followship could not be saved. Please, try again.', true));
				$user = $this->User->findById($user_id);
				$this->redirect("/people/{$user['User']['uid']}");
			}
		}else{
			$this->redirect('/');
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid followship', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Followship->save($this->data)) {
				$this->Session->setFlash(__('成功添加关注。', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The followship could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Followship->read(null, $id);
		}
		$users = $this->Followship->User->find('list');
		$followings = $this->Followship->Following->find('list');
		$this->set(compact('users', 'followings'));
	}

	function delete($user_id = null) {
		if (!isset($this->cuid) or is_null($user_id)) {
			$this->Session->setFlash(__('Invalid id for followship', true));
			$this->redirect('/');
		}
		$following = $this->Followship->find('first',array('conditions'=>array('Followship.user_id'=>$this->cuid,"Followship.following_id"=>$user_id)));
		if ($this->Followship->delete($following['Followship']['id'])) {
			$this->Session->setFlash(__('成功取消关注。', true));
			$user = $this->User->findById($user_id);
			$this->redirect("/people/{$user['User']['uid']}");
		}else{
			$this->Session->setFlash(__('取消关注失败。', true));
			$user = $this->User->findById($user_id);
			$this->redirect("/people/{$user['User']['uid']}");
		}
	}
}
?>