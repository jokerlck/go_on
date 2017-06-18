var start = false;
/* Set the width of the side navigation to 250px and the left margin of the page content to 250px */
function openNav() {
  closeNav();
  document.getElementById("mySidenav").style.width = "15em";
  document.getElementById("smallSidenav").style.marginLeft = "15em";
  document.getElementById("map").style.marginLeft = "16em";
}

function openStartNav() {
  closeNav();
  if(start == true){
    currentNav();
  }
  else{
    document.getElementById("startGame").style.width = "15em";
    document.getElementById("smallSidenav").style.marginLeft = "15em";
    document.getElementById("map").style.marginLeft = "16em";
  }
}

/* Set the width of the side navigation to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("startGame").style.width = "0";
  document.getElementById("currentGame").style.width = "0";
  document.getElementById("smallSidenav").style.marginLeft = "0";
  document.getElementById("map").style.marginLeft = "0";
}

/* switch current game side bar*/
function currentNav(){
  start = true;
  setInterval(setTime, 1000);
  closeNav();
  document.getElementById("currentGame").style.width = "15em";
  document.getElementById("smallSidenav").style.marginLeft = "15em";
  document.getElementById("map").style.marginLeft = "16em";
}

var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;

function setTime(){
  ++totalSeconds;
  secondsLabel.innerHTML = pad(totalSeconds%60);
  minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
}

function pad(val){
  var valString = val + "";
  if(valString.length < 2){
    return "0" + valString;
  }
  else{
    return valString;
  }
}
