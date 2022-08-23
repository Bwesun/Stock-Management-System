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
$employee_id=$_GET['id'];

$sql="SELECT * FROM stocks WHERE id='$employee_id'";
$result=mysql_query($sql);
$rows=mysql_fetch_assoc($result);


if(isset($_POST['quant_sub'])){

    include('connect.php');

    $stock_id=$_POST['stock_id'];//Date of Payment
    $stock_quant=$_POST['stock_quant'];

    $sql3="SELECT * FROM stocks WHERE id='$stock_id'  ";
    $result3=mysql_query($sql3);

    $rw=mysql_fetch_assoc($result3);

    $stock_quantity=$rw['quantity'];
    $new_quantity=$stock_quant+$stock_quantity;

    $sql2="UPDATE stocks SET quantity='$new_quantity' WHERE id='$stock_id' ";
    $result2=mysql_query($sql2); 

        if($result2){
                echo "<script>
            alert('Stock Quantity Added Successfully!');
            window.open('stocks.php', '_self');
            </script>
                    ";
            }else{
                echo "<script>
            alert('Transaction Unsuccessful!');
            window.open('stocks.php', '_self');
            </script>
                    ";//echo mysql_error()."------".$sql;
            }
    }
?>
?>
<div style="background-color: white;">
	<fieldset>
		<legend><h2><?php echo $rows['name'];  ?> </h2> </legend>
<div style="padding-left: 10px;">


		<table class="table table-striped table-condensed">
			<tr>
				<th>Name</th>
				<td><?php echo $rows['name'];  ?></td>
			</tr>
			<tr>
				<th>Price</th>
				<td>&#x20a6 <?php echo number_format($rows['price']);  ?></td>
			</tr>
			<tr>
				<th>Available Quantity</th>
				<td><?php echo $rows['quantity'];  ?></td>
			</tr>
			<tr>
				<th>Quantity Sold</th>
				<td><?php echo $rows['quantity_sold'];  ?></td>
			</tr>
			<tr>
				<th>Availability Status</th>
				<td><?php echo $rows['status'];  ?></td>
			</tr>
			<tr>
				<th>Add Stock Quantity</th>
				<td><form method="post">
						<input type="hidden" name="stock_id" value="<?php echo $rows['id'];  ?>">
						<input type="text" name="stock_quant" class="" width="200">
						<input type="submit" name="quant_sub" value="Add Quantity" class="btn btn-success btn-sm">
					</form></td>
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