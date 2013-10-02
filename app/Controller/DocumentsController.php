<?php
class DocumentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('Document', 'DocumentCategory', 'CmsUser');

	public function beforeFilter() {

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
		$document = $this->Document->read();
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
				$this->redirect(array('controller' => 'documentCategories', 'action' => 'view', $document['Document']['category_id']));
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

	public function download($id=null) {
		if (!$id) {
			$this->Session->setFlash('
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">
						&times;
					</button>
					File not found. If you believe this to be in error, please contact ICT support.
				</div>
			');
			$this->redirect(array('controller' => 'documentCategories', 'action' => 'index'));
		}
		$this->Document->id = $id;
		$document = $this->Document->read();
		if (!$document) {
			$this->Session->setFlash('
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">
						&times;
					</button>
					File not found. If you believe this to be in error, please contact ICT support.
				</div>
			');
			$this->redirect(array('controller' => 'documentCategories', 'action' => 'index'));
		}
		$filename = $document['Document']['filename'];
		$this->response->file('Uploads'.DS.$document['Document']['document'], array('download' => true, 'name' => $filename));
		return $this->response;
		/*
		$this->set(array(
			'document' => $document['Document']['document'],
			'name' => substr($filename, 0, strrpos($filename, '.')),
			'extension' => substr(strrchr($filename, '.'), 1),
			'path' => APP.'Uploads'.DS,
			'download' => true
		));
		*/
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->Document->id = $id;
		$document = $this->Document->read();
		$category = $document['Document']['category_id'];
		if ($this->deleteFile($id) && $this->Document->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Document deleted successfully.
				</div>
			');
			$this->redirect(array('controller' => 'documentCategories', 'action' => 'view', $category));
		} else {
			die('File did not delete');
		}
	}

	// Private function used to handle file uploads
	function uploadFile() {
		$file = $this->data['Document']['document'];
		if ($file['error'] == UPLOAD_ERR_OK) {
			$id = String::uuid();
			$category = $this->data['Document']['category_id'];
			if (move_uploaded_file($file['tmp_name'], APP.'Uploads'.DS.$id)) {
				$this->request->data['Document']['document'] = $id;
				$this->request->data['Document']['filename'] = $file['name'];
				$this->request->data['Document']['filetype'] = $file['type'];
				return true;
			}
		}
		return false;
	}

	function deleteFile($id) {
		$this->Document->id = $id;
		$document = $this->Document->read();
		$path = APP.'Uploads'.DS.$document['Document']['document'];
		if (file_exists($path)) {
			unlink($path);
			return true;
		} else {
			return false;
		}
	}
}
