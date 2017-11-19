<?php
	include_once('template.php');
?>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script type="text/javascript">
		function getFrnds()
		{
			
			var username = '<?php echo $usr; ?>';
			if(username == "")
			{
				alert("Not Logged in");
				window.location = "login_register.php";
			}
			else
			{
				var xhr = new XMLHttpRequest();
				var url = "friends_list.php";
				var params = "username="+username;

				xhr.open("POST",url,true);
				xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

				xhr.onreadystatechange = function() {
					if(this.readyState == 4 && this.status == 200) {
						if(this.responseText){
							//alert("friends")
							var response = JSON.parse(this.responseText);
							var friends_box = document.createElement('ul');
							friends_box.className = 'list-group'
							response.forEach(function(friends){
								var list_element = document.createElement('li');
								list_element.className = 'list-group-item';
								list_element.innerHTML = friends['friend2']
								friends_box.appendChild(list_element)
							})
							document.getElementById('friends_body').appendChild(friends_box);
						}
						else {
							var list_element = document.createElement('li');
							list_element.className = 'list-group-item';
							list_element.innerHTML = "You have no friends :(";
							friends_box.appendChild(list_element);
							document.getElementById('friends_body').appendChild(friends_box);
							//alert("friends list empty")
						}
					}
				}

				xhr.send(params);
			}
		}
	</script>
</head>
<body id='friends_body' onload="getFrnds()">
</body>
</html>