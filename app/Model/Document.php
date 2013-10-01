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

	function uploadFile() {
		$file = $this->data['Document']['document'];
		if ($file['error'] == UPLOAD_ERR_OK) {
			$id = String::uuid();
			$category = $this->data['Document']['category_id'];
			if (move_uploaded_file($file['tmp_name'], APP.'files'.DS.$category.DS.$id)) {
				$this->data['Document']['document'];
				return true;
			}
		}
		return false;
	}
}
