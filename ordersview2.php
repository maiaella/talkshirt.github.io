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
    <link rel="stylesheet" href="style.css" type="text/css" media="all">
    <link rel="icon" href="favicon.ico" />
    <link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
    
</head>
<body>
    <div class="banner">
        <div class="navbar">
        <ul>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <li> <a href="index.php">Home</a></li>
            <li> <a href="products.php">Products</a></li>
            <li> <a href="diy/mydesigner.php">Customization</a></li>
            <li> <a href="contact.php">Contact Us</a></li>
            <li> <a href="orders.php">Orders</a></li>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     
        

			
			<?php if(isset($name)){
				 
                
					$query4="SELECT * FROM talkshirt_users WHERE UNAME='$uname'";
					$result4=mysqli_query($con,$query4);
					if(mysqli_num_rows($result4)>=0){
					$row4=mysqli_fetch_object($result4);
					}else{}
					$notif=$row4->NOTIFICATIONS;
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a></li>
                    <li><a href='logout.php'>LogOut</a></li>";} 
					else{ 
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 40px; height: 40px; border-radius: 60px;'></dp><a href='profile.php'>".$name.", Account Info ";if($notif == 0){ }else{echo "<m1>$notif</m1>";} echo "</a></li>
                    <li><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"> <b>Sign In</a></li>
            <li><a href="register.php">Sign Up</b></a></li>
			<?php } ?>
			
			

        </ul>
        </div>

        <div class=" orders">
            <table border="1px solid #c0c0c0">
                <thead>
                    <tr>
                        <th>TRANSACTION ID</th>
                        <th>Details SIZED</th>
                        <th>Details PRICE</th>
                        <th>T-SHIRT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    $query="SELECT * FROM talkshirt_customization_cart WHERE TRANSID = '".$_GET['TRANSID']."'";
                    $queryresult=mysqli_query($con,$query);
                    while ($row=mysqli_fetch_assoc($queryresult)) {
                             
                    ?>
                    <tr>
                        <td><?php echo $row['TRANSID'] ?></td>
                        <td>
                            SMALL: <?php echo $row['small_quantity'] ?> <br>
                            MEDIUM: <?php echo $row['medium_quantity'] ?> <br>
                            LARGE: <?php echo $row['large_quantity'] ?> <br>
                            XLARGE: <?php echo $row['xlarge_quantity'] ?> <br>
                            XLARGE: <?php echo $row['xxlarge_quantity'] ?> <br>
                            
                        </td>
                        <td>
                            SMALL: <?php echo $row['total_small_price'] ?> <br>
                            MEDIUM: <?php echo $row['total_medium_price'] ?> <br>
                            LARGE: <?php echo $row['total_large_price'] ?> <br>
                            XLARGE: <?php echo $row['total_xlarge_price'] ?> <br>
                            XLARGE: <?php echo $row['total_xxlarge_price'] ?> <br>
                            
                        </td>
                        <td>
                            <img src="diy/tdesignAPI/uploads/<?php echo $row['front_image'] ?>" width="150">
                            <img src="diy/tdesignAPI/uploads/<?php echo $row['back_image'] ?>" width="150">
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>



    </div>
</body>
</html>