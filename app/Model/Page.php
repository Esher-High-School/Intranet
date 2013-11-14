<?php
class Page extends AppModel {
	var $useTable = 'document_categories';
	var $name = 'Page';

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

	function getPages() {
		return $this->find('all', array('order' => array('name' => 'ASC')));
	}
	
	function getDocuments($id) {
		return $this->find(
			'first', 
			array(
				'conditions' => array(
					'DocumentCategory.id' => $id
				)
			)
		);
	}
}
=======
<?php
class Page extends AppModel {
	var $useTable = 'pages';
	
	public $validate = array(
		'name' => array(
			'rule' => 'notEmpty'
		),
		'page' => array(
			'rule' => 'notEmpty'
		)
	);
	
	function getPages() {
		return $this->find('all', array(
			'order' => 'name ASC'
		));
	}
}
>>>>>>> 9efa30e63602147fffdd5fd98f8452eab8bc098e
