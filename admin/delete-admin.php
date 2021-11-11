<?php

include('../config/constants.php');
$id=$_GET['id'];
//query
$sql="DELETE FROM tb_admin WHERE id=$id";
$res=mysqli_query($conn,$sql);
if($res==true)
{
    //echo "admin selected";
    $_SESSION['delete']="<div class='msg alt'> Admin Deleted successfully </div>";
    header("location:".HOMEURL.'admin/manage-admin.php');
}
else{
    $_SESSION['delete']="<div class='error alt'> failed to delete Admin  </div>";
    header("location:".HOMEURL.'admin/manage-admin.php');
}
?>
