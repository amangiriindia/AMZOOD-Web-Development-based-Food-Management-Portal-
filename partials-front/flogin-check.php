<?php

  //Authorization. Access COntrol
  //whether the user is logged or not
  if(!isset($_SESSION['user']))//if user session is not set 
  {
      //user is not logged in
      //redirect to logging page with massage
      $_SESSION['no-login-message']="<div class='error text-center'>Please login to access Food order website </div>";
      //redirect to login page
      // header('location:'.SITEURL.'manage-login.php');
      header('location:'.SITEURL.'regster.php');
  }

?>