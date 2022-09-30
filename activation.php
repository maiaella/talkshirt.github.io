
<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
date_default_timezone_set('Asia/Manila');
if(isset($_SESSION['name'])){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];
$urlpic = $_SESSION['urlpic'];
}else{

}
if(!isset($_POST['submit'])){
$id = $_SESSION['id'];
include 'conn.php';
$query="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$row=mysql_fetch_object($result);

$count=mysql_num_rows($result);
}
?>
<html>
<head>
<title>Talkshirtalkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">

</head>
<body>
	
	<!--Header-->
	<div class='header'>
	<!--Eto yung sa Logo-->
	
	<!--navigation bar-->
    <div class="menu">
	<div class="nav">
        <ul><li><img src="bg/logo.png" width="75" height="75" align="left"></img></li>
			<div class="user">
			<?php if(isset($name)){
			
					if(($usertype == 'ADMIN')||($usertype == 'SUPER ADMIN')){
					echo "<li><a href='admin/menu.php'>".$name.", Administrator Panel</a><a href='logout.php'>LogOut</a></li>";} 
					else{
					echo "<li><dp><img src='./upload/dp/$urlpic' style='width: 60px; height: 60px; border-radius: 60px;'></dp><a href='#'>".$name.", Welcome</a><a href='logout.php'>LogOut</a></li>";} 
			}else{ ?>
			<li><a href="login.php"><b>Sign In!</b></a><a href="register.php">Sign Up</a></li>
			<?php } ?>
		</ul>
    </div></div>
	</div>
	<br>
	
	<div class='wholeContent'>
		
		<form action="activation.php?id=<?php echo $row->ID;?>" method=POST>
		<h1>Activation</h1>
		
		<div class='content'>
		
		<label>Hi <?php echo $name ?>, <br>Please enter the code that we've sent to your e-mail and mobile.
		<br>If you can't see the message from us. Try to look it at Junk or Spam folder of your E-mail
		</label>
		<input type=text placeholder='XXXXX' name='code'>
		<input type=hidden name=id value="<?php echo $row->ID;?>">
			<input type=submit name=submit value='Submit' class=submit><br>
		
		</form>			
		</div>
		
		</form>
		
		<?php
}else{
$code=$_POST['code'];
$id=$_POST['id'];
date_default_timezone_set('Asia/Manila');
include 'conn.php';

$query2="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result2=mysql_query($query2);
if(mysql_num_rows($result2)>0){
$row2=mysql_fetch_object($result2);
}

if($code==$row2->SECURITY_CODE){

$query="UPDATE talkshirt_users
			SET
			BLOCK=0
			WHERE ID='$id'";
mysql_query($query) or die("Unable to perform query".mysql_error());
$_SESSION['name']=$name;

$msg="Hello $row2->FIRST_NAME $row2->LAST_NAME, Your SCBC Account is now activated. Username: $row2->UNAME Password: $row2->PWORD  Thank You for choosing talkshirt.";
				//sms start
				function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
				{           
                        $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
                        $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
                        $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
                        $url = "http://gateway.onewaysms.com.au:10001/".$query_string;
					$fd = @implode ('', file ($url));      
                      							
                }  
				gw_send_sms("API1LRJKW5YWD", "API1LRJKW5YWDD0YYS", "talkshirt-QC", $row2->TELNUM , $msg);
				//sms end
				
require '/phpmailer/class.phpmailer.php';

				$mail = new PHPMailer;

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup server
				$mail->Port = 465;
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'excellenthomedecor@yahoo.com';                            // SMTP username
				$mail->Password = 'Mesaadmin00';                           // SMTP password
				$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
				
				$mail->From = 'excellenthomedecor@yahoo.com';
				$mail->FromName = 'SCBC';
				$mail->addAddress($row2->EMAIL);               // Name is optional

				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'SCBC Furniture';
				$mail->Body    = "Hello $row2->FIRST_NAME $row2->LAST_NAME,<br><br>Welcome to SCBC. <br>Your account is now activated.<br><br>Here's your important information: <br>Username:<b> $row2->UNAME </b><br>Password:<b> $row2->PWORD </b><br><br>Thanks again for choosing SCBC! <br><br><br> Powered by SCBC
				
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<a href='http://scbcfurnitures.16mb.com/SCBC/' class='clink'><img src='' alt='SCBC Furnitures' border='0' id='sig-logo'></a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
				<span id='name-input' style='font-weight: bold;' class='txt'>Jerome Cabida</span>
				<span id='title-sep'>/</span> 
				<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
				<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:jeromecabida@gmail.com' style='color: #DDA200'>jeromecabida@gmail.com</a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>Excellent Home Decor</span>
				<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
				<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
				<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>210 Tandang Sora Avenue, 
				Tandang Sora. Quezon City 1116</span><br>
				<a id='website-input' class='link' href='http://scbcfurnitures.16mb.com/SCBC/' style='color: #DDA200'>http://scbcfurnitures.16mb.com/SCBC/</a>
				</p>
				<p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
				<p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
	";

				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   exit;
				}

				echo 'Message has been sent';
				
				$date = date("m/d/Y");
				$time = date("h:i:s A");
				
				$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$row2->UNAME','$row2->UNAME Account Activation','Activate','$date','$time')";
				$result4=mysql_query($query4);


?>
<script type='text/javascript'>alert('Account Activated.');</script>
<body style="background: #0099cc">

<body>

<?php
mysql_close($con);
header("Refresh: 0; URL='index.php"); 
}else{ 
echo"<script type='text/javascript'>alert('Wrong security code. Try Again.');</script>";
header("Refresh: 0; URL='activation.php");
}}
?>
	
		</div>
		<div class="container3">
		<!--Dont Delete-->
		</div>
		


</body>
