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
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
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
<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="200" height="60" align="left"></img></li>	
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
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
	<br>
	<div class='orderbox' id='orderbox'>
<?php

include 'conn.php'; 

	    $USERS_ID = $_SESSION['id'];
	
		$query="SELECT *,c.PROID AS c_PROID, c.IMAGE AS c_IMAGE, SUM(c.QUANTITY) AS c_QUANTITY FROM talkshirt_cart c INNER JOIN talkshirt_fabrics f ON c.PROID=f.PROID INNER JOIN talkshirt_orders o ON o.TRANSID=c.TRANSID WHERE o.STATUS = 'Pending'";
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
													<th>Transaction ID</th>
													<th>Description</th>
												
													<th>Quantity</th>
													<th>Unit Price</th>
													<th>Total</th>
												</tr>
											</thead>
											<tbody>
											<?php while ($row=mysqli_fetch_assoc($result)) { ?>
											<tr>
												<td align="center"><font size="3"><?php echo $row['TRANSID']; ?></font>
											    <td ><?php echo $row['c_PROID'] ?></td>
											    
												<td align="center"><?php echo $row['c_QUANTITY'] ?></td>
												<td align="center"><?php echo $row['PRICE'] ?></td>
												<td align="center"><?php echo $row['TOTAL'] ?></td>
											</tr>
											<?php } ?>
										</tbody>
										</table>
									</div>
									<?php 
									$query2="SELECT *,SUM(c.TOTAL) AS subtotal, SUM(c.QUANTITY) AS quan FROM talkshirt_cart c INNER JOIN talkshirt_fabrics f ON c.PROID=f.PROID INNER JOIN talkshirt_orders o ON o.TRANSID=c.TRANSID WHERE o.STATUS = 'Pending'";
									$result2=mysqli_query($con,$query2);
									$row2=mysqli_fetch_assoc($result2);
									?>
									<div class="cartheader">
									<table width="650px">
											<tr><td width="300px">Seller of Record
												
												
											
											<tr><td rowspan="3" align="left">TALKSHIRT, <br>Olilia Rd Antipolo National highschool<br>Antipolo, 1870 Rizal
											<tr><td align="right">Subtotal: Php <?php echo $row2['subtotal'] ?>.00 
												<br>					 <?php echo $row2['quan'] ?> pc(s)
												<br>			_________________
											
												<td align="right">Deposit to:
												<br>BPI Account
												<br>TALKSHIRT
												<br>12345 45678 9101 12
											<tr>	
												<td align="right"><b>Total:</b> Php <?php echo $row2['subtotal'] ?>.00
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
													<td align="left">
													<td align="left">Shipping Method
													
												
												<tr width="150px"><td rowspan="5" align="left" width="150px"><?php echo $row3['FIRST_NAME']." ".$row3['LAST_NAME'] ?>
																			<br>
																			<?php echo $row3['ADDRESS'] ?>
												<tr>
													<td align="left">
													<td><?php echo $row2['SHIPPING'] ?>
										</table>
										
									</div>
									<div class="cartheader">
								<small>Your order will be accepted after we check your payment. Thank you!
									
									</small>
									<br>
									<input type="button" onclick="printDiv('orderbox')" value="Print" class='but1'/>
									
									<br>
								</div>
								
								
								</div>
								
							</div>

		
		
		
		
</body>
</html>