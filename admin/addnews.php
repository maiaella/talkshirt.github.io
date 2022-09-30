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
		<h3>Manage News</h3>
			
			<?php 
			if(!isset($_POST['submit'])){
			?>
			<form action='addnews.php' method=POST> 
				<table width=400px id='newsad' cellpadding=10>

					<td>Title
					<td><input type=text size=40 name=title>
				<tr>
					<td>Content
					<td><textarea rows=10 cols=35 name=content></textarea>
					<br>
					<input type=submit name=submit value='Add This Article'>
				
			<?php
			}else{
			$title=$_POST['title'];
			$content=$_POST['content'];

			include '../conn.php';
						$query="INSERT INTO news(ID, TITLE, CONTENT, TIMESTAMP) VALUES (NULL, '$title', '$content', NOW());";
						mysql_query($query)or die ("Unable to perform query".mysql_error());
						mysql_close($con);
						echo"<br><h3>New Article Added!</h3>";
						echo"<br>You will redirected in 2 seconds";
						header("Refresh: 0; URL='news.php'");
			}
			?>
		</div>
	</div>
	
	
	
</body>
</html>