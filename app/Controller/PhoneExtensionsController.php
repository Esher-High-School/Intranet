<?php
class PhoneExtensionsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session', 'basicAuth');
	
	var $uses = array('PhoneExtension', 'User');

	public function beforeFilter() {
		$username = $this->basicAuth->getUsername();
		$user = $this->User->findByUser($username);
		if ($this->action !== 'index') {
			if (!$this->basicAuth->checkGroupMembership($user, 'Publishers')) {
				$this->redirect(array('controller' => 'users', 'action' => 'accessdenied'));
			}
		}
	}

	public function index() {
		$this->set('title', 'Phone Extensions');

		$extensions = $this->PhoneExtension->getExtensions();
		$this->set('extensions', $extensions);
	}
	
	public function add() {
		$this->set('title', 'Add Phone Extension');
		if ($this->request->is('post')) {
			if ($this->PhoneExtension->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Phone extension added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">
							&times;
						</button>
						Unable to add the phone extension. Please make sure that you have filled out the extension and name correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$this->set('title', 'Edit Phone Extension');
		$this->PhoneExtension->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->PhoneExtension->read();
		} else {
			if ($this->PhoneExtension->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Phone extension updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update phone extension. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		} 
		if ($this->PhoneExtension->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">
						&times;
					</button>
					Phone extension deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}