<?php
error_reporting(E_ALL ^ E_DEPRECATED);
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
		<A HREF="javascript:history.back()"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		</table>
		</div>
		<div class='content'>
		<?php
	
		$id=$_GET['id'];
		
include '../conn.php';
		$query="SELECT * FROM inventorycustomization WHERE id='$id'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_object($result);
		}
		?>
		<h3>Update Customize Inventory Stock</h3>
		<form method="POST">
		<table>
		<tr>
			<td>Stock:
			<td><input type="text" name="stock">
	
		<tr>
			<td colspan=2><input type='submit' value='Update' name='submit'>
		</table>
	</td>
<?php


if (isset($_POST['submit'])) {

$id=$_GET['id'];
$stock = $_POST['stock'];
	
include '../conn.php';

		$query="SELECT * FROM inventorycustomization WHERE id='$id'";
		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_object($result);
		$stock = $row->stock + $stock;

	$query2="UPDATE inventorycustomization SET stock='$stock' WHERE id='$id'";
	$result2=mysqli_query($con,$query2) or die(mysql_error());
	

	
	header('location: customizeinventory.php');
	

}

?>		
		
		</div>
		
	
	
</body>
</html>