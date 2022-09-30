<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
}
include 'conn.php';
$proid=$_POST['proid'];
$image=$_POST['image'];
$name1=$_POST['name1'];
$descr=$_POST['descr'];
$price=$_POST['price'];
$query="SELECT * FROM talkshirt_stocks WHERE PROID='$image'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){
$row=mysqli_fetch_object($result);

$count=mysqli_num_rows($result);



}


?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body style="background: #eee;">

	<!--Header-->
	<div id="header2" class='header2'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="75" height="75" align="left"></img></li>	
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li><a href="proh.php">Best Products</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		
		
		<div class='prodview'>
			<div class='prodim' style="text-align: center">
			<?Php
			$query3="SELECT * FROM talkshirt_colors WHERE MATERIAL_ID='$image'";
$result3=mysqli_query($con,$query3);
if(mysqli_num_rows($result3)>0)
$row3=mysqli_fetch_object($result3);
?>
			<img src='<?php echo "upload/colors/$row3->URLPIC" ?>' width=350px height=350px >
			</div>
			<div class='prodinfo' style="text-align: right;">
				<br>
				<br>
			<h9><?php echo $name1 ?></h9>
			<br>
			Price <?php echo $price ?> sq/f
			<br>
			<?php echo $descr ?>
			
			</div>
			
			<div class='prodcolor' style="text-align: center;overflow-y: scroll;">
			<?php

			$query2="SELECT * FROM talkshirt_fabrics WHERE PROID='$proid'";
			$result2=mysqli_query($con,$query2);
			if(mysqli_num_rows($result2)>0){
				$i =1;
				while($row2=mysqli_fetch_object($result2)){
				echo "<br><form action='prodview1.php' method=POST><input type='image' src='upload/swatches/$row2->URLPIC' name=submit alt='Submit' value='$row2->MATERIAL_ID' height='100px' width='100px' style='border-radius:100px;'>
				<input type=hidden name='image' value='$row2->MATERIAL_ID'>
				<input type=hidden name='proid' value='$proid'>
				<input type=hidden name='name1' value='$name1'>
				<input type=hidden name='price' value='$price'>
				<input type=hidden name='descr' value='$descr'>
				</form>";
				?><div class='orderbut'>
				<table>
				<tr>
					<?php if(isset($_SESSION['name'])){
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo"<td><small>Admin./Employee(s) can't place order.";
					}else{
						$number=mysqli_fetch_object(mysqli_query($con,"SELECT STOCKS FROM talkshirt_colors WHERE MATERIAL_ID='".$row2->MATERIAL_ID."'"));
						if($number->STOCKS==0){
							echo"<td>Item Unavailable
							<td><img src='bg/next.png' height='30px' width='30px'>";
						}else{
							echo"<td><a href='order.php?id=$image&proname=$name1&price=$price'>Order Now</a> 
							<td><a href='order.php?id=$image&proname=$name1&price=$price>'><img src='bg/next.png' height='30px' width='30px'></a>";
						}
					}}else{
					echo"<td><a href='login.php'>Sign in to order.</a>"; 
					}
					?>
				</table>
				</div><?php
				$i++;
				}
				}
			else{
				echo "<h3>No Data Found</h3>";
			}
			?>
			
			</div>
			<div class='prodback' style="text-align: right">

			
			</div>
		</table>
		</div>
		
		

</body>
</html>