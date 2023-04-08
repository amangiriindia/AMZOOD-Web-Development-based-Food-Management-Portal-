<?php include('partials/menu.php'); ?>

<div class= "main-content">
   <!-- <div class ="wrapper"> -->
    <h1 class="text-center">MANAGE-FOOD</h1>
    <br><br>
    
      <?php
              if(isset($_SESSION['add']))
              {
                  echo $_SESSION['add'];
                  unset($_SESSION['add']);
              }

              

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

           

            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

            if(isset($_SESSION['unauthorize']))
            {
                echo $_SESSION['unauthorize'];
                unset($_SESSION['unauthorize']);
            }
            
          ?>

        <br><br>

    <!--buttom to add admin-->
    <a href="<?php echo SITEURL;?>admin/add-food.php" class="btn-primary">Add Food</a>
    <br><br>

    <!--Add category form starts-->
    <div class="table-box">
    <table>
      <tr>
        <th class="item-hed">S.N.</th>
        <th class="item-hed">Title</th>
        <th class="item-hed">Price</th>
        <th class="item-hed">Image</th>
        <th class="item-hed">Restaurant Name</th>
        <th class="item-hed">Veg</th>
        <th class="item-hed">Featured</th>
        <th class="item-hed">Active</th>
        <th class="item-hed">Popular-Dish</th>
        <th class="item-hed" colspan=2>Action</th>
      </tr>

      <?php
        //Quary to all category from database
        $sql="SELECT * FROM tbl_food";

        //Excute quary
        $res =mysqli_query($conn,$sql);

        //count row
        $count = mysqli_num_rows($res);

        //create serial Number  Variable
        $sn=1;

        //check whether we have data in database or not
        if($count>0)
        {
          //we have data in database
          //get the data and display
          while($row=mysqli_fetch_assoc($res))
          {
            $id = $row['id'];
            $title=$row['title'];
            $price=$row['price'];
            $image_name = $row['image_name'];
            $restaurant=$row['restaurant'];
            $veg = $row['veg'];
            $featured = $row['featured'];
            $active = $row['active'];
            $popular = $row['popular'];
            ?>
              <tr>
                <td class="item"><?php echo $sn++; ?></td>
                <td class="item"><?php echo $title; ?></td>
                <td class="item"><?php echo $price; ?></td>

                <td class="item-img">
                  <?php 
                    //Check our image name is available or not
                    if($image_name!="")
                    {
                      ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" width="100px">
                      <?php
                    }
                    else
                    {
                      echo "<div class='error'>Image not Added.</div>";
                    }
                   ?>
                </td>
                <td class="item"><?php echo $restaurant; ?></td>
                <td class="item"><?php echo $veg; ?></td>
                <td class="item"><?php echo $featured; ?></td>
                <td class="item"><?php echo $active; ?></td>
                <td class="item"><?php echo $popular; ?></td>
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/update-food.php?id=<?php echo $id;?>" class="btn-secondary">Update Food</a>
                </td>
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/delete-food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-denger">Delete Food</a>
               
              </td>
              </tr>

            <?php
          }
        }
        else
        {
          //we don't have data
          ?>

          <tr>
            <td colspan ="6"><div class="error">No Food Added</div></td>
          </tr>

          <?php
        }
      ?>

      

    </table>
    </div>
    
  </div>
</div>

<?php include('partials/footer.php'); ?>