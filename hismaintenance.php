<?php
include 'config.php';

error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}
$nama_unit = $_GET['unit'];
$nama_asset = $_GET['asset'];
$sn = $_GET['sn'];
$sql = "

INSERT INTO tmp
SELECT * FROM list_maintenance where unit_name = '$nama_unit' and asset_name = '$nama_asset' and serial_number = '$sn' ;";

$result = mysqli_query($conn,$sql);

$sql1 = "SELECT * from tmp where id = (select max(id) from tmp)";
$result1 = mysqli_query($conn,$sql1);

$sql2 = "DELETE from tmp";
$result2 = mysqli_query($conn,$sql2);

if(isset($_POST['maintenance'])){
    header("Location:maintenance.php?unit=".$nama_unit ."&asset=". $nama_asset. "&sn=" .$sn );
}

if(isset($_POST['laporan'])){
    header("Location:laporan.php?unit=".$nama_unit ."&asset=". $nama_asset. "&sn=" .$sn);
}

if(isset($_POST['upload'])){
    header("Location:upload.php?unit=".$nama_unit ."&asset=". $nama_asset. "&sn=" .$sn);
}

if(isset($_POST['kembali'])){
    header("Location:listasset.php?unit_name=".$nama_unit);
}

if(isset($_POST['detail'])){
    header("Location:detailasset.php?unit=".$nama_unit ."&asset=". $nama_asset. "&sn=" .$sn );
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/style5.css">

	<title>Maintenance Asset</title>
</head>
<body>
    <div class="container">
    	
    	<form action="" method="POST" class="form">
    		<p class="form-text" >
    			<?php
    				$judul = $nama_asset . "  ". $sn . "<br>" . $nama_unit;
    				echo $judul;
    			?></p>

    	<div class="input-text">
    		<?php 
    		
    		if (mysqli_num_rows($result1) > 0) {
    			$row = mysqli_fetch_array($result1); 
            ?>
                <table>
                    <tr>
                    <th width="150" text style="font-size: 2 rem;font-weight: 600;">Tanggal Maintenance</th>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row['tanggal'] ?></td>
                    </tr>
                    <tr>
                    <th width="150" text style="font-size: 2 rem;font-weight: 600;">Pengawas</th>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row['pengawas'] ?></td>
                    </tr>
                    <tr>
                    <th width="150" text style="font-size: 2 rem;font-weight: 600;">Pelaksana</th>
                    <td style="font-size: 2 rem;font-weight: 500;"><?php echo ":"." ".$row['penguji'] ?></td>
                    </tr>
                </table>
            <?php    
    		}else {
    			echo "asset belum dilakukan pemeliharaan";
    			}
    		?> 	
    	</div>
        </form>
        <form action="" method="POST" class="btn">
            <button name="maintenance" class="maintenance">Lakukan Maintenance</button>
            <button name="laporan" class="laporan">Laporan Maintenance</button>
            <button name="upload" class="upload">Upload BA</button>
            <button name="detail" class="detail">Detail Asset</button>
            <button name="kembali" class="kembali">Kembali</button>
        
    	</form>
    </div>
</body>
</html>