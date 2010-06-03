<?php
class GroupMembershipsController extends AppController {

	var $name = 'GroupMemberships';
	var $uses = array('Group','GroupMembership');
	var $components = array('Session');
	function beforeFilter()
	{
		parent::beforeFilter();
		if(!empty($this->current_group)&&!empty($this->current_user)){
			$this->membership = $this->GroupMembership->find('first',array(
			'conditions'=>array(
				'GroupMembership.group_id'=>$this->current_group_id,
				'GroupMembership.user_id'=>$this->current_user_id				
				)));
			$role = $this->membership['GroupMembership']['role'];
			$this->set('group_role',$role);
		}
	}
	function index() {
		$this->GroupMembership->recursive = 0;
		$this->set('groupMemberships', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid group membership', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('groupMembership', $this->GroupMembership->read(null, $id));
	}

	function join() {
		if (!empty($this->current_group)&&!empty($this->current_user)) {
			$membership_exists = $this->GroupMembership->find('list',array(
			'conditions'=>array(
				'GroupMembership.group_id'=>$this->current_group_id,
				'GroupMmebership.user_id'=>$this->current_user_id				
				)));
				if(!$membership_exists){
					$group = $this->current_group;
					$this->GroupMembership->create();
					$mdata = array(
						'GroupMembership'=>array(
							'group_id'=>$this->current_group_id,
							"user_id"=>$this->current_user_id,
								'role'=>GroupMembership::member
							)		
						);
						
					if ($this->GroupMembership->save($mdata)) {
						$this->Session->setFlash(__('The group membership has been saved', true));
						$this->redirect("/group/{$group['Group']['gid']}");
					} else {
						$this->Session->setFlash(__('The group membership could not be saved. Please, try again.', true));
					}					
				}

		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid group membership', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GroupMembership->save($this->data)) {
				$this->Session->setFlash(__('The group membership has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group membership could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GroupMembership->read(null, $id);
		}
		$users = $this->GroupMembership->User->find('list');
		$groups = $this->GroupMembership->Group->find('list');
		$this->set(compact('users', 'groups'));
	}

	function quit($id = null) {
		if (!empty($this->current_group)&&!empty($this->current_user)&&!empty($this->membership)) {
			$id = $this->membership['GroupMembership']['id'];
		}
		if ($this->GroupMembership->delete($id)) {
			$this->Session->setFlash(__('Group membership deleted', true));
			$this->redirect("/group/{$this->current_group['Group']['gid']}");
		}
		$this->Session->setFlash(__('Group membership was not deleted', true));
		$this->redirect("/group/{$this->current_group['Group']['gid']}");
	}
}
?>