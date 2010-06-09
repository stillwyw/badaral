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
			$this->cgid = $this->current_group['Group']['id'];
			$this->cggid = $this->current_group['Group']['gid'];
			$this->set('cggid',$this->cggid);
			$this->set('group',$this->current_group);
			$this->post_owner_id = $this->post['GroupPost']['user_id'];
			if ($this->post_owner_id==$this->cuid) {
				$this->own = true;
			}else{
				$this->own = false;
			}
			$this->set('own',$this->own );
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
		$group_id = $this->cgid;
		
		if (!empty($group)&&!empty($this->data)) {
			$this->GroupPost->create();
			if ($this->GroupPost->save($this->data)) {
				$this->GroupPost->saveField('group_id',$group_id);
				$this->GroupPost->saveField('user_id',$this->cuid);
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
		if (!isset($this->post)or!$this->own) {
			$this->Session->setFlash(__('该页面不存在,或权限不足。', true));
			$this->redirect("/group");
		}
		if (!empty($this->data)) {
			$this->GroupPost->id = $id;
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
		if (!isset($this->post)or!$this->own) {
			$this->Session->setFlash(__('无权进行该操作。', true));
			$this->redirect("/group");
		}
		if ($this->GroupPost->delete($id)) {
			$this->Session->setFlash(__('讨论已删除。', true));
			$this->redirect("/group/{$this->cggid}");
		}
		$this->Session->setFlash(__('出现问题，稍后再试。', true));
		$this->redirect("/group/{$this->cggid}");
	}
}
?>