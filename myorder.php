<?php include('partials-front/menu.php'); ?>
<?php
 
 
 $pnumber = $_SESSION['p_number'] ;
 $password = $_SESSION['password']   ;
 
 
//  echo"$pnumber";
//  echo"$password";
 
?>

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
    <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

                    
            
            
      ?>


    <table class = "tbl-full">
        <tr>
            <th>S.N.</th>
            <th>Food</th>
            <th>Price</th>
            <th>Qty.</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        
        <?php
           //check whether id is set or not
         

               //sql quary to get details
               $sql= " SELECT * FROM tbl_order  WHERE customer_contact=$pnumber AND password='$password'";
               //Execute the Query
               $res=mysqli_query($conn,$sql);

               $count=mysqli_num_rows($res);
               if($count>0)
               {
                    $sn =1;
                    while( $row = mysqli_fetch_assoc($res))
                    {
                        $id = $row['id'];
                        $food = $row['food'];
                        $price=$row['price'];
                        $qty=$row['qty'];
                        $status=$row['status'];

                        
                            ?>
                               
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $food; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $qty; ?></td>


                                    <td>
                                        <?php
                                            //ordered, on delivery,delivered,cancelled
                                            if($status=="Ordered")
                                            {
                                            echo "<label>$status</label>";
                                            }
                                            elseif($status=="On Delivery")
                                            {
                                            echo "<label style= 'color: orange;'>$status</label>";
                                            }
                                            elseif($status=="Delivered")
                                            {
                                            echo "<label style= 'color: green;'>$status</label>";
                                            }
                                            elseif($status=="Cancelled")
                                            {
                                            echo "<label style= 'color: red;'>$status</label>";
                                            }


                                        ?>
                                    </td>

                                    
                                    <td>
                                        <a href= "<?php echo SITEURL; ?>myorder-update.php?id=<?php echo $id;?>" class="btn-secondary"> Update Order</a>
                                    </td>
                                </tr>

                                
                            <?php
                    }
               }

            


        ?>
</table>  
       
          

        

        
          




    <?php include('partials-front/footer.php'); ?>