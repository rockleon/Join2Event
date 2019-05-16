<?php
	require('connectdb.php');
  session_start();
	
  $name = $_SESSION['name'];
	$query = "SELECT venue FROM event WHERE name='$name'";
  
	$result = mysqli_query($conn,$query);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$addr = $row["venue"];
	}
?>



<html>
  <head>
    <title>Geocoding</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 80%;
        width: 80%;
        margin: 0;
        padding: 0;
      }
      #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto','sans-serif';
        line-height: 30px;
        padding-left: 10px;
      }
    </style>
  </head>
  <body>
    
      <input id='address' type='hidden' name='addr' value='<?php echo"$addr";?>'>
      <input id="submit" type="hidden" value="Geocode">
    
    <div id="map"></div>
    <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: {lat: 19.0330, lng: 73.0297}
        });
        var geocoder = new google.maps.Geocoder();

        document.getElementById('submit');//.addEventListener('click', function() {
          geocodeAddress(geocoder, map);
        //});
      }

      function geocodeAddress(geocoder, resultsMap) {
        var address = document.getElementById('address').value;
        geocoder.geocode({'address': address}, function(results, status) {
          if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
              map: resultsMap,
              position: results[0].geometry.location
            });
          } else {
            alert('Geocode was not successful for the following reason: ' + status);
          }
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=add-your-googlemaps-api-key-here">
    </script>
  </body>
</html>
