<?php
/* Word Fixture generated on: 2010-06-26 15:06:03 : 1277564643 */
class WordFixture extends CakeTestFixture {
	var $name = 'Word';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'word' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 45),
		'description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 128),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'updated' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'language' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'length' => 10),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'word' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet',
			'user_id' => 1,
			'created' => '2010-06-26 15:04:03',
			'updated' => '2010-06-26 15:04:03',
			'language' => 1
		),
	);
}
?>