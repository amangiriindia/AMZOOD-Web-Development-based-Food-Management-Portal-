
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



    <!-- CAtegories Section Starts Here -->
    <section>
    <h2 class="text-center">Explore Foods</h2>
        <div class="ccontainer">
       

            <?php
                //Create SQl Query to Display category from database
                $sql= "SELECT * FROM tbl_category  WHERE active='Yes'AND featured='Yes' ";
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

    <?php include('partials-front/footer.php'); ?>