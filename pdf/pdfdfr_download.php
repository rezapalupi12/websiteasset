<?php
  
require('fpdf.php');
include 'config.php';
error_reporting(0);
session_start();

if(isset($SESSION['username'])){
	header("Location:index2.php");
}
  
class PDF extends FPDF {
  function drawTextBox($strText, $w, $h, $align='L', $valign='T', $border=true)
{
    $xi=$this->GetX();
    $yi=$this->GetY();
    
    $hrow=$this->FontSize;
    $textrows=$this->drawRows($w,$hrow,$strText,0,$align,0,0,0);
    $maxrows=floor($h/$this->FontSize);
    $rows=min($textrows,$maxrows);

    $dy=0;
    if (strtoupper($valign)=='M')
        $dy=($h-$rows*$this->FontSize)/2;
    if (strtoupper($valign)=='B')
        $dy=$h-$rows*$this->FontSize;

    $this->SetY($yi+$dy);
    $this->SetX($xi);

    $this->drawRows($w,$hrow,$strText,0,$align,false,$rows,1);

    if ($border)
        $this->Rect($xi,$yi,$w,$h);
}

function drawRows($w, $h, $txt, $border=0, $align='J', $fill=false, $maxline=0, $prn=0)
{
    if(!isset($this->CurrentFont))
        $this->Error('No font has been set');
    $cw=$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',(string)$txt);
    $nb=strlen($s);
    if($nb>0 && $s[$nb-1]=="\n")
        $nb--;
    $b=0;
    if($border)
    {
        if($border==1)
        {
            $border='LTRB';
            $b='LRT';
            $b2='LR';
        }
        else
        {
            $b2='';
            if(is_int(strpos($border,'L')))
                $b2.='L';
            if(is_int(strpos($border,'R')))
                $b2.='R';
            $b=is_int(strpos($border,'T')) ? $b2.'T' : $b2;
        }
    }
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $ns=0;
    $nl=1;
    while($i<$nb)
    {
        //Get next character
        $c=$s[$i];
        if($c=="\n")
        {
            //Explicit line break
            if($this->ws>0)
            {
                $this->ws=0;
                if ($prn==1) $this->_out('0 Tw');
            }
            if ($prn==1) {
                $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
            }
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
            continue;
        }
        if($c==' ')
        {
            $sep=$i;
            $ls=$l;
            $ns++;
        }
        $l+=$cw[$c];
        if($l>$wmax)
        {
            //Automatic line break
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
                if($this->ws>0)
                {
                    $this->ws=0;
                    if ($prn==1) $this->_out('0 Tw');
                }
                if ($prn==1) {
                    $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
                }
            }
            else
            {
                if($align=='J')
                {
                    $this->ws=($ns>1) ? ($wmax-$ls)/1000*$this->FontSize/($ns-1) : 0;
                    if ($prn==1) $this->_out(sprintf('%.3F Tw',$this->ws*$this->k));
                }
                if ($prn==1){
                    $this->Cell($w,$h,substr($s,$j,$sep-$j),$b,2,$align,$fill);
                }
                $i=$sep+1;
            }
            $sep=-1;
            $j=$i;
            $l=0;
            $ns=0;
            $nl++;
            if($border && $nl==2)
                $b=$b2;
            if ( $maxline && $nl > $maxline )
                return substr($s,$i);
        }
        else
            $i++;
    }
    //Last chunk
    if($this->ws>0)
    {
        $this->ws=0;
        if ($prn==1) $this->_out('0 Tw');
    }
    if($border && is_int(strpos($border,'B')))
        $b.='B';
    if ($prn==1) {
        $this->Cell($w,$h,substr($s,$j,$i-$j),$b,2,$align,$fill);
    }
    $this->x=$this->lMargin;
    return $nl;
}
    // Page header
    function Header() {
          
        // Add logo to page
        $this->Image('LogoPLN.jpg',10,9,15);
        $this->SetX(100);
        $this->setY(13);
        $this->SetFont('Arial','B',10);
        $this->Cell(15);
        $this->multicell(35,5,'PT PLN Persero UP2B Minahasa',0,'L',false);
        $this->SetFont('Arial','B',20);
        $this->SetX(100);
        $this->setY(8);
        $this->cell(50);
        $this->cell(100,10,'Scanning Online',0,0,'C');
        $this->ln(10);
        $this->cell(50);
        $this->cell(100,10,'Disturbance Fault Recorder',0,0,'C');
        
        
          
        // Line break
        $this->Ln(20);
    }
  
    // Page footer
    function Footer() {
          
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
          
        // Arial italic 8
        $this->SetFont('Arial','I',8);
          
        // Page number
        $this->Cell(0,10,'Page ' . 
        $this->PageNo() . '/{nb}',0,0,'C');
    }
}

