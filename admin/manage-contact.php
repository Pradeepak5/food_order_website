<?php
    include('private/menu.php');
?>
<!-- content works starts-->
<div class="content  ">
    <div class="wrapper">
        <h2 class='msg'>Customer's Feedback :) </h2>
        <br><br>
    

    <table class="tb4  fontcolor">
        <tr class="black">
            <th class='error txt'>Name</th> 
            <th class='error txt'>Mail Id</th>
            <th class='error txt'>Message</th> 
           
        </tr>
       
        <?php
            //get data and create query
            $sql="SELECT * FROM tbcontact ORDER BY name DESC";
            //execute 
            $res= mysqli_query($conn,$sql);

            $count=mysqli_num_rows($res);
            if($count>0)
            {
                while($row=mysqli_fetch_assoc($res))
                {
                    $name=$row['name'];
                    $mail=$row['mail'];
                    $message=$row['message'];
                    
             ?>

                <tr>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $mail; ?></td>
                        <td><?php echo $message; ?></td>
                        
                </tr>
            <?php

                    
                }
            }
            else
            {
                echo "<div class='error alt'> message not available</div>";
            }

        ?>
    </table>
    </div>
</div>
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>
