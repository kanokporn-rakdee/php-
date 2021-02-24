<?php
				require_once'connect.php';
				  //รันรหัส auto
			$sql2 = "SELECT MAX(serID) AS serID FROM service1";
			$query = mysqli_query($conn,$sql2);
			// $row = mysqli_num_rows($query);
			$rs = mysqli_fetch_array($query);
			// echo $row;
			if($rs['serID'] !=""){
				$sub = substr($rs['serID'],1)+1;
				$serID = sprintf('T%01.0f', $sub);
				// $courseId = "c".$sub;
			}else{
				$serID = "T1";//รันแบบ S1,S2,....
			}
			?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูลService</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  
</head>
<body background="image/33.jpg">
<br><br><br><br><br>

<form method = "post" action = "http://localhost/project615051200389/service.php" enctype="multipart/form-data"><!-- ให้รันมาหน้า service.php-->
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h2>เพิ่มข้อมูลบริการ</h2></td> <!--หัวข้อเพิ่มข้อมูลบริการ-->
        </tr>

        <tr>
            <td><b>รหัสบริการ : </b></td>
            <td>
            <input type="text" name="serID"  class="form-control" style="width: 300px"
             value= "<?php echo $serID; ?>" disabled="disabled" > <!--ทำให้ล็อกตัวไอดีไว้-->
			<input type="hidden" class="form-control"  name="serID"  value= "<?php echo $serID; ?>"  ><!--รับข้อมูล ID ไว้แบบซ่อน-->
            </td>
        </tr>
        
        <tr>
            <td><b>ชื่อบริการ : </b></td>
            <td>
            <br> 
            <select class="form-control" name="sername"> <!--ตั้งชื่อ name เป็น sername ทำเป็น select ให้เลือก-->
      <option>---------โปรดเลือก---------</option>
      <option>ล้างรถ 200 บาท</option>
      <option>ดูดฝุ่น 300 บาท</option>
      <option>เคลือบสี 400 บาท</option>
      <option>ทำความสะอาดภายใน 500 บาท</option>
      <option>ถ่ายน้ำมันเครื่อง 600 บาท</option>
      <br>
    </select>
            </td>
        </tr>

        <tr>
            <td></td>
            <td>
            <br> <button type = "submit" name = "submit" class="btn btn-success">บันทึก</button> <!--ปุ่มบันทึก-->
            
            <button type="reset" class="btn btn-danger">ยกเลิก</button><!--ปุ่มยกเลิก-->
            </td>
        </tr>
    </table>
    
    </div>
    </form>
</body>
</html>
<br><br><br><br><br><br>
<!--ปุ่มย้อนหลับหน้าหลัก-->
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>
<?php

require_once("connect.php");    //เชื่อมต่อฐานข้อมูล

if(isset($_POST['submit'])){ //ถ้ากด submit
    @$serid = $_POST['serID'];  // ประกาศตัวแปร $serid
    $sername = $_POST['sername'];  // ประกาศตัวแปร $sername
    

    //คำสั่ง sql ในการ insert ทุกฟิล์ดในตาราง service
    $sql = "INSERT INTO service1(serID,serName)
             VALUES('$serid','$sername')";
    
    //echo "คำสั่ง sql = ".$sql."<br>";
    
    //mysqli_query($conn,$sql) or die('insert error');
    
    if(mysqli_query($conn,$sql)){
        echo "<script> alert(' บันทึกข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('service.php');</script>";
    }  else{  //ถ้าไม่ใช่จะขึ้น ผิดพลาด
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

//2. query ข้อมูลจากตาราง service1: 
$query = "SELECT * FROM service1 ORDER BY serID  asc" or die("Error:" . mysqli_error()); 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<div class='container'><table border='1' align='center' class='table table-info table-hover' >";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัสบริการ</td><td>ชื่อบริการ</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["serID"] .  "</td> ";    //ดึงข้อมูล  serID         จาก database มาแสดงในตาราง
  echo "<td>" .$row["serName"] .  "</td> ";  //ดึงข้อมูล  serName       จาก database มาแสดงในตาราง
  
  
}
echo "</table> </div>";
//5. close n$connnection
mysqli_close($conn);
?>
