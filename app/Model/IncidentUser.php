<?php
class IncidentUser extends AppModel {
	var $primaryKey = 'id';
	var $name = 'IncidentUser';
	
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getUsers() {
		return $this->find('all', array(
				'order' => 'IncidentUser.username ASC'
			)
		);
	}
}