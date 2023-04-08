
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
			background: url(../images/img3.jpg);
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
			width: 350px;
			height: 200px;
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
		.order{
			margin-left: 100px;
		}
	</style>
</head>
<body>
<div class="paytm">
<img src="../image/logo2.png" class="logo">
<br>
 <h1>AMZOOD</h1>
 <br><br>
 <h1>GOTO HOME-PAGE</h1>


 <br>
<div class="order">
<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	
	echo "<b></b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		?>
       <h2>YOUR ORDER DETAILS:</h2>
	   <?php
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		$conn=mysqli_connect("localhost",'root',"","food-order");
        if(!$conn)
        echo"Error";
		$orderdate=$_POST['TXNDATE'];
		$status=$_POST['STATUS'];
		$mode=$_POST['PAYMENTMODE'];
		$orderid=$_POST['ORDERID'];
		$query="update tbl_payment set date='$orderdate',payment_mode='$mode',payment_status='$status' where orderid ='$orderid' ";
		if(!mysqli_query($conn,$query))
        echo mysqli_error($conn);
	}
	else {
		?>
		<h2>YOUR ORDER DETAILS:</h2>
		<?php
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	if (isset($_POST) && count($_POST)>0 )
	{ 
		foreach($_POST as $paramName => $paramValue) {
				echo "<br/>" . $paramName . " = " . $paramValue;
		}
	}
	

}
else {
	//Process transaction as suspicious.?>
       <h2>Checksum mismatched.</h2>
	<?php
}

?>

</div>
</div>
</body>
</html>




