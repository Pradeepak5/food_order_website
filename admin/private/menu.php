<?php 
    include('../config/constants.php');
    include('login-check.php');
  ?>

<html>
     <head>
        <title> Resturant website.home page</title>
        <link rel="stylesheet" href="../css/admin.css">


    </head>
   
    <body>
        <!--menu works starst-->
        
        <div class="menu">
             <div class="wrapper">
                <ul>
                       <li><a href="index.php">Home</a></li>
                       <li><a href="manage-admin.php">Admin</a></li>
                        <li><a href="manage-category.php">Category</a></li>
                        <li><a href="manage-food.php">Food</a></li>
                        <li><a href="manage-order.php">Order</a></li>
                        <li><a href="manage-contact.php">Contact Us</a></li>

                        
                        <li>
                            <form action="login1.php" method="post" class="right1">
                               <button type="button"><a href="login1.php" onclick="return confirm('Are you want to Logout..');">LOGOUT</a></button>

                           </form>
                        </li>
                </ul>

                
             </div>
        <div>
        

        <!-- menu works ends-->

      