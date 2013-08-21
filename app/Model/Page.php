<?php
class Page extends AppModel {
	var $useTable = 'pages';
	
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'page' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getPages() {
		return $this->find('all', array(
			'order' => 'name ASC'
		));
	}
}
