
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
}else{

}
?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ic o" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
	
</head>
<body style='background-image: url(bg2.jpg);'>
<input type="hidden" name="num" value="<?php echo rand(1, 3);?>">
	<!--Header-->
	<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="200" height="70" align="left"></img></li>	
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"> <b>Sign In</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	<br>
	<div class="drop">
	<br>
	<center><br><br>
		<h1>Thank you for visiting Talkshirt!</h1>
			</center>
		
		
		
	
		
		
	</div>


</html>