<?php
				require_once'connect.php';
				  //รันรหัส auto
			$sql2 = "SELECT MAX(staffID) AS staffID FROM staff";
			$query = mysqli_query($conn,$sql2);
			// $row = mysqli_num_rows($query);
			$rs = mysqli_fetch_array($query);
			// echo $row;
			if($rs['staffID'] !=""){
				$sub = substr($rs['staffID'],1)+1;
				$staffID = sprintf('S%01.0f', $sub);
				// $courseId = "c".$sub;
			}else{
				$staffID = "S1";//รันแบบ S1,S2,....
			}
			?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูล staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/44.jpg">




<form method = "post" action = "http://localhost/project615051200389/staff.php" enctype="multipart/form-data"> <!-- ให้รันมาหน้า staff.php-->
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h2>เพิ่มข้อมูลพนักงาน</h2></td> <!--หัวข้อเพิ่มข้อมูลพนักงาน-->
        </tr>

        <tr>
            <td><b>รหัสพนักงาน : </b></td>
            <td>
            <input type="text" name="staffID"  class="form-control" style="width: 300px" 
            value= "<?php echo $staffID; ?>" disabled="disabled" ><!--ทำให้ล็อกตัวไอดีไว้-->
			<input type="hidden" class="form-control"  name="staffID"  value= "<?php echo $staffID; ?>"> <!--รับข้อมูล ID ไว้แบบซ่อน-->
            </td>
        </tr>
        <tr>
            <td><b>ชื่อพนักงาน : </b> </td>
            <td>
           <br> <input type = "text" name = "staffname"  class="form-control"> <!--ทำเป็นกล่องข้อความ ตั้งชื่อ name เป็น staffname-->
            </td>
        </tr>
        <tr>
            <td><b>ที่อยู่ : </b></td>
            <td>
            <br><textarea rows = "5" cols = "30" name = "staffaddress"  class="form-control"></textarea><!--ตั้งชื่อ name เป็น staffAddress-->
            </td>
        </tr>
        <tr>
            <td><b>เบอร์โทรศัพท์ : </b></td>
            <td>
            <br> <input type = "text" name = "stafftel"class="form-control"><!--ตั้งชื่อ name เป็น stafftel-->
            </td>
        </tr>

        <tr>
            <td><b>ตำแหน่ง : </b></td>
            <td>
            <br> 
            <select class="form-control" name="staffpos"> <!--ตั้งชื่อ name เป็น staffpos ทำเป็น select ให้เลือก-->
      <option>---------โปรดเลือก---------</option>
      <option>พนักงานล้างรถ</option>
      <option>พนักงานดูดฝุ่น</option>
      <option>พนักงานเคลือบสี</option>
      <option>พนักงานทำความสะอาดภายใน</option>
      <option>พนักงานถ่ายน้ำมันเครื่อง</option>
      
    </select>
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
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br> 


<?php

require_once("connect.php"); //เชื่อมต่อฐานข้อมูล

if(isset($_POST['submit'])){ //ถ้ากด submit
    @$id = $_POST['staffID']; // ประกาศตัวแปร $id
    $sname = $_POST['staffname']; // ประกาศตัวแปร $sname
    $address = $_POST['staffaddress'];// ประกาศตัวแปร $address
    $tel = $_POST['stafftel'];// ประกาศตัวแปร $tel
    @$pos = $_POST['staffpos'];// ประกาศตัวแปร $pos
    
  
   
    
    //คำสั่ง sql ในการ insert ทุกฟิล์ดในตาราง staff
    $sql = "INSERT INTO staff(staffID,staffName,staffAddress,staffTal,staffposition)
             VALUES('$id','$sname','$address','$tel','$pos')";
    
    //echo "คำสั่ง sql = ".$sql."<br>";
    
    //mysqli_query($conn,$sql) or die('insert error');
    
    if(mysqli_query($conn,$sql)){  
        //ถ้าใช่จะแสดงคำว่าบันทึกข้อมูลสำเร็จ
        //บันทึกเสร็จจะกลับมาหน้าstaff.php
        echo "<script> alert(' บันทึกข้อมูลสำเร็จ '); </script>"; 
        echo "<script> window.location.assign('staff.php');</script>"; 
    }  else{ //ถ้าไม่ใช่จะขึ้น ผิดพลาด
        echo "ผิดพลาด :".$sql."<br>".mysqli_error($conn);
    }
    
    } // if isset
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล 

?>

<?php

//โชว์บนหน้า staff

 include 'connect.php';
//1. เชื่อมต่อ database: 
  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้านี้

//2. query ข้อมูลจากตาราง staff: 
$query = "SELECT * FROM staff ORDER BY staffID  asc" or die("Error:" . mysqli_error()); 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<div class='container'><table border='1' align='center' class='table table-info table-hover' >";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัสพนักงาน</td><td>ชื่อพนักงาน</td><td>ที่อยู่พนักงาน</td><td>เบอร์โทรพนักงาน</td><td>ตำแหน่ง</td></tr>"; 
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";
  echo "<td>" .$row["staffID"] .  "</td> ";        //ดึงข้อมูล  staffID         จากdatabase มาแสดงในตาราง
  echo "<td>" .$row["staffName"] .  "</td> ";      //ดึงข้อมูล  staffName       จากdatabase มาแสดงในตาราง
  echo "<td>" .$row["staffAddress"] .  "</td> ";   //ดึงข้อมูล  staffAddress    จากdatabase มาแสดงในตาราง
  echo "<td>" .$row["staffTal"] .  "</td> ";       //ดึงข้อมูล  staffTal        จากdatabase มาแสดงในตาราง
  echo "<td>" .$row["staffposition"] .  "</td> ";  //ดึงข้อมูล  staffIDposition จากdatabase มาแสดงในตาราง
 

  
}
echo "</table> </div>";
//5. close n$connnection
mysqli_close($conn);
?>

