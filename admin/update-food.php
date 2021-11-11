<?php 
    ob_start();
    include('private/menu.php');
    
    ?>
<!-- content works starts-->
<div class="content">
     <div class="wrapper">
     <h4>UPDATE FOOD</h4>
<br>
<?php
     if(isset($_GET['id']))
     {
        $id=$_GET['id'];
                        
       $sql="SELECT * FROM tb_food WHERE id=$id";
      $res=mysqli_query($conn,$sql);

                        $count=mysqli_num_rows($res);
                        if($count==1)
                        {
                            //get data
                            $row1=mysqli_fetch_assoc($res);
                            $title=$row1['title'];
                            $description=$row1['description'];
                            $price=$row1['price'];
                            $current_image=$row1['image_name'];
                            $current_category=$row1['category_id'];
                            $faetured=$row1['featured'];
                            $active=$row1['active'];
                        }
                        else
                        {
                            $_SESSION['not-found']="<div class='error alt'>food not found</div>";
                            header('location:'.HOMEURL.'admin/manage-food.php');
                        }
                       
                    }
                    else
                    {
                        header('location:'.HOMEURL.'admin/manage-food');
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
                    <td>Description:</td>
                    <td><textarea name="description" cols="25" row="5"> <?php echo $description ;?></textarea></td>
                </tr>       
        
                <tr>
                    <td>Price:</td>
                    <td><input  type="number" name="price" value="<?php echo  $price;?>"></td>

                </tr>       
                <tr>
                    <td>Current Image:</td>
                    <td>
                         <?php
                            if($current_image!="")
                            {
                                ?>
                                <img src="<?php echo HOMEURL;?>images/food/<?php echo $current_image;?>" width="125" alt="<?php echo $title;?>">
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
                    <td>Category:</td>
                    <td>
                        <select  name="category" >
                        <?php
                            $sql2="SELECT * FROM tb_category WHERE active='Yes'";
                            $res2=mysqli_query($conn,$sql2);
                            $count2=mysqli_num_rows($res2);
                            if($count2>0)
                            {
                                while($row=mysqli_fetch_assoc($res2))
                                {
                                    $category_id=$row['category_id'];
                                    $title=$row['title'];
                                    ?>
                                    <option value="<?php echo $id;?>"><?php echo $title;?> </option>
                                    <?php
                                }
                            }
                            else
                            {
                                ?>
                                <option value="0"> No category Found</option>
                                <?php
                            }

                        ?>
                            
                        </select>
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
                 <td colspan="2">
                     <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="submit" name="submit" value ="UPDATE FOOD" class="btn2">
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
     $price=$_POST['price'];
     $description=$_POST['description'];
     $current_image=$_POST['current_image'];
     $category=$_POST['category'];
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
                     $image_name="food".rand(000,999).'.'.$ext;
                         
                     $source_path=$_FILES['image']['tmp_name'];
                     $destination_path="../images/food/".$image_name;
                     $upload=move_uploaded_file($source_path,$destination_path);

                     //check whether image is uploaded or not
                     if($upload==false)
                     {
                         $_SESSION['upload']="<div class='error alt'>failed to upload image</div>";
                         header('location:'.HOMEURL.'admin/manage-food.php');
                         //stop the process
                         die();
                     }
                     //remove
                     if($current_image!="")
                     {
                        $remove_path="../images/food/".$current_image;
                        $remove=unlink($remove_path);
                         if($remove==FALSE)
                             {
                                 $_SESSION['failed']="<div class='error alt'>failed to remove current image.</div>";
                                  header('location:'.HOMEURL.'admin/manage-food.php');
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
             $image_name=$current_image;//default image when button is not clicked
     }
     
     //query
     $sql3 = "UPDATE tb_food SET
      title='$title',
      description='$description',
      price='$price',
      image_name='$image_name',
      featured='$featured',
      active='$active' 
      WHERE id=$id ";
     //echo $sql1;
                

  $res3=mysqli_query($conn,$sql3);
        if($res3==TRUE)
        {
            $_SESSION['update']="<div class='msg alt'>food updated successfully</div>";
            header('location:http://localhost/avengers_resturant/admin/manage-food.php');
            ob_end_flush();
                                    
        }
        else
        {
        //failed
        $_SESSION['update']="<div class='error alt'>failed to food category</div>";
        header('location:'.HOMEURL.'admin/manage-food.php');
        }
 }
  ?>

</div>
</div>    
        
        <!-- content works ends-->
 

<?php include('private/footer.php');?>

    

            


