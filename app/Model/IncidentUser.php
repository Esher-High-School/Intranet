<?php
class IncidentUser extends AppModel {
	var $useTable = 'incidentaccess';
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