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
		<A HREF="sales.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>
		
		<tr>
		<th>
		<a href='hr.php'><img src='..\icons\hr.png' width=40px height=40px>
		<br><small>HR</small></a>
		
			
		<tr>
		<th>
		<a href='prod.php'><img src='..\icons\invent.png' width=40px height=40px>
		<br><small>Inventory</small></a>
		
		
		
		<tr>
		<th>
		<a href='..\index.php'><img src='..\icons\website.png' width=40px height=40px>
		<br><small>Website</small></a>
		
		</table>
		</div>
		
		
		<div class='usercontent'>
		
			<?php
			if(!isset($_POST['submit'])){
			$overall=0;
			$quanall=0;
			include 'conn.php';
			
			$query="SELECT * FROM talkshirt_orders WHERE STATUS='Delivered' OR STATUS='Received' BETWEEN '01-01-2016' and '12-31-2016'";
			$result=mysql_query($query);
			if(mysql_num_rows($result)>0){
			echo "
				<table>
				<tr><td align=left colspan=2><h3><b>Sales Report</b></h3>
				<h3><a href='../admin/monthly.php'><b></b></a></h3>
				<tr bgcolor='#262626'>		
				<th align='center' width='300px'><font size=4 color='red' >Date
				<th align='center' width='300px'><font size=4 color='red' >Product
				<th align='center' width='300px'><font size=4 color='red' >Quantity
				<th align='center' width='300px'><font size=4 color='red' >Amount
				";
 
			while($row=mysql_fetch_object($result)){
				
				$overall = $overall+$row->TOTAL;
				$quanall = $quanall+$row->QUANTITY;
				$price = $row->TOTAL / $row->QUANTITY;
				echo"
				<tr bgcolor='#ddd'>
				<td>$row->DATE 
				<td>$row->PRONAME
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
			echo"<center>NO SALES RECORD</center>";
			}
			}
		?>
			
		
		</div>
	
</body>
</html>