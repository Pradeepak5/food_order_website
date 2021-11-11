<?php
    include('../config/constants.php');

   /* function function_alert($message)
    {
        echo "<script>alert<'$message');</script>";
    }
    function_alert("welcome");*/
    
    function createConfirmationmbox() {
        echo '<script type="text/javascript">';
        echo 'function openulr(login.php) {';
        echo 'if(confirm("Are you want to logut!")) {';
        echo 'document.location = <a href="login.php">LOGOUT</a>';
        echo '}';
        echo '}';
        echo '</script>';
        }

    
    //DESTROY SESSION
    session_destroy();
   
    header('location:'.HOMEURL.'admin/login1.php');
 ?>
