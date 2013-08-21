<?php
class Setting extends AppModel {
	var $useTable = 'settings';
	var $primaryKey = 'id';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'name' => array(
			'rule' => 'isUnique',
			'message' => 'Name must be unique'
		),
		'value' => array(
			'rule' => 'notEmpty'
		)
	);

	function getSettings() {
		$dbsettings = $this->find('all');
		foreach ($dbsettings as $setting) {
			$settings[$setting['Setting']['name']] = $setting['Setting']['value'];
		}
		return $settings;
	}

	function listSettings() {
		return $this->find('all', array('order' => array('name' => 'ASC')));
	}
}