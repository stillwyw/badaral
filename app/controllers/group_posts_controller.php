<?php
class GroupPostsController extends AppController {

	var $name = 'GroupPosts';
	var $components = array('Session');
	var $uses = array('Group','GroupPost');
	
	function beforeFilter()
	{
		
		parent::beforeFilter();
		if (empty($this->passedArgs) || !isset($this->passedArgs['0'])) {
				$post_id = false;
		} else {
				$post_id = $this->passedArgs['0'];
		}
		
		if(!empty($post_id)){
			$this->post = $this->GroupPost->findById($post_id);
			
			$this->current_group=$this->Group->findById($this->post['GroupPost']['group_id']);
			$this->current_group_id = $this->current_group['Group']['id'];
			$this->set('gid',$this->current_group['Group']['gid']);
			$this->set('group',$this->current_group);
			$this->post_owner_id = $this->post['GroupPost']['user_id'];
			if(empty($this->post)){
				echo 'post not fond';
			}else{
			}
		}else{
		}
		
	}

	function index() {
		$this->GroupPost->recursive = 0;
		$this->set('groupPosts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid group post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('groupPost', $this->post);
	}

	function add() {
		$group=$this->current_group;
		$group_id = $this->current_group_id;
		
		if (!empty($group)&&!empty($this->data)) {
			$this->GroupPost->create();
			if ($this->GroupPost->save($this->data)) {
				$this->GroupPost->saveField('group_id',$group_id);
				$this->GroupPost->saveField('user_id',$this->current_user_id);
				$this->Session->setFlash(__('The group post has been saved', true));
				$this->redirect("/group/{$group['Group']['gid']}");
			} else {
				$this->Session->setFlash(__('The group post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->GroupPost->User->find('list');
		$groups = $this->GroupPost->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

	function edit($id = null) {
		if (!isset($this->post)or($this->post_owner_id!=$this->current_user_id)) {
			$this->Session->setFlash(__('该页面不存在,或权限不足。', true));
			$this->redirect("/group");
		}
		if (!empty($this->data)) {
			if ($this->GroupPost->save($this->data)) {
				$this->Session->setFlash(__('修改成功', true));
				$this->redirect("/group_posts/view/{$id}");
			} else {
				$this->Session->setFlash(__('The group post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GroupPost->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for group post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GroupPost->delete($id)) {
			$this->Session->setFlash(__('Group post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Group post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>