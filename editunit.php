<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}
$unit=$_GET['unit'];
$sql = "SELECT * from units where unit_name = '$unit'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['kembali'])){
	header("Location:unitdetail.php?unit_name=$unit");
}

if(isset($_POST['submit'])){
	$alamat = $_POST['alamat'];
	$koordinator = $_POST['koordinator'];
	$kontak = $_POST['kontak'];
	$sql = "UPDATE units Set alamat = '$alamat', koordinator = '$koordinator', no_hp = '$kontak' where unit_name = '$unit'";
	$result = mysqli_query($conn,$sql);
		if ($result){
			echo "<script>alert('Update unit telah berhasil.'); document.location='unitdetail.php?unit_name=$unit';</script>";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style10.css">

	<title>Edit Asset</title>
</head>
<body>
	<?php $row = mysqli_fetch_array($result);?>
	<div class="container">
		<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
    			<?php
    				echo $unit;
    			?></p>
			
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Alamat</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="alamat" rows="3" cols="40"><?php echo $row['alamat']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Koordinator</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="koordinator" value="<?php echo $row['koordinator']?>" required></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Kontak</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="kontak" value="<?php echo $row['no_hp']?>" required></td>
				</tr>
			</table>
			<div class="input-group">
			<button name="submit" class="btn">Update Unit</button></div>
	</form>
		<form action="" method="POST" class="back">
			<button name="kembali" class="kembali">Kembali</button>
		</form>
	</div>

</body>
</html>