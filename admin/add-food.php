<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Food</h1>
        <br><br>
        <?php
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset ($_SESSION['upload']);
            }
        ?>
        <!--Add food form starts-->
        <form action=""method="POST" enctype="multipart/form-data">
            <table class='tbl-30'>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text"name="title"placeholder="Food Title">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <textarea name="description"  cols="30" rows="5" placeholder="Description The Food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                    <input type="number" name="price" >
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                       <select name="category">
                              <?php
                                    //display category from database
                                    //1.create sql to get all active category from database
                                    $sql="SELECT * FROM tbl_category Where active ='Yes'";
                                    //Executing Query
                                    $res=mysqli_query($conn,$sql);
                                    //count rows to wether we have categories or not
                                    $count = mysqli_num_rows($res);
                                    if($count>0)
                                    {
                                        //WE have category
                                        while($row=mysqli_fetch_assoc($res))
                                        {
                                            //get the details of categories
                                            $id=$row['id'];
                                            $title=$row['title'];
                                            $restauran=$row['restaurant'];
                                            ?>
                                            <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                            <?php
                                        }
                                    } 
                                    else
                                    {
                                        //we do not have category
                                        ?>
                                        <option value="0">No Category Found </option>
                                        <?php
                                    }
                               ?>
                               
                          </select>
                    </td>
                </tr>
                <tr>
                    <td>Restaurant-Name:</td>
                    <td>
                        <input type="text"name="restaurant" value="<?php echo $restauran;?>">
                    </td>
                </tr>
                <tr>
                    <td>Veg:</td>
                    <td>
                        <input type="radio"name="veg" value="Yes">Yes
                        <input type="radio"name="veg" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio"name="featured" value="Yes">Yes
                        <input type="radio"name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio"name="active" value="Yes">Yes
                        <input type="radio"name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Popular-Dish:</td>
                    <td>
                        <input type="radio"name="popular" value="Yes">Yes
                        <input type="radio"name="popular" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name ="submit" value="Add Food" class=btn-secondary>
                    </td>
                </tr>

            </table>
        </form>

        <!--Add food form ends-->

        <?php
            //check whether button is clicked or not
            if(isset($_POST['submit']))
            {
                //add the food in database
                //echo "clicked";

                //1.get the data from form
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $restaurant=$_POST['restaurant'];
                $category=$_POST['category'];
                
                //check whether radio buttom is click or not
                if(isset($_POST['veg']))
                {
                    $veg=$_POST['veg'];
                }
                else
                {
                    $veg="No";
                }
                if(isset($_POST['featured']))
                {
                    $featured=$_POST['featured'];
                }
                else
                {
                    $featured="No";
                }
                if(isset($_POST['active']))
                {
                    $active=$_POST['active'];
                }
                else
                {
                    $active="No";
                }
                if(isset($_POST['popular']))
                {
                    $popular=$_POST['popular'];
                }
                else
                {
                    $popular="No";
                }
                //2.uplode the image if selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of selected image
                    $image_name=$_FILES['image']['name'];
                    //check the image is selected otr not and uplode the image only if selected
                    if($image_name!="")
                    {
                        //image is setected
                        //A.rename the image
                        //Get the Extension of our image(jpg,png,gif,etc)e.g."spcailfood1.jpg"
                         $tmp = explode('.', $image_name);
                        $ext = end($tmp);

                        //Rename the image
                        $image_name = "Food-name-".rand(000,999).'.'.$ext;//e.g.Food-name-345.jpg

                        //B.Uplode the image

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../images/food/".$image_name;
    
                        //Finally upload the image
                        $upload=move_uploaded_file($source_path,$destination_path);

                       
                        //check whether the image is uploded or not
                        //and if the image is not uploded then we will stop the process and redirect with error
                        if($upload==false)
                        {
                            //set massege
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            //Redirect to add category page
                            header('location:'.SITEURL.'admin/add-food.php');
                            //stop the process
                            die();
                        } 


                          //upload the only image is selected
               





                       
                    }
                }
                else
                {
                    $image_name="";
                }

                //3.insert in database
                $sql2=" INSERT INTO tbl_food SET
                title='$title',
                description='$description',
                price=$price,
                image_name= '$image_name',
                restaurant='$restaurant',
                category_id= $category,
                veg='$veg',
                featured='$featured',
                active='$active',
                popular='$popular'

                ";
                // Excute the Quary in save and database
                $res2 = mysqli_query($conn,$sql2);

                //check whether the quary excuted or not data store or not
                //4.redirect with massage
                if($res2==TRUE)
                {
                    //Quary excuted caregory added
                    $_SESSION['add']="<div class ='success'>Food Added Successfully.</div>";
                    //redirect to manage category page
                 //   header('location:'.SITEURL.'admin/manage-food.php');
                 echo "<label style= 'color: green;'>Food Added Successfully Go to Back. </label>";
                }
                else
                {
                    //failed to add
                    $_SESSION['add']="<div class ='error'>Failed to Add Food.</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'admin/add-food.php');
                }
                   
            } 
        ?>
       



    </div>
</div>

<?php include('partials/footer.php'); ?>