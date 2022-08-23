<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");
}
?>
<head>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<style type="text/css">
		body{
background: rgba(210,231,239,1);
background: -moz-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(210,231,239,1)), color-stop(50%, rgba(78,185,212,1)), color-stop(100%, rgba(218,235,241,1)));
background: -webkit-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -o-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -ms-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: linear-gradient(to right, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2e7ef', endColorstr='#daebf1', GradientType=1 );

		}
		.col-md-9{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
padding-bottom: 20px;
		}
	td>button{
		width: 90px;
		height: 90px;
		font-size: 4em;
		font-weight: bolder;
	}

	a:hover{
		background-color: blue;
	}
	</style>
</head>

<body>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<?php
		include('head.php');

		
		?>
		

<div style="background-color: white;">
	<fieldset>
		<legend><h3>REPORTS</h3></legend>

		
<?php
$sql="SELECT * FROM stocks ";
$result=mysql_query($sql);
$i=1;

while($rows=mysql_fetch_assoc($result)){
	$stock_name=$rows['name'];
	$stock_quantity_sold=$rows['quantity_sold'];
	$stock_quantity=$rows['quantity'];

	$total_quantity=$stock_quantity+$stock_quantity_sold;
	$per_available=($stock_quantity/$total_quantity)*100;
	$per_sold=100-$per_available;
	//echo "Sold: ".$per_sold;
	//echo "Avail: ".$per_available;
?>


<div style="padding-left: 10px; padding-right: 10px;"><h3><?php echo $rows['name']; ?></h3>
 <div class="progress">
  <div class="progress-bar progress-bar-success" role="progressbar" style="width:<?php echo $per_available; ?>%">
    <b><?php echo $stock_quantity; ?> Available</b>
  </div>
  <div class="progress-bar progress-bar-danger" role="progressbar" style="width:<?php echo $per_sold; ?>%">
    <b><?php echo $stock_quantity_sold; ?> Sold</b>
  </div>
</div> 
<b>Quantity Available: <?php echo $stock_quantity; ?> </b><br>
<b>Quantity Sold: <?php echo $stock_quantity_sold; ?></b>
</div> <hr>

<?php
}
?>

	</fieldset>
</div>

	</div>
</div>
<?php
if (empty($turn)){
	echo " ";
}else{
	echo $turn;
}
?>

</body>