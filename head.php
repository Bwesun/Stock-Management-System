<?php
include('connect.php');

session_start();




?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<script type="text/javascript" language="javascript" src="tooltip.js"></script>
	<script type="text/javascript" language="javascript" src="popover.js"></script>
	<script type="text/javascript" language="javascript" src="alert.js"></script>
	<script type="text/javascript" language="javascript" src="collapse.js"></script>
	<script type="text/javascript" language="javascript" src="carousel.js"></script>
	<style type="text/css">
		body{
		}
		.nav-tabs{
			background-color: #FFFF99;
			margin-top: 1%;
			border: 1px solid #FFFF66;
		}
		#content{
			border-radius: 6px;
		}
		#profile{
			position: fixed;
			top: 20px;
			left: 82%;
			width: 60%
		}
		#wrapper{
			background-color: #FFFFCC;
		}
		#nav:hover{
			background-color: green;
			color: white;
		}
	</style>
</head>

<body>
<div id="wrapper">
	<div style="padding: 10px 0px 0px 10px;">
		<h2 class=""><a href="index.php"><div align=""><img src="log.jpg" width="100" class="img-circle img-thumbnail"> <font color="grey">MUB Pharmaceuticals: <small>Stock Management System</small> </font></div></a></h2>
	</div>
		<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse"
		data-target="#example-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class="collapse navbar-collapse" id="example-navbar-collapse">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Home  <span class="fas fa-home"></span></a></li>
			<li><a href="stocks.php">Stocks  <i class="fas fa-address-card"></i></a></li>
			<li><a href="invoices.php">Invoices  <i class="fas fa-book"></i></a></li>
			<li><a href="reports.php">Reports  <i class="fas fa-list"></i></a></li>
			<li><a href="users.php">Users  <i class="fas fa-users"></i></a></li>
			<li><a href="employees.php">Employees  <i class="fas fa-users-cog"></i></a></li>
			<li><a href="notification.php">Notifications   <span class="fas fa-bullhorn"></span> </a></li>
			<li><a href="logout.php">Log Out  <span class="glyphicon glyphicon-log-out"></span></a></li>
			<li><a><i class="fas fa-user-circle"></i> <b><?php echo $_SESSION['username'];   ?></b></a></li>
			
		</ul>
	</div>
</nav>
				
				
				
		</div>

		

		