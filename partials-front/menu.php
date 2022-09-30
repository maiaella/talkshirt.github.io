<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/talkshirt/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'talkshirt');
    
    $conn=mysqli_connect('localhost', 'root', '')or die("cannot connect");  //Database Connection
    mysqli_select_db($con,"talkshirt")or die("cannot select DB"); //SElecting Database


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talkshirts</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="csss/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="front.php" title="Logo">
                    <img src="images/mainlogo.jpg" alt="Talkshirts Logo" class="img-responsive">
                </a>
            </div>
            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="diy/mydesigner.php">DIY</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>shirt.php">Designs</a>
                    </li>
                    <li> 
                    <a href="display-cart.php"><img src="images/cart.png" alt="cart" height=30px width=30px class=icons></a>       
                    </li>

                    
                <div class="dropdown">
                <button class="dropbtn">
                    <img src="images/profile.png" alt="profile" height=30px width=30px class=icons>
                    <?php     
                        if(isset($_SESSION['user']))
                            {
                            echo $_SESSION['user'];
                            }                        
                    ?>
                </button>
                <div class="dropdown-content">
                    <a href="profile.php">ACCOUNT</a>
                    <a href="#">SAMPLE</a>
                    <a href="logout.php">LOGOUT</a>
                </ul>
            </div>
            </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->