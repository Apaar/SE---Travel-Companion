<?php
	
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);

	$query = 'SELECT * FROM friends_list WHERE friend1 = "'.$username.'";';
	$result = $conn->query($query);
	if($result->num_rows == 0){
		echo 'false';
	}
	else
	{
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $myArray[] = $row;
	}

		echo json_encode($myArray);
	}
	$conn->close();
?>