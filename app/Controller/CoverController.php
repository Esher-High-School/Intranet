<?php
class CoverController extends AppController {
	public $helpers = array('Html');
	public $components = array('Session');

	public function index($date=null) {
		$this->set('title', 'Cover');

		$monday = date('y-m-d', strtotime('this monday'));

		$i = 0;
		while ($i <= 4) {
			$day[$i] = date('y-m-d', strtotime($monday . '+' . $i . ' day'));
			$i++;
		}

		$this->set('days', $day);

		$this->set('date', $date);
	}
}