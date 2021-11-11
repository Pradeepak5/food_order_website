<?php
    ob_start();
     include('private/menu.php');
 ?>
<!-- content works starts-->
<div class="content">
             <div class="wrapper">
                 <h4>ADD FOOD</h4>
                 <br>

                 <?php
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);//one time only show to display a message
                    }
                 ?>
            <form action="" method="post" enctype="multipart/form-data">
            <table class="tb3">
                <tr>
                    <td>Title:</td>
                    <td><input  type="text" name="title" placeholder="Title"></td>
                </tr>       
                <tr>
                    <td>Description:</td>
                    <td><textarea cols="25" row="5" name="description" placeholder="Description of food"></textarea></td>
                </tr>       
        
                <tr>
                    <td>Price:</td>
                    <td><input  type="number" name="price" placeholder=""></td>

                </tr> 
                <tr>
                    <td>Select Image:</td>
                    <td><input  type="file" name="image" placeholder=""></td>
                </tr> 
                <tr>
                    <td>Category:</td>
                    <td>
                        <select  name="category" >
                        <?php
                            $sql="SELECT * FROM tb_category WHERE active='Yes'";
                            $res=mysqli_query($conn,$sql);
                            $count=mysqli_num_rows($res);
                            if($count>0)
                            {
                                while($row=mysqli_fetch_assoc($res))
                                {
                                    $id=$row['id'];
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
                    <input type="submit" name="submit" value ="ADD FOOD" class="btn2">
                </td>   
            </table>
            </form>
            <?php
                if(isset($_POST['submit']))
                {
                    //get the data
                    $id=$_POST['id'];
                    $title=$_POST['title'];
                    $description=$_POST['description'];
                    $price=$_POST['price'];
                    $category=$_POST['category'];
                    
                    if(isset($_POST['featured']))
                    {
                        $featured=$_POST['featured'];
                    
                    }
                    else
                    {
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
                    //upload image
                    if(isset($_FILES['image']['name']))
                    {
                    
                        $image_name=$_FILES['image']['name'];

                        if($image_name!="")
                        {
                            
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
                                header('location:'.HOMEURL.'admin/add-food.php');
                                //stop the process
                                die();
                            }
                        }
                    }
                    else
                    {
                        $image_name="";//default image name
                    }
                            // for value or number do not use single quotes in query...eg:price like a  number to entered so...
                            $sql1="INSERT INTO tb_food SET title='$title',description='$description',price=$price, 
                            image_name='$image_name',
                            category_id='$category',
                            featured ='$featured', 
                            active='$active'
                            ";
                            $res1=mysqli_query($conn,$sql1);
                            if($res1==true)
                            {
                                $_SESSION['add']="<div class='msg alt'> food added successfully</div>";
                                header('location:'.HOMEURL.'admin/manage-food.php');
                                ob_end_flush();
                            }
                            else{
                                $_SESSION['add']="<div class='error alt'> failed to add food...</div>";
                                header('location:'.HOMEURL.'admin/manage-food.php');
                            }

                }
            ?>
            </div>
        </div>    
        
 
<?php include('private/footer.php');?>