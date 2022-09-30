<html>
<head>
<title>Excellent Home Decor</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
</head>
<body bgcolor="#fff">
<center>
<div style="background: #2980b9; width:100%; height: 30px; padding-bottom:5px;">
<form action=mobilesearch.php method=POST >
<input type='text' name='search' style="background: #fff; width:70%; border: 2px solid #fff; margin-bottom:00px; padding-top:10px; padding-bottom: 10px;height:20px;"> 
<input type='image' src='../bg/mobilesearch.png' name=submit alt='Submit' value='submit' height='25px' width='25px' style='margin-bottom:0px;'>
</form>

</div>
<div class="productlist" style='color: #000;'>

<?php
				$search=$_POST['search'];
				
							
				$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
				mysql_select_db("ehd")or die("cannot select DB");
				$query="SELECT * FROM ehd_stocks WHERE NAME LIKE '%$search%'";
				$result=mysql_query($query);
				if(mysql_num_rows($result)>0){
				echo"<div style='margin-top:10px; box-shadow: 0 1px 3px rgba(0,0,0,0.30); color:#000; border: 1px solid #fff; background-color: #fff; width:90%; padding-top: 10px; padding-bottom: 10px; text-decoration: none;'> SEARCH RESULTS: $search </div> <br><br>";
				while($row=mysql_fetch_object($result)){
					echo"";
					echo "				
					
					<div style='text-align: left;border-bottom: 1px solid #eee; background:#fff; width:75%; padding-top:10px; padding-bottom:10px;'>
						<table>
						<tr>
						<td><a href='mobileprodview.php?id=$row->PROID'><img src='../upload/$row->URLPIC' height='120px' width='120px' style='border-radius:80px' ></a>
						<td><a href='mobileprodview.php?id=$row->PROID' style=' text-decoration: none; color: #000; font:16px Segoe UI, Helvetica, sans-serif; '>$row->NAME<br><small>Php $row->PRICE /sqf <br>
							$row->TYPE</small></a>
						</table>
						</div><br>";}
					
					
					}else{
					echo"<br>
					<br>
					<div style='margin-top:10px; box-shadow: 0 1px 3px rgba(0,0,0,0.30); color:#000; border: 1px solid #fff; background-color: #fff; width:90%; padding-top: 10px; padding-bottom: 10px; text-decoration: none;'> $search is not found. Please try another keyword </div>";
					}
				?>
				<br>
				<br>
				<br>
			<form action="mobileprod.php">
	<input type='submit' style="box-shadow: 0 1px 3px rgba(0,0,0,0.30); color:#fff; border: 1px solid #0099cc; background-color: #0099cc; width:250px; height:40px; padding-top: 10px; padding-bottom: 10px; text-decoration: none;" value='BACK TO PRODUCTS'></form>
	
				
			
</div>		
</body>
</html>