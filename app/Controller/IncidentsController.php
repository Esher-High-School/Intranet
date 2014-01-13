<?php
class IncidentsController extends AppController {
	public $helpers = array('Html', 'Form', 'Incident', 'Markdown.Markdown');
	public $components = array('Session');
	
	var $uses = array('Incident', 'Student', 'Room', 'Subject', 'IncidentOption', 'Smt', 'LearningMentor', 'Tutor', 'CmsUser', 'Hoy', 'Hod', 'IncidentMonitor', 'IncidentUser');
	
	var $paginate = array(
		'fields' => array('Incident.id', 'Incident.upn', 'Incident.problems1', 'Incident.problems2', 'Student.forename', 'Student.surname', 'Student.form'),
		'maxLimit' => 1000,
		'limit' => 25,
		'order' => array(
			'Incident.date' => 'desc'
		)
	);
	
	public function index($startdate=null, $enddate=null, $year='') {
		$this->set('title', 'Incident List');
		$posted = true;
		if ($startdate==null) {
			$date = date('Y-m-d');
			if (date('m') > 9) {
				$startyear = (date('Y'));
			} else {
				$startyear = (date('Y') - 1);
			}
			$startdate = ($startyear . '-09-01');
			$posted = false;
		}
		if ($enddate==null) {
			$enddate = date('Y-m-d');
			$posted = false;
		}
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		if (!isset($smt['Smt'])) {
			if (!isset($learningmentor['LearningMentor'])) {
				$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
			}
		}
		if (isset($_POST['startDate'])) {
			$this->redirect(array('action' => 'index', $_POST['startDate'], $_POST['endDate'], $_POST['yearGroup']));
		}
		if ($year=='any') { $year = '';
		}
		
		$this->set('smt', $smt);
		$this->set('learningmentor', $learningmentor);

		$this->set('posted', $posted);
		$this->set('year', ($year));
		$this->set('startdate', $startdate);
		$this->set('enddate', $enddate);
		$incident = $this->Incident->getIncidents($startdate, $enddate, $year);
		$this->set('incidents', $incident);
	}
	
