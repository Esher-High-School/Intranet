<?php
class Hod extends AppModel {
	var $useTable = 'hod';
	
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		),
		'depts' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getHodDepts($username) {
		return $this->find('all', array(
			'conditions' => array(
				'username' => $username
			)
		));
	}
	
	function getHodsForDept($dept) {
		return $this->find('all', array(
			'conditions' => array(
				'dept' => $dept
			)
		));
	}
}