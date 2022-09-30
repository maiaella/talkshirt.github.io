
<html>
<head>
<title>Excellent Home Decor</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />

</head>
<body bgcolor="#fff">

<center>
<?php
			$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
mysql_select_db("ehd")or die("cannot select DB");
			$query="SELECT ID, TITLE, DATE_FORMAT(TIMESTAMP,'%M %d, %Y %h %i %p') AS TIMESTAMP FROM news ORDER BY TIMESTAMP DESC";
			$result=mysql_query($query) or die("Unable to perform query".mysql_error());
			
			
			if(mysql_num_rows($result)>0){
				while($row=mysql_fetch_object($result)){
				echo"<br><div style='border-bottom: 1px solid #eee;'><form action='mobilenewsview.php'><input type=hidden name='id' value='$row->ID'><input type='submit' value='$row->TITLE 
Published: $row->TIMESTAMP' style='background-color: #fff; width:90%; border: 1px solid #fff; height:100px; margin-left: auto; margin-right: auto; text-align: left; padding-left: 3%; padding-top:15px; padding-bottom:15px; color:#000;'></form></div>";
				}
				}
				
			else{
			echo"<h3>NO AVAILABLE NEWS</h3>";}
			mysql_close($con);
								?>
		

</body>
</html>