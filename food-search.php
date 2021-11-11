<?php include('private-front/menu.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
                        <?php
                            //get search keyword
                             $search=$_POST['search'];
                        ?>
            
            <h2>Foods on Your Search <a href="#" class="text-white"><?php  echo $search; ?></a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Items</h2>
            <?php
                
                //query
                $sql="SELECT * FROM tb_food WHERE title LIKE '%$search%' OR description LIKE '%$search%' ";
               
                $res =  mysqli_query($conn,$sql);
               
                $count = mysqli_num_rows($res);
                
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
                                    <h4><?php echo $title; ?></h4>
                                    <p class="food-price">$<?php echo $price; ?></p>
                                    <p class="food-detail">
                                        <?php echo $description; ?>
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
                    echo "<div class='error alt'>food not available</div>";
                }
            ?>
       
       
                <div class="clearfix"></div>
            </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('private-front/footer.php');?>