<?php
				require_once'connect.php';
				  //รันรหัส auto
			$sql2 = "SELECT MAX(cusID) AS cusID FROM inservice";
			$query = mysqli_query($conn,$sql2);
			// $row = mysqli_num_rows($query);
			$rs = mysqli_fetch_array($query);
			// echo $row;
			if($rs['cusID'] !=""){
				$sub = substr($rs['cusID'],1)+1;
				$cusID = sprintf('C%01.0f', $sub);
				// $courseId = "c".$sub;
			}else{
				$cusID = "C1";//รันแบบ S1,S2,....
			}
			?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inservice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/22.jpg">
<br><br><br>

<!-- ให้รันมาหน้า inservice.php-->
<form method = "post" action = "http://localhost/project615051200389/inservice.php" enctype="multipart/form-data">
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h2>ข้อมูลการเข้าใช้บริการ</h2></td> <!--หัวข้อเพิ่มข้อมูลพนักงาน-->
        </tr>

        <tr>
            <td><b>รหัสใช้บริการ : </b></td>
            <td>
            <input type="text" name="cusID"  class="form-control" style="width: 300px" 
            value= "<?php echo $cusID; ?>" disabled="disabled" ><!--ทำให้ล็อกตัวไอดีไว้-->
            <input type="hidden" class="form-control"  name="cusID"  value= "<?php echo $cusID; ?>"> 
            <!--รับข้อมูล ID ไว้แบบซ่อน-->
            </td>
        </tr>
        <tr>
            <td><b>วันที่เข้าใช้บริการ : </b></td><!--ตั้งชื่อ name เป็น date-->
            <td>
             <input type = "date" name="date"  class="form-control" id="date" value="<?=date('d-m-y ')?>"/>
            </td>
        </tr>
        <tr>
            <td><b>รหัสลูกค้า : </b> </td>
            <td>
           <br> <input type = "text" name = "idCus"  class="form-control"><!--ตั้งชื่อ name เป็น idCus-->
            </td>
        </tr>

        <tr>
            <td><b>ชื่อลูกค้า : </b> </td>
            <td>
           <br> <input type = "text" name = "nameCus"  class="form-control"><!--ตั้งชื่อ name เป็น nameCus-->
            </td>
        </tr>

        <tr>
            <td height = "60"><b>บริการ : </b> </td>
            <td>
            <select name="serID" class="form-control"> <!--ตั้งชื่อ name เป็น serID ทำเป็น select ให้เลือก-->
            	<option value="">--โปรดเลือก--</option>
                             <?php 
                                require_once'connect.php';
                                $sql = "SELECT * FROM service1 ORDER BY serName ASC";
                                $query = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($query)){ 
                            ?>
                            <option value="<?php echo $row['serName']?>"><?php echo $row['serName']?>
                            <?php }?>
                            
                            
            </select>

            
            </td>
        </tr>

        <tr>
            <td height = "60"><b>ผลิตภัณฑ์ : </b> </td>
            <td>
            <select name="proID" class="form-control"> <!--ตั้งชื่อ name เป็น serID ทำเป็น select ให้เลือก-->
            	<option value="">--โปรดเลือก--</option>
                             <?php 
                                require_once'connect.php';
                                $sql = "SELECT * FROM product ORDER BY proName ASC";
                                $query = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($query)){ 
                            ?>
                            <option value="<?php echo $row['proName']?>"><?php echo $row['proName']?>
                            <?php }?>
                            
                            
            </select>

            
            </td>
        </tr>

        <tr>
            <td><b>ราคารวม : </b> </td>
            <td>
           <br> <input type = "text" name = "cusPrice"  class="form-control"><!--ตั้งชื่อ name เป็น nameCus-->
            </td>
        </tr>
      
        <tr>
            <td></td>
            <td>
            <br> <button type = "submit" name = "submit" class="btn btn-success">บันทึก</button> <!--ปุ่มบันทึก-->
            <button type="reset" class="btn btn-danger">ยกเลิก</button> <!--ปุ่มยกเลิก-->

            </td>
        </tr>
    </table>
    
    </div>
    </form>
</body>
</html>
<!--ปุ่มย้อนหลับหน้าหลัก-->
<br><br><br><br><br><br>
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank" 
 role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>

<?php

require_once("connect.php"); //เชื่อมต่อฐานข้อมูล   

if(isset($_POST['submit'])){  //ถ้ากด submit
    $cid = $_POST['cusID']; // ประกาศตัวแปร  $cid 
    $date = $_POST['date']; // ประกาศตัวแปร  $date
    $idcus = $_POST['idCus']; // ประกาศตัวแปร $idcu
    $nameCus = $_POST['nameCus']; // ประกาศตัวแปร  $nameCus
    $serid = $_POST['serID']; // ประกาศตัวแปร $serID
    $proid = $_POST['proID']; // ประกาศตัวแปร $proID
    $cusprice= $_POST['cusPrice']; // ประกาศตัวแปร $cusPrice

  
    //คำสั่ง sql ในการ insert
    $sql = "INSERT INTO inservice(cusID,cusDate,idCus,nameCus,serID,proID,cusPrice)
             VALUES('$cid','$date','$idcus','$nameCus','$serid','$proid','$cusprice')";
             
    
    //echo "คำสั่ง sql = ".$sql."<br>";
    
    //mysqli_query($conn,$sql) or die('insert error');
    
    if(mysqli_query($conn,$sql)){
       //ถ้าใช่จะแสดงคำว่าบันทึกข้อมูลสำเร็จ
        //บันทึกเสร็จจะกลับมาหน้าstaff.php
        echo "<script> alert(' บันทึกข้อมูลสำเร็จ '); </script>"; 
        echo "<script> window.location.assign('inservice.php');</script>"; 
    }  else{ //ถ้าไม่ใช่จะขึ้น ผิดพลาด
        echo "ผิดพลาด :".$sql."<br>".mysqli_error($conn);
    }
    
    } // if isset
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล 

?>

<?php
//โชว์บนหน้า service

 include 'connect.php';
//1. เชื่อมต่อ database: 
  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM inservice ORDER BY cusID  asc" or die("Error:" . mysqli_error()); 

//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<div class='container'><table border='1' align='center' class='table table-info table-hover' >";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัสใช้บริการ</td><td>วันที่เข้าใช้บริการ</td><td>รหัสลูกค้า</td>
      <td>ชื่อลูกค้า<t/d><td>บริการ</td><td>ผลิตภัณฑ์</td><td>ราคารวม</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["cusID"] .  "</td> ";    //ดึงข้อมูล  cusID         จาก database มาแสดงในตาราง
  echo "<td>" .$row["cusDate"] .  "</td> ";  //ดึงข้อมูล  cusDate       จาก database มาแสดงในตาราง
  echo "<td>" .$row["idCus"] .  "</td> ";    //ดึงข้อมูล  idCus         จาก database มาแสดงในตาราง
  echo "<td>" .$row["nameCus"] .  "</td> ";    //ดึงข้อมูล  nameCus         จาก database มาแสดงในตาราง
  echo "<td>" .$row["serID"] .  "</td> ";    //ดึงข้อมูล  serID         จาก database มาแสดงในตาราง
  echo "<td>" .$row["proID"] .  "</td> ";    //ดึงข้อมูล  proID         จาก database มาแสดงในตาราง
  echo "<td>" .$row["cusPrice"] .  "</td> ";    //ดึงข้อมูล  cusPrice        จาก database มาแสดงในตาราง
   
}
echo "</table> </div>";
//5. close n$connnection
mysqli_close($conn);
?>