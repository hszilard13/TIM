<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
  <link rel="stylesheet" href="../css/map.css">
</head> 
<body>
  <div id="map"></div>

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
		switch(markerArray[i].color)
		{
			case "blue"  : locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"; break;
			case "yellow": locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"; break;
			case "green" : locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/green-dot.png"; break;
			case "pink"  : locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/pink-dot.png"; break;
			case "purple": locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/purple-dot.png"; break;
			default      : locations[i][3] = "http://maps.google.com/mapfiles/ms/icons/red-dot.png";  
		}
		locations[i][4] = markerArray[i].lable;
	}
	
    var bounds = new google.maps.LatLngBounds();
	
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 10,
      center: new google.maps.LatLng(markerArray[0][1], markerArray[0][2]),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
		icon: {                             
               url: locations[i][3]                           
			   },
		label: locations[i][4],
        map: map
      });
      bounds.extend(marker.getPosition());
      map.fitBounds(bounds);
      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][4]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>