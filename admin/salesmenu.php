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
<?php

include '../conn.php';
			
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='Pending'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_object($result)){}
			}else{}
$count=mysqli_num_rows($result);

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
		<img src='../icons/request.png' id='icon3'><a href='request.php' id='text3'>Order Request <?php if($count == 0){ }else{echo "($count)";} ?></a>
		</form>
		
			
		<th>
		<form class="hr">
		<img src='../icons/transaction.png' id='icon5'><a href='transaction.php' id='text5'>Transactions</a>
		</form>
		
		<th>
		<form class="sales">
		<img src='../icons/report.png' id='icon6'><a href='salesreport.php' id='text6'>Sales Report</a>
		</form>
		</table>
		</table>
		</div>
	</div>
	
	
	
</body>
</html>