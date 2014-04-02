<?php
class RoomsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');

	var $uses = array('Room', 'User');

	public function beforeFilter() {
		if (!($this->action == 'view')) {
			$user = $this->User->findByUser($this->basicAuth->getUsername());
			if (!$this->basicAuth->checkGroupMembership($user, 'Administrators')) {
				$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
			}
		}
	}

	public function index() {
		$this->set('title', 'Rooms');
		$rooms = $this->Room->find('all', array('order' => 'Name ASC'));
		$this->set('rooms', $rooms);
	}

	public function add() {
		$this->set('title', 'Add Room');
		if ($this->request->is('post')) {
			if ($this->Room->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your room has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
							Unable to add your room. Please make sure that you have filled out all fields correctly.
						</button>
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Room');
		$this->Room->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Room->read();
		} else {
			if ($this->Room->save($this->request->data)) {
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
						Unable to update room. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Room->delete($id)) {
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
