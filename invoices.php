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
		<legend><h3>INVOICES</h3></legend>
<div style="padding-left: 10px;">
	<?php
if(isset($_POST['sub'])){

    include('connect.php');
	

    $product_name=$_POST['product_name'];
    $quantity=$_POST['quantity'];
    $customer_name=$_POST['customer_name'];
    $customer_phone=$_POST['customer_phone'];
    $address=$_POST['address'];
    
    $sql3="SELECT * FROM stocks WHERE name='$product_name' ";
    $result3=mysql_query($sql3);
    $row=mysql_fetch_assoc($result3);

    $stock_id=$row['id'];
    $current_quantity=$row['quantity'];
    $current_quantity_sold=$row['quantity_sold'];


    
    $price=$row['price'];
    $pass=mt_rand();
	$invoice_no=substr($pass, 1, 5);
    $total_price=$price*$quantity;
    $posted_by=$_SESSION['username'];
    $trans_date=date("d-m-y");
    $new_quantity=$current_quantity-$quantity;
    $new_quantity_sold=$current_quantity_sold+$quantity;
    
    if($quantity>$current_quantity){
    	echo "<script>
            alert('Invalid Quantity! Available Quantity not reached. Avalable Quantity: ".$current_quantity.".');
            window.open('invoices.php', '_self');
            </script>
                    ";
    }else{

    $sql="INSERT INTO invoices(product_name, quantity, price, customer_name, customer_phone, address, invoice_no, total_price, posted_by, trans_date)VALUES('$product_name', '$quantity', '$price','$customer_name','$customer_phone','$address','$invoice_no','$total_price','$posted_by','$trans_date'); ";
    $result=mysql_query($sql);
    //echo "price".$price;

        if($result){
        	 $sql4="UPDATE stocks SET quantity='$new_quantity', quantity_sold='$new_quantity_sold' WHERE id='$stock_id' ";
    		$result4=mysql_query($sql4);

    		//echo $sql5;
            echo "<script>
            alert('Invoice Added Successfully!');
            window.open('invoices.php', '_self');
            </script>
                  ";
            }else{
                echo "<script>
            alert('Transaction Unsuccessful!');
            window.open('invoices.php', '_self');
            </script>
                    "; //echo mysql_error()."------".$sql;
            }
    }
}
    


?>
<!-- Add Accoun-->
<br><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fas fa-plus-circle"></span> Add Invoice
</button> <a href="search_invoice.php" class="btn btn-warning"><span class="fas fa-search"></span> Search Invoice</a>
<hr>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="  -
myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">

<!-- Header-->
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">
<span aria-hidden="true">&times;</span>
<span class="sr-only">Close</span>
</button>
<h4 class="modal-title" id="myModalLabel">Add Invoice</h4>
</div>
<!-- Body -->
<div class="modal-body">
                        <form class="form-group" method="post">
                            <table class="table">
                                <tr>
                                	<td><input type="text" name="customer_name" class="form-control" required placeholder="Customer Name"></td>
                                	<td><input type="text" name="customer_phone" class="form-control" required placeholder="Customer Phone Number"></td>
                                </tr>
                                <tr>
                                	<td>
                                		<select name="product_name" class="form-control" required>
                                			<option value="">---- Select Stock ----</option>
                                			<?php
                                				$sql2="SELECT * FROM stocks ";
                                				$result2=mysql_query($sql2);

                                				while($row=mysql_fetch_assoc($result2)){ 
                                			?>
                                			<option value="<?php echo $row['name'];   ?>"><?php echo $row['name'];   ?></option>
                                			<?php
                                				}
                                			?>
                                		</select>
                                	</td>
                                	<td><input type="number" class="form-control" name="quantity" required placeholder="Stock Quantity"></td>
                                </tr>
                                <tr>
                                	<td colspan="2"><textarea placeholder="Address" class="form-control" name="address"></textarea></td>
                                </tr>
                            </table>
                        
                        <br>

                        <div align="center">
                            <input type="submit" class="btn btn-primary" name="sub" value="Process Invoice">
                        </div>
                   </form>
              
</div>
</div></div></div>
		<table class="table table-striped">
			<tr>
				<th>S/N</th>
				<th>Invoice No.</th>
				<th>Customer's Name</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Total Price</th>
				<th></th>
			</tr>

<?php
$sql="SELECT * FROM invoices ORDER BY id DESC ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

$i=1;
while($rows=mysql_fetch_assoc($result)){
?>
			<tr>
				<td><?php echo $i++;  ?></td>
				<td><?php echo $rows['invoice_no'];  ?></td>
				<td><?php echo $rows['customer_name'];  ?></td>
				<td>&#x20a6 <?php echo number_format($rows['price']);  ?></td>
				<td><?php echo $rows['quantity'];  ?></td>
				<td>&#x20a6 <?php echo number_format($rows['total_price']);  ?></td>
				<td><a class="btn btn-warning btn-sm" href="view_invoice.php?id=<?php echo $rows['id'];  ?>">View</a></td>
			</tr>
<?php
}
?>
			<tr>
				<td colspan="5" bgcolor="orange"><b>Total No. of Invoices: <?php echo $count;  ?></b></td>
			</tr>
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