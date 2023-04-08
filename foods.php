<?php include('partials-front/menu.php'); ?>

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
     
   
        <h2 class="text-center">Food Menu</h2>

        <div class="fcontainer">
       

            <?php
                //Create SQl Query to Display category from database
                $sql= "SELECT * FROM tbl_food  WHERE active='Yes' ";
                //Execute the Query
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                {
                    //category is available
                    while($row = mysqli_fetch_assoc($res))
                    {
                        //Get the value like id ,tittle ,image_name
                        $id=$row['id'];
                        $title=$row['title'];
                        $price=$row['price'];
                        $description=$row['description'];
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

                                        <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                                        <a href="<?php echo SITEURL; ?>cart.php?food_id=<?php echo $id;?>" class="btn btn-primary">Add to cart</a>
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

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here -->
    <?php include('partials-front/footer.php'); ?>