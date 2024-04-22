<?php
error_reporting(0);
session_start();
if (isset($SESSION['username'])) {
  header("Location: index2.php");
}
$level = $_SESSION['level'] ;
$base = "http://" . $_SERVER['SERVER_NAME'].":81" . $_SERVER['REQUEST_URI']; 
header("Refresh: 300; URL=$base");

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Dashboard</title>
    <meta charset="UTF-8">
    <meta name="description" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style2.css" type="text/css">
	<!-- Bagian css -->
	<script src="jsonpiechart/assets/js/jquery-1.10.1.min.js"></script>
	
	<script type="text/javascript">
		
        var chart; 
        $(document).ready(function() {
        	chart = new Highcharts.Chart(
              {
              		chart: {
                    renderTo: 'Tomohon',
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
                    renderTo: 'Amurang',
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
          chart = new Highcharts.Chart(
              {
                  chart: {
                    renderTo: 'Anggrek',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Anggrek'
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
              $selectsql = "call selectpieanggrek()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Anggrek'");
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
                    renderTo: 'Bitung',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Bitung'
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
              $selectsql = "call selectpiebitung()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Bitung'");
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
                    renderTo: 'Boroko',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Boroko'
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
              $selectsql = "call selectpieBoroko()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Boroko'");
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
                    renderTo: 'Botupingge',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Botupingge'
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
              $selectsql = "call selectpiebotupingge()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Botupingge'");
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
                    renderTo: 'Gobar',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Gobar'
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
              $selectsql = "call selectpiegobar()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Gobar'");
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
                    renderTo: 'Isimu',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Isimu'
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
              $selectsql = "call selectpieisimu()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Isimu'");
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
                    renderTo: 'Kawangkoan',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Kawangkoan'
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
              $selectsql = "call selectpiekawangkoan()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Kawangkoan'");
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
                    renderTo: 'Kema',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Kema'
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
              $selectsql = "call selectpiekema()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Kema'");
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
                    renderTo: 'Likupang150',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Likupang 150 kV'
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
              $selectsql = "call selectpielikupang150()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Likupang 150 kV'");
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
                    renderTo: 'Likupang70',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Likupang 70 kV'
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
              $selectsql = "call selectpielikupang70()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Likupang 70 kV'");
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
                    renderTo: 'Lolak',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Lolak'
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
              $selectsql = "call selectpielolak()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Lolak'");
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
                    renderTo: 'Lopana',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Lopana'
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
              $selectsql = "call selectpielopana()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Lopana'");
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
                    renderTo: 'Marisa',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Marisa'
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
              $selectsql = "call selectpiemarisa()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Marisa'");
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
                    renderTo: 'Otam',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Otam'
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
              $selectsql = "call selectpieotam()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Otam'");
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
                    renderTo: 'Paniki',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Paniki'
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
              $selectsql = "call selectpiepaniki()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Paniki'");
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
                    renderTo: 'Ranomuut',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Ranomuut'
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
              $selectsql = "call selectpieranomuut()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Ranomuut'");
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
                    renderTo: 'Sawangan',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Sawangan'
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
              $selectsql = "call selectpiesawangan()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Sawangan'");
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
                    renderTo: 'Sulbagut',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Sulbagut'
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
              $selectsql = "call selectpiesulbagut()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Sulbagut'");
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
                    renderTo: 'Merah',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Tanjung Merah'
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
              $selectsql = "call selectpiemerah()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Tanjung Merah'");
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
                    renderTo: 'Tasikria',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Tasikria'
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
              $selectsql = "call selectpietasikria()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Tasikria'");
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
                    renderTo: 'Teling',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Teling'
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
              $selectsql = "call selectpieteling()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Teling'");
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
                    renderTo: 'Tilamuta',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Tilamuta'
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
              $selectsql = "call selectpietilamuta()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Tilamuta'");
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
                    renderTo: 'Tonsea',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GI Tonsea'
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
              $selectsql = "call selectpietonsea()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GI Tonsea'");
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
                    renderTo: 'STeling',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'GIS Teling'
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
              $selectsql = "call selectpiesteling()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'GIS Teling'");
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
                    renderTo: 'Lahendong',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'PLTP Lahendong'
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
              $selectsql = "call selectpielahendong()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'PLTP Lahendong'");
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
                    renderTo: 'UP2B',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'UP2B Minahasa'
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
              $selectsql = "call selectpieup2b()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets where unit_name = 'UP2B Minahasa'");
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
                    renderTo: 'All',
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false
                 },   
                 title: {
                    text: 'All Asset'
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
              $selectsql = "call selectpieall()";
              $jumlahmaintenance = mysqli_query($conn,$selectsql);
              $jumlah = mysqli_num_rows($jumlahmaintenance); 
              ?>                       
                                '<?php echo $nama ?>', <?php echo $jumlah; ?>
                            ],
                            [
                            <?php 
                              include 'config.php';
                              $nama1 = "non-maintenance";
                          $jumlahnonmaintenance = mysqli_query($conn,"SELECT * from assets");
                          $jumlah1 = mysqli_num_rows($jumlahnonmaintenance);
                          $jumlah2 = $jumlah1-$jumlah;
                            ?>
                            '<?php echo $nama1 ?>', <?php echo $jumlah2; ?>
                            ],                                         
                    ]
                }]
              });

