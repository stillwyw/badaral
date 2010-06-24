<?php
class EventsController extends AppController {

	var $name = 'Events';
	var $uses = array('Event','EventUser');
    
	function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		//$this->Event->recursive=0;
		$event = $this->Event->read(null, $id);
		$role = $this->EventUser->find('first',array('conditions'=>array(
		    'EventUser.user_id'=>$this->cuid,
		    'EventUser.event_id'=>$id
		    )
    	));
    	if (!empty($role) {
    	    $role = $role['EventUser'][]
    	}
		$this->set('event', );
	}
	
	function group($ggid = null){
		if ($ggid = null) {
			$this->redirect('/');
		}
		$this->paginate = array(
				'limit'=>20,
				'order'=> 'id desc'
					);
		$this->set('events', $this->paginate('Event',array('Event.group_id'=>$this->cgid)) );	
	}

	function add() {
		if (!empty($this->data)) {
			$this->Event->create();
			if ($this->Event->save($this->data)) {
			    $a_data = array(
			        'EventUser'=>array(
    			        'user_id'=>$this->cuid,
    			        'event_id'=>$this->Event->id,
        			    'role'=>Event::sponsor
			            )
			        );
			    $this->EventUser->create();
			    $this->EventUser->save($a_data);
				$this->Session->setFlash(__('活动创建成功！', true));
				$this->redirect("/group/$this->cggid/");
			} else {
				$this->Session->setFlash(__('活动创建失败，请稍后再试！', true));
			}
		}
	}
	function join($id=null){
		if(!$id){
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
		if($this->EventUser->save($data)){
			$this->Session->setFlash("参与活动成功。");
			$this->redirect("/events/view/{$id}");
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
			$this->Session->setFlash("参与活动成功。");
			$this->redirect("/events/view/{$id}");
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Event->save($this->data)) {
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>