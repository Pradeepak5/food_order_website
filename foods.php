<?php include('private-front/menu.php');?>
<!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo HOMEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
                $sql="SELECT * FROM tb_food WHERE active='Yes'";
                $res=mysqli_query($conn,$sql);
                $count=mysqli_num_rows($res);
                if($count>0)
                    {
                        while($row=mysqli_fetch_assoc($res))
                        {
                            $id=$row['id'];
                            $title=$row['title'];
                            $price=$row['price'];
                            $description=$row['description'];
                            $image_name=$row['image_name'];
                            ?>
                               <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                            if($image_name=="")
                                            {
                                                echo    "<div class='error alt'>image not available</div>";
                                            }
                                            else{
                                                ?>
                                                    <img src="<?php echo HOMEURL ;?>images/food/<?php echo $image_name ;?>" alt="food item" class="img-responsive img-curve" width="100" height="100">
                                                <?php
                                            }
                                        ?>
                                            
                                    </div>

                                <div class="food-menu-desc">
                                    <h4><?php echo $title;?></h4>
                                    <p class="food-price">$<?php echo $price;?></p>
                                    <p class="food-detail">
                                        <?php  echo $description;?>
                                    </p>
                                    <br>
                                     <a href="<?php echo  HOMEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                                </div>
                            </div>
                            <?php
                     }
                    }
                    else
                    {
                        echo "<div class='error'>Food not found</div>";
                    }
                ?>
           <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('private-front/footer.php');?>