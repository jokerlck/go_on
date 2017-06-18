
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <title>Geolocation API</title>
    <style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
      height: 50%;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script>
	   <?php
     if (!empty($_GET))
       { $key = "https://maps.googleapis.com/maps/api/place/textsearch/json?query=".'"$_SERVER['."'QUERY_STRING'".']"'."&key=AIzaSyD9BBloaNe4XsPOU6OCC4RtjpxeX8Bh-YU";
             $str = file_get_contents($key);
             echo "<script>alert($str);</script>";
             $str = json_decode($str, TRUE);
             $restaurant_list = array();
             for($i=0;$i<count($str["results"]);$i++){
               array_push($restaurant_list,$str["results"][$i]);
            }
        }
	  ?>
      <?php if(!empty($restaurant_list)){
        echo "fuck you";
        ?>
        map = new google.maps.Map(document.getElementById('map'),{
          zoom: 4,
          center: {lat:22.2,lng:144}
        });
        <?php
        for($i=0;$i<count($restaurant_list);$i++){
          ?>

          var marker = new google.maps.Marker({
            position: <?php echo $restaurant_list[$i]["geometry"] ?>,
            map: map,
            title: <?php echo $restaurant_list[$i]["name"] ?>
          });
          marker.setMap(map);
		<?php
        }
      }
    ?>

    </script>
  </head>
  <body>

    <div id="map"></div>

    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <form class="mylocation" action="" method="get">
      <input type="text" name="search" required>
    </form>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWvh3Z0y0BcWFV1FpEouLFOu3mfaFSyc&callback=initMap"
    async defer></script>
  </body>
</html>
