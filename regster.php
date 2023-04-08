<?php 
include('config/constants.php');
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
    <!-- Login page started -->
   
    <div class="hero">
    <img src="image/logo2.png" class="logo">
      <div class="content">
         <small>Welcome to our</small>
         <h1>AMZOOD</h1>
   
         <div class="font">
            <h2>FOOD</h2>
            <h2>FOOD</h2>
        </div> 
          <!-- <a href="./game/index.html"><button type="button" class="button" > Keep Enjoy</button></a> -->
       </div>
      <div class="side-bar">
         <img src="image/menu.png" class="menu">
         <div class="social-link">
            <img src="image/fb.png">
            <img src="image/ig.png">
            <img src="image/tw.png">
         </div>

         <div class="useful-link">
            <img src="image/share.png">
            <img src="image/info.png">
         </div>
      </div>
      <div class="bubbles">
         <img src="image/bubble.png" class="img1">
         <img src="image/bubble.png" class="img2">
         <img src="image/bubble.png" class="img3">
         <img src="image/bubble.png" class="img4">
         <img src="image/bubble.png" class="img5">
         <img src="image/bubble.png" class="img6">
         <img src="image/bubble.png" class="img7">
         <img src="image/bubble.png" class="img8">
         <img src="image/bubble.png" class="img9">
      </div>
      <div class="login">

      </div>


    <div class="heroo">
        <?php
                if(isset($_SESSION['add'])){//checking the session set or not
                    echo $_SESSION['add'];  //displaying session massageS if set
                    unset($_SESSION['add']);//removing session message
                }
                
                if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
        <div class="form-box">
        
         
            <div class="button-box">
                <div id="btn1"></div>
                <button type="button"  class="toggle-btn" onclick="login()">Log IN</button>
                <button type="button" class="toggle-btn" onclick="register()">register</button>
            </div>
            <form action="#" id="login" class="input-group" method="post">
                <input type="email" class="input-field" name="email"  placeholder="Email Id" required>  
                <input type="password" class="input-field" name="password"placeholder="Enter password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>
                <input type="submit" class="submit-btn" name="ram" value="Login">
                <a href="http://localhost/food-order/forget.php">forget password?</a>
            </form>
            <form action="#" id="register" class="input-group" method="post">
                <input type="text" class="input-field" name="username" placeholder="Name" required>
                <input type="email" class="input-field" name="email"  placeholder="Email Id" required>
                <input type="text" class="input-field"  name="mobile"  placeholder="Phone-Number" required>
                <input type="password" class="input-field"  name="password"  placeholder="Enter password" required>
                <input type="password" class="input-field"  name="cpassword"  placeholder="Enter password" required>
                <input type="checkbox" class="check-box"><span> I agree to the terms & conditions</span>
                <input type="submit" class="submit-btn" name="submit"value="Register">
            </form>
        </div>

    </div>
    </div>
    </div>
  
   <!-- Login page end -->
   <?php
      //check submit button
        if(isset($_POST['ram']))
        { 
          
            //1.get the data from login form
           
             $email=mysqli_real_escape_string($conn,$_POST['email']);
             $raw_password=md5($_POST['password']);
             $password=mysqli_real_escape_string($conn,$raw_password);
          
             

            // //2.SQL to check whether the user with username and password exist or not
            $sql="SELECT * FROM tbl_reg WHERE email= '$email' or password='$password'";

            
            // //3.excute the Query
            $res=mysqli_query($conn,$sql);

            // //4.count row to check wether the user exist or not
            $count =mysqli_num_rows($res) ;
            if($count>0)
            {    $rows = mysqli_fetch_assoc($res);
                $newemail=$rows['email'];
                $newpass=$rows['password'];
                $pnumber=$rows['mobile'];
                // echo  $newemail;
                // echo $newpass;
               // user available and login sussess
                $_SESSION['login']= "<div class='success'> Login Successful.</div>";
                $_SESSION['user']=$newemail;//to check whether the user is logged or notand logout will unsetit

                session_start();
                $_SESSION['p_number'] =  $pnumber;
                $_SESSION['password'] =  $newpass;

               //redirect to homepage /dashboard
               header('location:'.SITEURL.'index.php');
               exit();  
                
            }
            else
            {
               
            ?>
            <script>
                  alert(" your Email and password did not match");
             </script>   
            <?php
               header('location:'.SITEURL.'regster.php');

                
            }

         }
        













   if(isset($_POST['submit'])){
       $username = mysqli_real_escape_string($conn,$_POST['username']) ;
       $mobile = mysqli_real_escape_string($conn,$_POST['mobile']) ;
      
       $email = mysqli_real_escape_string($conn,$_POST['email']) ;
       $pass=md5($_POST['password']);
       $password = mysqli_real_escape_string($conn, $pass) ;
       $cpass=md5($_POST['cpassword']);
       $cpassword = mysqli_real_escape_string($conn,$cpass) ;

      

       $token = rand(1000,9999);

       $emailquery = " select * from tbl_reg where email = '$email' ";
       $query = mysqli_query($conn , $emailquery);

       $emailcount = mysqli_num_rows($query);

       if($emailcount>0){
           echo "email already exists";
       }
       else
       {
         if($password === $cpassword)
           {

           $sql="INSERT INTO tbl_reg SET
                username='$username',
                email='$email',
                mobile	='$mobile',
                password=' $password'
              
            ";
            //3. Excute the Quary in save and database
            $res = mysqli_query($conn,$sql);

            //4.check whether the quary excuted or not data store or not
            if($res==TRUE)
            {
                
                 //redirect to manage category page
                 header('location:'.SITEURL.'index.php');
            }
         }else{
            ?>
            <script>
             alert("Password didn't match");
             </script>
             <?php
 
         }

            //    if($password === $cpassword)
            //    {
                
            //         $_SESSION['username'] =  $username;
            //         $_SESSION['mobile'] =  $mobile;
            //         $_SESSION['email '] =  $email;
            //         $_SESSION['password'] =   $password;
            //         $_SESSION['token'] =  $token;
                
                
            //         require 'Email\PHPMailer\PHPMailerAutoload.php';
            //         require 'Email\constant.php';
            //         $mail = new PHPMailer;

            //         //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            //         $mail->isSMTP();                                      // Set mailer to use SMTP
            //         $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            //         $mail->SMTPAuth = true;                               // Enable SMTP authentication
            //         $mail->Username = EMAILID;                 // SMTP username
            //         $mail->Password = PASSWORD;                           // SMTP password
            //         $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            //         $mail->Port = 465;                                    // TCP port to connect to

            //         $mail->setFrom(EMAILID, 'AMZOOD');
            //         $mail->addAddress($email, $username);     // Add a recipient
            //         //$mail->addAddress('ellen@example.com');               // Name is optional
            //         //$mail->addReplyTo(EMAILID, 'Information');
            //         //$mail->addCC('cc@example.com');
            //         //$mail->addBCC('bcc@example.com');

            //         //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //         //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            //         $mail->isHTML(true);                                  // Set email format to HTML

            //         $mail->Subject = 'Verifiy your OTP';
            //         $mail->Body    =   $token;
            //         $mail->AltBody = 'OTP deseable in 10 min';

            //         if(!$mail->send()) {
            //         echo 'Message could not be sent.';
            //         echo 'Mailer Error: ' . $mail->ErrorInfo;
            //         } else {
            //             ?>
                       <script>
            //             alert(" OTP send Your Email ");
            //         </script>
                      
                    <?php
            //           header("Location: http://localhost/food-order/otp.php?otp=$token");
            //           exit();
            //         }
                    
            //     //}
            //  }
            // else
            // {
            //   ?>
          <script>
            //   alert("Password didn't match");
            //   </script>
             <?php 
            // }
          
       
       }
    
   }



   ?>



   <script>
      var x = document.getElementById("login");
      var y = document.getElementById("register");
      var z = document.getElementById("btn1");

      function register() {
          x.style.left = "-400px";
          y.style.left = "50px";
          z.style.left = "110px";
      }
      function login() {
          x.style.left = "50px";
          y.style.left = "450px";
          z.style.left = "0px";
      }
  

  </script>
</body>
</html>
