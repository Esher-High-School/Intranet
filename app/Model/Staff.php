<?php
class Staff extends AppModel {
	var $useTable = 'staff';

	var $validate = array(
		'forename' => array(
			'rule' => 'notEmpty',
		),
		'surname' => array(
			'rule' => 'notEmpty'
		)
	);

	function getAllStaff() {
		return $this->find('all',
			array(
				'order' => array(
					'Staff.name' => 'ASC'
				)
			)
		);
	}

	function getByType($type) {
		return $this->find('all',
			array(
				'conditions' => array(
					'Staff.type' => $type
				),
				'order' => array(
					'Staff.title' => 'ASC',
					'Staff.forename' => 'ASC',
					'Staff.surname' => 'ASC'
				)
			)
		);
	}
}