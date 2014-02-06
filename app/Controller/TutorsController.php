<?php
class TutorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');
	
	var $uses = array('Tutor', 'Student', 'Smt', 'LearningMentor', 'User');

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
		$this->set('title', 'Listing Tutors');
		$tutors[7] =  $this->Tutor->getTutors(7);
		$tutors[8] = $this->Tutor->getTutors(8);
		$tutors[9] = $this->Tutor->getTutors(9);
		$tutors[10] = $this->Tutor->getTutors(10);
		$tutors[11] = $this->Tutor->getTutors(11);

		$this->set('tutors', $tutors);
	}
	
	public function incidentindex() {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUser($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUser($Authentication->Username());
		if ($smt == null) {
			if ($learningmentor == null) {
				$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
			}
		}
		$this->set('smt', $smt);
		$this->set('learningmentor', $learningmentor);
		$this->layout = 'default_full_width';
		$this->set('title', 'Listing Tutor Groups');
		$data = $this->paginate('Tutor');
		$this->set('tutors', $data);
	}
	
	public function view($id = null) {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->Tutor->id = $id;
		$form = $this->Tutor->field('form');
		$this->set('title', 'Tutor Group ' . $form);
		$this->set('tutor', $this->Tutor->read());
		$this->set('students', $this->Tutor->Student->find('all', array('conditions' => array('Student.form' => $form), 'order' => 'Student.forename ASC')));
	}
	
	public function add() {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Add New Tutor');
		if ($this->request->is('post')) {
			if ($this->Tutor->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Tutor saved successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
	
	public function edit($id = null) {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Edit Tutor');
		$this->Tutor->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Tutor->read();
		} else {
			if ($this->Tutor->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Tutor updated successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			}
			else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
					<button class="close" data-dismiss="alert">&times;</button>
						<p>Unable to add tutor. Please confirm that you have entered all details correctly.</p>
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		$Authentication = new Authentication;
		$User = $this->User->findByUser($Authentication->Username());
		if ($User == null) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Tutor->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Tutor deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
	
}
