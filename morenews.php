<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
$uname = $_SESSION['uname'];
$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
					
				
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
				$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
				mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
					$query4="SELECT * FROM ehd_users WHERE UNAME='$uname'";
					$result4=mysql_query($query4);
					if(mysql_num_rows($result4)>=0){
					$row4=mysql_fetch_object($result4);
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
					<div class='prodCaption'>
					<br>
					<br>
					<e1>News</e1>
					</div>	
							
				</div>
		</div>
				<br>
				<br>
		<div class='morenews'>
			<table>
				<?php
			$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
			mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
			$query="SELECT ID, TITLE, DATE_FORMAT(TIMESTAMP,'%M %d, %Y %h %i %p') AS TIMESTAMP FROM news ORDER BY TIMESTAMP DESC";
			$result=mysql_query($query) or die("Unable to perform query".mysql_error());
			
			
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_object($result)){
				echo"<tr><td>Title: <a href='newsview.php?id=$row->ID'>" .$row->TITLE. "</a><td>Published: " .$row->TIMESTAMP;
				}
				}
				
			else{
			echo"<h3>NO AVAILABLE NEWS</h3>";}
			mysql_close($con);
						echo"</table>";
			?>
			
		</div>
	
		<div class="container3">
			<div class="like">
			<e1>Share this page</e1>
			<br>
			Spread wonderful designs. Share this page with your <br> friends and family.
			<br>
			<a href=''><img src='buttons/twitter.png'></a> <a href=''><img src='buttons/fb.png'></a>
			</div>
			
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