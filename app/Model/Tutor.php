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
	
	function getTutors() {
		return $this->find('all', array('order' => 'Tutor.username ASC'));
	}
	
	function getTutorsForForm($form) {
		return $this->find('all', array(
			'conditions' => array(
				'form' => $form
			)
		));
	}
}