<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ค้นหาข้อมูล staff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/44.jpg">
<br><br><br><br><br><br><br>

    <form method = "post" action = "searchstaff.php" > <!-- ให้รันมาหน้า searchstaff.php-->
    <table align = "center">
    <tr>
        <td height = "50"></td>
    </tr>
    <tr>
    <td width ="60">ค้นหา</td> 
    <td>
    <select name ="list"> <!--ตั้งชื่อ name เป็น list ทำเป็น select ให้เลือก-->
    <option value = "all">ทั้งหมด</option>
    <option value = "staffID">รหัสพนักงาน </option>
    <option value = "staffName">ชื่อพนักงาน</option>
    </select>
    <td width = "60">
    <input type = "text" name = "keyword" placeholder = "พิมพ์ข้อความ" size = "20"> 
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
require_once('connect.php');
//หรือ require('connect.php');

if(isset($_POST['submit'])){//เมื่อกดปุ่ม submit
    $select = $_POST['list'];//เก็บรายการที่เลือกไว้ใน $select
    if($select == 'all'){//ถ้าใช่ทั้งหมดจะแสดงจาก ตารางstaff
         $sql = 'SELECT * FROM staff'; 
        
    }
    else{ //คำสั่ง sql select ทุกฟิล์ดจากตาราง staff โดย select เท่ากับค่าใน keyword
        $sql = "SELECT * FROM staff WHERE $select = '".$_POST['keyword']."'";
      

    }
    $result = mysqli_query($conn,$sql);//รันคำสั่ง sql


?>

<table width="200"border ="3"  class='table table-info table-hover'> <!--หัวข้อตาราง-->
<tr>
    
    <th width="200" align = "center">รหัสพนักงาน</th>
    <th width="200" align = "center">ชื่อพนักงาน</th>
    <th width="200" align = "center">ที่อยู่</th>
    <th width="200" align = "center">เบอร์โทรศัพท์</th>
    <th width="200" align = "center">ตำแหน่ง</th>
    <th width="40" align = "center">Update</th>
    <th width="40" align = "center">Delete</th>
</tr>

<?php
while($array = mysqli_fetch_assoc($result)){  //แสดงผล
?>
<tr class='table table-warning table-hover'>
    <td width="400" align = "center"><?=$array["staffID"];?></td> <!--ข้อมูลในตาราง staffID -->
    <td width="400"align = "center"><?=$array["staffName"];?></td> <!--ข้อมูลในตาราง staffName -->
    <td  width="400"align = "center"><?=$array["staffAddress"];?></td><!--ข้อมูลในตาราง staffAddress -->
    <td  width="400"align = "center"><?=$array["staffTal"];?></td><!--ข้อมูลในตาราง staffTal -->
    <td  width="400"align = "center"><?=$array["staffposition"];?></td><!--ข้อมูลในตาราง staffposition -->
    
    <td><a href = "updatestaff.php?update_id=<?php echo $array["staffID"];?>">แก้ไข</a></td> 
    <td><a href = "deletestaff.php?delete_id=<?php echo $array["staffID"];?>">ลบ</td>
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