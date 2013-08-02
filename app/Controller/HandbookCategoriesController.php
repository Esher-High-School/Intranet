<?php
class HandbookCategoriesController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('title', 'Listing handbook categories');
		$this->set('categories', $this->HandbookCategory->getCategories());
	}

	public function view($id) {
		$this->HandbookCategory->id = $id;
		$category = $this->HandbookCategory->read();
		$this->set('category', $category);
	}

	public function add() {
		$this->set('title', 'Add handbook category');
		if ($this->request->is('post')) {
			if ($this->HandbookCategory->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your handbook category has been updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="alert alert-error">
						Unable to add your handbook category. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit handbook category');
		$this->HandbookCategory->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->HandbookCategory->read();
		} else {
			if ($this->HandbookCategory->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Handbook category updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update handbook category. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->HandbookCategory->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Handbook category deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}