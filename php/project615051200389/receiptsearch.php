<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค้นหาการเข้าใช้บริการ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/33.jpg">
<br><br><br><br><br><br><br>
    
<h2 align = "center">ออกใบเสร็จลูกค้า</h2>
    <form method = "post" action = "receipt.php" >  <!-- ให้รันมาหน้า recipt.php-->
    <table align = "center">
   
    <tr>
        <td height = "50"></td>
    </tr>
    <tr>
    <td width ="60">ข้อมูลลูกค้า</td>
    <td>
    <select name ="list">  <!--ตั้งชื่อ name เป็น list ทำเป็น select ให้เลือก-->
    <option value = "all">ทั้งหมด</option>
    <option value = "idCus">รหัสลูกค้า</option>
    <option value = "nameCus">ชื่อลูกค้า</option>
    
    </select>
    <td width = "60">
    <input type = "text" name = "keyword" placeholder = "พิมพ์ข้อความ" size = "20"> <!--กล่องข้อความ  name = keyword-->
    </td>
    <td>
    <button type = "submit" name = "submit">ออกรายงาน</button> <!-- ปุ่มค้นหา -->
    </td>
    </td>
    </tr>   
    </table><br><br>
    </form>
</body>
</html>

<?php
// เชื่อมต่อฐานข้อมูล
require_once('connect.php');//เรียกไฟล์ cponnect มาใช้
//หรือ require('connect.php');

if(isset($_POST['submit'])){//เมื่อกดปุ่ม submit
    $select = $_POST['list'];//เก็บรายการที่เลือกไว้ใน select
    if($select == 'all'){//ถ้าเลือกทั้งหมดจะดึงข้อมูลทั้งหมดจากตาราง inservice มา
         $sql = 'SELECT * FROM inservice'; 
        
    }
    else{ //คำสั่ง sql select ทุกฟิล์ดจากตาราง inservice โดย select เท่ากับค่าใน keyword
        $sql = "SELECT * FROM inservice WHERE $select = '".$_POST['keyword']."'";
      

    }
    $result = mysqli_query($conn,$sql);//รันคำสั่ง sql


?>


<?php
    mysqli_close($conn); //ปิดคำสั่ง mysql
}//end if(isset($_POST['submit]))
?>

<br><br><br>
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>
