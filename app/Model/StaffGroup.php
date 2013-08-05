<?php
class StaffGroup extends AppModel {
	var $useTable = 'staff_groups';

	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		)
	)

	public $hasMany = array(
		'Staff' => array(
			'className' => 'Staff',
			'foreignKey' => 'group_id'
		)
	);

	function getAllGroups() {
		return $this->find('all',
			array(
				'order' => array(
					'StaffGroup.name' => 'ASC'
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
					'StaffGroup.name' => 'ASC'
				)
			)
		);
	}
}