<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
        if(isset($_SESSION['add'])){//checking the session set or not
            echo $_SESSION['add'];  //displaying session massageS if set
            unset($_SESSION['add']);//removing session message
          }
        ?>
         
         
        <form action="" method ="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter Your Name">
                    </td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td>
                        <input type="text" name="username" placeholder="Enter your Username">
                    </td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Your password">
                </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit"name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
            
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<br>

<?php
//process the from form and save it in database
//check whether the button is clicked or not
if(isset($_POST['submit']))
{
    //echo "Button clicked";

    //get the data from form
     $full_name=$_POST['full_name'];
     $username=$_POST['username'];
     $password=md5($_POST['password']);//md5 is password encrypation
     //sql save data in database
     $sql = "INSERT INTO tbl_admin SET
     full_name='$full_name',
     username='$username',
     password='$password'
     ";
    //Executing Query and saving data in Database
    $res = mysqli_query($conn,$sql) or die (mysqli_error());

    //check wether the (Query is excuted) data in inserted or not and display appopriate message
    if($res==TRUE)
    {
       // echo "data inserted";

       //session variable display massage
       $_SESSION['add']="Admin Added Successfully";
       //redirect page IN Mange admin
       header("location:".SITEURL.'admin/mange-admin.php');
    }
    else
    {
      //  echo "data not inserted";
       //session variable display massage
       $_SESSION['add']="Failed to Add Admin";
       //redirect page to Add admin
       header("location:".SITEURL.'admin/add-admin.php');
    }
}

?>
