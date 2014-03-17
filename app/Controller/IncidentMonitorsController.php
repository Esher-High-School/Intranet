<?php
class IncidentMonitorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');
	
	var $uses = array('IncidentMonitor', 'Student');
	
	var $paginate = array(
		'fields' => array('IncidentMonitor.id', 'IncidentMonitor.upn', 'IncidentMonitor.username', 'IncidentMonitor.dateadded', 'IncidentMonitor.enddate'),
		'maxLimit' => 100,
		'limit' => 100,
		'order' => array(
			'IncidentMonitor.enddate' => 'desc'
		)
	);

	public function beforeFilter() {
		$username = $this->basicAuth->getUsername();
		$user = $this->User->findByUser($username);
		if (!($this->basicAuth->checkGroupMembership($user, 'Incident Monitoring'))) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
	}
	
	public function index() {
		$this->set('title', 'Listing Incident Monitoring Entries');
		$data = $this->paginate('IncidentMonitor');
		$this->set('incidentmonitors', $data);
	}
	
	public function add($upn=null) {
		$this->set('title', 'Monitor Student');
		$student = $this->Student->find('first', array('conditions' => array('Student.upn' => $upn)));
		$this->set('upn', $upn);
		$this->set('student', $student);
		if($this->request->is('post')) {
			if ($this->IncidentMonitor->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						You are now monitoring incidents for this student.
					</div>
				');
				$this->redirect(array('controller' => 'students', 'action' => 'incidentMonitoringList'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to setup monitoring. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
}