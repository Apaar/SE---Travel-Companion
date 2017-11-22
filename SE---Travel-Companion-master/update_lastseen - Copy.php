<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	date_default_timezone_set('Asia/Calcutta'); 

	$date1 = date("Y-m-d H:i:s"); 
	$query = 'SELECT * FROM last_seen where username="'.$username.'";';
	$result = $conn->query($query);
	if($result->num_rows == 0){
		$query =  "INSERT INTO `last_seen`(`username`, `last_seen`) VALUES (\"".$username."\", \"".$date1."\")";
		$result = $conn->query($query);
	}
	else
	{
		$query =  "UPDATE `last_seen` SET `username`=\'$username\',`last_seen`=\'$date1\'";
		$result = $conn->query($query);
	}
	echo json_encode($query);
	
?>

