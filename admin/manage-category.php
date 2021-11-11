<?php include('private/menu.php');?>
<!-- content works starts-->
<div class="content">
    <div class="wrapper">
        <h4>MANAGE CATEGORY</h4>
            <br><br>
            <?php
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);//one time only show to display a message
                    }
                    if(isset($_SESSION['remove']))
                    {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);//one time only show to display a message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);//one time only show to display a message
                    }
                    if(isset($_SESSION['not-found']))
                    {
                        echo $_SESSION['not-found'];
                        unset($_SESSION['not-found']);//one time only show to display a message
                    }
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);//one time only show to display a message
                    }
                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);//one time only show to display a message
                    }
                    if(isset($_SESSION['failed']))
                    {
                        echo $_SESSION['failed'];
                        unset($_SESSION['failed']);//one time only show to display a message
                    }
             ?>
            <br><br>
             <a href="add-category.php" class="btn1 s1">ADD CATEGORY</a>
            <br><br><br>

            <table class="tb2">
                <tr>
                    <th>S.NO</th> 
                    <th>Title</th> 
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr>
             <?php
                $sql="SELECT * FROM tb_category";
                $res=mysqli_query($conn,$sql);
                if($res==true)
                {
                    $count=mysqli_num_rows($res);
                    $n=1;
                    if($count>0)
                
                    {
                        while($rows=mysqli_fetch_assoc($res))
                        {
                            $id=$rows['id'];
                            $title=$rows['title'];
                            $image_name=$rows['image_name'];
                            $featured=$rows['featured'];
                            $active=$rows['active'];
                            ?>
                              <tr>
                                 <td><?php echo $n++ ;?></td>
                                 <td><?php echo $title;?></td>
                                 
                                 <td>
                                    <?php
                                        //image name avaliable or not
                                        if($image_name!="")
                                        {
                                            //dispaly image name 
                                            ?>
                                            <img src="<?php echo HOMEURL;?>images/category/<?php echo $image_name;?>" height="100" width="100">
                                            <?php
                                        }
                                        else
                                        {
                                            echo "<div class='error alt'>image not avaliable</div>";
                                        }
                                    ?>
                                 </td>
                                
                                 <td><?php echo $featured;?></td>
                                 <td><?php echo $active;?></td>
                                
                                 <td>
                                     <a href="<?php echo HOMEURL; ?>admin/update-category.php?id=<?php echo $id; ?>" class="btn2 ">UPDATE CATEGORY</a>
                                     <a href="<?php echo HOMEURL; ?>admin/delete-category.php?id=<?php echo $id; ?> & image_name=<?php echo $image_name;?>" class="btn3 ">DELETE CATEGORY</a>
                                 </td>
                             </tr>
                

                            <?php
                        }
                    }
                 else
                    {
                            //do not have a data in datebase
                            ?>
                            <tr>
                                <td colspan="6"><div class="error alt">no category addded</div></td>
                            </tr>
                            <?php
                    }
                }

                ?>
            </table>
      </div>
</div>
        
        <!-- content works ends-->
 <?php include('private/footer.php');?>
