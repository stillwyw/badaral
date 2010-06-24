<?php
class EventsController extends AppController {

	var $name = 'Events';

	function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('event', $this->Event->read(null, $id));
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