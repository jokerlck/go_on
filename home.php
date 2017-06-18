<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<head>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/side_bar.css">
		<link rel="stylesheet" href="css/pop_up.css">
		<link rel="stylesheet" href="css/map.css">
		<link href="//fonts.googleapis.com/earlyaccess/notosanstc.css" rel="stylesheet">
		<script data-require="angular.js@*" data-semver="1.3.6" src="https://code.angularjs.org/1.3.6/angular.js"></script>
	</head>

	<body>
    <div class="container-fluid" ng-app="" style="height:100%; padding:0px; margin: 0px;">
		<!--small side bar-->
    <div id="smallSidenav" class="col-xs-1 sidenav">
      <div id="smallSidenavRow-1"><span onclick="openNav()" class="glyphicon glyphicon-cog" aria-hidden="true"></span></div><br>
      <div id="smallSidenavRow-2"><span onclick="openStartNav()" class="glyphicon glyphicon-map-marker" aria-hidden="true"></span></div>
    </div>

		<!--setting side bar-->
    <div class="col-xs-4">
      <div id="mySidenav" class="sidenav center-block">
	        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
	        <img src="img/profile.jpg" alt="" class="img-circle" style="height: 5em;width: 5em; margin: auto;">
	        <h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">Sunny Shum</h5><hr style="width: 80%">
	        <h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">分數: 300</h5>
					<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">步行距離: 30km</h5><hr style="width: 80%">
	        <h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">道具:</h5>
				<table align="center">
	         <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">經驗藥水</h5></th>
						 <th></th>
	           <th><img src="img/exp_bottle.png" style="height: 2em;width: 2em; margin: auto;"></th>
						 <th></th>
	           <th><h5 style="color:#fff;">x2</h5></th>
	         </tr>
	         <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">移形換影</h5></th>
						 <th>&nbsp&nbsp&nbsp</th>
	           <th><img src="img/flag.png" style="height: 2em;width: 2em; margin: auto;"></th>
						 <th>&nbsp&nbsp&nbsp</th>
	           <th><h5 style="color:#fff;">x2</h5></th>
	         </tr>
					 <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">分數無效</h5></th>
						 <th></th>
	           <th><img src="img/cross.png" style="height: 1.7em;width: 1.7em; margin: auto;"></th>
						 <th></th>
	           <th><h5 style="color:#fff;">x2</h5></th>
	         </tr>
	       </table><hr style="width: 80%">
				 <button type="button" id="change_btn" class="btn btn-default" style="border-radius: 0; background: none;width:80%;color:#fff; font-family:'Noto Sans TC', sans-serif;">兌換</button><hr style="width: 80%">
					 <button type="button" id="buy_btn" class="btn btn-default" style="border-radius: 0; background: none;width:80%;color:#fff; font-family:'Noto Sans TC', sans-serif;">購買</button><hr style="width: 80%"><br>
      </div>
    </div>

		<!--start game side bar-->
    <div class="col-xs-4">
      <div id="startGame" class="sidenav center-block">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">設定路線</h5><hr style="width: 80%">
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">起點:</h5>
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">FWD Financial Centre, Sheung Wan</h5><hr style="width: 80%">
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">終點:</h5>
				<div class="input-group center-block" style="width:80%" >
  				<input type="text" class="form-control" placeholder="地址" aria-describedby="basic-addon2"style="border-radius: 0;">
  				<button type="button" class="btn btn-default" style="border-radius: 0; background:#fff;"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
				</div><hr style="width: 80%">
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">檢查站:5</h5><hr style="width: 80%">
				<button onclick="currentNav()" type="button" id="start_btn" class="btn btn-default" style="border-radius: 0; background: none;width:80%; font-family:'Noto Sans TC', sans-serif; color:white;">開始</button>
      </div>
    </div>
		<!--start game side bar-->
		<div class="col-xs-4">
			<div id="currentGame" class="sidenav center-block">
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">終點:</h5>
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">香港中文大學</h5><hr style="width: 80%">
				<h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">時間:</h5>
				<span style="color:#fff"><label id ="hours" >00</label>:<label id="minutes">00</label>:<label id="seconds">00</label></span><hr style="width: 80%">
				<table align="center">
	         <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">經驗藥水</h5></th>
						 <th></th>
	           <th><img src="img/exp_bottle.png" style="height: 2em;width: 2em; margin: auto;"></th>
						 <th></th>
	           <th><button type="button" id="start_btn" class="btn btn-default" style="border-radius: 0; background: none;width:100%; font-family:'Noto Sans TC', sans-serif; color:white;">使用</button></th>
	         </tr>
	         <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">移形換影</h5></th>
						 <th>&nbsp&nbsp&nbsp</th>
	           <th><img src="img/flag.png" style="height: 2em;width: 2em; margin: auto;"></th>
						 <th>&nbsp&nbsp&nbsp</th>
						 <th><button type="button" id="start_btn" class="btn btn-default" style="border-radius: 0; background: none;width:100%; font-family:'Noto Sans TC', sans-serif; color:white;">使用</button></th>
	         </tr>
					 <tr>
						 <th><h5 style="color:#fff; font-family:'Noto Sans TC', sans-serif;">分數無效</h5></th>
						 <th></th>
	           <th><img src="img/cross.png" style="height: 1.7em;width: 1.7em; margin: auto;"></th>
						 <th></th>
						 <th><button type="button" id="start_btn" class="btn btn-default" style="border-radius: 0; background: none;width:100%; font-family:'Noto Sans TC', sans-serif; color:white;">使用</button></th>
	         </tr>
	       </table><hr style="width: 80%">
			</div>
		</div>

		<!--main-->
		<div id="map"></div>
		<!--change item pop up-->
		<div id="changeItem" class="modal">
  		<div class="modal-content">
    		<span id="changeClose" class="close">&times;</span>
				<table align="center">
    			<tr>
						<th><img src="img/coupon.png" style="height: 4em;width: 7em; margin: auto;"></th>
    			</tr>
					<tr>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;">超市優惠劵</h5></th>
					</tr>
					<tr>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="coupon">{{100*coupon.quan}}分</h5></th>
					</tr>
					<tr>
						<th><input type="number" id="coupon_quantity" pattern="[0-9]*" value="1" style="width:50%;"ng-model="coupon.quan"></th>
					</tr>
    		</table>
				<br><br>
				<button type="button" id="change_btn" class="btn btn-default" style="border-radius: 0; background: none;width:80%;color:#000; font-family:'Noto Sans TC', sans-serif;">購買</button>
  		</div>
		</div>

		<!--buy item pop up-->
		<div id="buyItem" class="modal">
  		<div class="modal-content">
    		<span id="buyClose" class="close">&times;</span>
				<table align="center">
    			<tr>
						<th><img src="img/exp_bottle.png" style="height: 5em;width: 5em; margin: auto;"></th>
						<th>&nbsp&nbsp&nbsp</th>
    				<th><img src="img/flag.png" style="height: 5em;width: 5em; margin: auto;"></th>
						<th>&nbsp&nbsp&nbsp</th>
						<th><img src="img/cross.png" style="height: 4em;width: 4em; margin: auto;"></th>
    			</tr>
					<tr>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;">經驗藥水</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;">移形換影</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;">分數無效</h5></th>
					</tr>
					<tr>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="exp">{{100*exp.quan}}分</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="flag">{{50*flag.quan}}分</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="cross">{{100*cross.quan}}分</h5></th>
					</tr>
					<tr>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="exp">HK${{5*exp.quan}}</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="flag">HK${{2.5*flag.quan}}</h5></th>
						<th></th>
						<th><h5 style="color:#000; font-family:'Noto Sans TC', sans-serif;"><input type="radio" name="cross">HK${{5*cross.quan}}</h5></th>
					</tr>
					<tr>
						<th><input type="number" id="exp_quantity" pattern="[0-9]*"style="width:50%;"ng-model="exp.quan"></th>
						<th></th>
						<th><input type="number" id="flag_quantity" pattern="[0-9]*"style="width:50%;"ng-model="flag.quan"></th>
						<th></th>
						<th><input type="number" id="cross_quantity" pattern="[0-9]*"style="width:50%;"ng-model="cross.quan"></th>
					</tr>
    		</table>
				<br><br>
				<button type="button" id="change_btn" class="btn btn-default" style="border-radius: 0; background: none;width:80%;color:#000; font-family:'Noto Sans TC', sans-serif;">購買</button>
  		</div>
		</div>


    </div>

		<script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="js/side_bar.js"></script>
		<script src="js/pop_up.js"></script>
		<script src="js/map.js"></script>
		<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
	    <script async defer
	    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIWvh3Z0y0BcWFV1FpEouLFOu3mfaFSyc&callback=initMap"></script>


	</body>
</html>
