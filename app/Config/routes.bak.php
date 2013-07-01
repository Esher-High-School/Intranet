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
	Router::connect('/edit/*', array('controller' => 'pages', 'action' => 'edit'));
	Router::connect('/add', array('controller' => 'pages', 'action' => 'add'));
	Router::connect('/delete/*', array('controller' => 'pages', 'action' => 'delete')); 
	
	Router::connect('/students', array('controller' => 'students', 'action' => 'years'));
	Router::connect('/students/year/*', array('controller' => 'students', 'action' => 'index'));
	
	Router::connect('/tfd', array('controller' => 'tfds', 'action' => 'index'));
	
	Router::connect('/staffbulletins', array('controller' => 'staffbulletins', 'action' => 'index'));
	Router::connect('/staffbulletins/view/*', array('controller' => 'staffbulletins', 'action' => 'view'));
	Router::connect('/staffbulletins/edit/*', array('controller' => 'staffbulletins', 'action' => 'edit'));
	Router::connect('/staffbulletins/add', array('controller' => 'staffbulletins', 'action' => 'add'));

	Router::connect('/incident/*', array('controller' => 'incidents', 'action' => 'view'));
	
	/* Administration Areas */
	Router::connect('/admin/cmsusers', array('controller' => 'cmsusers', 'action' => 'index'));
	Router::connect('/admin/cmsusers/add', array('controller' => 'cmsusers', 'action' => 'add'));
	Router::connect('/admin/cmsusers/edit/*', array('controller' => 'cmsusers', 'action' => 'edit'));

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
