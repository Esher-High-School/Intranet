<?php
class HandbookDocumentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');

	var $uses = array('HandbookDocument', 'HandbookCategory', 'User');

	public function beforeFilter() {
		$username = $this->basicAuth->getUsername();
		if (!($this->action == 'view' or $this->action == 'home' or $this->action == 'document')) {
			$user = $this->User->findByUser($this->basicAuth->getUsername());
			if (!$this->basicAuth->checkGroupMembership($user, 'Handbook Publishers')) {
				$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
			} else {
				$this->set('username', $username);
			}
		}

		$categories = $this->HandbookCategory->getAll();
		$this->set('categories', $categories);

		foreach ($categories as $category) {
			$cdocuments[$category['HandbookCategory']['id']] = array(
				$this->HandbookDocument->find(
					'all',
					array(
						'order' => 'HandbookDocument.name ASC',
						'conditions' => array(
							'category' => $category['HandbookCategory']['id']
						)
					)
				)
			);
		}

		/*foreach ($categories as $category) {
			$cdocuments[$category['HandbookCategory']['id']] = array(
				$this->HandbookDocument->find('all', array('order' => 'name ASC'))
			);
		} */

		$this->set('cdocuments', $cdocuments);
	}

	public function home() {
		$this->set('title', 'Staff Handbook');
		$this->set('handbook', true);
	}

	public function index() {
		$this->set('title', 'Index');
		$documents = $this->HandbookDocument->find('all');
		$this->set('documents', $documents);
	}

	public function view($id) {
		$this->HandbookDocument->id = $id;
		$document = $this->HandbookDocument->read();
		$this->set('title', $document['HandbookDocument']['name']);
		$documentPath = ('../Uploads/' . $document['HandbookDocument']['document']);
		if (file_exists($documentPath)) {
			$this->set('exists', true);
		} else {
			$this->set('exists', false);
		}
		$this->set('document', $document);
	}

	public function document($id) {
		$this->HandbookDocument->id = $id;
		$document = $this->HandbookDocument->read();
		if (!$document) {
			$this->Session->setFlash('
				<div class="alert alert-error">
					<button class="close" data-dismiss="alert">
						&times;
					</button>
					File not found. If you believe this to be in error, please contact ICT support.
				</div>
			');
			$this->redirect(array('controller' => 'HandbookCategory', 'action' => 'index'));
		}
		$filename = $document['HandbookDocument']['filename'];
		$this->response->type('pdf');
		$this->response->file('Uploads'.DS.$document['HandbookDocument']['document']);
		$this->response->header('Content-Disposition', 'inline');
		return $this->response;
	}

	public function add($categoryId=null) {
		$this->set('title', 'Add Handbook Document');
		$categories = $this->HandbookCategory->getAll();
		$this->set('categories', $categories);

		if ($categoryId !== null) {
			$selectedCategory = $this->HandbookCategory->findById($categoryId);
			$this->set('selectedCategory', $selectedCategory);
		}
		if ($this->request->is('post')) {
			if($this->uploadFile() && $this->HandbookDocument->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Handbook document added successfully.
					</div>
				');
				$this->redirect(array('controller' => 'handbookCategories', 'action' => 'view', $this->request->data['HandbookDocument']['category']));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Unable to add your handbook document. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
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
				$this->redirect(array('controller' => 'handbookCategories', 'action' => 'view', $this->request->data['HandbookDocument']['category']));
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

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		$this->HandbookDocument->id = $id;
		$document = $this->HandbookDocument->read();
		$category = $document['HandbookDocument']['category'];
		if ($this->deleteFile($id) && $this->HandbookDocument->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Handbook document deleted successfully.
				</div>
			');
			$this->redirect(array('controller' => 'handbookCategories', 'action' => 'view', $category));
		}
	}

	// Private function used to handle file uploads
	function uploadFile() {
		$file = $this->data['HandbookDocument']['document'];
		if ($file['error'] == UPLOAD_ERR_OK) {
			$id = String::uuid();
			$category = $this->data['HandbookDocument']['category'];
			if (move_uploaded_file($file['tmp_name'], APP.'Uploads'.DS.$id)) {
				$this->request->data['HandbookDocument']['document'] = $id;
				$this->request->data['HandbookDocument']['filename'] = $file['name'];
				$this->request->data['HandbookDocument']['filetype'] = $file['type'];
				return true;
			}
		}
		return false;
	}

	function deleteFile($id) {
		$this->HandbookDocument->id = $id;
		$document = $this->HandbookDocument->read();
		$path = APP.'Uploads'.DS.$document['HandbookDocument']['document'];
		if (file_exists($path)) {
			unlink($path);
			return true;
		} else {
			return false;
		}
	}
}
