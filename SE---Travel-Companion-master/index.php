<?php
	include_once('template.php');
?>
<!-- ADD INDEX PAGE UI STUFF HERE-->
<div style="float:left;" class ="col-md-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Friends</h3>
		</div>
		<ul class="list-group" id="friends_body"></ul>
	</div>
</div>
<script type="text/javascript">
	fetch_all_friends();
	function fetch_all_friends()
	{
		
		var xhr1 = new XMLHttpRequest();
		var url = "get_all_users.php";
		//var params = "username="+username;

		xhr1.open("POST",url,true);
		xhr1.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr1.send();
		xhr1.onreadystatechange = function() {
		if(this.readyState == 4 && this.status == 200) {
				if(this.responseText){
					var response = JSON.parse(this.responseText);
					var usr = '<?php echo $usr; ?>';
					response.forEach(function(friends){
						if(friends['username'] != usr ){
						var list_element = document.createElement('button');
							list_element.setAttribute('type','button');
							list_element.className = 'list-group-item list-group-item-action';
							list_element.innerHTML = friends['username'];
							list_element.value = friends['username'];
							list_element.setAttribute('onclick','button_clicked(this)')
							document.getElementById('friends_body').appendChild(list_element);
						}
					})
					
				}
			}
		}
		fetch_user_friends();
	}

	function fetch_user_friends() {
		var xhr = new XMLHttpRequest();
		var url = "friends_list.php";
		var username = '<?php echo $usr; ?>';
		var params = "username="+username;

		xhr.open("POST",url,true);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xhr.send(params)
		xhr.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				if(this.responseText){
					//alert("friends")
					var response = JSON.parse(this.responseText);
					
					response.forEach(function(friends){
						friends_box = document.getElementById('friends_body').getElementsByTagName('button');
						for(i=0;i<friends_box.length;i++){
							var current_button = friends_box[i];
							
							if(current_button.innerHTML == friends['friend2']){
								console.log(current_button.innerHTML);
								current_button.className = 'list-group-item disabled list-group-item-success';
								current_button.style.bgColor = 'blue'
							}
						}

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
	}

	function button_clicked(name) {
		xhr = new XMLHttpRequest();
		var usr = '<?php echo $usr; ?>';
   		var url = "add_friend.php";
   		var params = "username="+usr+"&"+"friendname="+name.value;
   		xhr.open("POST",url,true);
   		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   		xhr.send(params);
   		xhr.onreadystatechange = function() {
			if(this.readyState == 4 && this.status == 200) {
				alert(this.responseText);
				alert("friend added");
			}
		}
		name.className = 'list-group-item list-group-item-action disabled'
	}
	
</script>
</body>
</html>

