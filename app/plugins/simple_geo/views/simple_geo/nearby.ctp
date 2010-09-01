<?php
	if (!empty($points)) {
		foreach($points as $n=>$point){
	   		$points[$n]['Point']['title'] = "<b>".$point['Point']['name']."</b><br />";
			$points[$n]['Point']['html'] = $point['Point']['name'];
		}
	}
	$default = array('zoom' => 12);
	echo $googleMap->map($default, $style = 'width:100%; height: 500px;');
	echo $googleMap->addEvent('dragend', 'mapDrag', "var mapDrag = function(event){}");
	
	if (isset($overLay)) {
		echo $googleMap->addOverlay($overLay);
	}

	if(isset($points)){
		echo $googleMap->addMarkers($points, 'http://boingboing.net/style/reportthis.png');
		echo $googleMap->addMarkerOnClick("<h1>This is the Point</h1>");
	}
 ?>
