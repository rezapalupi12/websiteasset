<?php
include 'config.php';

error_reporting(0);
session_start();

if (isset($SESSION['username'])) {
	header("Location: index2.php");
}
$level = $_SESSION['level'];
$unit = $_GET['unit_name'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>List Unit</title>
    <meta charset="UTF-8">
    <meta name="description" contents="PLN UP2B Minahasa">
    <link rel="stylesheet" href="style/style2.css" type="text/css">
</head>
<body>
    <div class="logo1">
    <img src="style/Logo_PLN.png" alt="PLN Logo" class="logo">
    <!-- Other content goes here -->
  </div>
  <?php 
      if ($level == 'Administrator')
      {
    ?>
    <header>
        <h1 class="title" style="font-family: sans-serif; font-size: 2.5rem;margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="register.php?page=register">Register</a></li>
                <li><a href="listunit.php?page=list" class="active">List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <?php  
      } else {
    ?>
      <header>
        <h1 class="title" style="font-family: sans-serif; font-size: 2.5rem;margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="listunit.php?page=list" class="active">List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <?php
      }
    ?>
    
    <div id="contents">

        <?php 
		$ref_name = $_GET['unit_name'];
		$result = mysqli_query($conn, "SELECT * FROM assets where unit_name ='$ref_name'");
        ?>
        <p class="form-text" style="font-size: 4 rem; font-weight: 800;color: white;">
                <?php
                    $judul = "List Asset"."<br>". $ref_name."<br>"; 
                    echo $judul;
                ?></p>
        <?php

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_array($result)) {
				$nama_asset = $row['asset_name'];
				$nama_unit = $row['unit_name'];
				$serial_number = $row['serial_number'];
				$nama_button = $nama_asset . "  ". $serial_number . "<br>" . $nama_unit;
				echo "<a href='hismaintenance.php?unit=$nama_unit&asset=$nama_asset&sn=$serial_number'><button class='list1'>$nama_button</button></a>";
			}		
    	} else {
    		echo 'No records found';
    	}
    
    	?>

    </div>

</body>
</html>