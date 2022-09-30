<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(!isset($_POST['submit'])){

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
<form action="updateaccount.php?id=<?php echo $row->ID;?>" method=POST>
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
		<e1>Account Information</e1>
		<br>
		<hr>
		<table>
		<tr><td><b>User Name: </b>
			<td width='150px'>
			<input type=hidden name=id value="<?php echo $row->ID;?>">
			<input type=hidden name=pic value="<?php echo $row->URLPIC;?>">
			<input type=hidden name=fname value="<?php echo $row->FIRST_NAME;?>">
			<input type=hidden name=lname value="<?php echo $row->LAST_NAME;?>">
			<input id='updateprof' type=text placeholder='Username' value='<?php echo $row->UNAME;?>' name=user>
			<td><b>Password: </b>
			<td><input id='updateprof' type=password placeholder='Password' value='<?php echo $row->PWORD;?>' name=pass>
		</table>
		<br>
		
		<b>Billing Information</b>
		<br>
		<hr>
		<table>
			
		<tr><td><b>Billing Address: </b>
			<td><input id='updateprof' type=text placeholder='address' value='<?php echo $row->ADDRESS;?>' name=address>
		
		</table>
		
		<br>
		<input id='updatebutton' type='submit' name='submit' value='Update'>
		
	</div>
	
	
		
		
	<br>
	
		
		
	<?php
}else{
$pic=$_POST['pic'];
$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$address=$_POST['address'];
include 'conn.php';
$query="UPDATE talkshirt_users
			SET
			UNAME='$user',
			PWORD='$pass',
			ADDRESS='$address'
			WHERE ID='$id'";
mysqli_query($con,$query) or die("Unable to perform query".mysqli_error());
$_SESSION['name']=$name;
?>
<script type='text/javascript'>alert('Account Updated.');</script>
<body style="background: #0099cc;">
</body>

<?php
mysqli_close($con);
header("Refresh: 0; URL='accountinfo.php"); 
}
?>
	
	
	

</body>
</html>			
