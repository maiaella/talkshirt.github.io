
<html>
<head>
    <title>Talkshirt</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">
    <link rel="icon" href="favicon.ico" />
    <link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
</head>
<body>
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
	    <form action=login_controller.php method=POST>
	
	    <div class='logincontent'>
	    <l1>Sign In to Talkshirt<l1>
	    <br>
	    <table id='inputlog'>
		    <?php 
		  //  if(isset($_SESSION['att'])){
		   // if($_SESSION['att']>0){
		
		 //   echo "<tr><td colspan=5><font color=red size=1 >" .$_SESSION['att']."/3 Attempts remaining</font>";
		 //   }}
		    ?>
		    <tr><td rowspan=4>
		    <img src='bg/person.png' width='80px' height='80px' style='margin-right: 15px;'>
		    <tr>
		    <td>
		    <input type=text placeholder='User Name' name=user>
		    <tr>
		    <td>
		    <input type=password placeholder='Password' name=pass>
		    <tr>
		    <td>
		    <input type=submit name=submit value='Log In' class=loginb>
		
	    </table>
	    <div class="loginsign">
		    <small><a href='forgot.php' class=mini>Forgot Password?</a></small>
		    <br>
		    <small><b><a href='register.php' style="color: #0099cc;">Sign Up �</a></small></b>
	    </div>
	    </div>
	
	    </div>
    </div>

    

</body>
</html>