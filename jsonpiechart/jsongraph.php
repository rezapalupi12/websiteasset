
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="description" contents="PLN UP2B Minahasa">
    <link rel="stylesheet" href="style16.css" type="text/css">
	<!-- Bagian css -->
	
	<script src="assets/js/jquery-1.10.1.min.js"></script>
	
	<script type="text/javascript">
		
        var chart; 
        $(document).ready(function() {
        	chart = new Highcharts.Chart(
              {
              		chart: {
                    renderTo: 'mygraph',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Tomohon'
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Math.floor(this.y);
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false,
                        },
                        showInLegend: true
                    }
                 },

                  legend: {
                  enabled: true, 
                  align: 'bottom',
                  verticalAlign: 'bottom', 
                  layout: 'vertical', 
                  itemStyle: {
                    fontSize: '12px', 
                  },

        labelFormatter: function() {
            return this.name + ': ' + Math.floor(this.y);
        }
    },
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                 
                            [  
                            <?php
							include "config.php";
							$nama = "maintenance";
							$selectsql = "call selectpiegitomohon()";
							$jumlahmaintenance = mysqli_query($conn,$selectsql);
							$jumlah = mysqli_num_rows($jumlahmaintenance); 
							?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                            	include 'config.php';
                            	$nama1 = "non-maintenance";
                     			$jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Tomohon'");
                     			$jumlah1 = mysqli_num_rows($jumlahnonmaintenance);
                     			$jumlah2 = $jumlah1-$jumlah;
                            ?>
                            '<?php echo $nama1 ?>', <?php echo $jumlah2; ?>
                            ],                                         
                    ]
                }]
              });
          chart = new Highcharts.Chart(
              {
                  chart: {
                    renderTo: 'mygraph1',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Amurang'
                 },
                 tooltip: {
                    formatter: function() {
                        return '<b>'+
                        this.point.name +'</b>: '+ Math.floor(this.y);
                    }
                 },
                 
                
                 plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false,
                        },
                        showInLegend: true
                    }
                 },

                  legend: {
                  enabled: true, 
                  align: 'bottom',
                  verticalAlign: 'bottom', 
                  layout: 'vertical', 
                  itemStyle: {
                    fontSize: '12px', 
                  },

        labelFormatter: function() {
            return this.name + ': ' + Math.floor(this.y);
        }
    },
                    series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: [
                 
                            [  
                            <?php
              include "config.php";
              $nama = "maintenance";
              $selectsql = "call selectpieamurang()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Amurang'");
                          $jumlah1 = mysqli_num_rows($jumlahnonmaintenance);
                          $jumlah2 = $jumlah1-$jumlah;
                            ?>
                            '<?php echo $nama1 ?>', <?php echo $jumlah2; ?>
                            ],                                         
                    ]
                }]
              });
        }); 
	</script>
	<script src="assets/js/highcharts.js"></script>
	<script src="assets/js/exporting.js"></script>
<style>
      .panel-body {
      background-color: #f0f0f0;
      padding: 10px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
    }

    .panel-body1 {
      background-color: #e0e0e0;
      padding: 10px;
      border: 1px solid #999;
      margin-bottom: 10px;
      margin-left: 80px;
    }

    .col-md-7{
      min.height: 10px;
      position: left;
      float:left;
      width:29%;
    }

    .col-md-8{
      min.height: 10px;
      position: relative;
      float:left;
      width:33%;
    }
  </style>
</head>
<body>
	<header>
        <h1 class="title">PLN UP2B Minahasa</h1>
        <h3 class="desc">Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home">Home</a></li>
                <li><a href="index2.php?page=register">Register</a></li>
                <li><a href="index2.php?page=list">List Unit</a></li>
                <li><a href="index2.php?page=about">About</a></li>
                <li><a href="index2.php?page=contact">Contact</a></li>
                <li><a href="index2.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>

<div class="container" style="margin-top:5px">
	<div class="col-md-7">
				<div class="panel-body">
					<div id ="mygraph"></div>
				</div>
	</div>
  <div class="col-md-8">

        <div class="panel-body1">
          <div id ="mygraph1"></div>
        </div>
  </div>
</div>
<script src="assets/js/highcharts.js"></script>
<script src="assets/js/jquery-1.10.1.min.js"></script>

</body>
</html>
