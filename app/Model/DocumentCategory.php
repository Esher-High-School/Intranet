<?php
class DocumentCategory extends AppModel {
	var $useTable = 'document_categories';
	var $name = 'DocumentCategory';

	public $hasMany = array(
		'Document' => array(
			'className' => 'Document',
			'foreignKey' => 'category_id'
		)
	);

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getCategories() {
		return $this->find('all', array('order' => array('name' => 'ASC')));
	}
	
	function getDocuments($id) {
		$this->id = $id;
		return $this->read;
	}
}
