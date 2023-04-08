<?php
 include('config/constants.php');
echo "THIS IS Forget page";



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
    <br><br><br><br><br><br><br>
  <form action="" class="input-group" method = "post">
  <input type="email" name="email" placeholder="Enter your Email" require>
  <input type="submit" name="submit" placeholder ="submit">
  </form>



<?php

  if(isset($_POST['submit'])){
      
       $email = mysqli_real_escape_string($conn,$_POST['email']) ;
       $token = rand(1000,9999);

       $emailquery = " select * from tbl_reg where email = '$email' ";
       $query = mysqli_query($conn , $emailquery);

       $emailcount = mysqli_num_rows($query);

       if($emailcount>0)
       {
            require 'Email\PHPMailer\PHPMailerAutoload.php';
            require 'Email\constant.php';
            $mail = new PHPMailer;

            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = EMAILID;                 // SMTP username
            $mail->Password = PASSWORD;                           // SMTP password
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 465;                                    // TCP port to connect to

            $mail->setFrom(EMAILID, 'AMZOOD');
            $mail->addAddress($email, $username);     // Add a recipient
            //$mail->addAddress('ellen@example.com');               // Name is optional
            //$mail->addReplyTo(EMAILID, 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML

            $mail->Subject = 'Verify your OTP if wewant to forget password';
            $mail->Body    =   $token;
            $mail->AltBody = 'OTP deseable in 10 min';

            if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            ?>
            <script>
            alert(" OTP send Your Email ");
        </script>
          
        <?php
          header("Location: http://localhost/food-order/fotp.php?otp=$token");
          exit();
        }
           
           
       }
       else
       {
            ?>
             <script>
              alert(" Enter a valid Email ");
            </script>
                          
             <?php

           if($password === $cpassword)
           {
                session_start();
                $_SESSION['username'] =  $username;
                $_SESSION['mobile'] =  $mobile;
                $_SESSION['email '] =  $email;
                $_SESSION['password'] =   $password;
                $_SESSION['cpassword'] =   $cpassword;
                $_SESSION['token'] =  $token;
            
                
                  
                    
                //}
             }
            else
            {
              ?>
              <script>
              alert("Password didn't match");
              </script>
             <?php 
            }
          
       
       }
    
   }




?>

</body>
</html>