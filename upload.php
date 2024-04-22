<?php
	include 'config.php';
	error_reporting(0);
	session_start();
	if (isset($SESSION['username'])) {
	header("Location: index2.php"); }

	$nama_unit = $_GET['unit'];
	$nama_asset = $_GET['asset'];
	$sn = $_GET['sn'];
	if(isset($_POST['kembali'])){
		header("Location:hismaintenance.php?unit=".$nama_unit ."&asset=". $nama_asset. "&sn=" .$sn);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style8.css">
	<title>Upload BA</title>
</head>
<body>
	<div class="container">
		<form action="uploadcode.php?unit=<?php echo $nama_unit; ?>&asset=<?php echo $nama_asset; ?>&sn=<?php echo $sn; ?>" method="post" enctype="multipart/form-data" class="upload">
		<p class="upload1" style="font-size: 2rem;font-weight: 800;">Upload BA</p>
		<div class="uploadfile">
			<label class="heading" style="font-size: 1rem;font-weight: 500;">Pilih file <br></label>
			<div class="input-group">
  			<input type="file" name="fileToUpload" id="fileToUpload"></div>
  			<button name="submit" class="btn">Submit</button>
  		</div>
</form>
<form action="" method="POST" class="back">
	<button name="kembali" class="btn">Kembali</button>
	<label class="heading" style="font-size: 1rem;font-weight: 500;">Notes <br></label>
  	<label class="heading" style="font-size: 1rem;font-weight: 300;">Format Nama File: <br> Tanggal Maintenance_Nama Asset_Serial Number_Nama Unit <br></label>
</form>
</div>

</body>
</html>