// necessary variables
var map;
var infoWindow;

// markersData variable stores the information necessary to each marker
var markersData =[]
function isInArray(array, search)
{
    return array.indexOf(search) >= 0;
}


function initialize() {
   var directionsDisplay = new google.maps.DirectionsRenderer;
   var directionsService = new google.maps.DirectionsService;
   var mapOptions = {
      center: new google.maps.LatLng(28.38,77.12),
      zoom: 3,
      mapTypeId: 'roadmap',
   };
   directionsDisplay.setMap(map);
   map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

   // a new Info Window is created
   infoWindow = new google.maps.InfoWindow();

   // Event that closes the Info Window with a click on the map
   google.maps.event.addListener(map, 'click', function() {
      infoWindow.close();
   });

   

   var input = document.getElementById('pac-input');
   var searchBox = new google.maps.places.SearchBox(input);
   map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

   searchBox.addListener('places_changed', function() {
                var places = searchBox.getPlaces();

                if (places.length == 0) {
                  return;
                }
               places.forEach(function(place) {
                  if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                  }
                   if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    x={lat: place.geometry.location.lat(),
                     lng: place.geometry.location.lng(),
                     name: place.name};
                    
                     if(!isInArray(markersData,x))
                     {
                        markersData.push(x);
                        // Finally displayMarkers() function is called to begin the markers creation
                        displayMarkers();
                       //check(x)
                     }

                   } 
                });
                
              });
}



// This function will iterate over markersData array
// creating markers with createMarker function
function displayMarkers(){

   // this variable sets the map bounds according to markers position
   var bounds = new google.maps.LatLngBounds();
   
   // for loop traverses markersData array calling createMarker function for each marker 
   for (var i = 0; i < markersData.length; i++){

      var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
      var name = markersData[i].name;
      

      createMarker(latlng, name);
     
      // marker position is added to bounds variable
      bounds.extend(latlng);  
   }
   //alert(bounds);
   // Finally the bounds variable is used to set the map bounds
   // with fitBounds() function
   map.fitBounds(bounds);
}

// This function creates each marker and it sets their Info Window content
function createMarker(latlng, name){
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name
   });

   // This event expects a click on a marker
   // When this event is fired the Info Window content is created
   // and the Info Window is opened.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + name + '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });
}





/*
function check(x)
{
   var bounds = new google.maps.LatLngBounds();
   var latlng = new google.maps.LatLng(x.lat, x.lng);
      var name = x.name;
   var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      title: name
   });

   // This event expects a click on a marker
   // When this event is fired the Info Window content is created
   // and the Info Window is opened.
   google.maps.event.addListener(marker, 'click', function() {
      
      // Creating the content to be inserted in the infowindow
      var iwContent = '<div id="iw_container">' +
            '<div class="iw_title">' + name + '</div></div>';
      
      // including content to the Info Window.
      infoWindow.setContent(iwContent);

      // opening the Info Window in the current map and at the current marker location.
      infoWindow.open(map, marker);
   });

   bounds.extend(latlng); 
   map.fitBounds(bounds);
}

*/