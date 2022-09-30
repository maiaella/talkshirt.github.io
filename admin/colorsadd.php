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
		<div class='content'>
		<h3>Add Swatches and Item</h3>
		<form enctype='multipart/form-data' name='frmupload' action='' method='POST'>
		<table>
		<tr>
			<td>Material Color ID:
			<td><input type="text" name="matid" placeholder="Material Color ID" />
			<input type="hidden" name="MAX_FILE_SIZE" value="1999000" />
		<tr>
			<td>Color:
			<td><input type="text" name="color" placeholder="Color" />
		<tr>	
			<td>Product Image:
			<td><input type="file" name="myfile" >
		<tr>	
			<td>Swatch Image:
			<td><input type="file" name="myfile2" >
			
			
		<tr>
			<td colspan=2><input type='submit' value='Submit' name='submit'>
		</table>
		<?php
if(isset($_POST['submit'])){
$id=$_GET['id'];
$matid = $_POST['matid'];
$proid = $id;
$color = $_POST['color'];
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$file = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if($error > 0 ){
	die("Please try again ! Error Code: " . $error);
}else{
if($type=='image/png'||$type=='image/jpeg'){

	$con=mysql_connect('localhost', 'root', '')or die("cannot connect");  
	mysql_select_db("talkshirt")or die("cannot select DB");
	$query="INSERT INTO `$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); _colors` (`PROID`, `MATERIAL_ID`, `URLPIC`, `STOCKS`) VALUES ('$proid','$matid','$name',500)";
	$result=mysql_query($query) or die(mysql_error());

	move_uploaded_file($file,"../upload/colors/".$name);
	
	echo "<h3>Upload Complete!</h3>";
}else{	
	echo "<h3>Must be image</h2>";
}
}
}
?>

<?php
if(isset($_POST['submit'])){
$id=$_GET['id'];
$matid = $_POST['matid'];
$proid = $id;
$color = $_POST['color'];
$name = $_FILES['myfile2']['name'];
$type = $_FILES['myfile2']['type'];
$size = $_FILES['myfile2']['size'];
$file = $_FILES['myfile2']['tmp_name'];
$error = $_FILES['myfile2']['error'];

if($error > 0 ){
	die("Please try again ! Error Code: " . $error);
}else{
if($type=='image/png'||$type=='image/jpeg'){

$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
mysql_select_db("talkshirt")or die("cannot select DB");
	$query="INSERT INTO `talkshirt_fabrics` (`PROID`, `MATERIAL_ID`,`COLOR`, `URLPIC`) VALUES ('$proid','$matid','$color','$name')";
	$result=mysql_query($query) or die(mysql_error());

	move_uploaded_file($file,"../upload/swatches/".$name);
	header("Refresh: 0; URL='../admin/availcolors.php?id=$proid'");
}else{	
	echo "<h3>Must be image</h2>";
}
}
}
?>
		
		</div>
	
</body>
</html>