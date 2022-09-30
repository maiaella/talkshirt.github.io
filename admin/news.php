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
		<A HREF="javascript:history.back()"><img src='..\icons\back.png' width=40px height=40px>
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
		<div class="content">
		<h3>Manage News: <a href='addnews.php'>Add news</a></h3>
			<table width=900px id="newsad" cellpadding=10>
			<tr><td><b>News Title<td><b>Date Published<td><b>Delete News
		<?php
include '../conn.php';

			$query="SELECT ID, TITLE, DATE_FORMAT(TIMESTAMP,'%M %d, %Y %h %i %p') AS TIMESTAMP FROM news ORDER BY TIMESTAMP DESC";
			$result=mysqli_query($con,$query) or die("Unable to perform query".mysql_error());
			
			
			if(mysqli_num_rows($result)>0){
				while($row=mysqli_fetch_object($result)){
				echo"<tr><td><a href='updatenews.php?id=$row->ID'>" .$row->TITLE. "</a><td>" .$row->TIMESTAMP. "<td><a href='deletenews.php?id=$row->ID'>Delete</a>";
				}
				}
				
			else{
			echo"<tr><th colspan=3><h3>NO AVAILABLE NEWS</h3>";}
			mysqli_close($con);
			echo"<tr><td colspan=3><small>Note: Click the title to update.</small>";
						echo"</table>";
			?>
		</div>
	</div>
	
	
	
</body>
</html>