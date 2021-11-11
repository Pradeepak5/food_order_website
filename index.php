<?php include('private-front/menu.php') ;?>


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
    <?php
         if(isset($_SESSION['order']))
         {
             echo $_SESSION['order'];
             unset($_SESSION['order']);//one time only show to display a message
         }
         if(isset($_SESSION['contact']))
            {
                echo $_SESSION['contact'];
                unset($_SESSION['contact']);//one time only show to display a message
             }
    ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>


            <?php
                $sql= "SELECT * FROM tb_category WHERE active='Yes' AND featured='Yes' LIMIT 3";
                //execute query
                $res= mysqli_query($conn,$sql);

                $count=mysqli_num_rows($res);

                if($count>0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id=$row['id'];
                        $title=$row['title'];
                        $image_name=$row['image_name'];
                        ?>
                            <a href="<?php echo HOMEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                                <div class="box-3 float-container">
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class='error alt'>image not avaliable</div>";
                                        }
                                        else
                                        {
                                                //avaliable
                                             ?>
                                            <img src="<?php echo HOMEURL ;?>images/category/<?php echo $image_name ;?>" alt="Food items" class="img-responsive img-curve" height="250">
                                             <?php
                                        }
                                    ?>
                                     <h3 class="float-text" style="color:black";><?php echo $title; ?></h3>
                                </div>
                                </a>

                        <?php
                    }
                }
                else
                {
                    echo "<div class='error alt'>category not added</div>";
                }

            ?>
            
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Items</h2>

            <?php
                //getting food from database where are active and featured
                $sql1="SELECT * FROM tb_food WHERE active='Yes' AND featured='Yes' LIMIT 6";
                $res1=mysqli_query($conn,$sql1);
                $count1=mysqli_num_rows($res1);
                if($count1>0)
                {
                    while($row1=mysqli_fetch_assoc($res1))
                    {
                        $id=$row1['id'];
                        $title=$row1['title'];
                        $price=$row1['price'];
                        $description=$row1['description'];
                        $image_name=$row1['image_name'];
                        ?>
                            <div class="food-menu-box">
                                <div class="food-menu-img">
                                    <?php
                                        if($image_name=="")
                                        {
                                            echo "<div class='error alt'> image not found</div>";
                                        }
                                        else{
                                            ?>
                                                <img src="<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve" width="100" height="100">
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                                <div class="food-menu-desc">
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">$<?php echo $price ;?></p>
                                    <p class="food-detail">
                                        <?php echo $description ;?>
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
                    echo "<div class='error alt'>food not found</div>";
                }
                
                ?>
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

<?php include('private-front/footer.php') ;?> 