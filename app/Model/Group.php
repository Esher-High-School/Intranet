<?php
class Group extends AppModel {
	public $hasAndBelongsToMany = array(
		'User' => array(
			'className' => 'User',
			'joinTable' => 'groups_users',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'user_id',
			'unique' => true
		)
	);

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		)
	);

	function getGroups() {
		return $this->find(
			'all',
			array(
				'order' => array(
					'name' => 'ASC'
				)
			)
		);
	}
}