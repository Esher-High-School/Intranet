<?php
class HandbookCategory extends AppModel {
	var $useTable = 'handbook_categories';
	var $primaryKey = 'id';

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'name' => array(
			'rule' => 'isUnique',
			'message' => 'Name must be unique'
		)
	);

	public $hasMany = array(
		'HandbookDocument' => array(
			'className' => 'HandbookDocument',
			'foreignKey' => 'category'
		)
	);

	function getCategories() {
		return $this->find('all', 
			array('order' => 
				array('name' => 'ASC')
				)
			);
	}
}