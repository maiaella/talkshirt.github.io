<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
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
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"> <b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	
	<br>
		<div class='wholeContent'>
		
		<?php
			$id=$_GET['id'];
			$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
			$query="SELECT * FROM news WHERE ID=$id";
			$result=mysql_query($query) or die("Unable to perform query".mysql_error());
			
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_object($result)){
		?>
		
		<h2><?php echo $row->TITLE; ?></h2>
		
			<div class='newscontent'>
			
			<?php 
			echo "<textarea cols='500' rows='10'>" .$row->CONTENT. "</textarea><br>";
			echo "<small>Date Published: " .$row->TIMESTAMP. "</small>"; 
			echo "<br><a href='morenews.php'>Back to News</a>"; 
			}}?></small>
			
			</div>
		
		</div>

</body>
</html>