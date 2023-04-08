<?php
//include constants.php
 include('../config/constants.php');

 //1.Destory the session
 session_destroy();//unset $_session ['']

 //2.REdirect to Login page
 header('location:'.SITEURL.'admin/login.php');

?>