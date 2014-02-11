<?php
class User extends AppModel {
	public $hasAndBelongsToMany = array(
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'groups_users',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'group_id',
			'unique' => true,
		)
	);

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