<?php
echo $javascript->link("http://www.google.com/jsapi");
echo $javascript->codeBlock("google.load('maps', '3',  {other_params:'sensor=false'});");
echo $javascript->codeBlock();
?>
$(document).ready(function() {
	$.get('<?php echo $html->url(array('admin' => false, 'plugin' => 'simple_geo', 'controller' => 'simple_geo', 'action' => 'nearby', $simpleGeoLayer['SimpleGeoLayer']['name'],)) ?>', {hash: google.loader.ClientLocation.latitude+','+google.loader.ClientLocation.longitude}, function (data) { $("#map_box").html(data)});
})
<?php echo $javascript->blockEnd();?>

<div class="clearfix"></div>
<div id="left-col">
	<div class="box" style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>
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
				</div>
			</div>
		</div>
		<div class="bottomleft">
			<div class="bottomright"> </div>
		</div>
	</div>
</div>
<div id="right-col">
	<?php echo $this->element('account_menu')?>
</div>









