<?php
session_start();
include 'conn.php'; 

	$USERS_ID = $_SESSION['id'];
		
		$query2="SELECT COUNT(id) AS total FROM talkshirt_cart WHERE USERS_ID='$USERS_ID' AND status = 0";
		$result2=mysqli_query($con,$query2);
		if(mysqli_num_rows($result2)>0){
		$row=mysqli_fetch_assoc($result2);
		echo $row['total'];
		}
		
	

		
		
		?>
		