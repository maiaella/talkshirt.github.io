
<html>
<head>
<title>Excellent Home Decor</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body bgcolor="#fff">

	<?php
	$id=$_GET['id'];
	$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
	mysql_select_db("ehd")or die("cannot select DB");
	$query="SELECT * FROM news WHERE ID=$id";
	$result=mysql_query($query) or die("Unable to perform query".mysql_error());
	if(mysql_num_rows($result)>0){
	while($row=mysql_fetch_object($result)){
	?>
	<div style='width:100%; padding-top:10px; padding-bottom:10px; background:#2980b9; text-align: center; font:18px Segoe UI, Helvetica, sans-serif;'><?php echo $row->TITLE; ?></div>
	<br>
	<div style='width:97%; padding-left:3%; padding-top:10px; padding-bottom:10px; text-align: left; color: #000; font:18px Segoe UI, Helvetica, sans-serif;'>
	<?php 
			echo "".$row->CONTENT. "<br><br>";
			echo "<small>Date Published: " .$row->TIMESTAMP. "</small>"; 
			
			}}?>
	</div>
	<br>
	<br>
	<center>
	<form action="mobilenews.php">
	<input type='submit' style="color:#fff; border: 1px solid #0088b5; background-color: #0088b5; width:250px; height:40px; padding-top: 10px; padding-bottom: 10px; text-decoration: none;" value="BACK TO NEWS"></form>

</table>
</body>
</html>