<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Session','Cookie','Thumbnail','Email');
	var $uses = array('User','Guest','Group','Note');
	var $helpers = array('Avatar');
	
	function beforeFilter(){
	//  $this->Cookie->name = 'baker_id';
	//  $this->Cookie->time =  3600;  // or '1 hour'
		$this->Cookie->path = '/'; 
	//  $this->Cookie->domain = 'example.com';   
		$this->Cookie->secure = false;  //i.e. only sent if using secure HTTPS
		$this->Cookie->key = 'qSI232qs*&sXOw!';
		$this->Auth->allow('login','logout','signup');
		parent::beforeFilter();


	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function mine()
	{
		if(isset($this->cuid) and isset($this->cuuid)){
			$this->redirect("/people/{$this->cuuid}/");
		}else{
			$this->redirect('/');
		}
	}
	 function signup() {
		 if ($this->data) {
 			if ($this->data['User']['password'] == $this->Auth->password($this->data['User']['password_confirm'])) {
	 			$this->User->create();
 				if($this->User->save($this->data)){
 					$this->User->saveField('uid',"u{$this->User->id}");
	 				if($this->Auth->login($this->data)){
	 				    if($this->_sendMail($this->User->id)){
	 				        $this->Session->setFlash('email sent');
	 				    }else{
   	 				        $this->Session->setFlash('email not sent');
	 				    }
	 				    
						$this->redirect("home"); 					
	 				}else{
                                     	}
 				}else{
                    $this->data['User']['password']='';
                    $this->data['User']['password_confirm']='';
                    $this->Session->setFlash('something wrong!');
				}
 			}
 		}
 	}
 	
	function login()
	{
		if ($this->Auth->user()) {
			if (!empty($this->data['User']['remember_me'])) {
				$cookie = array();
				$cookie['email'] = $this->data['User']['email'];
				$cookie['password'] = $this->data['User']['password'];
				$this->Cookie->write('Auth.User', $cookie, true, '+4 weeks');
				unset($this->data['User']['remember_me']);
			}
			$this->redirect($this->Auth->redirect());
		}
		if (empty($this->data)) {
			$cookie = $this->Cookie->read('Auth.User');
			if (!is_null($cookie)) {
				if ($this->Auth->login($cookie)) {						
					//  Clear auth message, just in case we use it.
					$this->Session->delete('Message.auth');
					$this->redirect($this->Auth->redirect());
				}
			}
		}
	}
	
	
	
	function logout(){
		$this->Cookie->delete('Auth.User');
		$this->redirect($this->Auth->logout());
	}
	
	function home(){
		if (true==true){
			$this->set('user', $this->Auth->user());
		}else{
			$this->redirect(array('action' => 'login'));
		}
	}

//上传头像的函数。
	
	
	function upload_avatar()
	{
		$upload_path = User::avatar_path.'/'; #'a_path' 格式！！记得加 /
		
		
		if (isset($this->cuid)) {
			$dst_file_name = "u_{$this->cuid}";
		}else{
			$this->Session->setFlash('something  cuid wrong!');
			$this->redirect('/users/upload_avatar');

		}
	    if(isset($_FILES['uploadfile'])){
           $file_type = $_FILES['uploadfile']['type'];	
           $file_size  = $_FILES['uploadfile']['size'];
           if (!in_array($file_type,$this->Thumbnail->allow_type_list)){
           		$this->Session->setFlash('只允许上传 gif jpeg png等图片格式的文件！');
           		$this->redirect('/users/upload_avatar');
           }
           if($file_size>$this->Thumbnail->max_file_size){
           		$this->Session->setFlash('上传图片不得超过500K');
           		$this->redirect('/users/upload_avatar');
           }
           
			$ext = end(explode('.',$_FILES['uploadfile']['name']));
			$tmp_name = time().'_'.'u_'.$this->cuid;
			$src_file="tmpimgs/".$tmp_name.'.'.$ext; 
            if(move_uploaded_file($_FILES['uploadfile']['tmp_name'],$src_file)){
                $src_img = $src_file;
                $result = $this->Thumbnail->createUserThumbs($src_img,$file_type,$dst_file_name,$upload_path);
                if ($result==true) {	
                	$this->Session->setFlash('头像上传成功！');
                	$this->User->id = $this->cuid;
                	$this->User->saveField('avatar',$dst_file_name.'.jpg');
                	$this->redirect('/settings');
                }else{
                	$this->Session->setFlash($result);
                	$this->redirect('/users/upload_avatar');
               }
            }else{
                echo "Failed to upload file Contact Site admin to fix the problem";
                exit;
            }
		}
	}

	function view() {
		if (!isset($this->params['uid'])) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect('/');
		}
		$notes = $this->Note->find('all',array('conditions'=>array('Note.user_id'=>$this->uid),'order'=>'Note.created desc','limit'=>5));
		$guests=$this->Guest->find('all',array('conditions'=>array('Guest.user_id'=>$this->uid),'order'=>'Guest.id desc','limit'=>5));
		$this->paginate= array(
			'limit'=>12,
			"joins"=>array(array(
			'table'=>'followships',
			'alias'=>'Followship',
			'conditions'=>array("User.id = Followship.following_id")			
			)),
			'order'=>'Followship.id desc'
			);
		$followers_count = $this->Followship->find('count',array('conditions'=>array('Followship.following_id'=>$this->uid)));
		$followings = $this->paginate('User',array('Followship.user_id'=>$this->uid));
		$this->set('followers_count', $followers_count);
		$this->set('followings',$followings);
		$this->set('guests', $guests);
		$this->set('user', $this->user);
		$this->set('notes',$notes);
	}


	function edit($id = null) {
		if (!isset($this->cuid)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->User->id = $this->cuid;
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('修改用户信息成功！', true));
				$this->redirect('/settings');
			} else {
				$this->Session->setFlash(__('修改用户信息失败，请稍后再试！', true));
			}
		}
		$this->data = $this->User->read(null, $this->cuid);

	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function sendMails()
	{
	    $user = $this->User->find(10);
        
        /* Set delivery method */

        /* SMTP Options */
        $this->Email->smtpOptions = array(
                'request' => array('uri' => array('scheme' => 'https')),
                'port'=>'587', 
                'timeout'=>'60',
                'host' => 'smtp.gmail.com',
                'username'=>'stillwyw@gmail.com',
                'password'=>'still5612',
           //     'client' => 'smtp_helo_hostname'
        );
        $this->Email->delivery = 'smtp';        

        $this->Email->to = '<75166824@qq.com>';
        $this->Email->subject = '你好！';
        $this->Email->from = '<stillwyw@gmail.com>';
        $this->Email->send();
        $this->set('smtp_errors', $this->Email->smtpError);
 
	}
	
    public function _sendMail($id){
        $user = $this->User->find($id);
        
        /* Set delivery method */
        $this->Email->delivery = 'smtp';        

        /* SMTP Options */
        $this->Email->smtpOptions = array(
                'port'=>'25', 
                'timeout'=>'60',
                'host' => 'smtp.163.com',
                'username'=>'stillwyw',
                'password'=>'iknowyou',
           //     'client' => 'smtp_helo_hostname'
        );
        
        $this->Email->to = $user['User']['email'];
        $this->Email->subject = '你好！';
       // $this->Email->from = 'still@gmail.com';
        $is_done = $this->Email->send();
        $this->set('smtp_errors', $this->Email->smtpError);
        return $is_done;
        
    }
 
}
?>