<?php
class CmsUser extends AppModel {
	public $validate = array(
		'user' => array(
			'rule' => 'notEmpty'
		),
		'authlevel' => array(
			'rule' => 'notEmpty'
		)
	);

	function getUsers() {
		return $this->find(
			'all',
			array(
				'order' => array(
					'user' => 'ASC'
				)
			)
		);
	}
}