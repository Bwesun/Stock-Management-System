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
		

<div style="background-color: white; padding: 10px;" >
	<fieldset>
		<legend>NOTIFICATIONS</legend>
		<table class="table table-striped table-condensed">
<?php
$sql2="SELECT * FROM invoices WHERE status='unchecked' ORDER BY id DESC ";
$result2=mysql_query($sql2);
$i=1;
while($row=mysql_fetch_assoc($result2)){
	?>
			<tr>

				<td><a style="padding: 10px;" href="view_invoice.php?id=<?php echo $row['id'];  ?>"><?php echo $i++;  ?> - <?php echo 'Item Purchase by '.$row['customer_name'].' on '.$row['trans_date'];  ?></a></td>
			</tr>
<?php
}
?>
		</table>
	</fieldset>
	<fieldset>
		<legend><h4>Products Shortage Report</h4></legend>

<?php
$sql="SELECT * FROM stocks WHERE quantity <=2";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$i=1;

if($count>=1){
while($rows=mysql_fetch_assoc($result)){
$stock_quantity=$rows['quantity'];

?>
<table class="table table-striped">
			<tr>
				<th>S/N</th>
				<th>Stock/Product</th>
				<th>Description</th>
				<th></th>
			</tr>
			<tr>
				<td><?php echo $i++;  ?></td>
				<td><?php echo $rows['name'];  ?></td>
				<td>Low Stock quantity/Out of Stock</td>
				<td><a class="btn btn-warning" href="view_stock.php?id=<?php echo $rows['id'];  ?>">View</a></td>
			</tr>
<?php 
}

}else{
	echo " No Product Shortage!";
}

?>
		</table>
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
<script type="text/javascript">
	$(document).ready(function(){

		fetch_user();

		setInterval(function(){
			fetch_user();
		}, 3000);

	function fetch_user()
	{
		$.ajax({
			url:"board.php",
			method:"POST",
			success:function(data){
				$('#user_details').html(data);
			}
		})
	}

	});

</script>
</body>