<?php
class Tutor extends AppModel {
	public $validate = array(
		'form' => array(
			'rule' => 'notEmpty'
		),
		'name' => array(
			'rule' => 'notEmpty'
		),
		'username' => array(
			'rule' => 'notEmpty'
		),
		'email' => array(
			'rule' => 'notEmpty'
		)
	);
	
	public $hasMany = array(
		'Student' => array(
			'className' => 'Student',
			'foreignKey' => 'form',
			'associationForeignKey' => 'form'
		)
	);
	
	function getTutors($year=null) {
		if ($year == null) {
			return $this->find('all', 
				array('order' => 'Tutor.form ASC')
			);
		} else {
			return $this->find('all', array(
				'order' => 'Tutor.username ASC',
				'conditions' => array(
					'Tutor.form LIKE' => $year . '%'
					)
				)
			);
		}
	}
	
	function getTutorsForForm($form) {
		return $this->find('all', array(
			'conditions' => array(
				'form' => $form
			)
		));
	}
}
