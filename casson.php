<?php include('partials-front/menu.php'); ?>
<?php
$pnumber = $_SESSION['p_number'] ;
 $password = $_SESSION['password']   ;
 $food = $_SESSION['food'];
 $qty = $_SESSION['qty'] ;
 $prices = $_SESSION['prices'];
 $customer_name = $_SESSION['customer_name'] ;
 $customer_address = $_SESSION['customer_address'] ;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AMZOOD</title>
	<style>
		*{
        margin: 0;
		padding: 0;
		}
		
		.paytm{
			min-width: 100vw;
			min-height: 100vh;
			background: url(./images/img3.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
	        color:white;
		
		}
		.paytm h1{
			text-align:center;
			color: #37fa54;
		}
		.logo{
			width: 150px;
			height: 100px;
			cursor: pointer;
			background: transparent;
		}
		.paytm .btn-primary{
			background-color: #9bec0f;
			padding: 1%;
			font-size: 2em;
			color: white;
			text-decoration: none;
			font-weight: bold;
			cursor: pointer;
		}

		.paytm .btn-primary:hover{
			background-color: #37fa54;
		}
		.text-center{
           text-align: center;
       }
	   .paytm h1{
			position: relative;
			font-size: 4em;
			color: #0e3742;
			text-transform: uppercase;
			text-align: center;
			-webkit-box-reflect: below 1px linear-gradient(transparent #0008);
			outline: none;
			animation: animate1 5s linear infinite;
		}
		@keyframes animate1 {
			
			0%,18%,20%,50.1%,60%,65.1%,80%,90.1%,92%
			{
				color: #0e3742;
				text-shadow: none;
			}
			18.1%,20.1%,30%,50%,60.1%,65%,80.1%,90%,92.1%,100%{
				color: #fff;
				text-shadow:  0 0 10px #03bcf4,
				0 0 10px #03bcf4,
				0 0 10px #03bcf4,
				0 0 10px #03bcf4,
				0 0 10px #03bcf4;
			}
		}
		.order1{
			margin-left: 100px;
		}
	</style>
</head>
<body>
    <div class="paytm">

        <br>
        <h1>AMZOOD</h1>
        <br><br>
        <h1>GOTO HOME-PAGE</h1>
        <div class="order1">
                <br><br><br>
                <h2>YOUR ORDER DETAILS:</h2>
                <br><br>
                <h3>ORDERID: <?php echo "ORDS" .rand(10000,99999999);?> </h3>
                <h3>ITEM:<?php echo "$food"; ?> </h3>
                <h3>RRICE:<?php echo "$prices"; ?> </h3>
                <h3>NAME:<?php echo "$customer_name"; ?> </h3>
                <h3>PHONE NUMBER:<?php echo "$pnumber"; ?> </h3>
                <h3>ADDRESS:<?php echo "$customer_address"; ?> </h3>
                <br><br>



               
        </div>
    </div>
</body>
</html>
           

