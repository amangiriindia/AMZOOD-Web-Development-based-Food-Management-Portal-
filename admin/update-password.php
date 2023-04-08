<?php include('partials/menu.php'); ?>
<div class = "main-content">
    <div class="wrapper">
        <h1>Change Password</h1>
        <br><br>

        <?php 
           if(isset($_GET['id'])){
            $id = $_GET['id']; 
           }
        
        ?>

        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                <td>Current Password:</td>
                    <td>
                        <input type="password" name="current_password" placeholder= "current password">
                    </td>
                </tr>
                <tr>
                <td>new Password:</td>
                    <td>
                        <input type="password" name="new_password" placeholder= "new password">
                    </td>
                </tr>
                <tr>
                <td>confirm Password:</td>
                    <td>
                        <input type="password" name="confirm_password" placeholder= "confirm password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id?>"> 
                       <input type="submit" name="submit" value="Change password " class ="btn-secondary">
                    </td>
                </tr>

               
            </table>
        </form>
    </div>    
</div>

<?php
if(isset ($_POST['submit']))
{
    // echo "Buttom Clicked";
    //1.Get all the data from form
    $id=$_POST['id'];
    $current_password=md5($_POST['current_password']);
    $new_password=md5($_POST['new_password']);
    $confirm_password=md5($_POST['confirm_password']);

    //check whether the user with current Id and Current password Exisit or not
    $sql="SELECT * FROM tbl_admin WHERE id=$id or password ='$current_password'";

    $res = mysqli_query($conn,$sql);//executing Query
    

    if($res==TRUE)
         {
             $count=mysqli_num_rows($res);
             if($count==1)
             {
               // echo "user found";
                //will check whether the new password and confirm match or not
               if($new_password==$confirm_password)
                {
                 //update the password
                 $sql2="SELECT * FROM tbl_admin SET
                 password ='$new_password'
                 WHERE id=$id ";

                 $res2 = mysqli_query($conn,$sql2);//executing Query

                   if($res2==TRUE)
                    {
                     $_SESSION['change-pwd']="<div class='success'>Password change successfully</div>";
                     header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page
                    }
                    else
                     {
                      $_SESSION['change-pwd']="<div class='error'>Password did not change</div>";
                      header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page
                    }
                
               }
               else
               {
                 //Redirect to manage Admin with Error message
                 $_SESSION['not-match']="<div class='error'>Password Did not match</div>";
                 header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page
               }
                

        }
         else
         {
            $_SESSION['user-not-found']="<div class='error'>User Not Found.</div>";
            header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page
         }
             
     }
}   




?>

<?php include('partials/footer.php'); ?>