<?php
class IncidentOption extends AppModel {
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