$unit = $_GET['unit'];
$asset = $_GET['asset'];
$tanggal = $_GET['tanggal'];
$pengawas = $_GET['pengawas'];
$penguji = $_GET['penguji'];
$sn = $_GET['sn'];
$ratio = $_GET['ratio'];

$sql = "SELECT * FROM assets where serial_number = '$sn'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$sql1="SELECT * FROM units where unit_name= '$unit'";
$result1 = mysqli_query($conn,$sql1);
$row1 = mysqli_fetch_array($result1);


// Instantiation of FPDF class
$pdf = new PDF();
  
// Define alias for number of pages
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',14);

$pdf->SetX(0);
$pdf->setY(40);
$pdf->cell(10);
$pdf->Cell(15,10,'Asset','L,T');
$pdf->Cell(65,10,": ".$row['asset_name'],'T');

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(28,10,'Lokasi','T');
$pdf->cell(62,10,": " .$unit,'T,R');

$pdf->setY(50);
$pdf->cell(10);
$pdf->Cell(15,10,'Merk','L');
$pdf->Cell(65,10,": ".$row['merk'],0);

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(28,10,'Tanggal',0);
$pdf->cell(62,10,": " .$tanggal,'R');

$pdf->setY(60);
$pdf->cell(10);
$pdf->Cell(15,10,'Type','L');
$pdf->Cell(65,10,": ".$row['type'],0);

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(28,10,'Bay',0);
$pdf->cell(62,10,": " .$row['bay'],'R');

$pdf->setY(70);
$pdf->cell(10);
$pdf->Cell(15,10,'SN','L,B');
$pdf->Cell(65,10,": ".$sn,'B');

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(28,10,'Ratio VT','B');
$pdf->cell(62,10,": ".$ratio,'R,B');

$pdf->SetX(65);
$pdf->setY(90);
$pdf->SetFont('Times','B',14);
$pdf->cell(10);
$pdf->cell(25,10,'I. Check List',0);

$pdf->SetX(65);
$pdf->setY(100);
$pdf->SetFont('Times','B',14);
$pdf->cell(10);
$pdf->cell(25,10,'Disturbance Fault Recorder (DFR)',0);


$setting_val_dfr = "

INSERT INTO tmp1
SELECT * FROM setting_val_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$val_dfr = mysqli_query($conn,$setting_val_dfr);

$setting_val_dfr1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$val_dfr1 = mysqli_query($conn,$setting_val_dfr1);

$setting_val_dfr2 = "DELETE from tmp1";
$val_dfr2 = mysqli_query($conn,$setting_val_dfr2);

$rowdfr=mysqli_fetch_array($val_dfr1);

if ($rowdfr['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(112);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');
}

else{
$pdf->SetX(65);
$pdf->sety(112);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');    
}


$pdf->SetX(65);
$pdf->sety(110);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Setting Value DFR',0);

$cek_alarm_dfr = "

INSERT INTO tmp1
SELECT * FROM cek_alarm_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$alarm = mysqli_query($conn,$cek_alarm_dfr);

$cek_alarm_dfr1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$alarm1 = mysqli_query($conn,$cek_alarm_dfr1);

$cek_alarm_dfr2 = "DELETE from tmp1";
$alarm2 = mysqli_query($conn,$cek_alarm_dfr2);

$rowalarm=mysqli_fetch_array($alarm1);

