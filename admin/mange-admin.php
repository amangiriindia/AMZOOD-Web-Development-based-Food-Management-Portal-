
        
    <?php include('partials/menu.php'); ?>

<!--main content section starts-->
<div class="admin">


<div class="main-content">
  <!-- <div class ="wrapper"> -->
    <h1 class="text-center">MANAGE-ADMIN</h1>
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
    <a href="add-admin.php" class="btn-primary">Add Admin</a>
    <br><br>

    <div class="table-box">
     
      <table >
      <tr>
        <th class="item-hed">S.N.</th>
        <th class="item-hed">Full Name</th>
        <th class="item-hed">Username</th>
        <th class="item-hed"-hed colspan=2>Actions</th>
      </tr>

      <?Php
       $sql ="SELECT * FROM tbl_admin";
       $res = mysqli_query($conn,$sql);
       $sn=1;//create variable from assign the value

       if($res==TRUE){
         //Count row to whether we have data in database or not
         $count =mysqli_num_rows($res);//function get row in database
         if($count>0){

           while($rows=mysqli_fetch_assoc($res)){
             //loop get the all the data from database
             $id=$rows['id'];
             $full_name=$rows['full_name'];
             $username=$rows['username'];
             ?>
               <tr>
               <td class="item"><?php echo $sn++?></td>
               <td class="item"><?php echo $full_name?></td>
               <td class="item"><?php echo $username?></td>
               <td class="item">
               <!--  <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id; ?>"class="btn-primary">Change Password</a>   -->
                <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary">Update Admin</a>
               </td>
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-denger">Delete Admin</a>
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

   