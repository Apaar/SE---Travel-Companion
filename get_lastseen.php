<?php
	extract($_POST);
	$server = 'localhost';
	$dbname = 'travel_companion';
	$conn = new mysqli($server, 'root', '', $dbname);

	if($conn -> connect_error) 
		die("Connection failed: " . $conn->connect_error);

	date_default_timezone_set('Asia/Calcutta'); 

	$curr_date = date("Y-m-d H:i:s");

	$query = 'SELECT last_seen FROM last_seen where username="'.$username.'";';

	$result = $conn->query($query);

	if($result->num_rows == 0) {
		echo 'friend offline';
	}
	else
	{	
		while($row = $result->fetch_array(MYSQLI_ASSOC)) {
            $date=$row["last_seen"];
		}
		$datetime1 = new DateTime($curr_date);
		$datetime2 = new DateTime($date);
		$interval = $datetime1->diff($datetime2);
		$min = $interval->format('%i');
		$sec = $interval->format('%s');
		$diff = ($min*60)+$sec;
		echo $diff;
		#echo $date;
	}

?>