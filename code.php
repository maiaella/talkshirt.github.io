<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'conn.php';
if(isset($_POST['submit'])){

$CODE=$_POST['CODE'];


if ($CODE == '') {
	echo "<script type='text/javascript'>alert('Invalid Code!');</script>";
echo "<script>window.location.href='code.php';</script>";
}else{

$sql = "SELECT * FROM talkshirt_users WHERE CODE='$CODE'";
$result = mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0) {


$query="UPDATE talkshirt_users SET STATUS=1, CODE=0 WHERE CODE='$CODE'";
mysqli_query($con,$query) or die("Unable to perform query".mysqli_error());

echo "<script type='text/javascript'>alert('Your Account Successfully Verified!');</script>";
echo "<script>window.location.href='login.php';</script>";
}else{
	echo "<script type='text/javascript'>alert('Invalid Code!');</script>";
echo "<script>window.location.href='code.php';</script>";
}
}

}

?>
<html>
<head>
    <title>Talkshirt</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="icon" href="favicon.ico" />
    <link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
</head>
<body style="overflow: hidden;">
    <div class="banner">
        <div class="navbar">
        <ul>
            <li> <a href="index.php">Home</a></li>
            <li> <a href="products.php">Products</a></li>
			<li> <a href="diy/mydesigner.php">Customization</a></li>
            <li> <a href="contact.php">Contact Us</a></li>

        </ul>
        </div>

        <div class='wholelogin'>
	    <form method=POST>
	
	    <div class='logincontent' style="padding: 50px;width: 500px;max-width: 100%;">
	    <h1 style="text-align: center;">Verify Your Account<h1>
	
	    <table id='inputlog' style="margin-top: 10px;">

		    <tr><td rowspan=4>

		    <tr>
		    <td>
		    <input type=text placeholder='Enter Code Here' name=CODE>
		 
		    <tr>
		    <td>
		    <input type=submit name=submit value='Verify' class=loginb>
		
	    </table>

	    </div>
	
	    </div>
    </div>

    

</body>
</html>