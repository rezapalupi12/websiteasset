<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index2.php");
}

if (isset($_POST['maintenance'])){
    header("Location: maintenancelaporan.php");
}

if (isset($_POST['non-maintenance'])){
    header("Location: non_maintenancelaporan.php");
}
if (isset($_POST['listasset'])){
    header("Location: assetall.php");
}
if (isset($_POST['ufr'])){
    header("Location:ufr.php");
}
if (isset($_POST['ols'])){
    header("Location:ols.php");
}
if (isset($_POST['ogs'])){
    header("Location:ogs.php");
}
if (isset($_POST['upls'])){
    header("Location:upls.php");
}
if (isset($_POST['island'])){
    header("Location:island.php");
}
if (isset($_POST['dfr'])){
    header("Location:dfr.php");
}

$level = $_SESSION['level'];
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
  </div>
  <?php 
      if ($level == 'Administrator')
      {
    ?>
        <header>
        <h1 class="title" style = "font-family: sans-serif; font-size: 2.5rem; margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="register.php?page=register">Register</a></li>
                <li><a href="listunit.php?page=list">List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" class="active">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <?php  
      } else {
    ?>
     <header>
        <h1 class="title" style = "font-family: sans-serif; font-size: 2.5rem; margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="listunit.php?page=list">List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" class="active">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>  
    <?php
      }
    ?>
    
	<div class="laporan">
    <form method="post">
    <button type= "submit" name="maintenance" class="maintenance">List Asset Maintenance</button>
    <button type= "submit" name="non-maintenance" class="non-maintenance">List Asset Non-Maintenance</button> 
    <button type="submit" name="listasset" class="listasset">List Semua Asset</button>
    <button type="submit" name="ufr" class="ufr">Data Asset UFR</button>
    <button type="submit" name="ols" class="ols">Data Asset OLS</button>
    <button type="submit" name="ogs" class="ogs">Data Asset OGS</button>
    <button type="submit" name="upls" class="upls">Data Asset UPLS</button>
    <button type="submit" name="island" class="island">Data Asset Island</button>
    <button type="submit" name="dfr" class="dfr">Data Asset DFR</button>
    
</form>
</div>
</body>
</html>