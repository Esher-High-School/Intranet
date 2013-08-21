<?php
class Subject extends AppModel {
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
		)
	);

	function getSubjects() {
		return $this->find('all', array(
				'order' => array(
					'Name' => 'ASC'
				)
			)
		);
	}
}
