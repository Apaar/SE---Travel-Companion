<?php
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);

	$query = 'SELECT * FROM location WHERE username = "'.$username.'";';
	$result = $conn->query($query);
	if($result->num_rows == 0)
	{
		$query = 'INSERT INTO location (username, lat, lng) VALUES ("'.$username.'","'.$lat.'","'.$lng.'")';
		$result = $conn->query($query);

		if(!$result)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
	}
	else
	{
		$query = 'UPDATE location SET lat="'.$lat.'", lng="'.$lng.'" WHERE username="'.$username.'"';
		$result = $conn->query($query);

		if(!$result)
		{
			echo 'false';
		}
		else
		{
			echo 'true';
		}
	}
?>