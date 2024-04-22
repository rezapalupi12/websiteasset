<?php
include 'config.php';
error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location:index2.php");
}
$level = $_SESSION['level'];
$unit=$_GET['unit'];
$asset=$_GET['asset'];
$sn=$_GET['sn'];

$sql1 = "SELECT * from assets where unit_name = '$unit' and asset_name='$asset' and serial_number='$sn'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);

if(isset($_POST['kembali'])){
	header("Location:hismaintenance.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}

if(isset($_POST['edit'])){
    header("Location:editasset.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}

if(isset($_POST['delete'])){
    header("Location:deleteasset.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}

if(isset($_POST['qr'])){
    header("Location:phpqrcode/qrcodeasset.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}

if(isset($_POST['vqr'])){
    header("Location:phpqrcode/vqrcodeasset.php?unit=".$unit ."&asset=". $asset. "&sn=" .$sn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style9.css">

	<title>Detail Asset</title>
</head>
<body>
    <div class="container">
        <p class="form-text" style="font-size: 4 rem; font-weight: 800;">
    			<?php
    				$judul = $asset . "  ". $sn . "<br>" . $unit;
    				echo $judul;
    			?></p>
    		<?php
    		if ($asset=='Rele UFR'){
    			$sql = "SELECT * from UFR_detail where serial_number='$sn'";
    			$result = mysqli_query($conn,$sql);
    			$row = mysqli_fetch_array($result);
    			?>
                <div class="input">
    			<table>
        		<tr>
            		<th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
            		<td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row1['merk'] ?></td>
            	</tr>
        		<tr>
            		<th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
            		<td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row1['type'] ?></td>
        		</tr>
                <tr>
                    <th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row1['bay'] ?></td>
                </tr>
        		<tr>
            		<th width="100" text style="font-size: 2 rem;font-weight: 600;">Trafo</th>
            		<td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row['trafo'] ?></td>
        		</tr>
        		<tr>
            		<th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
            		<td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row['status'] ?></td>
        		</tr>
    			</table></div>
    			<?php }
            elseif($asset == 'Rele OLS'){
                    $sql= "SELECT * from OLS_detail where serial_number = '$sn'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="input">
                <table>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['merk'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['type'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['bay'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['IP'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_arus_relay']);?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_waktu']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['keterangan'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['status'] ?></td>
                </tr>
                </table></div>
                <?php }
                elseif($asset == 'Rele OGS'){
                    $sql= "SELECT * from OGS_detail where serial_number = '$sn'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="input">
                <table>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['merk'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['type'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['bay'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['IP'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_arus_relay']);?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_waktu']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['keterangan'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['status'] ?></td>
                </tr>
                </table></div>
                <?php }
                elseif($asset == 'Rele UPLS'){
                    $sql= "SELECT * from UPLS_detail where serial_number = '$sn'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
    		    ?>
                <div class="input">
                <table>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['merk'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['type'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['bay'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['IP'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Arus Rele</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_arus_relay']);?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Set. Waktu</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_waktu']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Keterangan</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['keterangan'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['status'] ?></td>
                </tr>
                </table></div>
                <?php }
                elseif($asset == 'Rele Island'){
                    $sql= "SELECT * from island_detail where serial_number = '$sn'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                ?>
                <div class="input">
                <table>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['merk'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['type'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Bay/Line</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " " .$row1['bay'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Tahapan Setting</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['tahapan_setting']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Setting Frekuensi</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_frekuensi']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Setting Waktu</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".nl2br($row['setting_waktu']); ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['status'] ?></td>
                </tr>
                </table></div>
             <?php }
                elseif($asset == 'DFR'){
                    $sql= "SELECT * from dfr_detail where serial_number = '$sn'";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                ?> 
                <div class="input">
                <table>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Merk</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['merk'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Type</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['type'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Line</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row1['bay'] ?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">IP</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['IP']?></td>
                </tr>
                <tr>
                <th width="100" text style="font-size: 2 rem;font-weight: 600;">Status</th>
                <td width="10">:</td>
                <td style="font-size: 2 rem;font-weight: 500;"><?php echo " ".$row['status'] ?></td>
                </tr>
                </table></div>
                <?php }
                ?>   
      <?php 
      if ($level == 'Administrator')
      {
    ?>
        <form action="" method="POST" class="btn">
            <button name="edit" class="edit">Edit Asset</button>
            <button name="delete" class="delete">Delete Asset</button>
            <button name="qr" class="qr">Generate QR</button>
            <button name="vqr" class="qr">View QR</button>
            <button name="kembali" class="kembali">Kembali</button>
        </form>
    <?php  
      } else {
    ?>
         <form action="" method="POST" class="btn">
            <button name="qr" class="qr">View QR</button>
            <button name="kembali" class="kembali">Kembali</button>
        </form>   
    <?php
      }
    ?>
</body>
</html>