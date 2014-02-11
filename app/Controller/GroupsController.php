<?php
class GroupsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('title', 'Groups');

		$groups = $this->Group->getGroups();
		$this->set('groups', $groups);
	}

	public function add() {
		$this->set('title', 'Add Group');
		if ($this->request->is('post')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times</button>
						Group added sucessfully. 
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add group. Please make sure that you have completed all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Group');

		$this->Group->id = $id;

		if ($this->request->is('get')) {
			$this->request->data = $this->Group->read();
		} else {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Group updated successfully. 
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-danger">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update the group. Please make sure that you have completed all fields correctly.
					</div>
				');
			}
		}
	}

	public function delete($id) {
		$group = $this->Group->findById($id);
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Group->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Group deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}