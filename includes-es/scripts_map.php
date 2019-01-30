<?php


?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKZ3u5IqStFBiqlcSEZ-7YbZw9wdj96Ak"></script>
<script type="text/javascript">
					
			var map;
			var markersArray = []; 
			var companyMarkerArray = []; var stylez = [
				{
				  featureType: "all",
				  elementType: "all",
				  stylers: [
					{ saturation: -100 } // <-- THIS
				  ]
				}
			];function initialize() {
				<?php
				$zoom_map = 16;
				?>
				var center_map = new google.maps.LatLng(20.634406,-103.35282);	var settings = {
					zoom: <?php echo $zoom_map; ?>,
					center: center_map,
					mapTypeControl: true,
					mapTypeControlOptions: {
						mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'tehgrayz']
					},
					navigationControl: true,
					navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL}
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), settings);

				var mapType = new google.maps.StyledMapType(stylez, { name:"Grayscale" });    
				map.mapTypes.set('tehgrayz', mapType);
				map.setMapTypeId('tehgrayz');	
				var lat_lon = new google.maps.LatLng(20.634406,-103.35282);	<?php
	
				$w="72";
				$h="43";
					

				echo 'f_add_marker(map,markersArray,lat_lon,' .$w . ',' .$h . ',"<span class=\"text_bold\" style=\"margin-top:1em;display:block;margin-bottom:.5em\">BÖRSE</span>","/images-es/interface/google_maps_marker.png","<div id=\"recuadro_map\"><p>Calle 5 532A<br/><span class=\"text_tenue\">Colón Industrial, C.P. 44940<br/>Guadalajara, Jalisco, México</span><br/>Teléfono:&nbsp 01 (33) 3540 2500</p></div>");';										?>								
						
		}
				
		
		function f_add_marker(map,markersArray,companyPos,w_,h_,companyTitle,companyImage,contentString){

				var contentString = '<div id="content_infowindow">'+
						'<div id="siteNotice">'+
						'</div>'+					
						'<div id="bodyContent">'+
							'<div id="firstHeading" class="firstHeading">'+companyTitle+'</div>'+
							'<p>'+contentString+'</p>'+
						'</div>'+
					'</div>';								
		
				var infowindow = new google.maps.InfoWindow({
					content: contentString
				});					var companyImage = new google.maps.MarkerImage(companyImage,
					new google.maps.Size(w_,h_),
					new google.maps.Point(0,0),
					new google.maps.Point(37,34)
				);

				var companyShadow = new google.maps.MarkerImage('/images/interface/_blank.png',
					new google.maps.Size(37,34),
					new google.maps.Point(0,0),
					new google.maps.Point(37, 34));

				var companyMarker = new google.maps.Marker({
					position: companyPos,
					map: map,
					icon: companyImage,
					shadow: companyShadow,
					animation: google.maps.Animation.DROP,
					title: companyTitle,
					zIndex: 3});			
												
				google.maps.event.addListener(companyMarker, 'click', function() {
					clearOverlays();
					infowindow.open(map,companyMarker);
				});					markersArray.push(infowindow); 
				companyMarkerArray.push(companyMarker); 	markersArray[0].open(map,companyMarkerArray[0]);
				
		}
			
		function clearOverlays() { 
		  if (markersArray) { 
			for (i in markersArray) { 
			  markersArray[i].close(); 
			} 
		  } 
		} 
 

			
</script>
