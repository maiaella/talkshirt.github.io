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
		<div class="content">
		<h3>Delete</h3>
					
			<?php
			
			$id=$_GET['id'];
			include 'conn.php';
			
			$query="DELETE FROM talkshirt_fabrics WHERE MATERIAL_ID='$id'";
			$result=mysql_query($query) or die("Unable to perform query".mysql_error());

			echo"<br>Successfully deleted";
			echo"<br>You will redirected in 2 seconds";
						header("Refresh: 0; URL='prod.php'");

?>
		</div>
	</div>
	
	
	
</body>
</html>