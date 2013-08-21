<?php
class Room extends AppModel {
	var $validate = array(
		'name' => array(
			'rule' => 'notEmpty',
		)
	);
}