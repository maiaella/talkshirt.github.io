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
		<div class='sidebar'>
		<table>
		<tr><th id='back'>
		<A HREF="hr.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
	
		
		</table>
		</div>
		<div class="content">
		<h3><b>Last Log-In</b>
		<br>
		<br>
		<table>
		<tr>
		<td>
		<?php
include 'conn.php';
			
			$query="SELECT *,DATE_FORMAT( CONVERT_TZ( time_in,'+00:00','+00:00' ),'%M %d, %Y %H:%i %p') AS DATE FROM talkshirt_logs WHERE USER_TYPE='CUSTOMER' ORDER BY ID DESC LIMIT 15";
			$result=mysqli_query($con,$query) or die(mysql_error());
			if(mysqli_num_rows($result)>0){
				echo "<table  width=450px>
				<tr>
				<th>USERNAME</th>
				<th>TIMESTAMP</th>";
			$i=1;
			while($row=mysqli_fetch_object($result)){
			if($i==1){
				echo "<h3><b>Customer:</b> " .$row->UNAME. " - ".$row->DATE."</h3>";
			}
				
				echo "<tr>
						<td align=center>$row->UNAME
						<td align=center>$row->DATE";
			$i++;}
			echo "</table>";
			}
		?>
		<td>
		&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		<td>
		<?php
include 'conn.php';
			$query="SELECT *,DATE_FORMAT( CONVERT_TZ( time_in,'+00:00','+00:00' ),'%M %d, %Y %H:%i %p') AS DATE FROM talkshirt_logs WHERE USER_TYPE='ADMIN' or USER_TYPE='EMPLOYEE' ORDER BY ID DESC LIMIT 15";
			$result=mysqli_query($con,$query) or die(mysql_error());
			if(mysqli_num_rows($result)>0){
				echo "<table  width=450px>
				<tr>
				<th>USERNAME</th>
				<th>TIMESTAMP</th>";
			$i=1;
			while($row=mysqli_fetch_object($result)){
			if($i==1){
				echo "<h3><b>Employee:</b> " .$row->UNAME. " - ".$row->DATE."</h3>";
			}
				
				echo "<tr>
						<td align=center>$row->UNAME
						<td align=center>$row->DATE";
			$i++;}
			echo "</table>";
			}
		?>
		
	</div>	
</body>
</html>