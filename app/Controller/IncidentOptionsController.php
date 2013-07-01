<?php
class IncidentOptionsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('IncidentOption', 'CmsUser');
	
	public function beforeFilter() {
		$Authentication = new Authentication;
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		if ($cmsuser == null) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		$this->set('cmsuser', $cmsuser);
	}
	
	public function index() {
		$this->set('title', 'Listing Incident Options');
		$incidentoptions = $this->IncidentOption->find('all', array('order' => 'Name ASC'));
		$this->set('incidentoptions', $incidentoptions);
	}
	
	public function add() {
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
				$this->redirect(array('action' => 'index'));
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
			$this->redirect(array('action' => 'index'));
		}
	}
}