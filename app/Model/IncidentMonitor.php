<?php
class IncidentMonitor extends AppModel {
	public $validate = array(
		'username' => array(
			'rule' => 'notEmpty'
		),
		'upn' => array(
			'rule' => 'notEmpty'
		)
	);
	
	public $belongsTo = array(
		'Incident' => array(
			'className' => 'Incident', 
			'joinTable' => 'incidents',
			'foreignKey' => 'upn',
			'associationForeignKey' => 'upn',
			'unique' => true
		)
	);
}