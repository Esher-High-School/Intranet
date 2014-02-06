<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	

	public function beforeFilter() {
		$roles = array(
			0 => 'User',
			1 => 'Publisher',
			2 => 'Administrator',
			3 => 'Thought for the Day Upload'
		);
		$this->set('roles', $roles);

		$options = array(
			0 => 'False',
			1 => 'True'
		);
		$this->set('options', $options);
	}
	
	public function index() {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		$this->set('title', 'Users');
		$users = $this->User->getUsers();
		$this->set('users', $users);
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
	
	public function add() {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Add User');
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						CMS user added successfully.
					</div>
			');
			$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add the CMS user. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$Authentication = new Authentication;
		$user = $this->User->findByUser($Authentication->Username());
		if ($user['User']['authlevel'] <2) {
			$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
		}
		
		$this->set('title', 'Edit User');
		$this->User->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->User->read();
		} else {
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						CMS user updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update the CMS user. Please make sure that you have filled out all fields correctly.
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
		if ($this->User->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					CMS user deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}