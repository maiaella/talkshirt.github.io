<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include 'conn.php';
?>
<?php
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
		<A HREF="inventorycard.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		</table>
		</div>
		<div class="usercontent">
		<form action='prod.php' method="POST" enctype="multipart/form-data">
			
		<center><table width=95%>
		<tr><td align=left>
		<h1><b>Product List</b></h1><td bgcolor='red' align=center><a href='prodadd.php?x=1'><font size=4 color='white'>Add Products</a><td><small>&nbsp &nbsp *Click Product name to update.</small>
		<tr bgcolor='#262626'>
					
					<th align='center'><font size=4 color='white'>Product ID
					<th align='center'><font size=4 color='white'>Name
					<th align='center'><font size=4 color='white'>Description
					<th align='center'><font size=4 color='white'>Price
					<th align='center'><font size=4 color='white'>Stocks
					<th align='center'><font size=4 color='white'>Color
					<th width=100px><font size=4 color='white'>Picture
					<th align='center' ><font size=4 color='white'>Delete
		<?php
$query2="SELECT * FROM talkshirt_colors";
$result2=mysqli_query($con,$query2);
if(mysqli_num_rows($result2)>0){
$row2=mysqli_fetch_object($result2);
} 

$query="SELECT * FROM talkshirt_stocks";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	$total=0;

	
	
while($row=mysqli_fetch_object($result)){


	echo "<tr bgcolor='#ccc'>
				
				<td align='center'><a href='produp.php?id=$row->PROID'>$row->PROID</a>
				<td align='center'><a href='produp.php?id=$row->PROID'>$row->NAME</a>
				<td align='center'>$row->DESCR
				<td align='center'>Php $row->PRICE 
				<td align='center'> $row->STOCKS
				<td align='center'>$row->TYPE
				<td><a href='availcolors.php?id=$row->PROID'><img src='../upload/$row->URLPIC' width=100px height=100px ></a>
				<td bgcolor='#ed1c24'><center><a href='prodial.php?id=$row->PROID'>Delete</a>";


				$sql = mysqli_query($con,"SELECT SUM(STOCKS) as total FROM talkshirt_stocks");
				$row = mysqli_fetch_array($sql);
				$sum = $row['total'];

	}
	
	
	echo "<tr><td colspan=4 align=right >Total Stocks: <th colspan=3>".$sum;
	echo "</table></center>";
}else{
	echo "<h1>No Data Found!</h1>";
}

?>
		</div>
	</div>
	
	
	
</body>
</html>