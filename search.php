<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
}else{

}

?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->
	<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="75" height="75" align="left"></img></li>
				
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	<br>
		
		<div class='prodcontent'>
		<div class='prodBanner'>
					<div class='prodCaption'>
					<br>
					<br>
		<?php
				$type=$_POST['type2'];
				$search=$_POST['search'];
				include 'conn.php';
				
				if($type=='blinds'){
					echo "<e1>Magic</e1>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type' and NAME LIKE '%$search%'";
				}else if($type=='Shades'){
					echo "<e1>Shades</e1>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type' and NAME LIKE '%$search%'";
				}else if($type=='Combi'){
					echo "<e1>Combi</e1>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type' and NAME LIKE '%$search%'";
				}else if($type=='all'){
					echo "<e1>Search</e1>";
					$query="SELECT * FROM talkshirt_stocks WHERE NAME LIKE '%$search%'";}?>
		
		
					</div>
					<div class='barsearch'>
							<form action=search.php method=POST >
							<input type=hidden name='type2' value='all'>
							<input type=text name=search size=15 placeholder='Search: Product Name' >
							<input type='image' src='bg/search.png' name=submit alt='Submit' value='submit' height='25px' width='25px' class='short'>
							</form>
							</div>
					</div>
					
				<div class="search">

				
				<?php
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
					echo "";
					echo"<br><br>";
					echo "<ul class='products'>";
					
					while($row=mysqli_fetch_object($result)){
					echo"<li>";
					echo "				
						<img src='upload/$row->URLPIC' height='150px' width='150px'></a>
						<br>
						<e1> $row->NAME </e1> <br>
							Php $row->PRICE  <br>
							$row->TYPE</a> <br>
							<button class='add_to_cart' value=".$row->PROID." style='background-color: black;color:white;'>Add to Cart</button>							
					</li>";}
					echo "</ul>";
					}else{
					echo "<a href='products.php'> <e2>Back</e2></a><br>";
					echo "<h1>Maybe you were mistaken. Please try another keyword.</h1>";
					}
				
				
				?>
				
			</div>	
		</div>
		</div>
<div class="container5">
		<!--Dont Delete-->
		</div>
		<!-- Footer -->
		<div class='footer'>
			
			
		</div>

</body>
</html>