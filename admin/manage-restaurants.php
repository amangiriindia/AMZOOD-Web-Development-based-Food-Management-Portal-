
        
    <?php include('partials/menu.php'); ?>

<!--main content section starts-->
<div class="admin">


<div class="main-content">
  <!-- <div class ="wrapper"> -->
    <h1 class="text-center">MANAGE-RESTAURANTS</h1>
    <br><br>

    <?php 
    if(isset($_SESSION['add'])){
      echo $_SESSION['add'];  //displaying session massageS
      unset($_SESSION['add']);//removing session message
    }

    if(isset($_SESSION['delete'])){
      echo $_SESSION['delete'];  //displaying session massageS
      unset($_SESSION['delete']);//removing session message
    }

    if(isset($_SESSION['update'])){
      echo $_SESSION['update'];  //displaying session massageS
      unset($_SESSION['update']);//removing session message
    }

    if(isset($_SESSION['user-not-found'])){
      echo $_SESSION['user-not-found'];  //displaying session massageS
      unset($_SESSION['user-not-found']);//removing session message
    }

    if(isset($_SESSION['not-match'])){
      echo $_SESSION['not-match'];  //displaying session massageS
      unset($_SESSION['not-match']);//removing session message
    }

    if(isset($_SESSION['change-pwd'])){
      echo $_SESSION['change-pwd'];  //displaying session massageS
      unset($_SESSION['change-pwd']);//removing session message
    }

    ?>
    <br><br><br>

    <!--buttom to add admin-->
    <a href="add-rest.php" class="btn-primary">Add restaurants</a>
    <br><br>

    <div class="table-box">
     
      <table >
      <tr>
        <th class="item-hed">S.N.</th>
        <th class="item-hed"> Restaurants-Name</th>
        <th class="item-hed">Contact</th>
        <th class="item-hed">Email</th>
        <th class="item-hed">Active</th>
        <th class="item-hed">Address</th>
        <th class="item-hed"-hed colspan=2>Actions</th>
      </tr>

      <?Php
       $sql ="SELECT * FROM tbl_restaurants";
       $res = mysqli_query($conn,$sql);
       $sn=1;//create variable from assign the value

       if($res==TRUE){
         //Count row to whether we have data in database or not
         $count =mysqli_num_rows($res);//function get row in database
         if($count>0){

           while($rows=mysqli_fetch_assoc($res)){
             //loop get the all the data from database
             $id=$rows['id'];
             $r_name=$rows['r_name'];
             $r_contact=$rows['r_contact'];
             $r_email=$rows['r_email'];
             $active=$rows['active'];
             $r_address=$rows['r_address'];
             ?>
               <tr>
               <td class="item"><?php echo $sn++?></td>
               <td class="item"><?php echo $r_name?></td>
               <td class="item"><?php echo $r_contact?></td>
               <td class="item"><?php echo $r_email?></td>
               <td class="item"><?php echo $active?></td>
               <td class="item"><?php echo $r_address?></td>
               <!-- <td class="item">
               
                <a href="<?php echo SITEURL;?>admin/update-rest.php?id=<?php echo $id; ?>" class="btn-secondary">Update restaurants</a>
               </td> -->
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/delete-rest.php?id=<?php echo $id; ?>" class="btn-denger">Delete restaurants </a>
                </td>
              </tr>


             <?php
           }

         }
       }

      ?>

      
    </table>
    
    </div>
 
    <div class = "clearfix"></div>

  </div>
</div>


</div>
<!--main content section end-->

<?php include('partials/footer.php'); ?>

   