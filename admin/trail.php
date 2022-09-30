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
			<center><table width=100%>
				<tr><td align=left><h1><b>Audit Trail</h1>
				<td  colspan=3><b>Filter Activities: </b>
											<br><br><a href='trail.php'>View All</a>
											<a href='trail.php?category=Log In'>Log In</a>
											<a href='trail.php?category=Order'>Order</a>
											<a href='trail.php?category=Block'>Block</a>
											
				<tr bgcolor='#red'>				
								<th align='left'><font size=4 color='white' >Activity No.
								<th align='left'><font size=4 color='white' >User Name
								<th align='left'><font size=4 color='white' >Activity
								<th align='left'><font size=4 color='white' >Date
								<th align='left'><font size=4 color='white' >Time
								
		
			<?php
			if(!isset($_POST['submit'])){
				include '../conn.php';
			
			if(isset($_GET['category'])){
				$category=$_GET['category'];
				}
			if(isset($category)){
				if($category=='Log In'){
					$query="SELECT * FROM talkshirt_trail WHERE CATEGORY='Log In' ORDER BY ID DESC";
		
				}else if($category=='Activate'){
					$query="SELECT * FROM talkshirt_trail WHERE CATEGORY='Activate' ORDER BY ID DESC";

				}else if($category=='Re-Activate'){
					$query="SELECT * FROM talkshirt_trail WHERE CATEGORY='Re-Activate' ORDER BY ID DESC";

				}else if($category=='Block'){
					$query="SELECT * FROM talkshirt_trail WHERE CATEGORY='Block' ORDER BY ID DESC";

				}else if($category=='Order'){
					$query="SELECT * FROM talkshirt_trail WHERE CATEGORY='Order' ORDER BY ID DESC";
					
				}else{
					$query="SELECT * FROM talkshirt_trail ORDER BY ID DESC";
				}
				
			}else{
			$query="SELECT * FROM talkshirt_trail ORDER BY ID DESC";}
			
			
			$result=mysqli_query($con,$query);
			if(mysqli_num_rows($result)>0){

			while($row=mysqli_fetch_object($result)){
				
				echo "
					  <tr bgcolor='#eee'>
								<td>$row->ID
								<td>$row->UNAME
								<td>$row->ACTIVITY
								<td>$row->DATE
								<td>$row->TIME";
												
				}
				
				
				
				
			}else{
				echo " <tr bgcolor='#eee'>
								<th colspan=5>NO ACTIVITY";
			}
			echo "</table></center>";

			?>
			
			<?php
			}else{
				}
			
			?>
		
		</div>
	
</body>
</html>