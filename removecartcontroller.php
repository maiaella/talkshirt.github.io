<?php
session_start();
include 'conn.php'; 


 $query4="DELETE FROM talkshirt_cart  WHERE id = '".$_GET['cid']."'";
	  mysqli_query($con,$query4);

echo "<script type='text/javascript'>alert('Successfully Remove from Cart');</script>";
echo "<script>window.location.href='cart.php';</script>";
		
	
	

		
		
		?>
		