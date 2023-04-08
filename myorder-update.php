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


      <div class="main-content">
      <div class= "wrapper">
          <h1>Update Order</h1>
          <br><br>
  
          <?php
              //check whether id is set or not
              if(isset($_GET['id']))
              {
                  //Get the order Details
                  $id =$_GET['id'];
  
                  //sql quary to get details
                  $sql= "SELECT * FROM tbl_order  WHERE id=$id";
                  //Execute the Query
                  $res=mysqli_query($conn,$sql);
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
                     
                     
  
                  
                  } 
              }
              else
              {
                  //Redirect to manage page
                  header("location:".SITEURL);
              }
          ?>
  
          <form action="" method ="POST">
              <table class="tbl-30">
                  <tr>
                      <td>Food Name</td>
                      <td><b> <?php echo $food;?> </b></td>
                  </tr>
                  <tr>
                      <td>Price:</td>
                      <td><b> <?php echo $price;?> </b></td>
                  </tr>
                  <tr>
                    <td>Qty.</td>
                    <td>
                        <input type="number" name="qty" value ="<?php echo $qty;?>">
                    </td>
                </tr>
                  <tr>
                      <td>Status</td>
                      <td>
                          <select name="status" >
                          <option  <?php if($status=="Cancelled"){echo "selected";} ?>value="Cancelled">Cancelled</option>
                              <option <?php if($status=="Ordered"){echo "selected";} ?> value="Ordered">Ordered</option>
                              
                          </select>
                      </td>
                  </tr>
                  <tr>
                      <td>Customer Name:</td>
                      <td>
                          <input type="text" name = "customer_name" value ="<?php echo $customer_name;?>">
                      </td>
                  </tr>
                  <tr>
                      <td>Customer Contact:</td>
                      <td>
                          <input type="text" name = "customer_contact" value ="<?php echo $customer_contact;?>">
                      </td>
                  </tr>
                  <tr>
                  <tr>
                      <td>Customer Address:</td>
                      <td>
                          <textarea name="customer_address"  cols="30" rows="5"><?php echo $customer_address;?></textarea>
                      </td>
                  </tr>
                  <tr>
                      <td clospan ="2">
                          <input type="hidden" name ="id" value ="<?php echo $id;?>">
                          <input type="hidden" name ="price" value ="<?php echo $price;?>">
                          <input type="submit" name ="submit" value ="Update Order" class="btn-secondary">
                      </td>
                  </tr>
  
              </table>
  
          </form>
  
          <?php
              //check whether Update buttom is clicked or not
              if(isset($_POST['submit']))
              {
                 // echo "clicked";
                  //Get all the deatial from form
                 // $food =$_POST['food'];
                  $price =$_POST['price'];
                  
                  $total =$price * $qty;//total =price*qty
                  $qty =$_POST['qty'];
                  $status = $_POST['status'];//Orderd, on delivery, delivered,cancled
                  $customer_name =$_POST['customer_name'];
                  $customer_contact =$_POST['customer_contact'];
                  $customer_address =$_POST['customer_address'];
  
                  //save the order in database
                  $sql2= "UPDATE  tbl_order SET
                  price=$price,
                  qty=$qty,
                  total=$total,
                  status='$status',
                  customer_name='$customer_name',
                  customer_contact='$customer_contact',
                  customer_address='$customer_address'
                  WHERE id=$id
                  ";
                  $res2=mysqli_query($conn,$sql2);
                  //check wether quaey is excute or not
                  if($res2=TRUE)
                  {
                      //orded saved
                     // $_SESSION['update']="<div class='success text-center'> Ordered Update Successfully.</div>";
                      //Redirect to home page
                     // header('location:'.SITEURL);
                      echo "<label style= 'color: green;'>Order Updated Successfully Go to Back. </label>";
                  }
                  else
                  {
                      $_SESSION['update']="<div class='error text-center'> Failed to Update Order.</div>";
                      //Redirect to home page
                      //header('location:'.SITEURL);
                      echo "<label style= 'color: red;'>Failed to Update. </label>";
                  }
  
              }
            
          
          ?>
  
      </div>
  </div>


  <?php include('partials-front/footer.php'); ?>

   