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
		<A HREF="salesmenu.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
	
		
		</table>
		</div>
		
		
		<div class='usercontent'>
			<?php
			if(!isset($_POST['submit'])){
				 
				include '../conn.php';
			
			$query="SELECT *,cc.COLOR AS cc_COLOR, cc.id AS cc_id FROM talkshirt_orders o INNER JOIN talkshirt_customization_cart cc ON o.TRANSID=cc.TRANSID  WHERE o.TRANSID = '".$_GET['TRANSID']."' AND o.STATUS='Pending'";
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){

				echo "<center><table width=100% >";
				echo "
				<tr><td align=left colspan=2><h3>Transactions</h3>
				";

			while($row=mysqli_fetch_object($result)){
			
				?>
				<tr bgcolor='#262626'>				
								<th align='left' width='300px'><font size=4 color='white' >Transaction ID: <?php echo $row->TRANSID ?></font></th>
								<th align='left' colspan=2><font size=4 color='white'>Date: <?php echo $row->DATE ?>
								<br>Time: <?php echo $row->TIME ?></font></th>
								<th align='left' colspan=2><font size=4 color='white'>Payment Required: Php <?php echo $row->TOTAL ?>.00</font></th>
							
								<tr bgcolor='#ddd' width='300px'>
								<td>Customer Name: <?php echo$row->CUSNAME ?></td>
								
								
								<td>Prod. Name: Customize Shirt</td>
								<td>Color:<?php echo $row->cc_COLOR ?></td>
						
								<td>Shipping Method: <?php echo $row->SHIPPING ?></td>

								<td><button type="button" name="" id="view" value="<?php echo $row->cc_id; ?>">View</button></td>
								<tr bgcolor='#ddd'>
								<td width='300px' rowspan=4>Address:<?php echo $row->ADDRESS ?></td>
								
	
								<td colspan="3">Status:
								<?php if($row->STATUS == 'Pending'){ ?>
								Checking Payment<br><form action='request.php' method='POST'>
									<input type='hidden' name='dpaid' value="<?php echo $row->DOWN ?>">
									<input type='hidden' name='transid' value="<?php echo $row->TRANSID ?>">
									<input type='hidden' name='matid' value="<?php echo $row->MATERIAL_ID ?>">
									<input type='hidden' name='stocks' value="<?php echo $row->QUANTITY ?>">
									<input type='hidden' name='pname' value="<?php echo $row->PRONAME ?>">
									<input type='hidden' name='ship' value="<?php echo $row->SHIPPING ?>">
							
									<input type='hidden' name='cid' value='<?php echo $row->CUSNAME ?>'>
								</form>
								<?php } ?>
							</td>
						</tr>
																
					<tr bgcolor='#ddd'>
								<td colspan="3">Total: Php <?php echo $row->TOTAL ?>.00		</td>
								</tr>						
							</tr>
						</tr>
							
				<?php  } ?>
				
				
				
				</table></center>
			<?php }else{ ?>
				<center><br>
							<img src='../bg/info.png' heigh=50px width=50px>
							<br><b>There is no order request.</a>
							<br><br>
							<br><br>
							<a href='javascript:history.back()' class='back'>Return</a></center>
			<?php }

			?>
			
			<?php
			}else{
				 
				
			
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
				$tel=$row3->TELNUM;
				$email=$row3->EMAIL;
				$msg="Thank you $cid for choosing talkshirt. Your Order is now on Process. Transaction ID: $tid";
				echo"<Center>Order Accepted! </center>";
				
				
				
				
				header("Refresh: 1; URL='request.php'");
				}
			
			else if($submit == 'Cancel'){
			$query6="SELECT * FROM (SELECT *,CONCAT(FIRST_NAME,' ',LAST_NAME) AS NAME FROM talkshirt_users) base WHERE NAME='$cid'";
				$result6=mysqli_query($con,$query6) or die(mysql_error());
				$row6=mysqli_fetch_object($result6);
				$tel=$row6->TELNUM;
				$email2=$row6->EMAIL;
				
				$query="UPDATE talkshirt_orders SET
				STATUS='Cancelled'
				WHERE TRANSID='$tid'";
				
				$result=mysqli_query($con,$query) or die(mysql_error());
				
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
				
				echo"<Center>Order Cancelled!</center>";
				
				header("Refresh: 1; URL='request.php'");
				
				
				}
			}
			?>
		
		</div>

		<div class="customization_wrapper">
			<div class="customization">
				<button id="close_view" style="float: right;margin-bottom: 50px;">Close</button>
			 <div class="front_image" style="margin-top: 50px;"></div>
			 <div class="back_image"></div>
			</div>
		</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

		<script type="text/javascript">

			$('#view').click(function(){
				cc_id = $(this).val();

				$('.customization_wrapper').toggleClass('customization_wrapper_show')
				$.ajax({
					url:'front_image.php',
					type: 'POST',
					cache:false,
					data:{cc_id:cc_id,},
					success:function(data){
						$('.front_image').html(data)
					}
				})
			})
			$('#close_view').click(function(){
				cc_id = $(this).val();

				$('.customization_wrapper').toggleClass('customization_wrapper_show')
			})

		</script>
	
</body>
</html>
<style type="text/css">
	.customization_wrapper{
	background-color: rgba(0,0,0,0.2);
	width: 100%;
	height: 100%;
	position: fixed;
	top: 0;
	left: 0;
	bottom: 0;
	display: grid;
	place-items: center;
	opacity: 0;
	visibility: hidden;
}
.customization_wrapper_show{
	opacity: 1;
	visibility: visible;
}
.customization{
	width: 1000px;
	max-width: 100%;
	background-color: #fff;
	padding: 20px;
}
</style>