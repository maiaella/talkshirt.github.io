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
		<div class='sidebar'>
		<table>
		<tr><th id='back'>
		<A HREF="javascript:history.back()"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		</table>
		</div>
		<br>
		<div class="content">

		<?php
		$id=$_GET['id'];
		include '../conn.php';
		$query="DELETE a.*, b.*,c.*
		FROM talkshirt_stocks as a, talkshirt_colors as b, talkshirt_fabrics as c  
		WHERE a.PROID='$id' and b.PROID='$id' and c.PROID='$id'" ;

		mysqli_query($con,$query) or die(mysql_error());
		
		echo "<h3>Product Deleted!</h3><a href='../admin/prod.php'><input type=submit value=OK ></a>";
		?>





		

		</div>
	</div>
	
	
	
</body>
</html>