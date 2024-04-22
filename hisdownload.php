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
$tanggal = $_GET['tanggal'];
$sn1 = str_replace("/", "", $sn);
$filename = $tanggal.'_'.$asset.'_'.$sn1.'_'.$unit;
$location = 'C:/xampp/htdocs/tesweb/BA/'.$filename.'.pdf';
if(file_exists($location)){
header("Content-type: application/octet-stream");
header("Content-Length: " . filesize($location));
header("Content-disposition: attachment; filename=".basename($location));
header("content-description: File Transfer");
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header("Pragma: public");
flush();
readfile($location);
}else{
	echo "<script>alert('Tidak ada BA untuk tanggal tersebut');document.location='history.php?unit=$unit&asset=$asset&sn=$sn'</script>";
}	
?>
	