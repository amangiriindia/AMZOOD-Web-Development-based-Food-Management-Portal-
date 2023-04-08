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
            $path="../images/category/".$image_name;
            //remove image
            $remove= unlink($path);
            //if failed to remove image then add an error message and stop the process
            if($remove==false)
            {
                //set the session massege
               // $_SESSION['remove'] = "<div class='error'>Failed to remove category image</div>";
                //redirect to manage category page
                //header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                //die();
                 //2.Delete data from database
                    $sql = "DELETE FROM tbl_category WHERE id=$id";
                    $res = mysqli_query($conn,$sql);
                    //check for the data is deleted or not database
                    if($res==TRUE)
                    {
                        $_SESSION['detete'] = "<div class='success'>Category deleted successfully</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
                    else
                    {
                        $_SESSION['detete'] = "<div class='error'>failed to Deleted category</div>";
                        header('location:'.SITEURL.'admin/manage-category.php');
                    }
            }

        }

        //2.Delete data from database
        $sql = "DELETE FROM tbl_category WHERE id=$id";
        $res = mysqli_query($conn,$sql);
        //check for the data is deleted or not database
        if($res==TRUE)
        {
            $_SESSION['detete'] = "<div class='success'>Category deleted successfully</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }
        else
        {
            $_SESSION['detete'] = "<div class='error'>failed to Deleted category</div>";
            header('location:'.SITEURL.'admin/manage-category.php');
        }

    }
    else
    {
        //redirect to manage category page
        header('location:'.SITEURL.'admin/manage-category.php');
    }

?>