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
		<div class='content'>
		<h6>Add Employee</h6>
		<?php
		if(!isset($_POST['submit'])){
	?>
		<div class='leftRow'>
		
		<form action='empadd.php' method='POST'>
		<label>First Name*</label>
		<input type=text placeholder='First Name' name=fname>
		<label>E-mail Address*</label>
		<input type=text placeholder='Your E-mail Address' name=email>
		<label>Username*</label>
		<input type=text placeholder='Username' name=user>
		</div>
		
		<div class='rightRow'>
		<label>Last Name*</label>
		<input type=text placeholder='Last Name' name=lname>
		<label>Contact Number*</label>
		<input type=text placeholder='Your Contact Number' name=contact>
		<label>Password*</label>
		<input type=password placeholder='Password' name=pass>
		</div>
		</div>
		
		<div class='content2'>
		<div class='leftRow'>
		<label>Birthday:</label>
		<select name="day">
			<option selected="selected" value="">Day</option>
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
		
		<select name="month">
			<option selected="selected" value="">Month</option>
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
		
		<input type=text placeholder='Year' name=year size=5 class='short'>
		
		<label>Gender:</label>
		<select name='gender'>
			<option value="selected" value=''>Choose</option>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	
		<label>Address</label>
		<textarea name='add' cols='34' rows='3' maxlength='100'></textarea>
		<br>
		<br>
		<input type=submit name=submit value='Done' class=submit>
		
		</div>
		<div class='rightRow'>
		<label>Job ID</label>
		<input type=text name=jobid placeholder='JOB ID'>
		<label>Admin Priveleges</label>
		<input type=checkbox name=admin value='YES' class=check>
		</div>
		</div>
		</form>
		</div>
		
		<?php
}else{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$gender=$_POST['gender'];
$user=$_POST['user'];
$pass=$_POST['pass'];
$day=$_POST['day'];
$month=$_POST['month'];
$year=$_POST['year'];
$add=$_POST['add'];
$jobid=$_POST['jobid'];
$bday = $month." ".$day." " . $year;
$STATUS = 1;
include '../conn.php';

$sql = "SELECT * FROM talkshirt_users WHERE UNAME='$user'";
$result = mysqli_query($con,$sql);
?>

	<!--Eto yung sa Logo-->
	<div class='wholeContent'>
		<?php
		if(mysqli_num_rows($result) > 0) {
		?>
		<h2>Failed!</h2>
		
		<div class='content'>
		<h3>Username is not available. <a href='empadd.php'>Click here to return</a></h3>
		</div>
		
		<?php }else{
			$query="INSERT INTO talkshirt_users (`ID`, `LAST_NAME`,`FIRST_NAME`, `EMAIL`, `TELNUM`, `UNAME`, `PWORD`, `GENDER`, `BDAY`, `ADDRESS`,`JOB_ID`,`USER_TYPE`,`BLOCK`,`STATUS`) 
			VALUES (null,'$lname','$fname','$email','$contact','$user','$pass','$gender','$bday','$add','$jobid','EMPLOYEE',0,'$STATUS')";
			$result=mysqli_query($con,$query)or die ("Unable to Perform Query !".mysql_error()); 
		?>
		<h2>Successful!</h2>
		
		<div class='content'>
		<h3>Employee Added</h3><br>
		</div>
		<?php header("Refresh: 0; URL='employees.php"); 
} ?>
	</div>
	
	<?php
}?>
	
</body>
</html>