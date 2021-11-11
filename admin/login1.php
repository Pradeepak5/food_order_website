<?php include('../config/constants.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Responsive Login Page</title>
    <link rel="stylesheet" href="../css/style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>



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

    <!--form area start-->
    <div class="form">
    <p>Welcome to admin panel</p>
      <!--login form start-->
      <form  class="login-form" action="" method="POST">
        <i class="fas fa-user-circle"></i>
        <input class="user-input" type="text" name="Username" placeholder="Username" required>
        <input class="user-input" type="password" name="Password" placeholder="Password" required>
        <input class="btn" type="submit" name="submit" value="LOGIN">
        <!--<div class="options-01">
          <label class="remember-me"><input type="checkbox" name="">Remember me</label>
          <a href="#">Forgot your password?</a>
        </div>
        <input class="btn" type="submit" name="submit" value="LOGIN">
        <div class="options-02">
          <p>Not Registered? <a href="#">Create an Account</a></p>
        </div>-->
      </form>
      <!--login form end-->
      <!--signup form start-->
      <!--<form class="signup-form" action="" method="POST">
        <i class="fas fa-user-plus"></i>
        <input class="user-input" type="text" name="username" placeholder="Username" required>
        <input class="user-input" type="email" name="" placeholder="Email Address" required>
        <input class="user-input" type="password" name="password" placeholder="Password" required>
        <input class="btn" type="submit" name="submit" value="SIGN UP">
        <div class="options-02">
          <p>Already Registered? <a href="#">Sign In</a></p>
        </div>
      </form>-->
      <!--signup form end-->
    </div>
    <!--form area end-->

    <script type="text/javascript">
    $('.options-02 a').click(function(){
      $('form').animate({
        height: "toggle", opacity: "toggle"
      }, "slow");
    });
    </script>

  </body>
</html>
<?php
   if(isset($_POST['submit']))
   {
    $username=$_POST['Username'];
    $password=md5($_POST['Password']);

    $sql="SELECT * FROM tb_admin WHERE username='$username' AND password='$password'";
   
    $res=mysqli_query($conn,$sql);
   
    $count=mysqli_num_rows($res);
     if($count==1)
        {
            $_SESSION['login']="<div class='msg alt tab '>login successfully.</div>";

            $_SESSION['user']=$username;

             header('location:'.HOMEURL.'admin/');
         }
         else
        {
            $_SESSION['login']="<div class='error center alt'>Invalid username or password.</div>";
            header('location:'.HOMEURL.'admin/login1.php');
         }
}

?>  
