<?php 

//include constants file
include('../config/constants.php');

    //check whether the id and image_name value set or not
    if(isset($_GET['id'])AND isset($_GET['image_name']))
    {
        //1.Get the value and delete
        //echo "get value and delete";
        $id=$_GET['id'];
        $image_name=$_GET['image_name'];

        //Remove the physical image file is available
        if($image_name=="")
        {
            $path="../images/food/".$image_name;
            //remove image
            $remove= unlink($path);
            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session massege
               // $_SESSION['remove'] = "<div class='error'>Failed to remove food image</div>";
                //redirect to manage food page
                //header('location:'.SITEURL.'admin/manage-food.php');
                //stop the process
                //die();
                 //2.Delete data from database
                    $sql = "DELETE FROM tbl_food WHERE id=$id";
                    $res = mysqli_query($conn,$sql);
                    //check for the data is deleted or not database
                    if($res==TRUE)
                    {
                        $_SESSION['detete'] = "<div class='success'>Food deleted successfully</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }
                    else
                    {
                        $_SESSION['detete'] = "<div class='error'>failed to Deleted food</div>";
                        header('location:'.SITEURL.'admin/manage-food.php');
                    }
            }

        }

        //2.Delete data from database
        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        //check for the data is deleted or not database
        if($res==TRUE)
        {
            $_SESSION['detete'] = "<div class='success'>Category deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }
        else
        {
            $_SESSION['detete'] = "<div class='error'>failed to Deleted food</div>";
            header('location:'.SITEURL.'admin/manage-food.php');
        }

    }
    else
    {
        //redirect to manage food page
        header('location:'.SITEURL.'admin/manage-food.php');
    }

?>