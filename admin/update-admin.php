<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4>UPDATE ADMIN </h4>
                 <br>

                 <?php
                            $id=$_GET['id'];
                            $sql="SELECT * FROM tb_admin WHERE id=$id";
                            //executequery
                            $res=mysqli_query($conn,$sql);
                            if($res==true)
                            {
                                $count=mysqli_num_rows($res);
                                if($count==1)
                                {
                                    //get the details 
                                    $row=mysqli_fetch_assoc($res);
                                    $full_name=$row['full_name'];
                                    $username=$row['username'];
                                }
                                else
                                {
                                    header('location:'.HOMEURL.'admin/manage-admin.php');
                                }
                            }
                     ?>
            <form action="" method="post">
            <table class="tb3">
                <tr>
                    <td>Full Name:</td>
                    <td>
                        <input  type="text" name="full_name" value="<?php echo $full_name; ?>">
                    </td>
                
                </tr>       
                <tr>
                    <td>Username:</td>
                    <td>
                         <input  type="text" name="username" value="<?php echo $username; ?>">
                    </td>
                </tr>      
            

         
        
                
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value ="UPDATE ADMIN" class="btn2">
                </td>   
            </table>
            </form>
            </div>
        </div>    
        
        <!-- content works ends-->
 
 <?php 
    if(isset($_POST['submit']))
    {
        //echo "button clicked";
        //get the data
        $id=$_POST['id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];
    

        //sql query data into database
        $sql="UPDATE tb_admin SET full_name = '$full_name',username = '$username'
         WHERE id='$id'  ";
        echo $sql;
       //execut query
      $res = mysqli_query($conn,$sql);
    // wheather the query is executed or not 
     if($res==true)
     {
        $_SESSION['update']="<div class='msg alt'> admin updated successfully.</div>";
       header("location:".HOMEURL.'admin/manage-admin.php');

       }
       else
       {
        $_SESSION['update']="<div class=' error alt'>Failed to update Admin.</div>";
        header("location:".HOMEURL.'admin/manage-admin.php');
       }
        
    }

?>

<?php include('private/footer.php');?>