chart1 = new Highcharts.Chart({
    chart: {
        renderTo: 'container',
        type: 'column'
    },
    title: {
        text: 'List Asset'
    },
    xAxis: {
         categories: [
                    'GI Amurang',
                    'GI Anggrek',
                    'GI Bitung',
                    'GI Boroko',
                    'GI Botupingge',
                    'GI Gobar',
                    'GI Isimu',
                    'GI Kawangkoan',
                    'GI Kema',
                    'GI Likupang 70 kV',
                    'GI Likupang 150 kV',
                    'GI Lolak',
                    'GI Lopana',
                    'GI Marisa'
                ],
                crosshair: true
    },  
    yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
      tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Asset</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                format: '{point.options.unit}',
                style: {
                    fontWeight: 'bold'
                }
            }
        }
    },
    series: [
                <?php
                {
                include 'config.php';
                $amurangUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Amurang'");
                $sumamurangUFR = mysqli_num_rows($amurangUFR);  
                }
                {
                include 'config.php';
                $amurangOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Amurang'");
                $sumamurangOLS = mysqli_num_rows($amurangOLS);  
                }
                {
                include 'config.php';
                $amurangOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Amurang'");
                $sumamurangOGS = mysqli_num_rows($amurangOGS);  
                }
                {
                include 'config.php';
                $amurangUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Amurang'");
                $sumamurangUPLS = mysqli_num_rows($amurangUPLS);  
                }
                {
                include 'config.php';
                $amurangIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Amurang'");
                $sumamurangIsland = mysqli_num_rows($amurangIsland);  
                }
                {
                include 'config.php';
                $amurangDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Amurang'");
                $sumamurangDFR = mysqli_num_rows($amurangDFR);  
                }
                {
                include 'config.php';
                $anggrekUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Anggrek'");
                $sumanggrekUFR = mysqli_num_rows($anggrekUFR);
                }
                {
                include 'config.php';
                $anggrekOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Anggrek'");
                $sumanggrekOLS = mysqli_num_rows($anggrekOLS);
                }
                {
                include 'config.php';
                $anggrekOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Anggrek'");
                $sumanggrekOGS = mysqli_num_rows($anggrekOGS);
                }
                {
                include 'config.php';
                $anggrekUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Anggrek'");
                $sumanggrekUPLS = mysqli_num_rows($anggrekUPLS);
                }
                {
                include 'config.php';
                $anggrekIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Anggrek'");
                $sumanggrekIsland = mysqli_num_rows($anggrekIsland);
                }
                {
                include 'config.php';
                $anggrekDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Anggrek'");
                $sumanggrekDFR = mysqli_num_rows($anggrekDFR);
                }
                {
                include 'config.php';
                $BitungUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Bitung'");
                $sumBitungUFR = mysqli_num_rows($BitungUFR);
                }
                {
                include 'config.php';
                $BitungOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Bitung'");
                $sumBitungOLS = mysqli_num_rows($BitungOLS);
                }
                {
                include 'config.php';
                $BitungOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Bitung'");
                $sumBitungOGS = mysqli_num_rows($BitungOGS);
                }
                {
                include 'config.php';
                $BitungUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Bitung'");
                $sumBitungUPLS = mysqli_num_rows($BitungUPLS);
                }
                {
                include 'config.php';
                $BitungIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Bitung'");
                $sumBitungIsland = mysqli_num_rows($BitungIsland);
                }
                {
                include 'config.php';
                $BitungDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Bitung'");
                $sumBitungDFR = mysqli_num_rows($BitungDFR);
                }
                {
                include 'config.php';
                $BorokoUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Boroko'");
                $sumBorokoUFR = mysqli_num_rows($BorokoUFR);
                }
                {
                include 'config.php';
                $BorokoOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Boroko'");
                $sumBorokoOLS = mysqli_num_rows($BorokoOLS);
                }
                {
                include 'config.php';
                $BorokoOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Boroko'");
                $sumBorokoOGS = mysqli_num_rows($BorokoOGS);
                }
                {
                include 'config.php';
                $BorokoUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Boroko'");
                $sumBorokoUPLS = mysqli_num_rows($BorokoUPLS);
                }
                {
                include 'config.php';
                $BorokoIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Boroko'");
                $sumBorokoIsland = mysqli_num_rows($BorokoIsland);
                }
                {
                include 'config.php';
                $BorokoDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Boroko'");
                $sumBorokoDFR = mysqli_num_rows($BorokoDFR);
                }{
                include 'config.php';
                $BotupinggeUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Botupingge'");
                $sumBotupinggeUFR = mysqli_num_rows($BotupinggeUFR);
                }
                {
                include 'config.php';
                $BotupinggeOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Botupingge'");
                $sumBotupinggeOLS = mysqli_num_rows($BotupinggeOLS);
                }
                {
                include 'config.php';
                $BotupinggeOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Botupingge'");
                $sumBotupinggeOGS = mysqli_num_rows($BotupinggeOGS);
                }
                {
                include 'config.php';
                $BotupinggeUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Botupingge'");
                $sumBotupinggeUPLS = mysqli_num_rows($BotupinggeUPLS);
                }
                {
                include 'config.php';
                $BotupinggeIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Botupingge'");
                $sumBotupinggeIsland = mysqli_num_rows($BotupinggeIsland);
                }
                {
                include 'config.php';
                $BotupinggeDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Botupingge'");
                $sumBotupinggeDFR = mysqli_num_rows($BotupinggeDFR);
                }
                {
                include 'config.php';
                $GobarUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Gobar'");
                $sumGobarUFR = mysqli_num_rows($GobarUFR);
                }
                {
                include 'config.php';
                $GobarOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Gobar'");
                $sumGobarOLS = mysqli_num_rows($GobarOLS);
                }
                {
                include 'config.php';
                $GobarOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Gobar'");
                $sumGobarOGS = mysqli_num_rows($GobarOGS);
                }
                {
                include 'config.php';
                $GobarUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Gobar'");
                $sumGobarUPLS = mysqli_num_rows($GobarUPLS);
                }
                {
                include 'config.php';
                $GobarIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Gobar'");
                $sumGobarIsland = mysqli_num_rows($GobarIsland);
                }
                {
                include 'config.php';
                $GobarDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Gobar'");
                $sumGobarDFR = mysqli_num_rows($GobarDFR);
                }
                {
                include 'config.php';
                $IsimuUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Isimu'");
                $sumIsimuUFR = mysqli_num_rows($IsimuUFR);
                }
                {
                include 'config.php';
                $IsimuOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Isimu'");
                $sumIsimuOLS = mysqli_num_rows($IsimuOLS);
                }
                {
                include 'config.php';
                $IsimuOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Isimu'");
                $sumIsimuOGS = mysqli_num_rows($IsimuOGS);
                }
                {
                include 'config.php';
                $IsimuUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Isimu'");
                $sumIsimuUPLS = mysqli_num_rows($IsimuUPLS);
                }
                {
                include 'config.php';
                $IsimuIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Isimu'");
                $sumIsimuIsland = mysqli_num_rows($IsimuIsland);
                }
                {
                include 'config.php';
                $IsimuDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Isimu'");
                $sumIsimuDFR = mysqli_num_rows($IsimuDFR);
                }
                {
                include 'config.php';
                $KawangkoanUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanUFR = mysqli_num_rows($KawangkoanUFR);
                }
                {
                include 'config.php';
                $KawangkoanOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanOLS = mysqli_num_rows($KawangkoanOLS);
                }
                {
                include 'config.php';
                $KawangkoanOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanOGS = mysqli_num_rows($KawangkoanOGS);
                }
                {
                include 'config.php';
                $KawangkoanUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanUPLS = mysqli_num_rows($KawangkoanUPLS);
                }
                {
                include 'config.php';
                $KawangkoanIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanIsland = mysqli_num_rows($KawangkoanIsland);
                }
                {
                include 'config.php';
                $KawangkoanDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Kawangkoan'");
                $sumKawangkoanDFR = mysqli_num_rows($KawangkoanDFR);
                }
                {
                include 'config.php';
                $KemaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Kema'");
                $sumKemaUFR = mysqli_num_rows($KemaUFR);
                }
                {
                include 'config.php';
                $KemaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Kema'");
                $sumKemaOLS = mysqli_num_rows($KemaOLS);
                }
                {
                include 'config.php';
                $KemaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Kema'");
                $sumKemaOGS = mysqli_num_rows($KemaOGS);
                }
                {
                include 'config.php';
                $KemaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Kema'");
                $sumKemaUPLS = mysqli_num_rows($KemaUPLS);
                }
                {
                include 'config.php';
                $KemaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Kema'");
                $sumKemaIsland = mysqli_num_rows($KemaIsland);
                }
                {
                include 'config.php';
                $KemaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Kema'");
                $sumKemaDFR = mysqli_num_rows($KemaDFR);
                }
                {
                include 'config.php';
                $Likupang70UFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70UFR = mysqli_num_rows($Likupang70UFR);
                }
                {
                include 'config.php';
                $Likupang70OLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70OLS = mysqli_num_rows($Likupang70OLS);
                }
                {
                include 'config.php';
                $Likupang70OGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70OGS = mysqli_num_rows($Likupang70OGS);
                }
                {
                include 'config.php';
                $Likupang70UPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70UPLS = mysqli_num_rows($Likupang70UPLS);
                }
                {
                include 'config.php';
                $Likupang70Island = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70Island = mysqli_num_rows($Likupang70Island);
                }
                {
                include 'config.php';
                $Likupang70DFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Likupang 70 kV'");
                $sumLikupang70DFR = mysqli_num_rows($Likupang70DFR);
                }
                {
                include 'config.php';
                $Likupang150UFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150UFR = mysqli_num_rows($Likupang150UFR);
                }
                {
                include 'config.php';
                $Likupang150OLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150OLS = mysqli_num_rows($Likupang150OLS);
                }
                {
                include 'config.php';
                $Likupang150OGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150OGS = mysqli_num_rows($Likupang150OGS);
                }
                {
                include 'config.php';
                $Likupang150UPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150UPLS = mysqli_num_rows($Likupang150UPLS);
                }
                {
                include 'config.php';
                $Likupang150Island = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150Island = mysqli_num_rows($Likupang150Island);
                }
                {
                include 'config.php';
                $Likupang150DFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Likupang 150 kV'");
                $sumLikupang150DFR = mysqli_num_rows($Likupang150DFR);
                }
                {
                include 'config.php';
                $LolakUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Lolak'");
                $sumLolakUFR = mysqli_num_rows($LolakUFR);
                }
                {
                include 'config.php';
                $LolakOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Lolak'");
                $sumLolakOLS = mysqli_num_rows($LolakOLS);
                }
                {
                include 'config.php';
                $LolakOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Lolak'");
                $sumLolakOGS = mysqli_num_rows($LolakOGS);
                }
                {
                include 'config.php';
                $LolakUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Lolak'");
                $sumLolakUPLS = mysqli_num_rows($LolakUPLS);
                }
                {
                include 'config.php';
                $LolakIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Lolak'");
                $sumLolakIsland = mysqli_num_rows($LolakIsland);
                }
                {
                include 'config.php';
                $LolakDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Lolak'");
                $sumLolakDFR = mysqli_num_rows($LolakDFR);
                }
                {
                include 'config.php';
                $LopanaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Lopana'");
                $sumLopanaUFR = mysqli_num_rows($LopanaUFR);
                }
                {
                include 'config.php';
                $LopanaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Lopana'");
                $sumLopanaOLS = mysqli_num_rows($LopanaOLS);
                }
                {
                include 'config.php';
                $LopanaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Lopana'");
                $sumLopanaOGS = mysqli_num_rows($LopanaOGS);
                }
                {
                include 'config.php';
                $LopanaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Lopana'");
                $sumLopanaUPLS = mysqli_num_rows($LopanaUPLS);
                }
                {
                include 'config.php';
                $LopanaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Lopana'");
                $sumLopanaIsland = mysqli_num_rows($LopanaIsland);
                }
                {
                include 'config.php';
                $LopanaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Lopana'");
                $sumLopanaDFR = mysqli_num_rows($LopanaDFR);
                }
                {
                include 'config.php';
                $MarisaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Marisa'");
                $sumMarisaUFR = mysqli_num_rows($MarisaUFR);
                }
                {
                include 'config.php';
                $MarisaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Marisa'");
                $sumMarisaOLS = mysqli_num_rows($MarisaOLS);
                }
                {
                include 'config.php';
                $MarisaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Marisa'");
                $sumMarisaOGS = mysqli_num_rows($MarisaOGS);
                }
                {
                include 'config.php';
                $MarisaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Marisa'");
                $sumMarisaUPLS = mysqli_num_rows($MarisaUPLS);
                }
                {
                include 'config.php';
                $MarisaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Marisa'");
                $sumMarisaIsland = mysqli_num_rows($MarisaIsland);
                }
                {
                include 'config.php';
                $MarisaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Marisa'");
                $sumMarisaDFR = mysqli_num_rows($MarisaDFR);
                }
                {
                include 'config.php';
                $MarisaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Marisa'");
                $sumMarisaUFR = mysqli_num_rows($MarisaUFR);
                }
                {
                include 'config.php';
                $MarisaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Marisa'");
                $sumMarisaOLS = mysqli_num_rows($MarisaOLS);
                }
                {
                include 'config.php';
                $MarisaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Marisa'");
                $sumMarisaOGS = mysqli_num_rows($MarisaOGS);
                }
                {
                include 'config.php';
                $MarisaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Marisa'");
                $sumMarisaUPLS = mysqli_num_rows($MarisaUPLS);
                }
                {
                include 'config.php';
                $MarisaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Marisa'");
                $sumMarisaIsland = mysqli_num_rows($MarisaIsland);
                }
                {
                include 'config.php';
                $MarisaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Marisa'");
                $sumMarisaDFR = mysqli_num_rows($MarisaDFR);
                }
                ?>
            {   
                name: 'Rele UFR',
                data: [<?php echo $sumamurangUFR; ?>,<?php echo $sumanggrekUFR; ?>,<?php echo $sumBitungUFR?>,<?php echo $sumBorokoUFR?>,<?php echo $sumBotupinggeUFR?>,<?php echo $sumGobarUFR?>,<?php echo $sumIsimuUFR?>,<?php echo $sumKawangkoanUFR?>,<?php echo $sumKemaUFR ?>,<?php echo $sumLikupang70UFR?>,<?php echo $sumLikupang150UFR ?>,<?php echo $sumLolakUFR ?>,<?php echo $sumLopanaUFR;?>,<?php echo $sumMarisaUFR ?>]
            },
            {   
                name: 'Rele OLS',
                data: [<?php echo $sumamurangOLS; ?>,<?php echo $sumanggrekOLS;?>,<?php echo $sumBitungOLS?>,<?php echo $sumBorokoOLS?>,<?php echo $sumBotupinggeOLS?>,<?php echo $sumGobarOLS ?>,<?php echo $sumIsimuOLS ?>,<?php echo $sumKawangkoanOLS?>,<?php echo $sumKemaOLS ?>,<?php echo $sumLikupang70OLS ?>,<?php echo $sumLikupang150OLS?>,<?php echo $sumLolakOLS ?>,<?php echo $sumLopanaOLS;?>,<?php echo $sumMarisaOLS ?>]
            },
            {   
                name: 'Rele OGS',
                data: [<?php echo $sumamurangOGS; ?>,<?php echo $sumanggrekOGS; ?>,<?php echo $sumBitungOGS?>,<?php echo $sumBorokoOGS ?>,<?php echo $sumBotupinggeOGS?>,<?php echo $sumGobarOGS ?>,<?php echo $sumIsimuOGS ?>,<?php echo $sumKawangkoanOGS ?>,<?php echo $sumKemaOGS?>,<?php echo $sumLikupang70OGS ?>,<?php echo $sumLikupang150OGS?>,<?php echo $sumLolakOGS ?>,<?php echo $sumLopanaOLS;?>,<?php echo $sumMarisaOGS ?>]
            },
            {   
                name: 'Rele UPLS',
                data: [<?php echo $sumamurangUPLS; ?>,<?php echo $sumanggrekUPLS; ?>,<?php echo $sumBitungUPLS ?>,<?php echo $sumBorokoUPLS ?>,<?php echo $sumBotupinggeUPLS?>,<?php echo $sumGobarUPLS ?>,<?php echo $sumIsimuUPLS?>,<?php echo $sumKawangkoanUPLS ?>,<?php echo $sumKemaUPLS?>,<?php echo $sumLikupang70UPLS ?>,<?php echo $sumLikupang150UPLS?>,<?php echo $sumLolakUPLS ?>,<?php echo $sumLopanaUPLS;?>,<?php echo $sumMarisaUPLS ?>]
            },
            {   
                name: 'Rele Island',
                data: [<?php echo $sumamurangIsland; ?>,<?php echo $sumanggrekIsland; ?>,<?php echo $sumBitungIsland ?>,<?php echo $sumBorokoIsland?>,<?php echo $sumBotupinggeIsland ?>,<?php echo $sumGobarIsland?>,<?php echo $sumIsimuIsland?>,<?php echo $sumKawangkoanIsland?>,<?php echo $sumKemaIsland ?>,<?php echo $sumLikupang70Island ?>,<?php echo $sumLikupang150Island?>,<?php echo $sumLolakIsland ?>,<?php echo $sumLopanaIsland;?>,<?php echo $sumMarisaIsland ?>]
            },
            {   
                name: 'DFR',
                data: [<?php echo $sumamurangDFR; ?>,<?php echo $sumanggrekDFR; ?>, <?php echo $sumBitungDFR?>,<?php echo $sumBorokoDFR?>,<?php echo $sumBotupinggeDFR ?>,<?php echo $sumGobarDFR ?>,<?php echo $sumIsimuDFR ?>,<?php echo $sumKawangkoanDFR ?>,<?php echo $sumKemaDFR?>,<?php echo $sumLikupang70DFR ?>,<?php echo $sumLikupang150DFR?>,<?php echo $sumLolakDFR?>,<?php echo $sumLopanaDFR;?>,<?php echo $sumMarisaDFR?>]
            }   
            ],
});
        chart1 = new Highcharts.Chart({
    chart: {
        renderTo: 'container1',
        type: 'column'
    },
    title: {
        text: 'List Asset'
    },
    xAxis: {
         categories: [
                    'GI Otam',
                    'GI Paniki',
                    'GI Ranomuut',
                    'GI Sawangan',
                    'GI Sulbagut',
                    'GI Tanjung Merah',
                    'GI Tasikria',
                    'GI Teling',
                    'GI Tilamuta',
                    'GI Tomohon',
                    'GI Tonsea',
                    'GIS Teling',
                    'PLTP Lahendong',
                    'UP2B Minahasa'
                   
                ],
                crosshair: true
    },  
    yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah'
                }
            },
      tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y} Asset</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
    plotOptions: {
        column: {
            dataLabels: {
                enabled: true,
                format: '{point.options.unit}',
                style: {
                    fontWeight: 'bold'
                }
            }
        }
    },
    series: [
                <?php
                {
                include 'config.php';
                $OtamUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Otam'");
                $sumOtamUFR = mysqli_num_rows($OtamUFR);
                }
                {
                include 'config.php';
                $OtamOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Otam'");
                $sumOtamOLS = mysqli_num_rows($OtamOLS);
                }
                {
                include 'config.php';
                $OtamOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Otam'");
                $sumOtamOGS = mysqli_num_rows($OtamOGS);
                }
                {
                include 'config.php';
                $OtamUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Otam'");
                $sumOtamUPLS = mysqli_num_rows($OtamUPLS);
                }
                {
                include 'config.php';
                $OtamIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Otam'");
                $sumOtamIsland = mysqli_num_rows($OtamIsland);
                }
                {
                include 'config.php';
                $OtamDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Otam'");
                $sumOtamDFR = mysqli_num_rows($OtamDFR);
                }
                {
                include 'config.php';
                $PanikiUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Paniki'");
                $sumPanikiUFR = mysqli_num_rows($PanikiUFR);
                }
                {
                include 'config.php';
                $PanikiOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Paniki'");
                $sumPanikiOLS = mysqli_num_rows($PanikiOLS);
                }
                {
                include 'config.php';
                $PanikiOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Paniki'");
                $sumPanikiOGS = mysqli_num_rows($PanikiOGS);
                }
                {
                include 'config.php';
                $PanikiUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Paniki'");
                $sumPanikiUPLS = mysqli_num_rows($PanikiUPLS);
                }
                {
                include 'config.php';
                $PanikiIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Paniki'");
                $sumPanikiIsland = mysqli_num_rows($PanikiIsland);
                }
                {
                include 'config.php';
                $PanikiDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Paniki'");
                $sumPanikiDFR = mysqli_num_rows($PanikiDFR);
                }
                {
                include 'config.php';
                $RanomuutUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Ranomuut'");
                $sumRanomuutUFR = mysqli_num_rows($RanomuutUFR);
                }
                {
                include 'config.php';
                $RanomuutOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Ranomuut'");
                $sumRanomuutOLS = mysqli_num_rows($RanomuutOLS);
                }
                {
                include 'config.php';
                $RanomuutOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Ranomuut'");
                $sumRanomuutOGS = mysqli_num_rows($RanomuutOGS);
                }
                {
                include 'config.php';
                $RanomuutUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Ranomuut'");
                $sumRanomuutUPLS = mysqli_num_rows($RanomuutUPLS);
                }
                {
                include 'config.php';
                $RanomuutIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Ranomuut'");
                $sumRanomuutIsland = mysqli_num_rows($RanomuutIsland);
                }
                {
                include 'config.php';
                $RanomuutDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Ranomuut'");
                $sumRanomuutDFR = mysqli_num_rows($RanomuutDFR);
                }
                {
                include 'config.php';
                $SawanganUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Sawangan'");
                $sumSawanganUFR = mysqli_num_rows($SawanganUFR);
                }
                {
                include 'config.php';
                $SawanganOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Sawangan'");
                $sumSawanganOLS = mysqli_num_rows($SawanganOLS);
                }
                {
                include 'config.php';
                $SawanganOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Sawangan'");
                $sumSawanganOGS = mysqli_num_rows($SawanganOGS);
                }
                {
                include 'config.php';
                $SawanganUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Sawangan'");
                $sumSawanganUPLS = mysqli_num_rows($SawanganUPLS);
                }
                {
                include 'config.php';
                $SawanganIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Sawangan'");
                $sumSawanganIsland = mysqli_num_rows($SawanganIsland);
                }
                {
                include 'config.php';
                $SawanganDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Sawangan'");
                $sumSawanganDFR = mysqli_num_rows($SawanganDFR);
                }
                {
                include 'config.php';
                $SulbagutUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Sulbagut'");
                $sumSulbagutUFR = mysqli_num_rows($SulbagutUFR);
                }
                {
                include 'config.php';
                $SulbagutOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Sulbagut'");
                $sumSulbagutOLS = mysqli_num_rows($SulbagutOLS);
                }
                {
                include 'config.php';
                $SulbagutOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Sulbagut'");
                $sumSulbagutOGS = mysqli_num_rows($SulbagutOGS);
                }
                {
                include 'config.php';
                $SulbagutUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Sulbagut'");
                $sumSulbagutUPLS = mysqli_num_rows($SulbagutUPLS);
                }
                {
                include 'config.php';
                $SulbagutIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Sulbagut'");
                $sumSulbagutIsland = mysqli_num_rows($SulbagutIsland);
                }
                {
                include 'config.php';
                $SulbagutDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Sulbagut'");
                $sumSulbagutDFR = mysqli_num_rows($SulbagutDFR);
                }
                {
                include 'config.php';
                $TanjungMerahUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahUFR = mysqli_num_rows($TanjungMerahUFR);
                }
                {
                include 'config.php';
                $TanjungMerahOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahOLS = mysqli_num_rows($TanjungMerahOLS);
                }
                {
                include 'config.php';
                $TanjungMerahOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahOGS = mysqli_num_rows($TanjungMerahOGS);
                }
                {
                include 'config.php';
                $TanjungMerahUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahUPLS = mysqli_num_rows($TanjungMerahUPLS);
                }
                {
                include 'config.php';
                $TanjungMerahIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahIsland = mysqli_num_rows($TanjungMerahIsland);
                }
                {
                include 'config.php';
                $TanjungMerahDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Tanjung Merah'");
                $sumTanjungMerahDFR = mysqli_num_rows($TanjungMerahDFR);
                }
                {
                include 'config.php';
                $TasikriaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Tasikria'");
                $sumTasikriaUFR = mysqli_num_rows($TasikriaUFR);
                }
                {
                include 'config.php';
                $TasikriaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Tasikria'");
                $sumTasikriaOLS = mysqli_num_rows($TasikriaOLS);
                }
                {
                include 'config.php';
                $TasikriaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Tasikria'");
                $sumTasikriaOGS = mysqli_num_rows($TasikriaOGS);
                }
                {
                include 'config.php';
                $TasikriaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Tasikria'");
                $sumTasikriaUPLS = mysqli_num_rows($TasikriaUPLS);
                }
                {
                include 'config.php';
                $TasikriaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Tasikria'");
                $sumTasikriaIsland = mysqli_num_rows($TasikriaIsland);
                }
                {
                include 'config.php';
                $TasikriaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Tasikria'");
                $sumTasikriaDFR = mysqli_num_rows($TasikriaDFR);
                }
                {
                include 'config.php';
                $TelingUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Teling'");
                $sumTelingUFR = mysqli_num_rows($TelingUFR);
                }
                {
                include 'config.php';
                $TelingOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Teling'");
                $sumTelingOLS = mysqli_num_rows($TelingOLS);
                }
                {
                include 'config.php';
                $TelingOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Teling'");
                $sumTelingOGS = mysqli_num_rows($TelingOGS);
                }
                {
                include 'config.php';
                $TelingUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Teling'");
                $sumTelingUPLS = mysqli_num_rows($TelingUPLS);
                }
                {
                include 'config.php';
                $TelingIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Teling'");
                $sumTelingIsland = mysqli_num_rows($TelingIsland);
                }
                {
                include 'config.php';
                $TelingDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Teling'");
                $sumTelingDFR = mysqli_num_rows($TelingDFR);
                }
                {
                include 'config.php';
                $TilamutaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Tilamuta'");
                $sumTilamutaUFR = mysqli_num_rows($TilamutaUFR);
                }
                {
                include 'config.php';
                $TilamutaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Tilamuta'");
                $sumTilamutaOLS = mysqli_num_rows($TilamutaOLS);
                }
                {
                include 'config.php';
                $TilamutaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Tilamuta'");
                $sumTilamutaOGS = mysqli_num_rows($TilamutaOGS);
                }
                {
                include 'config.php';
                $TilamutaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Tilamuta'");
                $sumTilamutaUPLS = mysqli_num_rows($TilamutaUPLS);
                }
                {
                include 'config.php';
                $TilamutaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Tilamuta'");
                $sumTilamutaIsland = mysqli_num_rows($TilamutaIsland);
                }
                {
                include 'config.php';
                $TilamutaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Tilamuta'");
                $sumTilamutaDFR = mysqli_num_rows($TilamutaDFR);
                }
                {
                include 'config.php';
                $TomohonUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Tomohon'");
                $sumTomohonUFR = mysqli_num_rows($TomohonUFR);
                }
                {
                include 'config.php';
                $TomohonOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Tomohon'");
                $sumTomohonOLS = mysqli_num_rows($TomohonOLS);
                }
                {
                include 'config.php';
                $TomohonOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Tomohon'");
                $sumTomohonOGS = mysqli_num_rows($TomohonOGS);
                }
                {
                include 'config.php';
                $TomohonUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Tomohon'");
                $sumTomohonUPLS = mysqli_num_rows($TomohonUPLS);
                }
                {
                include 'config.php';
                $TomohonIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Tomohon'");
                $sumTomohonIsland = mysqli_num_rows($TomohonIsland);
                }
                {
                include 'config.php';
                $TomohonDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Tomohon'");
                $sumTomohonDFR = mysqli_num_rows($TomohonDFR);
                }
                {
                include 'config.php';
                $TonseaUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GI Tonsea'");
                $sumTonseaUFR = mysqli_num_rows($TonseaUFR);
                }
                {
                include 'config.php';
                $TonseaOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GI Tonsea'");
                $sumTonseaOLS = mysqli_num_rows($TonseaOLS);
                }
                {
                include 'config.php';
                $TonseaOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GI Tonsea'");
                $sumTonseaOGS = mysqli_num_rows($TonseaOGS);
                }
                {
                include 'config.php';
                $TonseaUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GI Tonsea'");
                $sumTonseaUPLS = mysqli_num_rows($TonseaUPLS);
                }
                {
                include 'config.php';
                $TonseaIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GI Tonsea'");
                $sumTonseaIsland = mysqli_num_rows($TonseaIsland);
                }
                {
                include 'config.php';
                $TonseaDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GI Tonsea'");
                $sumTonseaDFR = mysqli_num_rows($TonseaDFR);
                }
                {
                include 'config.php';
                $STelingUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'GIS Teling'");
                $sumSTelingUFR = mysqli_num_rows($STelingUFR);
                }
                {
                include 'config.php';
                $STelingOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'GIS Teling'");
                $sumSTelingOLS = mysqli_num_rows($STelingOLS);
                }
                {
                include 'config.php';
                $STelingOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'GIS Teling'");
                $sumSTelingOGS = mysqli_num_rows($STelingOGS);
                }
                {
                include 'config.php';
                $STelingUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'GIS Teling'");
                $sumSTelingUPLS = mysqli_num_rows($STelingUPLS);
                }
                {
                include 'config.php';
                $STelingIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'GIS Teling'");
                $sumSTelingIsland = mysqli_num_rows($STelingIsland);
                }
                {
                include 'config.php';
                $STelingDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'GIS Teling'");
                $sumSTelingDFR = mysqli_num_rows($STelingDFR);
                }

                {
                include 'config.php';
                $lahendongUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'PLTP Lahendong'");
                $sumlahendongUFR = mysqli_num_rows($lahendongUFR);
                }
                {
                include 'config.php';
                $lahendongOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'PLTP Lahendong'");
                $sumlahendongOLS = mysqli_num_rows($lahendongOLS);
                }
                {
                include 'config.php';
                $lahendongOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'PLTP Lahendong'");
                $sumlahendongOGS = mysqli_num_rows($lahendongOGS);
                }
                {
                include 'config.php';
                $lahendongUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'PLTP Lahendong'");
                $sumlahendongUPLS = mysqli_num_rows($lahendongUPLS);
                }
                {
                include 'config.php';
                $lahendongIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'PLTP Lahendong'");
                $sumlahendongIsland = mysqli_num_rows($lahendongIsland);
                }
                {
                include 'config.php';
                $lahendongDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'PLTP Lahendong'");
                $sumlahendongDFR = mysqli_num_rows($lahendongDFR);
                }
                {
                include 'config.php';
                $UP2BUFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UFR' and unit_name = 'UP2B Minahasa'");
                $sumUP2BUFR = mysqli_num_rows($UP2BUFR);
                }
                {
                include 'config.php';
                $UP2BOLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OLS' and unit_name = 'UP2B Minahasa'");
                $sumUP2BOLS = mysqli_num_rows($UP2BOLS);
                }
                {
                include 'config.php';
                $UP2BOGS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele OGS' and unit_name = 'UP2B Minahasa'");
                $sumUP2BOGS = mysqli_num_rows($UP2BOGS);
                }
                {
                include 'config.php';
                $UP2BUPLS = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele UPLS' and unit_name = 'UP2B Minahasa'");
                $sumUP2BUPLS = mysqli_num_rows($UP2BUPLS);
                }
                {
                include 'config.php';
                $UP2BIsland = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'Rele Island' and unit_name = 'UP2B Minahasa'");
                $sumUP2BIsland = mysqli_num_rows($UP2BIsland);
                }
                {
                include 'config.php';
                $UP2BDFR = mysqli_query($conn,"SELECT * FROM assets where asset_name = 'DFR' and unit_name = 'UP2B Minahasa'");
                $sumUP2BDFR = mysqli_num_rows($UP2BDFR);
                }
                ?>

            {   
                name: 'Rele UFR',
                data: [<?php echo $sumOtamUFR ?>,<?php echo $sumPanikiUFR ?>,<?php echo $sumRanomuutUFR?>,<?php echo $sumSawanganUFR ?>,<?php echo $sumSulbagutUFR?>,<?php echo $sumTanjungMerahUFR ?>,<?php echo $sumTasikriaUFR?>,<?php echo $sumTelingUFR ?>, <?php echo $sumTilamutaUFR ?>, <?php echo $sumTomohonUFR ?>, <?php echo $sumTonseaUFR ?>, <?php echo $sumSTelingUFR ?>, <?php echo $sumlahendongUFR ?>,<?php echo $sumUP2BUFR ?>]
            },
            {   
                name: 'Rele OLS',
                data: [<?php echo $sumOtamOLS ?>,<?php echo $sumPanikiOLS ?>,<?php echo $sumRanomuutOLS?>,<?php echo $sumSawanganOLS ?>,<?php echo $sumSulbagutOLS?>,<?php echo $sumTanjungMerahOLS ?>, <?php echo $sumTasikriaOLS ?>, <?php echo $sumTelingOLS ?>, <?php echo $sumTilamutaOLS ?>, <?php echo $sumTomohonOLS ?>, <?php echo $sumTonseaOLS ?>, <?php echo $sumSTelingOLS ?>, <?php echo $sumlahendongOLS?>,<?php echo $sumUP2BOLS ?>]
            },
            {   
                name: 'Rele OGS',
                data: [<?php echo $sumOtamOGS ?>,<?php echo $sumPanikiOGS ?>,<?php echo $sumRanomuutOGS?>,<?php echo $sumSawanganOGS ?>,<?php echo $sumSulbagutOGS?>,<?php echo $sumTanjungMerahOGS ?>, <?php echo $sumTasikriaOGS ?>, <?php echo $sumTelingOGS ?>, <?php echo $sumTilamutaOGS ?>, <?php echo $sumTomohonOGS ?>, <?php echo $sumTonseaOGS ?>, <?php echo $sumSTelingOGS ?>,<?php echo $sumlahendongOGS?>, <?php echo $sumUP2BOGS ?>]
            },
            {   
                name: 'Rele UPLS',
                data: [<?php echo $sumOtamUPLS ?>,<?php echo $sumPanikiUPLS ?>,<?php echo $sumRanomuutUPLS?>,<?php echo $sumSawanganUPLS ?>,<?php echo $sumSulbagutUPLS?>,<?php echo $sumTanjungMerahUPLS ?>,<?php echo $sumTasikriaUPLS?>, <?php echo $sumTelingUPLS ?>, <?php echo $sumTilamutaUPLS ?>, <?php echo $sumTomohonUPLS ?>, <?php echo $sumTonseaUPLS ?>, <?php echo $sumSTelingUPLS ?>, <?php echo $sumlahendongUPLS?>, <?php echo $sumUP2BUPLS ?>]
            },
            {   
                name: 'Rele Island',
                data: [<?php echo $sumOtamIsland ?>,<?php echo $sumPanikiIsland ?>,<?php echo $sumRanomuutIsland?>,<?php echo $sumSawanganIsland ?>,<?php echo $sumSulbagutIsland?>,<?php echo $sumTanjungMerahIsland ?>, <?php echo $sumTasikriaIsland ?>, <?php echo $sumTelingIsland ?>, <?php echo $sumTilamutaIsland ?>, <?php echo $sumTomohonIsland ?>, <?php echo $sumTonseaIsland ?>, <?php echo $sumSTelingIsland ?>, <?php echo $sumlahendongIsland?>,<?php echo $sumUP2BIsland ?>]
            },
            {   
                name: 'DFR',
                data: [<?php echo $sumOtamDFR ?>,<?php echo $sumPanikiDFR ?>,<?php echo $sumRanomuutDFR?>,<?php echo $sumSawanganDFR ?>,<?php echo $sumSulbagutDFR?>,<?php echo $sumTanjungMerahDFR ?>, <?php echo $sumTasikriaDFR ?>, <?php echo $sumTelingDFR ?>, <?php echo $sumTilamutaDFR ?>, <?php echo $sumTomohonDFR ?>, <?php echo $sumTonseaDFR ?>, <?php echo $sumSTelingDFR ?>, <?php echo $sumlahendongDFR?>, <?php echo $sumUP2BDFR ;?>]
            }   
            ],
});

        }); 
	</script>
	<script src="jsonpiechart/assets/js/highcharts.js"></script>
	<script src="jsonpiechart/assets/js/exporting.js"></script>
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
        <h1 class="title" >PLN UP2B Minahasa</h1>
        <h3 class="desc" >Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home" class="active">Home</a></li>
                <li><a href="register.php?page=register">Register</a></li>
                <li><a href="listunit.php?page=list" >List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" >Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>
    <?php  
      } else {
    ?>  
    <header>
      <h1 class="title" >PLN UP2B Minahasa</h1>
        <h3 class="desc" >Web Management Pemeliharaan</h3>
        <nav id="navigation" class="nav">
            <ul class="isi">
                <li><a href="index2.php?page=home" class="active">Home</a></li>
                <li><a href="listunit.php?page=list" >List GI</a></li>
                <li><a href="pagedownload.php?page=pagedownload" >Laporan Maintenance</a></li>
                <li><a href="logout.php?page=logout">Logout</a></li>
            </ul>
        </nav>
    </header>    
    <?php
      }
    ?>
        

