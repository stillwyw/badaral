<?php
class Guest extends AppModel {
	var $name = 'Guest';
	var $displayField = 'body';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
/*		'Sender' => array(
			'className' => 'Sender',
			'foreignKey' => 'sender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
				),*/
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>