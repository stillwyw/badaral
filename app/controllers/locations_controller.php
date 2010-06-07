<?php
class LocationsController extends AppController {
	var $name='Locations';
	var $uses=array('Province','City');
	var $components = array('Session');
	
	function index()	
	{
		if(isset($this->params['city'])){
			$city = $this->City->findByCity($this->params['city']);
			if(!is_null($city)){
				$this->User->id = $this->current_user_id;
				$this->User->saveField('city_id',$city['City']['id']);
				$this->redirect('/settings');
			}
		}
		if(isset($this->params['province'])){
			$province = $this->Province->findByProvince($this->params['province']);
			$this->set('province',$province);
		}else{
			$provinces = $this->Province->find('all');
			$this->set('provinces',$provinces);
		}
	}
	
	
}

?>