var x = document.getElementById("geoLocation");
var lat;
var long;
function getLocation(){
  if(navigator.geolocation){
    navigator.geolocation.getCurrentPosition(showPosition);
  }else{
    x.innerHTML = "geoLocation is not supported by this browser.";
  }
}
function showPosition(position){
  x.innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
  lat = position.coords.latitude;
  long = position.coords.longitude;
  getMap();
}

var map;
function getMap(){
  alert(lat);
  alert(long);
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(lat,long)
  };

  map = new google.maps.Map(document.getElementById('map'),mapOptions);
  var marker = new google.maps.Marker({
    position: new google.maps.LatLng(lat,long),
    map: map,
    title:"my location"
  });
}
