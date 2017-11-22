<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	
	$query =  "INSERT INTO `friends_list`(`friend1`, `friend2`) VALUES (\"".$username."\", \"".$friendname."\")";
	//$query = 'INSERT INTO `friends_list(friend1, friend2)` VALUES ("'.$username.'","'.$friendname'")';
	
	$result = $conn->query($query);
	echo $query;

	//echo json_encode($myArray);
	
?>

