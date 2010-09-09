<?php


class SuperRouter {
	
	function connect($route , $default = array(), $params = array()) {
		Router::connect($route, $default, $params);
		if ($route == '/') {
			$route = '';
		}
		Router::connect('/:locale' . $route, $default, array_merge(array('locale' => '[a-z]{3}'), $params));
	}
	
	function plugins() {
		$pluginRoutes = Configure::read("Hook.routes");
		if (!$pluginRoutes) {
			return;
		}
		
		$plugins = explode(',', $pluginRoutes);
		foreach ($plugins as $plugin) {
			if (file_exists(APP.'plugins'.DS.$plugin.DS.'config'.DS.'routes.php')) {
				require_once(APP.'plugins'.DS.$plugin.DS.'config'.DS.'routes.php');
			}
		}
	}
}