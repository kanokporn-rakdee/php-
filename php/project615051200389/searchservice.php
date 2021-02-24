<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค้นหาบริการ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/33.jpg">
<br><br><br><br><br><br><br>

    <form method = "post" action = "searchservice.php" >  <!-- ให้รันมาหน้า searchservice.php-->
    <table align = "center">
    <tr>
        <td height = "50"></td>
    </tr>
    <tr>
    <td width ="60">ค้นหา</td>
    <td>
    <select name ="list">  <!--ตั้งชื่อ name เป็น list ทำเป็น select ให้เลือก-->
    <option value = "all">ทั้งหมด</option>
    <option value = "serID">รหัสบริการ </option>
    <option value = "serName">ชื่อบริการ</option>
    </select>
    <td width = "60">
    <input type = "text" name = "keyword" placeholder = "พิมพ์ข้อความ" size = "20"> <!--กล่องข้อความ  name = keyword-->
    </td>
    <td>
    <button type = "submit" name = "submit">ค้นหา</button> <!-- ปุ่มค้นหา -->
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
    $select = $_POST['list'];//เฏ้บรายการที่เลือกไว้ใน select
    if($select == 'all'){//ถ้าเลือกทั้งหมด
         $sql = 'SELECT * FROM service1';
        
    }
    else{ //คำสั่ง sql select ทุกฟิล์ดจากตาราง service1 โดย select เท่ากับค่าใน keyword
        $sql = "SELECT * FROM service1 WHERE $select = '".$_POST['keyword']."'";
      

    }
    $result = mysqli_query($conn,$sql);//รันคำสั่ง sql


?>

<table width="500"border ="1" align = "center" class=' table table-warning table-hover' > <!--หัวข้อตาราง-->
<tr>
    
    <th width="200" align = "center">รหัสบริการ</th>
    <th width="200" align = "center">ชื่อบริการ</th>
    <th width="40" align = "center">Update</th>
    <th width="40" align = "center">Delete</th>
</tr>

<?php
while($array = mysqli_fetch_assoc($result)){ //แสดงผล
?>
<tr class='table table-primary table-hover'>
    <td width="400" align = "center"><?=$array["serID"];?></td> <!--ข้อมูลในตาราง serID -->
    <td width="400"align = "center"><?=$array["serName"];?></td> <!--ข้อมูลในตาราง serName -->


    
    <td><a href = "updateservice.php?update_id=<?php echo $array["serID"];?>">แก้ไข</a></td>
    <td><a href = "deleteservice.php?delete_id=<?php echo $array["serID"];?>">ลบ</td>
</tr>
<?php
}
?>

</table>
<?php
    mysqli_close($conn);
}//end if(isset($_POST['submit]))
?>

<br><br><br>
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>