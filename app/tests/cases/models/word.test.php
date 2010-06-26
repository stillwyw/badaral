<?php
/* Word Test cases generated on: 2010-06-26 15:06:03 : 1277564643*/
App::import('Model', 'Word');

class WordTestCase extends CakeTestCase {
	var $fixtures = array('app.word', 'app.user', 'app.group_membership', 'app.group', 'app.group_post', 'app.event', 'app.event_user');

	function startTest() {
		$this->Word =& ClassRegistry::init('Word');
	}

	function endTest() {
		unset($this->Word);
		ClassRegistry::flush();
	}

}
?>