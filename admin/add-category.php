<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4>ADD CATEGORY </h4>
                 <br>
                 <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);//one time only show to display a message
                    }
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['uploadd'];
                        unset($_SESSION['upload']);//one time only show to display a message
                    }
                 ?>
                 <br><br>
                    <form action="" method="post" enctype="multipart/form-data">
                         <table class="tb3">
                            <tr>
                             <td>Title:</td>
                            <td><input  type="text" name="title" placeholder="category title"></td>
                            </tr> 
                            <tr>
                                <td>Select Image:</td>
                                <td>
                                    <input type="file" name="image">
                                </td>       
                            </tr>                            
                            <tr>
                            <td>Featured:</td>
                            <td>
                             <input  type="radio" name="featured" value="Yes"> Yes
                             <input  type="radio" name="featured" value="No">  No
                            </td>
                            </tr>       
                            <tr>
                                <td>Active:</td>
                            <td>
                             <input  type="radio" name="active" value="Yes"> Yes
                             <input  type="radio" name="active" value="No"> No
                             </td>
                            </tr>       
                            <td colspan="2">
                             <input type="submit" name="submit" value ="ADD CATEGORY" class="btn2">
                             </td>   
                         </table>
                    </form>
            <?php
                if(isset($_POST['submit']))
                {
                    //echo "button clicked";
                    //get the data
                    $title=$_POST['title'];
                    //radio button
                    if(isset($_POST['featured']))
                    {
                        $featured=$_POST['featured'];
                    
                    }
                    else{
                        $featured="No";
                    }
                    if(isset($_POST['active']))
                    {
                        $active=$_POST['active'];
                    
                    }
                    else
                    {
                        $active="No";
                    }
                    //image selected or not
                    //print_r($_FILES['image']);
                   // die();//break
                   if(isset($_FILES['image']['name']))
                   {
                       //upload
                       $image_name=$_FILES['image']['name'];
                       if($image_name!="")
                       {

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
                                    header('location:'.HOMEURL.'admin/add-category.php');
                                    //stop the process
                                    die();
                                }
                         }
                     }
                    else
                   {
                       //dont upload image and set image name value as blank
                       $image_name="";
                   }

            
                    //sql query data into database
                    $sql="INSERT INTO tb_category SET title='$title',image_name='$image_name',featured='$featured', active='$active' ";
                    
                    //echo $sql;
                    
                    //execut query
                  $res=mysqli_query($conn,$sql) or die(mysqli_error());
                  
                  
                  if($res==true)
                   {
                   
                    $_SESSION['add']="<div class='msg alt'> category Added successfully </div>";
                    //redirect to manage category page
                    
                    header("location:".HOMEURL.'admin/manage-category.php');
            
                   }
                   else
                   {
                    $_SESSION['add']="<div class='error alt'>failed to add category.</div>";
                    header("location:".HOMEURL.'admin/add-category.php');
                   }
                    
                }
            ?>
            </div>
        </div>    
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>
 



