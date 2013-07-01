<?php
class IncidentOption extends AppModel {
	var $useTable = 'incident_options';
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function findOptions() {
		return $this->find('all', array(
				'order' => 'name ASC'
			)
		);
	}
}