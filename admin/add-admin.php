<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4>ADD ADMIN </h4>
                 <br>

                 <?php
                 if(isset($_SESSION['add']))
                 {
                     echo $_SESSION['add'];
                     unset($_SESSION['add']);//one time only show to display a message
                 }
                ?>
            <form action="" method="post">
            <table class="tb3">
                <tr>
                    <td>FULL NAME</td>
                    <td><input  type="text" name="full_name" placeholder="Enter your full name"></td>
                </tr>       
                <tr>
                    <td>USER NAME</td>
                    <td><input  type="text" name="username" placeholder="Enter your username"></td>
                </tr>       
        
                <tr>
                    <td>PASSWORD</td>
                    <td><input  type="password" name="password" placeholder="Enter your password"></td>

                </tr>  
                <td colspan="2">
                    <input type="submit" name="submit" value ="ADD ADMIN" class="btn2">
                </td>   
            </table>
            </form>
            </div>
        </div>    
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>
 <?php 
    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        //get the data
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
        $password=md5($_POST['password']);

        //sql query data into database
        $sql="INSERT INTO tb_admin SET   
        full_name='$full_name',
          username='$username',
          password='$password' 
           ";
        //echo $sql;
        //execut query
       
       
        $res=mysqli_query($conn,$sql) or die(mysqli_error());
       if($res==true)
       {
        $_SESSION['add']="<div class='msg alt'> Admin Added successfully </div>";
        header("location:".HOMEURL.'admin/manage-admin.php');

       }
       else
       {
        $_SESSION['add']="<div class='error alt'>failed to add admin</div>";
        header("location:".HOMEURL.'admin/add-admin.php');
       }
        
    }

?>




