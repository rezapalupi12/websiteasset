<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}

if (isset($_POST['submit'])) {
	$unit_name = $_POST['unit_name'];
	$alamat = $_POST['alamat'];
	$koordinator = $_POST['koordinator'];
	$no_hp = $_POST['no_hp'];

	$sql = "SELECT * FROM units WHERE unit_name='$unit_name'";
	$result = mysqli_query($conn, $sql);

	if (!$result->num_rows > 0) {
		$sql = "INSERT INTO units (unit_name, alamat, koordinator, no_hp)
				VALUES ('$unit_name', '$alamat', '$koordinator', '$no_hp')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			echo "<script>alert('Selamat, Registrasi berhasil')</script>";
			$unit_name = "";
			$alamat = "";
			$koordinator = "";
			$no_hp = "";
		} else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
	} else {
            echo "<script>alert('Woops! unit Sudah Terdaftar.')</script>";
            $unit_name = "";
			$alamat = "";
			$koordinator = "";
			$no_hp = "";
}
}

If(isset($_POST['kembali'])){
	header("Location:register.php");
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style3.css">

	<title>Register Gardu Induk</title>
</head>
<body>
	<div class="container">
		<form action = "" method="POST" class="register-unit">
			<p class="register-text" style="font-size: 2rem; font-weight: 800;">Register Gardu Induk</p>
			<div class="input-group">
				<input type="text" placeholder="GI_name" name="unit_name" value="<?php echo $unitname; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="alamat" name="alamat" value="<?php echo $alamat; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="koordinator" name="koordinator" value="<?php echo $koordinator; ?>" required>
			</div>
			<div class="input-group">
				<input type="text" placeholder="kontak" name="no_hp" value="<?php echo $no_hp; ?>" required>
			</div>
			<div class="input-group">
				<button name ="submit" class="btn">Register Unit</button>
			</div>
		</form>
		<form action="" method="POST" class="back">
			<button name="kembali" class="kembali">Kembali</button>
		</form>
	</div>

</body>
</html>