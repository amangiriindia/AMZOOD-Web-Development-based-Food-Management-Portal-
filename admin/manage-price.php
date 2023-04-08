<?php include('partials/menu.php'); ?>
 


<div class="admin">



 <div class= "main-content">
    <h1 class="text-center">MANAGE-PAYMENT</h1>
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
            <th class="item-hed">Order-Id</th>
            <th class="item-hed">Amount(INR)</th>
            <th class="item-hed">Payment-Date</th>
            <th class="item-hed">Payment-Mode</th>
            <th class="item-hed">Payment-Status</th>
          </tr>
          
          <?php
            $sql= "SELECT * FROM tbl_payment ";//Display the data in desending order (latest order in first)
            //Execute the Query
            $res=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($res);
            $sn=1;
            if($count>0)
            {
              while( $row = mysqli_fetch_assoc($res))
              {
               $order_id=$row['orderid'];
                $amount=$row['amount'];
                $order_date=$row['date'];
                $payment_mode=$row['payment_mode'];
                $status=$row['payment_status'];

                ?>
                <tr>
                    <td class="item"><?php echo $sn++; ?></td>
                    <td class="item"><?php echo $order_id; ?></td>
                    <td class="item"><?php echo $amount; ?>.00</td>
                    <td class="item"><?php echo $order_date; ?></td>
                    <td class="item"><?php echo $payment_mode; ?></td>
                    <td class="item"><?php echo $status; ?></td>
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