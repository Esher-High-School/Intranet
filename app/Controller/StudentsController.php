<?php
class StudentsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');

	var $uses = array('Student', 'User');

	var $paginate = array(
		'fields' => array('Student.surname', 'Student.forename', 'Student.DOB', 'Student.sex', 'Student.adno', 'Student.upn', 'Student.year', 'Student.form', 'Student.postcode', 'Student.sen', 'Student.onroll'),
		'maxLimit' => 2000,
		'limit' => 2000,
		'order' => array(
			'Student.year' => 'asc',
			'Student.surname' => 'asc'
		)
	);

	public function index($year = null) {
		if ($year == null ) {
			$this->redirect(array('action' => 'years'));
		}
		$this->set('title', 'Listing Students in Year ' . $year);
		$this->paginate = array(
			'conditions' => array('Student.year' => $year),
			'limit' => 2000,
			'maxLimit' => 2000
		);
		$data = $this->Student->yearGroup($year);
		$this->set('students', $data);
		$this->set('year', $year);
	}

	public function incidentFormList($year=null) {
		$this->set('title', 'Incident Reporting');
		if ($year !== null) {
			$this->set('year', $year);
			$students = $this->Student->yearGroup($year);
			$this->set('students', $students);
		}
	}

	public function incidentMonitoringList($year=null) {
		$user = $this->User->findByUser($this->basicAuth->getUsername());
		if (!$this->basicAuth->checkGroupMembership($user, 'Incident Monitoring')) {
			$this->redirect(array('controller' => 'users', array('accessdenied')));
		}
		$this->set('title', 'Incident Monitoring');
		if ($year !== null) {
			$this->set('year', $year);
			$students = $this->Student->yearGroup($year);
			$this->set('students', $students);
		}
	}

	public function incidentPrintList($year=null) {
		$user = $this->User->findByUser($this->basicAuth->getUsername());
		if (!$this->basicAuth->checkGroupMembership($user, 'Incident Printing')) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Incident Printing');
		if ($year !== null) {
			$this->set('year', $year);
			$students = $this->Student->yearGroup($year);
			$this->set('students', $students);
		}
	}

	public function years() {
		$this->set('title', 'Select Year Group');

	}

	public function add() {
		$user = $this->User->findByUser($this->basicAuth->getUsername());
		if (!$this->basicAuth->checkGroupMembership($user, 'Administrators')) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Student');
		if ($this->request->is('post')) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<p>Student saved successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<p>Unable to add student.</p>
					</div>
				');
			}
		}
	}

	public function edit($upn) {
		$user = $this->User->findByUser($this->basicAuth->getUsername());
		if (!$this->basicAuth->checkGroupMembership($user, 'Administrators')) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Edit Student');
		$this->Student->id = $upn;
		if ($this->request->is('get')) {
			$this->request->data = $this->Student->read();
		} else {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Student updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update student. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	/*
		$this->set('title', 'Edit Student');
		$student = $this->Student->find('first', array('conditions' => array('Student.upn' => $upn)));
		/*if (!$this->Student->exists()) {
			throw new NotFoundException(__('Invalid student'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Student->save($this->request->data)) {
				$this->Session->setFlash(__('Student has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Student information could not be saved. Please try again.'));
			}
		} else {
			$this->request->data = $student;
		}
	*/
	}

	public function delete($upn = null) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Student->delete($upn)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Student deleted successfully.
				</div>
			');
			$this->redirect(array('controller' => 'tutors', 'action' => 'index'));
		}
	}

	public function search() {
		$searchtype = $_POST['searchtype'];
		$value = $_POST['searchstudent'];
		$results = $this->Student->find('all', array('fields' => array(
			'Student.upn',
			'Student.surname',
			'Student.forename',
			'Student.postcode',
			'Student.adno',
			'Student.form'
		),
		'order' => 'Student.surname ASC',
		'conditions' => array($searchtype . ' ' . 'LIKE' => '%' . $value . '%')
		));
	}
}
