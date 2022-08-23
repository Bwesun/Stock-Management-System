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
		<legend><h3>EMPLOYEES</h3></legend>
<div style="padding-left: 10px;">
	<?php
if(isset($_POST['sub'])){

    include('connect.php');

    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $post=$_POST['post'];
    $doe=$_POST['doe'];
    $address=$_POST['address'];
        
    
    $sql="INSERT INTO employees(name, phone, email, post, doe, address)VALUES('$name','$phone','$email','$post','$doe','$address'); ";
    $result=mysql_query($sql);

        if($result){
                echo "<script>
            alert('New Employee Added Successfully!');
            window.open('employees.php', '_self');
            </script>
                    ";
            }else{
                echo "<script>
            alert('Transaction Unsuccessful!');
            window.open('employees.php', '_self');
            </script>
                    ";//echo mysql_error()."------".$sql;
            }
    }
    


?>
<!-- Add Accoun-->
<br><button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
<span class="fas fa-user-plus"></span> Add New Employee
</button> 
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
<h4 class="modal-title" id="myModalLabel">Add New Employee</h4>
</div>
<!-- Body -->
<div class="modal-body">
                        <form class="form-group" method="post">
                            <table class="table">
                                <tr>
                                    <td><input type="text" class="form-control" name="name" required placeholder="Full Name"></td>
                                    <td><input type="email" name="email" class="form-control" required placeholder="E-Mail"></td>
                                </tr>
                                <tr>
                                	<td><input type="text" name="phone" class="form-control" required placeholder="Phone Number"></td>
                                	<td>Date of Employment<input type="date" name="doe" class="form-control" required placeholder="Date of Employment"></td>
                                </tr>
                                <tr>
                                	<td><input type="text" name="post" class="form-control" required placeholder="Enter Post"></td>
                                	<td><textarea class="form-control" name="address" required placeholder="Enter Address"></textarea></td>
                                </tr>
                            </table>
                        <br>

                        <div align="center">
                            <input type="submit" class="btn btn-primary" name="sub" value="Add Stock">
                        </div>
                   </form>
              
</div>
</div></div></div>
		<table class="table table-striped">
			<tr>
				<th>S/N</th>
				<th>Name</th>
				<th>Phone</th>
				<th>Post</th>
			</tr>

<?php
$sql="SELECT * FROM employees ORDER BY id DESC ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

$i=1;
while($rows=mysql_fetch_assoc($result)){
?>
			<tr>
				<td><?php echo $i++;  ?></td>
				<td><?php echo $rows['name'];  ?></td>
				<td><?php echo $rows['phone'];  ?></td>
				<td><?php echo $rows['post'];  ?></td>
				<td><a class="btn btn-warning btn-sm" href="view_employee.php?id=<?php echo $rows['id'];  ?>">View</a></td>
			</tr>
<?php
}
?>
			<tr>
				<td colspan="5" bgcolor="orange"><b>Total No. of Employees: <?php echo $count;  ?></b></td>
			</tr>
		</table>
	</fieldset>
</div>

	</div>
</div>

</body>