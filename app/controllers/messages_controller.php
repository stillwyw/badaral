<?php
class MessagesController extends AppController {

	var $name = 'Messages';
	var $helpers =  array('Avatar','Format');

	function index() {
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate('Message',array('Message.user_id'=>$this->cuid)));
	}
	function outbox()
	{
		$this->Message->recursive = 0;
		$this->set('messages', $this->paginate('Message',array('Message.sender_id'=>$this->cuid)));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid message', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$message = $this->Message->read(null,$id);
		if (empty($message) or ($message['Message']['user_id']!=$this->cuid and $message['Message']['sender_id']!=$this->cuid)) {
		    $this->cakeError("access");
		}
		if ($message['Message']['read']==0 and $message['Message']['user_id']!=$this->cuid) {
			$this->Message->id = $id;
			$this->Message->saveField('read',1);
		}
		$this->set('message', $message);
	}

	function add($id = null) {
		if (!empty($this->data)) {
			$this->Message->create();
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('邮件发送成功', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('消息发送失败，请稍后再试。', true));
			}
		}
		if(is_null($id)){
			$this->redirect('/');
		}
		$this->set('reciever', $this->User->findById($id));
		$this->set('reciever_id', $id);
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('邮件不存在，或无权访问。', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Message->save($this->data)) {
				$this->Session->setFlash(__('The message has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The message could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Message->read(null, $id);
		}
		$senders = $this->Message->Sender->find('list');
		$users = $this->Message->User->find('list');
		$this->set(compact('senders', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for message', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Message->delete($id)) {
			$this->Session->setFlash(__('Message deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Message was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>