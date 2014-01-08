<?php
class PhoneExtension extends AppModel {
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'extension' => array(
			'rule' => 'notEmpty'
		)
	);

	function getExtensions() {
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