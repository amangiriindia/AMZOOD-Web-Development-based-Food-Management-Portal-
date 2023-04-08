<?php 
include('./config/constants.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
   
   <title>Login</title>
   <link rel="stylesheet" href="css/login.css">
</head>
 <!-- login page design start -->
<body>
   <div class="hero">
      <div class="nav">
         <img src="image/logo.jpeg" class="logo">
         <div>
            <button type="button" class="button" class="toggle-btn" onclick="login()">Sign Up</button>
            <button type="button" class="button" class="toggle-btn" onclick="register()">Sign In</button>
         </div>
      </div>
      <div class="content">
         <small>Welcome to our</small>
         <h1>Amazing </h1>
   
         <div class="font">
            <h2>FOOD</h2>
            <h2>FOOD</h2>
        </div>
          <a href="./game/index.html"><button type="button" class="button" > Keep Enjoy</button></a>
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
      <!-- login page design start -->
     
   
    <!-- Login page started -->
    <div class="heroo">
      <div class="form-box">
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
          <div class="button-box">
              <div id="btn1"></div>
              <button type="button"  class="toggle-btn" onclick="login()">Log IN</button>
              <button type="button" class="toggle-btn" onclick="register()">register</button>
          </div>
          <form action="#" id="login" class="input-group" method="post" >
              <input type="text" class="input-field" name="pnumber" placeholder="Enter Phone-Number" required>
              <input type="password" class="input-field" name="password"placeholder="Enter password" required>
              <input type="checkbox" class="check-box"><span>Remember Password</span>
              <input type="submit" class="submit-btn" name="login"value="Login">
          </form>
          <form action="#" id="register" class="input-group" method="post">
              <input type="text" class="input-field" name="name" placeholder="Name" required>
              <input type="text" class="input-field"  name="pnumber"  placeholder="Phone-Number" required>
              <input type="email" class="input-field" name="email"  placeholder="Email Id" required>
              <input type="password" class="input-field"  name="password"  placeholder="Enter password" required>
              <input type="checkbox" class="check-box"><span> I agree to the terms & conditions</span>
              <input type="submit" class="submit-btn" name="register"value="Register">
          </form>
      </div>

  </div>
</div>
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
   <!-- Login page end -->
</body>

</html>

<?php



if(isset($_POST['register']))
{
   

    //get the data from form
     echo $name=$_POST['name'];
     echo $pnumber=$_POST['pnumber'];
     echo $email=$_POST['email'];
     echo $password=md5($_POST['password']);//md5 is password encrypation
     //sql save data in database
     $sql = "INSERT INTO tbl_login SET
            name='$name',
            p_number='$pnumber',
            email='$email',
            password='$password'
            ";
    //Executing Query and saving data in Database
    $res = mysqli_query($conn,$sql);

    //check wether the (Query is excuted) data in inserted or not and display appopriate messag
    if($res==TRUE)
    {
        

       //session variable display massage
       $_SESSION['add']="Login Successfully";
       //redirect page IN home page
      

       header('location:'.SITEURL.'index.php');   //?id=.urlencode(serialize($id))
     }
    else
    {
      //  echo "data not inserted";
       //session variable display massage
       $_SESSION['add']="Failed to Add Admin";
       //redirect page to Add admin
       header("location:".SITEURL.'login.php');
     }
}








//check submit button
// if(isset($_POST['login']))
// { 
//     //1.get the data from login form
//     echo $pnumber=$_POST['pnumber'];
//    echo $password=md5($_POST['password']);

//   //  $username=mysqli_real_escape_string($conn,$_POST['pnumber']);
//   //  $raw_password=md5($_POST['password']);
//   //  $password=mysqli_real_escape_string($conn,$raw_password);
   

//    //2.SQL to check whether the user with username and password exist or not
//    $sql="SELECT * FROM tbl_login WHERE p_number='$pnumber'AND password='$password'";

   
//    //3.excute the Query
//    $res=mysqli_query($conn,$sql);

//    //4.count row to check wether the user exist or not
//    $count =mysqli_num_rows($res) ;
//    if($count==1)
//    {
//       //user available and login sussess
//       $_SESSION['login']= "<div class='success'> Login Successful.</div>";
//       $_SESSION['user']=$pnumber;//to check whether the user is logged or notand logout will unsetit

     
//       //header('location:'.SITEURL.'index.php?id='.urlencode(serialize($id)));
//       header('location:'.SITEURL.'index.php'); 
    
//    }
//    else
//    {
//        //user not available and login login fail
//        $_SESSION['login']= "<div class='error text-center'> Username and Password did not Match Please Register.</div>";
//        //redirect to homepage /dashboar
//        header('location:'.SITEURL.'manage-login.php');
//    }

// }



session_start();
$_SESSION['p_number'] =  $pnumber;
$_SESSION['password'] =  $password;




?>

