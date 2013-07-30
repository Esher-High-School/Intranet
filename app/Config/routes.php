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

	Router::connect('/', array('controller' => 'staffbulletins', 'action' => 'display'));
	Router::connect('/pages', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'view'));
	
	Router::connect('/tfd', array('controller' => 'tfds', 'action' => 'index'));
	
	Router::connect('/staffbulletin/*', array('controller' => 'staffbulletins', 'action' => 'index'));
	
	Router::connect('/phoneextensions', array('controller' => 'phoneextensions', 'action' => 'index'));
	
	/* Incident Reporting */
	Router::connect('/incident/*', array('controller' => 'incidents', 'action' => 'view'));
	Router::connect('/incidentform', array('controller' => 'students', 'action' => 'incidentFormList'));
	Router::connect('/incidentform/select/*', array('controller' => 'students', 'action' => 'incidentFormList'));
	Router::connect('/incidentform/form/*', array('controller' => 'incidents', 'action' => 'report'));
	Router::connect('/incidentform/submit', array('controller' => 'incidents', 'action' => 'reportSubmit'));
	Router::connect('/incidentform/email/*', array('controller' => 'incidents', 'action' => 'reportEmail'));

	/* Incident Printing */
	Router::connect('/incidents/print/*', array('controller' => 'students', 'action' => 'incidentPrintList')); 
	Router::connect('/incidents/printing/dates/*', array('controller' => 'incidents', 'action' => 'printIncidentsSelect'));

	/* Incident Monitoring */
	Router::connect('/incidentmonitoring/select/*', array('controller' => 'students', 'action' => 'incidentMonitoringList'));
	
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
	
	/* Learning Mentors */
	Router::connect('/learningmentors', array('controller' => 'incidents', 'action' => 'learningmentorhome'));
	Router::connect('/learningmentors/accessdenied', array('controller' => 'learningmentors', 'action' => 'accessdenied'));
	
	/* SMT Areas */
	Router::connect('/smt', array('controller' => 'incidents', 'action' => 'smthome'));
	Router::connect('/smt/accessdenied', array('controller' => 'smts', 'action' => 'accessdenied'));
	
	/* CMS Areas */
	Router::connect('/cms', array('controller' => 'cms', 'action' => 'index'));

	Router::connect('/cms/settings', array('controller' => 'settings', 'action' => 'index'));
	Router::connect('/cms/settings/add', array('controller' => 'settings', 'action' => 'add'));
	Router::connect('/cms/settings/edit/*', array('controller' => 'settings', 'action' => 'edit'));
	
	Router::connect('/cms/pages', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/cms/pages/add', array('controller' => 'pages', 'action' => 'add'));
	Router::connect('/cms/pages/edit/*', array('controller' => 'pages', 'action' => 'edit'));
	
	Router::connect('/cms/links', array('controller' => 'links', 'action' => 'index'));
	Router::connect('/cms/links/add', array('controller' => 'links', 'action' => 'add'));
	Router::connect('/cms/links/edit/*', array('controller' => 'links', 'action' => 'edit'));
	
	Router::connect('/cms/filemanager', array('controller' => 'files', 'action' => 'index'));
	
	Router::connect('/cms/students', array('controller' => 'students', 'action' => 'years'));
	Router::connect('/cms/students/year/*', array('controller' => 'students', 'action' => 'index'));
	Router::connect('/cms/students/add', array('controller' => 'students', 'action' => 'add'));
	Router::connect('/cms/students/edit/*', array('controller' => 'students', 'action' => 'edit'));
	
	Router::connect('/cms/staffbulletins', array('controller' => 'staffbulletins', 'action' => 'index'));
	Router::connect('/cms/staffbulletins/add', array('controller' => 'staffbulletins', 'action' => 'add'));
	Router::connect('/cms/staffbulletins/edit/*', array('controller' => 'staffbulletins', 'action' => 'edit'));
	
	Router::connect('/cms/tutors', array('controller' => 'tutors', 'action' => 'index'));
	Router::connect('/cms/tutors/add', array('controller' => 'tutors', 'action' => 'add'));
	Router::connect('/cms/tutors/edit', array('controller' => 'tutors', 'action' => 'edit'));
	
	Router::connect('/cms/phoneextensions/edit/*', array('controller' => 'phoneextensions', 'action' => 'edit'));
	Router::connect('/cms/phoneextensions/delete/*', array('controller' => 'phoneextensions', 'action' => 'delete'));
	
	/* Administration Areas */
	Router::connect('/admin', array('controller' => 'admin', 'action' => 'index'));
	Router::connect('/admin/accessdenied', array('controller' => 'admin', 'action' => 'accessdenied'));
	
	Router::connect('/admin/users', array('controller' => 'cmsusers', 'action' => 'index'));
	Router::connect('/admin/users/add', array('controller' => 'cmsusers', 'action' => 'add'));
	Router::connect('/admin/users/edit/*', array('controller' => 'cmsusers', 'action' => 'edit'));
	
	Router::connect('/admin/learningmentors', array('controller' => 'learningmentors', 'action' => 'index'));
	Router::connect('/admin/learningmentors/add', array('controller' => 'learningmentors', 'action' => 'add'));
	Router::connect('/admin/learningmentors/edit', array('controller' => 'learningmentors', 'action' => 'edit'));
	
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
	Router::connect('/admin/rooms/edit*', array('controller' => 'rooms', 'action' => 'edit'));
	
	Router::connect('/admin/incidentoptions', array('controller' => 'IncidentOptions', 'action' => 'index'));
	Router::connect('/admin/incidentoptions/add', array('controller' => 'IncidentOptions', 'action' => 'add'));
	Router::connect('/admin/incidentoptions/edit/*', array('controller' => 'IncidentOptions', 'action' => 'edit'));
/**
 * Load all plugin routes.  See the CakePlugin documentation on 
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
