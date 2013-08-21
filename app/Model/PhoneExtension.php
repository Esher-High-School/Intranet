<?php
class PhoneExtension extends AppModel {
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'extension' => array(
			'rule' => 'notEmpty'
		)
	);
}