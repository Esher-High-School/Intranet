<?php
class Student extends AppModel {
	var $primaryKey = 'upn';
	
	public $validate = array(
		'surname' => array(
			'rule' => 'notEmpty'
		),
		'forename' => array(
			'rule' => 'notEmpty'
		),
		'DOB' => array(
			'rule' => 'notEmpty'
		),
		'year' => array(
			'rule' => 'notEmpty'
		),
		'form' => array(
			'rule' => 'notEmpty'
		),
		'upn' => array(
			'rule' => 'notEmpty'
		),
		'adno' => array(
			'rule' => 'notEmpty'
		)
	);
	
	public $hasMany = array(
		'Incident' => array(
			'className' => 'Incident', 
			'foreignKey' => 'upn'
		)
	);
	
	public $belongsTo = array(
		'Tutor' => array(
			'className' => 'Tutor',
			'foreignKey' => 'form',
			'associationForeignKey' => 'form',
			'unique' => true
		)
	);
	
	function yearGroup($year) {
		return $this->find('all', 
			array(
				'conditions' => array('
					Student.year' => $year
				), 
				'order' => 'Student.surname ASC'
				)
			);
	}

}