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
		<A HREF="users.php"><img src='..\icons\back.png' width=40px height=40px>
		<br><small>Back</small></a>

		
		</table>
		</div>
		<div class="content">
		<?php
			if(!isset($_POST['submit'])){
			$id=$_GET['id'];
			include 'conn.php';

			$query="SELECT * FROM talkshirt_users WHERE ID=$id";
			$result=mysqli_query($con,$query) or die("Unable to perform query".mysql_error());
			if(mysqli_num_rows($result)>0){
			$row=mysqli_fetch_object($result);}else{
			echo"<br>NO USER";
			}
			
			list($m, $d, $y)=explode(" ",$row->BDAY);
			?>
		<center>
		<img src='../upload/dp/<?php echo $row->URLPIC ?>' id=dispic2>
		<h3><b>Update Customer Information</b>
		<br>
		<br>
		
		
		<form action="userup.php?id=<?php echo $id?>" method=POST>	
		<table>
		<tr>
			<td>First Name: <td><input type=hidden name=id value="<?php echo $row->ID;?>"><input type=text placeholder='First Name' name='fname' value='<?php echo $row->FIRST_NAME?>'>
			<td>Last Name: <td><input type=text placeholder='Last Name' name='lname' value='<?php echo $row->LAST_NAME?>'>
		<tr>
			<td>Email Address: <td><input type=text placeholder='talkshirt@gmail.com' name=email value='<?php echo $row->EMAIL?>'>
			<td>Contact Number: <td><input type=text placeholder='Contact Number' name=contact value='<?php echo $row->TELNUM?>'>
		
		<tr>
			<td>Username: <td><input type=text placeholder='Username' name=uname value='<?php echo $row->UNAME?>'>
			<td>Password: <td><input type=password placeholder='Password' name=pword value='<?php echo $row->PWORD?>'>
		<tr><td><br>
		<tr>
		
			<td>Birthday: <td> <select name='day'>
			<option selected='selected' value=<?php echo $d?>><?php echo $d?></option>
			<option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			<option value='13'>13</option>
			<option value='14'>14</option>
			<option value='15'>15</option>
			<option value='16'>16</option>
			<option value='17'>17</option>
			<option value='18'>18</option>
			<option value='19'>19</option>
			<option value='20'>20</option>
			<option value='21'>21</option>
			<option value='22'>22</option>
			<option value='23'>23</option>
			<option value='24'>24</option>
			<option value='25'>25</option>
			<option value='26'>26</option>
			<option value='27'>27</option>
			<option value='28'>28</option>
			<option value='29'>29</option>
			<option value='30'>30</option>
			<option value='31'>31</option>
		</select>
		
		<select name='month'>
			<option selected='selected' value=<?php echo $m?>><?php echo $m?></option>
			<option value='January'>January</option>
			<option value='February'>February</option>
			<option value='March'>March</option>
			<option value='April'>April</option>
			<option value='May'>May</option>
			<option value='June'>June</option>
			<option value='July'>July</option>
			<option value='August'>August</option>
			<option value='September'>September</option>
			<option value='October'>October</option>
			<option value='November'>November</option>
			<option value='December'>December</option>
		</select>
		
		<input type=text placeholder='Year' name=year size=5 class='short' value=<?php echo $y?>>
			
		<tr>
			<td>Gender: <td><select name='gender'>
			<option selected='selected' value=<?php echo $row->GENDER?>><?php echo $row->GENDER?></option>
			<option value='Male'>Male</option>
			<option value='Female'>Female</option>
		</select>
		<tr><td>
		
		<tr>
			<td>Address:
			<td><textarea name='add1' cols='34' rows='3' maxlength='100'><?php echo $row->ADDRESS?></textarea>
			
		<tr>
			<td><td><br><input type=submit name=submit value='Update' class=submit>
		</table>
		</h3>
		</div>
		</form>
		
		<?php
		}else{
		$id=$_POST['id'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$email=$_POST['email'];
		$contact=$_POST['contact'];
		$gender=$_POST['gender'];
		$uname=$_POST['uname'];
		$pword=$_POST['pword'];
		$day=$_POST['day'];
		$month=$_POST['month'];
		$year=$_POST['year'];
		$add1=$_POST['add1'];
		$bday = $month." ".$day." " . $year;
		include 'conn.php';
		$query="UPDATE talkshirt_users
					SET
					FIRST_NAME='$fname',
					LAST_NAME='$lname',
					EMAIL='$email',
					TELNUM='$contact',
					GENDER='$gender',
					UNAME='$uname',
					PWORD='$pword',
					BDAY='$bday',
					ADDRESS='$add1'
					WHERE ID='$id'";
		mysqli_query($con,$query) or die("Unable to perform query".mysql_error());
		$_SESSION['name']=$fname;
		mysqli_close($con);
		header("Refresh: 1; URL='users.php"); 

		echo "<h3>Successfully Updated!</h3>";}
		?>
		</center>
		
	</div>	
</body>
</html>