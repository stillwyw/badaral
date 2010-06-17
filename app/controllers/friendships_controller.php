<?php
class FriendshipsController extends AppController {

	var $name = 'Friendships';
	var $uses = array('User','Friendship');
	var $components = array('Session');
	var $helpers = array('Avatar');
	var $paginate = array(
	    'limit'=>20,
	    );

	function index() {
		$this->Friendship->recursive = 0;
		$friend_ids = $this->Friendship->find('list',
		array(
		    'fields'=>'Friendship.friend_id',
		    'conditions'=>array('Friendship.user_id'=>1,'friend.friend_id'=>1),
		    'joins'=>array(array(
		            'table'=>'friendships',
		            'alias'=>'friend',
		            'conditions'=>array('Friendship.friend_id = friend.user_id'))
    		))
    	);
		/*$friend_ids = $this->Friendship->query("SELECT `user`.friend_id FROM  `anything`.`friendships` as `user`
                        join friendships as `friend` on `friend`.user_id = `user`.friend_id
                    where `user`.user_id =1 and `friend`.friend_id = 1");*/
        $friends = $this->paginate('User',array("User.id"=>$friend_ids));
		$this->set('friends', $friends);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid friendship', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('friendship', $this->Friendship->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Friendship->create();
			if ($this->Friendship->save($this->data)) {
				$this->Session->setFlash(__('The friendship has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friendship could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Friendship->User->find('list');
		$friends = $this->Friendship->Friend->find('list');
		$this->set(compact('users', 'friends'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid friendship', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Friendship->save($this->data)) {
				$this->Session->setFlash(__('The friendship has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friendship could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Friendship->read(null, $id);
		}
		$users = $this->Friendship->User->find('list');
		$friends = $this->Friendship->Friend->find('list');
		$this->set(compact('users', 'friends'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for friendship', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Friendship->delete($id)) {
			$this->Session->setFlash(__('Friendship deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Friendship was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>