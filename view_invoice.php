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
		
<?php
include('connect.php');
$invoice_id=$_GET['id'];

$sql="SELECT * FROM invoices WHERE id='$invoice_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);
?>
<div style="background-color: white;">
	<fieldset>
		<legend><h2>Invoice #<?php echo $rows['invoice_no'];  ?> </h2> </legend>
<div style="padding-left: 10px;">


		<table class="table table-striped table-condensed">
			<tr>
				<th>Customer's Name</th>
				<td><?php echo $rows['customer_name'];  ?></td>
			</tr>
			<tr>
				<th>Customer's Phone Number</th>
				<td><?php echo $rows['customer_phone'];  ?></td>
			</tr>
			<tr>
				<th>Item</th>
				<td><?php echo $rows['product_name'];  ?></td>
			</tr>
			<tr>
				<th>Invoice No.</th>
				<td>#<?php echo $rows['invoice_no'];  ?></td>
			</tr>
			<tr>
				<th>Price</th>
				<td>&#x20a6 <?php echo number_format($rows['price']);  ?></td>
			</tr>
			<tr>
				<th>Quantity</th>
				<td><?php echo $rows['quantity'];  ?></td>
			</tr>
			<tr>
				<th>Total Price</th>
				<td>&#x20a6 <?php echo number_format($rows['total_price']);  ?></td>
			</tr>
			
			<tr>
				<th>Posted By</th>
				<td><?php echo $rows['posted_by'];  ?></td>
			</tr>
			<tr>
				<th>Customer's Address</th>
				<td><?php echo $rows['address'];  ?></td>
			</tr>
<?php
mysql_close();
?>
		</table>
	</fieldset>
</div>

	</div>
</div>

</body>