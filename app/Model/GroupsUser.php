<?php
class GroupsUser extends AppModel {
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id'
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id'
		)
	);
}