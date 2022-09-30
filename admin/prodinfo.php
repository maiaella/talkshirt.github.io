	<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	include 'conn.php';
	$id=$_GET['id'];
	$query="SELECT * FROM talkshirt_colors WHERE PROID='$id'";
	$result=mysql_query($query);
	$row=mysql_fetch_object($result);

?>

<?php
session_start();
$uname = $_SESSION['uname'];
if(isset($uname)){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];

}else{
header("Refresh: 0; URL=../login.php"); 
}
?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->
	<div class='header'>
	<!--Eto yung sa Logo-->
	<div class="logo">
		<a href="#" id=''></a>
	</div>
	<!--navigation bar-->
	
    <div class="menu">
	<div class="nav">
        <ul>  
			<li><a><b>Administrator Panel</b></a></li>
			<div class="user">			
            <li><a href="../logout.php">Logout</a></li>
			</div>
			
			<div>
		</ul>
    </div>
	</div>
	</div>
	<br>
	
	<div class="wholeContent">
		<div class='sidebar'>
		<table>
		<tr><th id='back'>
		<A HREF="prod.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>

		
		</table>
		
		</div>
		<div class="content">
		<center>
			<table>
		<tr><th>
		<form class="acc">
		<?php echo"<a href='produp.php?id=$id' id='icon5'></a>"; ?>
		</form><small>Update<br>Product Info

		
		<th>
		<form class="website">
		<?php echo"<a href='availcolors.php?id=$id' id='icon5'></a>"; ?>
		</form><small>Colors and <br>Swatches
		</table>
		</div>
	</div>
	
	
	
</body>
</html>