<?php
 
		include '../conn.php';
		$TRANSID = $_POST['TRANSID'];
		$query="SELECT * FROM talkshirt_orders WHERE TRANSID = '".$TRANSID."'";
			
			
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_object($result);
?>

<img src='../proof/<?php echo $row->PROOF ?>' width="100%" height="100%">