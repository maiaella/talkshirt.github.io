<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
if(!isset($_POST['submit'])){


?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">

</head>
<body>
	<!--Header-->
	<div class='header'>
	<!--Eto yung sa Logo-->
	
	<!--navigation bar-->
    <div class="menu">
	<div class="nav">
        <ul><li><a href="index.php" id='logolink'></a></li>
			<li><a href="login.php"><b>Sign In</b></a><li>
			<li><a href="register.php"><b>Sign Up</b></a></li>
		</ul>
    </div></div>
	</div>
	<br>
	
	<div class='wholeContent'>
		<form action="forgot.php" method=POST>
		
		<h1>Forgot Password</h1>
		
		<div class='content'>
		
		<label>Email Address
		</label>
		<input type=text placeholder='Please enter your email address' name='email'>
			<input type=submit name=submit value='Submit' class=submit><br>
		
		</form>			
		</div>
		
		
<?php
}else{
$email=$_POST['email'];
include 'conn.php';
$query="SELECT * FROM ehd_users WHERE EMAIL='$email'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$row=mysql_fetch_object($result);


require '/phpmailer/class.phpmailer.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup server
$mail->Port = 465;
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'excellenthomedecor@yahoo.com';                            // SMTP username
$mail->Password = 'Mesaadmin00';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable encryption, 'ssl' also accepted
$recipient = $row->EMAIL;
$mail->From = 'excellenthomedecor@yahoo.com';
$mail->FromName = 'SCBC';
$mail->addAddress($recipient);               // Name is optional

$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'SCBC Furniture';
$mail->Body    = "Hello $row->FIRST_NAME $row->LAST_NAME,<br><br>Seems you've forgotten your password and your requesting for it. <br>Now here's your password: <b>$row->PWORD</b><br><br>Thank your for chosing SCBC.<br><br><br>Powered by SCBC
<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
<a href='http://scbcfurnitures.16mb.com/SCBC' class='clink'><Image ng Scbc></a></p>
<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
<span id='name-input' style='font-weight: bold;' class='txt'>Jerome Cabida</span>
<span id='title-sep'>/</span> 
<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>2
<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:jeromecabida@gmail.com' style='color: #DDA200'>jeromecabida@gmail.com</a></p>
<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>SCBC Furniture</span>
<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>Rizal Ave. Extension, cor. Royal Subd., Brgy. San Juan, Manila E Rd, Taytay, Rizal</span><br>
<a id='website-input' class='link' href='http://scbcfurnitures.16mb.com/SCBC' style='color: #DDA200'>http://scbcfurnitures.16mb.com/SCBC</a>
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

$msg="Hello $row->FIRST_NAME $row->LAST_NAME, Your EHD password is $row->PWORD *For your safety. After retrieving your password please delete this message immediately. Thank You";
				//sms start
				function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
				{           
                        $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
                        $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
                        $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
                        $url = "http://gateway.onewaysms.com.au:10001/".$query_string;
					$fd = @implode ('', file ($url));      
                      							
                }  
				gw_send_sms("API1LRJKW5YWD", "API1LRJKW5YWDD0YYS", "EHD-QC", $row->TELNUM , $msg);
				//sms end
				echo"<script type='text/javascript'>alert('Your password has been sent to your email or mobile phone.');</script>
<body style='background: #0099cc'>
<body>";
header("Refresh: 0; URL='index.php"); 
}else{
echo"<script type='text/javascript'>alert('No email or account found.');</script>";
header("Refresh: 0; URL='forgot.php"); 
}

				
?>


<?php
mysql_close($con);

}
?>
	
		
		</div>
		<div class="container3">
		<!--Dont Delete-->
		</div>
		


</body>