if ($rowalarm['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(120);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(65);
$pdf->sety(120);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(65);
$pdf->sety(118);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Indikasi Alarm',0);

$cek_tegangan = "

INSERT INTO tmp1
SELECT * FROM cek_tegangan_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$tegangan = mysqli_query($conn,$cek_tegangan);

$cek_tegangan1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$tegangan1 = mysqli_query($conn,$cek_tegangan1);

$cek_tegangan2 = "DELETE from tmp1";
$tegangan2 = mysqli_query($conn,$cek_tegangan2);

$rowtegangan=mysqli_fetch_array($tegangan1);

if ($rowtegangan['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(128);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(65);
$pdf->sety(128);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(65);
$pdf->sety(126);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Measurment Tegangan',0);

$cek_arus = "

INSERT INTO tmp1
SELECT * FROM cek_arus_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$arus = mysqli_query($conn,$cek_arus);

$cek_arus1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$arus1 = mysqli_query($conn,$cek_arus1);

$cek_arus2 = "DELETE from tmp1";
$arus2 = mysqli_query($conn,$cek_arus2);

$rowarus=mysqli_fetch_array($arus1);

if ($rowarus['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(136);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(65);
$pdf->sety(136);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(65);
$pdf->sety(134);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Measurment Arus',0);

$cek_time = "

INSERT INTO tmp1
SELECT * FROM cek_time_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$time = mysqli_query($conn,$cek_time);

$cek_time1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$time1 = mysqli_query($conn,$cek_time1);

$cek_time2 = "DELETE from tmp1";
$time2 = mysqli_query($conn,$cek_time2);

$rowtime=mysqli_fetch_array($time1);

if ($rowtime['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(144);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(65);
$pdf->sety(144);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(65);
$pdf->sety(142);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Time Relay',0);

$cek_bay = "

INSERT INTO tmp1
SELECT * FROM cek_bay_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$bay = mysqli_query($conn,$cek_bay);

$cek_bay1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$bay1 = mysqli_query($conn,$cek_bay1);

$cek_bay2 = "DELETE from tmp1";
$bay2 = mysqli_query($conn,$cek_bay2);

$rowbay=mysqli_fetch_array($bay1);

if ($rowbay['value']=='1') {    
$pdf->SetX(65);
$pdf->sety(152);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(65);
$pdf->sety(152);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(13);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(65);
$pdf->sety(150);
$pdf->SetFont('Times','',12);
$pdf->cell(20);
$pdf->cell(40,10,'Cek Nama Bay',0);

$pdf->SetX(120);
$pdf->setY(100);
$pdf->SetFont('Times','B',14);
$pdf->cell(100);
$pdf->cell(25,10,'Wiring',0);

$cek_negative = "

INSERT INTO tmp1
SELECT * FROM standby_negative_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$negative = mysqli_query($conn,$cek_negative);

$cek_negative1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$negative1 = mysqli_query($conn,$cek_negative1);

$cek_negative2 = "DELETE from tmp1";
$negative2 = mysqli_query($conn,$cek_negative2);

$rownegative=mysqli_fetch_array($negative1);

if ($rownegative['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(112);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(112);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(110);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Standby Negative 110 VDC AUX',0);

$cek_positive = "

INSERT INTO tmp1
SELECT * FROM standby_positive_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$positive = mysqli_query($conn,$cek_positive);

$cek_positive1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$positive1 = mysqli_query($conn,$cek_positive1);

$cek_positive2 = "DELETE from tmp1";
$positive2 = mysqli_query($conn,$cek_positive2);

$rowpositive=mysqli_fetch_array($positive1);

if ($rowpositive['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(120);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(120);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(118);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Standby Positive Indikasi',0);

$cek_clam = "

INSERT INTO tmp1
SELECT * FROM clam_ct_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$clam = mysqli_query($conn,$cek_clam);

$cek_clam1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$clam1 = mysqli_query($conn,$cek_clam1);

$cek_clam2 = "DELETE from tmp1";
$clam2 = mysqli_query($conn,$cek_clam2);

$rowclam=mysqli_fetch_array($clam1);

if ($rowclam['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(128);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(128);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(126);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Clam CT DFR',0);

$cek_posisi = "

INSERT INTO tmp1
SELECT * FROM posisi_aux_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$posisi = mysqli_query($conn,$cek_posisi);

$cek_posisi1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$posisi1 = mysqli_query($conn,$cek_posisi1);

$cek_posisi2 = "DELETE from tmp1";
$posisi2 = mysqli_query($conn,$cek_posisi2);

$rowposisi=mysqli_fetch_array($posisi1);

if ($rowposisi['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(136);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(136);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(134);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Posisi Aux Relay Input',0);

$cek_pt = "

INSERT INTO tmp1
SELECT * FROM pt_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$pt = mysqli_query($conn,$cek_pt);

$cek_pt1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$pt1 = mysqli_query($conn,$cek_pt1);

$cek_pt2 = "DELETE from tmp1";
$pt2 = mysqli_query($conn,$cek_pt2);

$rowpt=mysqli_fetch_array($pt1);

if ($rowpt['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(144);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(144);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(142);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Ukur Tegangan PT',0);


$cek_bersih = "

INSERT INTO tmp1
SELECT * FROM kebersihan_dfr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$bersih = mysqli_query($conn,$cek_bersih);

$cek_bersih1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$bersih1 = mysqli_query($conn,$cek_bersih1);

$cek_bersih2 = "DELETE from tmp1";
$bersih2 = mysqli_query($conn,$cek_bersih2);

$rowbersih=mysqli_fetch_array($bersih1);

if ($rowbersih['value']=='1') {    
$pdf->SetX(120);
$pdf->sety(152);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'4',1,0,'L');

}

else{$pdf->SetX(120);
$pdf->sety(152);
$pdf->SetFont('ZapfDingbats','', 14);
$pdf->cell(103);
$pdf->cell(5,5,'',1,0,'L');
   
}

$pdf->SetX(120);
$pdf->sety(150);
$pdf->SetFont('Times','',12);
$pdf->cell(110);
$pdf->cell(40,10,'Bersihkan DFR dan Panel',0);

$pdf->SetX(65);
$pdf->setY(160);
$pdf->SetFont('Times','B',14);
$pdf->cell(10);
$pdf->cell(25,10,'II. Catatan',0);

$cek_catatan = "

INSERT INTO tmp2
SELECT * FROM catatan where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$catatan = mysqli_query($conn,$cek_catatan);

$cek_catatan1 = "SELECT * from tmp2 where id = (select max(id) from tmp2)";
$catatan1 = mysqli_query($conn,$cek_catatan1);

$cek_catatan2 = "DELETE from tmp2";
$catatan2 = mysqli_query($conn,$cek_catatan2);

$rowcatatan=mysqli_fetch_array($catatan1);


$pdf->SetXY(25,170);
$pdf->drawTextBox($rowcatatan['value'], 160, 70, 'L', 'T');

$pdf->SetX(100);
$pdf->sety(240);
$pdf->SetFont('Times','B',12);
$pdf->cell(3);
$pdf->cell(40,10,'Mengetahui',0,0,'C');

$pdf->SetX(100);
$pdf->sety(260);
$pdf->SetFont('Times','B',12);
$pdf->cell(3);
$pdf->cell(40,10,'Moch. Hafid',0,0,'C');

$pdf->SetX(100);
$pdf->sety(240);
$pdf->SetFont('Times','B',12);
$pdf->cell(50);
$pdf->cell(40,10,'Koor/SPV GI',0,0,'C');

$pdf->SetX(100);
$pdf->sety(260);
$pdf->SetFont('Times','B',12);
$pdf->cell(50);
$pdf->cell(40,10,$row1['koordinator'],0,0,'C');

$pdf->SetX(100);
$pdf->sety(240);
$pdf->SetFont('Times','B',12);
$pdf->cell(100);
$pdf->cell(40,10,'Pengawas',0,0,'C');

$pdf->SetX(100);
$pdf->sety(260);
$pdf->SetFont('Times','B',12);
$pdf->cell(100);
$pdf->cell(40,10,$pengawas,0,0,'C');

$pdf->SetX(100);
$pdf->sety(240);
$pdf->SetFont('Times','B',12);
$pdf->cell(150);
$pdf->cell(40,10,'Pelaksana',0,0,'C');

$pdf->SetX(100);
$pdf->sety(260);
$pdf->SetFont('Times','B',12);
$pdf->cell(150);
$pdf->cell(40,10,$penguji,0,0,'C');

$sn1 = str_replace("/","", $sn);
$filename = $tanggal.'_'.$asset.'_'.$sn1.'_'.$unit;
$location = $filename.'.pdf';
$pdf->Output("D", $location);

  
?>