<?php
    include('private/menu.php');
?>
<!-- content works starts-->
<div class="content  ">
    <div class="wrapper">
        <h4>MANAGE ORDER </h4>
        <br><br>
        <?php
            if(isset($_SESSION['update']))
            {
                echo $_SESSION['update'];
                unset($_SESSION['update']);//one time only show to display a message
             }
        ?>
    <table class="tb4  fontcolor">
        <tr class="black">
            <th class='green'>S.NO</th> 
            <th class='green'>Food</th>
            <th class='green'>Price</th> 
            <th class='green'> Quantity</th>
            <th class='green'>Total</th>
            <th class='green'>Order Date</th>
            <th class='green'>Status</th>
            <th class='green'>Customer name</th>
            <th class='green'> contact</th>
            <th class='green'> Email</th>
            <th class='green'> Address</th>
            <th class='green'>Action</th>
        </tr>
       
        <?php
            //get data and create query
            $sql="SELECT * FROM tb_order  ORDER BY id DESC";
            //execute 
            $res= mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            $n=1;
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
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
                        <td><?php echo $n++; ?></td>
                        <td><?php echo $food; ?></td>
                        <td>$<?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td>$<?php echo $total; ?></td>
                        <td><?php echo $order_date; ?></td>
                        <td>
                        <?php 
                            if($status=="Ordered")
                            {
                                echo "<label style='color:white;'>$status</label>";
                            }
                            elseif($status=="on Delivery") 
                            {
                                echo "<b style='color:orange;'>$status</b>";
                            }
                            elseif($status=="delivered") 
                            {
                                echo "<b style='color:green;'>$status</b>";
                            }
                            elseif($status=="cancelled") 
                            {
                                echo "<b style='color:red;'>$status</b>";
                            }
                        ?>
                        </td>
                        <td><?php echo $customer_name; ?></td>
                        <td><?php echo $customer_contact; ?></td>
                        <td><?php echo $customer_email; ?></td>
                        <td><?php echo $customer_address; ?></td>
                        <td>
                            <a href="<?php echo HOMEURL; ?>admin/update-order.php?id=<?php echo $id; ?>"class="btn2">UPDATE</a>
                        </td>
                </tr>
            <?php

                    
                }
            }
            else
            {
                echo "<div class='error alt'> order not available</div>";
            }

        ?>
    </table>
    </div>
</div>
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>
