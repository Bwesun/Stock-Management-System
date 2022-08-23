<?php
$connect=mysqli_connect("localhost", "root", "", "stock");


$output='';
$sql="SELECT * FROM invoices WHERE invoice_no LIKE '%".$_POST['search']."%' OR customer_name LIKE '%".$_POST['search']."%' ";
$result=mysqli_query($connect, $sql);

if(mysqli_num_rows($result)>0)
{
	
	echo '<div class="row"> <h3>Search Results:</h3>';
	while($rows=mysqli_fetch_array($result))
	{
echo '<div class="well search-result">
                <div class="row">
                    <a href="view_invoice.php?id='.$rows['id'].'" title="View Invoice">
                        <div class="col-xs-6 col-sm-9 col-md-9 col-lg-10 ">
                            <h4>Invoice ID: <small>'.$rows['invoice_no'].'</small> - Customer Name: <small>'.$rows['customer_name'].'</small> - Item: <small>'.$rows['product_name'].'</small> - Amount: <small> ₦'.number_format($rows['total_price']).'</small></h4>
                        </div>
                    </a>
                </div>
            </div>';
}

echo '</div>';
}
else
{
	echo '<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				NO DATA FOUND!
			</div>';
}

?>
<style type="text/css">
	.well {
    border: 0;
    padding: 10px;
    min-height: 23px;
    background: #fff;
    border-radius: 3px;
    position: relative;
    max-height: 100000px;
    transition: max-height 0.5s ease;
    -o-transition: max-height 0.5s ease;
    -ms-transition: max-height 0.5s ease;
    -moz-transition: max-height 0.5s ease;
    -webkit-transition: max-height 0.5s ease;
}
.form-control {
    height: 45px;
    padding: 10px;
    font-size: 16px;
    box-shadow: none;
    border-radius: 0;
    position: relative;
}  
    background:#eee;

}
.search-result .title h3 {
    margin: 0 0 5px;
    color: #333;
}
.search-result .title p {
    font-size: 12px;
    color: #333;
}
</style>