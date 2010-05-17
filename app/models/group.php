<?php
class Group extends AppModel {
	var $name = 'Group';
	var $displayField = 'name';
	const admin = 2;
	const manager = 1;
	const member = 0;
	
	var $validate = array(
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'tableName' => 'users',
			'with'=>'GroupMembership',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'user_id',
				'joinTable' => 'group_memberships',
				'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'GroupPost' => array(
			'className' => 'GroupPost',
			'foreignKey' => 'group_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	
	function joinedGroups($user_id)
	{
		$this->find('all',
		array(
			'joins'=>' join group_posts on group_posts.group_id = groups.id',
			'conditions'=>array('group_posts.user_id = '=>$user_id),
			'order'=>'groups.created desc'
		
		)
			);
	}

}
?>