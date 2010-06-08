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
			echo $this->params['province'];
			$province = $this->Province->findByProvince($this->params['province']);
			$cities = $this->City->findAllByFatherid($province['Province']['provinceid']);
			$this->set('province',$province);
			$this->set('cities',$cities);
		}else{
			$provinces = $this->Province->find('all');
			$this->set('provinces',$provinces);
		}
	}
	
	
}

?>