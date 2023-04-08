<?php include('partials-front/menu.php'); ?>

 <!-- fOOD sEARCH Section Starts Here -->
 <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
 
    <!-- login page start here-->
    <br><br><br>
    
        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
      ?>

                

            <br> <br>
        <form action=""method="POST" class="text-center">
            <label style= 'color:#FF69B4;'>Enter Your Order Details:</label><br>
            <br><br>
            <label style= 'color: #2F4F4F;'>Name:</label><br>
            <input type="text"name="name"placeholder="E.g. Aman Giri"><br>

            <label style= 'color: #2F4F4F;'>Contact Number:</label><br>    
            <input type="text"name="contact"placeholder="E.g. 7070XXXXXX"><br><br>
            <input type="submit"name="submit"value="Login">
    
  
   <!-- login page end here-->

   <?php
        //check submit button
        if(isset($_POST['submit']))
        { 
            //1.get the data from login form
            $name=$_POST['name'];
            $contact=md5($_POST['contact']);
            //2.SQL to check whether the user with username and password exist or not
            $sql="SELECT * FROM tbl_order WHERE customer_name ='$name' OR customer_contact='$contact'";

            
            //3.excute the Query
            $res=mysqli_query($conn,$sql);

            //4.count row to check wether the user exist or not
            $count=mysqli_num_rows($res);
            if($count>0)
            {
                $row = mysqli_fetch_assoc($res);

                $food = $row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];
               //user available and login sussess
                $_SESSION['login']= "";
                //redirect to homepage /dashboard
                header('location:'.SITEURL."login-update.php?customer_contact= $customer_contact&customer_name=$customer_name");
                

            } 
            else
            {
                $_SESSION['login']= "<label style= 'color: red;'>  ORDER NOT FOUND </label>";
                //redirect to homepage /dashboard
                header('location:'.SITEURL.'login.php');  
            }
                

        }

        
   ?>

<br><br><br>
<?php

session_start();
$_SESSION['customer_name'] =  $customer_name;
$_SESSION['customer_contact'] =  $customer_contact;

?>


<?php include('partials-front/footer.php'); ?>