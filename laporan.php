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


if(isset($_POST['laporan'])){
	$tanggal=$_POST['tanggal'];
	$sn1 = str_replace("/", "", $sn);
	$filename = $tanggal.'_'.$asset.'_'.$sn1.'_'.$unit;
	$location = 'C:/xampp/htdocs/tesweb/BA/'.$filename.'.pdf';
	//echo $filename;
	if(file_exists($location)){
	header("Content-type: application/octet-stream");
	header("Content-Length: " . filesize($location));
	header("Content-disposition: attachment; filename=".basename($location));
	header("conntet-description: File Transfer");
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header("Pragma: public");
	flush();
	readfile($location);	
	}else {
		echo "<script>alert('Tidak ada BA untuk tanggal tersebut')</script>";
	}	
}

if(isset($_POST['list'])){
	header("Location:history.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}
if(isset($_POST['kembali'])){
	header("Location:hismaintenance.php?unit=$unit&asset=$asset&sn=$sn");
}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style12.css">

	<title>Laporan Maintenance</title>
</head>
<body>
	<div class="container">
	<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
			<?php 
				$judul = "Laporan Maintenance"."<br>". $asset ."  " . $sn . "<br>" . $unit;
				echo $judul; 
			?></p>
			<table>
				<tr>
					<th width="100" text style="font-size: 2 rem;font-weight: 600;">Tanggal</th>
					<td width="5">:</td>
					<td style="font-size: 2 rem;font-weight: 500;"><input type="date" name="tanggal" value="<?php echo date("Y-m-d");?>" required></td>
				</tr>
			</table>
		<div class="input">
			<button name="laporan" class="btn">Download BA</button>
		</div>
		
	</form>
	<form action="" method="POST" class="list">
		<button name="list" class="btn">History Maintenance</button>
		<button name="kembali" class="btn">Kembali</button>
	</form>
	</div>
</body>
</html>