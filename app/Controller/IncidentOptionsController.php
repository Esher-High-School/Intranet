<?php
class IncidentOptionsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('IncidentOption', 'User');
	
	public function beforeFilter() {

	}
	
	public function index() {
		$this->set('title', 'Incident Options');
		$incidentoptions = $this->IncidentOption->find('all', 
			array(
				'order' => 'Name ASC'
			)
		);
		$this->set('incidentoptions', $incidentoptions);
	}
	
	public function add() {
		$this->authenticate();
		$this->set('title', 'Add Incident Option');
		if ($this->request->is('post')) {
			if ($this->IncidentOption->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your incident option has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
							Unable to add your incident option. Please make sure that you have filled out all fields correctly.
						</button>
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$this->authenticate();
		$this->set('title', 'Edit Incident Option');
		$this->IncidentOption->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->IncidentOption->read();
		} else {
			if ($this->IncidentOption->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Room updated successfully.
					</div>
				');
				$this->redirect(
					array(
						'action' => 'index'
					)
				);
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update incident option. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		$this->authenticate();
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->IncidentOption->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Room deleted successfully.
				</div>
			');
			$this->redirect(
				array(
					'action' => 'index'
				)
			);
		}
	}

	// Authentication
	function authenticate() {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(
				array
				(
					'controller' => 'users',
					'action' => 'accessdenied'
				)
			);
		}
		$this->set('User', $User);
	}
}