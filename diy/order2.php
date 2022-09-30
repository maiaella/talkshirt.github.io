<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include '../conn.php'; 

?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
<meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talkshirts</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="style.css">
</HEAD>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="" style="background: #fff;">

	<!--Header-->

	<div class="banner">
        <div class="navbar">
        <ul>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li> <a href="../index.php">Home</a></li>
            <li> <a href="../products.php">Products</a></li>
            <li> <a href="mydesigner.php">Customization</a></li>
            <li> <a href="../contact.php">Contact Us</a></li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
        

		
			
			

        </ul>
        </div>
	<br>
		
		<br>
		<div class='orderbox'>			
					
					<?php

					$query="SELECT * FROM talkshirt_customization_cart WHERE users_id = '".$_SESSION['id']."' ORDER BY id DESC";
								$queryresult=mysqli_query($con,$query);
							
								$row=mysqli_fetch_assoc($queryresult);
								$subtotal = $row['TOTAL'];
								$total = $row['TOTAL'];
								$quantity = $row['small_quantity'] + $row['medium_quantity'] + $row['large_quantity'] + $row['xlarge_quantity'] + $row['xxlarge_quantity'];

					 $custinfo="SELECT * FROM talkshirt_users WHERE UNAME='".$_SESSION['id']."'";
								$custinforesult=mysqli_query($con,$custinfo);
								if(mysqli_num_rows($custinforesult)>0){
								$cusrow=mysqli_fetch_object($custinforesult);
						}
						date_default_timezone_set('Asia/Manila');

						$date = date("m/d/Y");
						$time = date("h:i:s A");
						$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
							$result = '';
							for ($i = 0; $i < 3; $i++)
								$result .= $characters[mt_rand(0, 61)];
							
						$date2 = date("Ymdhis");
						$transid = $date2.$result;
						?>
						
						
							
							<div class="cartheader">
							<table width="650px" style= "font-size:40%">
									<tr><td width="200px">Seller of Record
									<td > <b> Deposit to: BPI Account
										TALKSHIRT
										<br>12345 45678 9101 12 
									<td align=center> <b> <br> &nbsp Gcash: Juan Dela Cruz
										<br>0912345678
										<br> <br>
										
									
									<tr><td rowspan=3 align=left style="font-size:15px">TALKSHIRT <br>Rizal Avenue, Extension, cor. Royal Road Subd.,Brgy. San Juan,<br>Manila East Road, Taytay Rizal
									<tr><td align=right>
										<br>
									
															
										<?php if ($row['small_quantity'] >= 1) { ?>
										<br>
										SMALL <?php echo $row['small_quantity']; ?> pc(s)

										<?php } ?>
															
										<?php if ($row['medium_quantity'] >= 1) { ?>
										<br>
										MEDIUM <?php echo $row['medium_quantity']; ?> pc(s)

										<?php } ?>
															
										<?php if ($row['large_quantity'] >= 1) { ?>
										<br>
										LARGE <?php echo $row['large_quantity']; ?> pc(s)

										<?php } ?>
															
										<?php if ($row['xlarge_quantity'] >= 1) { ?>
										<br>
										XLARGE <?php echo $row['xlarge_quantity']; ?> pc(s)

										<?php } ?>
															
										<?php if ($row['xxlarge_quantity'] >= 1) { ?>
										<br>
										XXLARGE <?php echo $row['xxlarge_quantity']; ?> pc(s)

										<?php } ?>

										<br>			_________________
										<br>
								
									
										
									<tr>	
										<td align=right><b>Total:</b> Php <?php echo $subtotal; ?> .00
							</table>
								
							</div>
							<?php 
							$query="SELECT * FROM talkshirt_users WHERE ID = '".$_SESSION['id']."'";
								$result=mysqli_query($con,$query);
							
								$row=mysqli_fetch_assoc($result);
							?>
							<div class="cartheader">
								<table width=600px >
										<tr><td width=210px>Billing & Delivery Address
											<td align=left>Payment Information
											<td align=left>Shipping Method
											
										
										<tr width=200px><td rowspan=5 align=left width=150px><?php echo $row['FIRST_NAME']." ". $row['LAST_NAME'] ?> >
																	<br>
																	<?php echo $_SESSION['address'] ?>
										<tr width=200px>
											<td align=left>PAYMENT FIRST POLICY
											<td><?php echo $_SESSION['shipping'] ?><br><br>
											<tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr>
										<tr width=200px rowspan=5>
								<form action='order2_controller.php' method='POST' enctype="multipart/form-data" >		
											<td><b>Proof of Payment:
											<td><input type="file" name="PROOF" required >
												<td><b><!-- Down: -->
												<td><input type="hidden" name="DOWN" required value="<?php  echo $total ?>">
											<input type="hidden" name="total" value="<?php  echo $total ?>">
													<input type="hidden" name="quantity" value="<?php  echo $quantity ?>">
											
											
											
								</table>
								
							</div>
							
								
							<div class='cartheader'>
						<center>
						Are you sure with this order?
						<table>
						<tr><td>
						
							<input type='submit' name='yes' value='Yes' class='but1'> 	
		
							
						</form>

						<td>
						<form action='javascript:history.back()' method='POST' >
							<input type='submit' name='no' value='No' class='but2'>
						</form>
						</table>
						<center>
						

						</div>
		
						</div>
</div>
								
							</div>
							
							
						
					
	
		
</body>
</html>