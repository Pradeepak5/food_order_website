<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4>UPDATE CATEGORY</h4>
                 <br>
                    <?php
                    if(isset($_GET['id']))
                    {
                        $id=$_GET['id'];
                        $sql="SELECT * FROM tb_category WHERE id=$id";

                        $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);
                        if($count==1)
                        {
                            //get data
                            $row=mysqli_fetch_assoc($res);
                            $title=$row['title'];
                            $current_image=$row['image_name'];
                            $faetured=$row['featured'];
                            $active=$row['active'];
                        }
                        else
                        {
                            $_SESSION['not-found']="<div class='error alt'>category not found</div>";
                            header('location:'.HOMEURL.'admin/manage-category.php');
                        }
                    }
                    else
                    {
                        header('location:'.HOMEURL.'admin/manage-category');
                    }
                    ?>
            <form action="" method="POST" enctype="multipart/form-data">
            <table class="tb3">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input  type="text" name="title" value="<?php echo $title;?>">
                    </td>
                
                </tr>       
                <tr>
                    <td>Current Image:</td>
                    <td>
                         <?php
                            if($current_image!="")
                            {
                                ?>
                                <img src="<?php echo HOMEURL;?>images/category/<?php echo $current_image;?>" width="125">
                                <?php
                            }
                            else
                            {
                                echo "<div class='error alt'>image not available</div>";
                            }
                         ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                         <input  type="file" name="image" value="">
                    </td>
                </tr>   
                <tr>
                <tr>
                     <td>Featured:</td>
                    <td>
                        <input  <?php if($faetured=="Yes"){ echo "checked";}?> type="radio" name="featured" value="Yes"> Yes
                        <input <?php if($faetured=="No"){ echo "checked"; }?>  type="radio" name="featured" value="No">  No
                </td>
                </tr>       
                 <tr>
                    <td>Active:</td>
                    <td>
                        <input  <?php if($active=="Yes"){ echo "checked";}?> type="radio" name="active" value="Yes"> Yes
                        <input  <?php if($active=="No"){ echo "checked";}?> type="radio" name="active" value="No"> No
                     </td>
                </tr>                  
                 <td colspan="5">
                    <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value ="UPDATE CATEGORY" class="btn2">
                </td>   
             </table>
             </form>
             <?php
                if(isset($_POST['submit']))
                {
                    //echo "clicked";
                    //get data
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    $current_image=$_POST['current_image'];
                    $featured=$_POST['featured'];
                    $active=$_POST['active'];
                    //updating image
                    if(isset($_FILES['image']['name']))
                    {
                    $image_name=$_FILES['image']['name'];
                            if($image_name!="")
                            {
                                //available
                                //new image
                                     //renaming image
                                    //extension of image like .jpg .png .gif    
                                    $ext=end(explode('.',$image_name));
                                    $image_name="Dish".rand(000,999).'.'.$ext;
                                        
                                    $source_path=$_FILES['image']['tmp_name'];
                                    $destination_path="../images/category/".$image_name;
                                    $upload=move_uploaded_file($source_path,$destination_path);
    
                                    //check whether image is uploaded or not
                                    if($upload==false)
                                    {
                                        $_SESSION['upload']="<div class='error alt'>failed to upload image</div>";
                                        header('location:'.HOMEURL.'admin/manage-category.php');
                                        //stop the process
                                        die();
                                    }
                                    //remove
                                    if($current_image!="")
                                    {
                                        $remove_path="../images/category/".$current_image;
                                        $remove=unlink($remove_path);
                                            if($remove==FALSE)
                                            {
                                                $_SESSION['failed']="<div class='error alt'>failed to remove current image.</div>";
                                                header('location:'.HOMEURL.'admin/manage-category.php');
                                                die();
                                            }
                                    }
                                   
                            }
                            else
                            {
                                $image_name=$current_image;
                            }
                    }
                    else
                    {
                            $image_name=$current_image;
                    }
                    
                    //query
                    $sql1 = "UPDATE tb_category SET title='$title', image_name='$image_name',featured='$featured',active='$active' WHERE id=$id ";
                    //echo $sql1;

                    $res1=mysqli_query($conn,$sql1);
                    

                            if($res1==TRUE)
                            {
                            $_SESSION['update']="<div class='msg alt'>category updated successfully</div>";
                            header('location:'.HOMEURL.'admin/manage-category.php');
                            }
                            else
                            {
                                //failed
                                $_SESSION['update']="<div class='error alt'>failed to update category</div>";
                                header('location:'.HOMEURL.'admin/manage-category.php');
                            }
                 }
             ?>

            </div>
        </div>    
        
        <!-- content works ends-->
 

<?php include('private/footer.php');?>

    

            


