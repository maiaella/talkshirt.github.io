<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$uname = $_SESSION['uname'];
if(isset($uname)){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
 
include '../conn.php';
			
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='Pending'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_object($result)){}
			}else{}
			$count=mysqli_num_rows($result);

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
			<li><a href="../backup/index.php"><b>Back-up Database<b></a></li>
            <li><a href="../logout.php">Logout</a></li>
			</div>
			
			
		</ul>
    </div>
	</div>
	</div>
	<br>
	
	<div class='mainboard'>
		
		<div class="board">
		<center>
		<table>
		<tr>
		
		
		<th>
		<?php if ($_SESSION['usertype'] == 'ADMIN') { ?>
		<form class="hr" style="position: relative;">
		<img src='../icons/hr.png' id='icon3'>
		<a href='hr.php' id='text3' style="padding-top: 20px;">USER</a>
		<div style="margin: 0;color: #fff;position: absolute;left: 50%;top: 50%;">
			<div>Total Users</div>
			<?php
			$sql = mysqli_query($con,"SELECT COUNT(USER_TYPE) as total FROM talkshirt_users where USER_TYPE='CUSTOMER' OR USER_TYPE='EMPLOYEE' OR USER_TYPE='ADMIN'");
			$row = mysqli_fetch_array($sql);
			echo $sum = $row['total'];
			?>
		</div>
		</form>
		<?php } ?>
		
			
		<th>
		<?php if ($_SESSION['usertype'] == 'ADMIN' || $_SESSION['usertype'] == 'EMPLOYEE') { ?>
		<form class="acc" style="position: relative;">
		<img src='../icons/invent.png' id='icon5'>
		<a href='inventorycard.php' id='text5' style="padding-top: 20px;">INVENTORY</a>
		<div style="margin: 0;color: #fff;position: absolute;left: 48%;top: 50%;">
			<div>Total Stocks</div>
			<?php
			$sql = mysqli_query($con,"SELECT SUM(stock) as total FROM inventorycustomization");
				$row = mysqli_fetch_array($sql);
				 $row['total'];

		$sql = mysqli_query($con,"SELECT SUM(STOCKS) as total FROM talkshirt_stocks");
				$row2 = mysqli_fetch_array($sql);
				echo $sum = $row2['total'] + $row['total'];
		?></div>
		</form>
		
		<?php } ?>
		
		<th>
		<?php if ($_SESSION['usertype'] == 'ADMIN' || $_SESSION['usertype'] == 'EMPLOYEE') { ?>
		<form class="transac" style="position: relative;">
		<img src='../icons/transaction.png' id='icon5'>
		<a href='transaction.php' id='text5' style="padding-top: 20px;">TRANSACTIONS</a>

		<div style="margin: 0;color: #fff;position: absolute;left: 42%;top: 50%;">
			<div>Total Transactions</div>
			<?php
			$sql = mysqli_query($con,"SELECT COUNT(STATUS) as total FROM talkshirt_orders WHERE STATUS='On Process' OR STATUS='Delivered' OR STATUS='Cancelled' OR STATUS='Received'");
					$row = mysqli_fetch_array($sql);
					echo $sum = $row['total'];
			?>
		</div>
		</form>
		<?php } ?>

		
		
		<tr>
		<th>
		<?php if ($_SESSION['usertype'] == 'ADMIN') { ?>
		<form class="trail">
		<img src='../icons/report.png' id='icon8'><a href="trail.php" id='text8'>AUDIT TRAIL</a>
		</form>
		
		
		
		<th>
		<form class="sales" style="position: relative;">
		<img src='../icons/sales.png' id='icon6'>
		<a href='salesreport.php' id='text6' style="padding-top: 20px;">SALES</a>
		<div style="margin: 0;color: #fff;position: absolute;left: 48%;top: 50%;">
			<div>Total Sales</div>
			<?php
			$sql = mysqli_query($con,"SELECT SUM(TOTAL) AS total FROM talkshirt_orders WHERE STATUS='Delivered'");
					$row = mysqli_fetch_array($sql);
					echo $sum = $row['total'];
			?>
		</div>
		</form>

		<th>
		<form class="orderrequest" style="position: relative;">
		<img src='../icons/request.png' id='icon6'>
		<a href='request.php' id='text6' style="padding-top: 20px;">ORDER REQUEST<?php if($count == 0){ }else{echo "($count)";} ?></a>
		<div style="margin: 0;color: #fff;position: absolute;left: 48%;top: 50%;">
			<div>Total Request</div>
			<?php
			$sql = mysqli_query($con,"SELECT COUNT(STATUS) as total FROM talkshirt_orders WHERE STATUS='Pending'");
					$row = mysqli_fetch_array($sql);
					echo $sum = $row['total'];
			?>
		</div>		
		</form>
		<?php } ?>

	
		
		</table>
		</div>
		
		<div class='notifcenter' style="text-align: center;overflow-y: scroll;">
		<table>
		<tr>
		<td style="padding-bottom: 5px; color: #fff;">
		<b>Notification Center</b>
		<?php
			if(!isset($_POST['submit'])){
				 
				
		
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='Pending'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_object($result)){
			$originalDate = $row->DATE;
			$newDate = date("F d, Y", strtotime($originalDate));
			echo "<tr><td bgcolor='#7fba00' width='13%' style='padding: 5px; color: #fff;'>
			<small><a href='request.php' style='color: #fff;'>A new Order Request from $row->CUSNAME</small>
			<br>
			<br>
			<small>$newDate</small></a>	";
			}
			}else{
			echo "<td width='13%' style='padding: 5px; color: #fff;'>
			<small>No new notifications.</small>";
			}}
		?>
		</table>
		
		</div>
		
	</div>
	</div>
	
	
	
</body>
</html>