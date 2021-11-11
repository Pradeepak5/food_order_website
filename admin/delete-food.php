<?php

        include('../config/constants.php');
        if (isset($_GET['id']) AND isset($_GET['image_name']))
        {
            $id=$_GET['id'];
        
            $image_name=$_GET['image_name'];
            if($image_name!= "")
            {
                $path  = "../images/food/".$image_name;
                $remove = unlink($path);

                if($remove==false)
                {
                    $_SESSION['remove']="<div class='error alt'>failed to remove food image.</div>";
                   
                    header('location:'.HOMEURL.'admin/manage-food.php');
                    
                    die();
                }



            }

      //query      
    $sql="DELETE FROM tb_food WHERE id=$id";
     $res=mysqli_query($conn,$sql);         

            if($res==true)
                {
                    //echo "category deleted";
                        $_SESSION['delete']="<div class='msg alt'>  food deleted successfully  </div>";
                        header("location:".HOMEURL.'admin/manage-food.php');
                }
                else
                {
                    $_SESSION['delete']="<div class='error alt'> failed to delete food  </div>";
                    header("location:".HOMEURL.'admin/add-food.php');
                }
        }
        else
        {
            header("location:".HOMEURL.'admin/manage-food.php');
        }
?>
