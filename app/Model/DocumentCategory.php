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
	
	function getCategories() {
		return $this->find('all', array('order' => array('name' => 'ASC')));
	}
	
	function getCategoryDocuments($id) {
		$this->DocumentCategory->id = $id;
		return $this->DocumentCategory->read;
	}
}