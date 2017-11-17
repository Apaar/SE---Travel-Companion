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
<html>
<head>
	<title>Homepage</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function check()
    {
      var usr = '<?php echo $usr; ?>';
      if(usr == "" )
      {
        window.alert("xyz");
        var a = document.getElementById("test");
        a.href = "login_register.php";
      }
      else
      {
        window.alert(usr);
        var a = document.getElementById("test");
        a.href = "home.php";
      }
    }
  </script>
</head>
<body>
<!-- NAVBAR -->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <p class="navbar-brand">Travel Companion</p>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li id="home"><a href="index.php">Home</a></li>
          <li id="Users"><a href="index.php">Users</a></li>
          <li id="friends"><a href="friends.php">Friends</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a onclick="check()" id="test" href=""><span class="glyphicon glyphicon-user"></span> <?php echo $status?></a></li>
          <li style="display: <?php echo $visibility;?>;"><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
</body>