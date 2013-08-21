<?php
class SmtsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');
	
	var $uses = array('Smt', 'CmsUser');
	
	var $paginate = array(
		'fields' => array('Smt.id', 'Smt.username'),
		'maxLimit' => 2000,
		'limit' => 2000,
		'order' => array(
			'Smt.year' => 'asc'
		)
	);
	
	public function index() {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Listing SMT Staff');
		$data = $this->paginate('Smt');
		$this->set('smts', $data);
	}
	
	public function add() {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('Add New SMT Staff');
		if ($this->request->is('post')) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>SMT staff added successfully.</p>
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function edit($id = null) {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Edit SMT Staff');
		$this->Smt->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Smt->read();
		} else {
			if ($this->Smt->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>SMT staff updated successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Unable to update SMT staff. Please confirm that you have entered all details correctly.</p>
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		$Authentication = new Authentication;
		$user = $this->CmsUser->findByUser($Authentication->Username());
		if ($user['CmsUser']['authlevel'] <2) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Smt->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>SMT staff deleted successfully.</p>
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
}