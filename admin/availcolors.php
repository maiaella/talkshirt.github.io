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
		<div class='sidebar'>
		<table>
		<tr><th id='back'>
		<A HREF="prod.php"><img src='..\icons\back.png' width=40px height=40px>
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
		<div class="usercontent">
			<div class="avail">
		<center>
			<div class="fabrics">
				<?php
	$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
	mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
			
			$id=$_GET['id'];
			$query="SELECT * FROM talkshirt_fabrics WHERE PROID = '$id' ORDER BY MATERIAL_ID";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){

				echo "<center><table width=100%>";
				echo "
				<tr><td align=left colspan=2><h3>Items List</h3>
				<tr bgcolor='#262626'>
								
								<th align='center'><font size=4 color='white'>Color ID
								<th align='center'><font size=4 color='white'>Color
								<th align='center'><font size=4 color='white'>Fabric Image";

			while($row=mysql_fetch_object($result)){
				

				echo "<tr bgcolor='#ccc'>
							<td align='center'>$row->MATERIAL_ID
							<td align='center'>$row->COLOR
							<td align='center'><img src='../upload/swatches/$row->URLPIC' width=150px height=150px>";
							
				}
				
				
				
				echo "</table></center>";
			}else{
				echo "<center><b>No Swatches found. You must add first.</b><br><a href='colorsadd.php?id=$id'>Add Item</a></center>";
			}

			?>
			</div>
			
			<div class="colors">
				<?php
	$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
	mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");
			mysql_select_db("talkshirt")or die("cannot select DB");
			$id=$_GET['id'];
			$query="SELECT * FROM talkshirt_colors WHERE PROID = '$id' ORDER BY MATERIAL_ID";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
				echo "<center><table width=100%>";
				echo "<tr>
					<td align=left><h3>Product #: $id</h3>
					<td bgcolor='#00a4ef' align=center><a href='colorsadd.php?id=$id'><font color='white'>Add Item</a>
					
						<tr bgcolor='#262626'>
								<th align='center'><font size=4 color='white'>Product Image
								<th align='center'><font size=4 color='white'>Available Stocks:
								<td align='center'><font size=4 color='white'>Delete";

			while($row=mysql_fetch_object($result)){
				

				echo "<tr bgcolor='#ccc'>
							<td align='center'><img src='../upload/colors/$row->URLPIC' width=150px height=150px >
							<td align='center'><A href='stocks.php?id=$row->MATERIAL_ID'><font size=5>$row->STOCKS</a>
							<td align='center'><a href='colordel.php?id=$row->MATERIAL_ID&proid=$row->PROID'>Delete</a>";


				}
				
				
				
				echo "</table></center>";
			}else{
				echo "";
			}

			?>
			</div>
			</center>
			</div>
		</div>
	</div>
	
	
	
</body>
</html>