<?php
	session_start();
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);
	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);
	$password = sha1($_POST['password']);
	$query = 'SELECT * FROM credentials WHERE username = "'.$username.'" AND password = "'.$password.'";';
	$result = $conn->query($query);
	if($result->num_rows == 0){
		echo 'false';
	}
	else
	{
		$_SESSION['username'] = $_POST['username'];
		echo 'true';

	}
?>
