<?php
include 'config.php';
error_reporting(0);
session_start();

if(isset($SESSION['username'])){
	header("Location:index2.php");
}
	$unit = $_GET['unit'];
	$asset = $_GET['asset'];
	$sn = $_GET['sn'];
if(isset($_POST['submit'])){
	$pengawas = $_POST['pengawas'];
	$penguji =$_POST['penguji'];
	$tanggal = $_POST['tanggal'];
	$unit = $_GET['unit'];
	$asset = $_GET['asset'];
	$sn = $_GET['sn'];
	
		$sql1 = "INSERT INTO list_maintenance (pengawas, penguji, tanggal, unit_name, asset_name, serial_number) VALUES ('$pengawas','$penguji','$tanggal','$unit','$asset','$sn')";
		$result1 = mysqli_query($conn,$sql1);
		header("Location: formrele.php?unit=" . $unit . "&asset=" . $asset . "&sn=" . $sn . "&pengawas=" .$pengawas."&tanggal=".$tanggal."&penguji=".$penguji);
}
if(isset($_POST['kembali'])){
	header("Location:hismaintenance.php?unit=".$unit."&asset=".$asset."&sn=".$sn);
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style6.css">

	<title>Maintenance</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="form">
			<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
			<?php 
				$judul = "Maintenance ". $asset ."  " . $sn . "<br>" . $unit;
				echo $judul; 
			?>
			<div class="input-group">
				<input type="text" placeholder="Pengawas" name="pengawas" value="<?php echo $pengawas;?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="Pelaksana" name="penguji" value="<?php echo $penguji;?>" required>
			</div>
			<div class="input-group">
				<input type="date" name="tanggal" value="<?php echo date("Y-m-d");?>" required>
			</div>
			<div class="input-group">
				<input type="text" name="unit" value="<?php echo $unit;?>" required>
			</div>
			<div class="input-group">
				<input type="text" name="asset" value="<?php echo $asset;?>" required>
			</div>
			<div class="input-group">
				<input type="text" name="sn" value="<?php echo $sn;?>" required>
			</div>
			<div class="input-group"> 
				<button name = 'submit' class='btn'>Lanjut</button><br>				
			</div>
		</form>
		<form action="" method="POST" class="kembali">
			<button name = 'kembali' class ='btn'>Kembali</button>
		</form>
</body>
</html>