<?php
class HandbookDocumentsController extends AppController {
	public $helpers = array('Html', 'Form', 'Fck');
	public $components = array('Session');

	var $uses = array('HandbookDocument', 'HandbookCategory', 'cmsuser');

	public function beforeFilter() {
		$categories = $this->HandbookCategory->getAll();
		$this->set('categories', $categories);	
	}

	public function home() {
		$this->set('title', 'Home');
		$this->set('handbook', true);
	}

	public function index() {
		$this->set('title', 'Index');
		$categories = $this->HandbookCategory->getAll();
		$this->set('categories', $categories);
	}

	public function view($id) {
		$this->HandbookDocument->id = $id;
		$document = $this->HandbookDocument->read();
		$this->set('title', $document['HandbookDocument']['name']);
		$documentPath = ('../webroot/files/handbook/' . $document['HandbookDocument']['path']);
		if (file_exists($documentPath)) {	
			$this->set('exists', true);
		} else {
			$this->set('exists', false);
		}
		$this->set('document', $document);
		
	}
}
