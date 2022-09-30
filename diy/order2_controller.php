<?php
include '../conn.php';
session_start();

if (isset($_POST['yes'])) {
	$USERS_ID = $_SESSION['id'];


	$query="SELECT * FROM talkshirt_customization_cart WHERE users_id = '".$USERS_ID."' ORDER BY id DESC";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);

	date_default_timezone_set('Asia/Manila');

	$DATE = date("m/d/Y");
	$TIME = date("h:i:s A");

	$TRANSID = $row['TRANSID'];


	$query="SELECT * FROM talkshirt_users WHERE ID = '".$USERS_ID."' ";
	$result=mysqli_query($con,$query);
	$row2=mysqli_fetch_assoc($result);

	

	$CUSNAME = $row2['LAST_NAME']." ".$row2['FIRST_NAME'];
	$UNAME = $row2['UNAME'];
	$ADDRESS = $_SESSION['address'];
    $SHIPPING = $_SESSION['shipping'];
    $QUANTITY = $_POST['quantity'];
    $TOTAL = $_POST['total'];
    $DOWN = $_POST['DOWN'];
    $TYPE = "Customization";

	$STATUS = "Pending";

	$PROOF = $_FILES['PROOF']['name'];
	$tmp = $_FILES['PROOF']['tmp_name'];
	$folder = '../proof/';
	move_uploaded_file($tmp, $folder.$PROOF);




	$query4="INSERT INTO talkshirt_orders (TRANSID,CUSNAME,UNAME,ADDRESS,TOTAL,DOWN,SHIPPING,DATE,TIME,STATUS,PROOF,TYPE,users_id) VALUES ('$TRANSID','$CUSNAME','$UNAME','$ADDRESS','$TOTAL','$DOWN','$SHIPPING','$DATE','$TIME','$STATUS','$PROOF','$TYPE','$USERS_ID')";
	mysqli_query($con,$query4);

	$ACTIVITY = $UNAME." Ordered Products Customization";
	$CATEGORY = "Order";
	$query4="INSERT INTO talkshirt_trail (UNAME,ACTIVITY,CATEGORY,DATE,TIME) VALUES ('$UNAME','$ACTIVITY','$CATEGORY','$DATE','$TIME')";
	mysqli_query($con,$query4);


	header('location:receipt2.php');
	
}
?>