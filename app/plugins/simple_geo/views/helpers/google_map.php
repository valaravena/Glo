<?php
/*
 * CakeMap -- a google maps integrated application built on CakePHP framework.
 * Copyright (c) 2005 Garrett J. Woodworth : gwoo@rd11.com
 * rd11,inc : http://rd11.com
 *
 * @author      gwoo <gwoo@rd11.com>
 * @version     0.10.1311_pre_beta
 * @license     OPPL
 *
 * Modified by 	Mahmoud Lababidi <lababidi@bearsontherun.com>
 * Date			Dec 16, 2006
 * 
 *
 */

class GoogleMapHelper extends Helper {

	    var $errors = array();
		var $types = array('ROADMAP', 'SATELLITE', 'HYBRID', 'TERRAIN');

	    function map($default, $style = 'width: 400px; height: 400px' ) {

	        $out = "<div id=\"map\"";
	        $out .= isset($style) ? "style=\"".$style."\"" : null;
	        $out .= " ></div>";
	        $out .= "
	        <script type=\"text/javascript\">
	        //<![CDATA[
	    		var directionDisplay;
			    var directionsService = new google.maps.DirectionsService();
			    var map;
				var lat;
				var lon;
			    var iconimage = \"http://glow/img/SGBluePin.png\";
			  	var iconshadow = \"hhttp://glow/img/SGBluePin.png\";
				if (google.loader.ClientLocation) {
					lat = google.loader.ClientLocation.latitude;
					lon = google.loader.ClientLocation.longitude;
				}
				";
				$default['type'] = (empty($default['type']) || (!empty($default['type']) && 
					!in_array(strtoupper($default['type']), $this->types)))?"ROADMAP":strtoupper($default['type']);
				if (!empty($default['lat']) || !empty($default['lon'])) {
					$out .="lat = ".$default['lat'].";";
					$out .="lon = ".$default['lon'].";";
				}
				$out .="
			  	var myOptions = {
					zoom: ".$default['zoom'].",
					center: new google.maps.LatLng(lat, lon),
					mapTypeId: google.maps.MapTypeId.".$default['type'].",
			        streetViewControl: true
				};
				
				var map = new google.maps.Map(document.getElementById(\"map\"), myOptions);

	      		function cleardirs() {
			     	if(directionsDisplay) {
			        	directionsDisplay.setMap(null);
					}
					div = document.getElementById('".(isset($default['directions_div'])?$default['directions_div']:'directions_div')."');
					if(div) {
						div.innerHTML = \"\";
					}";
					if(isset($default['directions_div'])) {
					$out .= "
						directionsDisplay = new google.maps.DirectionsRenderer();
						directionsDisplay.setMap(map);
						directionsDisplay.setPanel(document.getElementById('".$default['directions_div']."'));
						function calcRoute(fromid,tolat,tolon) {
							directionsDisplay.setMap(map);
							from = document.getElementById(fromid).value;
							var start = from;
							var end = new google.maps.LatLng(tolat,tolon);
							var request = {
								origin:start,
								destination:end,
								travelMode: google.maps.DirectionsTravelMode.DRIVING
							};
							directionsService.route(request, function(result, status) {
								if (status == google.maps.DirectionsStatus.OK) {
									directionsDisplay.setDirections(result);
								}
							});
						}";
					}
			        $out .="}
			        //]]>
			        </script>";
	        return $out;
	    }
	
		function addOverlay(&$data) {
	        $out = "
	            <script type=\"text/javascript\">
	            //<![CDATA[
	            ";
	
			$out .= "
	                //]]>
	            </script>";
	        return $out;
		}

	    function addMarkers(&$data, $icon=null) {

	        $out = "
	            <script type=\"text/javascript\">
	            //<![CDATA[
	            ";
	            if(is_array($data)) {
	                $i = 0;
	                foreach ( $data as $n=>$m ) {
	                    $keys = array_keys($m);
	                    $point = $m[$keys[0]];
	                    if(!preg_match('/[^0-9\\.\\-]+/',$point['longitude']) && 
							preg_match('/^[-]?(?:180|(?:1[0-7]\\d)|(?:\\d?\\d))[.]{1,1}[0-9]{0,15}/',$point['longitude']) && 
							!preg_match('/[^0-9\\.\\-]+/',$point['latitude']) &&
							preg_match('/^[-]?(?:180|(?:1[0-7]\\d)|(?:\\d?\\d))[.]{1,1}[0-9]{0,15}/',$point['latitude'])) {
	                        $out .= "
	                            var point".$i." = new google.maps.LatLng(".$point['latitude'].",".$point['longitude'].");
	                            var marker".$i." = new google.maps.Marker({
	                            	position: point".$i.",
	                      			map: map,
	                      			title:\"".(isset($point['title'])?$point['title']:'')."\",
	                      			shadow: iconshadow,
	                    			icon: iconimage,
	                            });";

	                        if(isset($point['title'])&&isset($point['html'])) {
	                           $out .= " 
								var infowindow$i = new google.maps.InfoWindow({
	                          		content: \"$point[title]$point[html]\"

	                      		});
	                      		google.maps.event.addListener(marker".$i.", 'click', function() {
	                  				infowindow$i.open(map,marker".$i.");
	                			});";
	                        }
	                        $data[$n][$keys[0]]['js']="marker$i.openInfoWindowHtml(marker$i.html);";
	                        $i++;
	                    }
	                }
	            }
	        $out .= "
	                //]]>
	            </script>";
	        return $out;

	    }

	    function addEvent ( $event='click', $var, $script=null ) {
	        $out = "
	            <script type=\"text/javascript\">
	            //<![CDATA[
	            $script
	            google.maps.event.addListener(map, '".$event."', ".$var.", true);
	            //]]>
	            </script>";
	        return $out;
	    }

	    function addMarkerOnClick ( $innerHtml = null ) {
	        $mapClick = '
	            var mapClick = function (event) {
	   				var marker = new google.maps.Marker({
	                	position:event.latLng,
	                	icon: iconimage,
	                	map:map
	                });
		        	var infowindow = new google.maps.InfoWindow({
		            	content: \"'.$innerHtml.'\"
					});
		        	google.maps.event.addListener(marker, \'click\', function() {
		              infowindow.open(map,marker);
		        	});
	            }
	        ';
	        return $this->addEvent('click', 'mapClick', $mapClick);
	    }

	    function moveMarkerOnClick ($lngctl, $latctl, $innerHtml = null) {
	        $mapClick = '
	            var mapClick = function (event) {
	                marker0.setPosition(event.latLng);
	                lngctl = document.getElementById(\''.$lngctl.'\');
	                latctl = document.getElementById(\''.$latctl.'\');
	                if(lngctl)
	                	lngctl.value = event.latLng.lng();
	                if(latctl)
	                 	latctl.value = event.latLng.lat();
	            }
	        ';
	        return $this->addEvent('click', 'mapClick', $mapClick);
	    }
}
?>
