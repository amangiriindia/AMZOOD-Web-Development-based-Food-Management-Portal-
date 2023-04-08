<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }
        ?>

        <br><br>
        <!--Add category form starts-->
        <form action=""method="POST" enctype="multipart/form-data">
            <table class='tbl-30'>
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text"name="title"placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Desciption:</td>
                    <td>
                        <input type="text"name="description"placeholder="description">
                    </td>
                </tr>
                <tr>
                    <td>SelectImage:</td>
                    <td>
                        <input type="file"name="image">
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
                                            <option><?php echo $r_name;?></option>
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
                    <td>Special_food:</td>
                    <td>
                        <input type="radio"name="Special_food" value="Yes">Yes
                        <input type="radio"name="Special_food" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name ="submit" value="Add Category" class=btn-secondary>
                    </td>
                </tr>

            </table>
        </form>
        <!--Add category form ends-->
        <?php
        //Check Whether the submit buttom is clicked or not 
        if(isset($_POST['submit']))
        {
           // echo "clicked";

           //1. Get the value from categary form
           $title= $_POST['title'];
           $description= $_POST['description'];
           $restaurant= $_POST['restaurant'];
           //for redio input ,we need to check whether the buttom is selected or not
           if(isset($_POST['veg']))
           {
               //get the value from form 
               $veg=$_POST['veg'];
           }
           else
           {
               //set the dufault value
               $veg="No";
           }
            if(isset($_POST['featured']))
            {
                //get the value from form 
                $featured=$_POST['featured'];
            }
            else
            {
                //set the dufault value
                $featured="No";
            }

            if(isset($_POST['active']))
            {
                //get the value from form 
                $active=$_POST['active'];
            }
            else
            {
                //set the dufault value
                $active="No";
            }
            if(isset($_POST['Special_food']))
            {
                //get the value from form 
                $Special_food=$_POST['Special_food'];
            }
            else
            {
                //set the dufault value
                $Special_food="No";
            }

            //check whether image is selected or not 
            //print_r($_FILES['image']);
            //die();//break the code
            if(isset($_FILES['image']['name']))
            {
                //Uplode the image
                //to uoload the image we need image name ,source  and destination path
                $image_name=$_FILES['image']['name'];

                //upload the only image is selected
                if($image_name!="")
                {

                    //Auto rename our image
                    //Get the Extension of our image(jpg,png,gif,etc)e.g."spcailfood1.jpg"
                    $tmp = explode('.', $image_name);
                    $ext = end($tmp);

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
                        //Redirect to add category pages
                        header('location:'.SITEURL.'admin/add-category.php');
                        //stop the process
                        die();
                    }
              }
            }
            else
            {
                //don't upload image and set image name value is black
                $image_name="";
            }

            //2.Create SQL Query to insert category in to database
            $sql="INSERT INTO tbl_category SET
                title='$title',
                description='$description',
                image_name='$image_name',
                restaurant='$restaurant',
                veg='$veg',
                featured='$featured',
                active='$active',
                Special_food='$Special_food'
            ";
            //3. Excute the Quary in save and database
            $res = mysqli_query($conn,$sql);

            //4.check whether the quary excuted or not data store or not
            if($res==TRUE)
            {
                 //Quary excuted caregory added
                 $_SESSION['add']="<div class ='success'>Category Added Successfully.</div>";
                 //redirect to manage category page
                 header('location:'.SITEURL.'admin/manage-category.php');
            }
            else
            {
                //failed to add
                $_SESSION['add']="<div class ='error'>Failed to Add Category.</div>";
                 //redirect to manage category page
                 header('location:'.SITEURL.'admin/add-category.php');
            }
        

        }
        ?>


    </div>
</div>

<?php include('partials/footer.php'); ?>