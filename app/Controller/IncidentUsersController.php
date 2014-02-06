<?php
class IncidentUsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('IncidentUser', 'User');
	
	public function beforeFilter() {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if (!isset($User['User']['id'])) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
	}
	
	public function index() {
		$this->set('title', 'Incident Users');
		$incidentusers = $this->IncidentUser->getUsers();
		$this->set('incidentusers', $incidentusers);
	}
	
	public function add() {
		$this->set('title', 'Add Incident User');
		$this->set('options', array(0 => 'No', 1 => 'Yes'));
		if ($this->request->is('post')) {
			if ($this->IncidentUser->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Incident user added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Unable to add the incident user. Please make sure you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$this->set('title', 'Edit Incident User');
		$this->set('options', array(0 => 'No', 1 => 'Yes'));
		
		$this->IncidentUser->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->IncidentUser->read();
		} else {
			if ($this->IncidentUser->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Incident user updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to edit incident user. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		if ($this->IncidentUser->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Incident user deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
}