<div class="container" style="margin-top:5px">

  <div class="col-md-4">
        <div class="panel-body4">
          <div id ="container"></div>
        </div>
  </div>
  <div class="col-md-3">
        <div class="panel-body4">
          <div id ="container1"></div>
        </div>
  </div>
  <div class="All">
    <div id ="All"></div>     
  </div>
  <div class="Amurang">
    <div id ="Amurang"></div>     
  </div>
  <div class="Anggrek">
    <div id ="Anggrek"></div>     
  </div>
  <div class="Bitung">
    <div id ="Bitung"></div>     
  </div>
  <div class="Boroko">
    <div id ="Boroko"></div>     
  </div>
  <div class="Botupingge">
    <div id ="Botupingge"></div>     
  </div>
  <div class="Gobar">
    <div id ="Gobar"></div>     
  </div>
  <div class="Isimu">
    <div id ="Isimu"></div>     
  </div>
  <div class="Kawangkoan">
    <div id ="Kawangkoan"></div>     
  </div>
  <div class="Kema">
    <div id ="Kema"></div>     
  </div>
  <div class="Likupang150">
    <div id ="Likupang150"></div> 
  </div>
  <div class="Likupang70">
    <div id ="Likupang70"></div>     
  </div>
  <div class="Lolak">
    <div id ="Lolak"></div>     
  </div>
  <div class="Lopana">
    <div id ="Lopana"></div>     
  </div>
  <div class="Marisa">
    <div id ="Marisa"></div>     
  </div>
  <div class="Otam">
    <div id ="Otam"></div>     
  </div>
  <div class="Paniki">
    <div id ="Paniki"></div>     
  </div>
  <div class="Ranomuut">
    <div id ="Ranomuut"></div>     
  </div>
  <div class="Sawangan">
    <div id ="Sawangan"></div>     
  </div>
  <div class="Sulbagut">
    <div id ="Sulbagut"></div>     
  </div>
  <div class="Merah">
    <div id ="Merah"></div>     
  </div>
  <div class="Tasikria">
    <div id ="Tasikria"></div>     
  </div>
  <div class="Teling">
    <div id ="Teling"></div>     
  </div>
  <div class="Tilamuta">
    <div id ="Tilamuta"></div>     
  </div>
  <div class="Tomohon">
    <div id ="Tomohon"></div>     
  </div>
  <div class="Tonsea">
    <div id ="Tonsea"></div>     
  </div>
  <div class="STeling">
    <div id ="STeling"></div>     
  </div>
  <div class="Lahendong">
    <div id ="Lahendong"></div>     
  </div>
  <div class="UP2B">
	<div id ="UP2B"></div>
  </div>
</div>

<script src="jsonpiechart/assets/js/highcharts.js"></script>
<script src="jsonpiechart/assets/js/jquery-1.10.1.min.js"></script>

</body>
</html>
