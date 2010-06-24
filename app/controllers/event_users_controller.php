<?php
class EventUsersController extends AppController {

	var $name = 'EventUsers';

	function index() {
		$this->EventUser->recursive = 0;
		$this->set('eventUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eventUser', $this->EventUser->read(null, $id));
	}
	
	function join($id=null){
		if(!id){
			$this->Session->setFlash("访问出错。");
			$this->redirect('/events');
		}
		$data = array(
			'EventUser'=>array(
				'user_id'=>$this->cuid,
				'event_id'=>$id,
					'role'=>EventUser::join
				)
			);
		$this->EventUser->create();
		if($this->EventUser->save($date)){
			$this->Session->setFlash("参与活动成功。")
			$this->redirect("/event/view/{$id}");
		}
	}
	function interest($id=null){
		if(!id){
			$this->Session->setFlash("访问出错。");
			$this->redirect('/events');
		}
		$data = array(
			'EventUser'=>array(
				'user_id'=>$this->cuid,
				'event_id'=>$id,
					'role'=>EventUser::join
				)
			);
		$this->EventUser->create();
		if($this->EventUser->save($date)){
			$this->Session->setFlash("参与活动成功。")
			$this->redirect("/event/view/{$id}");
		}
	}


	function add($event_id=null,$type='i') {
		if (!is_null($event_id)) {
			$this->EventUser->create();
			if ($type=='j') {
			    $role=Event::join;
			}else{
			    $role=Event::interest;
			}
			$a_data = array(
			    'EventUser'=>array(
			        'event_id'=>$event_id,
			        'user_id'=>$this->cuid,
    			        'role'=>$role
			        )
			    )
			if ($this->EventUser->save($a_data)) {
				$this->Session->setFlash(__('The event user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event user could not be saved. Please, try again.', true));
			}
		}
		$events = $this->EventUser->Event->find('list');
		$users = $this->EventUser->User->find('list');
		$this->set(compact('events', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventUser->save($this->data)) {
				$this->Session->setFlash(__('The event user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventUser->read(null, $id);
		}
		$events = $this->EventUser->Event->find('list');
		$users = $this->EventUser->User->find('list');
		$this->set(compact('events', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventUser->delete($id)) {
			$this->Session->setFlash(__('Event user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>