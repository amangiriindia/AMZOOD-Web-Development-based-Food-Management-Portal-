<?php include('partials-front/menu.php'); ?>
<?php
   $restaurant =$_GET['name'];

?>
 <!-- fOOD sEARCH Section Starts Here -->
 <section class="food-search text-center">
        <div class="container">
            <h1 data-aos="flip-up-right">Welcome to AMZOOD</h1>
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
        if(isset($_SESSION['add'])){//checking the session set or not
            echo $_SESSION['add'];  //displaying session massageS if set
            unset($_SESSION['add']);//removing session message
          }
        ?>
<!-- home section starts  -->

<section class="home" id="home" data-aos="fade-up">

<div class="content" data-aos="zoom-in">
   
    <div class="waviy">
    <span style="--i:1">H</span>
    <span style="--i:2">A</span>
    <span style="--i:3">P</span>
    <span style="--i:4">P</span>
    <span style="--i:5">Y</span>
    <span style="--i:6"><span>
    <span style="--i:7">H</span>
    <span style="--i:8">o</span>
    <span style="--i:9">L</span>
    <span style="--i:10">Y</span>

    </div>
    <p>Holi is a popular ancient Hindu festival, also known as the "Festival of Love", the "Festival of Colours" and the "Festival of Spring". The festival celebrates the eternal and divine love of Radha Krishna.</p>
    <a href="#"><button class="fbtn">get started</button></a>
</div>

<div class="shape"></div>

</section>

<!-- home section ends -->

   
    <?php
    if(isset($_SESSION['order']))
    {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }

    if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
    ?>
 <!-- speciality section starts  -->
 
<section class="speciality" id="speciality" data-aos="fade-up-right">

<h1 class="heading"> <span> our speciality </span> </h1>

<div class="box-container">
    <?php
     
      //Create SQl Query to Display category from database
      $sql= "SELECT * FROM tbl_category  WHERE active='Yes'AND featured='Yes' AND Special_food ='Yes' AND restaurant= '$restaurant' ";
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
              $image_name=$row['image_name'];
              $description=$row['description'];
             ?>   
             <div class="box">
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
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>" alt="" data-aos="flip-right">
                            <?php
                        }
                    ?>
            
                        <div class="info">
                            <h3><?php echo $title; ?></h3>
                            <p><?php echo $description; ?></p>
                            <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id ?>"><button class="fbtn"> check out </button></a>
                        </div>
            
              </div>
              <?php
           }
        }
  ?>
   

   

</div>

<div class="icons-container" data-aos="zoom-in-up">

    <div class="icons">
        <i class="fas fa-shipping-fast"></i>
        <h3>fast delivery</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quisquam.</p>
    </div>

    <div class="icons">
        <i class="fas fa-tags"></i>
        <h3>heavy discounts</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quisquam.</p>
    </div>

    <div class="icons">
        <i class="fas fa-hand-holding-usd"></i>
        <h3>money returns</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quisquam.</p>
    </div>

    <div class="icons">
        <i class="fas fa-headset"></i>
        <h3>24 x 7 support</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, quisquam.</p>
    </div>

</div>

</section>

<!-- speciality section ends -->
<!-- newsletter section starts  -->

<section class="newsletter" data-aos="fade-up-left">

    <h1>newsletter</h1>
    <p>subscribe for latest updates</p>    
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" value="subscribe">
    </form>

</section>

<!-- newsletter section ends -->
<!-- dish popolar section starts  -->

<section class="dish" id="dish" data-aos="fade-up-right">

<h1 class="heading"> <span> popular dishes </span> </h1>

