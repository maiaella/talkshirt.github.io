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
		<A HREF="salesmenu.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
		<tr>
		<th>
		<a href='hr.php'><img src='..\icons\hr.png' width=40px height=40px>
		<br><small>HR</small></a>
		
			
		<tr>
		<th>
		<a href='prod.php'><img src='..\icons\invent.png' width=40px height=40px>
		<br><small>Inventory</small></a>
		
		
		
		<tr>
		<th>
		<a href='..\index.php'><img src='..\icons\website.png' width=40px height=40px>
		<br><small>Website</small></a>
		
		</table>
		</div>
		
		
		<div class='usercontent'>
			<?php
include 'conn.php';
			
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='On Process' OR STATUS='Delivered' OR STATUS='Canceled'";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){

				echo "<center><table width=100% >";
				echo "
				<tr><td align=left colspan=2><h3>Transactions</h3>
				";

			while($row=mysql_fetch_object($result)){
				
				$price = $row->TOTAL / $row->QUANTITY;

				echo "<tr bgcolor='#262626'>				
								<th align='left' width='300px'><font size=4 color='white' >Transaction ID: $row->TRANSID
								<th align='left' colspan=4><font size=4 color='white'>Date: $row->DATE
								<tr bgcolor='#ddd' width='300px'>
								<td>Customer Name: $row->CUSNAME
								<td>Product ID: $row->PROID
								<td>Unit Price: Php $price.00
								<td>Shipping Method: $row->SHIPPING
								<td rowspan=4>Prod. Image:
								<tr bgcolor='#ddd'>
								<td width='300px' rowspan=3>Address: $row->ADDRESS
								<td>Prod. Name: $row->PRONAME
								<td>Quantity: $row->QUANTITY pc/s
								<td rowspan=3>Status: $row->STATUS <br>";
																
				echo "		<tr bgcolor='#ddd'>
								
								<td>Material ID: $row->MATID
								<td>Total: Php $row->TOTAL.00
								<tr bgcolor='#ddd'>
								
								<td colspan=2>Color: $row->COLOR		
							";
				}
				
				
				
				echo "</table></center>";
			}else{
				echo "<center><b>No transaction found.</a></center>";
			}

			?>
		
		</div>
	
</body>
</html>