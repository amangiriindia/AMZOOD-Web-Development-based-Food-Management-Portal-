<?php include('partials-front/menu.php'); ?>
<?php

 $pnumber = $_SESSION['p_number'] ;
 $password = $_SESSION['password']   ;
 $food = $_SESSION['food'];
 $qty = $_SESSION['qty'] ;
 $prices = $_SESSION['prices'];
 $customer_name = $_SESSION['customer_name'] ;
 $customer_address = $_SESSION['customer_address'] ;
 $image_name = $_SESSION['image_name'] ;

?>




 <fieldset>
        <legend >  <h3 class="colour">ORDER SUMMARY</h3></legend>
        
        <div class="food-menu-img">
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
                        <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                }
            ?>
            
        </div>
        
       <div class="food-menu-desc">
            <h3 class="colour"><?php echo $food;?></h3>
            <input type="hidden" name="food" class="colour"value="<?php echo $title?>">
            <input type="hidden" name="order_id" value="<?php echo "ORDS" .rand(10000,99999999);?>">
            <p class="food-price"><?php echo $prices;?></p>
            <input type="hidden" name="price"class="colour" value="<?php echo $prices?>">

          
            <h3 class="colour">Quantity:  <?php echo $qty;?></h3>
            <h3 class="colour">Address:</h3>
            <h4 class="colour"><?php echo $customer_address;?></h3>
            <br>
            <form method="post" action="PaytmKit/pgRedirect.php">
                    <input type="hidden" name="food" class="colour"value="<?php echo"$food";?>">
                    <input type="hidden" name="order_id" value="<?php echo "ORDS" .rand(10000,99999999);?>">
                    <input type="hidden" name="price"class="colour" value="<?php echo"$prices";?>">
                    <input type="hidden" name="qty" class="input-responsive" value="<?php echo "$qty";?>" required>
                    <br><br>
                    <input type="submit" name="pay" value="Pay now" class="btn btn-primary">
                </form><br><br>

            <a href="<?php echo SITEURL;?>casson.php" class="btn btn-primary">Cash on delivery</a>
           
              <!-- paymant -->
            
            

           

    
            
        </div>

    </fieldset>


   












 <?php include('partials-front/footer.php'); ?>