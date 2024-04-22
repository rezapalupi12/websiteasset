<?php
include 'config.php';
 
 //export table data to excel
 
if(isset($_GET['export']))
{
 
  $output = "";
         
        $output .= '<table class="table table-bordered" border="1">  
                    <tr>
                    <th colspan="10" style="text-align: center;font-size: 30px">Data Rele OLS</th>
                    </tr>
                    <tr>  
                          <th scope="col" style="background-color: #808080;">No</th>
                          <th scope="col" style="background-color: #808080;">Nama Unit</th>
                          <th scope="col" style="background-color: #808080;">Nama Asset</th>
                          <th scope="col" style="background-color: #808080;">Merk</th>
                          <th scope="col" style="background-color: #808080;">Type</th>
                          <th scope="col" style="background-color: #808080;">Serial Number</th>
                          <th scope="col" style="background-color: #808080;">Bay</th>
                          <th scope="col" style="background-color: #808080;">IP</th>
                          <th scope="col" style="background-color: #808080;">Firmware</th>
                          <th scope="col" style="background-color: #808080;">Status</th>
                    </tr>';
             
  $sql = "call dfr()";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->get_result(); // Get the result set
  $data = $result->fetch_all(MYSQLI_ASSOC); // Fetch data as associative array 
        
foreach($data as $key=>$value){
 
    $output .= '<tr>  
                         <td>'.($key+1).'</td>   
                         <td>'.$value['unit_name'].'</td> 
                         <td>'.$value['asset_name'].'</td>  
                         <td>'.$value['merk'].'</td>    
                         <td>'.$value['type'].'</td> 
                         <td>'.$value['serial_number'].'</td> 
                         <td>'.$value['bay'].'</td>
                         <td>'.$value['ip'].'</td>
                         <td>'.$value['firmware'].'</td>
                         <td>'.$value['status'].'</td>
                          
                    </tr>';  
        }
          
        $output .= '</table>';
        
        $filename = "Data DFR_".date('Ymd') . ".xls";         
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");  
        echo $output;
      }   
?>