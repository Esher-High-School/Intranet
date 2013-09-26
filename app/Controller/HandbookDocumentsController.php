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

	public function add() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser = null) {
			$this->redirect(array('controller' => 'CmsUser', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add Handbook Document');
		if ($this->request->is('post')) {
			if($this->HandbookDocument->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">
							&times;
						</div>
						Handbook document added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Unable to add the handbook document. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser = null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Edit Handbook Document');
		$this->HandbookDocument->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->HandbookDocument->read();
		} else {
			if ($this->HandbookDocument->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Handbook document updated successfully. 
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update handbook document. Please ensure that you have filled in all fields correctly.
					</div>
				');
			}
		}
	}

	public function uploadFile() {
		$file = $this->data['Upload']['file'];
		if($file['error'] === UPLOAD_ERR_OK) {
			$id = String::uuid();
			if ($move_uploaded-File($file['tmp_name'], APP.'webroot/files/handbook/'.DS.$id)) {
				$this->data['HandbookDocument']['id'] = $id;
				$this->data['HandbookDocument']['filename'] = $file['name'];
				$this->data['HandbookDocument']['filesize'] = $file['size'];
				return true;
			}
		}
		return false;
	}
}
