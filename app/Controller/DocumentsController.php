<?php
class DocumentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('Document', 'CmsUser');
	
	public function beforeFilter() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		$this->set('cmsuser', $cmsuser);
	}
	
	public function index() {
		$this->set('title', 'Useful Documents');
		$documents = $this->Document->find('all');
		$this->set('documents', $documents);
	}
	
	public function add() {
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Document');
		if ($this->request->is('post')) {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your document has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'view'));
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
}