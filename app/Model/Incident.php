<?php
class Incident extends AppModel {
	var $useTable = 'incident';
	var $primaryKey = 'id';
	var $name = 'Incident';
	
	public $belongsTo = array(
		'Student' => array(
			'className' => 'Student',
			'joinTable' => 'students',
			'foreignKey' => 'upn',
			'associationForeignKey' => 'upn',
			'unique' => true
		)
	);
	
	public $hasMany = array(
		'IncidentMonitor' => array(
			'className' => 'IncidentMonitor',
			'foreignKey' => 'upn',
		)
	);
	
	function latest($limit=5) {
		return $this->find('all', array('limit' => $limit, 'order' => array('Incident.id DESC')));
	}
	
	function getIncidents($startdate, $enddate, $year='') {
		return $this->query("select students.surname, students.forename, incident.date, incident.username, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn and students.year like'%" . $year . "' and incident.date>='" . $startdate . "' and incident.date<='" . $enddate . "' GROUP BY upn ORDER BY Number DESC");
	}
	
	function top($year=null, $number=5) {
		$startyear = (date('Y') - 5);
		$startofterm = ($startyear . '-09-01');
		$startofterm2 = ('01/09/' . $startyear);
		if ($year!==null) {
			return $this->query("select students.surname, students.forename, incident.date, incident.id, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn where students.year = '" . $year . "' and incident.date >= '" . $startofterm . "' GROUP BY upn ORDER BY Number DESC limit 0," . $number);
		} else {
			return $this->query("select students.surname, students.forename, incident.date, incident.id, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn where incident.date >= '" . $startofterm . "' GROUP BY upn ORDER BY Number DESC limit 0,". $number);
		}
	}
	
	function getDepartments($day=1) {
		if($day == 'all') {
			$day = 100000;
		}
		return $this->query('select incident.subject, count(incident.subject) AS Number from students, incident WHERE students.upn = incident.upn and DATE_SUB(CURDATE(),INTERVAL ' . $day . ' DAY)<= date GROUP BY subject ORDER BY Number DESC');
	}
	
	function countDepartmentIncidents($dept) {
		$date = date('Y-m-d');
		if (date('m') > 9) {
			$year = (date('Y'));
		} else {
			$year = (date('Y') - 1);
		}
		$startdate = ($year . '-09-01');
		return $this->find('count', array(
			'conditions' => array(
				'incident.subject' => $dept,
				'incident.date >=' => $startdate
			)
		));
	}
	
	function getDepartmentIncidents($dept, $limit=20) {
		$startyear = (date('Y') - 5);
		$startofterm = ($startyear . '-09-01');
		$startofterm2 = ('01/09/' . $startyear);
		return $this->query("select students.surname, students.forename, incident.date, incident.id, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn where incident.subject = '" . $dept . "' and incident.date >= '" . $startofterm . "' GROUP BY upn ORDER BY Number DESC limit 0," . $limit . "");
	}
	
	function getDepartmentIncidentsDays($dept, $days) {
		if ($days == 'all') {
			$days = 10000;
		}
		return $this->query("select students.surname, students.forename, incident.date, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn and incident.subject = '" . $dept . "' and DATE_SUB(CURDATE(),INTERVAL " . $days . " DAY)<= date GROUP BY upn ORDER BY Number DESC");
	}
	
	function getStudentDepartmentIncidents($dept, $upn) {
		return $this->find('all', array(
			'conditions' => array(
				'student.upn' => $upn,
				'incident.subject' => $dept
			),
			'order' => array(
				'incident.date' => 'DESC'
			)
		));
	}
	
	function getUsers($startdate=null) {
		if ($startdate==null) {
			$date = date('Y-m-d');
			if (date('m') > 9) {
				$year = (date('Y'));
			} else {
				$year = (date('Y') - 1);
			}
			$startdate = ($year . '-09-01');
		}
		return $this->query('select username, count(username) AS Number from incident where incident.date >= "' . $startdate . '" GROUP BY username ORDER BY Number DESC');
	}
	
	function getUserIncidents($user) {
		return $this->find('all', array('conditions' => array('Incident.username' => $user), 'order' => 'Incident.id ASC'));
	}
	
	function getYearGroups($startdate=null, $enddate=null) {
		return $this->query("select students.year, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn WHERE incident.date >= '" . $startdate . "' and incident.date <= '" . $enddate . "' GROUP BY students.year ORDER BY students.year ASC");
	}
	
	function getTutorGroups($startdate=null, $enddate=null, $year='') {
		return $this->query("select students.form, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn WHERE incident.date >= '" . $startdate . "' and incident.date <= '" . $enddate . "' and students.year like'%" . $year . "' GROUP BY students.form ORDER BY students.form ASC");
	}
	
	function getTutorGroupIncidents($form, $day) {
		return $this->query("select students.surname, students.forename, incident.date, incident.id, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn where students.form = '" . $form . "' and DATE_SUB(CURDATE(),INTERVAL '" . $day . "' DAY)<= date GROUP BY upn ORDER BY Number DESC");
	}
	
	function getYearIncidents($year, $days) {
		return $this->query("select students.surname, students.forename, incident.date, incident.id, students.year, students.form, incident.upn, count(incident.upn) AS Number from students inner JOIN incident on students.upn = incident.upn where students.year = '" . $year . "' and DATE_SUB(CURDATE(),INTERVAL '" . $days . "' DAY)<= date GROUP BY upn ORDER BY Number DESC");
	}

	function getStudentIncidents($upn) {
		return $this->find('all', array('conditions' => array('Incident.upn' => $upn)));
	}
}
