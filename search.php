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
        <legend><h3>SEARCH STOCKS</h3></legend>
<div style="padding-left: 10px;">
    <div class="row">
                    <div class="col-lg-12">
<form class="form-group" method="post">
                        <label>Enter Search Term</label>
                        <input type="text" id="search_text" style="height: 50px;" placeholder="Enter Stock Name" name="search_text" required class="form-control"><br>
                   </form>
                   <div id="result" class="col-lg-12"> </div>
                </div>
                </div>
</div>

    </div>
</div>

<script>
    $(document).ready(function(){
        $('#search_text').keyup(function(){
            var txt= $(this).val();
            if(txt !=''){
                $.ajax({
                    url:"fetch.php",
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