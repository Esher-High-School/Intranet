<?php
class PagesController extends AppController {
	public $helpers = array('Html', 'Form', 'Markdown.Markdown');
	public $components = array('Session');

	var $uses = array('Document', 'Page', 'CmsUser');

	public function index() {
		$this->set('title', 'Pages');
		$categories = $this->Page->getCategories();
		$this->set('categories', $categories);
	}

	public function view($id) {
		$this->Page->id = $id;
		$category = $this->Page->read();
		$documents = $this->Document->getFromCategory($id);

		$title = $category['Page']['name'];
		$this->set('title', $title);
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
			if($this->Page->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your category has been added successfully.
					</div>
				');
				$id = $this->Page->id;
				$this->redirect(array('action' => 'view', $id));
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
		$this->Page->id = $id;
		$this->set('id', $id);
		if ($this->request->is('get')) {
			$this->request->data = $this->Page->read();
		} else {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Document updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'view', $id));
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
		$documentCount = $this->Document->countFromCategory($id);
		if ($documentCount == 0) {
			if ($this->Page->delete($id)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Document category deleted successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
		} else {
			if ($documentCount == 1) {
				$text = '
					<p>
						The category still contains ' . $documentCount . ' document.
					</p>
					<p>
						You must delete it before attempting to delete the category.
					</p>
				';
			} else {
				$text = '
					<p>
						The category still contains ' . $documentCount . ' documents.
					</p>
					<p>
						You must delete them before attempting to delete the category.
					</p>
				';
			}

			$this->Session->setFlash('
				<div class="alert alert-danger">
					<button class="close" data-dismiss="alert">&times;</button>
					' . $text . '
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}
