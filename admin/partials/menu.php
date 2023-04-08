<?php 
include('../config/constants.php'); 
include('login-check.php'); 

?>



<html>
    <head>
        <title>Food Order Wedsite - Home Page</title> 

        <link rel="stylesheet" href="../css/admin.css">
         <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    
    </head> 

   
    <body>
        
<!--Menu section starts-->

<div class="menu text-center">
    <div class ="wrapper">
      <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="mange-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Category</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="manage-price.php">Payment</a></li>
            <li><a href="manage-restaurants.php">Restaurants</a></li>
            <li> <a href="<?php echo SITEURL;?>">USERVIEW</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
   </div>
</div>
<!--Menu section end-->