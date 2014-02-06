<?php
class SubjectsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	var $uses = array('Subject', 'User');
	
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
		$this->set('title', 'Subjects');
		$subjects = $this->Subject->find('all', array('order' => 'Name ASC'));
		$this->set('subjects', $subjects);
	}
	
	public function add() {
		$this->set('title', 'Add Subject');
		if ($this->request->is('post')) {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your subject has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
							Unable to add your subject. Please make sure that you have filled out all fields correctly.
						</button>
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$this->set('title', 'Edit Subject');
		$this->Subject->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Subject->read();
		} else {
			if ($this->Subject->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Subject updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update subject. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Subject->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Subject deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}