<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$con=mysqli_connect('localhost', 'root', '')or die("cannot connect"); 
mysqli_select_db($con,"talkshirt")or die("cannot select DB");
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
		
		<?php	
				if(!isset($_POST['submit'])){
				if(isset($_GET['proname'])){
				$id=$_GET['id'];
				$proname=$_GET['proname'];
				$price=$_GET['price'];
				$query="SELECT * FROM talkshirt_colors WHERE PROID='$id'";
				$result=mysqli_query($con,$query);
				if(mysqli_num_rows($result)>0){
				$row=mysqli_fetch_object($result);
				}

				$query2="SELECT * FROM talkshirt_fabrics WHERE PROID='$id'";
				$result2=mysqli_query($con,$query2);
				if(mysqli_num_rows($result2)>0){
				$row2=mysqli_fetch_object($result2);
				}
				?>			
		<div class='banContent'>
			<form action='order.php' method='POST' >
				<input type=hidden name='proid' value='<?php echo $row->PROID ?>'>
				<input type=hidden name='matid' value='<?php echo $row2->MATERIAL_ID ?>'>
				<input type=hidden name='price' value='<?php echo $price ?>'>
				<input type=hidden name='urlpic' value='<?php echo $row->URLPIC ?>'>
				<input type=hidden name='color' value='<?php echo $row2->COLOR ?>'>
				<input type=hidden name='proname' value='<?php echo $proname ?>'>
				<div class='orderbanner'>
				<center>
				<table>
				<tr><td rowspan=7><img src='upload/<?php echo $row->URLPIC; ?>' width=300px height=300>
					
				</table>
				</center>
				</div>
				
				<div class='ordername'>
					<div class='namecontent'>
					<?php echo "$proname ($row2->COLOR)"; ?>
					</div>
				</div>
				
				<div class='orderbox'>
					<div class='cartheader'>
					Product Info
		
					</div>
					
					<div class='cartheader'>

						<table>
							<tr><td rowspan=9 width='300px' align=center><img src='upload/<?php echo $row->URLPIC; ?>' width=200px height=200>
							<tr><td colspan=4><b><?php echo "$proname"; ?></b>
							<tr><td colspan=4><?php echo "$row2->COLOR"; ?>
							<tr><td colspan=4>Price: Php <?php echo "$price"; ?> 
							<tr><td colspan=4><?php echo $row->PROID;?>
							<tr><td align=center>Quantity: 	<td align=center><input type="text" name="quantity">
							
						</table>
					</div>
					<div class='cartheader'>
					Shipping Method
					<br>
						<table>
							<tr><td>Delivery Address: <td><textarea name='add' cols='34' rows='3' maxlength='100'></textarea><br>
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Pick Up' checked="checked"><td>Pick Up on Store (No Delivery)
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Delivery'><td>Delivery (Free Shipping)
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Delivery with Installation'><td>Delivery with Installation <small>*Installation fee may charge</small>
						</table>	
					</div>
					
					<div class='cartheader'>
					<small>Are you done? You can now check out.</small>		<input type='submit' name='submit' value='Check out' class='button'>
					
					</div>
				</div>
				</form>
		</div>
		
		<?php }else{echo"<br><br><br><br><br><div class='orderbox3'>
							<center>
							<br>
							<img src='bg/sad.png' heigh=50px width=50px>
							<h1><b>Oooops! We've got something wrong here.</b></h1>
							You didn't select a product
							<br><br><br><br>
							<a href='products.php' class='back'>Select a Product</a></center></div>
							<br><br><br><br><br><br><br><br><br><br><br><br>"; 
							header("Refresh: 60; URL='products.php'");}
		}else{
		?>
		<br>
		<br>
		<div class='orderbox'>			
					
					<?php $custinfo="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
								$custinforesult=mysqli_query($con,$custinfo);
								if(mysqli_num_rows($custinforesult)>0){
								$cusrow=mysqli_fetch_object($custinforesult);
						}
						date_default_timezone_set('Asia/Manila');
						$proid=$_POST['proid'];
						$address=$_POST['add'];
						$proname=$_POST['proname'];
						$matid=$_POST['matid'];
						$quan=$_POST['quantity'];
						$price=$_POST['price'];
						$color=$_POST['color'];
						$urlpic=$_POST['urlpic'];
						$shipping=$_POST['shipping'];
						$total=$price*$quan;
						$subtotal=$total;
						$down=$subtotal*.50;
						$date = date("m/d/Y");
						$time = date("h:i:s A");
						$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
							$result = '';
							for ($i = 0; $i < 3; $i++)
								$result .= $characters[mt_rand(0, 61)];
							
						$date2 = date("Ymdhis");
						$transid = $date2.$result;
						
						
							echo"
							<div class='cartheader'>
							<table width=650px >
									<tr><td width=300px>Seller of Record
										
										
									
									<tr><td rowspan=3 align=left>TALKSHIRT, <br>Rizal Avenue, Extension, cor. Royal Road Subd.,Brgy. San Juan,<br>Manila East Road, Taytay Rizal
									<tr><td align=right>Subtotal: Php $total.00 
										<br>					 $quan pc(s)
										<br>			_________________
										<br>Php $subtotal.00	
									<td align=center>Minimum Downpayment of:
										<br>Php $down.00
										<td>Deposit to:
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
											<td align=left>Deposit 50% Downpayment
											<td>$shipping
								</table>
								
							</div>
							<div class='cartheader'>
						<center>
						Are you sure with this order?
						<table>
						<tr><td>
						<form action='receipt.php' method='POST' >
							<input type='submit' name='yes' value='Yes' class='but1'> 	
							<input type=hidden name='proid' value='$proid'>
							<input type=hidden name='address' value='$address'>
							<input type=hidden name='proname' value='$proname'>
							<input type=hidden name='matid' value='$matid'>
							<input type=hidden name='quan' value='$quan'>
							<input type=hidden name='price' value='$price'>
							<input type=hidden name='color' value='$color'>
							<input type=hidden name='urlpic' value='$urlpic'>
							<input type=hidden name='quantity' value='$quan'>
							<input type=hidden name='shipping' value='$shipping'>
							<input type=hidden name='down' value='$down'>
							<input type=hidden name='transid' value='$transid'>
							<input type=hidden name='address' value='$address'>
							<input type=hidden name='date' value='$date'>
							<input type=hidden name='time' value='$time'>
						</form>
						<td>
						<form action='javascript:history.back()' method='POST' >
							<input type='submit' name='no' value='No' class='but2'>
						</form>
						</table>
						<center>
						</div>
								
									
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									<br>
									</div>
								
							</div>";}
							
						?>
					
					
		</div>
		<?php
		 ?>
	
		
</body>
</html>