<style type="text/css">

body{
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
background: black;
}
#sss{
background-color:#FF0000;
}
a{
text-decoration:none;
font-family:Arial, Helvetica, sans-serif;
font-size:12px;
}
table { 
border-collapse: collapse;
text-decoration:none;
font-family:Arial, Helvetica, sans-serif;
font-size:15px;
 }
td { padding: .3em; border: 1px #ccc solid; }
#head { background: red; float:center; }
#eee { background: #fff;}
</style>
<center>
<a href="backup.php" id="sss">
<img src="backup.png" alt="backup" />
</a>
<br>
<br>
<a href="../index.php">Back</a>
<br />
<br />
Database Back-up
<br />
<table
<tr id="head">
<td>
File Name
</td>
<td>
Action
</td>
<td>
Delete
</tr>
<?php
// List the files
$dir = opendir ("./DB_backup"); 
while (false !== ($file = readdir($dir))) { 

	// Print the filenames that have .sql extension
	if (strpos($file,'.sql',1)) { 

	// Remove the sql extension part in the filename
	$filenameboth = str_replace('.sql', '', $file);
                        
	// Print the cells

		echo "<tr id='eee'>";
		echo '<td>'.$filenameboth.".sql".'</td>';
		echo "<td>"."<a href='DB_backup/" . $filenameboth . ".sql' class='view'>Download SQL</a>"."</td>";
		echo "</tr>";
		
	} 
} 
?>
</table>
