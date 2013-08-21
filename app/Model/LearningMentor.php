<?php
class LearningMentor extends AppModel {
	var $useTable = 'learningmentors';
	
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		)
	);
}