	public function report($upn=null) {
		if ($upn == null) {
			$this->redirect(array('controller' => 'students', 'action' => 'incidentFormList'));
		}
		
		$Authentication = new Authentication;
		$this->set('username', $Authentication->Username());
		
		$this->set('title', 'Incident Reporting');
		// If form is submitted, process it
		if ($this->request->is('post')) {
			if ($this->Incident->save($this->request->data)) {
				$this->redirect(array('action' => 'reportEmail', $this->Incident->id));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to submit incident form. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
		
		// Times
		$times = array(
			0 => 'N/A',
			1 => 'Pre-school',
			2 => 'Morning Reg',
			3 => 'Period 1',
			4 => 'Period 2',
			5 => 'Break',
			6 => 'Period 3',
			7 => 'Lunch 1',
			8 => 'Period 4',
			9 => 'Lunch 2',
			10 => 'Lunch 3',
			11 => 'Period 5',
			12 => 'After School'
		);
		
		// Action Taken
		$action = array(
			0 => 'Spoken to outside of lesson',
			1 => 'Phone call home',
			2 => 'After school detention - 1 hour',
			3 => 'Removed and detention set - 1 hour',
			4 => 'Short detention - 15 minutes',
			5 => 'Detention - 30 minutes',
			6 => 'Isolated within department',
			7 => 'Referred to tutor',
			8 => 'Referred to HoD',
			9 => 'Referred to SLT - Level 4',
			10 => 'Internet access removed'
		);
		
		// Retrieving Data
		$student = $this->Student->findByUpn($upn);
		$subjects = $this->Subject->getSubjects();
		$rooms = $this->Room->find('all', array('order' => 'name ASC'));
		$incidentoptions = $this->IncidentOption->findOptions();
		
		// Sending data to the view
		$this->set('student', $student);
		$this->set('times', $times);
		$this->set('subjects', $subjects);
		$this->set('rooms', $rooms);
		$this->set('options', $incidentoptions);
		$this->set('actions', $action);
	}
	
	public function reportSubmit() {
		if ($this->request->is('post')) {
			if ($this->Incident->save($this->request->data)) {
				$this->redirect(array('action' => 'reportEmail', $this->Incident->id));
			} else {
				$this->Session->setFlash('
					<div class="alert alert-warning">
						<button class="close" data-dismiss="alert">&times;</button>
						Unable to submit incident form. Please make sure that you have filled out all fields correctly.
					</div>
				');
			}
		}
	}
	
	public function reportEmail($id) {
		// Authentication
		$Authentication = new Authentication;
		$username = $Authentication->Username();
		
		//Load incident + staff info
		$incident = $this->Incident->findById($id);
		$hoys = $this->Hoy->getHoysForYear($incident['Student']['year']);
		$tutors = $this->Tutor->getTutorsForForm($incident['Student']['form']);
		if ($incident['Incident']['subject'] !== 'N/A') {
			$hods = $this->Hod->getHodsForDept($incident['Incident']['subject']);
		} else {
			$hods = null;
		}
		$monitors = $this->IncidentMonitor->find('all', array('conditions' => array(
			'IncidentMonitor.upn' => $incident['Student']['upn'], 
			'enddate >' => date('Y-m-d', strtotime('now'))
		)));
		
		// Email Template
		$emailTemplate = ('
<p>A new incident report form was submitted.</p>
<p><strong>Student Name:</strong> ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname'] . '</p>

<p><strong>Submitted by:</strong> ' . $incident['Incident']['username'] . '</p>

<p><strong>Description:</strong><br>
' . $incident['Incident']['incident'] . '</p>

<p><strong>Action Taken:</strong> ' . $incident['Incident']['action'] . '</p>

<p><strong>View Full Details:</strong> http://web.esherhigh.surrey.sch.uk/incident/' . $incident['Incident']['id'] . '</p>	
		');
		
		// Email Sender
		$Email = new CakeEmail();
		$Email->config('default');
		$Email->from(array('intranet@esherhigh.surrey.sch.uk' => 'Staff Intranet'));
		$Email->to($username . '@esherhigh.surrey.sch.uk');
		$Email->subject('Incident Report Form: ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname']);
		$Email->emailFormat('both');
		$Email->send($emailTemplate);
		
		// Email HoDs
		if ($hods !== null) {
			foreach($hods as $hod):
				$Email->to($hod['Hod']['username'] . '@esherhigh.surrey.sch.uk');
				$Email->subject('Incident Report Form: ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname'] . ' - HoD copy');
				$Email->emailFormat('both');
				$Email->send($emailTemplate);
			endforeach;
		}
		
		// Email HoYs
		if ($hoys !== null) {
			foreach($hoys as $hoy):
				$Email->to($hoy['Hoy']['username'] . '@esherhigh.surrey.sch.uk');
				$Email->subject('Incident Report Form: ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname'] . ' - HoY copy');
				$Email->emailFormat('both');
				$Email->send($emailTemplate);
			endforeach;
		}
		
		// Email Tutor(s)
		if ($tutors !== null) {
			foreach($tutors as $tutor) {
				$Email->to($tutor['Tutor']['username'] . '@esherhigh.surrey.sch.uk');
				$Email->subject('Incident Report Form: ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname'] . ' - Tutor copy');
				$Email->emailFormat('both');
				$Email->send($emailTemplate);
			}
		}
		
		// Email Monitors
		if ($monitors !== null) {
			foreach ($monitors as $monitor):
				$Email->to($monitor['IncidentMonitor']['username'] . '@esherhigh.surrey.sch.uk');
				$Email->subject('Incident Report Form: ' . $incident['Student']['forename'] . ' ' . $incident['Student']['surname'] . ' - Monitored Student');
				$Email->emailFormat('both');
				$Email->send($emailTemplate);
			endforeach;
		}
		
		$this->Session->setFlash('
			<div class="alert alert-success">
				<button class="close" data-dismiss="alert">&times;</button>
				<p>Your incident report has been submitted successfully.</p>
				<p>Please check your junk mail if you do not receive the incident form.</p>
			</div>
		');
		$this->redirect(array('controller' => 'students', 'action' => 'incidentFormList'));
		

	}
	
	public function incidentsByYear($year, $day = 5) {
		$authentication = new Authentication;
		$smt = $this->Smt->findByUsername($authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($authentication->Username());
		if ($smt == null) {
			if ($learningmentor == null) {
				$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
			}
		}
		$this->set('smt', $smt);
		$this->set('title', 'Viewing incidents by year group');
		
		if ($day == 'all') {
			$day = '10000';
		}
		
		$this->set('year', $year);
		$this->set('incidents', $this->Incident->getYearIncidents($year, $day));
		$this->set('days', $day);
	}
	
	public function learningmentorhome() {
		$Authentication = new Authentication;
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		if ($learningmentor == null) {
			$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
		}
		$this->set('learningmentor', $learningmentor);
		$this->set('title', 'Learning Mentor Home');
		$recent = $this->paginate('Incident');
		$this->set('recent', $this->Incident->latest());
		
		$yr[7] = $this->Incident->top(7);
		$yr[8] = $this->Incident->top(8);
		$yr[9] = $this->Incident->top(9);
		$yr[10] = $this->Incident->top(10);
		$yr[11] = $this->Incident->top(11);
		$this->set('yr', $yr);
	}
	
	public function smthome() {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}

		$this->set('smt', $smt);
		$this->set('title', 'Incident Statistics');
		$this->set('recent', $this->Incident->latest());
		
		$top5 = $this->Incident->top();
		$this->Set('top5', $top5);
		
		$yr[7] = $this->Incident->top(7);
		$yr[8] = $this->Incident->top(8);
		$yr[9] = $this->Incident->top(9);
		$yr[10] = $this->Incident->top(10);
		$yr[11] = $this->Incident->top(11);
		$this->set('yr', $yr);
	}
	
	public function hoyHome($startdate=null, $enddate=null, $year=null) {
		$Authentication = new Authentication;
		$hoy = $this->Hoy->getHoyYears($Authentication->Username());
		if (!isset($hoy[0])) {
			$this->redirect(array('controller' => 'CmsUser', 'action' => 'accessdenied'));
		}
		if (isset($_POST['yearGroups'])) {
			$this->redirect(array('action' => 'hoyHome', $_POST['yearGroups']));
		}
		if ($year==null) {
			$year = $hoy[0]['Hoy']['year'];
		}
		$this->set('title', 'My Year Group');
		$this->set('hoy', $hoy);

		if (isset($_POST['startDate'])) {
			$this->redirect(
				array(
					'action' => 'hoyHome', 
					$_POST['startDate'], 
					$_POST['endDate'], 
					$_POST['yearGroup']
				)
			);
			$posted = true;
		} elseif($startdate == null) {
			$posted = false;
			$startdate = date('Y-m-d', strtotime(date('Y-m-d') . '-1 month'));
			$enddate = date('Y-m-d');
		} else {
			$posted = true;
		}

		if ($year == 'any') {
			$year = '';
			$displayYear = 'any';
		}

		$this->set('posted', $posted);
		$this->set('year', ($year));
		$this->set('startdate', $startdate);
		$this->set('enddate', $enddate);
		$incident = $this->Incident->getIncidents($startdate, $enddate, $year);
		$this->set('incidents', $incident);
		if (isset($displayYear)) {
			$this->set('year', $displayYear);
		}
	}
	
	public function hodHome($dept=null) {
		$Authentication = new Authentication;
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		if (!isset($hod[0])) {
			$this->redirect(array('controller' => 'CmsUsers', 'action' => 'accessdenied'));
		}
		if (isset($_POST['department'])) {
			$this->redirect(array('action' => 'hodHome', $_POST['department']));
		}
		if ($dept==null) {
			$dept = $hod[0]['Hod']['dept'];
		}
		$this->set('title', 'My Department');
		$this->set('count', $this->Incident->countDepartmentIncidents($dept));
		$students = $this->Incident->getDepartmentIncidents($dept);
		$this->set('students', $students);
		$this->set('dept', $dept);
	}
	
	public function deptStudent($dept, $upn) {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		if(!isset($hod[0])) {
			if (!isset($smt['Smt']['username'])) {
				$this->redirect(array(
					'controller' => 'CmsUsers',
					'action' => 'accessdenied'
				));
			}
		}
		$student = $this->Student->findByUpn($upn);
		$incidents = $this->Incident->getStudentDepartmentIncidents($dept, $upn);
		$this->set('title', 'Incidents for ' . $student['Student']['forename'] . ' ' . $student['Student']['surname'] . ' in ' . $dept);
		$this->set('student', $student);
		$this->set('incidents', $incidents);
		$this->set('dept', $dept);
	}
	
	public function deptList($day=1) {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}
		if ($day == 'all') {
			$day = date('10000');
		}
		$viewday['number']=$day;
		if ($viewday['number']==1) {
			$viewday['text']='day';
		} else {
			$viewday['text']='days';
		}
		$this->set('smt', $smt);
		$this->set('hod', $hod);
		$this->set('day', $viewday);
		$this->set('title', 'Incidents by Department');
		$this->set('departments', $this->Incident->getDepartments($day));
	}
	
