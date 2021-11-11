<?php
    //acces control,whether user is logged or not
    if(!isset($_SESSION['user']))
    {
        
        $_SESSION['invalid_login']= "<div class='error alt1'>please  login to access admin panel.</div>";
        header('location:'.HOMEURL.'admin/login.php');
            
    }

?>