<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];
include 'conn.php';
$query="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_object($result);

$count=mysqli_num_rows($result);
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

	<div class='profBanner'>
	
					
					
					<div class='profLogo'>
					<br>&nbsp <a href="index.php" id='logolink'><b>Home</b></a>
					</div>	
					
					<div class='profLogout'>
					<a href="logout.php">Log Out</a>
					</div>	
					
					<div class='profCaption'>
					<center><img src='upload/dp/<?php echo $row->URLPIC?>' id=dispic2><br>
					<?php echo "$row->FIRST_NAME $row->LAST_NAME" ?></center>
					</div>
					
					
	</div>
	
	
	
	<div class='profSidebar'>
	<center>
	<table >
	<tr><th width=200px>
		<a href='profile.php'>Profile Information</a>
		<th width=200px>
		<a href='accountinfo.php'>Account</a>
		<th width=200px>
		<a href='transactions.php'>Transactions</a>
	</table>
	</center>
	</div>
	
	<div class='profContent'>
		<e1>Account Information</e1><a href='updateaccount.php'><img src='icons/edit.png'></a
		<br>
		<hr>
		<table>
		<tr><td><b>User Name: </b>
			<td width='150px'><?php echo" ".$row->UNAME;?> 
			<td><b>Password: </b>
			<td><?php echo "**********";?>
		</table>
		<br>
		
		<b>Billing Information</b>
		<br>
		<hr>
		<table>
			
		<tr><td><b>Billing Address: </b>
			<td><?php echo" ".$row->ADDRESS;?>
		
		</table>
		
	</div>
	
 
		
		
	<br>
	
		

</body>
</html>