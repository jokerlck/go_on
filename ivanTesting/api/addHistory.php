<?php
	require('../include/connect.inc.php');
	header('Content-Type: application/json; charset=utf-8');
	//$json = json_decode('{"user":0, "lat":23.0, "long": 114.0}');
	$stmt = $db->prepare("INSERT INTO public.history (user_id, lat, long) VALUES (?, ?, ?)");

	$stmt->bindValue(1, $_GET['user']);
	$stmt->bindValue(2, $_GET['lat']);
	$stmt->bindValue(3, $_GET['long']);
	$stmt->execute();
	$result['success'] = true;
	echo json_encode($result);
