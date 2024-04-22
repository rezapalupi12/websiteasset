<?php
    error_reporting(0);
    session_start();
    $unit = $_GET['unit'];
    $asset = $_GET['asset'];
    $sn = $_GET['sn'];
    $stru = str_replace(" ", "_", $unit);
    $stra = str_replace(" ", "_", $asset);
    $strs = str_replace("/", "-", $sn);
    $nama = $stra."_".$strs."_".$stru;
    $path = 'images/asset/';
    $qrcode = $path.$nama.".png";
    if (isset($SESSION['username'])) {
        header("Location: /tesweb/index2.php");
    }   
        if(isset($_POST['print'])){
        header("Location:/tesweb/qrdownload.php?path=$qrcode");
        }
    
    if(isset($_POST['kembali'])){
    	header("Location:/tesweb/detailasset.php?unit=$unit&asset=$asset&sn=$sn");
    }
    
?> 

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/tesweb/style/style15.css">

	<title>Detail Asset</title>
</head>
<body>
    </style>
	<div class="container">
        <p class="form-text" style="font-size: 4 rem; font-weight: 800;">
    			<?php
    				$judul = "QR Code";
    				echo $judul;
    			?></p>
    	<div class="qr">
    	<?php
        if (file_exists($qrcode)){
            echo "<img src='".$qrcode."'>";
            echo "<br>";
        ?>
            <form action="" method="POST" class="btn">
            <button name="print" class="print">Download QR</button>
            <button name="kembali" class="kembali">Kembali</button>
            </form> 
        <?php
        } else {
            echo "QR belum digenerate, please contact admin"
        ?>
            <form action="" method="POST" class="btn">
            <button name="print" class="print">Download QR</button>
            <button name="kembali" class="kembali">Kembali</button>
            </form>
        <?php } 
        ?>
	</div>
</div>
</body>
</html>