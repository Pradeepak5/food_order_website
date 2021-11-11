<?php include('private-front/menu.php'); ?>


<!-- categories section starts here-->
<section class="categories">
    <div class="container">
        <h2 class="text-center">EXPLORE FOODS</h2>
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
                   $image_name=$row['image_name'];
                   ?>
                   <a href="<?php echo HOMEURL;?>category-foods.php?category_id=<?php echo $id ;?>">
                    <div class="box-3 float-container">
                        <?php
                            if($image_name=="")
                            {
                                echo "<div class='error alt'>image not found</div>";
                            }
                            else
                            {
                                ?>
                                <img src="<?php echo HOMEURL;?>images/category/<?php echo $image_name;?>" alt="category item" class="img-responsive img-curve" height="225">
                                <?php
                            }
                        ?>
                        <h3 class="float-text clr "><?php echo $title;?></h3>
                    </div>
                </a>
                <?php
               } 
            }
            else
            {
                echo "<div class='error alt'> category not found</div>";
            }
        ?>
        
            <div class="clearfix"></div>
         </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('private-front/footer.php');?>


    