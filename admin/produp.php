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
		if(!isset($_POST['submit'])){
		$id=$_GET['id'];
		include 'conn.php';
		$query="SELECT * FROM talkshirt_stocks WHERE PROID='$id'";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
		$row=mysqli_fetch_object($result);
		}
		?>
		<h3>Update Product</h3>
		<form action='produp.php' method="POST" enctype="multipart/form-data">
		<table>
		<tr>
			<td>Product ID:
			<td><input type="text" name="prodid" placeholder="Product ID" value='<?php echo $row->PROID ?>'>
				<input type="hidden" name="prid" value="<?php echo $row->PROID ?>" />
		<tr>
			<td>Name:
			<td><input type="text" name="prodname" placeholder="Product Name" value='<?php echo $row->NAME ?>'>
		<tr>
		<td>Type:
			<td><select name="type2">
			<option selected="selected" value='<?php echo $row->TYPE ?>'><?php echo $row->TYPE ?></option>
			<option value="Black">Black</option>
			<option value="White">White</option>
			
			
			
			
		<tr>
			<td>Price:
			<td><input type="text" name="pr" placeholder="Price" value='<?php echo $row->PRICE ?>'>
		<tr>
			<td>Stocks:
			<td><input type="text" name="stock" placeholder="Stocks" value='<?php echo $row->STOCKS ?>'>
		<tr>
			<td>Description:
			<td><input type="text" name="desc" placeholder="Description" value='<?php echo $row->DESCR ?>'>
			<input type="hidden" name="MAX_FILE_SIZE" value="1999000" />
		<tr>	
			<td>Product Image:
			<td><input type="file" name="myfile" >
		<tr>
			<td colspan=2><input type='submit' value='Update' name='submit'>
		</table>
<?php
}else{
$id=$_POST['prid'];
$prodid = $_POST['prodid'];
$prodname = $_POST['prodname'];
$desc = $_POST['desc'];
$pr = $_POST['pr'];
$stock = $_POST['stock'];
$type2 = $_POST['type2'];
$name = $_FILES['myfile']['name'];
$type = $_FILES['myfile']['type'];
$size = $_FILES['myfile']['size'];
$file = $_FILES['myfile']['tmp_name'];
$error = $_FILES['myfile']['error'];

if($error > 0 ){
	die("Please try again! Please input image Error Code: " . $error . " <a href='produp.php?id=$prodid'>(BACK)</a>");
}else{
if($type=='image/png'||$type=='image/jpeg'){

	include 'conn.php';
	$query="UPDATE talkshirt_stocks SET
		PROID='$prodid',
		NAME='$prodname',
		DESCR='$desc',
		PRICE='$pr',
		STOCKS='$stock',
		TYPE='$type2',
		URLPIC='$name' 
			WHERE PROID='$id'";
	$result=mysqli_query($con,$query) or die(mysql_error());

	move_uploaded_file($file,"../upload/".$name);
	
	$query2="UPDATE talkshirt_colors SET
		PROID='$prodid'
			WHERE PROID='$id'";
	$result2=mysqli_query($con,$query2) or die(mysql_error());
	
	$query3="UPDATE talkshirt_fabrics SET
		PROID='$prodid'
			WHERE PROID='$id'";
	$result3=mysqli_query($con,$query3) or die(mysql_error());
	
	echo "<h3>Update Complete!</h3><a href='../admin/prod.php'><input type=submit value=OK ></a>";
	
	
}else{	
	echo "<h3>Must be an image! <a href='produpdate.php?id=$proid'>(BACK)</a></h2>";
}
}
}
?>		
		
		</div>
		
	
	
</body>
</html>