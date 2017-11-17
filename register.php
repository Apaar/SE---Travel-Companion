<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	#echo "Connected successfully";
	$password = sha1($_POST['password']);
	$query = 'SELECT * FROM credentials WHERE username = "'.$username.'";';
	$result = $conn->query($query);
	if($result->num_rows == 0){
		$query = 'INSERT INTO credentials(username, password, first_name, last_name, email) VALUES ("'.$username.'","'.$password.'","'.$firstname.'","'.$lastname.'","'.$email.'")';
		$result = $conn->query($query);
		if(!$result)
		{
			echo 'false';
		}
		else
		{
			$_SESSION['username'] = $_POST['username'];
			echo 'true';
		}
	}
	else
	{
		echo 'false';
	}
	
	
?>