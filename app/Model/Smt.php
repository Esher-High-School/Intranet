<?php
class Smt extends AppModel {

	
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		)
	);
}