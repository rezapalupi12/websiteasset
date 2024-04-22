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
	$penguji =$_GET['penguji'];
	$tanggal = $_GET['tanggal'];
	$ratio = $_GET['ratio'];

	if($asset =='DFR'){
		if(isset($_POST['submit'])){
		if(isset($_POST['standby_negative_dfr'])){
			$sql = "INSERT into standby_negative_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into standby_negative_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['standby_positive_dfr'])){
			$sql = "INSERT into standby_positive_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into standby_positive_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['clam_ct_dfr'])){
			$sql = "INSERT into clam_ct_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into clam_ct_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['posisi_aux_dfr'])){
			$sql = "INSERT into posisi_aux_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into posisi_aux_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['pt_dfr'])){
			$sql = "INSERT into pt_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into pt_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['kebersihan_dfr'])){
			$sql = "INSERT into kebersihan_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql = "INSERT into kebersihan_dfr(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		$catatan = $_POST['catatan'];
		$result1 = mysqli_query($conn,"INSERT into catatan (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','$catatan')");

		if ($result){
		
			echo "<script>alert('Maintenance telah dilakukan.'); document.location='pdf/savepdfdfr.php?unit=$unit&asset=$asset&sn=$sn&tanggal=$tanggal&pengawas=$pengawas&penguji=$penguji&ratio=$ratio';</script>";
		
		}						
		}
	}
	else{
		if (isset($_POST['submit'])){

		if(isset($_POST['standby_negative'])){
			$sql ="INSERT into standby_negative(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into standby_negative(pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['standby_positive'])){
			$sql ="INSERT into standby_positive (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into standby_positive (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['tarikan_rangkaian'])){
			$sql ="INSERT into tarikan_rangkaian (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into tarikan_rangkaian (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['posisi_aux'])){
			$sql ="INSERT into posisi_aux (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into posisi_aux (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['terminal_rangkaian'])){
			$sql ="INSERT into terminal_rangkaian (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into terminal_rangkaian (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}
		if(isset($_POST['rangkaian_relay'])){
			$sql ="INSERT into rangkaian_relay (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','1')";
			$result = mysqli_query($conn,$sql);
		}else{
			$sql ="INSERT into rangkaian_relay (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','0')";
			$result = mysqli_query($conn,$sql);
		}

		$catatan = $_POST['catatan'];
		$result1 = mysqli_query($conn,"INSERT into catatan (pengawas, penguji, tanggal, unit_name, asset_name, sn, value) values ('$pengawas','$penguji','$tanggal', '$unit','$asset','$sn','$catatan')");

		if ($result){
		
			echo "<script>alert('Maintenance telah dilakukan.'); document.location='pdf/savepdfrele.php?unit=$unit&asset=$asset&sn=$sn&tanggal=$tanggal&pengawas=$pengawas&penguji=$penguji&ratio=$ratio';</script>";
		
		}
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
				$judul = "Maintenance ". $asset ."<br>" . $sn . "  " . $unit;
				echo $judul; 
				?></p>
			<?php
			if ($asset =='DFR'){
			?>
			<div class="input">
				<label class="heading" style="font-size: 1.2rem;font-weight: 800;">Pengecekan Wiring:</label>
				<input class="baris" type="checkbox" name="standby_negative_dfr"><label>Standby Negative 110 VDC AUX</label><br>
				<input class="baris" type="checkbox" name="standby_positive_dfr"><label>Standby Positive Indikasi</label><br>
				<input class="baris" type="checkbox" name="clam_ct_dfr"><label>Clam CT DFR</label><br>
				<input class="baris" type="checkbox" name="posisi_aux_dfr"><label>Posisi Aux Relay Input</label><br>
				<input class="baris" type="checkbox" name="pt_dfr"><label>Ukur Ratio VT</label><br>
				<input class="baris" type="checkbox" name="kebersihan_dfr"><label>Bersihkan DFR dan Panel</label><br><br>
				<label class="heading" style="font-size: 1.2rem;font-weight: 800;">Catatan</label>
				<textarea name="catatan" rows="10"></textarea><br>
				<button name = "submit" class="btn">Selesai</button>	
			<?php }
			else{
			?>
			<div class="input">
				<label class="heading" style="font-size: 1.2rem;font-weight: 800;">Pengecekan Wiring:</label>
				<input class="baris" type="checkbox" name="standby_negative"><label>Standby Negative Trip di Selektor</label><br>
				<input class="baris" type="checkbox" name="standby_positive"><label>Standby Positive Trip di Relay</label><br>
				<input class="baris" type="checkbox" name="tarikan_rangkaian"><label>Tarikan Rangkaian Trip Antar Panel</label><br>
				<input class="baris" type="checkbox" name="posisi_aux"><label>Posisi Aux Relay</label><br>
				<input class="baris" type="checkbox" name="terminal_rangkaian"><label>Periksa Terminal Rangkaian</label><br>
				<input class="baris" type="checkbox" name="rangkaian_relay"><label>Periksa Rangkaian Pada Relay</label><br><br>
				<label class="heading" style="font-size: 1.2rem;font-weight: 800;">Catatan</label>
				<textarea name="catatan" rows="8"></textarea><br>
				<button name = "submit" class="btn">Selesai</button>
			</div>
			<?php }
			?>
			
		</form>
	</div>
</body>
</htm