<?php
  include 'config.php';
  error_reporting(0);
  session_start();
  $sql = "SELECT * FROM assets";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result(); // Get the result set
  $data = $result->fetch_all(MYSQLI_ASSOC); // Fetch data as associative array
  if (isset($SESSION['username'])) {
  header("Location: index2.php");
  }
  $level = $_SESSION['level'];
  if(isset($_POST['generate'])){
    header("Location:assetexcel.php?export");
  }
  if(isset($_POST['kembali'])){
    header("Location:pagedownload.php");
  }
?>
 


<!DOCTYPE html>
<html>
<head>
    <title>Web Management Pemeliharaan</title>
    <meta charset="UTF-8">
    <meta name="description" contents="PLN UP2B Minahasa">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
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
                <li><a href="listunit.php?page=list" >List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" class="active">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <?php  
      } else {
    ?>
      <header>
        <h1 class="title" style = "font-family: sans-serif; font-size: 2.5rem; margin-bottom: 1px;">PLN UP2B Minahasa</h1>
        <h3 class="desc" style="font-family: sans-serif; font-size: 2rem;margin-top: 1px">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="listunit.php?page=list" >List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" class="active">Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <br> 
    <?php
      }
    ?>
</div>
<p class="form-text" style="font-size: 2rem; font-weight: 800; margin-top: -10px;color: white;">List Semua Asset</p>
<div class="table-container">
  <form action="" method="POST" class="generate1">
    <button name="generate" class="generate">Generate Excel</button><br>
    <button name="kembali" class="kembali">Kembali</button>
</form>
  <table class="table table-bordered" id="myTable">
    <thead>
    <tr>
      <th>No</th>
      <th>Nama Unit</th>
      <th>Nama Asset</th>
      <th>Merk</th>
      <th>Type</th>
      <th>Serial Number</th>
      <th>Bay</th>
    </tr>
    </thead>
    <tbody>
      <?php
        if(count($data)>0)
        {
          foreach($data as $key=>$value)
          {
          ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $value['unit_name'];?></td>
                <td><?php echo $value['asset_name'];?></td>
                <td><?php echo $value['merk'];?></td>
                <td><?php echo $value['type'];?></td>
                <td><?php echo $value['serial_number'];?></td>
                <td><?php echo $value['bay'];?></td>
            </tr>
            <?php
          }
        }
      ?>  
       
    </tbody>
  </table>
    
<br>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="jquery-table2excel-master/src/jquery.table2excel.js"></script>
</body>

</body>
</html>