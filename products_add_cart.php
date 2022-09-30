<?php
session_start();
include 'conn.php'; 

	$PROID=$_POST['PROID'];
	$USERS_ID = $_SESSION['id'];

	// $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
	// $result = '';
	// for ($i = 0; $i < 3; $i++)
	// $result .= $characters[mt_rand(0, 61)];
	// $date2 = date("Ymdhis");
	// $TRANSID = $date2.$result;

	$query3="SELECT * FROM talkshirt_stocks WHERE PROID='$PROID'";
	$result3=mysqli_query($con,$query3);
	$row3=mysqli_fetch_assoc($result3);
	$MATERIALID = $row3['MATID'];
	$QUANTITY = 1;		
	$PRICE = $row3['PRICE'];
	$TOTAL = $row3['PRICE'];
	$IMAGE = $row3['URLPIC'];

	$query2="SELECT * FROM talkshirt_cart WHERE PROID='$PROID' AND USERS_ID='$USERS_ID' AND status = 0";
		$result2=mysqli_query($con,$query2);
		if(mysqli_num_rows($result2)>0){

		}else{
			$query4="INSERT INTO talkshirt_cart (`USERS_ID`,`PROID`,`MATERIALID`,`QUANTITY`,`PRICE`,`TOTAL`,`IMAGE`)VALUES('$USERS_ID','$PROID','$MATERIALID','$QUANTITY','$PRICE','$TOTAL','$IMAGE')";
	$result4=mysqli_query($con,$query4);
		}
				
	

	
		


		
		// $query2="SELECT * FROM talkshirt_stocks WHERE PROID='$proid'";
		// $result2=mysqli_query($con,$query2);
		// if(mysqli_num_rows($result2)>0){
		// $row=mysqli_fetch_object($result2);
		// }
		
	

		
		
		?>
		