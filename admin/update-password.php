<?php include('private/menu.php');?>
<!-- content works starts-->
    <div class="content">
             <div class="wrapper">
                 <h4 class="tble">CHANGE PASSWORD </h4>
                 <br>
                 <?php
                 if(isset($_GET['id']))
                 {
                     $id=$_GET['id'];
                 }
                  ?>
                 <form action="" method="post">
                    <table class="tb3">
                         <tr>
                             <td>Current Password:</td>
                             <td>
                                 <input  type="password" name="current_password" placeholder="current password">
                            </td>
                
                        </tr>       
                        <tr>
                             <td>New Password:</td>
                            <td>
                                <input  type="password" name="new_password" placeholder="new password">
                             </td>
                        </tr>   
                        <tr>
                             <td>Confirm Password:</td>
                            <td>
                                <input  type="password" name="confirm_password" placeholder="confirm password">
                             </td>
                        </tr>           
        
                
                             <td colspan="2">
                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                <input type="submit" name="submit" value ="CHANGE PASSWORD" class="btn2">
                             </td>   
                     </table>
                 </form>

            </div>
    </div>
<?php
    if(isset($_POST['submit']))
    {
        //echo "clicked";
        //get the data from form
        $id=$_POST['id'];
        $current_password= md5($_POST['current_password']);
        $new_password= md5($_POST['new_password']);
        $confirm_password= md5($_POST['confirm_password']);
        //query
        $sql="SELECT * FROM tb_admin WHERE id=$id AND password='$current_password'";
        //execute the query
        $res=mysqli_query($conn,$sql);
        if($res==true)
        {
            $count=mysqli_num_rows($res);
            if($count==1)
            {
                //password can changed
                //echo "user found";
                //whether the password is matched or not
                if($new_password==$confirm_password)
                {
                    //updated
                    $sql1="UPDATE tb_admin SET password='$new_password' WHERE id=$id ";
                    $res1=mysqli_query($conn,$sql1);
                    if($res1==true)
                    {
                        //display succeed message
                        $_SESSION['change_password']="<div class='msg alt'>password change successfully. </div>";
                        header("location:".HOMEURL.'admin/manage-admin.php');

                    }
                    else
                    {
                        //display failed message
                        $_SESSION['change_password']="<div class='error alt'>failed to update password </div>";
                        header("location:".HOMEURL.'admin/manage-admin.php');

                    }
                }
                else{
                    $_SESSION['password_not_match']="<div class='error alt'>password not match </div>";
                     header("location:".HOMEURL.'admin/manage-admin.php');

                }

            }
            else{
                $_SESSION['user_not_found']="<div class='error alt'> user not found </div>";
                header("location:".HOMEURL.'admin/manage-admin.php');
            }
        }
    }
?>



<?php include('private/footer.php');?>