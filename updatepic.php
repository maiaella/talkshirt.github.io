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

	<div class='picBanner'>
	
					<div class='profLogo'>
					<a href="index.php" id='logolink'></a>
					</div>	
					
					<div class='profLogout'>
					<a href="logout.php">Log Out</a>
					</div>	
	<form action='updatepic.php' method="POST" enctype="multipart/form-data">
					<div class='picCaption'>
					<center><img src='upload/dp/<?php echo $row->URLPIC?>' id=dispic><br>
					<table>
					<tr>
					<td>
					<input id='updatepic' type="file" name="myfile" > 
					<td>
					<input id='picbut' type='submit' value='Change' name='submit'>
					<td>
					<a href='profile.php' id='butcancel'>Cancel</a>
					</table></center>
					</div>
					
	</form>			
	</div>
	
<?php
if(isset($_POST['submit'])){
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$file = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if($error > 0 ){
	include 'conn.php';
		$query="UPDATE talkshirt_users
			SET
			URLPIC='person.png'
			WHERE ID='$id'";
		$result=mysqli_query($query) or die(mysql_error());

		header("Refresh: 1; URL='profile.php");
}else{

if($type=='image/png'||$type=='image/jpeg'){
	include 'conn.php';
		$query="UPDATE talkshirt_users
			SET
			URLPIC='$name'
			WHERE ID='$id'";
		$result=mysqli_query($con,$query) or die(mysql_error());

		move_uploaded_file($file,"upload/dp/".$name);
		header("Refresh: 1; URL='profile.php");
	
	
}else{	
	echo "<script type='text/javascript'>alert('Invalid filetype! Must be image.');</script>";
	header("Refresh: 0; URL='profile.php");
}
}
}
?>	



</body>
</html>