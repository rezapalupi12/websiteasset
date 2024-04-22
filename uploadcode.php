<?php

$unit = $_GET['unit'];
$asset = $_GET['asset'];
$sn = $_GET['sn'];
$target_dir = "BA/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check if file is a DOC or PDF file
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if ($fileType != "pdf") {
  echo "<script>alert('Format file salah, ubah file menjadi pdf');document.location='upload.php'</script>";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "<script>alert('Sorry, ada kesalahan sistem);document.location='upload.php'</script>";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<script>alert('File " . basename($_FILES["fileToUpload"]["name"]) . " berhasil diupload');document.location='upload.php?unit=$unit&asset=$asset&sn=$sn'</script>";
  } else {
    echo "<script>alert('Maaf terjadi kesalahan sistem');document.location='upload.php'</script>";
  }
}

?>