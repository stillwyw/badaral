<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $components = array('Session','Cookie');
	var $uses = array('User','Guest','Group','Note');
	
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
	    if(isset($_FILES['userfile'])){
    	    // Below lines are to display file name, temp name and file type , you can use them for testing your script only//////
            echo "File Name: ".$_FILES['userfile']['name']."<br>";
            echo "tmp name: ".$_FILES['userfile']['tmp_name']."<br>";
            echo "File Type: ".$_FILES['userfile']['type']."<br>";
            echo "<br><br>";
    	    $add="tmpimgs/".$_FILES['userfile']['name']; 
    	    if (!($_FILES['userfile']['type'] =="image/jpeg" OR $_FILES['userfile']['type']=="image/gif"))
            {
                echo "Your uploaded file must be of JPG or GIF. Other file types are not allowed<BR>";
                exit;
            }
            if(move_uploaded_file($_FILES['userfile']['tmp_name'],$add)){
                echo "Successfully uploaded the mage";
                chmod("$add",0777);
            }else{
                echo "Failed to upload file Contact Site admin to fix the problem";
                exit;
            }
            
                
    	    $n_width=100; // Fix the width of the thumb nail images
            $n_height=100; // Fix the height of the thumb nail imaage
            
            $tsrc="tmpimgs/".$_FILES['userfile']['name']; // Path where thumb nail image will be stored
            //echo $tsrc;
    
            //////////// Starting of GIF thumb nail creation///////////
            if ($_FILES['userfile']['type']=="image/gif")
            {
                $im=ImageCreateFromGIF($add);
                $width=ImageSx($im); // Original picture width is stored
                $height=ImageSy($im); // Original picture height is stored
                $newimage=imagecreatetruecolor($n_width,$n_height);
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                if (function_exists("imagegif")) {
                    Header("Content-type: image/gif");
                    ImageGIF($newimage,$tsrc);
                }
                    elseif (function_exists("imagejpeg")) {
                    Header("Content-type: image/jpeg");
                    ImageJPEG($newimage,$tsrc);
                }
                chmod("$tsrc",0777);    
            }
            
            if($_FILES['userfile']['type']=="image/jpeg"){
                $im=ImageCreateFromJPEG($add); 
                $width=ImageSx($im); // Original picture width is stored
                $height=ImageSy($im); // Original picture height is stored
                $newimage=imagecreatetruecolor($n_width,$n_height); 
                imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
                ImageJpeg($newimage,$tsrc);
                chmod("$tsrc",0777);
            }
            //////////////// End of JPG thumb nail creation //////////

	        
	    }
	

	    
	}

	function view() {
		if (!isset($this->params['uid'])) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect('/');
		}
		$notes = $this->Note->find('all',array('conditions'=>array('Note.user_id'=>$this->uid),'limit'=>5,'order'=>'Note.created desc'));
		$guests=$this->Guest->find('all',array('conditions'=>array('Guest.user_id'=>$this->uid),'limit'=>5,'order'=>'Guest.created desc'));
		$this->set('guests', $guests);
		$this->set('user', $this->user);
		$this->set('notes',$notes);
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
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
}
?>