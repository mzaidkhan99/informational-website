<!doctype html>
<html lang='en'>
<head>
	<meta charset = 'utf8'>
	<link rel="stylesheet" type="text/css" href="scr2.css">
</head>

<body>
<div class="container_srch">

	<?php
	include("conn.php");

	if(!isset($_POST['search'])){
		echo "There is an error searching this keyword <br>";
	}
	else{
		$sear_key = $_POST['search'];
		if ($sear_key == "") {
			
			header("location: scr.php");
		}
		else{	
			mysqli_select_db($connection, "db_web");
			
			$sql = "select upload.id, upload.filename, upload.authors_name as 'authors_name', upload.u_name as 'u_name',upload.sub_name as 'sub_name', upload.sub_code as 'sub_code', upload.year as 'year', upload.fileSize as 'fileSize' from upload where upload.u_name like '%$sear_key%' or upload.sub_name like '%$sear_key%' or upload.sub_code like '%$sear_key%' or upload.filename like '%$sear_key%'";
			$q = mysqli_query($connection, $sql);
			$res = mysqli_fetch_assoc($q);			
			
			if ($res == 0) {
				echo "No result found :( <br> Try seaching another keyword";
			}
			else{
				?>
				<p align="left">Showing result for <u><?php echo "$sear_key"; ?></u> </p>
				<center>
				<div class = 'table_srch'>
				<table>
					<thead>
						<tr>
							
							<td><u>u name</u></td>
							<td><u>sub name</u></td>
							<td><u>sub code</u></td>
							<td><u>year</u></td>
							<td class = "hidden"><u>authors name</u></td>
							<td class = "hidden"><u>Size</u></td>
							<td><u>Download</u></td>
						</tr>
					</thead>
				
				<?php

				do{
					?>
						
						<tbody>
							<tr>
								<td><?php if($res['u_name']!=""){	echo $res['u_name'];} else{ echo "-";} ?></td>
								<td><?php if($res['sub_name']!=""){	echo $res['sub_name'];} else{ echo "-";} ?></td>
								<td><?php if($res['sub_code']!=""){	echo $res['sub_code'];} else{ echo "-";} ?></td>
								<td><?php if($res['year']!=""){	echo $res['year'];} else{ echo "-";} ?></td>
								<td class = "hidden"><?php if($res['authors_name']!=""){	echo $res['authors_name'];} else{ echo "-";} ?></td>
								<td class = "hidden"><?php if($res['fileSize']!=""){	echo $res['fileSize'];} else{ echo "-";} ?></td>
								<td><a href="download2.php?id=<?php echo $res['id'];?>">Download</a></td>
							</tr>	
						</tbody>
					
					
					<?php
				}while($res = mysqli_fetch_assoc($q));
				
				?></table>
				</div>
				</center>
				<?php
					
			
			}
		}
	}
	?>

</div>
</body>
</html>