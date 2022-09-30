<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'conn.php'; 

if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$uname=$_SESSION['uname'];
$urlpic=$_SESSION['urlpic'];
}
?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
<meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talkshirts</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">

</HEAD>
<BODY onload="noBack();"
    onpageshow="if (event.persisted) noBack();" onunload="" style="background: #fff;">

	<!--Header-->
<div id="header" class='header'>
		
    <div  class="menu">
	<div class="nav">
		
        <ul> 
			<li><a href="index.php">Home</a></li> 
		    <li><a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp></dp><a href='profile.php'>".$name.", Account Info</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
			
			</div>
		</ul>
    </div>
	</div>
	</div>
	
	<br>
		
		<?php	
			
				// $query="SELECT * FROM talkshirt_cart ";
				// $result=mysqli_query($con,$query);
				// if(mysqli_num_rows($result)>0){
				// $row=mysqli_fetch_object($result);
				// }




				$query="SELECT *,c.id AS c_id, s.URLPIC AS s_URLPIC, f.COLOR AS f_COLOR FROM talkshirt_fabrics f INNER JOIN talkshirt_cart c ON f.MATERIAL_ID=c.MATERIALID INNER JOIN talkshirt_stocks s ON c.PROID=s.PROID WHERE c.USERS_ID = '".$_SESSION['id']."' AND status = 0 ";
				$result=mysqli_query($con,$query);
				
				if(mysqli_num_rows($result)>0){
				?>			
		<div class='banContent'>
			<form action="cart_controller.php" method='POST' >
				<div class='orderbanner'>
				<center>
				</center>
				</div>
				
				<div class='orderbox'>
					<div class='cartheader'>
					Product Cart
		
					</div>
					
					<div class='cartheader'>

						<table style="width: 100%;">
							<thead>
								<tr>
									<th style="text-align: center;">IMAGES</th>
									<th style="display: none;">Name</th>
									<th style="text-align: center;">Name</th>
									<th style="text-align: center;">Color</th>
									<th style="text-align: center;">Price</th>
									<th style="text-align: center;">Quantity</th>
									<th style="text-align: center;">Action</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								while ($row=mysqli_fetch_assoc($result)) {

				
							?>

							<tr>
							
								<td style="padding: 20px 0px;text-align: center;"><img src='upload/<?php echo $row['s_URLPIC']; ?>' width="100px" height="100px"></td>
								<td style="display: none;">
									<input type="hidden" name="c_id[]" value="<?php echo $row['c_id']; ?>">
									<input type="hidden" name="PRICE[]" value="<?php echo $row['PRICE']; ?>">
								</td>
								<td style="text-align: center;"><b><?php echo $row['NAME']; ?></b></td>
								<td style="text-align: center;"><?php echo $row['f_COLOR']; ?></td>
								<td style="text-align: center;"> Php <?php echo $row['PRICE']; ?></td>
								<td style="text-align: center;">	
								<button type="button" class="button" style="width: 40px;height: 35px;font-weight: bold;font-size: 25px;">-</button><input type="text" class="quantity" name="quantity[]" required class="form-control prc" value="<?php echo $row['QUANTITY'];?>" style="width: 40px;height: 35px;font-weight: bold;font-size: 25px;text-align: center;" /><button type="button" class="button" style="width: 40px;height: 35px;font-weight: bold;font-size: 25px;">+</button>
								</td>
								<td style="text-align: center;">	
								<a href="removecartcontroller.php?cid=<?php echo $row['c_id']; ?>" style="color:red;">Remove</a>
								</td>
							
						</tr>
						<?php } ?>
							</tbody>
						</table>
					</div>
					<div class='cartheader'>
					Shipping Method
					<br>
						<table>
							<tr><td>Delivery Address: <td><textarea name='address' cols='34' rows='3' maxlength='100' required></textarea><br>
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Pick Up' required="required"><td>Pick Up on Store (No Delivery)
							<tr><td align='right'><input type=radio name='shipping' class=radio value='Delivery' required="required"><td>Delivery (Free Shipping)
							
						</table>	
					</div>
					
					<div class='cartheader'>
					<small>Are you done? You can now check out.</small>		<input type='submit' name='submit' value='Check out' class='button'>
					
					</div>
				</div>
				</form>
		</div>
		
		<?php 
		}else{ 

			echo"<br><br><br><br><br><div class='orderbox3'>
							<center>
							<br>
							<img src='bg/sad.png' heigh=50px width=50px>
							<h1><b>Oooops! We've got something wrong here.</b></h1>
							You didn't select a product
							<br><br><br><br>
							<a href='products.php' class='back'>Select a Product</a></center></div>
							<br><br><br><br><br><br><br><br><br><br><br><br>"; 
							header("Refresh: 60; URL='products.php'");

		 }
		?>
	
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(function() {
 $(".button").on("click", function() {
   var $button = $(this);
   var $parent = $button.parent(); 
   var oldValue = $parent.find('.quantity').val();

   if ($button.text() == "+") {
      var newVal = parseFloat(oldValue) + 1;
    } else {
       // Don't allow decrementing below zero
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
        } else {
        newVal = 1;
      }
      }
    $parent.find('.quantity').val(newVal);
 });
});
	</script>
		
</body>
</html>