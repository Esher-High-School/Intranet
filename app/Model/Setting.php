<?php
class Setting extends AppModel {
	var $useTable = 'settings';
	var $primaryKey = 'id';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'value' => array(
			'rule' => 'notEmpty'
		)
	);

	function getSettings() {
		return $this->find('all', array('order' => array('name' => 'ASC')));
	}
}