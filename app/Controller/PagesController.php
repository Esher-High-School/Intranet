<?php
class PagesController extends AppController {
	public $helpers = array('Html', 'Form', 'Fck');
	public $components = array('Session');
	
	var $uses = array('Page', 'Document', 'CmsUser');
	
	public function index() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('cmsuser', $cmsuser);
		$this->set('title', 'Listing All Pages');
		$this->set('pages', $this->Page->getPages());
	}
	
	public function view($id = null) {
		$this->set('title', 'Viewing Page');
		$this->Page->id = $id;
		$this->set('page', $this->Page->read());
	}
	
	public function add() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('cmsuser', $cmsuser);
		$this->set('title', 'Add New Page');
		if ($this->request->is('post')) {
			if ($this->Page->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your page has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'view'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your page. Please make sure you have filled out all fields.
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
				$this->redirect(array('action' => 'edit', $id));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update page. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Page->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Page deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}
