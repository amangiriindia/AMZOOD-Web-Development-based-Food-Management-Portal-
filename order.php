<?php include('partials-front/menu.php'); ?>
<?php
 

 $pnumber = $_SESSION['p_number'] ;
 $password = $_SESSION['password']   ;
 echo"$pnumber";
 echo"$password";
 
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
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $description=$row['description'];
                $image_name=$row['image_name'];
                

            
            }
            else
            {
                //Redirect to home page
                header('location:'.SITEURL);
            }
        }
        else
        {
            //Redirect to home page
            header('location:'.SITEURL);
        }


    ?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="containero">
            
            <h2 class="text-center text-red">Fill this form to confirm your order.</h2>
            
            <!-- <form action="PaytmKit/pgRedirect.php" method="POST" class="order"> -->
            <form action="#" method="POST" class="order">
                <fieldset>
                    <legend >Selected Food</legend>
                  
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
                        <h3 class="colour"><?php echo $title;?></h3>
                        <input type="hidden" name="food" class="colour"value="<?php echo $title?>">
                        <input type="hidden" name="order_id" value="<?php echo "ORDS" .rand(10000,99999999);?>">
                        <p class="food-price"><?php echo $price;?></p>
                        <input type="hidden" name="price"class="colour" value="<?php echo $price?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value=1 required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <?php
                    $sql="SELECT * FROM tbl_reg WHERE mobile= '$pnumber'";

            
                    // //3.excute the Query
                    $res=mysqli_query($conn,$sql);
        
                    // //4.count row to check wether the user exist or not
                    $count =mysqli_num_rows($res) ;
                    if($count>0)
                    {    $rows = mysqli_fetch_assoc($res);
                        $email=$rows['email'];
                        $name=$rows['username'];
                      
                        // echo  $newemail;
                    }    
                    ?>
                    <legend  >Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="Enter your Name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="Enter your phone number" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email"  placeholder="Enter your Email"  class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="Enter your Address" class="input-responsive" required></textarea>
                    <br>
                   

                 <input type="submit" name="submit" value="click"  >
                 <br><br>
                 <a href="<?php echo SITEURL;?>payment.php" class="btn btn-primary">Submit</a>
                 
                </fieldset>
  </form>
           
          
           

            <?php
                //check whether submit buttom is clicked or not
                if(isset($_POST['submit']))
                {
                    //Get all the deatial from form
                    $food =$_POST['food'];
                    $prices =$_POST['price'];
                    $qty = $_POST['qty'];
                    $total = (int)$qty * (int)$prices  ;//total =price*qty
                    $order_date= date("y-m-d h:i:sa");//order date
                    $status = "Ordered";//Orderd, on delivery, delivered,cancled
                    $customer_name =$_POST['full-name'];
                    $customer_contact =$_POST['contact'];
                    $customer_email =$_POST['email'];
                    $customer_address =$_POST['address'];


                    $_SESSION['food'] =  $food;
                    $_SESSION['qty'] =  $qty;
                    $_SESSION['prices'] = $total;
                    $_SESSION['image_name'] = $image_name;
                    $_SESSION['customer_name'] =$customer_name;
                    $_SESSION['customer_address'] =$customer_address;

                    //save the order in database
                    $sql2= "INSERT INTO tbl_order SET
                        food='$food',
                        price=$prices,
                        qty = '$qty',
                        total= $total,
                        order_date='$order_date',
                        status='$status',
                        customer_name='$customer_name',
                        customer_contact='$customer_contact',
                        password ='$password',
                        customer_email='$customer_email',
                        customer_address='$customer_address'
                        ";
                        
                        $res2=mysqli_query($conn,$sql2);
                        //check wether quaey is excute or not
                        if($res2=TRUE)
                        {   
        
                           
                    
                            //orded saved
                            $_SESSION['order']="<div class='success text-center'>Food Ordered Successfully.</div>";
                            //Redirect to home page
                            

                        }
                        else
                        {
                            //falied to save ordered
                            $_SESSION['order']="<div class='error text-center'>Failed to Order Food.</div>";
                            //Redirect to home page
                           header('location:'.SITEURL);
                        }

                      ?>
                      <?php

                    
                }
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
  
    ?>

    <?php include('partials-front/footer.php'); ?>