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
        $this->cell(100,10,'Relay Proteksi Sistem',0,0,'C');
        
        
          
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
$pdf->Cell(20,10,'Lokasi','T');
$pdf->cell(70,10,": " .$unit,'T,R');

$pdf->setY(50);
$pdf->cell(10);
$pdf->Cell(15,10,'Merk','L');
$pdf->Cell(65,10,": ".$row['merk'],0);

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(20,10,'Tanggal',0);
$pdf->cell(70,10,": " .$tanggal,'R');

$pdf->setY(60);
$pdf->cell(10);
$pdf->Cell(15,10,'Type','L');
$pdf->Cell(65,10,": ".$row['type'],0);

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(20,10,'Bay',0);
$pdf->cell(70,10,": " .$row['bay'],'R');

$pdf->setY(70);
$pdf->cell(10);
$pdf->Cell(15,10,'SN','L,B');
$pdf->Cell(65,10,": ".$sn,'B');

$pdf->SetX(65);
$pdf->cell(35);
$pdf->Cell(20,10,'Ratio VT','B');
$pdf->cell(70,10,": ".$ratio,'R,B');

$pdf->SetX(65);
$pdf->setY(90);
$pdf->SetFont('Times','B',14);
$pdf->cell(10);
$pdf->cell(25,10,'I. Check List',0);

$pdf->SetX(65);
$pdf->setY(100);
$pdf->SetFont('Times','B',14);
$pdf->cell(10);
$pdf->cell(25,10,'Rele',0);

$setting_ufr = "

INSERT INTO tmp1
SELECT * FROM setting_ufr where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$ufr = mysqli_query($conn,$setting_ufr);

$setting_ufr1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$ufr1 = mysqli_query($conn,$setting_ufr1);

$setting_ufr2 = "DELETE from tmp1";
$ufr2 = mysqli_query($conn,$setting_ufr2);

$rowufr=mysqli_fetch_array($ufr1);

if ($rowufr['value']=='1') {    
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
$pdf->cell(40,10,'Setting UFR Island Enable',0);

$cek_value = "

INSERT INTO tmp1
SELECT * FROM cek_value where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$value = mysqli_query($conn,$cek_value);

$cek_value1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$value1 = mysqli_query($conn,$cek_value1);

$cek_value2 = "DELETE from tmp1";
$value2 = mysqli_query($conn,$cek_value2);

$rowvalue=mysqli_fetch_array($value1);

if ($rowvalue['value']=='1') {    
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
$pdf->cell(40,10,'Cek Value Setting',0);

$cek_tegangan = "

INSERT INTO tmp1
SELECT * FROM cek_tegangan where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

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

$cek_frekuensi = "

INSERT INTO tmp1
SELECT * FROM cek_frekuensi where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$frekuensi = mysqli_query($conn,$cek_frekuensi);

$cek_frekuensi1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$frekuensi1 = mysqli_query($conn,$cek_frekuensi1);

$cek_frekuensi2 = "DELETE from tmp1";
$frekuensi2 = mysqli_query($conn,$cek_frekuensi2);

$rowfrekuensi=mysqli_fetch_array($frekuensi1);

if ($rowfrekuensi['value']=='1') {    
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
$pdf->cell(40,10,'Cek Measurment Frekuensi',0);

$cek_time = "

INSERT INTO tmp1
SELECT * FROM cek_time where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

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

$cek_pt = "

INSERT INTO tmp1
SELECT * FROM cek_pt where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$pt = mysqli_query($conn,$cek_pt);

$cek_pt1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$pt1 = mysqli_query($conn,$cek_pt1);

$cek_pt2 = "DELETE from tmp1";
$pt2 = mysqli_query($conn,$cek_pt2);

$rowpt=mysqli_fetch_array($pt1);

if ($rowpt['value']=='1') {    
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
$pdf->cell(40,10,'Cek Ratio PT',0);

$pdf->SetX(120);
$pdf->setY(100);
$pdf->SetFont('Times','B',14);
$pdf->cell(100);
$pdf->cell(25,10,'Wiring',0);

$cek_negative = "

INSERT INTO tmp1
SELECT * FROM standby_negative where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

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
$pdf->cell(40,10,'Standby Negative Trip di Selektor',0);

$cek_positive = "

INSERT INTO tmp1
SELECT * FROM standby_positive where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

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
$pdf->cell(40,10,'Standby Positive Trip di Selektor',0);

$cek_tarikan = "

INSERT INTO tmp1
SELECT * FROM tarikan_rangkaian where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$tarikan = mysqli_query($conn,$cek_tarikan);

$cek_tarikan1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$tarikan1 = mysqli_query($conn,$cek_tarikan1);

$cek_tarikan2 = "DELETE from tmp1";
$tarikan2 = mysqli_query($conn,$cek_tarikan2);

$rowtarikan=mysqli_fetch_array($tarikan1);

if ($rowtarikan['value']=='1') {    
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
$pdf->cell(40,10,'Tarikan Rangkaian Trip Antar Panel',0);

$cek_posisi = "

INSERT INTO tmp1
SELECT * FROM posisi_aux where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

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
$pdf->cell(40,10,'Posisi Aux Relay',0);

$cek_terminal = "

INSERT INTO tmp1
SELECT * FROM terminal_rangkaian where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$terminal = mysqli_query($conn,$cek_terminal);

$cek_terminal1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$terminal1 = mysqli_query($conn,$cek_terminal1);

$cek_terminal2 = "DELETE from tmp1";
$terminal2 = mysqli_query($conn,$cek_terminal2);

$rowterminal=mysqli_fetch_array($terminal1);

if ($rowterminal['value']=='1') {    
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
$pdf->cell(40,10,'Periksa Terminal Rangkaian',0);

$cek_rangkaian = "

INSERT INTO tmp1
SELECT * FROM rangkaian_relay where pengawas = '$pengawas' and penguji = '$penguji' and sn = '$sn'";

$rangkaian = mysqli_query($conn,$cek_rangkaian);

$cek_rangkaian1 = "SELECT * from tmp1 where id = (select max(id) from tmp1)";
$rangkaian1 = mysqli_query($conn,$cek_rangkaian1);

$cek_rangkaian2 = "DELETE from tmp1";
$rangkaian2 = mysqli_query($conn,$cek_rangkaian2);

$rowrangkaian=mysqli_fetch_array($rangkaian1);

if ($rowrangkaian['value']=='1') {    
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
$pdf->cell(40,10,'Periksa Rangkaian pada Relay',0);

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