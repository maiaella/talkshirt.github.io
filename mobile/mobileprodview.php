
<html>
<head>
<title>Excellent Home Decor</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body style="background: #fff; background-position: center; background-size: cover; background:url(../bg/carousel.jpg) 0 0 no-repeat; ">

<?php
		
if(isset($_GET['id'])){
$id=$_GET['id'];

$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
mysql_select_db("ehd")or die("cannot select DB");
$query="SELECT * FROM ehd_stocks WHERE PROID='$id'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$row=mysql_fetch_object($result);
}
$query3="SELECT * FROM ehd_fabrics WHERE PROID='$id'";
$result3=mysql_query($query3);
if(mysql_num_rows($result)>0){
$row3=mysql_fetch_object($result3);
}
?>


<div style="text-align:center; background: #2980b9; width:100%; padding-bottom:5px; border-bottom: 1px solid #1a1a1a">
	<?php echo $row->NAME ?>
</div>


<center>

<font style="font:16px Segoe UI, Helvetica, sans-serif; color: #000;">

<div style="background-color: #1a1a1a; width:100%; height:300px; box-shadow: 0 1px 3px rgba(0,0,0,0.50);">

<br>
<img src='<?php echo "../upload/$row->URLPIC" ?>' width=250px height=250px >
</div>
<br>
<br>

<div style=" width:260px; text-align: center;overflow-y: scroll;">
<table>
<tr>
<?php

			
			$query2="SELECT * FROM ehd_fabrics WHERE PROID='$id'";
			$result2=mysql_query($query2);
			if(mysql_num_rows($result2)>0){
				$i =1;
				while($row2=mysql_fetch_object($result2)){
				
				echo "<td><form action='mobileprodview1.php' method=POST><input type='image' src='../upload/swatches/$row2->URLPIC' name=submit alt='Submit' value='$row2->MATERIAL_ID' height='80px' width='80px' style='border-radius:80px;'>
				<input type=hidden name='image' value='$row2->MATERIAL_ID'>
				<input type=hidden name='proid' value='$row2->PROID'>
				<input type=hidden name='name1' value='$row->NAME'>
				<input type=hidden name='price' value='$row->PRICE'>
				<input type=hidden name='descr' value='$row->DESCR'>
				</form>";
				$i++;
				}
				$mat = $row3->MATERIAL_ID;
				$proname = $row->NAME;
				$price = $row->PRICE;
				}
			else{
				echo "<h3>No Available Swatch.</h3>";
			}
			}
			?>
			
	</table>
</div>		
	<br>
	
	<form action="mobileprod.php">
	<input type='submit' style="box-shadow: 0 1px 3px rgba(0,0,0,0.30); color:#fff; border: 1px solid #0099cc; background-color: #0099cc; width:250px; height:40px; padding-top: 10px; padding-bottom: 10px; text-decoration: none;" value='BACK TO PRODUCTS'>
	</form>
	

</body>
</html>