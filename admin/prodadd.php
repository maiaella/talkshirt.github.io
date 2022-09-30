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
		<A HREF="prod.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		</table>
		</div>
		<div class='content'><center>
		<h3>Add Products</h3>
		<form action='prodadd.php' method="POST" enctype="multipart/form-data">
		<table>
		<tr>
			<td>Product ID:
			<td><input type="text" name="prodid" placeholder="Product ID" required/>
		<tr>
		<tr>
			<td>Material ID:
			<td><input type="text" name="matid" placeholder="Material ID" required />
		<tr>
			<td>Name:
			<td><input type="text" name="prodname" placeholder="Product Name"required />
		<tr>
			<td>Color:
			<td ><select name="type2" required>
			<option value="White">White</option>
			<option value="Black">Black</option>
			
		<tr>
			<td>Price:
			<td><input type="text" name="pr" placeholder="Price" required/>
		<tr>
		<tr>
			<td>Stocks:
			<td><input type="text" name="stocks" placeholder="Stocks" required/>
		<tr>
			<td>Description:
			<td><input type="text" name="desc" placeholder="Description" required/>
			<input type="hidden" name="MAX_FILE_SIZE" value="1999000" required/>
		<tr>	
			<td>Product Image:
			<td><input type="file" name="myfile"required >
		<tr>
			<td colspan=2><input type='submit' value='Submit' name='submit'>
		</table>
		
		<?php
if(isset($_POST['submit'])){
$prodid = $_POST['prodid'];
$matid = $_POST['matid'];
$desc = $_POST['desc'];
$pr = $_POST['pr'];
$prodname = $_POST['prodname'];
$type2 = $_POST['type2'];
$stocks = $_POST['stocks'];
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$file = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if($error > 0 ){
	die("Please try again ! Error Code: " . $error);
}else{
if($type=='image/png'||$type=='image/jpeg'){

	include '../conn.php';
	$query="INSERT INTO `talkshirt_stocks` (`PROID`,`MATID`, `NAME`, `DESCR`, `PRICE`,`STOCKS`, `TYPE`, `URLPIC`) VALUES ('$prodid','$matid','$prodname','$desc','$pr','$stocks','$type2','$name')";
	$result=mysqli_query($con,$query) or die(mysql_error());

	$query2="INSERT INTO `talkshirt_fabrics` (`MATERIAL_ID`,`PROID`,`COLOR`,`URLPIC`) VALUES ('$matid','$prodid','$type2','$name')";
	$result2=mysqli_query($con,$query2) or die(mysql_error());

	$query3="INSERT INTO `talkshirt_colors` (`PROID`,`MATERIAL_ID`,`URLPIC`,`STOCKS`) VALUES ('$prodid','$matid','$name',$stocks)";
	$result3=mysqli_query($con,$query3) or die(mysql_error());


	move_uploaded_file($file,"../upload/".$name);
	
	echo "<h3>Upload Complete!</h3>";
}else{	
	echo "<h3>Must be image</h2>";
}
}
}
?>
		</div>
	
</body>
</html>