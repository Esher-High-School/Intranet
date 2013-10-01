<?php
class DocumentCategoriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	var $uses = array('Document', 'DocumentCategory', 'CmsUser');

	public function index() {
		$this->set('title', 'Document Categories');
		$categories = $this->DocumentCategory->getCategories();
		$this->set('categories', $categories);
	}

	public function view($id) {
		$this->DocumentCategory->id = $id;
		$category = $this->DocumentCategory->read();
		$documents = $this->Document->getFromCategory($id);
		$this->set('category', $category);
		$this->set('documents', $documents);
	}

	public function add() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if (!isset($cmsuser['CmsUser'])) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Document Category');
		if ($this->request->is('post')) {
			if($this->DocumentCategory->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your category has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your category. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Category');
		$this->DocumentCategory->id = $id;
		$this->set('id', $id);
		if ($this->request->is('get')) {
			$this->request->data = $this->DocumentCategory->read();
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
						Unable to update your category. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->DocumentCategory->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Document category deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}