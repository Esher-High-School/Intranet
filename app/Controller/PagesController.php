<?php
class PagesController extends AppController {
	public $helpers = array('Html', 'Form', 'Markdown.Markdown');
	public $components = array('Session');

	var $uses = array('Document', 'Page', 'User');

	public function beforeFilter() {
		if (!($this->action == 'view')) {
			$Authentication = new Authentication;
			$User = $this->User->findByUser($Authentication->Username());
			if (!($User['User']['authlevel']) >= 1) {
				$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
			}
		}
	}

	public function index() {
		$this->set('title', 'Pages');
		$categories = $this->Page->getCategories();
		$this->set('categories', $categories);
	}

	public function view($id) {
		$this->Page->id = $id;
		$page = $this->Page->read();
		$documents = $this->Document->getFromCategory($id);

		if (!isset($page['Page'])) {
			throw new NotFoundException;
		}

		$title = $page['Page']['name'];
		$subtitle = ('Last updated ' . $page['Page']['modified']);

		$this->set('title', $title);
		$this->set('category', $page);
		$this->set('documents', $documents);
	}

	public function add() {
		$this->set('title', 'Add New Page');
		if ($this->request->is('post')) {
			if($this->Page->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your page has been added successfully.
					</div>
				');
				$id = $this->Page->id;
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your page. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Page');
		$this->Page->id = $id;
		$this->set('id', $id);
		if ($this->request->is('get')) {
			$this->request->data = $this->Page->read();
		} else {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Page updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update your page. Please make sure that you have filled out all fields correctly.
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
						Page deleted successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
		} else {
			if ($documentCount == 1) {
				$text = '
					<p>
						The page still contains ' . $documentCount . ' document.
					</p>
					<p>
						You must delete it before attempting to delete the page.
					</p>
				';
			} else {
				$text = '
					<p>
						The page still contains ' . $documentCount . ' documents.
					</p>
					<p>
						You must delete them before attempting to delete the page.
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
