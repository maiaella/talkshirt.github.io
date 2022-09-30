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
		<A HREF="transaction.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		

		
		
		

		
		</table>
		</div>
		
		
		<div class='usercontent2'>
			<center><table width=100%>
				<tr><td align=left><h3>Transactions</h3>
				<td  colspan=3><b>Filter: </b><a href='transaction.php'>View All</a>																						
											<a href='transaction.php?status=On Process'>On Process</a>
											<a href='transaction.php?status=Received'>Received</a>
											<a href='transaction.php?status=Delivered'>Delivered</a>
											<a href='transaction.php?status=Cancelled'>Cancelled</a>
		
			<?php
			if(!isset($_POST['submit'])){
				 
				include '../conn.php';
			
			if(isset($_GET['status'])){
				$status=$_GET['status'];
				}
			if(isset($status)){
				if($status=='On Process'){
					$query="SELECT * FROM talkshirt_orders WHERE STATUS='On Process' ORDER BY TRANSID DESC";
				}else if($status=='Received'){
					$query="SELECT * FROM talkshirt_orders WHERE STATUS='Received' ORDER BY TRANSID DESC";
				}else if($status=='Delivered'){
					$query="SELECT * FROM talkshirt_orders WHERE STATUS='Delivered' ORDER BY TRANSID DESC";
				}else if($status=='Cancelled'){
					$query="SELECT * FROM talkshirt_orders WHERE STATUS='Cancelled' ORDER BY TRANSID DESC";
				}else{
					$query="SELECT * FROM talkshirt_orders WHERE STATUS='On Process' OR STATUS='Delivered' OR STATUS='Cancelled' OR STATUS='Received'  ORDER BY TRANSID DESC";
				}
				
			}else{
			// $query="SELECT * FROM talkshirt_orders WHERE STATUS='On Process' OR STATUS='Delivered' OR STATUS='Cancelled' OR STATUS='Received'ORDER BY TRANSID DESC";
				$query="SELECT * FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID WHERE o.TRANSID = '".$_GET['TRANSID']."' ORDER BY o.TRANSID DESC";
		}
			
			
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){

			while($row=mysqli_fetch_object($result)){
				
				$price = $row->TOTAL / $row->QUANTITY;
				$uprice = $price;

				echo "<tr bgcolor='#262626'>				
								<th align='left' width='300px'><font size=4 color='white' >Transaction ID: <br>$row->TRANSID
								<th align='left' colspan=4><font size=4 color='white'>Date: $row->DATE<br>Time: $row->TIME
								
								<tr bgcolor='#ddd' width='300px'>
								<td>Customer Name: $row->CUSNAME
								<td>Product ID: $row->PROID
								
								<td>Shipping Method: $row->SHIPPING
								<td rowspan=5 align=center><img src='../upload/$row->IMAGE' width=120px height=120>
								<tr bgcolor='#ddd'>
								<td width='300px' rowspan=4>Address: $row->ADDRESS
								<td>Prod. Name: $row->PRONAME
								<td>Price: Php $uprice.00
								<td rowspan=4><center>Status: $row->STATUS <br>
								<form action='transaction.php' method='POST'>
								<input type='hidden' name='matid' value='$row->MATERIAL_ID'>
									<input type='hidden' name='stocks' value='$row->QUANTITY'>
								<input type='hidden' name='cname' value='$row->CUSNAME'>
								<input type='hidden' name='transid' value='$row->TRANSID'>
									<input type='hidden' name='ship' value='$row->SHIPPING'>
								 ";
									
							


								if($row->STATUS == 'Received'){
									echo "<input type='submit' name='submit' value='Delivered'><br>";
									}else{
									
									}
								
																
				echo "		</form><tr bgcolor='#ddd'>
								
								<td>Material ID: $row->MATERIAL_ID
								<td>Subtotal: Php $price.00
								
							<tr bgcolor='#ddd'>
								
								
								<td>Quantity: $row->QUANTITY pc(s)
								<tr bgcolor='#ddd'>
								<td>Color: $row->COLOR
								<td>Total: Php $row->TOTAL.00
								
							
								
							";
				
				
				}
				
				
				
				echo "</table></center>";
			}else{
				echo "<tr>
				<td colspan=5><center>
				<br>
				<br>
							<img src='../bg/sad.png' heigh=50px width=50px>
							<br><b>There is no transaction found.</a>
							<br><br>
							<br><br>
							<a href='javascript:history.back()' class='back'>Return</a></table></center>";	
	
			
			}

			
			
			
			
			?>
			
			<?php
			}else{
				 
				
			$submit = $_POST['submit'];
			$cname = $_POST['cname'];
			$matid = $_POST['matid'];
			$stocks = $_POST['stocks'];
			$tid = $_POST['transid'];
			$ship = $_POST['ship'];
			if($submit == 'Delivered'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Delivered'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysql_error());
				echo"<Center>Status Updated</center>";
				
				$query3="SELECT * FROM (SELECT *,CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM talkshirt_users) base WHERE NAME='$cname'";
				$result3=mysqli_query($con,$query3) or die(mysql_error());
				$row3=mysqli_fetch_object($result3);
				$tel=$row3->TELNUM;
				$email=$row3->EMAIL;
				require_once 'C:\xampp\htdocs\talkshirt\admin\phpmailer\PHPMailerautoload.php';
				
				define ('GUSER','talkshirtprinting@gmail.com');
				define ('GPWD','your password');


				$mail->Subject = 'talkshirt Furniture';
				$mail->Body    = "Hello $cname,<br><br>Thanks for your order!<br><b>Transaction ID: $tid</b><br>Your TALKSHIRT product is delivered or received.<br>Thanks again for choosing Talkshirts Tshirt Printing Services! <br><br><br> Powered by MESA
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
				   header("Refresh: 1; URL='transaction.php'");
				   exit;
				}

				echo 'Message has been sent';
				
				
				header("Refresh: 3; URL='transaction.php'");
				}
			
			else if($submit == 'Received'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Received'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysqli_error());
				echo"<Center>Status Updated</center>";
				
				$query3="SELECT * FROM (SELECT *,CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM talkshirt_users) base WHERE NAME='$cname'";
				$result3=mysqli_query($con,$query3) or die(mysqli_error());
				$row3=mysqli_fetch_object($result3);
				$tel=$row3->TELNUM;
				$email=$row3->EMAIL;
				require('phpmailer/PHPMailerAutoload.php');

				$mail = new PHPMailer;

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.mail.yahoo.com';  // Specify main and backup server
				$mail->Port = 587;
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'excellenthomedecor@yahoo.com';                            // SMTP username
				$mail->Password = 'Mesaadmin00';                           // SMTP password
				$mail->SMTPSecure = 'tsl';                            // Enable encryption, 'ssl' also accepted
				
				$mail->From = 'excellenthomedecor@yahoo.com';
				$mail->FromName = 'TALKSHIRT';
				$mail->addAddress($email);               // Name is optional

				$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'talkshirt ';
				$mail->Body    = "Hello $cname,<br><br>Thanks for your order!<br><b>Transaction ID: $tid</b><br>Thanks again for choosing talkshirt! <br><br><br> Powered by talkshirt
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<a href='http://talkshirt.16mb.com/talkshirt' class='clink'><img src='' alt='talkshirt Furniture' border='0' id='sig-logo'></a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px; color: rgb(153, 153, 153);'>
				<span id='name-input' style='font-weight: bold;' class='txt'>Jerome Cabida</span>
				<span id='title-sep'>/</span> 
				<span id='title-input' style='color: #999;' class='txt'>Web Developer</span><br>
				<span id='email-sep' class='txt'>/</span>  <a id='email-input' class='link email' href='mailto:jeromecabida@gmail.com' style='color: #DDA200'>jeromecabida@gmail.com</a></p>
				<p style='font-family: Helvetica, Arial, sans-serif; font-size: 12px; line-height: 14px;'>
				<span id='company-input' style='font-weight: bold; color: #999;' class='txt'>talkshirt Furniture</span>
				<span id='office-sep' style='color: #999;' class='txt'>Office: </span> <span id='office-input' style='color: #999;' class='txt'>0917-5188384</span> 
				<span id='fax-sep' style='color: #999;' class='txt'>/ Fax: </span> <span id='fax-input' style='color: #999;' class='txt'>781-3980</span>
				<span id='address-sep'><br></span> <span id='address-input' style='color: #999;' class='txt'>210 Tandang Sora Avenue, 
				Tandang Sora. Quezon City 1116</span><br>
				<a id='website-input' class='link' href='http://talkshirt.16mb.com/talkshirt' style='color: #DDA200'>http://talkshirt.16mb.com/talkshirt</a>
				</p>
				<p style='font-size: 12px; line-height: 14px; font-family: Helvetica, Arial, sans-serif;'>        </p>
				<p id='disclaimer-input' style='font-family: Helvetica, Arial, sans-serif; color: rgb(153, 153, 153); font-size: 11px; line-height: 14px;' class='txt'>This e-mail message may contain confidential or legally privileged information and is intended only for the use of the intended recipient(s). Any unauthorized disclosure, dissemination, distribution, copying or the taking of any action in reliance on the information herein is prohibited. E-mails are not secure and cannot be guaranteed to be error free as they can be intercepted, amended, or contain viruses.  Anyone who communicates with us by e-mail is deemed to have accepted these risks. Company Name is not responsible for errors or omissions in this message and denies any responsibility for any damage arising from the use of e-mail.  Any opinion and other statement contained in this message and any attachment are solely those of the author and do not necessarily represent those of the company.</p>
					";


				if(!$mail->send()) {
				   echo 'Message could not be sent.';
				   echo 'Mailer Error: ' . $mail->ErrorInfo;
				   header("Refresh: 1; URL='transaction.php'");
				   exit;
				}

				echo 'Message has been sent';
				
				header("Refresh: 0; URL='transaction.php'");
				}
						
			else if($submit == 'Cancel'){
				$query="UPDATE talkshirt_orders SET
				STATUS='Cancelled'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysql_error());
				
				$query2="SELECT * FROM talkshirt_colors WHERE MATERIAL_ID='$matid'";
				$result2=mysqli_query($con,$query2);
				if(mysqli_num_rows($result2)>0){
				$row=mysqli_fetch_object($result2);
				}
				
				$totalstocks = $row->STOCKS + $stocks;
				
				$query3="UPDATE talkshirt_colors SET
				STOCKS='$totalstocks'
				WHERE MATERIAL_ID='$matid'";
				$result3=mysqli_query($con,$query3) or die(mysqli_error());
				
				echo"<Center>Status Updated</center>";
				header("Refresh: 1; URL='transaction.php'");
				}
			}
			?>
		
		</div>
	
</body>
</html>