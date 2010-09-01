<?php
	echo $sidebar->addTitle(sprintf(__('%s Menu', true), __('Simple Geo Layer', true)));
	echo $sidebar->addMenu('users', array('title' => sprintf(__('Manage %s',true), __('Layers', true)), 'sort_order' => 10));
	echo $sidebar->addMenu('new_user', array('title' => sprintf(__('New %s',true), __('Layer', true)), 'sort_order' => 10, 'url' => array('action' => 'add')), 'users');

echo $javascript->link("http://www.google.com/jsapi");
echo $javascript->codeBlock("google.load('maps', '3',  {other_params:'sensor=false'});");
echo $javascript->codeBlock();
?>
$(document).ready(function() {
	$.get('<?php echo $html->url(array('admin' => false, 'plugin' => 'simple_geo', 'controller' => 'simple_geo', 'action' => 'nearby', $simpleGeoLayer['SimpleGeoLayer']['name'],)) ?>', {hash: google.loader.ClientLocation.latitude+','+google.loader.ClientLocation.longitude}, function (data) { $("#map_box").html(data)});
})
<?php echo $javascript->blockEnd();
?>
<div class="box simpleGeoLayers view">
	<div class="box-top rounded_by_jQuery_corners" style="-moz-border-radius-topleft: 5px; -moz-border-radius-topright: 5px;">
	    <h4 class="white"><?php echo $simpleGeoLayer['SimpleGeoLayer']['name'] ?></h4>
    </div>
    <div id="map_box" style="-moz-border-radius-bottomleft: 5px; -moz-border-radius-bottomright: 5px;" class="box-container rounded_by_jQuery_corners form">
		<?php echo $html->tag('span', __('Loading Map Data', true), array('class' => 'loading'));?>
<?php
/*	$points = $this->requestAction(array('plugin' => 'simple_geo', 'controller' => 'simple_geo', 'action' => 'nearby'), array('pass' => array($simpleGeoLayer['SimpleGeoLayer'], '')));
	
	die();
	if (!empty($points)) {
		foreach($points as $n=>$point){
	   		$points[$n]['Point']['title'] = "<b>".$point['Point']['name']."</b>";
			$points[$n]['Point']['html'] = $point['Point']['name'];
		}
	}
	$default = array('zoom' => 12);
	echo $googleMap->map($default, $style = 'width:100%; height: 500px;');
	
	if(isset($points)){
		echo $googleMap->addMarkers($points);
		echo $googleMap->addMarkerOnClick();
  	}

*/
?>
	</div>
</div>