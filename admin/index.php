<?php include('partials/menu.php'); ?>

<!--main content section starts-->
<div class="homepage">


    
    <div class ="wrapper">
           <br>
        <h1 class="color">Dashboard</h1>
        <br><br>

        <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
        ?>
        <br><br>
         <br><br><br><br><br>


        <div class = "cal-4 text-center">
            <?php
                $sql = "SELECT *FROM tbl_category";
                $res =mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
            ?>
            <h1><?php echo $count;?></h1>
            <br/>
            Categories
        </div>

        <div class = "cal-4 text-center">
        <?php
                $sql2 = "SELECT *FROM tbl_food";
                $res2 =mysqli_query($conn,$sql2);
                $count2=mysqli_num_rows($res2);
            ?>
            <h1><?php echo $count2;?></h1>
            <br/>
            Foods
        </div>

        <div class = "cal-4 text-center">

        <?php
                $sql3 = "SELECT *FROM tbl_order";
                $res3 =mysqli_query($conn,$sql3);
                $count3=mysqli_num_rows($res3);
            ?>
            <h1><?php echo $count3;?></h1>
            <br/>
            Total Orders
        </div>

        <div class = "cal-4 text-center">
        <?php
            //Create sql query to get total revenue Generated
            //Aggregate Function in SQl
            $sql4 = "SELECT SUM(total) Total FROM tbl_order WHERE status ='Delivered'";
            $res4=mysqli_query($conn,$sql4);
            //Get the value
            $row4 = mysqli_fetch_assoc($res4);
            //Get the total Revenue
            $total_revenu = $row4['Total'];
        ?>
            <h1><?php echo $total_revenu;?></h1>
            <br/>
            Revenue Generated
        </div>

        <div class = "clearfix"></div>

    </div>
    </div>


</div>
<!--main content section end-->

<?php include('partials/footer.php'); ?>