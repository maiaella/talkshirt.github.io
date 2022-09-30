<?php
include '../../../conn.php';
session_start();

$img = $_POST['preview_front_image'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData = base64_decode($img);
$fileName = 'IMG-'.rand(00000,99999).'.png';


$img = $_POST['preview_back_image'];
$img = str_replace('data:image/png;base64,', '', $img);
$img = str_replace(' ', '+', $img);
$fileData2 = base64_decode($img);
$fileName2 = 'IMG-'.rand(00000,99999).'.png';



file_put_contents($fileName, $fileData);
file_put_contents($fileName2, $fileData2);


$users_id = $_SESSION['id'];
$TRANSID = $_POST['TRANSID'];
$COLOR = $_POST['sendcolor'];

$small_quantity = $_POST['small2'];
$medium_quantity = $_POST['medium2'];
$large_quantity = $_POST['large2'];
$xlarge_quantity = $_POST['xlarge2'];
$xxlarge_quantity = $_POST['xxlarge2'];




$total_small_price = $_POST['total_small_price2'];
$total_medium_price = $_POST['total_medium_price2'];
$total_large_price = $_POST['total_large_price2'];
$total_xlarge_price = $_POST['total_xlarge_price2'];
$total_xxlarge_price = $_POST['total_xxlarge_price2'];

$TOTAL = $_POST['total_quantity_price2'];

$front_image = $fileName;
$back_image = $fileName2;


$stock = $small_quantity + $medium_quantity + $large_quantity + $xlarge_quantity + $xxlarge_quantity;
$colorid = $_POST['colorid'];

$query="SELECT * FROM inventorycustomization WHERE id = '".$colorid."' ";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);
$stock = $row['stock'] - $stock;

$query="UPDATE inventorycustomization SET stock = '".$stock."' WHERE id = '".$colorid."'";
	mysqli_query($con,$query);




$query="INSERT INTO talkshirt_customization_cart (users_id,TRANSID,COLOR,small_quantity,total_small_price,medium_quantity,total_medium_price,large_quantity,total_large_price,xlarge_quantity,total_xlarge_price,xxlarge_quantity,total_xxlarge_price,TOTAL,front_image,back_image) VALUES ('$users_id','$TRANSID','$COLOR','$small_quantity','$total_small_price','$medium_quantity','$total_medium_price','$large_quantity','$total_large_price','$xlarge_quantity','$total_xlarge_price','$xxlarge_quantity','$total_xxlarge_price','$TOTAL','$front_image','$back_image')";
	mysqli_query($con,$query);

$_SESSION['address'] = $_POST['address'];
$_SESSION['shipping'] = $_POST['shipping'];


	header('location:../../order2.php');


?>