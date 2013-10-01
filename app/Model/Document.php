<?php
class Document extends AppModel {
	public $belongsTo = array(
		'DocumentCategory' => array(
			'className' => 'DocumentCategory',
			'joinTable' => 'document_categories',
			'foreignKey' => 'id',
			'associationForeignKey' => 'category_id',
		)
	);

	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'document' => array(
			'rule' => 'notEmpty'
		),
		'category_id' => array(
			'rule' => 'notEmpty'
		)
	);

	function getDocument($id) {
		$this->Document->id = $id;
		return $this->Document->read;
	}

	function getFromCategory($category_id) {
		return $this->find('all', array(
				'conditions' => array(
					'Document.category_id' => $category_id
				),
				'order' => array(
					'Document.name' => 'ASC'
				)
			)
		);
	}
}
