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

if(isset($_POST['yes'])){
	if($asset == 'Rele UFR'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from ufr_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($asset == 'Rele OLS'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from ols_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($asset == 'Rele UPLS'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from ufr_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($asset == 'Rele OGS'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from ogs_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($asset == 'Rele Island'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from island_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($asset == 'DFR'){
	$sql = "DELETE FROM assets where serial_number = '$sn'";
	$result = mysqli_query($conn,$sql);
	$sql1 = "DELETE from dfr_detail where serial_number = '$sn'";
	$result1 = mysqli_query($conn,$sql1);
	}
	if($result1){
		echo "<script>alert('Asset telah dihapus'); document.location='listasset.php?unit_name=$unit';</script>";
	}
}

if(isset($_POST['no'])){
	header("Location:detailasset.php?unit=$unit&asset=$asset&sn=$sn");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style11.css">

	<title>Delete Asset</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="register-aset">
		<p class="form-text" style="font-size: 2 rem; font-weight: 800;">
    			<?php
    				echo "Anda yakin hapus asset ini?"
    			?></p>
    	<button name="yes" class="btn">Yes</button>
    	<button name="no" class="btn">No</button>
    </form></div>
</body>
</html>