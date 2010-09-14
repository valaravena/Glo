<?php  
echo $javascript->link("http://www.google.com/jsapi");
echo $javascript->codeBlock("google.load('maps', '3',  {other_params:'sensor=false'});");    
echo $javascript->codeBlock("geocoder = new google.maps.Geocoder();");   
echo $javascript->codeBlock();
?>   
var infowindow; 
$(document).ready(function() { 
	var myOptions = {
		zoom: 12,
		mapTypeId: google.maps.MapTypeId.SATELLITE,
        streetViewControl: false
	};

	var map = new google.maps.Map(document.getElementById("map"), myOptions);
	var mapDrag = function(event) {updateLayer(map.getCenter());}
	google.maps.event.addListener(map, 'dragend', mapDrag, true);
   	var mapZoom = function(event) {updateLayer(map.getCenter());}
	google.maps.event.addListener(map, 'zoom_changed', mapZoom, true);

	

  	if (geocoder) {
		geocoder.geocode({'address': "<?php echo $account['Account']['location'];?>"}, 
			function(results, status) {
		      if (status == google.maps.GeocoderStatus.OK) { 
		        map.setCenter(results[0].geometry.location);  
				updateLayer(results[0].geometry.location);
	   		  } else {
		        
			  } 
			}
   	    );   
	 } 
   
	
	function updateLayer(latlng) { 
		var epm_data = [
			{"epm":56,"ame":2300,"ami":1,"renew":"CNG","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":67,"ame":1800,"ami":1,"renew":"NOT CERTIFIED","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":45,"ame":2546,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":88,"ame":3050,"ami":0,"renew":"CNG","ev":0,"leed":"CERTIFIED"},
			{"epm":44,"ame":1457,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":87,"ame":2199,"ami":1,"renew":"CNG","ev":0,"leed":"SILVER"},
			{"epm":77,"ame":2892,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":35,"ame":1913,"ami":1,"renew":"SOLAR","0":"CNG","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":96,"ame":3520,"ami":1,"renew":"SOLAR","ev":1,"leed":"PLATINUM"},
			{"epm":58,"ame":4200,"ami":0,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":67,"ame":2765,"ami":0,"renew":"NONE","ev":0,"leed":"GOLD"},
			{"epm":59,"ame":1965,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":68,"ame":3275,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":37,"ame":2134,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":52,"ame":2755,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":85,"ame":3877,"ami":1,"renew":"NONE","ev":1,"leed":"CERTIFIED"},
			{"epm":34,"ame":2433,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":66,"ame":1933,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
		   	{"epm":87,"ame":1456,"ami":0,"renew":"SOLAR","ev":0,"leed":"CERTIFIED"},
	 		{"epm":84,"ame":2345,"ami":1,"renew":"NONE","ev":0,"leed":"SILVER"},
			{"epm":76,"ame":2756,"ami":1,"renew":"NONE","ev":0,"leed":"CERTIFIED"},
			{"epm":56,"ame":4234,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":74,"ame":3244,"ami":0,"renew":"SOLAR","0":"CNG","ev":1,"leed":"NOT CERTIFIED"},
			{"epm":73,"ame":1655,"ami":1,"renew":"SOLAR","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":62,"ame":4266,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":45,"ame":2311,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":52,"ame":1966,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":60,"ame":1077,"ami":1,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":28,"ame":2234,"ami":0,"renew":"NONE","ev":0,"leed":"NOT CERTIFIED"},
			{"epm":65,"ame":3200,"ami":1,"renew":"NONE","ev":0,"leed":"CERTIFIED"}
		];   
  		$.ajax({
			url: "/simple_geo/simple_geo/nearby/?hash="+latlng.toUrlValue(), 
			dataType: 'json',
			success: function(result) {
				$.each(result, function(i, data) {  
					var latlng = new google.maps.LatLng(data.Point.latitude,data.Point.longitude);  
					var recordNum = i % epm_data.length;  
					var imgNum = ((epm_data[recordNum].epm%10)*10);
				  	var content = '<div class="map_popup" style="padding:0;margin:0;width:250px;">'+
								'<h2 class="title" style="border-bottom: 1px solid #000">'+data.Point.name+'</h2>'+   
			    
								'<div style="padding:5px 0; margin:5px 0;border-bottom:1px solid #000;overflow:hidden"><strong>EPM-Premise Rating:</strong><br /><img src="/img/meter/b_'+imgNum+'.png" alt="'+imgNum+'"></div>'+
				 
							    '<p><strong>Avg. Monthly Usage:</strong> '+epm_data[recordNum].ame+'</p>'+
								'<p><strong>AMI Ready:</strong> '+epm_data[recordNum].ami+'<br />'+   
								'<p><strong>Renewable Sources:</strong> '+epm_data[recordNum].renew+'</p>'+   
								'<p><strong>EV Charging Station:</strong> '+epm_data[recordNum].ev+'</p>'+   
								'<p><strong>LEED Certifications:</strong> '+epm_data[recordNum].leed+'</p>'+      
								'</div>';  
				 	var marker = new google.maps.Marker({
						        	position: latlng,
						  			map: map, 
									icon: "/img/SGBluePin.png"
						        });		
					google.maps.event.addListener(marker, 'click', function() {   
					  
					  if (infowindow) infowindow.close(); 
					  infowindow = new google.maps.InfoWindow({content: content});
					  infowindow.open(map,marker);  
						$('.map_popup').parent().parent().css('overflow','hidden');
					  	$('.map_popup').parent().css('overflow','hidden');
					
					});
					map.setCenter(latlng);
				});
				
			}
		});
	}  
   

});
  

<?php echo $javascript->blockEnd();?>


<div class="clearfix"></div>
<div id="left-col">
	<div class="box" style="width:99%">
		<div class="topleft">
			<div class="topright">
				<div>   
					<div id="map"style="width:100%; height: 500px;" ></div>
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











