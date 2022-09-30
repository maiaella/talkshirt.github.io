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
		<div class='content'>

		<?php
		if(!isset($_POST['submit'])){
		$id=$_GET['id'];
		include 'conn.php';
		$query="SELECT * FROM talkshirt_colors WHERE MATERIAL_ID='$id'";
		$result=mysql_query($query);
		if(mysql_num_rows($result)>0){
		$row=mysql_fetch_object($result);
		}
		?>
		<h3>Update Stocks</h3>
		<form action='stocks.php' method="POST">
		<table>
		
		<tr>
			<td>Available Stocks: <td><?php echo $row->STOCKS ?>pc(s)
			<input type=hidden name=id value="<?php echo $row->MATERIAL_ID;?>">
			<input type=hidden name=stocks value="<?php echo $row->STOCKS;?>">
			<input type=hidden name=proid value="<?php echo $row->PROID;?>">
		<tr><td>Add Stocks:
			<td><input type="text" name="stocks1" placeholder="Add Stocks">
		<tr>
			<td><td><input type='submit' value='Update' name='submit'>
		</table>
<?php
}else{
$id=$_POST['id'];
$proid=$_POST['proid'];
$stocks=$_POST['stocks'];
$stocks1=$_POST['stocks1'];
include 'conn.php';
		$totalstocks = $stocks + $stocks1;
		$query="UPDATE talkshirt_colors
					SET
					STOCKS='$totalstocks'
					WHERE MATERIAL_ID='$id'";
					
		echo"<center><br>
							<img src='../bg/smile.png' heigh=50px width=50px>
							<br><b>$stocks1 successfuly added!</a>
							<br><br>
							<br><br>
							<a href='availcolors.php?id=$proid' class='back'>Return</a></center>";
		header("Refresh: 3; URL='availcolors.php?id=$proid'");
		mysql_query($query) or die("Unable to perform query".mysql_error());
		mysql_close($con);

}
?>		
		
		</div>
		
	
	
</body>
</html>