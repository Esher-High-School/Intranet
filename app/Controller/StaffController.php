<?php
class StaffController extends AppController {
	public $helpers = array('Html', 'Form');
	public $components = array('Session');

	public function index() {
		$this->set('title', 'Staff List');

		$staff[0] = $this->Staff->getByType(0);
		$staff[1] = $this->Staff->getByType(1);
		$staff[2] = $this->Staff->getByType(2);

		$this->set('staff', $staff);
	}
}