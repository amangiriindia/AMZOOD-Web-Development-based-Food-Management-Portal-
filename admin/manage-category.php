<?php include('partials/menu.php'); ?>

<div class= "main-content">
   <!-- <div class ="wrapper"> -->
    <h1 class="text-center">MANAGE-CATEGORY</h1>
    <br><br>
    <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['remove']))
            {
                echo $_SESSION['remove'];
                unset($_SESSION['remove']);
            }

            if(isset($_SESSION['delete']))
            {
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }

            if(isset($_SESSION['no-category-found']))
            {
                echo $_SESSION['no-category-found'];
                unset($_SESSION['no-category-found']);
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

            if(isset($_SESSION['failed-remove']))
            {
                echo $_SESSION['failed-remove'];
                unset($_SESSION['failed-remove']);
            }
        ?>
        <br><br>

    <!--buttom to add admin-->
    <a href="<?php echo SITEURL;?>admin/add-category.php" class="btn-primary">Add category</a>
    <br><br>

    <div class="table-box">
    <table >
      <tr>
        <th class="item-hed">S.N.</th>
        <th class="item-hed">Title</th>
        <th class="item-hed">Image</th>
        <th class="item-hed">Restaurant Name</th>
        <th class="item-hed">Veg</th>
        <th class="item-hed">Featured</th>
        <th class="item-hed">Active</th>
        <th class="item-hed">Special-food</th>
        <th class="item-hed" colspan=2>Action</th>
      </tr>

      <?php
        //Quary to all category from database
        $sql="SELECT * FROM tbl_category";

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
            $image_name = $row['image_name'];
            $restaurant = $row['restaurant'];
            $veg = $row['veg'];
            $featured = $row['featured'];
            $active = $row['active'];
            $Special_food = $row['Special_food'];
            ?>
              <tr>
                <td class="item"><?php echo $sn++; ?></td>
                <td class="item"><?php echo $title; ?></td>

                <td class="item-img">
                  <?php 
                    //Check our image name is available or not
                    if($image_name!="")
                    {
                      ?>
                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
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
                <td class="item"><?php echo $Special_food; ?></td>
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/update-category.php?id=<?php echo $id;?>" class="btn-secondary">Update Category</a>
                </td>
                <td class="item">
                <a href="<?php echo SITEURL;?>admin/delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-denger">Delete Category</a>
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
            <td colspan ="6"><div class="error">No Category Added</div></td>
          </tr>

          <?php
        }
      ?>

      

    </table>
    </div>
    
  </div>
</div>

<?php include('partials/footer.php'); ?>