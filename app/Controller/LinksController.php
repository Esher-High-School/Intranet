<?php
class LinksController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	
	public function index() {
		$this->set('title', 'Showing all Menu Items');
		$links[0] = $this->Link->getHeaderLinks();
		$links[1] = $this->Link->getSidebarLinks();
		$this->set('allLinks', $links);
	}
	
	public function add() {
		$type = array(
			0 => 'Header Link',
			1 => 'Sidebar Link'
		);
		$this->set('types', $type);
		$this->set('title', 'Add New Link');
		if ($this->request->is('post')) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Your link has been added successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your link. Please make sure you have completed all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function edit($id) {
		$status[0] = 'Normal';
		$status[1] = 'New';
		$status[2] = 'Updated';
		$this->set('statuses', $status);
		$this->set('title', 'Edit Link');
		$this->Link->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Link->read();
		} else {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Link updated successfully.
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to update link. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Link->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Link deleted succesfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}