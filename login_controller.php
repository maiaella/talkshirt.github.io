<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once "sendphpmailer/PHPMailer.php";
require_once "sendphpmailer/SMTP.php";
require_once"sendphpmailer/Exception.php";
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
include 'conn.php';

if(isset($_POST['submit'])){

	if(!isset($_SESSION['att'])){
	$_SESSION['att']=0;
	}

	$uname=$_POST['user']; 
	$pass=$_POST['pass']; 


	$uname = stripslashes($uname);
	$pass = stripslashes($pass);
	$uname =trim($uname);
	$pass = trim($pass);



	$query="SELECT * FROM talkshirt_users WHERE UNAME='$uname' and PWORD='$pass' and STATUS = 1";
	$result=mysqli_query($con,$query)or die("maro");

	if(mysqli_num_rows($result)>=0){

		$row=mysqli_fetch_object($result);
		$count=mysqli_num_rows($result);

		$email = $row->EMAIL;

		if($count==1){

			if($row->BLOCK==0){
				
				$_SESSION['name']=$row->FIRST_NAME;
				$_SESSION['lname']=$row->LAST_NAME;
				$_SESSION['id']=$row->ID;
				
				$_SESSION['uname']=$row->UNAME;
				$_SESSION['urlpic']=$row->URLPIC;
				$name = $_SESSION['name'];
				$lname = $_SESSION['lname'];
				date_default_timezone_set('Asia/Manila');
				$date = date("m/d/Y");
				$time = date("h:i:s A");
				$_SESSION['usertype'] = strtoupper($row->USER_TYPE);

				$query="INSERT INTO talkshirt_logs (`ID`,`UNAME`,`Time_In`,`USER_TYPE`)VALUES(null,'$uname',NOW(),'$row->USER_TYPE')";
				$result=mysqli_query($con,$query);
				$query2="SELECT * FROM talkshirt_orders WHERE UNAME='$uname' AND STATUS='On Process'";
					
				$result2=mysqli_query($con,$query2);

				if(mysqli_num_rows($result2)>0){

					while($row2=mysqli_fetch_object($result2)){}
				header("Refresh: 0; URL='login.php'");
				}else{
					header("Refresh: 0; URL='login.php'");
				}

					$count3=mysqli_num_rows($result2);
					$query3="UPDATE talkshirt_users
					SET
					NOTIFICATIONS='$count3'
					WHERE UNAME='$uname'";
					$result3=mysqli_query($con,$query3) or die(mysql_error());
					$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$uname','$uname Logged In','Log In','$date','$time')";
					$result4=mysqli_query($con,$query4);

				if((strtoupper($row->USER_TYPE)=='ADMIN')||(strtoupper($row->USER_TYPE)=='SUPER ADMIN')||(strtoupper($row->USER_TYPE)=='EMPLOYEE')){
					
					header("Refresh: 0; URL='admin/menu.php'");

				}else if($row->USER_TYPE=='CUSTOMER'){

				    header("Refresh: 0; URL='index.php'");

				}else{

					header("Refresh: 0; URL='login.php'");

				}

				}else if($row->BLOCK==2){

					$_SESSION['name']=$row->FIRST_NAME;
					$_SESSION['id']=$row->ID;
					$_SESSION['uname']=$row->UNAME;
					$_SESSION['urlpic']=$row->URLPIC;
					$name = $_SESSION['name'];
					date_default_timezone_set('Asia/Manila');
					$date = date("m/d/Y");
					$time = date("h:i:s A");
					$_SESSION['usertype'] = strtoupper($row->USER_TYPE);


					$query="INSERT INTO talkshirt_logs (`ID`,`UNAME`,`Time_In`,`USER_TYPE`)VALUES(null,'$uname',NOW(),'$row->USER_TYPE')";
					$result=mysqli_query($con,$query);
					$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$uname','$uname Logged In','Log In','$date','$time')";
					$result4=mysqli_query($con,$query4);

					if((strtoupper($row->USER_TYPE)=='ADMIN')||(strtoupper($row->USER_TYPE)=='SUPER ADMIN')||(strtoupper($row->USER_TYPE)=='EMPLOYEE')){
						
						header("Refresh: 0; URL='admin/menu.php'");
					
					}else if($row->USER_TYPE=='CUSTOMER'){

					$CODE = rand(00000,99999);
					$query="UPDATE talkshirt_users SET CODE='$CODE' WHERE EMAIL='".$row->EMAIL."'";
					mysqli_query($con,$query) or die("Unable to perform query".mysqli_error());

					

					$mail = new PHPMailer();

					$mail->isSMTP();
					$mail->Host = "smtp.gmail.com";
					$mail->SMTPAuth = true;
					$mail->Username = "godegkola@gmail.com";
					$mail->Password = 'yyocuyrxaqqjjpsf';
					$mail->Port = 587;
					$mail->SMTPSecure = "tls";

					$mail->isHTML(true);
					$mail->setFrom("sorar384@gmail.com", 'TALKSHIRT LOGIN CODE');
					$mail->addAddress($email);
					$mail->Subject = "Talkshirt";
					$mail->Body = 'Click <a href="localhost/talkshirt/login_code.php?code='.$CODE.'">Here</a> to Direct Login your Account<br>CODE: '.$CODE.'<br> Thanks.';
					$mail->send();
						

		

					header("Refresh: 0; URL='login_code.php?code=".$CODE."'");

					}else{

						header("Refresh: 0; URL='login.php'");

					}

                }else{
					
					echo "<script type='text/javascript'>alert('Account Blocked! Redirecting to re-activation page.');</script>";
					$_SESSION['name']=$row->FIRST_NAME;
					$_SESSION['id']=$row->ID;
					header("Refresh: 0; URL='reactivation.php'");

				}

		}else{

			if($_SESSION['att']<2){

				$_SESSION['att']=$_SESSION['att']+1;
				echo "<script type='text/javascript'>alert('USERNAME and PASSWORD did not match! " . $_SESSION['att'] . " /3 attempts.');</script>";
				header("Refresh: 0; URL='login.php'");
			
			}else{

				$query2="SELECT * FROM talkshirt_users WHERE UNAME='$uname' and PWORD='$pass'";
				$result2=mysqli_query($con,$query2)or die("cannot select DB");
				
				if(mysqli_num_rows($result2)>=0){

					$row5=mysqli_fetch_object($result2);
				}

				date_default_timezone_set('Asia/Manila');
				$date = date("m/d/Y");
				$time = date("h:i:s A");
				echo "<script type='text/javascript'>alert('". $_SESSION['att'] . " /3 attempts. Account Blocked! Please try again !');</script>";

				$query="UPDATE talkshirt_users SET BLOCK=1 WHERE UNAME='$uname'";
				mysqli_query($con,$query) or die("Unable to perform query".mysqli_error());
				$query4="INSERT INTO talkshirt_trail (`ID`,`UNAME`,`ACTIVITY`,`CATEGORY`,`DATE`,`TIME`)VALUES(null,'$uname','$uname Blocked','Block','$date','$time')";
				$result4=mysqli_query($con,$query4);

				session_destroy();
				echo "<script type='text/javascript'>alert('Account Blocked! Please contact the Admin for Re-Activation !');</script>";
				header("Refresh: 0; URL='index.php'");

            }

		}
    }
}
?>