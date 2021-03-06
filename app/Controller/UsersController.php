<?php
class UsersController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');
	

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

		// Authentication
		$username = $this->basicAuth->getUsername();
		if ($this->action !== 'accessdenied') {
			$user = $this->User->findByUser($username);
			if (!($this->basicAuth->checkGroupMembership($user, 'Administrators'))) {
				$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
			}
		}
	}
	
	public function index() {
		$this->set('title', 'Users');
		$users = $this->User->getUsers();
		$this->set('users', $users);
	}

	public function view($id) {
		$this->User->id = $id;
		$user = $this->User->read();
		$this->set('user', $user);

		$this->set('title', 'Viewing ' . $user['User']['user']);
	}
	
	public function accessdenied() {
		$this->set('title', 'Access Denied');
	}
	
	public function add() {
		$this->set('title', 'Add User');
		if ($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						User added successfully.
					</div>
			');
			$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add the user. Please make sure that you have completed all fields correctly.
					</div>
				');
			}
		}

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
	
	public function edit($id) {
		$this->set('title', 'Edit User');
		$this->User->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->User->read();
		} else {
			if($this->User->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						User updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update the CMS user. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}

		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					User deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}