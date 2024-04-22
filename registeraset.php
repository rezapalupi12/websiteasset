<?php
include 'config.php';
error_reporting(0);
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}

if (isset($_POST['submit'])) {
	$unit_name = $_POST['unit_name'];
	$asset_name = $_POST['asset_name'];
	$merk = $_POST['merk'];
	$type = $_POST['type'];
	$serial_number = $_POST['serial_number'];
	$bay = $_POST['bay'];
	//echo $bay;
	$sql = "SELECT * FROM assets WHERE serial_number='$serial_number'";
	$result = mysqli_query($conn, $sql);

	if (!$result->num_rows > 0){
			$redirectUrl = "Location: regdetailasset.php?unit=" . urlencode($unit_name) . "&asset=" . urlencode($asset_name) . "&sn=" . urlencode($serial_number) . "&merk=" . urlencode($merk) . "&type=" . urlencode($type) . "&bay=" . urlencode($bay);
    		header($redirectUrl);
		}
	else {
		echo "<script>alert('Woops! asset Sudah Terdaftar.')</script>";
		$unit_name = "";
		$asset_name = "";
		$merk = "";
		$type = "";
		$serial_number = "";
		$bay = "";
	}
}

If(isset($_POST['kembali'])){
	header("Location: register.php");
}
?>

<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style4.css">
	<title>Register Asset</title>
</head>
<body>
	<div class = "container">
		<form action="" method="POST" class="register-aset">
			<p class="register-text" style="font-size: 2rem; font-weight: 800;">Register Asset</p>
			<div class="custom-select">
				
				<select name="unit_name" required>
					<option value="">-- Pilih GI --</option>
						<?php
						include 'config.php';
						$sql2 = mysqli_query($conn, "SELECT * FROM units order by unit_name asc");?>
						<?php if(mysqli_num_rows($sql2) > 0){; ?>
						<?php while ($row = mysqli_fetch_array($sql2)) {;?>
						<option><?php echo $row['unit_name']; ?></option>
						<?php };?>
						<?php };?>
				</select>		
			</div>
			<div class="custom-select">
				<select name="asset_name" required>
				<option value="">-- Pilih Asset--</option>
				<option >Rele UFR</option>
				<option >Rele Island</option>
				<option >Rele OLS</option>
				<option >Rele OGS</option>
				<option >Rele UPLS</option>
				<option >DFR</option>
				<option >Master Trip</option>
			</select>	
			</div>
			<div class="input-group">
				<input type="text" placeholder="merk" name="merk" value="<?php echo $merk;?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="type/Model" name="type" value="<?php echo $type;?>" required>
			</div>
			<div class ="input-group">
				<input type="text" placeholder="serial_number" name="serial_number" value="<?php echo $serial_number;?>" required>
			</div>	
			<div class ="input-group">
				<input type="text" placeholder="bay/line" name="bay" value="<?php echo $bay;?>" required>
			</div>			
			<div class="input-group">
				<button name="submit" class="btn">Next</button>
			</div>
		</form>
		<form action="" method="POST" class="back">
			<button name="kembali" class="kembali">Kembali</button>
		</form>

	</div>

</body>
</html>