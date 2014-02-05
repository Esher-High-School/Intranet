<?php
class LearningMentor extends AppModel {
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		)
	);
}