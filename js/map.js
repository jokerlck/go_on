var map;
var currentLocationMarker;
var prevLocation;
var locations = new Array();
var markers = [];
var added = false;

function getDistanceFromLatLonInKm(lat1,lon1,lat2,lon2) {
  var R = 6371; // Radius of the earth in km
  var dLat = deg2rad(lat2-lat1);  // deg2rad below
  var dLon = deg2rad(lon2-lon1);
  var a =
    Math.sin(dLat/2) * Math.sin(dLat/2) +
    Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
    Math.sin(dLon/2) * Math.sin(dLon/2)
    ;
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c; // Distance in km
  return d;
}

function deg2rad(deg) {
  return deg * (Math.PI/180)
}

function initMap() {

    map = new google.maps.Map(document.getElementById('map'), {
      zoom: 19,
      center: {lat: 22.2863307, lng: 114.1505035},
      //scrollwheel:  false,
      disableDefaultUI: true,
      styles: [
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#523735"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "administrative",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#c9b2a6"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#dcd2be"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#ae9e90"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#93817c"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#a5b076"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#447530"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f1e6"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#fdfcf8"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f8c967"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#e9bc62"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e98d58"
      }
    ]
  },
  {
    "featureType": "road.highway.controlled_access",
    "elementType": "geometry.stroke",
    "stylers": [
      {
        "color": "#db8555"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#806b63"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#8f7d77"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ebe3cd"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dfd2ae"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b9d3c2"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#92998d"
      }
    ]
  }
]
        });

        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });


        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.

}


function setPosition(position) {

  markers.forEach(function(marker) {
    marker.setMap(null);
    console.log('deleted');
  });

  var LatLong = {lat: parseFloat(position.coords.latitude), lng: parseFloat(position.coords.longitude)};
  currentLocationMarker = LatLong;

  // Clear out the old markers.
  

  if (locations.length == 0){
    locations.push(LatLong);
    map.setCenter(LatLong);
  } else {
    locations[0] = LatLong;
  }





  /*if (currentLocationMarker === undefined || getDistanceFromLatLonInKm(prevLocation.lat, prevLocation.lng ,LatLong.lat, LatLong.lng) >= 0.01){

    map.setCenter(LatLong);
    currentLocationMarker = new google.maps.Marker({
      position: LatLong,
      map: map
    });
    prevLocation = LatLong;
    console.log(LatLong);
    */
  $.getJSON( "//go.jaar.ga/api/addHistory.php", {
    user: 0,
    session: 'testing',
    lat: LatLong.lat,
    long: LatLong.lng
  }, function(data){
    
      $.getJSON( "//go.jaar.ga/api/getPlace.php", {
        lat: LatLong.lat,
        long: LatLong.lng
      }, function(data){
        if (!added){
          added = true;
          console.log(data);
          data.place.forEach(pushLoc);

          function pushLoc(item, index){
            if (item.photo != undefined)
             locations.push({lat: item.lat, lng: item.lng, info: '<img src="https://maps.googleapis.com/maps/api/place/photo?maxwidth=400&photoreference='+item.photo+'&key=AIzaSyD9BBloaNe4XsPOU6OCC4RtjpxeX8Bh-YU">'});
            else
             locations.push({lat: item.lat, lng: item.lng});

          }

          var infowindow = new google.maps.InfoWindow();
          var markers = locations.map(function(location, i) {
            if (i == 0){
              var marker = new google.maps.Marker({
                position: location,
                icon: 'img/self.png'
              })
            } else {
              var marker = new google.maps.Marker({
                position: location,
                icon: 'img/flag.png'
              });
            }


            marker.addListener('click', function() {
              infowindow.setContent(location.info);
              infowindow.open(map, marker);
            });
            return marker;
              });

        // Add a marker clusterer to manage the markers.
        var markerCluster = new MarkerClusterer(map, markers,
          {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }});
    

  });
}

$(document).ready(function(){
  /*
  var locations =




      locations.push({lat:22.2863307 , lng:114.1505035});

      for (i = 1; i <= 5; i++) {
        var photo_link = [<?php echo '"'.implode('","', $photo_link).'"' ?>];
        var latitude = [<?php echo '"'.implode('","', $lat).'"' ?>];
        var longitude = [<?php echo '"'.implode('","', $lng).'"' ?>];


      }
*/

  if (navigator.geolocation) {
    var refreshId = setInterval(function() {
      navigator.geolocation.getCurrentPosition(setPosition);
    }, 1000);
  } else {
      console.log("Geolocation is not supported by this browser.");
  }
});
