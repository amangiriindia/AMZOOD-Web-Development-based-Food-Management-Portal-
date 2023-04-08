<?php include('partials-front/menu.php'); ?>
 <?php
 

    $pnumber = $_SESSION['p_number'] ;
    $password = $_SESSION['password']   ;
  
  ?>
  <?php
   
    //check whether food id is set or not
    if(isset($_GET['food_id']))
    {
        //Get the food id detailsof the setected food
        $food_id = $_GET['food_id'];
        //get the details of the selected food
        $sql= "SELECT * FROM tbl_food  WHERE id=$food_id";
        //Execute the Query
        $res=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($res);
        if($count>0)
        {
            $row = mysqli_fetch_assoc($res);
         
             $title=$row['title'];
             $price=$row['price'];
             $description=$row['description'];
             $image_name=$row['image_name'];
        }

        $sql= "INSERT INTO tbl_cart SET
        food_id=$food_id,
        food_name='$title',
        food_price='$price',
        food_des= '$description',
        image_name='$image_name',
        phone='$pnumber',
        password ='$password'
        ";
        $res=mysqli_query($conn,$sql);
        
    }
    
    
      
    ?>
   <!-- fOOD sEARCH Section Starts Here -->
   <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section >
     
   
        <h2 class="text-center">your-cart</h2>



    <div class="fcontainer">
        

        <?php
            //Create SQl Query to Display category from database
            $sql= "SELECT * FROM tbl_cart WHERE phone='$pnumber' AND password='$password'";
            //Execute the Query
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                //category is available
                while($row = mysqli_fetch_assoc($res))
                {
                    //Get the value like id ,tittle ,image_name
                    $fid=$row['food_id'];
                    $title=$row['food_name'];
                    $price=$row['food_price'];
                    $description=$row['food_des'];
                    $image_name=$row['image_name'];
                    ?>

                    
                        <div class="fcontainer1">
                            <div class="ffront">
                                <?php
                                    //check whether image is aviable or not
                                        if($image_name=="")
                                        {
                                            //Display the image
                                            echo "<div class= 'error'>Image not Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>"  idata-aos="flip-right">
                                        <?php
                                        }
                                ?>
                            </div>
                            <div class="fback">
                                <div class="food-menu-img">
                                    <?php
                                    //check whether image is aviable or not
                                        if($image_name=="")
                                        {
                                            //Display the image not avialale
                                            echo "<div class ='error'>Image not Available</div>";
                                        }
                                        else
                                        {
                                            ?>
                                                <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                                            <?php
                                        }
                                    ?>
                        
                                </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price"><?php echo $price; ?></p>
                                    <p class="food-detail">
                                    <?php echo $description; ?>
                                    </p>
                                    <br>
                              
                                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $fid;?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                        </div>  
                        <?php
                }
            }
            else
            {
                //cetogory not availble
                echo "<div class= 'error'>Food Not Avaliable</div>";
            }
        ?>
    </div>
 <?php include('partials-front/footer.php'); ?>