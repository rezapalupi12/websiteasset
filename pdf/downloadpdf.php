<?php
include 'config.php';

error_reporting(0);

session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}
$unit = $_GET['unit'];
$asset = $_GET['asset'];
$tanggal = $_GET['tanggal'];
$pengawas = $_GET['pengawas'];
$penguji = $_GET['penguji'];
$sn = $_GET['sn'];
$ratio = $_GET['ratio'];

if(isset($_POST['download'])){
	if($asset=='DFR'){
		header("Location:pdfdfr_download.php?unit=$unit&asset=$asset&sn=$sn&tanggal=$tanggal&pengawas=$pengawas&penguji=$penguji&ratio=$ratio");
	}
	else{
		header("Location:pdfrele_download.php?unit=$unit&asset=$asset&sn=$sn&tanggal=$tanggal&pengawas=$pengawas&penguji=$penguji&ratio=$ratio");
	}
	
}	

if(isset($_POST['kembali'])){
	header("Location:/tesweb/index2.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<img src="/tesweb/style/gi.jpg" alt="Watermark" class="watermark">
	<link rel="stylesheet" type="text/css" href="/tesweb/style/style5.css">

	<title>Laporan Maintenance</title>
</head>
<body>
	<style>
            .watermark {
    position: absolute;
    bottom: 0px;
    right: 0px;
    opacity: 0.5;
    width: 2000px;
    z-index: -1; /* To place the watermark behind other elements */

}
    </style>
<div class="container">

		<p class="form-text" style="font-size: 4 rem; font-weight: 800;">
    			<?php
    				$judul = "Laporan Maintenance" ."<br>" .$asset . "  ". $sn . "<br>" . $unit;
    				echo $judul."<br>";
    			?></p>
    	<form action="" method="POST" class="btn">
            <button name="download" class="download">Download Laporan</button>
            <button name="kembali" class="kembali">Home</button>
    	</form>
</body>
</html>