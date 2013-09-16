<?php
class Link extends AppModel {
	var $useTable = 'menu';
	var $primaryKey = 'id';
	var $name = 'Link';
	
	public $validate = array(
		'menu' => array(
			'rule' => 'notEmpty'
		),
		'link' => array(
			'rule' => 'notEmpty'
		),
	);

	function getSidebarLinks() {
		return $this->find('all', array(
			'conditions' => array(
				'Link.type' => 0
			),
			'order' => array(
				'Link.menu' => 'ASC'
			)
		));
	}

	function getHeaderLinks() {
		return $this->find('all', array(
			'conditions' => array(
				'Link.type' => 1
			)
		));
	}
}
