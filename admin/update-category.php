<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <?php
          if(isset($_GET['id']))
          {
              //Get the id and other details
              $id=$_GET['id'];
              //create sql query to get other details
              $sql="SELECT * FROM tbl_category WHERE id=$id";
              //Execute the query
              $res = mysqli_query($conn,$sql);
              //count the row to check wheter id valid or not 
              $count= mysqli_num_rows($res);

                if($count==1)
                {
                     $row= mysqli_fetch_assoc($res);
                     $title=$row['title'];
                     $description=$row['description'];
                     $current_image=$row['image_name'];
                     $restaurant=$row['restaurant'];
                     $veg=$row['veg'];
                     $featured=$row['featured'];
                     $active=$row['active'];
                     $Special_food=$row['Special_food'];
                     

                    
                }
                else
                {
                    $_SESSION['no-category-found']="<div class='error'>Failed to category found.</div>";
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
          }
          else
          {
              //redirect to manage  category
              header('location:'.SITEURL.'admin/manage-category.php');
          }

        ?>

        <!--update category form starts-->
        <form action=""method="POST" enctype="multipart/form-data">
            <table class='tbl-30'>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text"name="title" value="<?php echo $title ?>">
                    </td>
                </tr>
                <tr>
                    <td>Description:</td>
                    <td>
                        <input type="text"name="description" value="<?php echo $description ?>">
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
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $current_image; ?> " width ="200px" >
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
                    <td>New Image:</td>
                    <td>
                        <input type="file" name ="image">
                    </td>
                </tr>
                <tr>
                    <td>Restaurant_Name:</td>
                    <td>
                    <select name="restaurant">
                              <?php
                                    //display category from database
                                    //1.create sql to get all active category from database
                                    $sql="SELECT * FROM tbl_restaurants Where active ='Yes'";
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
                                            $r_name=$row['r_name'];
                                            ?>
                                            <option><?php echo $r_name; ?></option>
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
                    <td>Special_food:</td>
                    <td>
                        <input <?php if($Special_food=="Yes"){echo "checked";} ?> type="radio"name="Special_food" value="Yes">Yes
                        <input <?php if($Special_food=="No"){echo "checked";} ?> type="radio"name="Special_food" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="image_name" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name ="submit" value="Update Category" class=btn-secondary>
                    </td>
                </tr>

            </table>
        </form>

        <?php
            if(isset($_POST['submit']))
            {
               // echo "clicked";
               //1.Get all the value from our form
               $id=$_POST['id'];
               $title=$_POST['title'];
               $description=$_POST['description'];
               $current_image=$_POST['image_name'];
               $restaurant=$_POST['restaurant'];
               $veg=$_POST['veg'];
               $featured=$_POST['featured'];
               $active=$_POST['active'];
               $Special_food=$_POST['Special_food'];

               //2.updating New image if selected
               //check wether the image is selected or not
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
                        $image_name = "Food_Category_".rand(000,999).'.'.$ext;//e.g.Food_Category_345.jpg

                        $source_path=$_FILES['image']['tmp_name'];
                        $destination_path="../images/category/".$image_name;

                        //Finally upload the image
                        $upload=move_uploaded_file($source_path,$destination_path);

                        //check whether the image is uploded or not
                        //and if the image is not uploded then we will stop the process and redirect with error
                        if($upload==false)
                        {
                            //set massege
                            $_SESSION['upload']="<div class='error'>Failed to Upload Image.</div>";
                            //Redirect to add category page
                            header('location:'.SITEURL.'admin/manage-category.php');
                            //stop the process
                            die();
                        }
                        //b.remove the Current image if available
                        if($current_image!="")
                        {
                            $remove_path= "../images/category/".$current_image;
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
                            die();

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


               //3.update the database
               $sql2="UPDATE tbl_category SET
                    title= '$title',
                    description= '$description',
                    image_name= '$image_name',
                    restaurant= '$restaurant',
                    veg= '$veg',
                    featured= '$featured',
                    active='$active',
                    Special_food='$Special_food'
                    WHERE id=$id
               ";

               $res2=mysqli_query($conn,$sql2);

               //4.redirect to manage category with massage
               //check whather excuted or not
               if($res2==true)
               {
                   //category updated
                   $_SESSION['update']="<div class='sussess'>Category updated Successfully.</div>";
                //    header('location:'.SITEURL.'admin/manage-category.php');
                   echo "FOOD UPDATE SUCCESFULLY" ;
               }
               else
               {
                   //failed to update
                   $_SESSION['update']="<div class='error'>Faild to Update Category.</div>";
                   header('location:'.SITEURL.'admin/manage-category.php');
               }
           
           
            }

            echo "Work ";   
        }
        else{
            echo " no Work ";   

        }
        ?>



    </div>
 </div>
       


   <?php include('partials/footer.php'); ?>