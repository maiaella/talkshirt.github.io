<html>
<head>
<title>SCBC Furniture</title>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" media="all">
<link rel="icon" href="favicon.ico" />
<link rel="shortcut icon" type="Image/gif" href="animated_favicon1" />
 

</style>
</head>
<body bgcolor="#fff">
<center>
<div style="background: #2980b9; width:100%; height: 30px; padding-bottom:5px;">
<form action=mobilesearch.php method=POST >
<input type='text' name='search' style="background: #fff; width:70%; border: 2px solid #fff; margin-bottom:00px; padding-top:10px; padding-bottom: 10px;height:20px;"> 
<input type='image' src='../bg/mobilesearch.png' name=submit alt='Submit' value='submit' height='25px' width='25px' style='margin-bottom:0px;'>
</form>

</div>
<div class="productlist">
<?php
				
				//URL
				if(isset($_GET['type'])){
				$type=$_GET['type'];
				}else if(isset($_GET['price'])){
				$price=$_GET['price'];
				}else if(isset($_GET['view'])){
				$view=$_GET['view'];
				}
				$con=mysql_connect('localhost', 'root', '')or die("cannot connect"); 
				mysql_select_db("ehd")or die("cannot select DB");
				
				//type
				
					
				
					$query="SELECT * FROM ehd_stocks ";
					$result=mysql_query($query);
					if(mysql_num_rows($result)>0){
					
					
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
					
					
					}
					
				
				
				?>
				
			
</div>		
</body>
</html>