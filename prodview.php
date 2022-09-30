<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
}

?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body style="background: #eee;">

	<!--Header-->
<div id="header2" class='header2'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><a href="#" id='logo' style='padding-right:16px;'></a></li>	
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
			
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		
		<?php
		
if(isset($_GET['id'])){
$id=$_GET['id'];
 
include 'conn.php';
$query="SELECT * FROM talkshirt_stocks WHERE PROID='$id'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_object($result);
}
$query3="SELECT * FROM talkshirt_fabrics WHERE PROID='$id'";
$result3=mysqli_query($con,$query3);
if(mysqli_num_rows($result)>0){
$row3=mysqli_fetch_object($result3);
}
?>
		<div class='prodview'>
			<div class='prodim' style="text-align: center">
			<img src='<?php echo "upload/$row->URLPIC" ?>' width=350px height=350px >
			</div>
			<div class='prodinfo' style="text-align: right;">
				<br>
				<br>
				<h9><?php echo $row->NAME ?></h9>
				<br>
				Price <?php echo $row->PRICE ?> 
				<br>
				<?php echo $row->DESCR ?>
				
			
			</div>
			<div class='prodcolor' style="text-align: center;overflow-y: scroll;">
			<?php
			
			$query2="SELECT * FROM talkshirt_fabrics WHERE PROID='$id'";
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows($result2)>0){
				$i =1;
				$mat = $row3->PROID;
				$proname = $row->NAME;
				$price = $row->PRICE;
				while($row2=mysqli_fetch_object($result2)){
				
				echo "<br><form action='' method=POST><input type='image' src='upload/$row2->URLPIC' name=submit alt='Submit' value='$row2->PROID' height='100px' width='100px' style='border-radius:100px;'>
				
				<input type=hidden name='proid' value='$row2->PROID'>
				<input type=hidden name='name1' value='$row->NAME'>
				<input type=hidden name='price' value='$row->PRICE'>
				<input type=hidden name='descr' value='$row->DESCR'>
				</form>";
				$i++;
				?>
				<div class='orderbut'>
				<table>
				<tr><?php if(isset($_SESSION['name'])){
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo"<td><small>Admin./Employee(s) can't place order.";
					}else{
						$number=mysqli_fetch_object(mysqli_query($con,"SELECT STOCKS FROM talkshirt_stocks WHERE PROID='".$row2->PROID."'"));
						if($number->STOCKS==0){
							echo"<td>Item Unavailable
							<td><img src='bg/next.png' height='30px' width='30px'>";
						}else{
							echo"<td><a href='order.php?id=$mat&proname=$proname&price=$price'>Order Now</a> 
							<td><a href='order.php?id=$mat&proname=$proname&price=$price'><img src='bg/next.png' height='30px' width='30px'></a>";
					}
					
					}}else{
					echo"<td><a href='login.php'>Sign in to order.</a>"; 
					}
					?>
				</table>
				</div><?php
				}
				
				}
			else{
				echo "<h3>No Data Found</h3>";
			}
			
			?>
			
			</div>
			
			<div class='prodback' style="text-align: center">
				<div class='orderbut'>
				<table>
				<tr><?php
					
					}else{echo"<br><br><br><br><br><div class='orderbox3'>
							<center>
							<br>
							<img src='bg/sad.png' heigh=50px width=50px>
							<h1><b>Oooops! We've got something wrong here.</b></h1>
							You didn't select a product
							<br><br><br><br>
							<a href='products.php' class='back'>Select a Product</a></center></div>
							<br><br><br><br><br><br><br><br><br><br><br><br>"; 
							header("Refresh: 60; URL='products.php'");
							echo"<div class='footer'>
										<div class='logofoot'>
										<img src='bg/logofoot.png'>
										</div>
										<div class='now'>
										<e1>© 2022 All rights Reserved.</e1>
										</div>
									</div>";}
					?>
				</table>
				</div>
			</div>
			
		</div>
			
		
		

</body>
</html>