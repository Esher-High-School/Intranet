<?php
class SmtsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');
	
	var $uses = array('Smt', 'User');

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
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Listing SMT Staff');
		$smts = $this->Smt->find('all',
			array(
				'order' => array(
					'Smt.username' => 'asc'
				)
			)
		);
		$this->set('smts', $smts);
	}
	
	public function add() {
		$this->set('title', 'Add SMT Staff');
		
		$this->set('Add New SMT Staff');
		if ($this->request->is('post')) {
			if($this->Smt->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>SMT staff added successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>
							Unable to add SMT staff. Please ensure that you have filled out all fields correctly.
						</p>
					</div>
				');
			}
		}
	}
	
	public function edit($id = null) {
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