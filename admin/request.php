<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$uname = $_SESSION['uname'];
if(isset($uname)){
$name = $_SESSION['name'];
$usertype = $_SESSION['usertype'];

}else{
header("Refresh: 0; URL=../login.php"); 
}
?>
<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="../css/admin.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->
	<div class='header'>
	<!--Eto yung sa Logo-->
	<div class="logo">
		<a href="#" id=''></a>
	</div>
	<!--navigation bar-->
	
    <div class="menu">
	<div class="nav">
        <ul>  
			<li><a><b>Administrator Panel</b></a></li>
			<div class="user">			
            <li><a href="../logout.php">Logout</a></li>
			</div>
			
			<div>
		</ul>
    </div>
	</div>
	</div>
	<br>
	
	<div class="wholeContent">
		<div class='sidebar'>
		<table>
		<tr><th id='back'>
		<A HREF="menu.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
		<tr>
		<th>
		
		
			
		<tr>
		<th>
		
		
		
		
		<tr>
		<th>
		
		
		</table>
		</div>
		
		
		<div class='usercontent'>
			<?php
			if(!isset($_POST['submit'])){
				 
				include '../conn.php';
			
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='Pending'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){

				echo "<center><table width=100% >";
				echo "
				<tr><td align=left colspan=2><h3>Transactions</h3>
				";

			while($row=mysqli_fetch_object($result)){
				// $price = $row->TOTAL / $row->QUANTITY;
				// $uprice = $price;
				?>
				 <tr bgcolor='#262626'>				
								<th align='center' colspan=2 width='300px'><font size=4 color='white' >Transaction ID: <?php echo $row->TRANSID ?></font>
								</th>
								<th align='center' colspan=2><font size=4 color='white'>Date: <?php echo $row->DATE ?>
								<br>Time: <?php echo $row->TIME ?></font></th>
								<th align='center' colspan=3><font size=4 color='white'>Proof of Payment</font></th>
								<tr bgcolor='#ddd' width='300px'>
								<td align="center">Customer Name: <?php echo$row->CUSNAME ?></td>
								
									

									
								
							</td>
								<td align="center">Address: <?php echo $row->ADDRESS ?></td>
								<td align="center">Shipping Method: <?php echo $row->SHIPPING ?></td>
								<td align="center"><center>Status:
								<?php if($row->STATUS == 'Pending'){ ?>
								  Checking Payment<br><form action='request.php' method='POST'>
									<input type='hidden' name='dpaid' value='<?php echo $row->DOWN ?>'>
									<input type='hidden' name='transid' value='<?php echo $row->TRANSID ?>'>
									<input type='hidden' name='matid' value='<?php echo $row->MATERIAL_ID ?>'>
									<input type='hidden' name='stocks' value='<?php echo $row->QUANTITY ?>'>
									<input type='hidden' name='pname' value='<?php echo $row->PRONAME ?>'>
									<input type='hidden' name='ship' value='<?php echo $row->SHIPPING ?>'>
									<input type='hidden' name='TYPE' value='<?php echo $row->TYPE ?>'>
									<input type='submit' name='submit' value='Accept'><br>
									<input type='submit' name='submit' value='Cancel'>
									<input type='hidden' name='cid' value='<?php echo $row->CUSNAME ?>'>
								</form>
							</center>
						</td>
						<td align="center"><button class="show_proof" value="<?php echo $row->TRANSID ?>"><img src='../proof/<?php echo $row->PROOF ?>' width=100px height=100></button></td>
						<td align="center">
							<?php if ($row->TYPE == 'cart') { ?>
								<a href="request2.php?TRANSID=<?php echo $row->TRANSID; ?>" style="background-color: #000;color: #fff;padding: 10px;">View Order</a>
							<?php }else { ?>
								<a href="request3.php?TRANSID=<?php echo $row->TRANSID; ?>" style="background-color: #000;color: #fff;padding: 10px;">View Order</a>
							<?php } ?>
							
						</td>
					</tr>
							<?php	} ?>	
						</tr>
				<?php } ?>
				
				
				
				 </table></center>
			<?php }else{ ?>
				 <center><br>
							<img src='../bg/info.png' heigh=50px width=50px>
							<br><b>There is no order request.</a>
							<br><br>
							<br><br>
							<a href='javascript:history.back()' class='back'>Return</a></center>
		<?php	}

			?>
			
			<?php
			}else{
				 
				
			include '../conn.php';
			$submit = $_POST['submit'];
			$cid=$_POST['cid'];
			$pname=$_POST['pname'];
			$tid = $_POST['transid'];
			$matid = $_POST['matid'];
			$dpaid = $_POST['dpaid'];
			$stocks = $_POST['stocks'];
			$ship = $_POST['ship'];
			if($submit == 'Accept'){
				if($ship =='Pick Up'){
				$query="UPDATE talkshirt_orders SET
				DPAID='$dpaid',
				STATUS='On Process'
				WHERE TRANSID='$tid'";}
				else{
				$query="UPDATE talkshirt_orders SET
				DPAID='$dpaid',
				STATUS='On Process'
				WHERE TRANSID='$tid'";
				}
				$result=mysqli_query($con,$query) or die(mysql_error());
				$query3="SELECT * FROM (SELECT *,CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM talkshirt_users) base WHERE NAME='$cid'";
				$result3=mysqli_query($con,$query3) or die(mysql_error());
				$row3=mysqli_fetch_object($result3);
				// $tel=$row3->TELNUM;
				// $email=$row3->EMAIL;
				$msg="Thank you $cid for choosing talkshirt. Your Order is now on Process. Transaction ID: $tid";
				echo"<Center>Order Accepted! </center>";
				
				/*
				require('phpmailer/PHPMailerAutoload.php');

				$mail = new PHPMailer;

				$mail->isSMTP();       
				$mail->SMTPDebug = 2;
				$mail->Mailer = "smtp";                
				$mail->Host = 'smtp.gmail.com';  
				$mail->Port = 465;
				$mail->SMTPAuth = true;                               
				$mail->Username = 'talkshirtprinting@gmail.com';                          
				$mail->Password = 'talkshirt12345';   
				$mail->Priority = 1;
				$mail->addAddress($email); 
				                      
				$mail->SMTPSecure = 'ssl';                            
				
				$mail->From = 'talkshirtprinting@gmail.com';
				$mail->FromName = 'TALKSHIRT';
				           

				$mail->WordWrap = 50;                                 

				$mail->isHTML(true);                                 

				$mail->Subject = 'Excellent Home Decor';
				$mail->Body    = "Hello $cid,<br><br>Thanks for ordering $pname! <br>Your order is now on process, and thanks for paying the downpayment of P $dpaid.00 <br><b>Transaction ID: $tid</b><br>Thanks again for choosing talkshirt! <br><br><br> Powered by MESA
					<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
					<a href='http://excellenthomedecor.netai.net' class='clink'><img src='https://www.filepicker.io/api/file/E5GMIrfSFCR4Y7iM9Wrw/convert?w=150&amp;h=55&amp;fit=clip' alt='Excellent Home Decor' border='0' id='sig-logo'></a></p>
					<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
					<span id='name-input' style='font-weight: bold;' class='txt'>Einre Castillo</span>
					<span id='title-sep'>/</span> 
					<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
					<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:einrepaulcastillo@gmail.com' style='color: #DDA200'>einrepaulcastillo@gmail.com</a></p>
					<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
					<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>Excellent Home Decor</span>
					<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
					<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
					<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>210 Tandang Sora Avenue, 
					Tandang Sora. Quezon City 1116</span><br>
					<a id='website-input' class='link' href='http://excellenthomedecor.netai.net' style='color: #DDA200'>http://excellenthomedecor.netai.net</a>
					</p>
					<p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
					<p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
						";


				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   header("Refresh: 5; URL='request.php'");
				   exit;
				}

				echo 'Message has been sent';
				
				
				//sms start
				function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
				{           
                        $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
                        $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
                        $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
                        $url = "http://gateway.onewaysms.com.au:10001/".$query_string;
					$fd = @implode ('', file ($url));      
                      							
                }  
				gw_send_sms("API1LRJKW5YWD", "API1LRJKW5YWDD0YYS", "talkshirt-QC", $tel , $msg);
				//sms end
				
				
				
						*/
				
				
				header("Refresh: 1; URL='request.php'");
				}
			
			else if($submit == 'Cancel'){
			$query6="SELECT * FROM (SELECT *,CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM talkshirt_users) base WHERE NAME='$cid'";
				$result6=mysqli_query($con,$query6) or die(mysql_error());
				$row6=mysqli_fetch_object($result6);
				// $tel=$row6->TELNUM;
				// $email2=$row6->EMAIL;
				
				$query="UPDATE talkshirt_orders SET
				STATUS='Cancelled'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysql_error());


				if ($_POST['TYPE'] == 'Cart') {
					$query2="SELECT * FROM talkshirt_stocks WHERE MATID='$matid'";
					$result2=mysqli_query($con,$query2);
					if(mysqli_num_rows($result2)>0){
					$row=mysqli_fetch_object($result2);
					}
					
					$totalstocks = $row->STOCKS + $stocks;
					
					$query3="UPDATE talkshirt_stocks SET
					STOCKS='$totalstocks'
					WHERE MATID='$matid'";
					$result3=mysqli_query($con,$query3) or die(mysql_error());
				}
				
				
				
				echo"<Center>Order Cancelled!</center>";
	
				header("Refresh: 1; URL='request.php'");
				
				
				}
			}
			?>
		
		</div>
		<div class="proof_cover">
