<?php include('partials/menu.php'); ?>

 <div class= "main-content">
<!-- <div class ="wrapper"> -->
    <h1 class="text-center">MANAGE-ORDER</h1>
    <br><br>

    <!--buttom to add admin-->
    
    <br><br><br>

    <?php
      if(isset($_SESSION['update']))
      {
        echo $_SESSION['update'];
        unset($_SESSION['update']);
      }
    ?>
    <br><br>

   <div class="table-box">
   <table cellpadding=10>
          <tr>
            <th class="item-hed">S.N.</th>
            <th class="item-hed">Food</th>
            <th class="item-hed">Price</th>
            <th class="item-hed">Qty.</th>
            <th class="item-hed">Total</th>
            <th class="item-hed">Order Date</th>
            <th class="item-hed">Status</th>
            <th class="item-hed">Customer Name</th>
            <th class="item-hed"> Contact</th>
            <th class="item-hed"> Email</th>
            <th class="item-hed">Address</th>
            <th class="item-hed" > Action</th>
          </tr>
          
          <?php
            $sql= "SELECT * FROM tbl_order ORDER BY id DESC";//Display the data in desending order (latest order in first)
            //Execute the Query
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
              while( $row = mysqli_fetch_assoc($res))
              {
                $id=$row['id'];
                $food=$row['food'];
                $price=$row['price'];
                $qty=$row['qty'];
                $total=$row['total'];
                $order_date=$row['order_date'];
                $status=$row['status'];
                $customer_name=$row['customer_name'];
                $customer_contact=$row['customer_contact'];
                $customer_email=$row['customer_email'];
                $customer_address=$row['customer_address'];


                ?>
                <tr>
                    <td class="item"><?php echo $sn++; ?></td>
                    <td class="item"><?php echo $food; ?></td>
                    <td class="item"><?php echo $price; ?></td>
                    <td class="item"><?php echo $qty; ?></td>
                    <td class="item"><?php echo $total; ?></td>
                    <td class="item"><?php echo $order_date; ?></td>

                    <td class="item">
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

                    <td class="item"><?php echo $customer_name; ?></td>
                    <td class="item"><?php echo $customer_contact; ?></td>
                    <td class="item"><?php echo $customer_email; ?></td>
                    <td class="item"><?php echo $customer_address; ?></td>
                    <td class="item">
                    <a href="<?php echo SITEURL;?>admin/update-order.php?id=<?php echo $id;?>" class="btn-secondary">Update   Order</a>
                  </td>
                  </tr>

                <?php
              }
              
            
            }
            else
            {
                //Order not Available
                echo "<tr><td colspan='12' class='error'>Orderd Not Available</td></tr>";
            }
          ?>


        

    
    </table>
    
   </div>
  </div>
</div>

<?php include('partials/footer.php'); ?>