<?php
    include('config/constants.php');

  echo $email = $_GET['email']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update-password</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
  <form action="#" id="register" class="input-group" method="post">
        <input type="password" class="input-field"  name="password"  placeholder="Enter password" required>
        <input type="password" class="input-field"  name="cpassword"  placeholder="Enter password" required>
        <input type="checkbox" class="check-box"><span> I agree to the terms & conditions</span>
        <input type="submit" class="submit-btn" name="submit"value="Change Password">
    </form>

<?php
    if(isset($_POST['submit']))
    {
       $pass=md5($_POST['password']);
       $password = mysqli_real_escape_string($conn, $pass) ;
       $cpass=md5($_POST['cpassword']);
       $cpassword = mysqli_real_escape_string($conn,$cpass) ;

     if($password === $cpassword)
        {
            $sql="UPDATE tbl_reg SET
            password= '$password'
             WHERE email ='$email' 
       ";

        $res=mysqli_query($conn,$sql);

        //check whather excuted or not
        if($res==true)
        {
                
            ?>
            <script>
            alert("Change password  Successfully Login now");
            </script>
            <?php 
            header("Location: http://localhost/food-order/regster.php");
            exit(); 
        }
        else
        {
            ?>
            <script>
            alert("password Did't Match");
            </script>
            <?php   
        }

    }

}   
?>
</body>
</html>