<?php
class GroupMembership extends AppModel {
	var $name = 'GroupMembership';
	
	const admin = 2;
	const manager = 1;
	const member = 0;
	const blocked = 3;
	
	var $belongsTo =array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		);
/*	
	function isAMember($groupId,$userId){
		return $this->find('all',
									array=>('conditions'=>array('GroupMembership.group_id = '=>$groupId,
									'GroupMembership.user_id = '=>$UserId));
	}
	
	function isAdmin($groupId,$userId){
		var $role = $this->find('all',
									array=>('conditions'=>array('GroupMembership.group_id = '=>$groupId,
									'GroupMembership.user_id = '=>$UserId))[0]['GroupMembership']['role'];
		if($role==GroupMembership::admin){
			return true;
		}else{
			return false;
		}
	}
	
	function isManager($groupId,$userId){
		var $role = $this->find('all',
									array=>('conditions'=>array('GroupMembership.group_id = '=>$groupId,
									'GroupMembership.user_id = '=>$UserId))[0]['GroupMembership']['role'];
		if($role==GroupMembership::manager){
			return true;
		}else{
			return false;
		}
	}	
	
	function groupIds($userId)	
	{
		$groups = $this->find('all',array('conditions'=>array('GroupMembership.user_id = '=> $userId)));
		$idArray = [];
		foreach ($groups as $group) {
			
		}
	}

	
	function isMember($groupId,$userId){
		var $role = $this->find('all',
									array=>('conditions'=>array('GroupMembership.group_id = '=>$groupId,
									'GroupMembership.user_id = '=>$UserId))[0]['GroupMembership']['role'];
		if($role && $role==GroupMembership::member){
			return true;
		}else{
			return false;
		}
	}
*/	
}
?>