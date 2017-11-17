<?php
	include_once('template.php');
?>
<head>
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
						alert("friends")
						var response = this.responseText;
						console.log(response);
					}
				}

				xhr.send(params);
			}
		}
	</script>
</head>
<body onload="getFrnds()">

</body>
</html>