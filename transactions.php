<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

$name = $_SESSION['name'];
$id = $_SESSION['id'];

include 'conn.php';
$query="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_object($result);

$count=mysqli_num_rows($result);
}

?>


<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->

	<div class='profBanner'>
	
					<div class='profLogo'>
					<br>&nbsp <a href="index.php" id='logolink'><b>Home</b></a>
					</div>	
					
					<div class='profLogout'>
					<a href="logout.php">Log Out</a>
					</div>	
					
					<div class='profCaption'>
					<center><img src='upload/dp/<?php echo $row->URLPIC?>' id=dispic2><br>
					<?php echo "$row->FIRST_NAME $row->LAST_NAME" ?></center>
					</div>
					
					
	</div>
	
	
	<div class='profSidebar'>
	<center>
	<table >
	<tr><th width=200px>
		<a href='profile.php'>Profile Information</a>
		<th width=200px>
		<a href='accountinfo.php'>Account</a>
		<th width=200px>
		<a href='transactions.php'>Transactions</a>
	</table>
	</center>
	</div>

	
	<div class='profContent'>
		<e1>Transactions</e1>
	<br>
	<table >
	<tr><td><b>Filter:</b>
		<td><a href='transactions.php'>View All</a>
		<td><a href='transactions.php?status=Pending'>Pending</a>
		<td><a href='transactions.php?status=On Process'>On Process</a>
		<td><a href='transactions.php?status=Delivered'>Delivered</a>
		<td><a href='transactions.php?status=Cancelled'>Cancelled</a>
	</table>
		<br>
		<hr>
		<?php
				if(isset($_GET['status'])){
				$status=$_GET['status'];
				}
			if(isset($status)){
				if($status=='Pending'){
					$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME' AND STATUS='Pending'";
				}else if($status=='On Process'){
					$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME' AND STATUS='On Process'";
				}else if($status=='Delivered'){
					$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME' AND STATUS='Delivered'";
				}else if($status=='Cancelled'){
					$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME' AND STATUS='Cancelled'";
				}else{
					$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME'";
				}
				
			}else{
			$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$row->UNAME'";}
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows($result2)>0){
				echo "<center>";
				
				
				while($row2=mysqli_fetch_object($result2)){
				$price = $row2->TOTAL * $row2->QUANTITY;
			
						echo "<table width=100% ><tr bgcolor='#262626'>				
								<th align='left' width='300px'><font size=4 color='white' >Transaction ID: $row2->TRANSID
								<th align='left' colspan=1><font size=4 color='white'>Date: $row2->DATE
								<br>Time: $row2->TIME
								<th align='left' colspan=2><font size=4 color='white'>Downpayment Paid: Php $row2->DPAID.00
								<tr bgcolor='#ddd' width='300px'>
								<td>Product ID: $row2->PROID
								<td>Unit Price: Php $price.00
								<td>Shipping Method: $row2->SHIPPING
								<td rowspan=4 align=center><img src='./upload/$row2->IMAGE' width=100px height=100>
								<tr bgcolor='#ddd'>
								<td>Prod. Name: $row2->PRONAME
								<td>Quantity: $row2->QUANTITY pc/s
								<td>
								
								<tr bgcolor='#ddd'>
								
								<td>Material ID: $row2->MATERIAL_ID
								<td>Total: Php $row2->TOTAL.00
								<td rowspan=2><center>Status: $row2->STATUS <br>
								<tr bgcolor='#ddd'>
								
								<td>Color: $row2->COLOR
								<td>
								
								<tr bgcolor='#ddd'>
								<td colspan=4>Delivery Address: $row2->ADDRESS";
								
								
								echo "</table> </center>";
				}
				
			}
			
		?>
		
	</div>
	
	
		
		
	<br>
	
		
</body>
</html>