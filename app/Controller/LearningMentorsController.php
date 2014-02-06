<?php
class LearningMentorsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'Security');
	
	var $uses = array('LearningMentor', 'User');
	
	var $paginate = array(
		'fields' => array('LearningMentor.id', 'LearningMentor.username'),
		'maxLimit' => 2000,
		'limit' => 2000,
		'order' => array(
			'LearningMentor.year' => 'asc'
		)
	);
	
	public function index() {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Listing Learning Mentors');
		$data = $this->paginate('LearningMentor');
		$this->set('learningmentors', $data);
	}
	
	public function add() {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		$this->set('Add New Learning Mentor');
		if ($this->request->is('post')) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>Learning mentor added successfully.</p>
				</div>
			');
			$this->redirect(array('controller' => 'learningmentors', 'action' => 'index'));
		}
	}
	
	public function edit($id = null) {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Edit Learning Mentor');
		$this->LearningMentor->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->LearningMentor->read();
		} else {
			if ($this->LearningMentor->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Learning mentor updated successfully.</p>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						<p>Unable to update learning mentor. Please confirm that you have entered all details correctly.</p>
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->LearningMentor->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					<p>Learning mentor deleted successfully.</p>
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
}