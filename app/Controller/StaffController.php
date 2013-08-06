<?php
class StaffController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	var $uses = array('Staff', 'StaffGroup');

	public function beforeFilter() {
		if ($this->action == 'add' or $this->action == 'edit') {
			$Authentication = new Authentication;
			$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
			if ($cmsuser == null) {
				$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
			}
		}

		$grouptypes = array(
			0 => 'Teaching Staff',
			1 => 'Non-Teaching Staff',
			2 => 'SLT Staff'
		);
		$this->set('grouptypes', $grouptypes);

		$rawgroups = $this->StaffGroup->getAllGroups();

		foreach($rawgroups as $group) {
			$id = $group['StaffGroup']['id'];
			$gn = $group['StaffGroup']['name'];
			$groups[$group['StaffGroup']['id']] = $group['StaffGroup']['name'];
		}

		$this->set('groups', $groups);
	}

	public function index() {
		$this->set('title', 'Staff List');

		$groups = $this->StaffGroup->getAllGroups();
		$staff = $this->Staff->getAllStaff();

		$this->set('staff', $staff);
		$this->set('groups', $groups);
	}

	public function add() {
		$this->set('title', 'Add Staff Member');
		if ($this->request->is('post')) {
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
					</div>
				');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add your staff member. Please ensure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}

	public function edit($id) {
		$this->set('title', 'Edit Staff Member');

		$this->Staff->id = $id;

		if ($this->request->is('get')) {
			$this->request->data = $this->Staff->read();
		} else {
			if ($this->Staff->save($this->request->data)) {
				$this->Session->setFlash('
					<div class="alert alert-success">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to add staff member. Please enusre that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
}