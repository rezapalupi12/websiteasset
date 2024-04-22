

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Chartjs, PHP dan MySQL Demo Grafik Batang</title>
  <script src="js/Chart.js"></script>
  <style type="text/css">
    .container {
      width: 40%;
      margin: 15px auto;
    }
  </style>
</head>
<body>

<div class="container">
  <canvas id="barchart" width="100" height="100"></canvas>
</div>

</body>
</html>

<script type="text/javascript">

var ctx = document.getElementById("barchart").getContext("2d");
var data = {
  <?php
include ("config.php");
$resultunit = mysqli_query($conn, "SELECT unit_name FROM units");
$labels = [];
$data = [];

while ($row = mysqli_fetch_array($resultunit)) {
  $unit = $row['unit_name'];
  $resultasset = mysqli_query($conn, "SELECT asset_name from assets where unit_name = '$unit'");
  $asset = mysqli_num_rows($resultasset);
  
  $labels[] = $unit;
  $data[] = $asset;
}
?>
  labels: <?php echo json_encode($labels); ?>,
  datasets: [
    {
      label: "Jumlah Asset",
      data: <?php echo json_encode($data); ?>,
     backgroundColor: generateRandomColors(<?php echo count($labels); ?>)
    }
  ]
};
function generateRandomColors(count) {
  var colors = [];
  for (var i = 0; i < count; i++) {
    var randomColor = "#" + Math.floor(Math.random()*16777215).toString(16); // Generate a random hex color code
    colors.push(randomColor);
  }
  return colors;
}
var myBarChart = new Chart(ctx, {
  type: 'bar',
  data: data,
  options: {
    legend: {
      display: false
    },
    barValueSpacing: 20,
    scales: {
      yAxes: [{
        ticks: {
          min: 0,
        }
      }],
      xAxes: [{
        gridLines: {
          color: "rgba(0, 0, 0, 0)",
        }
      }]
    }
  }
});
</script>
