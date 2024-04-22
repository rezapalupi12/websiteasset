<?php
    error_reporting(0);
    session_start();
    $unit = $_GET['unit'];
    if (isset($SESSION['username'])) {
        header("Location: /tesweb/index2.php");
    }   
    $level = $_SESSION['level'];
    if(isset($_POST['kembali'])){
        header("Location:/tesweb/unitdetail.php?unit_name=$unit");
    }
    if ($level == 'Administrator')
      {
        require_once 'qrlib.php';
        $str = str_replace(" ", "_", $unit);
        $path = 'images/';
        $qrcode = $path.$unit.".png";
        $base = "http://". $_SERVER['SERVER_NAME']."/tesweb/index.php?unit=$str";
        QRcode::png($base,$qrcode,QR_ECLEVEL_H, 7);
        if(isset($_POST['print'])){
        header("Location:/tesweb/qrdownload.php?path=$qrcode");
        }
      } else {
        require_once 'qrlib.php';
        $str = str_replace(" ", "_", $unit);
        $path = 'images/';
        $qrcode = $path.$unit.".png";
        if(isset($_POST['print'])){
        header("Location:/tesweb/qrdownload.php?path=$qrcode&unit=$unit");
        }
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
    
	<div class="container">
        <p class="form-text" style="font-size: 3rem; font-weight: 800;">
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