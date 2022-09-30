<?php 
    //Start Session
    session_start();


    //Create Constants to Store Non Repeating Values
    define('SITEURL', 'http://localhost/talkshirt/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'db_shirt');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection
    $db_select = mysqli_select_db($conn, "talkshirt") or die(mysqli_error()); //SElecting Database


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Talkshirts</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
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

<?php 

    //AUthorization - Access COntrol
    //CHeck whether the user is logged in or not
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        //User is not logged in
        //REdirect to login page with message
        $_SESSION['no-login-message'] = "<div class='error text-center'>Please Login to Gain Access</div>";
        //REdirect to Login Page
        header('location:'.SITEURL.'login.php');
    }

?>

<html>
    <head>
        <title></title>
        <link rel=stylesheet href=css/style.css>
    </head>
    <body>

        <form method=POST class=text-center action="payment.php">
        <table border=0 class='order-summary'>

<?php
$today = date("Ymd");
$rand = strtoupper(substr(uniqid(sha1(time())),0,4));
$order_id = $today . $rand;
$user = $_SESSION["user"];

$sql = "select * from tbl_orders where username = '$user' and stats = 'cart'";
$result = $conn->query($sql);
if($result -> num_rows> 0){

?>
    <th colspan=3><h1 class=summary-label>ORDER SUMMARY</h1><br>
<?php
$total=0;
while($row = $result -> fetch_assoc()){
$source = "images/shirt/".$row['image'];
?>
        <tr><th width=25% height=140><img src=<?php echo $source; ?> width=90px height=100px>
        <td><span class=summary-item><?php echo $row['shirt']; ?></span>
        <br><span class=summary-subtext>Size: <?php echo $row['size']; ?></span>
        <br><span class=summary-subtext>Qty: <?php echo $row['quantity']; ?></span>
        <th><span class=summary-price>₱<?php echo $row['total']; ?></span>

<?php
        $total+=$row['total']; }
?>

        <tr><th colspan=2><br><h1 class=checkout-label>TOTAL
        <th><br><span class=summary-total>₱<?php echo $total; ?>

        </table>

<?php
}else{
echo "<b class=font2>EMPTY </b>";
}

$sql2 = "select * from tbl_admin where username = '$user'";

