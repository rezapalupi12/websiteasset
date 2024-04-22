<?php
include 'config.php';

error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}
$path = $_GET['path'];
$unit = $_GET['unit'];
//echo $path;
$location = 'C:/xampp/htdocs/tesweb/phpqrcode/'.$path;
//echo $location;
//echo $location;
if (file_exists($location)){
	header("Content-type: application/octet-stream");
	header("Content-Length: " . filesize($location));
	header("Content-disposition: attachment; filename=".basename($location));
	header("content-description: File Transfer");
	header('Expires: 0');
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header("Pragma: public");
	flush();
	readfile($location);
} else {
	echo "<script>alert('QR belum digenerate, Please contact admin');
	document.location='phpqrcode/qrcodeunit.php?unit=$unit';</script>";
}
?>
	