<div style="text-align: center;background-color: #fff;box-shadow: 0px 0px 10px rgba(0,0,0,0.2);padding-top: 20px;">
	<button class="close_proof" style="background-color: #fff;border: unset;box-shadow: 0px 0px 10px rgba(0,0,0,0.2);width: 50px;height: 50px;border-radius: 50%;font-weight: bold;">X</button>

				<div class="proof" style="background-color: #fff;height: 530px;width:300px;padding: 20px;">
				
			</div>
			</div>
			</div>
	<style>
			.proof_cover{
				opacity: 0;
				visibility: hidden;
				position: fixed;top: 0;left: 0;background-color: rgba(0,0,0,0.2);width: 100%;height: 100%;display: grid;place-items:center;
			}
			.proof_cover_show{
				opacity: 1;
				visibility: visible;
			}
		</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script>
			$('.show_proof').click(function(){
			
			$('.proof_cover').toggleClass('proof_cover_show')
				$.ajax({
					url:'transaction_proof.php',
					method: 'POST',
					cache: false,
					data:{TRANSID: $(this).val(),},
					success: function(data){
						$('.proof').html(data)
					}
				})
			})
			$('.close_proof').click(function(){
			
			$('.proof_cover').toggleClass('proof_cover_show')

			})
		</script>
</body>
</html>