<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	
	$query = 'SELECT username FROM credentials;';
	$result = $conn->query($query);
	while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
	}

	echo json_encode($myArray);
	
?>

