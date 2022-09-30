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
		<div class="menucontent">
		<h3><a href="../admin/trans.php" class='tab'>Transactions</a> <a href="../admin/prod.php" class='tab'>Products</a> <a href="../admin/users.php" class='tab'>Users</a> <a href="../admin/logs.php" class='tab'>Login Logs</a> <a href="../admin/news.php" class='tab'>Manage News</a></h3>
		</div>
		<br>
		<div class="content">
		<h3>Login Logs (Timestamps)</h3>
		<ol>
		<?php	
include 'conn.php';
			$query="SELECT *,DATE_FORMAT( CONVERT_TZ( DATE,'+00:00','+12:00' ),'%M %d, %Y %H:%i %p') AS DATE FROM login_logs ORDER BY ID DESC LIMIT 15";
			$result=mysql_query($query) or die(mysql_error());
			if(mysql_num_rows($result)>0){
				echo "<table border=2><tr><th>UserName<th>Timestamp</th>";
			$i=1;
			while($row=mysql_fetch_object($result)){
			if($i==1){
				echo "<h3>Last LogIn: " .$row->UNAME. " - ".$row->DATE."</h3>";
			}
				
				echo "<tr>
						<td>$row->UNAME
						<td>$row->DATE";
			$i++;}
			echo "</table>";
			}
			
		?>
		</ol>
		</div>
	</div>
	
	
	
</body>
</html>