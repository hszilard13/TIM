<!DOCTYPE html>
<html>
  <head>
  <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <?php session_start(); ?>
    <?php $markerArray = $_SESSION['markerArray']; ?>
    <div id="map"></div>
    <script type='text/javascript'>
	  var markerArray = <?php echo json_encode($markerArray); ?>;
      var map;
	  var zoom;
	  var center;
	  var allLat;
	  var allLng;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'));
      }
	  markerArray.forEach(function(marker){
	    var newMarker = new google.maps.Maker(
		{
		  posistion: new google.maps.LatLng(parseFloat(marker.lat), parseFloat(marker.lng)),
		  //color: marker.color,
		  title: marker.name,
		  label: {text: marker.label},
		  map: map
		});
		allLng = allLng + parseFloat(marke.lng);
		allLat = allLat + parseFloat(marke.lat);
	  });
	  center = new google.maps.LatLng(allLat/markerArray.length, allLng/markerArray.length);
	  zoom = 4;
	  map.setCenter(center);
	  map.setZoom(zoom);
	  
	  google.maps.event.addDomListener(window, 'load', initMap);
    </script>
  </body>
</html>