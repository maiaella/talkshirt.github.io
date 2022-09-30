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
	
	
	<!--navigation bar-->
	
    <div class="menu">
	<div class="nav">
        <ul>  
			<li><a href="menu.php"><b>Administrator Panel</b></a></li>
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
		<div class='sidebar' >
		<table>
		<tr><th id='back'>
		<A HREF="menu.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
		
		
		</table>
		
		</div>
		<div class="content">
		<center>
		<table>
		<tr>
		

			
		<th>
		<form class="manuf">
		<img src='../icons/invent.png' id='icon5'><a href='prod.php' id='text5'>Inventory</a>
		</form>
		
		<th>
		<form class="hr">
		<img src='../icons/invent.png' id='icon6'><a href='customizeinventory.php' id='text6'>Customize Inventory</a>
		</form>
		</table>
		</div>
	</div>
	
	
	
</body>
</html>