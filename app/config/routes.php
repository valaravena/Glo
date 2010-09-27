<?php

	#App::import('Lib', 'super_router');

	require_once APP.'libs'.DS.'super_router.php';
	
	#SuperRouter::plugins();

	#if (!isInstalled()) {
	#	SuperRouter::connect('/', array('plugin' => 'install', 'controller' => 'wizard'));
	#}
	
	// Basic
	SuperRouter::connect('/admin', array('admin' => true, 'controller' => 'dashboard'));

	// Pages
	SuperRouter::connect('/', array('controller' => 'pages', 'action' => 'home', 'home'));
	#SuperRouter::connect('/pages/*', array('controller' => 'pages', 'action' => 'view'));
	SuperRouter::connect('/contact', array('controller' => 'pages', 'action' => 'contact'));
	
	// Users
	SuperRouter::connect('/register', array('controller' => 'users', 'action' => 'register'));
	SuperRouter::connect('/login', array('controller' => 'users', 'action' => 'login'));  
	SuperRouter::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	SuperRouter::connect('/recover', array('controller' => 'users', 'action' => 'recover'));
	
	Router::parseExtensions('xml','json', 'csv');





