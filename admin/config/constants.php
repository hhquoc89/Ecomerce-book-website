<?php 
    session_start();

    //connect with the data base
    define('SITEURL','http://localhost/Ebook/');
    define('LOCALHOST','localhost');
    define('BD_USERNAME','root');
    define('BD_PASSWORD','');
    define('BD_NAME','ebook');
    $conn =mysqli_connect(LOCALHOST,BD_USERNAME,BD_PASSWORD) or die(mysqli_error());
    $db_select=mysqli_select_db($conn,BD_NAME) or die(mysqli_error());
?>