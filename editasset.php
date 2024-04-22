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
$sql = "SELECT * from assets where serial_number = '$sn'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if(isset($_POST['kembali'])){
	header("Location:detailasset.php?unit=$unit&asset=$asset&sn=$sn");
}

if(isset($_POST['submit'])){
if($asset == 'Rele UFR'){
	$bay = $_POST['bay'];
	$trafo = $_POST['trafo'];
	$status = $_POST['status'];
	$sql2 = "UPDATE ufr_detail SET trafo = '$trafo', status='$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
	}
if($asset == 'Rele OLS'){
	$bay = $_POST['bay'];
	$IP = $_POST['IP'];
	$IR = $_POST['IR'];
	$SW = $_POST['SW'];
	$ket = $_POST['ket'];
	$status = $_POST['status'];
	$sql2 = "UPDATE ols_detail Set IP = '$IP', setting_arus_relay = '$IR', setting_waktu = '$SW', keterangan = '$ket', status = '$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
	}
if($asset == 'Rele OGS'){
	$bay = $_POST['bay'];
	$IP = $_POST['IP'];
	$IR = $_POST['IR'];
	$SW = $_POST['SW'];
	$ket = $_POST['ket'];
	$status = $_POST['status'];
	$sql2 = "UPDATE ogs_detail Set IP = '$IP', setting_arus_relay = '$IR', setting_waktu = '$SW', keterangan = '$ket', status = '$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
	}
if($asset == 'Rele UPLS'){
	$bay = $_POST['bay'];
	$IP = $_POST['IP'];
	$IR = $_POST['IR'];
	$SW = $_POST['SW'];
	$ket = $_POST['ket'];
	$status = $_POST['status'];
	$sql2 = "UPDATE upls_detail Set IP = '$IP', setting_arus_relay = '$IR', setting_waktu = '$SW', keterangan = '$ket', status = '$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
	}
if($asset == 'Rele Island'){
	$bay = $_POST['bay'];
	$TS = $_POST['TS'];
	$SF = $_POST['SF'];
	$SW = $_POST['SW'];
	$status = $_POST['status'];
	$sql2 = "UPDATE island_detail Set tahapan_setting = '$TS',setting_frekuensi = '$SF', setting_waktu = '$SW', status = '$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
	}
if($asset == 'DFR'){
	$bay = $_POST['bay'];
	$IP = $_POST['IP'];
	$firmware = $_POST['firmware'];
	$status = $_POST['status'];
	$sql2 = "UPDATE island_detail Set IP = '$IP', firmware = '$firmware', status = '$status' where serial_number = '$sn'";
	$result2 = mysqli_query($conn,$sql2);
	$sql3 = "UPDATE assets set bay = '$bay' where serial_number = '$sn'";
	$result3 = mysqli_query($conn,$sql3);
		if ($result3){
			echo "<script>alert('Update asset telah berhasil.'); document.location='detailasset.php?unit=$unit&asset=$asset&sn=$sn';</script>";
		}
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
	<div class="container">
		<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
    			<?php
    				$judul = $asset . "  ". $sn . "<br>" . $unit;
    				echo $judul;
    			?></p>
			<?php
				if($asset=='Rele UFR'){
				$sql1= "SELECT * from ufr_detail where serial_number='$sn'";
				$result1=mysqli_query($conn,$sql1);
				$row1=mysqli_fetch_array($result1);
			?>
			
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Trafo</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="trafo" value="<?php echo $row1['trafo']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
			</table>
			<div class="input-group">
			<button name="submit" class="btn">Update Asset</button></div>
		<?php }
		if($asset=='Rele OLS'){
			$sql1 = "SELECT * from ols_detail where serial_number = '$sn'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
		?>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="IP" value="<?php echo $row1['IP']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="IR" rows="5" cols="40"><?php echo $row1['setting_arus_relay']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="SW" rows="5" cols="40"><?php echo $row1['setting_waktu']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="ket" value="<?php echo $row1['keterangan']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
				</table>
				<div class="input-group">
				<button name="submit" class="btn">Update Asset</button>
				</div>
		<?php }
		if($asset == 'Rele OGS'){
			$sql1 = "SELECT * from ogs_detail where serial_number ='$sn'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
		?>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="IP" value="<?php echo $row1['IP']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="IR" rows="5" cols="40"><?php echo $row1['setting_arus_relay']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="SW" rows="5" cols="40"><?php echo $row1['setting_waktu']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="ket" value="<?php echo $row1['keterangan']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
				</table>
				<div class="input-group">
				<button name="submit" class="btn">Update Asset</button>
				</div>
		<?php }
		if($asset == 'Rele UPLS'){
			$sql1 = "SELECT * from upls_detail where serial_number ='$sn'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
		?>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="IP" value="<?php echo $row1['IP']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="IR" rows="5" cols="40"><?php echo $row1['setting_arus_relay']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="SW" rows="5" cols="40"><?php echo $row1['setting_waktu']?></textarea><br></td>
				</tr>
					<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="ket" value="<?php echo $row1['keterangan']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
				</table>
				<div class="input-group">
				<button name="submit" class="btn">Update Asset</button>
				</div>
		<?php }
		if($asset =='Rele Island'){
			$sql1="SELECT * from island_detail where serial_number='$sn'";
			$result1=mysqli_query($conn,$sql1);
			$row1=mysqli_fetch_array($result1);
		?>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Tahapan Setting</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="TS" rows="5" cols="40"><?php echo $row1['tahapan_setting']?></textarea><br></td>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Frekuensi</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="SF" rows="5" cols="40"><?php echo $row1['setting_frekuensi']?></textarea><br></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><textarea name="SW" rows="5" cols="40"><?php echo $row1['setting_waktu']?></textarea><br></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
				</table>
				<div class="input-group">
				<button name="submit" class="btn">Update Asset</button>
				</div>
		<?php }

		if($asset =='DFR'){
			$sql1 = "SELECT * from dfr_detail where serial_number = '$sn'";
			$result1 = mysqli_query($conn,$sql1);
			$row1 = mysqli_fetch_array($result1);
		?>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="bay" value="<?php echo $row['bay']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="IP" value="<?php echo $row1['IP']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Firmware</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="text" name="firmware" value="<?php echo $row1['firmware']?>" required></td>
				</tr>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><select name="status" required>
					<option value="">--Pilih--</option>
					<option>Enable</option>
					<option>Disable</option>
				</select></td>
				</tr>
				</table>
				<div class="input-group">
				<button name="submit" class="btn">Update Asset</button>
				</div>
		<?php }
		?>
	</form>
		<form action="" method="POST" class="back">
			<button name="kembali" class="kembali">Kembali</button>
		</form>
	</div>

</body>
</html>