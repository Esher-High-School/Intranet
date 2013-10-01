<?php
class DocumentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('Document', 'DocumentCategory', 'CmsUser');

	public function beforeFilter() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if (!isset($cmsuser['CmsUser'])) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
	}

	public function index() {
		$this->set('title', 'All Documents');
		$documents = $this->Document->find('all');
		$this->set('documents', $documents);
	}

	public function category($id) {
		$this->DocumentCategory->id = $id;
		$category = $this->DocumentCategory->read();
		$this->set('category', $category);

		$documents = $this->Documents->getByCategory($id);
	}
	
	public function add($category_id=null) {
		$this->set('title', 'Add New Document');
		$categories = $this->DocumentCategory->getCategories();
		$this->set('categories', $categories);
		if ($category_id !== null) {
			$selected_category = $this->DocumentCategory->findById($category_id);
			$this->set('selected_category', $selected_category);
		}
		if ($this->request->is('post')) {
			if ($this->uploadFile() && $this->Document->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your document has been added successfully.
					</div>
				');
				$this->redirect(array('controller' => 'DocumentCategories', 'action' => 'view', $this->request->data['Document']['category_id']));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your document. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Document');
		$this->Document->id = $id;
		if ($this->request->is('get')) {
			$categories = $this->DocumentCategory->getCategories();
			$this->request->data = $this->Document->read();
			$category_id = $this->request->data['Document']['category_id'];
			$document_category = $this->DocumentCategory->findById($category_id);
			$this->set('document_category', $document_category);
			$this->set('categories', $categories);
		} else {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Document updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update your document. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	// Private function used to handle file uploads
	function uploadFile() {
		$file = $this->data['Document']['document'];
		if ($file['error'] == UPLOAD_ERR_OK) {
			$id = 
			$category = $this->data['Document']['category_id'];
			if (move_uploaded_file($file['tmp_name'], APP.'webroot'.DS.'files'.DS.$category.DS.$id)) {
				$this->data['Document']['document']  = $id;
				return true;
			}
		}
		return false;
	}
}
