<?php 
 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index2.php");
}

if (isset($_POST['registerunit'])){
    header("Location: registerunit.php");
}

if (isset($_POST['registeraset'])){
    header("Location: registeraset.php");
}

?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Web Management Pemeliharaan</title>
    <meta charset="UTF-8">
    <meta name="description" contents="PLN UP2B Minahasa">
    <link rel="stylesheet" href="style/style2.css" type="text/css">
</head>

<body>
    <div class="logo1">
        <img src="style/Logo_PLN.png" alt="PLN Logo" class="logo">
    </div>
	<header>
        <h1 class="title" style = "font-family: sans-serif; font-size: 2.5rem; margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="register.php?page=register" class="active">Register</a></li>
                <li><a href="listunit.php?page=list">List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
</div>
<div class="Register">
<form method="post">
    <button type= "submit" name="registerunit" class="btnunit">Register GI</button>
	<button type= "submit" name="registeraset" class="btnasset">Register Asset</button>	
</form>
</div>

</body>
</html>
