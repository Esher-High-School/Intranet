<?php
class HandbookDocument extends AppModel {
	var $useTable = 'handbook_documents';
	var $primaryKey = 'id';
	var $belongsTo = array(
		'HandBookCategory' => array(
			'className' => 'HandbookCategory',
			'foreignKey' => 'category',
			'counterCache' => true
		)
	);

	function getDocuments($category) {
		$this->find('all', 
			array('conditions' => array(
					'category' => $category
				),
			),
			array('order' => array(
					'name' => 'ASC'
				)
			)
		);
	}
}
