<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic= $_SESSION['urlpic'];
$uname = $_SESSION['uname'];
include 'conn.php';
mysqli_select_db($con,"talkshirt")or die("cannot select DB");

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
		
        <ul> <li><img src="bg/logo.png" width="200" height="70" align="left"></img></li>	
			<li> <a href="index.php">Home</a></li>
            <li> <a href="products.php">Products</a></li>
            <li> <a href="diy/mydesigner.php">Customization</a></li>
            <li> <a href="contact.php">Contact Us</a></li>
          
		
			<div class="user">
			<?php if(isset($name)){
				include 'conn.php';
				mysqli_select_db($con,"talkshirt")or die("cannot select DB");
					$query4="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
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
			<li><a href="login.php">Sign In!</a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
	<br>
				
		<div class='prodcontent'>
		<br>
		<br>
		<center>
		<table>
		<tr><td valign=top><div class=order >Contact Person:</div>
			<td><h3><br>Emman Esquilona<br>
		
		<tr><td valign=top><div class=order >Cellphone Number:
			<td><h3><br>09757853655<br>
				
		<tr><td valign=top><div class=order >Email Address:   
                               
			<td><h3><br>emmanesquilona@gmail.com<br>     
			   
		<tr><td valign=top><div class=order >Address:
			<td><h3><br>Antipolo City
		<tr><td valign=top><div class=order >Location Map:<br>
		<tr><td colspan=2 size=50% align=center><br><img src='bg/location.png'><br>
                                       


		
		</table>
		</center>
		</div>
		</div>
		</br>
		</br>
	
		
		

</body>
</html>