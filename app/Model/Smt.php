<?php
class Smt extends AppModel {
	var $useTable = 'smt';
	
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		)
	);
}