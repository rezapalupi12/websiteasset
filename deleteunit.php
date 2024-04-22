<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}
$unit=$_GET['unit'];

if(isset($_POST['yes'])){
	$sql = "DELETE FROM units where unit_name = '$unit'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from assets where unit_name = '$unit'";
	$result1 = mysqli_query($conn,$sql1);
	if($result1){
		echo "<script>alert('Unit dan asset telah dihapus'); document.location='listunit.php?unit_name=$unit';</script>";
	}
}

if(isset($_POST['no'])){
	header("Location:unitdetail.php?unit_name=$unit");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<img src="style/gi.jpg" alt="Watermark" class="watermark">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style11.css">

	<title>Delete Asset</title>
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
		<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
    			<?php
    				echo "Anda yakin hapus unit ini? Jika menghapus unit, asset pun akan terhapus"
    			?></p>
    	<button name="yes" class="btn">Yes</button>
    	<button name="no" class="btn">No</button>
    </form></div>
</body>
</html>