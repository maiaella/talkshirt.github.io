<?php
session_start();
include 'conn.php'; 

	$c_id=$_POST['c_id'];
	$quantity=$_POST['quantity'];
	$USERS_ID = $_SESSION['id'];

	$count = count($_POST['c_id']);

	for ($i=0; $i < $count; $i++) { 


	    $TOTAL = $_POST['PRICE'][$i] * $_POST['quantity'][$i];

 $query4="UPDATE talkshirt_cart SET QUANTITY = '{$_POST['quantity'][$i]}', TOTAL = '$TOTAL' WHERE id = '{$_POST['c_id'][$i]}' AND USERS_ID = '$USERS_ID' AND status = 0";
	  mysqli_query($con,$query4);
$_SESSION['address'] = $_POST['address'];
$_SESSION['shipping'] = $_POST['shipping'];
	header('location:order2.php');
		
	}
	

		
		
		?>
		