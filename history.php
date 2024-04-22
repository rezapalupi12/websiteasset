<?php
include 'config.php';

error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}
$unit = $_GET['unit'];
$asset = $_GET['asset'];
$sn = $_GET['sn'];

if(isset($_POST['kembali'])){
	header("Location:laporan.php?unit=$unit&asset=$asset&sn=$sn");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style13.css">

	<title>History Maintenance</title>
</head>
<body>
	<div class="container">
	<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
			
			<?php 
				$judul = "History Maintenance"."<br>". $asset ."  " . $sn . "<br>" . $unit;
				echo $judul."<br>"."<br>"; 
			?></p>

		<?php
		$sql = "SELECT * FROM list_maintenance where asset_name = '$asset' and serial_number = '$sn' order by id desc limit 0,6";
		$result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)> 0){
		?>
		<table>
			<tr>
				<th width="100">Tanggal Maintenance</th>
				<th width="150" style="text-align: right;">Action</th>
			</tr></table>
		<?php
		while($row = mysqli_fetch_array($result)){
		?>
			<table>
			<tr>
				<td width="150">
					<?php echo $row['tanggal']?>
				</td>
				<td width="170" style="text-align: right;">
					<form action="" method="POST" class="history">
                    	<input type="hidden" name="tanggal" value="<?php echo $row['tanggal'] ?>">
						<button name="his" class="btn">Download</button>
					</form>
					<?php

					if(isset($_POST['his'])){
       			 		$tanggal = $_POST['tanggal'];
						header("Location:hisdownload.php?unit=$unit&asset=$asset&sn=$sn&tanggal=$tanggal");
					}
					?>
				</td>
			</tr>
			</table> 
		
		<?php }  
		} else {
			echo "Asset belum dilakukan maintenance";
		}
		?>
	</form>
		<form action="" method="POST" class="kembali">
			<button name="kembali" class="kembali">Kembali</button>
		</form>
		
</body>
</html>