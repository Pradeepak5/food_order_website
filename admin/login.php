<?php include('../config/constants.php');?>
<html>
    <head>
        <title>Login to Resturant webpage</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
    
        <div class="login">
          
        <h4 class="center alt app s1 s2">welcome to <span class='s3 s2'> the avenger's restaurant</span> website<h4>
            <br>
            <br><br><br><br><br>
            <h2 style="text-align:left;color:white;";><pre class="font">                 LOGIN:</pre></h2>
            <?php
            if(isset($_SESSION['login']))
            {
                echo $_SESSION['login'];
                unset($_SESSION['login']);//one time only show to display a message
            }
            if(isset($_SESSION['invalid_login']))
            {
                echo $_SESSION['invalid_login'];
                unset($_SESSION['invalid_login']);//one time only show to display a message
            }
            ?>
            <!--login work starts-->
            
                <form action="" method="POST" class="center ">
                            Username:<br>
                            <input  type="text" name="username" placeholder="Enter your username"><br><br>
                            Password:<br>
                            <input  type="password" name="password" placeholder="Enter your password"><br>
                            <br><br> 
                            
                            <input type="submit" name="submit" value=" LOGIN " class="btn"><br><br>
                </form>
            <!-- login work ends-->
            <br>
            <p style="text-align:center";><pre>                          
                                                      -Developed By <a href="#"><span class="s1 app"> Mohan Selvan</span></a></pre></p>
        </div>
    </body>
</html>  
<?php
   if(isset($_POST['submit']))
   {
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
   
    $res=mysqli_query($conn,$sql);
   
    $count=mysqli_num_rows($res);
     if($count==1)
        {
            $_SESSION['login']="<div class='msg alt'>login successfully.</div>";

            $_SESSION['user']=$username;

             header('location:'.HOMEURL.'admin/');
         }
         else
        {
            $_SESSION['login']="<div class='error center alt'>Invalid username or password.</div>";
            header('location:'.HOMEURL.'admin/login.php');
         }
}

?>  

