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

		
		</table>
		</div>
		
		
		<div class='usercontent2'>
		
		<h3><b>Sales Report</b></h3>
		
		<center><table width=100%>
				<td  colspan=3><b>Filter: </b><a href='salesreport.php'>View All</a>
											<a href='salesreport.php?status=today'>Today</a>
											<a href='salesreport.php?status=monthly'>Monthly</a>
											
											<br>
											<br>
				</td>
			
				
				<?php
				
				include '../conn.php';
				date_default_timezone_set('Asia/Manila');
				$date = date("m/d/Y");
				$overall=0;
				$quanall=0;
			
				if(isset($_GET['status'])){
					$status=$_GET['status'];
					}
					if(isset($status)){
						if($status=='today'){
							// $query="SELECT * FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID WHERE DATE='$date' AND STATUS='Delivered'";

							$query="SELECT *,c.PROID AS c_PROID FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID INNER JOIN talkshirt_stocks s ON c.PROID=s.PROID WHERE o.DATE='$date' AND o.STATUS='Delivered'";
							
							$result=mysqli_query($con,$query);
							if(mysqli_num_rows($result)>0){
								echo "
									
									 
									<tr bgcolor='#262626'>		
									<th align='center' width='300px'><font size=4 color='red' >Date
									<th align='center' width='300px'><font size=4 color='red' >Product
									<th align='center' width='300px'><font size=4 color='red' >Quantity
									<th align='center' width='300px'><font size=4 color='red' >Amount
									";
					 
								while($row=mysqli_fetch_object($result)){
									
									
									$whatday = explode('/',$row->DATE);
									$mnt = date("m");
									$dy = date("d");
									$yr = date("Y");
									
										$overall = $overall+$row->TOTAL;
										$quanall = $quanall+$row->QUANTITY;
										$price = $row->TOTAL / $row->QUANTITY;
										
										echo"
										<tr bgcolor='#ddd'>
										<td>$row->DATE 
										<td>$row->NAME
										<td align='right'>$row->QUANTITY
										<td align='right'>$row->TOTAL
										
										";
								}
								
								echo"
								<tr bgcolor='#ddd'>
									<th colspan=2 align='right'>Total:
									<th align='right'>$quanall pc/s
									<th align='right'>Php $overall.00
									
								</table>";
							}else{
							echo"</table><center>NO SALES RECORD</center>";
							}
							
							
						}



// echo date('Y-m-t', strtotime());
						else if($status=='monthly'){
							  $first = date('m/d/Y', strtotime('first day of this month'));
							  $last = date('m/d/Y', strtotime('last day of this month'));
							// $query="SELECT * FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID WHERE STATUS='Delivered'";
							$query="SELECT *,c.PROID AS c_PROID FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID INNER JOIN talkshirt_stocks s ON c.PROID=s.PROID WHERE o.DATE BETWEEN '".$first."' AND '".$last."' AND o.STATUS='Delivered'";
							
							$result=mysqli_query($con,$query);
							if(mysqli_num_rows($result)>0){
								echo "
									
									 
									<tr bgcolor='#262626'>		
									<th align='center' width='300px'><font size=4 color='red' >Date
									<th align='center' width='300px'><font size=4 color='red' >Product
									<th align='center' width='300px'><font size=4 color='red' >Quantity
									<th align='center' width='300px'><font size=4 color='red' >Amount
									";
					 
								while($row=mysqli_fetch_object($result)){
									
									
									$whatday = explode('/',$row->DATE);
									$mnt = date("m");
									$dy = date("d");
									$yr = date("Y");
									
									if($whatday[0] == $mnt && $whatday[2] == $yr){
										
										
										$overall = $overall+$row->TOTAL;
										$quanall = $quanall+$row->QUANTITY;
										$price = $row->TOTAL / $row->QUANTITY;
										
										echo"
										<tr bgcolor='#ddd'>
										<td>$row->DATE 
										<td>$row->NAME
										<td align='right'>$row->QUANTITY
										<td align='right'>$row->TOTAL
										
										";
									}
								}
								
								echo"
								<tr bgcolor='#ddd'>
									<th colspan=2 align='right'>Total:
									<th align='right'>$quanall pc/s
									<th align='right'>Php $overall.00
									
								</table>";

						
							}else{
							echo"</table><center>NO SALES RECORD</center>";
							}
						}
						
				}else{
					$query="SELECT *,c.PROID AS c_PROID FROM talkshirt_orders o INNER JOIN talkshirt_cart c ON o.TRANSID=c.TRANSID INNER JOIN talkshirt_stocks s ON c.PROID=s.PROID WHERE o.STATUS='Delivered'";
					
					$result=mysqli_query($con,$query);
					if(mysqli_num_rows($result)>0){
						echo "
							
							 
							<tr bgcolor='#262626'>		
							<th align='center' width='300px'><font size=4 color='red' >Date
							<th align='center' width='300px'><font size=4 color='red' >Product
							<th align='center' width='300px'><font size=4 color='red' >Quantity
							<th align='center' width='300px'><font size=4 color='red' >Amount
							";
			 
						while($row=mysqli_fetch_object($result)){
							
							$overall = $overall+$row->TOTAL;
							$quanall = $quanall+$row->QUANTITY;
							$price = $row->TOTAL / $row->QUANTITY;
							
							$whatday = explode('/',$row->DATE);
							
							
							echo"
							<tr bgcolor='#ddd'>
							<td>$row->DATE 
							<td>$row->NAME
							<td align='right'>$row->QUANTITY
							<td align='right'>$row->TOTAL
							
							";
							
						}
						
						echo"
						<tr bgcolor='#ddd'>
							<th colspan=2 align='right'>Total:
							<th align='right'>$quanall pc/s
							<th align='right'>Php $overall.00
							
						</table>";
					}else{
					echo"</table><center>NO SALES RECORD</center>";
					}
				}
				
				
			
				
				?>
				
		</center>
		
		</div>
	
</body>
</html>