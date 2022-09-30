<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];
$uname=$_SESSION['uname'];
include 'conn.php';
$query="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result=mysqli_query($con,$query);
$query3="UPDATE talkshirt_users
					SET
					NOTIFICATIONS='$0'
					WHERE UNAME='$uname'";
					$result3=mysqli_query($con,$query3) or die(mysqli_error());

if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_object($result);

$count=mysqli_num_rows($result);
}

	$_SESSION['urlpic']=$row->URLPIC;
	$_SESSION['name']=$row->FIRST_NAME;
	$_SESSION['uname']=$row->UNAME;

?>


<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body style="background: #f2f2f2;">

	<!--Header-->

	<div class='profBanner'>
	
					<div class='profLogo'>
					<br>&nbsp <a href="index.php" id='logolink'><b>Home</b></a>
					</div>	
				
				
					
				
					<div class='profLogout'>
					<a href="logout.php">Log Out </a>
					</div>	
					
					<div class='profCaption'>
					<center><img src='upload/dp/<?php echo $row->URLPIC?>' id=dispic2><br>
					<table>
					<tr>
					<td style='color: #fff; font:30px Segoe UI Light, Helvetica, sans-serif;'>
					<?php echo "$row->FIRST_NAME $row->LAST_NAME" ?> 
					<td><a href='updatepic.php'><img src='icons/addprof.png'></a>
					</table></center>
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
		<e1>Profile Information</e1><a href='update.php'><img src='icons/edit.png'></a>
		<br>
		<hr>
		<table>
		<tr><td><b>First Name: </b>
			<td width='150px'><?php echo$row->FIRST_NAME;?> 
			<td><b>Middle Name: </b>
			<td width='150px'><?php echo$row->MIDDLE_NAME;?>
			<td><b>Last Name: </b>
			<td><?php echo$row->LAST_NAME;?>
					
		<tr><td><b>Gender: </b>
			<td width='150px'><?php echo" ".$row->GENDER;?>
			
		<tr><td><b>E-Mail: </b>
			<td width='150px'><?php echo" ".$row->EMAIL;?>
			
		<tr><td><b>Contact#: </b>
			<td width='150px'><?php echo" ".$row->TELNUM;?>

		<tr><td><b>Birthday: </b>
			<td width='150px'><?php echo" ".$row->BDAY;?>
		</table>
		
	</div>
		
		
	<br>
	
		

</body>
</html>