<?php
class StaffGroupsController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('title', 'Staff Groups List');

		$group[0] = $this->StaffGroup->getByType(0);
		$group[1] = $this->StaffGroup->getByType(1);
		$group[2] = $this->StaffGroup->getByType(2);

		$this->set('group', $group);
	}
}