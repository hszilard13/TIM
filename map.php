<!DOCTYPE html>
<html>
  <head>
  <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <script type='text/javascript'>
      function initMap() {
		<?php session_start(); ?>
        <?php $markerArray = $_SESSION['markerArray']; ?>
	    var markerArray = <?php echo json_encode($markerArray); ?>;
        var map;
		var bounds = new google.maps.LatLngBounds();
        map = new google.maps.Map(document.getElementById('map'));
        for(var i = 0; i < markerArray.length; i++)
		{
	      var newMarker = new google.maps.Marker(
		  {
		    posistion: new google.maps.LatLng(parseFloat(markerArray[i].lat), parseFloat(markerArray[i].lng)),
		    color: markerArray[i].color,
		    title: markerArray[i].name,
		    label: {text: markerArray[i].label},
		    map: map
		  });
		  bounds.extend(markerArray[i].position);
	    }
		map.fitBounds(bounds);
	  }
    </script>
  </head>
  <body onload = "initMap()">
    <div id="map" style="width: 600px; height: 400px"></div>
  </body>
</html>