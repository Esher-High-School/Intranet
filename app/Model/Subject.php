<?php
class Subject extends AppModel {
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
		)
	);

	public $hasMany = array(
		'Staff' => array(
			'className' => 'Staff',
			'foreignKey' => 'subject_id'
		)
	);
}