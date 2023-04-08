
<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Restaurants</h1>
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
                        <input type="text" name="r_name" placeholder="Enter Restaurants Name">
                    </td>
                </tr>

                <tr>
                    <td>Contact</td>
                    <td>
                        <input type="text" name="r_contact" placeholder="Enter Contact">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="r_email" placeholder="Enter Email">
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
                    <td>Address</td>
                    <td>
                        <input type="text" name="r_address" placeholder="Enter Address">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit"name="submit" value="Add Restaurants" class="btn-secondary">
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
     $r_name=$_POST['r_name'];
     $r_contact=$_POST['r_contact'];
     $r_email=$_POST['r_email'];
     $active=$_POST['active'];
     $r_address=$_POST['r_address'];
    
     //sql save data in database
     $sql = "INSERT INTO tbl_restaurants SET
     r_name='$r_name',
     r_contact='$r_contact',
     r_email='$r_email',
     active='$active',
     r_address='$r_address' 
     ";
    //Executing Query and saving data in Database
    $res = mysqli_query($conn,$sql) or die (mysqli_error());

    //check wether the (Query is excuted) data in inserted or not and display appopriate message
    if($res==TRUE)
    {
       // echo "data inserted";

       //session variable display massage
       $_SESSION['add']="restaurants Added Successfully";
       //redirect page IN Mange admin
       header("location:".SITEURL.'admin/manage-restaurants.php');
    }
    else
    {
      //  echo "data not inserted";
       //session variable display massage
       $_SESSION['add']="Failed to Add restaurants";
       //redirect page to Add admin
       header("location:".SITEURL.'admin/add-restaurants.php');
    }
}

?>