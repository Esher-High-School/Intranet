<?php
class CmsUser extends AppModel {
	var $useTable = 'cms_users';
	public $validate = array(
		'user' => array(
			'rule' => 'notEmpty'
		),
		'authlevel' => array(
			'rule' => 'notEmpty'
		)
	);
}