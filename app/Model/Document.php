	<?php
class Document extends AppModel {
	public $belongsTo = array(
		'Page' => array(
			'className' => 'Page',
			'joinTable' => 'Pages',
			'foreignKey' => 'id',
			'associationForeignKey' => 'page_id',
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
					'Document.page_id' => $category_id
				),
				'order' => array(
					'Document.name' => 'ASC'
				)
			)
		);
	}

	function countFromCategory($category_id) {
		return $this->find('count', array(
				'conditions' => array(
					'Document.page_id' => $category_id
				)
			)
		);
	}
}
