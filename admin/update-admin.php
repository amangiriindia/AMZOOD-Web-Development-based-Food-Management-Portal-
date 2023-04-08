<?php include('partials/menu.php'); ?>

<div class = "main-content">
    <div class="wrapper">
        <h1>Update Admin</h1>
        <br><br>
        <?php
        //1.get the id of select admin
         $id = $_GET['id']; 
         //2.using sql to get the details
         $sql="SELECT * FROM tbl_admin WHERE id=$id";

         $res = mysqli_query($conn,$sql);//Excute

         if($res==TRUE)
         {
             //check whether the data is available or not
             $count =mysqli_num_rows($res);
             //check we have admin data or not
             if($count==1){
                 //echo "Admin available";
                 $rows = mysqli_fetch_assoc($res);

                 $full_name=$rows['full_name'];
                 $username=$rows['username'];

             //header("location:".SITEURL.'admin/mange-admin.php');
         }
         else
         {
          
            
          //  $_SESSION['detete']="<div class='error'>Failed to Delete Admin</div>";
            //redirect page to Add admin
            header("location:".SITEURL.'admin/add-admin.php');
         }
        }
        ?>

        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td>
                    <input type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="hidden" name="id" value="<?php echo $id?>"> 
                       <input type="submit" name="submit" value="Update Admin " class ="btn-secondary">
                    </td>
                </tr>

               
            </table>
        </form>
    </div>
</div>

<?php
//check whether the Submit Button is Clicked or not
if(isset ($_POST['submit'])){
   // echo "Buttom Clicked";
   //Get all the value from to update
   $id=$_POST['id'];
   $full_name=$_POST['full_name'];
   $username=$_POST['username'];

   //using sql to update Admin
   $sql="UPDATE tbl_admin SET
   full_name= '$full_name',
   username= '$username'
   WHERE id='$id'
   ";

 $res = mysqli_query($conn,$sql);//executing Query

 if($res==TRUE)
         {
             //check whether the data is available or not
             $_SESSION['update']="<div class='success'> Admin Updated Successfully.</div>";
             header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page
         }
         else{
            $_SESSION['update']="<div class='error'> Failed to Delete Admin.</div>";
            header("location:".SITEURL.'admin/mange-admin.php');//redirect manage admin page

         }
}
 ?>



<?php include('partials/footer.php'); ?>
