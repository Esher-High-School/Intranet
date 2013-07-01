<?php
class Subject extends AppModel {
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
		)
	);
}