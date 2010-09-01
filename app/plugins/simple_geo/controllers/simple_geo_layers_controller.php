<?php
class SimpleGeoLayersController extends AppController {

	var $name = 'SimpleGeoLayers';
	var $uses = array('SimpleGeoLayer', 'SimpleGeo.SimpleGeo');

	function admin_index() {
		$this->set('title_for_layout', __('Simple Geo Layers', true));
		#$this->SimpleGeoLayer->recursive = 0;
		$this->set('simpleGeoLayers', $this->paginate());
	}

	function admin_view($id = null) {
		if (!empty($id)) {
			$simpleGeoLayer = $this->SimpleGeoLayer->read(null, $id);
			if (!empty($simpleGeoLayer)) {
				#$result = $this->SimpleGeo->getLayer($simpleGeoLayer['SimpleGeoLayer']['name']);
				
				#if (!empty($result->features)) {
            	#	$points = array();
               	#	foreach ($result->features as $feature) {
           		#		$point['Point']['id'] = $feature->id;
                #    	$point['Point']['name'] = $feature->id;
                #    	$point['Point']['longitude'] = $feature->geometry->coordinates[0];
                #    	$point['Point']['latitude'] = $feature->geometry->coordinates[1];
                #    	$point['Point']['created'] = $feature->created;
                #    	$points[] = $point;
                #	}
	        	#} else {
				#	if (!empty($result->message)) {
				#		die($result->message);
				#	}
				#}
	        	#$this->set('points', $points);
				#$this->Session->setFlash(sprintf(__('Invalid %s', true), 'simple geo layer'), 'admin/attention');
				#$this->redirect(array('action' => 'index'));
			}
		}
		$this->set('simpleGeoLayer', $simpleGeoLayer);
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->SimpleGeoLayer->create();
			if ($this->SimpleGeoLayer->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'simple geo layer'), 'admin/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'simple geo layer'), 'admin/error');
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(sprintf(__('Invalid %s', true), 'simple geo layer'), 'admin/attention');
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SimpleGeoLayer->save($this->data)) {
				$this->Session->setFlash(sprintf(__('The %s has been saved', true), 'simple geo layer'), 'admin/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(sprintf(__('The %s could not be saved. Please, try again.', true), 'simple geo layer'), 'admin/error');
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SimpleGeoLayer->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(sprintf(__('Invalid id for %s', true), 'simple geo layer'), 'admin/attention');
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SimpleGeoLayer->delete($id)) {
			$this->Session->setFlash(sprintf(__('%s deleted', true), 'Simple geo layer'), 'admin/success');
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(sprintf(__('%s was not deleted', true), 'Simple geo layer'), 'admin/error');
		$this->redirect(array('action' => 'index'));
	}

}
?>
