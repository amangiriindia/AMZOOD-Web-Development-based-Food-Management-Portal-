<?php include('config/constants.php');
      include('flogin-check.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- aos link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style1.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    
 
    <!-- Navbar Section Ends Here -->
  
        <!-- <li> <a href="<?php echo SITEURL;?>about.php">  About Us</a></li> -->
    <!-- <li> <a href="<?php echo SITEURL;?>contact.php">Contact</a>  </li> -->
                
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
   
    <div class="logo navbar-brand">
                <a href="#" title="Logo">
                    <img src="images\logo.jpeg" alt="Restaurant Logo" class="img-responsive">
                </a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

          
          <li  class="nav-item">  <a class="nav-link active" aria-current="page" href="<?php echo SITEURL;?>">Home</a></li>
    
       

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo SITEURL;?>veg.php?veg='Yes'" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Food Type
          </a>
          <ul  class="dropdown-menu">
          <li><a class="dropdown-item" href="<?php echo SITEURL;?>veg.php?veg='Yes'">Veg</a> </li>
          <li><a class="dropdown-item" href="<?php echo SITEURL;?>veg.php?veg='No'">Non-Veg</a> </li>
         </ul>
        </li>          
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="<?php echo SITEURL;?>restaurant.php?name=<?php echo $restaurant; ?>" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Restaurant
          </a> 
                    <ul class="dropdown-menu">
                        <?php
                            //Create SQl Query to Display category from database
                            $sql= "SELECT   DISTINCT restaurant FROM tbl_category WHERE active='Yes'AND featured='Yes'" ;
                            //Execute the Query
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0)
                            {
                                //category is available
                                while($row = mysqli_fetch_assoc($res))
                                {
                                     $restaurant=$row['restaurant'];
                                    ?>
                                    <li><a class="dropdown-item item-size" href="<?php echo SITEURL;?>restaurant.php?name=<?php echo $restaurant; ?>"><?php echo $restaurant; ?></a></li>
                                    <?php
                                }
                            }
                        ?>
                    </ul>  
                </li>
        <li class="nav-item "> <a class="nav-link item-size" href="<?php echo SITEURL;?>categories.php">Categories</a>   </li>
         <li class="nav-item item-size"> <a class="nav-link " href="<?php echo SITEURL;?>foods.php">Dishes</a></li>
        <li class="nav-item item-size"> <a class="nav-link " href="<?php echo SITEURL;?>myorder.php">My-order</a></li>
        <li class="nav-item item-size"> <a class="nav-link" href="<?php echo SITEURL;?>cart.php">My-Cart</a>  </li>
       
      </ul>
    </div>
  </div>
</nav>










