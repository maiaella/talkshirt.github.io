<?php
error_reporting(E_ALL ^ E_DEPRECATED);
session_start();
$id = $_SESSION['id'];
$name = $_SESSION['name'];
if(!isset($_POST['submit'])){

	include 'conn.php';
$query="SELECT * FROM talkshirt_users WHERE ID='$id'";
$result=mysql_query($query);
if(mysql_num_rows($result)>0){
$row=mysql_fetch_object($result);

$count=mysql_num_rows($result);
}

?>


<html>
<head>
<title>Talkshirt</title>
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body>

	<!--Header-->
<form action="updateprof.php?id=<?php echo $id?>" method=POST>
	<div class='profBanner'>
	
					<div class='profLogo'>
					<a href="index.php" id='logolink'></a>
					</div>	
					
					<div class='profLogout'>
					<a href="logout.php">Log Out</a>
					</div>	
					
					<div class='profCaption'>
					<center><img src='bg/person.png'><br>
					<table>
					<tr>
					<td style='color: #fff; font:30px Segoe UI Light, Helvetica, sans-serif;'>
					<?php echo "$row->FIRST_NAME $row->LAST_NAME" ?> 
					</table></center>
					</div>
					
					
	</div>
	
	<div class='profWhole'>
	
	<div class='profSidebar'>

		<a href='profile.php' id='activelink'>Profile Information</a>
		<br>
		<br>
		<a href='accountinfo.php' id='inactivelink'>Account</a>
		<br>
		<br>
		<a href='transactions.php' id='inactivelink'>Transactions</a>
		
	</div>
	
	<div class='profContent'>
		<e1>Update Profile Information</e1>
		<br>
		<hr>
		<table>
		<tr><td><b>First Name: </b>
			<td width='150px'><input type=hidden name=id value="<?php echo $row->ID;?>">
			<input id='updateprof' type=text name=fname value="<?php echo $row->FIRST_NAME;?>">
			<td><b>Last Name: </b>
			<td><input id='updateprof' type=text name=lname value="<?php echo $row->LAST_NAME;?>">
					
		<tr><td><b>Gender: </b>
			<td width='150px'>
			<select name='gender' id='updategen'>
			<option value='<?php echo $row->GENDER;?>'><?php echo $row->GENDER;?></option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
			</select>
			
		<tr><td><b>E-Mail: </b>
			<td width='150px'>
			<input id='updateprof' type=text placeholder='Your E-mail Address' value='<?php echo $row->EMAIL;?>' name=email>
			
		<td><b>Contact#: </b>
			<td width='150px'>
			<input id='updateprof' type=text placeholder='Your Contact Number' value='<?php echo $row->TELNUM;?>' name=contact>

		<tr><td><b>Birthday: </b>

			
			<td>
			<?php list($d, $m, $y)=explode(" ",$row->BDAY); ?>
		<select name="month" id='updateprof'>
			<option selected="selected" value="<?php echo $m; ?>"><?php echo $m; ?></option>
			<option value="January">January</option>
			<option value="February">February</option>
			<option value="March">March</option>
			<option value="April">April</option>
			<option value="May">May</option>
			<option value="June">June</option>
			<option value="July">July</option>
			<option value="August">August</option>
			<option value="September">September</option>
			<option value="October">October</option>
			<option value="November">November</option>
			<option value="December">December</option>
		</select>
		<td>
		<select id='updateshort' name="day">
			<option selected="selected" value="<?php echo $d; ?>"><?php echo $d; ?></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
		</select>
		
		<td>
		<input id='updateshort' type=text placeholder='Year' name=year size=5 class='short' value=<?php echo $y; ?>>
		
		</table>
		<br>
		<input type='submit' name='submit' value='Update'>
	</div>
	
	</div>
	</form>
	<?php
}else {

$id=$_POST['id'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$bday = $month." ".$day." " . $year;
include 'conn.php';
$query="UPDATE talkshirt_users
			SET
			FIRST_NAME='$fname',
			LAST_NAME='$lname',
			EMAIL='$email',
			TELNUM='$contact',
			GENDER='$gender',
			BDAY='$bday',
			WHERE ID='$id'";
mysql_query($query) or die("Unable to perform query".mysql_error());
$_SESSION['name']=$name;
mysql_close($con);
header("Refresh: 0; URL='profile.php"); 
}
?>	
		
	<br>
	
		

</body>
</html>