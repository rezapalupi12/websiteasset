<?php
	include 'config.php';
	error_reporting(0);
	session_start();

	if (isset($SESSION['username'])){
		header("Location:index2.php");
	} 
	$unit = $_GET['unit'];
	$asset = $_GET['asset'];
	$sn = $_GET['sn'];
	$pengawas = $_GET['pengawas'];
	$penguji = $_GET['penguji'];
	$tanggal = $_GET['tanggal'];

	if($asset == 'DFR'){
	if (isset($_POST['submit'])){
		$ratio=$_POST['ratio'];
		if(isset($_POST['set_val_dfr'])){
			$sql ="INSERT into setting_val_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into setting_val_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_alarm_dfr'])){
			$sql ="INSERT into cek_alarm_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_alarm_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_tegangan_dfr'])){
			$sql ="INSERT into cek_tegangan_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_tegangan_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_arus_dfr'])){
			$sql ="INSERT into cek_arus_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_arus_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_time_dfr'])){
			$sql ="INSERT into cek_time_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_time_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_bay_dfr'])){
			$sql ="INSERT into cek_bay_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_bay_dfr (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}

		header("Location: formwiring.php?unit=" . $unit . "&asset=" . $asset . "&sn=" . $sn . "&pengawas=" .$pengawas."&tanggal=".$tanggal."&penguji=".$penguji."&ratio=".$ratio);
	}

	}
	else{
	if (isset($_POST['submit'])){
		$ratio=$_POST['ratio'];

		if(isset($_POST['set_ufr'])){
			$sql ="INSERT into setting_ufr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into setting_ufr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_val'])){
			$sql ="INSERT into cek_value (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_value (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_tegangan'])){
			$sql ="INSERT into cek_tegangan (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_tegangan (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_frekuensi'])){
			$sql ="INSERT into cek_frekuensi (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_frekuensi (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_time'])){
			$sql ="INSERT into cek_time (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_time (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['cek_PT'])){
			$sql ="INSERT into cek_PT (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into cek_PT (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}

		header("Location: formwiring.php?unit=" . $unit . "&asset=" . $asset . "&sn=" . $sn . "&pengawas=" .$pengawas."&tanggal=".$tanggal."&penguji=".$penguji."&ratio=".$ratio);
	}}
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style7.css">

	<title>Maintenance</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="maintenance">
			<p class="form-text" style="font-size: 1.5rem; font-weight: 800;">
				<?php
				$judul = "Maintenance ". $asset ."  " . "<br>" .$sn . "  ". $unit;
				echo $judul; 
				?></p>
			<?php
			if($asset == 'DFR'){
			?>
			<div class="input">
				<label class="heading" style="font-size: 1.2rem; font-weight: 800;">Pengecekan DFR:</label>
				<input class="baris" type="checkbox" name="set_val_dfr"><label>Cek Setting Value DFR</label><br>	
				<input class="baris" type="checkbox" name="cek_alarm_dfr"><label>Cek Indikasi Alarm</label><br>
				<input class="baris" type="checkbox" name="cek_tegangan_dfr"><label>Cek Measurment Tegangan</label><br>
				<input class="baris" type="checkbox" name="cek_arus_dfr"><label>Cek Measurment Arus</label><br>
				<input class="baris" type="checkbox" name="cek_time_dfr"><label>Cek Time DFR</label><br>
				<input class="baris" type="checkbox" name="cek_bay_dfr"><label>Cek Nama Bay</label>
				<label class="heading" style="font-size: 1.2rem; font-weight: 800;">Ratio VT:</label>
				<input class="text" name="ratio" value="<?php echo $ratio;?>" required>
				<button name="submit" class="btn">Lanjut Pengecekan Wiring</button>
			</div>

			<?php }
			else {
			?>
			<div class="input">
				<label class="heading" style="font-size: 1.2rem; font-weight: 800;">Pengecekan Relay:</label>
				<input class="baris" type="checkbox" name="set_ufr"><label>Setting UFR Island Enable</label><br>
				<input class="baris" type="checkbox" name="cek_val"><label>Cek Value Setting</label><br>
				<input class="baris" type="checkbox" name="cek_tegangan"><label>Cek Measurment Tegangan</label><br>
				<input class="baris" type="checkbox" name="cek_frekuensi"><label>Cek Measurment Frekuensi</label><br>
				<input class="baris" type="checkbox" name="cek_time"><label>Cek Time Relay</label><br>
				<input class="baris" type="checkbox" name="cek_PT"><label>Cek Ratio VT</label><br><br>
				<label class="heading" style="font-size: 1.2rem; font-weight: 800;">Ratio VT:</label>
				<input class="text" name="ratio" value="<?php echo $ratio;?>" required>
				<button name="submit" class="btn">Lanjut Pengecekan Wiring</button>
			</div>
			<?php }
			?>	
		</form>

	</div>
</body>
</html>