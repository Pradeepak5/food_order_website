<?php include('private/menu.php');?>

<!-- content works starts-->
          <div class="content admin">
             <div class="wrapper">
             <br>
               <h3 class='green tab'> DASHBORAD</h3>
          <br>
          <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);//one time only show to display a message
            }
            ?>
            <br>
             <div class="tb center">
               <?php 
                    
                    $sql="SELECT * FROM tb_category";
                    
                    $res=mysqli_query($conn,$sql);
                    
                    $count=mysqli_num_rows($res);
               ?>
                     <h1><?php  echo $count; ?></h1>
                     Total Categories
                </div>  
                <div class="tb center">
                    <?php 
                    
                         $sql2="SELECT * FROM tb_food";
                         
                         $res2=mysqli_query($conn,$sql2);
                         
                         $count2=mysqli_num_rows($res2);
                         ?>
                     <h1><?php echo $count2; ?></h1>
                     Total Foods
                </div>  
                <div class="tb center">
                    <?php 
                         
                         $sql3="SELECT * FROM tb_order";
                         
                         $res3=mysqli_query($conn,$sql3);
                         
                         $count3=mysqli_num_rows($res3);
                    ?>
                     <h1><?php  echo $count3; ?></h1>
                    Total Order's
                </div>  
                <div class="tb center">
                    <?php 
                         
                         //only sum for total in tb_order and pass the variable name as TOTAL 
                    
                         $sql4="SELECT SUM(total) AS TOTAL from tb_order WHERE status='Delivered'";
                         
                         $res4=mysqli_query($conn,$sql4);
                         //get the value
                         $row4=mysqli_fetch_assoc($res4);
                         //total cost
                         $total_cost=$row4['TOTAL'];
                    ?>
                     <h1>$<?php  echo $total_cost; ?></h1>
                     Total Price
                </div>  
             </div>
        </div>
        <div class="clearfix"></div>
        <!-- content works ends-->
<?php include('private/footer.php')?>
