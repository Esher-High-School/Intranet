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

	public $belongsTo = array(
		'StaffGroup' => array(
			'className' => 'StaffGroup',
			'foreignKey' => 'group_id'
		)
	);

	function getAllStaff() {
		return $this->find('all',
			array(
				'order' => array(
					'Staff.title' => 'ASC',
					'Staff.forename' => 'ASC',
					'Staff.surname' => 'ASC'
				)
			)
		);
	}

	function getByType($type) {
		return $this->find('all',
			array(
				'conditions' => array(
					'StaffGroup.type' => $type
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