<?php
    include('config/constants.php');

  echo $otp = $_GET['otp']; 
  echo $email = $_GET['email']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<?php
echo "Enter your OTP";
?>
<br><br>
    <form action="#" method="post"  class="input-group" class="otpcenter">
     <input type="text" name ="otp" placeholder="Enter your otp" require><br><br>
     <input type="submit" class="submit-btn" name="submit"value="Submit">
    </form>
    <?php
    if(isset($_POST['submit']))
    {
       echo $newotp = $_POST['otp'];
         $nemail = $_POST['email'];
        
        if( $otp == $newotp ){
            ?>
            <script>
            alert("OTP verification Successfully Login now");
            </script>
            <?php  
              header("Location: http://localhost/food-order/cpass.php?email=$nemail");
              exit();
          
        }
        else{
            ?>
            <script>
            alert("You OTP is Not valid");
            </script>
            <?php   
              
        }


    }
    ?>
</body>
</html>

 