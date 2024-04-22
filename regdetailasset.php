<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}

$unit=$_GET['unit'];
$asset=$_GET['asset'];
$sn=$_GET['sn'];
$merk = $_GET['merk'];
$type = $_GET['type'];
$bay = $_GET['bay'];
//echo $bay;

if(isset($_POST['kembali'])){
	header("Location:registeraset.php");
}

if(isset($_POST['submit'])){
	$sql1 = "INSERT INTO assets (unit_name, asset_name, merk, type, serial_number,bay) VALUES ('$unit','$asset','$merk','$type', '$sn','$bay')";
	$result1 = mysqli_query($conn,$sql1);
	if($asset == 'Rele UFR'){
		$trafo=$_POST['trafo'];
		$status=$_POST['status'];
		$sql = "SELECT * FROM UFR_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO UFR_detail (unit_name, asset_name, serial_number, trafo,  status) VALUES ('$unit','$asset','$sn','$trafo','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}
	elseif ($asset == 'Rele OLS') {
		$status=$_POST['status'];
		$IR =$_POST['IR'];
		$SW =$_POST['SW'];
		$IP =$_POST['IP'];
		$ket=$_POST['ket'];
		$sql = "SELECT * FROM OLS_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO OLS_detail (unit_name, asset_name, serial_number, IP, setting_arus_relay, setting_waktu, keterangan, status) VALUES ('$unit','$asset','$sn','$IP', '$IR','$SW','$ket','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}
	elseif($asset == 'Rele UPLS'){
		$status=$_POST['status'];
		$IR =$_POST['IR'];
		$SW =$_POST['SW'];
		$IP =$_POST['IP'];
		$ket=$_POST['ket'];
		$sql = "SELECT * FROM UPLS_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO UPLS_detail (unit_name, asset_name, serial_number, IP, setting_arus_relay, setting_waktu, keterangan, status) VALUES ('$unit','$asset','$sn','$IP', '$IR','$SW','$ket','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}
	elseif($asset == 'Rele OGS'){
		$status=$_POST['status'];
		$IR =$_POST['IR'];
		$SW =$_POST['SW'];
		$IP =$_POST['IP'];
		$ket=$_POST['ket'];
		$sql = "SELECT * FROM OGS_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO OGS_detail (unit_name, asset_name, serial_number, IP, setting_arus_relay, setting_waktu, keterangan, status) VALUES ('$unit','$asset','$sn','$IP', '$IR','$SW','$ket','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}	
	elseif($asset == 'Rele Island'){
		$status=$_POST['status'];
		$TS =$_POST['TS'];
		$SF =$_POST['SF'];
		$SW=$_POST['SW'];
		$sql = "SELECT * FROM Island_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO Island_detail (unit_name, asset_name, serial_number, tahapan_setting,  setting_frekuensi, setting_waktu, status) VALUES ('$unit','$asset','$sn','$TS','$SF','$SW','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}
	elseif($asset == 'DFR'){
		$status=$_POST['status'];
		$IP =$_POST['IP'];
		$firmware =$_POST['firmware'];
		$sql = "SELECT * FROM DFR_detail WHERE serial_number='$sn'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0){ 
		$sql1 = "INSERT INTO DFR_detail (unit_name, asset_name, serial_number, IP, firmware, status) VALUES ('$unit','$asset','$sn','$IP', '$firmware','$status')";
		$result1 = mysqli_query($conn,$sql1);
		if($result1){
			echo "<script>alert('Asset berhasil didaftarkan'); document.location='index2.php';</script>";
		}}
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style8.css">
	<title>Register Asset</title>
</head>
<body>
<div class = "container">
		<form action="" method="POST" class="register-aset">
			<p class="register-text" style="font-size: 2rem; font-weight: 800;">Register Asset</p>
			<div class="select">
				<?php
					if ($asset == 'Rele UFR'){
					?>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Trafo:</label>
						<div class="input-group">
						<input type="text" name="trafo" value="<?php echo $trafo;?>" required>
						</div>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Status</label>
						<div class="custom-select">
						<select name="status" required>
						<option value="">-- Pilih Status--</option>
						<option >Enable</option>
						<option >Disable</option>
						</select>	
						</div>
						<div class="input-group">
						<button name="submit" class="btn">Register Asset</button>
						</div>
					<?php }
					if ($asset == 'Rele OLS' or $asset == 'Rele UPLS' or $asset == 'Rele OGS'){
					?>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">IP</label>
						<div class="input-group">
						<input type="text" name="IP" value="<?php echo $IP;?>" required>
						</div>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Setting Arus Relay</label><br>
						<textarea name="IR" rows="5" cols="40"></textarea><br>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Setting Waktu</label><br>
						<textarea name="SW" rows="5" cols="40"></textarea><br>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Keterangan</label>
						<div class="input-group">
						<input type="text" name="ket" value="<?php echo $ket;?>" required>
						</div>	
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Status</label>
						<div class="custom-select">
						<select name="status" required>
						<option value="">-- Pilih Status--</option>
						<option >Enable</option>
						<option >Disable</option>
						</select>	
						</div>
						<div class="input-group">
						<button name="submit" class="btn">Register Asset</button>
						</div>
					<?php }
					if ($asset == 'Rele Island'){
					?>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Tahapan Setting</label>
						<div class="input-group">
						<input type="text" name="TS" value="<?php echo $TS;?>" required>
						</div>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Setting Frekuensi</label>
						<textarea name="SF" rows="2" cols="40"><?php echo $SF?></textarea><br>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Setting Waktu</label>						
						<textarea name="SW" rows="2" cols="40"><?php echo $SW?></textarea><br>	
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Status</label>
						<div class="custom-select">
						<select name="status" required>
						<option value="">-- Pilih Status--</option>
						<option >Enable</option>
						<option >Disable</option>
						</select>	
						</div>
						<div class="input-group">
						<button name="submit" class="btn">Register Asset</button>
						</div>
					<?php }
					if ($asset == 'DFR'){
					?>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">IP</label>
						<div class="input-group">
						<input type="text" name="IP" value="<?php echo $IP;?>" required>
						</div>
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Firmware</label>
						<div class="input-group">
						<input type="text" name="firmware" value="<?php echo $firmware;?>" required>
						</div>	
						<label class="heading" style="font-size: 1rem; font-weight: 500;">Status</label>
						<div class="custom-select">
						<select name="status" required>
						<option value="">-- Pilih Status--</option>
						<option >Enable</option>
						<option >Disable</option>
						</select>	
						</div>
						<div class="input-group">
						<button name="submit" class="btn">Register Asset</button>
						</div>

					<?php }
					?>
				</div></form>
<form action="" method="POST" class="back">
			<button name="kembali" class="kembali">Kembali</button>
		</form>

			</div>

</body>
</html>