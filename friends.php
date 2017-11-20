<?php
	include_once('template.php');
?>
	<div class ="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Friends</h3>
			</div>
			<ul class="list-group" id="friends_body"></ul>
		</div>
	</div>
	
	<script type="text/javascript">
		window.onload = getFrnds;
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
							
							response.forEach(function(friends){
								var list_element = document.createElement('button');
								list_element.setAttribute('type','button');
								list_element.className = 'list-group-item list-group-item-action';
								list_element.innerHTML = friends['friend2'];
								list_element.value = friends['friend2'];
								list_element.setAttribute('onclick','button_clicked(this)')
								document.getElementById('friends_body').appendChild(list_element);
							})
							
						}
						else {
							var list_element = document.createElement('li');
							list_element.className = 'list-group-item';
							list_element.innerHTML = "You have no friends :(";
							document.getElementById('friends_body').appendChild(list_element);
							//alert("friends list empty")
						}
					}
				}

				xhr.send(params);
			}
		}
		function button_clicked(name){
			console.log("button_click "+name.value)
		}
	</script>
</body>
</html>