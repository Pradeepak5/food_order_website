<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4 class="tble">MANAGE ADMIN </h4>
                 <br>
             <?php
                 if(isset($_SESSION['add']))
                 {
                     echo $_SESSION['add'];
                     unset($_SESSION['add']);//one time only show to display a message
      }
                 if(isset($_SESSION['delete']))
                 {
                     echo $_SESSION['delete'];
                     unset($_SESSION['delete']);//one time only show to display a message
                 }
                 if(isset($_SESSION['update']))
                 {
                     echo $_SESSION['update'];
                     unset($_SESSION['update']);//one time only show to display a message
                 }
                 if(isset($_SESSION['user_not_found']))
                 {
                     echo $_SESSION['user_not_found'];
                     unset($_SESSION['user_not_found']);//one time only show to display a message
                 }
                 if(isset($_SESSION['password_not_match']))
                 {
                     echo $_SESSION['password_not_match'];
                     unset($_SESSION['password_not_match']);//one time only show to display a message
                 }
                 if(isset($_SESSION['change_password']))
                 {
                     echo $_SESSION['change_password'];
                     unset($_SESSION['change_password']);//one time only show to display a message
                 }
                
                

                 ?>
            <br><br>
            <a href="add-admin.php" class="btn1 s1">ADD ADMIN</a>
            <br><br><br>
            <table class="tb2">
                <tr>
                    <th>S.NO</th> 
                    <th>full_name</th> 
                    <th>username</th>
                    <th>Action</th>
                </tr>
             <?php
                $sql="SELECT * FROM tb_admin";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                    $count=mysqli_num_rows($res);
                    $sn=1;
                    if($count>0)
                
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                        
                ?>
                 <tr>
                    <td><?php echo $sn++ ;?></td>
                    <td><?php echo $full_name;?></td>
                    <td><?php echo $username;?></td>
                    <td>
                    <a href="<?php echo HOMEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn1">CHANGE PASSWORD</a>
                    <a href="<?php echo HOMEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn2 ">UPDATE ADMIN</a>
                    <a href="<?php echo HOMEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn3 ">DELETE ADMIN</a>
                    </td>
                </tr>
                <?php
                    }
                }
                 else
                    {
                            //do not have a data in datebase
                    }
                }
                ?>
                

                
             </table>
            </div>
</div>
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>

