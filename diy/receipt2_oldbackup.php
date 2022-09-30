<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$uname=$_SESSION['uname'];
$urlpic=$_SESSION['urlpic'];
}
?>

<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="../css/style.css" type="text/css" media="all">
<link rel="stylesheet" href="style.css">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
<script type="text/javascript">
	 function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
</head>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="" style="background: #fff;">
	 
	<!--Header-->
<div class="banner">
        <div class="navbar">
        <ul>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li> <a href="../index.php">Home</a></li>
            <li> <a href="../products.php">Products</a></li>
            <li> <a href="diy/mydesigner.php">Customization</a></li>
            <li> <a href="../contact.php">Contact Us</a></li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
        


			

        </ul>
        </div>
	
	<br>
	<br>
	<br>
	<div class='orderbox' id='orderbox'>
<?php

include '../conn.php'; 

	    $USERS_ID = $_SESSION['id'];
	
		$query="SELECT *, cc.COLOR AS cc_COLOR FROM talkshirt_customization_cart cc  INNER JOIN talkshirt_orders o ON cc.TRANSID=o.TRANSID WHERE o.STATUS = 'Pending'";
		$result=mysqli_query($con,$query);
		
		?>
		
		
				
							
				<script>
				function printpage()
				{
				window.print();
				}
				</script>	


				
									<div class="cartheader">
									
									Thanks for your order!
									</div>
									<div class="cartheader">
										<table width=800px>
											<thead>
												<tr>
													<th align="left">Transaction ID</th>
													
													
												</tr>
											</thead>
											<tbody>
											<?php while ($row=mysqli_fetch_assoc($result)) { ?>
											<tr>
												<td><font size="3"><?php echo $row['TRANSID']; ?></font>
											   
												
											</tr>
											<?php } ?>
										</tbody>
										</table>
									</div>
									<?php 
									$query2="SELECT *, o.TOTAL as o_TOTAL FROM talkshirt_customization_cart cc  INNER JOIN talkshirt_orders o ON cc.TRANSID=o.TRANSID WHERE o.STATUS = 'Pending'";
									$result2=mysqli_query($con,$query2);
									$row2=mysqli_fetch_assoc($result2);
									
									?>
									<div class="cartheader">
									<table width="650px">
											<tr><td width="300px">Seller of Record
												
												
											
											<tr><td rowspan="3" align="left">TALKSHIRT, <br>Rizal Avenue, Extension, cor. Royal Road Subd.,Brgy. San Juan,<br>Manila East Road, Taytay Rizal
											
											
												
												
											<tr>	
												<td align="right"><b>Total:</b> Php <?php echo $row2['o_TOTAL'] ?>.00
									</table>
									
										
									</div>
									<?php
									$query3="SELECT * FROM talkshirt_users WHERE ID = '".$USERS_ID."'";
									$result3=mysqli_query($con,$query3);
									$row3=mysqli_fetch_assoc($result3);
									?>
									<div class="cartheader">
										<table width="600px">
												<tr><td width="210px">Billing & Delivery Address
													<td align="left">Payment Information
													<td align="left">Shipping Method
													
												
												<tr width="150px"><td rowspan="5" align="left" width="150px"><?php echo $row3['FIRST_NAME']." ".$row3['LAST_NAME'] ?>
																			<br>
																			<?php echo $_SESSION['address'] ?>
												<tr>
													<td align="left">Payment first policy
													<td><?php echo $row2['SHIPPING'] ?>
										</table>
										
									</div>
									<div class="cartheader">
								<small style="font-size: 25px;">Your order will be accepted after we check your payment. Thank you!
									
									</small>
									<br>
									<br>
									<input type="button" onclick="printDiv('orderbox')" value="Print" class='but1'/>
									
									<br>
								</div>
								
								
								</div>
								
							</div>

		
		
		
		
</body>
</html>