$result2 = $conn->query($sql2);
if($result2 -> num_rows> 0){

    while($row = $result2 -> fetch_assoc()){
?>

<div class="checkout-form">
    <input type=hidden id=order-id name=order-id value=<?php echo $order_id; ?>>
    <center>
    <h1 class="checkout-label">PAYMENT METHOD</h1><br>
        <input type=radio id=payment-method name=payment value=GCASH required>&nbsp;&nbsp;GCASH
        &nbsp;
        <input type=radio id=payment-method name=payment value=PAYMAYA>&nbsp;&nbsp;PAYMAYA
        &nbsp;
        <input type=radio id=payment-method name=payment value=COD>&nbsp;&nbsp;CASH ON DELIVERY
        <br><br>
    <h1 class="checkout-label">CONTACT INFORMATION</h1><br>
    <div class="field-input">
    <h1 class=checkout-input-label>EMAIL*</h1>
    <input type=email id=email-input name=email placeholder='EMAIL' value=<?php echo $row['email']; ?> required><br><br>
    </div>
    <h1 class=checkout-input-label>NAME*</h1>

    <input type=text id=name-input name=fname placeholder='FIRST NAME' value=<?php echo $row['fname']; ?> required>

    <input type=text id=name-input name=lname placeholder='LAST NAME' value=<?php echo $row['lname']; ?> required><br><br>

    <h1 class=checkout-input-label>PHONE NUMBER*</h1>
    <input type=text id=phone-input name=phone placeholder='PHONE' value=+63 minlength=11 maxlength=13 required><br><br>

    <h1 class="checkout-label">SHIPPING ADDRESS</h1><br>

    <input type=text id=address-input name=street placeholder='STREET ADDRESS' minlength=15 maxlength=60 required><br><br>

    <input type=text id=apt-input name=apt placeholder='APT, SUITE, LANDMARK, ETC.' maxlength=60 required><br><br>

    <input type=text id=postal-input name=barangay placeholder='BARANGAY, SUBDIVISION' minlength=3 maxlength=50 required>

    <input type=text id=city-input name=city placeholder=CITY required><br><br>

    <input type=text id=postal-input name=postal placeholder='POSTAL CODE' minlength=4 maxlength=4 required>

    <select id=region-input name=region required>
        <option value="">REGION</option>
        <option value="Abra">Abra</option>
        <option value="Agusan del Norte">Agusan del Norte</option>
        <option value="Agusan del Sur">Agusan del Sur</option>
        <option value="Aklan">Aklan</option>
        <option value="Albay">Albay</option>
        <option value="Antique">Antique</option>
        <option value="Apayao">Apayao</option>
        <option value="Aurora">Aurora</option>
        <option value="Basilan">Basilan</option>
        <option value="Bataan">Bataan</option>
        <option value="Batanes">Batanes</option>
        <option value="Batangas">Batangas</option>
        <option value="Biliran">Biliran</option>
        <option value="Benguet">Benguet</option>
        <option value="Bohol">Bohol</option>
        <option value="Bukidnon">Bukidnon</option>
        <option value="Bulacan">Bulacan</option>
        <option value="Cagayan">Cagayan</option>
        <option value="Camarines Norte">Camarines Norte</option>
        <option value="Camarines Sur">Camarines Sur</option>
        <option value="Camiguin">Camiguin</option>
        <option value="Capiz">Capiz</option>
        <option value="Catanduanes">Catanduanes</option>
        <option value="Cavite">Cavite</option>
        <option value="Cebu">Cebu</option>
        <option value="Compostela">Compostela</option>
        <option value="Davao del Norte">Davao del Norte</option>
        <option value="Davao del Sur">Davao del Sur</option>
        <option value="Davao Oriental">Davao Oriental</option>
        <option value="Eastern Samar">Eastern Samar</option>
        <option value="Guimaras">Guimaras</option>
        <option value="Ifugao">Ifugao</option>
        <option value="Ilocos Norte">Ilocos Norte</option>
        <option value="Ilocos Sur">Ilocos Sur</option>
        <option value="Iloilo">Iloilo</option>
        <option value="Isabela">Isabela</option>
        <option value="Kalinga">Kalinga</option>
        <option value="Laguna">Laguna</option>
        <option value="Lanao del Norte">Lanao del Norte</option>
        <option value="Lanao del Sur">Lanao del Sur</option>
        <option value="La Union">La Union</option>
        <option value="Leyte">Leyte</option>
        <option value="Maguindanao">Maguindanao</option>
        <option value="Marinduque">Marinduque</option>
        <option value="Masbate">Masbate</option>
        <option value="Metro Manila">Metro Manila</option>
        <option value="Mindoro Occidental">Mindoro Occidental</option>
        <option value="Mindoro Oriental">Mindoro Oriental</option>
        <option value="Misamis Occidental">Misamis Occidental</option>
        <option value="Misamis Oriental">Misamis Oriental</option>
        <option value="Mountain Province">Mountain Province</option>
        <option value="Negros Occidental">Negros Occidental</option>
        <option value="Negros Oriental">Negros Oriental</option>
        <option value="North Cotabato">North Cotabato</option>
        <option value="Northern Samar">Northern Samar</option>
        <option value="Nueva Ecija">Nueva Ecija</option>
        <option value="Nueva Vizcaya">Nueva Vizcaya</option>
        <option value="Palawan">Palawan</option>
        <option value="Pampanga">Pampanga</option>
        <option value="Pangasinan">Pangasinan</option>
        <option value="Quezon">Quezon</option>
        <option value="Quirino">Quirino</option>
        <option value="Rizal">Rizal</option>
        <option value="Romblon">Romblon</option>
        <option value="Samar">Samar</option>
        <option value="Sarangani">Sarangani</option>
        <option value="Siquijor">Siquijor</option>
        <option value="Sorsogon">Sorsogon</option>
        <option value="South Cotabato">South Cotabato</option>
        <option value="Southern Leyte">Southern Leyte</option>
        <option value="Sultan Kudarat">Sultan Kudarat</option>
        <option value="Sulu">Sulu</option>
        <option value="Surigao del Norte">Surigao del Norte</option>
        <option value="Surigao del Sur">Surigao del Sur</option>
        <option value="Tarlac">Tarlac</option>
        <option value="Tawi-Tawi">Tawi-Tawi</option>
        <option value="Zambales">Zambales</option>
        <option value="Zamboanga del Norte">Zamboanga del Norte</option>
        <option value="Zamboanga del Sur">Zamboanga del Sur</option>
        <option value="Zamboanga Sibugay">Zamboanga Sibugay</option>
    </select><br><br>

     <input type=submit name=submit value='CHECK OUT' class=btn-checkout>

<?php
}
}else{
    echo "<b class=font2>EMPTY </b>";
}
?>
</form>
    