<?php
	include_once('template.php');
?>

	<style>

		#frn
		{
			background-position: 50% 50%;
			z-index: 1;
			background: rgba(0, 0, 0, 0) url(Journey.png) no-repeat scroll 50% 50% / cover padding-box border-box;
			font: normal normal normal 16px/normal Helvetica, Arial, sans-serif;
			background-size:cover;
		}

		.animatable
		{
			-webkit-transition:all 1000ms ease-out;
			transition:all 1000ms ease-out;
		}
		
		.scaled
		{
			-webkit-transform:scale(1.10);
			transform:scale(1.10);
		}

		.navbar
		{
			display: none;   
		}​

	</style>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#frn').attr('class', 'animatable');
			setTimeout(function () {
				$('#frn').removeClass('animatable');
			}, 1000)
		});
		$(document).ready(function() {
			$('.row').delay(600).fadeIn(1200);
		});
		$(document).ready(function() {
			$('.navbar').delay(600).fadeIn(1200);
		});
	</script>


	<div class="row" style="display: none">
		<div style="float:left;" class ="col-md-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Friends</h3>
				</div>
				<ul class="list-group" id="friends_body"></ul>
			</div>
		</div>
		<div id="map" class="col-md-8" style="position:fixed;padding:0;margin:0;top:0;left:0;height: 100%;"></div>
		
	</div>
	<script type="text/javascript">
		window.onload = getFrnds;
		function getFrnds()
		{
			
			var username = '<?php echo $usr; ?>';
			if(username == "")
			{
				alert("Not Logged in");
				window.location = "login_register.php";
			}
			else
			{
				var xhr = new XMLHttpRequest();
				var url = "friends_list.php";
				var params = "username="+username;

				xhr.open("POST",url,true);
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				xhr.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200) {
						if(this.responseText){
							//alert("friends")
							var response = JSON.parse(this.responseText);
							
							response.forEach(function(friends){
								var list_element = document.createElement('button');
								list_element.setAttribute('type','button');
								list_element.className = 'list-group-item list-group-item-action';
								list_element.innerHTML = friends['friend2'];
								list_element.value = friends['friend2'];
								list_element.setAttribute('onclick','button_clicked(this)')
								document.getElementById('friends_body').appendChild(list_element);
							})
							
						}
						else {
							var list_element = document.createElement('li');
							list_element.className = 'list-group-item';
							list_element.innerHTML = "You have no friends :(";
							document.getElementById('friends_body').appendChild(list_element);
							//alert("friends list empty")
						}
					}
				}

				xhr.send(params);
			}
		}
		function button_clicked(name) {
			console.log("button_click "+name.value)
			var x = new XMLHttpRequest();
			var url1 = "get_lastseen.php";
			var params1 = "username="+name.value;

			x.open("POST",url1,true);
			x.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

			x.onreadystatechange = function() {
				if(this.readyState == 4 && this.status == 200) {
					console.log(x.responseText);
					var diff = parseInt(x.responseText);
					if(diff < 3600)
					{
						setInterval(
						function(){ 
							xhr = new XMLHttpRequest();
		               		var url = "get_location_of_friend.php";
		               		var params = "username="+name.value;
		               		xhr.open("POST",url,true);
		               		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		               		xhr.send(params);
		               		xhr.onreadystatechange = function() {
								if(this.readyState == 4 && this.status == 200) {
									var response = this.responseText;
									x=JSON.parse(response)
									construct_map(x['lat'],x['lng']);
								}
							}
					 	}, 10000);
					}
					else 
					{
						alert("Friend offline");
					}
				}
			}
			x.send(params1);
		}

		var map, infoWindow;
      function initMap() {

        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 14
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

		function construct_map(friend_lat,friend_lng)
		{
			//alert("hi")
			function getLocation() {
		    if (navigator.geolocation) {
		        navigator.geolocation.getCurrentPosition(showPosition);
		    } else { 
		        alert("Geolocation is not supported by this browser.");
		    }
			}

			 
			function showPosition(position) {
			    current_lat=position.coords.latitude; 
			    current_lng= position.coords.longitude;
			    var directionsDisplay = new google.maps.DirectionsRenderer;
		        var directionsService = new google.maps.DirectionsService;
			   	directionsDisplay.setMap(map);

		        calculateAndDisplayRoute(directionsService, directionsDisplay,[current_lat,current_lng],[parseFloat(friend_lat),parseFloat(friend_lng)]);
		     }

		     function calculateAndDisplayRoute(directionsService, directionsDisplay,or=[37.77,-122.447],des=[37.768, -122.511]) {
					        //var selectedMode = document.getElementById('mode').value;
					        //alert("hi")
					        var selectedMode = 'TRANSIT';
					        
					        directionsService.route({
					     origin: {lat: or[0], lng: or[1]},  // Haight.
					          destination: {lat: des[0], lng: des[1]},  // Ocean Beach.
					          // Note that Javascript allows us to access the constant
					          // using square brackets and a string value as its
					          // "property."
					          travelMode: google.maps.TravelMode[selectedMode]
					        }, function(response, status) {
					          if (status == 'OK') {
					          	//alert("hi")
					          	//alert(response)
					            directionsDisplay.setDirections(response);
					          } else {
					            window.alert('Directions request failed due to ' + status);
					          }
					        });
     		 }
		   getLocation()
		}
	</script>
	<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlSfndSEgMWYRJjk92AJShsQX4BEi3Rwk&callback=initMap">
    </script>
 <body id="frn" class="scaled")">
</body>
</html>