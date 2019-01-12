<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
	<?php session_start(); ?>
	<?php $markerArray = $_SESSION['markerArray']; ?>
	var markerArray = <?php echo json_encode($markerArray); ?>;
  
	var locations = new Array(markerArray.length);
	
	for (var i = 0; i < locations.length; i++) {
		locations[i] = new Array(5);
	}
	
	for(var i = 0; i < markerArray.length; i++)
	{
		locations[i][0] = markerArray[i].name;
		locations[i][1] = parseFloat(markerArray[i].lat);
		locations[i][2] = parseFloat(markerArray[i].lng);
		locations[i][3] = markerArray[i].color;
		locations[i][4] = markerArray[i].lable;
	}

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(-33.92, 151.25),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		color: locations[i][3],
		label: locations[i][4],
        map: map
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>