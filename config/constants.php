<?php 

    session_start();

    define('HOMEURL','http://localhost/avengers_resturant/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','mysql');
    define('DB_PASSWORD','mysql');
    define('DB_NAME','avengers_resturant');

    $conn  = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());

    $db_select =  mysqli_select_db($conn,DB_NAME) or die(mysqli_error());
?>