<div class="image-container" data-aos="fade-left">
  <?php
   
        //Create SQl Query to Display Food from database
        $sql2= "SELECT * FROM tbl_food  WHERE active='Yes'AND featured='Yes' AND popular='Yes' AND restaurant= '$restaurant' ";
        //Execute the Query
        $res2=mysqli_query($conn,$sql2);
        $count2=mysqli_num_rows($res2);
        if($count2>0)
        {
           while($row = mysqli_fetch_assoc($res2))
           {
               //Get the value like id ,tittle ,image_name
               $id=$row['id'];
               $title=$row['title'];
               $image_name=$row['image_name'];
               ?>
                <div class="image sandwich">
                  <?php
                     //check whether image is aviable or not
                        if($image_name=="")
                        {
                            //Display the image not avialale
                            echo "<div class= 'error'>Image not Available</div>";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="" >
                            <?php
                        }
                    ?>
                
                
                    <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id;?>"><?php echo $title; ?> </a>
                </div>
             <?php
           }
        }           
  ?> 

 </div>

 </section>

 <!-- dish popular section ends -->
 

    <!-- CAtegories Section Starts Here -->
    <section>
    <h2 class="text-center">Explore Foods</h2>
        <div class="ccontainer">
       

            <?php
                //Create SQl Query to Display category from database
                $sql= "SELECT * FROM tbl_category  WHERE active='Yes'AND featured='Yes' AND restaurant= '$restaurant'";
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
                        $image_name=$row['image_name'];
                        ?>

                        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id ?>">
                            <div class="ccontainer1">
                                <div class="cfront">
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
                                                <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name; ?>"  idata-aos="flip-right">
                                            <?php
                                            }
                                    ?>
                                </div>
                                <div class="cback">
                                    <h1><?php echo $title; ?></h1>
                                </div>
                            </div>  
                            <?php
                    }
                }
            ?>

        </div>
    </section>
    
    <!-- Categories Section Ends Here -->

    
    <!-- chef section starts  -->

  <section class="chef" id="chef"data-aos="fade-in-up">

<h1 class="heading"> <span> expert chefs </span> </h1>

<div class="box-container" data-aos="zoom-in">

    <div class="box">
        <img src="images/chef1.jpg" alt="">
        <div class="info">
            <h3>john deo</h3>
            <span>head chef</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-pinterest"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-twitter"></a>
            </div>
        </div>
    </div>

    <div class="box" data-aos="zoom-in">
        <img src="images/chef2.jpg" alt="">
        <div class="info">
            <h3>john deo</h3>
            <span>head chef</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-pinterest"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-twitter"></a>
            </div>
        </div>
    </div>

    <div class="box" data-aos="zoom-in">
        <img src="images/chef3.jpg" alt="">
        <div class="info">
            <h3>john deo</h3>
            <span>head chef</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-pinterest"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-twitter"></a>
            </div>
        </div>
    </div>

    <div class="box" data-aos="zoom-in">
        <img src="images/chef4.jpg" alt="">
        <div class="info">
            <h3>john deo</h3>
            <span>head chef</span>
            <div class="share">
                <a href="#" class="fab fa-facebook-f"></a>
                <a href="#" class="fab fa-pinterest"></a>
                <a href="#" class="fab fa-instagram"></a>
                <a href="#" class="fab fa-twitter"></a>
            </div>
        </div>
    </div>

</div>

</section>

<!-- chef section ends -->
    <!-- about section starts  -->

<section class="about" id="about">

<h1 class="heading"> <span> about us </span> </h1>

<div class="row" data-aos="fade-left">

    <div class="content ">
        <h3>lets satisfy your hunger with our tasty dishes</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta suscipit animi, aut veniam itaque non consequuntur reiciendis eveniet doloremque! Laboriosam?<br>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi, vel.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusantium natus ad voluptatum, voluptates illum animi voluptatibus omnis neque error unde!</p>
        <a href="#"><button class="btn">learn more</button></a>
    </div>

    <div class="image" data-aos="flip-left">
        <img src="images/girl-chef.png" alt="">
    </div>

</div>

</section>

<!-- about section ends -->

   
    <?php include('partials-front/footer.php'); ?>
    <!-- jquery cdn link  -->
    
