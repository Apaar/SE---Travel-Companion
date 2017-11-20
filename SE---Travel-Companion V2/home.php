<?php
	include_once('template.php');
?>
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
	<div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.
      var map, infoWindow;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 16
        });
        infoWindow = new google.maps.InfoWindow;

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            infoWindow.open(map);
            map.setCenter(pos);

            //Update database with current location
            window.alert(pos.lat + " " + pos.lng);
            locationUpdate(pos.lat, pos.lng);
            //-------------------------------------
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
        infoWindow.open(map);
      }

      function locationUpdate(lat, lng)
      {
        var xhr = new XMLHttpRequest();
        var url = "location_update.php";
        var usr = '<?php echo $usr; ?>';
        var params = "username="+usr+"&lat="+lat+"&lng="+lng;
        xhr.open("POST",url,true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


        xhr.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
              var response = this.responseText;
              console.log(response);
            }
          }

      
        xhr.send(params);
      }
    </script>

	 <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlSfndSEgMWYRJjk92AJShsQX4BEi3Rwk&callback=initMap">
    </script>
</body>
</html>
