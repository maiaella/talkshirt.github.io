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
			<li><a href="hr.php"><b>Administrator Panel</b></a></li>
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
		<div class="usercontent">
		<center><table width=95%>
		<tr><td align=left>
		<h1><b>Customer's List</b></h1><td><small>*Click Customer's name to update.</small>
		<?php
include '../conn.php';
$query="SELECT * FROM talkshirt_users where USER_TYPE='CUSTOMER'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	$total=0;
	echo "";
	echo "<tr bgcolor='#262626'>
					<th><font size=4 color='white'><small>DP
					<th><font size=4 color='white'><small>Name
					<th><font size=4 color='white'><small>Email
					<th><font size=4 color='white'><small>Contact No.
					<th><font size=4 color='white'><small>Username
					<th><font size=4 color='white'><small>Password
					<th><font size=4 color='white'><small>Gender
					<th><font size=4 color='white'><small>Birthday
					<th><font size=4 color='white'><small>Address
					
					<th><font size=4 color='white'><small>Del";
					
while($row=mysqli_fetch_object($result)){
	echo "<tr>	
				<td bgcolor='#d9d9d9'><center><a href='userup.php?id=$row->ID'><img src='../upload/dp/$row->URLPIC' id=dispic2></a></center>
				<td bgcolor='#d9d9d9'><a href='userup.php?id=$row->ID'>$row->LAST_NAME, $row->FIRST_NAME</a>
				<td bgcolor='#d9d9d9'>$row->EMAIL
				<td bgcolor='#d9d9d9'>$row->TELNUM
				<td bgcolor='#d9d9d9'>$row->UNAME
				<td bgcolor='#d9d9d9'>$row->PWORD
				<td bgcolor='#d9d9d9'>$row->GENDER
				<td bgcolor='#d9d9d9'>$row->BDAY
				<td bgcolor='#d9d9d9'>$row->ADDRESS
				<td bgcolor='#ed1c24'><center><a href='userdial.php?id=$row->ID'><img src='../bg/erase.png'></a>";
				$total=$total+1;

	}
	echo "<tr><td colspan=8 align=right >Total Member: <th>" .$total;
	echo "</table></center>";
}
?>
		</div>
	</div>
	
	
	
</body>
</html>


