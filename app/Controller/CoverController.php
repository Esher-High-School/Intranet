<?php
class CoverController extends AppController {
	public $helpers = array('Html');
	public $components = array('Session');

	public function index($date=null) {
		$this->set('title', 'Cover');

		$currentDay = date('l');
		if ($currentDay == 'Monday') {
			$when = 'this monday';
		} else {
			$when = 'last monday';
		}

		$monday = date('y-m-d', strtotime($when));

		$i = 0;
		while ($i <= 4) {
			$day[$i] = date('y-m-d', strtotime($monday . '+' . $i . ' day'));
			$i++;
		}

		$this->set('days', $day);

		$this->set('date', $date);
	}
}