<?php
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
	Router::connect('/',array('controller' => 'site', 'action' => 'index'));
	Router::connect('/signup', array('controller'=>'users', 'action'=>'signup'));
	Router::connect('/signin' , array('controller'=>'users','action'=>'login'));
	Router::connect('/signout',array('controller'=>'users','action'=>'logout'));
	Router::connect('/about', array('controller'=>'site', 'action'=>'about'));
	Router::connect('/mine', array('controller'=>'users', 'action'=>'mine'));
	Router::connect('/groups',array('controller'=>'groups','action'=>'index'));
	Router::connect('/settings',array('controller'=>'users','action'=>'edit'));
	Router::connect('/group/:gid/join',array('controller'=>'group_memberships','action'=>'join'));
	Router::connect('/group/:gid/quit',array('controller'=>'group_memberships','action'=>'quit'));
    Router::connect('/group/:gid/manage',array('controller'=>'groups','action'=>'edit'));
    Router::connect('/group/:gid/new_avatar',array('controller'=>'groups','action'=>'upload_avatar'));
    Router::connect('/group/:gid/new_event',array('controller'=>'events','action'=>'add'));
	Router::connect('/group/:gid/events',array('controller'=>'events','action'=>'group'));
    Router::connect('/group/:gid/post/new',array('controller'=>'group_posts','action'=>'add'));
    Router::connect('/group/:gid/*',array('controller'=>'groups','action'=>'view'),array('pass'=>array('gid','page')));

	Router::connect('/people/:uid',array('controller'=>'users','action'=>'view'));
	Router::connect('/people/:uid/diary/*', array('controller'=>'notes','action'=>'index'));
	Router::connect('/people/:uid/guests/*', array('controller'=>'guests','action'=>'index'));
	Router::connect('/people/:uid/friends/*',array('controller'=>'friendships','action'=>'index'));
	Router::connect('/location',array('controller'=>'locations','action'=>'index'));
	Router::connect('/location/:province',array('controller'=>'locations','action'=>'index')); 
	Router::connect('/location/:province/:city',array('controller'=>'locations','action'=>'index')); 
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
//	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
?>