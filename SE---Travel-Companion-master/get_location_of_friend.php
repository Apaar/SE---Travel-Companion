<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	
	$query = 'SELECT * FROM location WHERE username = "'.$username.'" ;';
	$result = $conn->query($query);
	$res = $result->fetch_assoc();
	//$location->lat=$res->lat;
	//$location->lng=$res->lng;
	echo json_encode($res);
	
?>

