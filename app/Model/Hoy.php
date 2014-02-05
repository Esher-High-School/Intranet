<?php
class Hoy extends AppModel {
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		),
		'year' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getHoyYears($username) {
		return $this->find('all', array(
			'conditions' => array(
				'username' => $username
			),
			'order' => 'Hoy.year ASC'
		));
	}
	
	function getHoysForYear($year) {
		return $this->find('all', array(
			'conditions' => array(
				'year' => $year
			)
		));
	}
}