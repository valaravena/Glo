<?php


class SimpleGeoController extends SimpleGeoAppController {
	
	
	var $name = "SimpleGeo";
	var $uses = array('SimpleGeo.SimpleGeo');
	
	function beforeFilter() {
        parent::beforeFilter();
		$this->Security->requireLogin('records');
    }
	
	function admin_index() {
		$this->set('title_for_layout', __('Simple Geo', true));
	}
	
	
	function nearby() {      
		$this->layout = 'ajax';
		$simpleGeoLayer = 'com.simplegeo.us.business';
		$points = array();
		if (!empty($simpleGeoLayer)) {
			if (!empty($this->params['url']['hash'])) {       
				$result = $this->SimpleGeo->getNearby($simpleGeoLayer, $this->params['url']['hash'], array('limit' => 50));         
				if (!empty($result->features)) {
					foreach ($result->features as $feature) {
						$point['Point']['id'] = $feature->id;
						$point['Point']['name'] = $feature->properties->std_name;
	                	$point['Point']['longitude'] = $feature->geometry->coordinates[0];
	                	$point['Point']['latitude'] = $feature->geometry->coordinates[1];
	                	$point['Point']['created'] = $feature->created;
	                	$points[] = $point;
	            	}
	        	} else {
					if (!empty($result->message)) {
						#die($result->message);
					}
				}
			}
			$this->set('points', $points);
		}    
	}
	
	function records($id = null, $simpleGeoLayer = null) {
		

	}
}