<?php
    include('config/constants.php');

  echo $otp = $_GET['otp']; 
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

    <div class="common"><br>
    
   
    <form action="#" method="post" >
    <h2><?php echo "Enter your OTP";?></h2><br>
     <input type="text" name ="otp" placeholder="Enter your otp" require> <br><br>
     <input type="submit" class="submit-btn" name="submit"value="Submit">
    </form>
    </div>



    <?php
    if(isset($_POST['submit']))
    {
       echo $newotp = $_POST['otp'];
        
        if( $otp == $newotp ){
            ?>
            <script>
            alert("OTP verification Successfully Login now");
            </script>
            <?php  
              session_start();
             $username = $_SESSION['username'] ;
             $mobile = $_SESSION['mobile'] ;
             $email = $_SESSION['email '] ;
             $pass = $_SESSION['password'] ;
             $token = $_SESSION['token'] ;
             echo  $email;
             echo $pass;
            //  echo $username','$email,$mobile, $pass, $cpass,$token;
             $sql = "insert into tbl_reg (username,email,mobile,password,token,status) values('$username','$email','$mobile',' $pass','$token','inactive')";
                
             $iquery = mysqli_query($conn,$sql);
               
             if($iquery)
             {
               
                ?>
                <script>
                alert("OTP verification Successfully Login now");
                </script>
                <?php 
                header("Location: http://localhost/food-order/regster.php");
                exit(); 
             }


          
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

 