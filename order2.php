<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'conn.php'; 

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
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
<meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talkshirts</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

</HEAD>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="" style="background: #fff;">

	<!--Header-->
<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> 
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp></dp><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		
		<br>
		<div class='orderbox'>			
					
					<?php

					$query="SELECT *,SUM(TOTAL) AS subtotal, SUM(QUANTITY) AS quan FROM talkshirt_cart WHERE USERS_ID = '".$_SESSION['id']."' AND status = 0";
								$queryresult=mysqli_query($con,$query);
							
								$row=mysqli_fetch_assoc($queryresult);
								$subtotal = $row['subtotal'];
								$quan = $row['quan'];
								$total = $row['subtotal'];

					 $custinfo="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
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
							<table width="650px" style= "font-size:45%"> <br>
									<tr><td width="200px">Seller of Record
									<td > <b> Deposit to: BPI Account
										TALKSHIRT
										<br>12345 45678 9101 12 
									<td align=center> <b> <br> &nbsp Gcash: Juan Dela Cruz
										<br>0912345678
										<br> <br> 
										
									<tr> 
									<tr><td rowspan=3 align=left style="font-size:16px">TALKSHIRT <br>Olilia Rd Antipolo National highschool<br>Antipolo, 1870 Rizal
									<tr><td align=right>Subtotal: Php <b><?php echo $total ?>.00 
										<br>					 <?php echo $quan ?> pc(s)
										<br>			_________________
										
								
									
										
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
																	<?php echo $row['ADDRESS'] ?>
										<tr width=200px>
											<td align=left>PAYMENT FIRST POLICY
											<td><?php echo $_SESSION['shipping'] ?><br><br>
											<tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr> <tr>
										<tr width=200px rowspan=5>
								<form action='order2_controller.php' method='POST' enctype="multipart/form-data" >		
											<td><b>Proof of Payment:
											<td><input type="file" name="PROOF" required >
												<td><b>
													<!-- Down: -->
												<td><input type="hidden" name="DOWN" required placeholder="0.00" value="<?php echo $subtotal; ?>">
											
											
											
											
											
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