	public function incidentsByDepartment($dept=null, $day=1) {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		if ($smt == null) {
			if(!isset($hod[0])) {
				$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
			}
		}
		if (isset($_POST['department'])) {
			$this->redirect(array('action' => 'incidentsByDepartment', $_POST['department']));
		}
		if ($day == 'all') {
			$day = date('10000');
		}
		$this->set('smt', $smt);
		if ($dept==null) {
			if (isset($hod[0])) {
				$dept = $hod[0]['Hod']['dept'];
			} else {
				$this->redirect(array('action' => 'deptList'));
			}
		}
		$this->set('day', $day);
		$this->set('title', $dept . ' Incidents');
		$this->set('username', $Authentication->Username());
		
		$this->set('departments', $this->Hod->getHodDepts($Authentication->Username()));
		$data = $this->Incident->getDepartmentIncidents($dept);
		$this->set('dept', $dept);
		$this->set('incidents', $data);
	}

	public function users($startdate=null) {
		$this->set('title', 'Incidents by Users');
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}
		if (isset($_POST['startDate'])) {
			$this->redirect(array('action' => 'users', $_POST['startDate']));
		}
		if ($startdate==null) {
			$date = date('Y-m-d');
			if (date('m') > 9) {
				$year = (date('Y'));
			} else {
				$year = (date('Y') - 1);
			}
			$startdate = ($year . '-09-01');
		}

