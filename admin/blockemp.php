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
		<h3>User Block</h3>
					
			<?php
			
			$id=$_GET['id'];
			include 'conn.php';
			
			$query="Select * from talkshirt_users WHERE ID=$id";
			$result=mysql_query($query) or die("Unable to perform query M".mysql_error());
			$row=mysql_fetch_object($result);
			
			if($row->BLOCK==0){				
			$query2="UPDATE talkshirt_users SET Block=1 WHERE ID=$id";
			mysql_query($query2) or die("Unable to perform query A".mysql_error());
			echo"<br>User is successfully Block";
			echo"<br>You will redirected in 2 seconds";
						header("Refresh: 0; URL='employees.php'");
			}else{
			$query2="UPDATE talkshirt_users SET Block=0 WHERE ID=$id";
			mysql_query($query2) or die("Unable to perform query R".mysql_error());
			echo"<br>User is successfully Unblock";
			echo"<br>You will redirected in 2 seconds";
						header("Refresh: 0; URL='employees.php'");
			}
?>
		</div>
	</div>
	
	
	
</body>
</html>