<?php
error_reporting(E_ALL ^ E_DEPRECATED);
include '../conn.php';
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
		<A HREF="inventorycard.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		</table>
		</div>
		<div class="usercontent">
		<form action='prod.php' method="POST" enctype="multipart/form-data">
			
		<center><table width=95%>
		<tr><td align=left>
		<h1><b>Customization Inventory</b></h1>
		<tr bgcolor='#262626'>
					
					<th align='center'><font size=4 color='white'>Color</font></th>
					<th align='center'><font size=4 color='white'>Stock</font></th>
					<th align='center' ><font size=4 color='white'>Action</font></th>
		<?php


$query="SELECT * FROM inventorycustomization";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
	
while($row=mysqli_fetch_object($result)){ ?>

    <tr bgcolor='#ccc'>
				
				<td align='center'><?php echo $row->color ?></td>
				<td align='center'><?php echo $row->stock ?></td>
				<td><a href="customizeinventoryupdate.php?id=<?php echo $row->id ?>"><center>Update</center></a></td>


</tr>
	<?php } 
	
	
}else{
	echo "<h1>No Data Found!</h1>";
}

?>
</table>
</center>
		</div>
	</div>
	
	
	
</body>
</html>