		$this->set('users', $this->Incident->getUsers($startdate));
		$this->set('smt', $smt);
		$this->set('startdate', $startdate);
	}
	
	public function incidentsByUser($user=null) {
		if ($user==null) {
			$this->redirect(array('action' => 'users'));
		}
		
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}
		
		$this->set('user', $user);
		$this->set('title', 'Incidents by ' . $user);
		$incidents = $this->Incident->getUserIncidents($user);
		$this->set('incidents', $incidents);
	}
	
	public function years($startdate=null, $enddate=null) {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		if ($smt == null) {
			if ($learningmentor == null) {
				$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
			}
		}
		if (isset($_POST['startDate'])) {
			$this->redirect(array('action' => 'years', $_POST['startDate'], $_POST['endDate']));
		}
		if ($startdate==null) {
			$date = date('Y-m-d');
			// Has September passed yet? If no, current academic year started last year
			if (date('m') > 9) {
				$startyear = date('Y');
			} else {
				$startyear = (date('Y') - 1);
			}
			$startdate = $startyear . '-09-01';
			$posted = false;
		}
		if ($enddate==null) {
			$enddate = date('Y-m-d');
			$posted = false;
		}
		
		$this->set('smt', $smt);
		$this->set('learningmentor', $learningmentor);
		$this->set('title', 'Year Groups');
		$this->set('startdate', $startdate);
		$this->set('enddate', $enddate);
		$groups = $this->Incident->getYearGroups($startdate, $enddate);
		$this->set('groups', $groups);
	}
	
	public function formlist($startdate=null, $enddate=null, $year='') {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}
		if (isset($_POST['startDate'])) {
			$this->redirect(array('action' => 'formList', $_POST['startDate'], $_POST['endDate'], $_POST['yearGroup']));
		}
		if ($startdate==null) {
			$date = date('Y-m-d');
			// Has September passed yet? If no, current academic year started last year
			if (date('m') > 9) {
				$startyear = (date('Y'));
			} else {
				$startyear = (date('Y') - 1);
			}
			$startdate = ($startyear . '-09-01');
			$posted = false;
		}
		if ($enddate==null) {
			$enddate = date('Y-m-d');
			$posted = false;
		}
		
		$this->set('smt', $smt);
		$this->set('title', 'Listing tutor groups');
		$this->set('startdate', $startdate);
		$this->set('enddate', $enddate);
		$this->set('year', $year);
		$groups = $this->Incident->getTutorGroups($startdate, $enddate, $year);
		$this->set('groups', $groups);
	}
	
	public function form($group, $day='all') {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		if ($smt == null) {
			$this->redirect(array('controller' => 'smts', 'action' => 'accessdenied'));
		}
		$this->set('smt', $smt);
		$this->set('form', $group);
		$this->set('title', 'Viewing incidents by tutor group');
		
		if ($day == 'all') {
			$day = '10000';
		}

		$this->set('incidents', $this->Incident->getTutorGroupIncidents($group, $day));
		$this->set('days', $day);
	}
	
	public function student($upn, $day=10, $dept=null) {
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		$hoy = $this->Hoy->getHoyYears($Authentication->Username());
		$hod = $this->Hod->getHodDepts($Authentication->Username());
		if ($smt == null) {
			if ($learningmentor == null) {
				if (!isset($hoy[0])) {
					if (!isset($hod[0])) {
						$this->redirect(array('controller' => 'learningmentors', 'action' => 'accessdenied'));
					}
				}
			}
		}
		$this->set('smt', $smt);
		$this->set('learningmentor', $learningmentor);
		$student = $this->Incident->Student->findByUpn($upn);
		$this->set('student', $student);
		$this->set('title', 'Incidents for ' . $student['Student']['forename'] . ' ' . $student['Student']['surname']);
		if ($day == 'all') {
			$date = (date('Y-m-d', strtotime('-6 year')));
		} else {
			$date = (date('Y-m-d', strtotime('-' . $day . ' day')));
		}
		$this->paginate = array(
			'maxLimit' => 1000,
			'limit' => 15,
			'fields' => array('Incident.id', 'Incident.upn', 'Incident.date', 'Incident.subject', 'Incident.username', 'Incident.incident', 'Incident.problems1', 'Student.forename', 'Student.surname', 'Student.form'),
			'order' => array('Incident.date' => 'desc'),
			'conditions' => array(
				'Incident.upn' => $upn,
				'Incident.date >' => $date
			)
		);
		$incidents = $this->paginate('Incident');
		$this->set('days', $day);
		$this->set('incidents', $incidents);
	}
	
	public function view($id = null) {
		if ($id == null) {
			throw new NotFoundException;
		}
		$this->set('title', 'Viewing incident ' . $id);
		// Authentication
		$Authentication = new Authentication;
		$smt = $this->Smt->findByUsername($Authentication->Username());
		$learningmentor = $this->LearningMentor->findByUsername($Authentication->Username());
		$cmsuser = $this->CmsUser->findByUser($Authentication->Username());
		$hoy = $this->Hoy->findByUsername($Authentication->Username());
		$hod = $this->Hod->findByUsername($Authentication->Username());
		/*
		if ($smt == null) {
			if ($learningmentor == null) {
				if ($cmsuser == null) {
					if ($hoy == null) {
						if ($hod == null) {
							if ($incident['Incident']['username'] !== $Authentication->Username()) {
								$this->redirect(array('controller' => 'smt', 'action' => 'accessdenied'));
							}
						}
					}
				}
			}
		}
		*/
		
		// Retrieving data
		$this->Incident->id = $id;
		$this->Incident->Student->upn = $this->Incident->upn;
		$incident = $this->Incident->read();
		$student = $this->Student->read();
		
		if (!isset($incident['Incident']['upn'])) {
			throw new NotFoundException;
		}
		
		// Sending data to view
		$this->set('incident', $incident);
		$this->set('student', $student);
		$this->set('hoy', $hoy);
		$this->set('hod', $hod);
		$this->set('cmsuser', $cmsuser);
		$this->set('learningmentor', $learningmentor);
		$this->set('smt', $smt);
	}

	public function printIncidentsSelect($upn, $date1=null, $date2=null) {
		$this->set('title', 'Print Incidents');
		$student = $this->Student->findByUpn($upn);

		if (isset($_POST['startDate'])) {
			$date1 = $_POST['startDate'];
		}
		if (isset($_POST['endDate'])) {
			$date2 = $_POST['endDate'];
		}

		if ($date1 !== null) {
			$this->set('date1', $date1);
		} else {
			$this->set('date1', date('d-m-Y', strtotime(date('d-m-Y') . '-1 year')));
		}

		if ($date2 !== null) {
			$this->set('date2', $date2);
		} else {
			$this->set('date2', date('d-m-Y'));
		}

		if ($date1 !== null && $date2 !== null) {
			$this->redirect(array('action' => 'printIncidents', $upn, $date1, $date2));
		}

		$this->set('student', $student);
	}

	public function printIncidents($upn, $date1, $date2) {
		$this->set('title', 'Incidents Printout');
		$this->layout = 'print';
		$incidents = $this->Incident->getStudentIncidentsByDates($upn, $date1, $date2);
		$student = $this->Student->findByUpn($upn);
		$this->set('incidents', $incidents);
		$this->set('student', $student);
	}

	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Incident->delete($id)) {
			$this->Session->setFlash('
				<div class="alert alert-success">
					<button class="close" data-dismiss="alert">&times;</button>
					Incident deleted successfully.
				</div>
			');
			$this->redirect(array('action' => 'index'));
		}
	}
}