<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค้นหาข้อมูล product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/11.jpg">
<br><br><br><br><br><br><br>

    <form method = "post" action = "searchproduct.php" >  <!-- ให้รันมาหน้า searchproduct.php-->
    <table align = "center" >
    <tr>
        <td height = "50"></td>
    </tr>
    <tr>
    <td width ="60">ค้นหา</td>
    <td>
    <select name ="list"> <!--ตั้งชื่อ name เป็น list ทำเป็น select ให้เลือก-->
    <option value = "all">ทั้งหมด</option>
    <option value = "proID">รหัสผลิตภัณฑ์ </option>
    <option value = "proName">ชื่อผลิตภัณฑ์</option>
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
//  เชื่อมต่อฐานข้อมูล
require_once('connect.php');//เรียกไฟล์ cponnect มาใช้
//หรือ require('connect.php');

if(isset($_POST['submit'])){//เมื่อกดปุ่ม submit
    $select = $_POST['list'];//เฏ้บรายการที่เลือกไว้ใน select
    if($select == 'all'){//ถ้าเลือกทั้งหมด
         $sql = 'SELECT * FROM product';
        
    }
    else{ //คำสั่ง sql select ทุกฟิล์ดจากตาราง product โดย select เท่ากับค่าใน keyword
        $sql = "SELECT * FROM product WHERE $select = '".$_POST['keyword']."'";
      

    }
    $result = mysqli_query($conn,$sql);//รันคำสั่ง sql

?>

<table width="1500" border ="2" align = "center"  class='table table-info table-hover'> <!--หัวข้อตาราง-->
<tr>
    <th width="200" align = "center" >รหัสผลิตภัณฑ์</th>
    <th width="200" align = "center">ชื่อผลิตภัณฑ์</th>
    <th width="200" align = "center">ยี่ห้อผลิตภัณฑ์</th>
    <th width="200" align = "center">ภาพผลิตภัณฑ์</th>
    <th width="750" align = "center">รายละเอียดผลิตภัณฑ์</th>
    <th width="40" align = "center">Update</th>
    <th width="40" align = "center">Delete</th>
</tr>
<?php
while($array = mysqli_fetch_assoc($result)){  //แสดงผล
?>
<tr class='table table-success table-hover'>
    <td width="400"  align = "center"><?=$array["proID"];?></td>  <!--ข้อมูลในตาราง proID -->
    <td width="400"align = "center"><?=$array["proName"];?></td>  <!--ข้อมูลในตาราง proName -->
    <td  width="400"align = "center"><?=$array["probrand"];?></td>  <!--ข้อมูลในตาราง probrand -->
    <td  width="400"><?=$array["proImage"];?></td> 
    <td  width="750"align = ""><?=$array["proDetail"];?></td>   <!--ข้อมูลในตาราง proDetail -->
    
    <td><a href = "updateproduct.php?update_id=<?php echo $array["proID"];?>">แก้ไข</a></td>
    <td><a href = "deleteproduct.php?delete_id=<?php echo $array["proID"];?>">ลบ</td>
</tr>
<?php
}
?>
</table>
<?php
    mysqli_close($conn);
}//end if(isset($_POST['submit]))
?>
<br><br>
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>
