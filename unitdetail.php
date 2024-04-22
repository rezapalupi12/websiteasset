<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}

$unit=$_GET['unit_name'];

$sql = "SELECT * FROM units where unit_name = '$unit'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
if(isset($_POST['kembali'])){
	header("Location:listunit.php");
}
if(isset($_POST['list'])){
	header("Location:listasset.php?unit_name=$unit");
}
if(isset($_POST['delete'])){
	header("Location:deleteunit.php?unit=$unit");
}
if(isset($_POST['edit'])){
	header("Location:editunit.php?unit=$unit");
	}
if(isset($_POST['qr'])){
	header("Location:phpqrcode/qrcodeunit.php?unit=$unit");
}
if(isset($_POST['vqr'])){
    header("Location:phpqrcode/vqrcodeunit.php?unit=$unit");
}

$level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style14.css">

	<title>Register Asset</title>
</head>
<body>
<div class = "container">
		<form action="" method="POST" class="form">
			<p class="form-text" style="font-size: 2rem; font-weight: 800;"><?php echo $unit."<br>" ?></p>
			<table>
                <tr>
                    <th width="100" text style="font-size: 2 rem;font-weight: 600;">Alamat</th>
                    <td width="10">:</td>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['alamat']?></td>
                </tr>
                <tr>
                    <th width="100" text style="font-size: 2 rem;font-weight: 600;">Koordinator</th>
                    <td width="10">:</td>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['koordinator'] ?></td>
                </tr>
                <tr>
                    <th width="100" text style="font-size: 2 rem;font-weight: 600;">Kontak</th>
                    <td width="10">:</td>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['no_hp'] ?></td>
                </tr>
            </table>
           <?php 
      if ($level == 'Administrator')
      {
    ?>
            <button name="list" class="btn">List Asset</button>
            <button name="qr" class="btn">Generate QR</button>
            <button name="vqr" class="btn">View QR</button>
            <button name="edit" class="btn">Edit GI</button>
            <button name="delete" class="btn">Delete GI</button>
            <button name="kembali" class="btn">Kembali</button>
    <?php  
      } else {
    ?>
            <button name="list" class="btn">List Asset</button>
            <button name="qr" class="btn">View QR</button>
            <button name="kembali" class="btn">Kembali</button>
    <?php
      }
    ?>
            
			</form>
			</div>

</body>
</html>