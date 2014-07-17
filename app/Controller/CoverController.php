<?php
class CoverController extends AppController {
	public $helpers = array('Html');
	public $components = array('Session');

	public function index($date=null, $week=null) {
		$this->set('title', 'Cover');

		$currentDay = date('l');
		if ($currentDay == 'Monday') {
			if ($week != null) {
				$when = 'this monday ' + $week + ' week';
			} else {
				$when = 'this monday';
			}
		} else {
			$when = 'last monday';
		}

		$this->set('month', date('F', strtotime($when)));

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
