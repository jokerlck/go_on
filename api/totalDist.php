<?php
	require("../include/connect.inc.php");
	header('Content-Type: application/json; charset=utf-8');
	$output['success'] = false;

	if (isset($_GET['user'])){

		$stmt = $db->prepare('SELECT "session_id", ST_Length(ST_MakeLine(coord)) FROM "history" WHERE user_id=? GROUP BY "session_id"');

		$stmt->bindValue(1, $_GET['user']);
		$stmt->execute();

		$result = $stmt->fetchAll();
		$sum = 0;
		for ($i=0; $i < count($result); $i++) { 
			$sum += $result[$i][1];
		}
		$output['success'] = true;
		$output['distance'] = $sum;

	}
	echo json_encode($output);