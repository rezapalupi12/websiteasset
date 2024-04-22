
<!DOCTYPE html>
<html>
<head>
	<title>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS - www.malasngoding.com</title>
	<script type="text/javascript" src="chartjs/Chart.js"></script>
</head>
<body>
	<style type="text/css">
		body{
			font-family: roboto;
		}</style>

			<?php 
	include 'config.php';
	?>

	<center>
		<h2>MEMBUAT GRAFIK DARI DATABASE MYSQL DENGAN PHP DAN CHART.JS<br/>- www.malasngoding.com -</h2>
	</center>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {type: 'pie',
			data: {
				labels: ["Sudah maintenance","Belum maintenance"],
				datasets: [{
					label: '',
					data: [
					<?php
					echo "maintenance";
					?>,
					<?php
					$jumlah = '20';
					echo $jumlah;
					?>
				],
				backgroundColor:[
				'rgba(255,99,132,0.2)','rgba(54,162,235,0.2)'],
				borderColor: [
				'rgba(255,99,132,1)','rgba(54,162,235,1)'],
				borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
	});

	</script>
</body>
</html>