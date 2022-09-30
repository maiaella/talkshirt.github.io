<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "sendphpmailer/PHPMailer.php";
require_once "sendphpmailer/SMTP.php";
require_once"sendphpmailer/Exception.php";
include 'conn.php';
session_start();

if (isset($_POST['yes'])) {
	$USERS_ID = $_SESSION['id'];

	date_default_timezone_set('Asia/Manila');

	$DATE = date("m/d/Y");
	$TIME = date("h:i:s A");
	$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$result = '';
		for ($i = 0; $i < 3; $i++)
			$result .= $characters[mt_rand(0, 61)];
		
	$date2 = date("Ymdhis");
	$TRANSID = $date2.$result;

	$query="SELECT * FROM talkshirt_users WHERE ID = '".$USERS_ID."' ";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);

	$email = $row['EMAIL'];

	$CUSNAME = $row['LAST_NAME']." ".$row['FIRST_NAME'];
	$UNAME = $row['UNAME'];
	$ADDRESS = $_SESSION['address'];
    $SHIPPING = $_SESSION['shipping'];

    $query2="SELECT *,SUM(TOTAL) AS FINAL_TOTAL FROM talkshirt_cart WHERE USERS_ID = '".$USERS_ID."' AND status = 0 ";
	$result2=mysqli_query($con,$query2);
	$row2=mysqli_fetch_assoc($result2);

	$TOTAL = $row2['FINAL_TOTAL'];
	$STATUS = "Pending";

	$PROOF = $_FILES['PROOF']['name'];
	$tmp = $_FILES['PROOF']['tmp_name'];
	$folder = 'proof/';
	move_uploaded_file($tmp, $folder.$PROOF);


	$query3="SELECT *,s.PROID AS s_PROID FROM talkshirt_cart c INNER JOIN talkshirt_stocks s ON c.PROID=s.PROID WHERE c.USERS_ID = '".$USERS_ID."' AND c.status = 0 ";
	$result3=mysqli_query($con,$query3);
	

	while ($row3=mysqli_fetch_assoc($result3)) {

		$STOCKS = $row3['STOCKS'] - $row3['QUANTITY'];

		$query5="UPDATE talkshirt_stocks SET STOCKS = '$STOCKS' WHERE PROID = '".$row3['s_PROID']."'";
	    mysqli_query($con,$query5);

	}

	$DOWN = $_POST['DOWN'];


	$query4="INSERT INTO talkshirt_orders (TRANSID,CUSNAME,UNAME,ADDRESS,TOTAL,DOWN,DPAID,SHIPPING,DATE,TIME,STATUS,PROOF,users_id) VALUES ('$TRANSID','$CUSNAME','$UNAME','$ADDRESS','$TOTAL','$DOWN','$DOWN','$SHIPPING','$DATE','$TIME','$STATUS','$PROOF','$USERS_ID')";
	mysqli_query($con,$query4);

	$ACTIVITY = $UNAME." Ordered Products";
	$CATEGORY = "Order";
	$query4="INSERT INTO talkshirt_trail (UNAME,ACTIVITY,CATEGORY,DATE,TIME) VALUES ('$UNAME','$ACTIVITY','$CATEGORY','$DATE','$TIME')";
	mysqli_query($con,$query4);

	$query4="UPDATE talkshirt_cart SET TRANSID = '$TRANSID', status = 1 WHERE USERS_ID = '$USERS_ID' AND status = 0";
	mysqli_query($con,$query4);












	
		$query="SELECT *,c.PROID AS c_PROID, c.IMAGE AS c_IMAGE FROM talkshirt_cart c INNER JOIN talkshirt_fabrics f ON c.PROID=f.PROID INNER JOIN talkshirt_orders o ON o.TRANSID=c.TRANSID WHERE o.STATUS = 'Pending'";
		$result=mysqli_query($con,$query);


		$query2="SELECT *,SUM(c.TOTAL) AS subtotal, SUM(c.QUANTITY) AS quan FROM talkshirt_cart c INNER JOIN talkshirt_fabrics f ON c.PROID=f.PROID INNER JOIN talkshirt_orders o ON o.TRANSID=c.TRANSID WHERE o.STATUS = 'Pending'";
									$result2=mysqli_query($con,$query2);
									$row2=mysqli_fetch_assoc($result2);

									$subtotal = $row2['subtotal'];
									$quan = $row2['quan'];
									$DOWN = $row2['DOWN'];

	   $query3="SELECT * FROM talkshirt_users WHERE ID = '".$USERS_ID."'";
		$result3=mysqli_query($con,$query3);
		$row3=mysqli_fetch_assoc($result3);

		$fullname = $row3['FIRST_NAME'].' '.$row3['LAST_NAME'];
		$ADDRESS = $_SESSION['address'];
		$SHIPPING = $row2['SHIPPING'];
?>

			
				<script>
				function printpage()
				{
				window.print();
				}
				</script>	



	<?php
	    echo "<script>window.location.href='receipt2.php';</script>";

}
?>