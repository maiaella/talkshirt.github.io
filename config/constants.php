<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/talkshirt/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'talkshirt');
    
    $conn=mysqli_connect('localhost', 'root', '')or die("cannot connect");  //Database Connection
    mysqli_select_db($con,"talkshirt")or die("cannot select DB"); //SElecting Database


?>