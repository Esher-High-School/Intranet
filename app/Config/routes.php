<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

	Router::connect('/', array('controller' => 'StaffBulletins', 'action' => 'display'));

	// Pages
	Router::connect('/pages', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/pages/edit/*', array('controller' => 'pages', 'action' => 'edit'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'view'));

	// Documents
	Router::connect('/documents/*', array('controller' => 'documents', 'action' => 'download'));

	// Cover
	Router::connect('/cover/*', array('controller' => 'cover', 'action' => 'index'));
	
	// TFD
	Router::connect('/tfd', array('controller' => 'tfds', 'action' => 'index'));
	
	// Phone Extensions
	Router::connect('/extensions', array('controller' => 'phoneExtensions', 'action' => 'index'));
	Router::connect('/extensions/edit/*', array('controller' => 'phoneExtensions', 'action' => 'edit'));
	Router::connect('/extensions/add', array('controller' => 'phoneExtensions', 'action' => 'add'));

	Router::connect('/handbook', array('controller' => 'handbookDocuments', 'action' => 'home'));

	Router::connect('/handbook/category', array('controller' => 'handbookCategories', 'action' => 'index'));
	Router::connect('/handbook/category/add', array('controller' => 'handbookCategories', 'action' => 'add'));
	Router::connect('/handbook/category/edit/*', array('controller' => 'handbookCategories', 'action' => 'edit'));
	Router::connect('/handbook/category/*', array('controller' => 'handbookCategories', 'action' => 'view'));

	Router::connect('/handbook/add/*', array('controller' => 'handbookDocuments', 'action' => 'add'));
	Router::connect('/handbook/edit/*', array('controller' => 'handbookDocuments', 'action' => 'edit'));
	Router::connect('/handbook/download/*', array('controller' => 'handbookDocuments', 'action' => 'document'));
	Router::connect('/handbook/*', array('controller' => 'handbookDocuments', 'action' => 'view'));

	/* Incident Reporting */
	Router::connect('/incident/*', array('controller' => 'incidents', 'action' => 'view'));
	Router::connect('/incidents/form/*', array('controller' => 'students', 'action' => 'incidentFormList'));
	Router::connect('/incidents/report/*', array('controller' => 'incidents', 'action' => 'report'));
	Router::connect('/incidents/submit', array('controller' => 'incidents', 'action' => 'reportSubmit'));
	Router::connect('/incidents/submit/email/*', array('controller' => 'incidents', 'action' => 'reportEmail'));

	/* Incident Printing */
	Router::connect('/incidents/print/*', array('controller' => 'students', 'action' => 'incidentPrintList')); 
	Router::connect('/incidents/printing/dates/*', array('controller' => 'incidents', 'action' => 'printIncidentsSelect'));

	/* Incident Monitoring */
	Router::connect('/incidents/monitor', array('controller' => 'students', 'action' => 'incidentMonitoringList'));
	Router::connect('/incidents/monitor/year/*', array('controller' => 'students', 'action' => 'incidentMonitoringList'));
	Router::connect('/incidents/monitor/add/*', array('controller' => 'incidentMonitors', 'action' => 'add'));

	
	/* My Year Group */
	Router::connect('/incidents/my-year-group/*', array('controller' => 'incidents', 'action' => 'hoyHome'));
	
	/* My Department */
	Router::connect('/incidents/my-department/*', array('controller' => 'incidents', 'action' => 'hodHome'));
	
	/* Learning Mentors and SMT Incidents */
	Router::connect('/incidents/list/*', array('controller' => 'incidents', 'action' => 'index'));
	Router::connect('/incidents/student/*', array('controller' => 'incidents', 'action' => 'student'));
	Router::connect('/incidents/tutorgroup', array('controller' => 'incidents', 'action' => 'formList'));
	Router::connect('/incidents/tutorgroup/*', array('controller' => 'incidents', 'action' => 'form'));
	Router::connect('/incidents/year', array('controller' => 'incidents', 'action' => 'years'));
	Router::connect('/incidents/year/*', array('controller' => 'incidents', 'action' => 'incidentsByYear'));
	Router::connect('/incidents/departments/*', array('controller' => 'incidents', 'action' => 'deptList'));
	Router::connect('/incidents/department/*', array('controller' => 'incidents', 'action' => 'incidentsByDepartment'));
	Router::connect('/incidents/users', array('controller' => 'incidents', 'action' => 'users'));
	Router::connect('/incidents/users/*', array('controller' => 'incidents', 'action' => 'incidentsByUser'));

	/* Learning Mentors */
	Router::connect('/learningmentors', array('controller' => 'incidents', 'action' => 'learningmentorhome'));
	Router::connect('/learningmentors/accessdenied', array('controller' => 'learningMentors', 'action' => 'accessdenied'));
	
	/* SMT Areas */
	Router::connect('/incidents/smt', array('controller' => 'incidents', 'action' => 'smthome'));
	Router::connect('/smt/accessdenied', array('controller' => 'smts', 'action' => 'accessdenied'));
	
	/* CMS Areas */
	Router::connect('/cms', array('controller' => 'cms', 'action' => 'index'));
	
	Router::connect('/pages', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/cms/pages/add', array('controller' => 'pages', 'action' => 'add'));
	Router::connect('/cms/pages/edit/*', array('controller' => 'pages', 'action' => 'edit'));

	Router::connect('/cms/documents/edit/*', array('controller' => 'documents', 'action' => 'edit'));
	Router::connect('/cms/documents/add', array('controller' => 'documents', 'action' => 'add'));
	Router::connect('/cms/documents/add/*', array('controller' => 'documents', 'action' => 'add')); 
	
	Router::connect('/cms/links', array('controller' => 'links', 'action' => 'index'));
	Router::connect('/cms/links/add', array('controller' => 'links', 'action' => 'add'));
	Router::connect('/cms/links/edit/*', array('controller' => 'links', 'action' => 'edit'));
	
	Router::connect('/cms/filemanager', array('controller' => 'files', 'action' => 'index'));
	
	Router::connect('/cms/staffbulletins', array('controller' => 'staffBulletins', 'action' => 'index'));
	Router::connect('/cms/staffbulletins/add', array('controller' => 'staffBulletins', 'action' => 'add'));
	Router::connect('/cms/staffbulletins/edit/*', array('controller' => 'staffBulletins', 'action' => 'edit'));
	
	Router::connect('/cms/phoneextensions/edit/*', array('controller' => 'phoneExtensions', 'action' => 'edit'));
	Router::connect('/cms/phoneextensions/delete/*', array('controller' => 'phoneExtensions', 'action' => 'delete'));

	/* Administration Areas */
	Router::connect('/admin', array('controller' => 'admin', 'action' => 'index'));
	Router::connect('/admin/accessdenied', array('controller' => 'admin', 'action' => 'accessdenied'));

	Router::connect('/admin/settings', array('controller' => 'settings', 'action' => 'index'));
	Router::connect('/admin/settings/add', array('controller' => 'settings', 'action' => 'add'));
	Router::connect('/admin/settings/edit/*', array('controller' => 'settings', 'action' => 'edit'));

	Router::connect('/admin/students', array('controller' => 'students', 'action' => 'years'));
	Router::connect('/admin/students/year/*', array('controller' => 'students', 'action' => 'index'));
	Router::connect('/admin/students/add', array('controller' => 'students', 'action' => 'add'));
	Router::connect('/admin/students/edit/*', array('controller' => 'students', 'action' => 'edit'));

	Router::connect('/admin/tutors', array('controller' => 'tutors', 'action' => 'index'));
	Router::connect('/admin/tutors/add', array('controller' => 'tutors', 'action' => 'add'));
	Router::connect('/admin/tutors/edit', array('controller' => 'tutors', 'action' => 'edit'));
	Router::connect('/admin/tutors/group/*', array('controller' => 'tutors', 'action' => 'view'));
	
	Router::connect('/admin/users', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/admin/users/add', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/admin/users/edit/*', array('controller' => 'users', 'action' => 'edit'));
	Router::connect('/admin/users/*', array('controller' => 'users', 'action' => 'view'));

	Router::connect('/admin/groups', array('controller' => 'groups', 'action' => 'index'));
	Router::connect('/admin/groups/add', array('controller' => 'groups', 'action' => 'add'));
	Router::connect('/admin/groups/edit/*', array('controller' => 'groups', 'action' => 'edit'));

	Router::connect('/admin/incidentusers', array('controller' => 'incidentUsers', 'action' => 'index'));
	
	Router::connect('/admin/learningmentors', array('controller' => 'learningMentors', 'action' => 'index'));
	Router::connect('/admin/learningmentors/add', array('controller' => 'learningMentors', 'action' => 'add'));
	Router::connect('/admin/learningmentors/edit', array('controller' => 'learningMentors', 'action' => 'edit'));
	
	Router::connect('/admin/hod', array('controller' => 'hods', 'action' => 'index'));
	Router::connect('/admin/hod/add', array('controller' => 'hods', 'action' => 'add'));
	Router::connect('/admin/hod/edit/*', array('controller' => 'hods', 'action' => 'edit'));

	Router::connect('/admin/hoy', array('controller' => 'hoys', 'action' => 'index'));
	Router::connect('/admin/hoy/add', array('controller' => 'hoys', 'action' => 'add'));
	Router::connect('/admin/hoy/edit/*', array('controller' => 'hoys', 'action' => 'edit'));
	
	Router::connect('/admin/smt', array('controller' => 'smts', 'action' => 'index'));
	Router::connect('/admin/smt/add', array('controller' => 'smts', 'action' => 'add'));
	Router::connect('/admin/smt/edit/*', array('controller' => 'smts', 'action' => 'edit'));
	
	/* Intranet Management */
	Router::connect('/admin/subjects', array('controller' => 'subjects', 'action' => 'index'));
	Router::connect('/admin/subjects/add', array('controller' => 'subjects', 'action' => 'add'));
	Router::connect('/admin/subjects/edit/*', array('controller' => 'subjects', 'action' => 'edit'));
	
	Router::connect('/admin/rooms', array('controller' => 'rooms', 'action' => 'index'));
	Router::connect('/admin/rooms/add', array('controller' => 'rooms', 'action' => 'add'));
	Router::connect('/admin/rooms/edit/*', array('controller' => 'rooms', 'action' => 'edit'));
	
	Router::connect('/admin/incidentoptions', array('controller' => 'incidentOptions', 'action' => 'index'));
	Router::connect('/admin/incidentoptions/add', array('controller' => 'incidentOptions', 'action' => 'add'));
	Router::connect('/admin/incidentoptions/edit/*', array('controller' => 'incidentOptions', 'action' => 'edit'));
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	//require CAKE . 'Config' . DS . 'routes.php';
	