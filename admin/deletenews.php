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
		<div class="menucontent">
		<h3><a href="../admin/trans.php" class='tab'>Transactions</a> <a href="../admin/prod.php" class='tab'>Products</a> <a href="../admin/users.php" class='tab'>Users</a> <a href="../admin/logs.php" class='tab'>Login Logs</a> <a href="../admin/news.php" class='tab'>Manage News</a></h3>
		</div>
		<br>
		<div class="content">
		<h3>Manage News</h3>
			
			<?php
$id=$_GET['id'];
include 'conn.php';

$query="DELETE FROM news WHERE ID=$id";
$result=mysql_query($query) or die("Unable to perform query".mysql_error());

echo"<br>Successfully deleted news!";
echo"<br>You will redirected in 2 seconds";
			header("Refresh: 0; URL='news.php'");
?>
		</div>
	</div>
	
	
	
</body>
</html>