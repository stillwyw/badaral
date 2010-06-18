<?php
class User extends AppModel {
	var $name = 'User';
	var $displayField = 'username';
	
	const avatar_path = 'u_thumb';
	
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
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => '请输入合法的邮箱地址！',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule'=> array('isUnique')	
			)			
		),
		'uid' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'isUnique' => array(
				'rule'=> array('isUnique')	
			)
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'GroupMembership' => array(
			'className' => 'GroupMembership',
			'foreignKey' => 'user_id',
			'dependent' => false
		)
	);
	
		var $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'tableName' => 'groups',
			'with'=>'GroupMembership',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'group_id',
				'joinTable' => 'group_memberships',
				'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

// virtual fields 
var $virtualFields = array(
  //  'uid_or_id' => "User.uid || User.id"
);


}
?>