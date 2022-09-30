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
		<div class="menucontent">
		<h3><a href="../admin/trans.php" class='tab'>Transactions</a> <a href="../admin/prod.php" class='tab'>Products</a> <a href="../admin/users.php" class='tab'>Users</a> <a href="../admin/logs.php" class='tab'>Login Logs</a> <a href="../admin/news.php" class='tab'>Manage News</a></h3>
		</div>
		<br>
		<div class="content">
		<h3>Update Product</h3>
		<?php
		if(!isset($_POST['submit'])){
		$id=$_GET['id'];
		include 'conn.php';
		$query="SELECT * FROM stocks WHERE PROID='$id'";
		$result=mysql_query($query);
		if(mysql_num_rows($result)>0)
		$row=mysql_fetch_object($result)
		?>
		<form action='produpdate.php' method="POST" enctype="multipart/form-data">

		<table>
			<tr><td><input type=hidden name='proid' value='<?php echo $row->PROID;?>' >Name: 
				<td><input type=text name='prod' value='<?php echo $row->NAME;?>'>
			<tr><td>Description:
				<td><textarea cols=15px rows=5px name=desc><?php echo $row->DESCR;?></textarea>
			<tr><td>Price:
				<td><input type=text name='pr' value='<?php echo $row->PRICE;?>' >
			<tr><td>Type:
				<td><select name=type2 >
						<option value='shades'>Shades
						<option value='blinds'>Blinds
						<option value='curtains'>Curtains
						<option value='rollups'>Roll Ups
					</select>
			<tr><td>Image:
				<td><input type="file" name="myfile" >
			<tr><td colspan=2><input type="submit" name=submit value='Update Product' >
			</table>
</form>


<?php
}else{
$proid = $_POST['proid'];
$prod = $_POST['prod'];
$desc = $_POST['desc'];
$pr = $_POST['pr'];
$type2 = $_POST['type2'];
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$file = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if($error > 0 ){
	die("Please try again ! Error Code: " . $error . " <a href='produpdate.php?id=$proid'>(BACK)</a>");
}else{
if($type=='image/png'||$type=='image/jpeg'){
	include 'conn.php';
	$query="UPDATE stocks SET
		PROID='$proid',
		NAME='$prod',
		DESCR='$desc',
		PRICE='$pr',
		TYPE='$type2',
		URLPIC='$name' 
			WHERE PROID='$proid'";
	$result=mysql_query($query) or die(mysql_error());

	move_uploaded_file($file,"../upload/".$name);
	
	echo "<h3>Update Complete!</h3><a href='../admin/prod.php'><input type=submit value=OK ></a>";
	
	
}else{	
	echo "<h3>Must be an image! <a href='produpdate.php?id=$proid'>(BACK)</a></h2>";
}
}
}
?>
		</div>
	</div>
	
	
	
</body>
</html>