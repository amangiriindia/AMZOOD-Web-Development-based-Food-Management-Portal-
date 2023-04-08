<html>
    <?php include('../config/constants.php');?>
    <head>
        <title>Login -Food Order System</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>

        <div class="login  ">
             <img src="../image/logo2.png" class="logo">
      
            <br><br>
           
            <br>
           <div class="login1">
         
            <?php
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
            <br>
               <br>
                 <h1 class="text-center">LOGIN NOW</h1>
                 <br><br>
                <!-- login page start here-->
            <form action=""method="POST" class="text-center">
                Username: <br>
                <input type="text"name="username"placeholder="Enter username"><br><br>
                password:<br>
                <input type="password"name="password"placeholder="Enter password"><br><br>
                
                <input class="btn-primary" type="submit"name="submit"value="Login">
                </form>
            <!-- login page end here-->
               <br>
            <p class="text-center">Created By-   <span>Aman Giri</span></p>
           </div>
        </div>
   
        
    </body>
</html>

<?php 
//check submit button
if(isset($_POST['submit']))
{ 
    //1.get the data from login form
   //$username=$_POST['username'];
   //$password=md5($_POST['password']);

   $username=mysqli_real_escape_string($conn,$_POST['username']);
   $raw_password=md5($_POST['password']);
   $password=mysqli_real_escape_string($conn,$raw_password);
   

   //2.SQL to check whether the user with username and password exist or not
   $sql="SELECT * FROM tbl_admin WHERE username ='$username'AND password='$password'";

   
   //3.excute the Query
   $res=mysqli_query($conn,$sql);

   //4.count row to check wether the user exist or not
   $count =mysqli_num_rows($res) ;
   if($count==1)
   {
       //user available and login sussess
       $_SESSION['login']= "<div class='success'> Login Successful.</div>";
       $_SESSION['user']=$username;//to check whether the user is logged or notand logout will unsetit

       //redirect to homepage /dashboard
       header('location:'.SITEURL.'admin/');
   }
   else
   {
       //user not available and login login fail
       $_SESSION['login']= "<div class='error text-center'> Username and Password did not Match.</div>";
       //redirect to homepage /dashboard
       header('location:'.SITEURL.'admin/login.php');
   }

}
?>