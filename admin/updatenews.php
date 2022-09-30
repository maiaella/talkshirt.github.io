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
		<A HREF="javascript:history.back()"><<img src='..\icons\back.png' width=40px height=40px>
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
			$id=$_GET['id'];
			include 'conn.php';


			$query="SELECT * FROM news WHERE ID=$id";
			$result=mysqli_query($con,$query) or die("Unable to perform query".mysqli_error());
			if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_object($result);}else{
			echo"<br>NO NEWSS!!";
			}

			?>
			<br>
			<hr>
			<br>
			<form action="updatenews.php?id=<?php echo $row->ID;?>" method=POST>
	
				<table width=400px id='newsad' cellpadding=10 >

					<td>Title<input type=hidden name=id value="<?php echo $row->ID;?>">
					<td><input type=text size=40 name=title value='<?php echo $row->TITLE ?>'>
				<tr>
					<td>Content
					<td><textarea rows=10 cols=35 name=content><?php echo $row->CONTENT ?></textarea>
					<br>
					<input type=submit name=submit value='Update'>
				
			<?php
			}else{
			$id=$_POST['id'];
			$title=$_POST['title'];
	
			$content=$_POST['content'];
			$con=mysqli_connect('sql202.epizy.com', 'epiz_31900555', '0OiVvHLEtbNFB5')or die("cannot connect"); 
			mysqli_select_db($con,"epiz_31900555_talkshirt")or die("cannot select DB");

			$query="UPDATE news
						SET
						TITLE='$title',
						CONTENT='$content',
						TIMESTAMP=NOW()
						WHERE ID='$id'";
			mysql_query($query) or die("Unable to perform query".mysql_error());



						mysql_close($con);
						echo"<br><h3>Successfully update news!</h3>";
						echo"<br>You will redirected in 2 seconds";
						header("Refresh: 0; URL='news.php'");
			}
			?>
		</div>
	</div>
	
	
	
</body>
</html>