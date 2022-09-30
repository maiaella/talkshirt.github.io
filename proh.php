<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
$uname = $_SESSION['uname'];
include 'conn.php';

}else{

}
?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->
	<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="75" height="75" align="left"></img></li>	
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li><a href="proh.php">Best Products</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			include 'conn.php';
					$query4="SELECT * FROM ehd_users WHERE UNAME='$uname'";
					$result4=mysqli_query($con,$query4);
					if(mysqli_num_rows($result4)>=0){
					$row4=mysqli_fetch_object($result4);
					}else{}
					$notif=$row4->NOTIFICATIONS;
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info ";if($notif == 0){ }else{echo "<m1>$notif</m1>";} echo "</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		

		<div class='prodcontent'>
				<div class='prodBanner'>
					<div class='projCaption'>
					<br>
					<br>
					<e1>Products</e1>
					</div>
					</div>
			
				
		<div class='prodcontent'>
			<center>
			<table>
			<tr><td colspan=3 ><h1>2015 Collection</h1>
			<tr><td colspan=3 ><h1></h1>
			<?php
				$i=1;
				for($x=0;$x<2;$x++){
				echo "<tr>";
				 for($y=0;$y<4;$y++){
					echo "<td><img src='image/up".$i.".jpg' width=200px height=200px> ";
					$i++;
				 }
				}
			?>
			<tr><td colspan=3 ><br><h1></h1>
			<?php
				$i=1;
				for($x=0;$x<2;$x++){
				echo "<tr>";
				 for($y=0;$y<4;$y++){
					echo "<td><img src='image/cur".$i.".jpg' width=200px height=200px> ";
					$i++;
				 }
				}
			?>
			<tr><td colspan=3 ><br><h1></h1>
			<?php
				$i=1;
				echo "<tr>";
				for($x=0;$x<4;$x++){
					echo "<td><img src='image/rol".$i.".jpg' width=200px height=200px> ";
					$i++;
				}
			?>
			<tr><td colspan=3 ><br><h1></h1>
			<?php
				$i=1;
				echo "<tr>";
				for($x=0;$x<4;$x++){
					echo "<td><img src='image/sha".$i.".jpg' width=200px height=200px> ";
					$i++;
				}
			?>
			
			</table>
				</center>
		</div>
		</div>
		

		<!-- Footer -->
		<div class="container3">
			
			
			<div class="android">
			<e1>Download our Android app</e1>
			<br>
			Get latest updates and designs using you Google Android Tablet 
			<br>
			<a href=''><img src='bg/android.png'></a>
			</div>
		</div>		
		

</body>
</html>