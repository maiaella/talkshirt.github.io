<?php 
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
}
$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
mysql_select_db("ehd")or die("cannot select DB");
$proid=$_POST['proid'];
$image=$_POST['image'];
$name1=$_POST['name1'];
$descr=$_POST['descr'];
$price=$_POST['price'];
$query="SELECT * FROM ehd_stocks WHERE PROID='$image'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$row=mysql_fetch_object($result);

$count=mysql_num_rows($result);



}


?>
<html>
<head>
<title>Excellent Home Decor</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

		
		<?Php
			$query3="SELECT * FROM ehd_colors WHERE MATERIAL_ID='$image'";
			$result3=mysql_query($query3);
			if(mysql_num_rows($result3)>0)
			$row3=mysql_fetch_object($result3);
			?>

<font style="font:16px Segoe UI, Helvetica, sans-serif; color: #fff;">

<div style="background-color: #1a1a1a; width:50%; height:100%; float:left; ">
<center>
<?php echo"
<div style='position: relative; width: 75%; margin-top: 5%; '> 
	<div style='display: block; padding-top: 100%; background: url(../upload/colors/$row3->URLPIC); background-size: cover; background-repeat: no-repeat;'></div> 
</div>
"; ?>
</center>
</div>
<div style=" width:50%; height: 100%; text-align: center;overflow-y: scroll; float:right; background: url(../bg/carousel.jpg); background-position: center; background-size: cover;">
<center>
<br>
<br>
<font style="font:25px Segoe UI, Helvetica, sans-serif; color: #000; margin-top: 10%; ">
<?php echo $name1 ?>
</font>
<br>
<br>
<table style="margin-top: 5%; ">
<tr>
<?php

			$query2="SELECT * FROM ehd_fabrics WHERE PROID='$proid'";
			$result2=mysql_query($query2);
			if(mysql_num_rows($result2)>0){
				$i =1;
				while($row2=mysql_fetch_object($result2)){
				echo "<td><form action='mobileprodview_land1.php' method=POST><input type='image' src='../upload/swatches/$row2->URLPIC' name=submit alt='Submit' value='$row2->MATERIAL_ID' height='80px' width='80px' style='border-radius:80px;'>
				<input type=hidden name='image' value='$row2->MATERIAL_ID'>
				<input type=hidden name='proid' value='$proid'>
				<input type=hidden name='name1' value='$name1'>
				<input type=hidden name='price' value='$price'>
				<input type=hidden name='descr' value='$descr'>
				</form>";
				$i++;
				}
				}
			else{
				echo "<h3>No Data Found</h3>";
			}
			?>
			
	</table>
	<br>
	<br>
	<form action="mobileprod2.php">
	<input type='submit' style="box-shadow: 0 1px 3px rgba(0,0,0,0.50); color:#fff; border: 1px solid #2980b9; background-color: #2980b9; width:250px; height:40px; padding-top: 10px; padding-bottom: 10px; text-decoration: none;" value='BACK TO PRODUCTS'></form>
	
	</center>
</div>		
	
	

</body>
</html>