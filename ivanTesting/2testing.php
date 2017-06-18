<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>my location</title>
    <style>

    #map {
      height: 100%;
    }
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
    }
    </style>


  </head>
  <body>
    <center>
      <p>Map Page</p>
    </center>
    <div id="map"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="gl.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWvh3Z0y0BcWFV1FpEouLFOu3mfaFSyc&callback=getMap"
    async defer></script>
    <?php
    $str = file_get_contents("https://maps.googleapis.com/maps/api/place/textsearch/json?query=asd&key=AIzaSyD9BBloaNe4XsPOU6OCC4RtjpxeX8Bh-YU");
    $str = json_decode($str, TRUE);
    $restaurant_list = array();
    for($i=0;$i<count($str["results"]);$i++){
    	array_push($restaurant_list,$str["results"][$i]);
    }

    for($i=0;$i<count($restaurant_list);$i++){
    	echo $restaurant_list[$i]["name"]."<br>";
    	echo $restaurant_list[$i]["geometry"]["location"]["lat"]."<br>";
      echo $restaurant_list[$i]["geometry"]["location"]["lng"]."<br>";
    }
    ?>
  </body>
</html>
