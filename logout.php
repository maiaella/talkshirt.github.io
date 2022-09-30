<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
// $con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
// mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
include 'conn.php';
$uname = $_SESSION['uname'];
$name = $_SESSION['name'];
$lname = $_SESSION['lname'];
date_default_timezone_set('Asia/Manila');
$date = date("m/d/Y");
$time = date("h:i:s A");
$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$uname','$uname Logged Out','Log Out','$date','$time')";
$result4=mysqli_query($con,$query4);
session_destroy();
header("location:droppage.php")
?>