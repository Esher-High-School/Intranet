<?php
class Link extends AppModel {
	var $useTable = 'menu';
	var $primaryKey = 'id';
	var $name = 'Link';
	
	public $validate = array(
		'menu' => array(
			'rule' => 'notEmpty'
		),
		'link' => array(
			'rule' => 'notEmpty'
		),
	);
}