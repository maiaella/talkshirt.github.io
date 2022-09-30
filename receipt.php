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

	$quan=$_POST['quantity'];
	$proname=$_POST['proname'];
	date_default_timezone_set('Asia/Manila');
	$date2 = date("m/d/Y");
	$time2 = date("h:i:s A");
				
	$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$uname','$uname Ordered $quan pc(s) of $proname','Order','$date2','$time2')";
	$result4=mysqli_query($con,$query4);

		$custinfo="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
				$custinforesult=mysqli_query($con,$custinfo);
				if(mysqli_num_rows($custinforesult)>0){
				$cusrow=mysqli_fetch_object($custinforesult);
		}
		$uname=$_SESSION['uname'];
		$proid=$_POST['proid'];
		$matid=$_POST['matid'];
		$address=$_POST['address'];
		$price=$_POST['price'];
		$color=$_POST['color'];
		$urlpic=$_POST['urlpic'];
		$shipping=$_POST['shipping'];
		$down=$_POST['down'];
		$transid=$_POST['transid'];
		$date=$_POST['date'];
		$time=$_POST['time'];
		$total=$price*$quan;
		$subtotal=$total;
		
		$status = 'Pending';

		$PROOF = $_FILES['PROOF']['name'];
	$tmp = $_FILES['PROOF']['tmp_name'];
	$folder = 'proof/';
	move_uploaded_file($tmp, $folder.$PROOF);
		
		$query="INSERT INTO `talkshirt_orders` (`TRANSID`, `CUSNAME`,`UNAME`, `ADDRESS`, `PRONAME`, `PROID`,`MATERIAL_ID`,`COLOR`,`QUANTITY`,`TOTAL`,`DOWN`,`SHIPPING`,`DATE`,`TIME`,`STATUS`,`IMAGE`,`PROOF`) VALUES ('$transid','$cusrow->FIRST_NAME $cusrow->LAST_NAME','$uname','$address','$proname','$proid','$matid','$color','$quan','$subtotal','$down','$shipping','$date','$time','$status','$urlpic','$PROOF')";
		
		$query2="SELECT * FROM talkshirt_stocks WHERE PROID='$proid'";
		$result2=mysqli_query($con,$query2);
		if(mysqli_num_rows($result2)>0){
		$row=mysqli_fetch_object($result2);
		}
		
		$totalstocks = $row->STOCKS - $quan;
		
		
		
			$result=mysqli_query($con,$query) or die(mysqli_error());
		if($row->STOCKS<=1){
			/*echo "<script type='text/javascript'>alert('ITEM ON CRITICAL LEVEL');</script>";*/
				$query3="UPDATE talkshirt_stocks
					SET
					STOCKS='0'
					WHERE PROID='$proid'";
			$result3=mysqli_query($con,$query3);
		}else{
			$query3="UPDATE talkshirt_stocks
					SET
					STOCKS='$totalstocks'
					WHERE PROID='$proid'";
			$result3=mysqli_query($con,$query3);
		}
				echo"	
							
				<script>
				function printpage()
				{
				window.print();
				}
				</script>	


				
									<div class='cartheader'>
									
									Thanks for your order!
									</div>
									<div class='cartheader'>
										<table width=800px>
											<tr><td colspan=6 align=right>Transaction No.: <font size=3>$transid</font>
											<tr><td width=210px>Item
												<td>Description
												<td align=center>Quantity
												<td align=center>Unit Price
												<td align=right>Total Price
											
											<tr><td rowspan=8 align=left><img src='upload/$urlpic' width=200px height=200>
											<tr><td>$proid
												<td align=center>$quan
												<td align=center>Php $price 
												<td align=right>Php $total.00
											<tr><td><b>$proname</b>
											<tr><td>Color: $color
											
										</table>
									</div>
									<div class='cartheader'>
									<table width=650px >
											<tr><td width=300px>Seller of Record
												
												
											
											<tr><td rowspan=3 align=left>TALKSHIRT, <br>Rizal Avenue, Extension, cor. Royal Road Subd.,Brgy. San Juan,<br>Manila East Road, Taytay Rizal
											<tr><td align=right>Subtotal: Php $total.00 
												<br>					 $quan pc(s)
												<br>			_________________
												<br>Php $subtotal.00
												
												<td align=right>Deposit to:
												<br>BPI Account
												<br>TALKSHIRT
												<br>12345 45678 9101 12
											<tr>	
												<td align=right><b>Total:</b> Php $subtotal.00
									</table>
									
										
									</div>
									
									<div class='cartheader'>
										<table width=600px>
												<tr><td width=210px>Billing & Delivery Address
													<td align=left>Payment Information
													<td align=left>Shipping Method
													
												
												<tr width=150px><td rowspan=5 align=left width=150px>$cusrow->FIRST_NAME $cusrow->LAST_NAME
																			<br>
																			$address
												<tr>
													<td align=left>PAYMENT FIRST POLICY
													<td>$shipping
										</table>
										
									</div>
									<div class='cartheader'>
								<small>Your order will be accepted after we check your payment. Thank you!
									
									</small>
									<br>";?>
									<input type="button" onclick="printDiv('orderbox')" value="Print" class='but1'/>
									<?php echo"
									<br>
								</div>
								
								
								</div>
								
							</div>";

		
		
		?>
		
</body>
</html>