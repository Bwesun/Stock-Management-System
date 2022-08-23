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

<div class="container" >
	<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<?php
		include('head.php');

		
		?>
		
<?php
$sql="SELECT * FROM invoices WHERE status='unchecked' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

?>
<div class="col-lg-12">
<form class="form-group" method="post">
	Search Invoice
                        <input type="text" id="search_text" style="height: 50px;" placeholder="Enter Invoice Number" name="search_text" required class="form-control"><br>
                   </form>
                   <div id="result" class="col-lg-12"> </div>
                </div>
<div style="background-color: white; padding: 20px; border-radius:5px ;" align="center">
	<a href="invoices.php" class="btn btn-primary btn-lg">Invoices</a> <a href="stocks.php" class="btn btn-primary btn-lg">Stocks</a> <a href="users.php" class="btn btn-primary btn-lg">Users</a><br><br> <a href="employees.php" class="btn btn-primary btn-lg">Employees</a> <a href="reports.php" class="btn btn-primary btn-lg">Reports</a> <a href="notification.php" class="btn btn-primary btn-lg">Notifications <span class="fas badge"><?php echo $count  ;?></span></a> 
</div>
<br>
<br>
	<div class="footer">
	&copy Copyright Powered By Favour Yakubu 
</div>
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

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt !=''){
                $.ajax({
                    url:"fetch_invoice.php",
                    method:"post",
                    data:{search:txt},
                    dataType:"text",
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            else
            {
                $('#result').html('');
            }
        });
    });

</script>
</body>