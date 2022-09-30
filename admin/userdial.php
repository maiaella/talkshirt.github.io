<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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
		<div class="dialog">
		<h3><b>User Delete</b></h3>
		<h4>Are you sure you want to delete this user?</h4>
		<h5>
		<table width='100px'>
		<?php 
		$id=$_GET['id'];
		echo "<tr><th bgcolor='#7fba00'><a href='userdel.php?id=$id'>Yes</a>";
		?>
		<th bgcolor='#7fba00'><a href='users.php'>No</a>
		</table>
		</h5>
		
		</div>
	</div>
	
	
	
</body>
</html>