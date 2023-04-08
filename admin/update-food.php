<?php include('partials/menu.php'); ?>

<?php
    if(isset($_GET['id']))
    {
        //Get the id and other details
        $id=$_GET['id'];
        //create sql query to get other details
        $sql="SELECT * FROM tbl_food WHERE id=$id";
        //Execute the query
        $res = mysqli_query($conn,$sql);
        //get the value
        $row= mysqli_fetch_assoc($res);
            $title=$row['title'];
            $description=$row['description'];
            $price=$row['price'];
            $current_image=$row['image_name'];
            $restaurant=$row['restaurant'];
            $current_category=$row['category_id'];
            $veg=$row['veg'];
            $featured=$row['featured'];
            $active=$row['active'];
            $popular=$row['popular'];
          
    }       
    else
    {
        //redirect to manage  category
        header('location:'.SITEURL.'admin/manage-food.php');
        

    }
  
                  
?>

<div class="main-contant">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" methed ="post" enctype="multipart-data">
            <table class="tbl-30">
           
            <?php
              echo "Work ";  
            ?>
          
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title;?>">
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                   <textarea name="description"  cols="30" rows="5"><?php echo $description;?></textarea>
                </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td>
                    <input type="number" name="price"value="<?php echo $price;?>">
                </td>
            </tr>
            <tr>
                <td>Current Image:</td>
                <td>
                    <?php 
                        //Check our image name is available or not
                        if($current_image!="")
                        {
                        ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?> " width = "200px">
                        <?php
                        }
                        else
                        {
                        echo "<div class='error'>Image not Added.</div>";
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Select New Image:</td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
         
            <tr>
                <td>Category:</td>
                <td>
                  <select name="category" >
                   <?php
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
                                $category_id=$row['id'];
                                $category_title=$row['title'];
                                
                                //echo "<option value='$category_id'>$category_title</option>";
                                ?>
                                <option <?php if($current_category==$category_id){echo "seleted"; }  ?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                <?php
                            }
                          
                        } 
                        else
                        {
                            //we do not have category
                          
                            echo "<option value='0'>No Category Found </option>";
                             
                        }
                     ?>
                               
                        </select>
                        </td>
                       </tr>
                       <tr>
                        <td>Restaurant_name:</td>
                        <td>
                            <input type="text" name="restaurant" value="<?php echo $restaurant;?>">
                        </td>
                       </tr>
                       <tr>
                            <td>Veg:</td>
                            <td>
                                <input <?php if($veg=="Yes"){echo "checked";} ?> type="radio"name="veg" value="Yes">Yes
                                <input  <?php if($veg=="No"){echo "checked";} ?> type="radio"name="veg" value="No">No
                            </td>
                        </tr>
                        <tr>
                            <td>Featured:</td>
                            <td>
                                <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio"name="featured" value="Yes">Yes
                                <input  <?php if($featured=="No"){echo "checked";} ?> type="radio"name="featured" value="No">No
                            </td>
                        </tr>
                        <tr>
                            <td>Active:</td>
                            <td>
                                <input <?php if($active=="Yes"){echo "checked";} ?> type="radio"name="active" value="Yes">Yes
                                <input <?php if($active=="No"){echo "checked";} ?> type="radio"name="active" value="No">No
                            </td>
                        </tr>
                        <tr>
                            <td>Popular-Dish:</td>
                            <td>
                                <input <?php if($popular=="Yes"){echo "checked";} ?> type="radio"name="popular" value="Yes">Yes
                                <input  <?php if($popular=="No"){echo "checked";} ?> type="radio"name="popular" value="No">No
                            </td>
                        </tr>
                       <tr>
                        <td >
                            <input type="hidden" name ="id" value= "<?php echo $id ;?>">
                            <input type="hidden" name ="current_image" value="<?php echo $current_image;?>">
                            <input type="submit" name ="submit" value="Update Food" class="btn-secondary">
                      
       
                      </tr>
                      
            </table>
        </form>
      
        <?php

  
            if(isset($_POST['submit']))
            {  
                //echo " buton is clicked";
                //1. Get all the details from the form
                $id=$_POST['id'];
                $title=$_POST['title'];
                $description=$_POST['description'];
                $price=$_POST['price'];
                $current_image=$_POST['current_image'];
                $restaurant=$_POST['restaurant'];
                $category=$_POST['category'];
                $veg=$_POST['veg'];
                $featured=$_POST['featured'];
                $active=$_POST['active'];
                $popular=$_POST['popular'];

                //2. uplode the image is seleted
                //check whether uplode button is clicked or not
                if(isset($_FILES['image']['name']))
                {
                    //get the image datails
                    $image_name=$_FILES['image']['name'];
 
                    //check image is avaible or not
                    if($image_name!="")
                    {
                        //image aviable
                        //uplode the new image


                     //a.Auto rename our image
                        //Get the Extension of our image(jpg,png,gif,etc)e.g."spcailfood1.jpg"
                        $ext =end(explode('.', $image_name));

                        //Rename the image
                        $image_name = "Food-Name".rand(000,999).'.'.$ext;//e.g.Food_Category_345.jpg

                        $src_path=$_FILES['image']['tmp_name'];
                        $dest_path="../images/food/".$image_name;

                        //Finally upload the image
                        $upload=move_uploaded_file($src_path,$dest_path);

                        //check whether the image is uploded or not
                        //and if the image is not uploded then we will stop the process and redirect with error
                        if($upload==false)
                        {
                            //set massege
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            //Redirect to add category page
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //stop the process
                            die();
                        }
                         //3. remove the image and uploded and current image is exist
                        //b.remove the Current image if available
                        if($current_image!="")
                        {
                            $remove_path= "../images/food/".$current_image;
                            $remove= unlink($remove_path);
                           //check whether the image is removed or not
                           //and if the image is not removed then we will stop the process and redirect with error
                            if($remove==false)
                            {
                                //set massege
                                $_SESSION['failed-remove']="<div class='error'>Failed to remove Image.</div>";
                                //Redirect to add category page
                                header('location:'.SITEURL.'admin/manage-category.php');
                                //stop the process
                           }    die();

                        }
                        
                    }
                    else
                    {
                        $image_name=$current_image;
                    }   
                }
                else
                {
                    $image_name=$current_image;
                
                }
                
               
                //4.update the food in database
                $sql3="UPDATE tbl_food SET
                title='$title',
                description='$description',
                price=$price,
                image_name='$image_name',
                restaurant= '$restaurant',
                category_id= '$category',
                veg='$veg',
                featured='$featured',
                active='$active',
                popular='$popular'
                ";
                // Excute the Quary in save and database
                  $res3 = mysqli_query($conn,$sql3);

                //check whether the quary excuted or not data store or not
                //4.redirect with massage
                if($res3==TRUE)
                {
                    //Quary excuted food updated
                    $_SESSION['update']="<div class ='success'>Food Updated Successfully.</div>";
                    //redirect to manage food page
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                else
                {
                    //failed to add
                    $_SESSION['update']="<div class ='error'>Failed to Update Food.</div>";
                    //redirect to manage category page
                    header('location:'.SITEURL.'admin/manage-food.php');
                }
                echo "Work ADDED";   
            }
            else{
                echo "NO FOOD ADDED";
            }
        ?>

    </div>

</div>


   <?php include('partials/footer.php'); ?>