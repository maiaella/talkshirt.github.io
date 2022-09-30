<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();

if (!isset($_SESSION['code'])) {
    header('location:login.php');
}

include 'conn.php';
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
$uname = $_SESSION['uname'];
 

					
				
}else{

}

?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
<script src="fontawesome.js"></script>
</head>
<body>

	<!--Header-->
	<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> <li><img src="bg/logo.png" width="120" height="60" align="left"></img></li>	
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
				 
				
					$query4="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
					$result4=mysqli_query($con,$query4);
					if(mysqli_num_rows($result4)>=0){
					$row4=mysqli_fetch_object($result4);
					}else{}
					$notif=$row4->NOTIFICATIONS;
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info ";if($notif == 0){ }else{echo "<m1>$notif</m1>";} echo "</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		
					
		<style type="text/css">
			.count_cart{
				position: absolute;
				top: 25px;
				right: -10px;
				background-color: red;
				font-size: 15px;
				width: 18px;
				height: 20px;
				border-radius: 10px;
				display: grid;
				place-items: center;
				font-weight: bold;
			}
		</style>>
		<div class='prodcontent'>
				<div class='prodBanner'>
					<div class='prodCaption' style="width: 90%;">
					<br>
					<br>
					<e1>Products</e1>
					<div style="color: white;float: right;display: grid;place-items: center;height: 50%;font-size: 30px;position: relative;">
						<div>
							<a href="cart.php" style="color: white;">
							<span ><i class="fas fa-shopping-bag"></i></span>	
						<span class="count_cart">0</span>
					</a>
						</div>
						
					</div>
					
					</div>	
						
					</div>
				<br>
				<br>
		<div class='prodwhole'>
		<div class='prodleft'>
				<h3>Search:</h3>
				<form action=search.php method=POST >
				<select name='type2' >
					<option value='all'>All</option>
					<!-- <option value='Magic'>Magic</option>
					<option value='Combi'>Combi</option>
					<option value='Shades'>Shades</option> -->
				</select>			
				<input type=text name=search size=15 placeholder='Product Name' >
				<input type='image' src='bg/search.png' name=submit alt='Submit' value='submit' height='25px' width='25px' class='short'>
				</form>
				
				
				<b>Filter by Category</b>
				<ul type=square>
				
					<li><a href='products.php'>View All</a>
				<!--	<li><a href='products.php?type=Combi'>Combi</a>
					<li><a href='products.php?type=Magic'>Magic</a>
					<li><a href='products.php?type=Shades'>Shades</a> -->
				
				</ul>
				</div>
		
				<div class='prodright'>
				<table>
				<!-- PHP -->
				<?php
				
				//URL
				if(isset($_GET['type'])){
				$type=$_GET['type'];
				}else if(isset($_GET['price'])){
				$price=$_GET['price'];
				}else if(isset($_GET['view'])){
				$view=$_GET['view'];
				}
				 
				
				
				//type
				if(isset($type)){
				if($type=='blinds'){
					echo "<h3>Blinds</h3>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type'";
				}else if($type=='Magic'){
					echo "<h3>Magic</h3>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type'";
				}else if($type=='Combi'){
					echo "<h3>Combi</h3>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type'";
				}else if($type=='Shades'){
					echo "<h3>Shades</h3>";
					$query="SELECT * FROM talkshirt_stocks WHERE TYPE='$type'";
				}
				
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
					echo "<ul class='products'>";
					
					while($row=mysqli_fetch_object($result)){
					echo"<li>";
					echo"<li>";
					echo "				
						<a href='products.php?id=$row->PROID'><img src='upload/$row->URLPIC' height='180px' width='180px'></a>
						<br>
						<a href='products.php?id=$row->PROID'><e1> $row->NAME </e1> <br>
							Php $row->PRICE  <br>
							$row->TYPE</a>
							Stocks:	$row->STOCKS 
					</li>";
					}
					echo "</ul>";
					}else{
					echo "<h1>No Data Found</h1>";
					}
				}else{
					echo "<h3>ALL PRODUCTS</h3>";
					$query="SELECT * FROM talkshirt_stocks ";
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
					echo "<ul class='products'>";
					
					while($row=mysqli_fetch_object($result)){
					echo"<li>";
					echo "				
						<a href='products.php?id=$row->PROID'><img src='upload/$row->URLPIC' height='180px' width='180px' ></a>
						<br>
						<a href='products.php?id=$row->PROID'><e1> $row->NAME </e1> <br>
							Php $row->PRICE  <br>
							$row->TYPE</a> <br>
							Stocks:	$row->STOCKS 	<br>
							<button class='add_to_cart' value=".$row->PROID." style='background-color: black;color:white;'>Add to Cart</button>
						
					</li>";}
					echo "</ul>";
					
					}
				}	
				
				
				?>
				
				
				</table>
				</div>
		</div>
		</div>
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script>

			
            setInterval(function(){
            	$.ajax({
                url: "products_data_cart.php",
                type: "POST",
                cache: false,
                success: function(dataResult){
                $('.count_cart').html(dataResult)
                }

            });
            },100)
			$('.add_to_cart').click(function() {
    				
                    var PROID = $(this).val();

                    $.ajax({
                        url: "products_add_cart.php",
                        type: "POST",
                        cache: false,
                        data:{

                            PROID : PROID,
                        },
                        success: function(dataResult){
                        
                        }

                    });

                });
		</script>

</body>
</html>