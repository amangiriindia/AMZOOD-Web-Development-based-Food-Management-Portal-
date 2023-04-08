<?php
  include('partials/menu.php'); 


//include costant.php
include('../config/constants.php');

//1. get the id admin delete
 $id = $_GET['id']; 
//2.create sql in delete admin]
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Exucute the Query
$res = mysqli_query($conn,$sql);
if($res==TRUE)
    {
       

       //session variable deleted
       $_SESSION['delete']="<div class ='succ'>Admin Deleted Successfully.</div>";
       //redirect page IN Mange admin
       header("location:".SITEURL.'admin/mange-admin.php');
    }
    else
    {
     
       
       $_SESSION['detete']="<div class='error'>Failed to Delete Admin</div>";
       //redirect page to Add admin
       header("location:".SITEURL.'admin/add-admin.php');
    }
//3.redirect to Mange Admin page with massage

?>
<?php include('partials/footer.php'); ?>
