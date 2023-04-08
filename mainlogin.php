<?php include('config/constants.php');
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
                <a href="#">forget password?</a>
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
  
   <!-- Login page end -->
   <?php
      //check submit button
        if(isset($_POST['ram']))
        { 
            echo "work" ;
            //1.get the data from login form
            $email = $_POST['email'] ;
            $password = $_POST['password'] ;
            //  echo  $email;
            //  echo $password;
            //  $username=mysqli_real_escape_string($conn,$_POST['pnumber']);
            //  $raw_password=md5($_POST['password']);
            //  $password=mysqli_real_escape_string($conn,$raw_password);
            

            //2.SQL to check whether the user with username and password exist or not
            $sql="SELECT * FROM tbl_reg WHERE email='$email 'AND password='$password'";

            
            //3.excute the Query
            $res=mysqli_query($conn,$sql);

            //4.count row to check wether the user exist or not
            $count =mysqli_num_rows($res) ;
            if($count==1)
            {
                //user available and login sussess
                $_SESSION['login']= "<div class='success'> Login Successful.</div>";
                $_SESSION['user']=$email;//to check whether the user is logged or notand logout will unsetit

                //redirect to homepage /dashboard
                //header('location:'.SITEURL.'index.php?id='.urlencode(serialize($id)));
                header('location:'.SITEURL.'index.php');
                exit();  
                
            }
            else
            {
                //user not available and login login fail
            
                ?>
                <script>
                alert("username and Password did not Match Please Register");
                </script>
                <?php 
                //redirect to homepage dashboar
                header("Location: http://localhost/food-order/regster.php");
                
            }

        }
        else
        {
            echo " not work";
        }


