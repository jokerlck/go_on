<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Map</title>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
    <div id="map"></div>

    <?php
    	$botToken = "AIzaSyD9BBloaNe4XsPOU6OCC4RtjpxeX8Bh-YU";
    	function url_get_contents($Url){
			if(!function_exists('curl_init')){
				die('CURL is not installed!');
			}	
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $Url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			$output = curl_exec($ch);
			curl_close($ch);
			return $output;
		}  


		$str = url_get_contents("https://maps.googleapis.com/maps/api/place/nearbysearch/json?type=bus_station&location=22.2863307,114.1505035&radius=1000&key=".$botToken);
		$str = json_decode($str, TRUE);
		$place_list = array();
    $lat = array();
    $lng = array();
    $name = array();
    $photo_link = array();
    for($i=0;$i<count($str["results"]);$i++){
       array_push($place_list,$str["results"][$i]);
    }

    for($i=0;$i<count($place_list);$i++){
      array_push($name,$place_list[$i]["name"]);
      array_push($lat,$place_list[$i]["geometry"]["location"]["lat"]);
      array_push($lng,$place_list[$i]["geometry"]["location"]["lng"]);
      $photo = $place_list[$i]["photos"][0]["photo_reference"];
      array_push($photo_link,"https://maps.googleapis.com/maps/api/place/photo?maxwidth=200&photoreference=".$photo."&key=".$botToken);
    }
    ?>

    <script>

      var locations = new Array();
      locations.push({lat:22.2863307 , lng:114.1505035});

      for (i = 1; i <= 5; i++) { 
        var photo_link = [<?php echo '"'.implode('","', $photo_link).'"' ?>];
        var latitude = [<?php echo '"'.implode('","', $lat).'"' ?>];
        var longitude = [<?php echo '"'.implode('","', $lng).'"' ?>];

        locations.push({lat: parseFloat(latitude[i]), lng: parseFloat(longitude[i]), info: '<img src="'+photo_link[i]+'">'});
      }
      //*********



      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
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

        var infowindow = new google.maps.InfoWindow();

        // Add some markers to the map.
        // Note: The code uses the JavaScript Array.prototype.map() method to
        // create an array of markers based on a given "locations" array.
        // The map() method here has nothing to do with the Google Maps API.

        var markers = locations.map(function(location, i) {
          if(i==0){
            var marker = new google.maps.Marker({
            position: location,
            icon: 'img/self.png',
            draggable: true
            })
          }else{
            var marker = new google.maps.Marker({
            position: location,
            icon: 'img/flag.png'
            });
          }


          marker.addListener('click', function() {
            
            if(i==0){
              window.alert("成功到達一個檢查點！獲得100分!");
            }else{
              infowindow.setContent(location.info);
              infowindow.open(map, marker);
            }
          });

          return marker;
        });


      // Add a marker clusterer to manage the markers.
      var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }

    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWvh3Z0y0BcWFV1FpEouLFOu3mfaFSyc&callback=initMap">
    </script>
  </body>
</html>