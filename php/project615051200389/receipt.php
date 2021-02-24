<?php
require('connect.php');
// ออกรายงาน
require('fpdf182/fpdf.php');
ob_end_clean(); //เคลียร์ object เก่าทิ้ง
ob_start(); //เริ่ม object ใหม่
class PDF extends FPDF{
    //กำหนด header(){
        function Header(){
            global $title;
            $w = $this->GetStringWidth($title)+50;
            $this->Setx(125-$w)/2;
           
            //เพิ่ม font ภาษาไทย
            $this->AddFont('THSarabunNew','B','THSarabunNew_b.php');
            $this->SetFont('THSarabunNew','B',20);

            //หัวตาราง
            $this->Cell($w,18,iconv('UTF-8','cp874',$title),1,0,'C');
            //line break
            $this->Ln(20);
            //end Header()
        } //end class
        function Footer(){
            $this->SetY(-15); // ตำแหน่ง 1.5 ซม จากด้านล่าง
            $this->SetFont('Arial','I',8);
            $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'');
        }//end Footer()
}
$pdf= new PDF();
$title = "ออกใบเสร็จ";
$pdf->SetTitle($title);
$pdf->AddPage();
//เพิ่ม Font
        $pdf->AddFont('THSarabunNew','B','THSarabunNew.php');    
        $pdf->AddFont('THSarabunNew','','THSarabunNew.php');

        $pdf->SetFont('THSarabunNew','B',10);
        $pdf->SetFont('THSarabunNew','',16);
        
        $pdf->SetFillColor(180,180,255);
        $pdf->SetDrawColor(50,50,100);

        //หัวตาราง
        
        $pdf->Cell(15,14,iconv('UTF-8','cp874',"รหัสลูกค้า"),1);
        $pdf->Cell(28,14,iconv('UTF-8','cp874',"ชื่อลูกค้า"),1);
        $pdf->Cell(40,14,iconv('UTF-8','cp874',"ใช้บริการ"),1);
        $pdf->Cell(60,14,iconv('UTF-8','cp874',"ผลิตภัณฑ์"),1);
        $pdf->Cell(45,14,iconv('UTF-8','cp874',"ราคา"),1);
            
        
        $sql = "SELECT * FROM inservice";
        $query=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($query)){
            
            $pdf->Ln();
            $pdf->Cell(15,10,iconv('UTF-8','cp874',$row['idCus']),1);       //นำ idCus จาก database inservice มาแสดง
            $pdf->Cell(28,10,iconv('UTF-8','cp874',$row['nameCus']),1);     //นำ nameCus จาก database inservice มาแสดง
            $pdf->Cell(40,10,iconv('UTF-8','cp874',$row['serID']),1);       //นำ serID จาก database inservice มาแสดง
            $pdf->Cell(60,10,iconv('UTF-8','cp874',$row['proID']),1);       //นำ proID จาก database inservice มาแสดง
            $pdf->Cell(45,10,iconv('UTF-8','cp874',$row['cusPrice']),1);    //นำ cusPrice จาก database inservice มาแสดง
            
  
        
    }
    
        $pdf->Output();
        ob_end_flush();
    
?>
