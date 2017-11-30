<?php
	session_start();
	  $status = "Not logged in";
  	$visibility = "none";
    $usr = "";
  	if(isset($_SESSION['username'])) {
      $usr = $_SESSION['username'];
      $status = "Logged in as ".$_SESSION['username'];
      $visibility = "block";
  }
?>
	<style>
		/*.navbar
		{
			-ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
			filter: alpha(opacity=50);
			-moz-opacity: 0.50;
			-khtml-opacity: 0.5;
			opacity: 0.5;
			z-index: 1;
		}*/
		html {
			font: normal normal normal 16px/normal Helvetica, Arial, sans-serif;
		}
	.navbar-nav>li>a {
    color: white !important;
    text-decoration: none !important;
    font: normal normal normal 16px/normal Helvetica, Arial, sans-serif;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main1.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/main2.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/main3.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/main4.css" />
	<link rel="stylesheet" type="text/css" href="assets/css/main5.css" />
	<script type="text/javascript" src="assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main1.js"></script>
	<script src="assets/js/main2.js"></script>
	<script src="assets/js/main3.js"></script>
	<script src="assets/js/main4.js"></script>
	<script src="assets/js/main5.js"></script>
  <script type="text/javascript">
    function check()
    {
      var usr = '<?php echo $usr; ?>';
      if(usr == "" )
      {
        var a = document.getElementById("test");
        a.href = "login_register.php";
      }
      else
      {
        var a = document.getElementById("test");
        a.href = "home.php";
      }
    }

    function check2()
    {
      var usr = '<?php echo $usr; ?>';
      if(usr == "" )
      {
        var a = document.getElementById("test2");
        a.href = "login_register.php";
      }
      else
      {
        var a = document.getElementById("test2");
        a.href = "home.php";
      }
    }

    function check3()
    {
      var usr = '<?php echo $usr; ?>';
      if(usr == "" )
      {
        var a = document.getElementById("test3");
        a.href = "login_register.php";
      }
      else
      {
        var a = document.getElementById("test3");
        a.href = "users.php";
      }
    }

    function check4()
    {
      var usr = '<?php echo $usr; ?>';
      if(usr == "" )
      {
        var a = document.getElementById("test4");
        a.href = "login_register.php";
      }
      else
      {
        var a = document.getElementById("test4");
        a.href = "friends.php";
      }
    }

  </script>
  <script>
  function update_lastseen() {
    var usr = '<?php echo $usr; ?>';
    var xhr = new XMLHttpRequest();
    var url = "update_lastseen.php";
    var usr = '<?php echo $usr; ?>';
    var params = "username="+usr;
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          console.log(response);
        }
      }

  
    xhr.send(params);

  }

  
  function sendLocation() {
    // Try HTML5 geolocation.
    var usr = '<?php echo $usr; ?>';
      if(!(usr == "") )
      {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            //Update database with current location
            console.log(pos.lat + " " + pos.lng);
            locationUpdate(pos.lat, pos.lng);
            //-------------------------------------
          }, function() {
            console.log("location failed")
          });
          
        } 
        else {
          console.log("location failed")
        }
        update_lastseen();
      }
      setTimeout(sendLocation,1000*2);
  }

  function locationUpdate(lat, lng)
  {
    var xhr = new XMLHttpRequest();
    var url = "location_update.php";
    var usr = '<?php echo $usr; ?>';
    var params = "username="+usr+"&lat="+lat+"&lng="+lng;
    xhr.open("POST",url,true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
          var response = this.responseText;
          console.log(response);
        }
      }

  
    xhr.send(params);

  }

  
</script>
</head>
<body onload = "sendLocation()">
<!-- NAVBAR -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li id="index"><a href="index.php">Travel Companion</a></li>
          <li id="home"><a onclick="check2()" id="test2" href="">Home</a></li>
          <li id="Users"><a onclick="check3()" id="test3" href="">Users</a></li>
          <li id="friends"><a onclick="check4()" id="test4" href="">Friends</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a onclick="check()" id="test" href=""><span class="glyphicon glyphicon-user"></span> <?php echo $status?></a></li>
          <li style="display: <?php echo $visibility;?>;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
