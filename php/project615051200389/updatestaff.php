<?php
require_once('connect.php'); //เชื่อมต่อฐานข้อมูล
if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
             $sql= "SELECT * FROM staff
             WHERE staffID ='".$update_id."'";
    // run คำสั่ง sqli
    $result = mysqli_query($conn,$sql);
    //แสดงผล
    while($array1 = mysqli_fetch_array($result)){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UpdateStaff</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/44.jpg">
<!-- ให้รันมาหน้า updatestaff.php-->
<form method = "post" action = "http://localhost/project615051200389/updatestaff.php" enctype="multipart/form-data">
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td ><h2 align = "center">แก้ไขข้อมูลพนักงาน</h2></td> <!--หัวข้อแก้ไขข้อมูลพนักงาน-->
        </tr>

        <tr>
                <td width="100"><b>รหัสสมาชิก</b></td> <!--ตั้งชื่อ name เป็น staffID -->
                <td width="100"><input type="text" name="staffID" class="form-control"
                size="30"readonly value="<?php echo $array1['staffID']?>"></td> <!--ล็อก ID แก้ไขไม่ได้-->
            </tr>            
        <tr>


            <td><b>ชื่อพนักงาน : </b> </td><!--ตั้งชื่อ name เป็น staffName -->
            <td>
            <br><input type="text" name="staffName" class="form-control"
                size="30" value="<?php echo $array1['staffName']?>"></td><!--แสดงข้อมูลจากตัวแปร $array1 คือ staffName มาแสดง -->
            
        </tr>

        <tr>
            <td><b>ที่อยู่ : </b></td><!--ตั้งชื่อ name เป็น staffAddress -->
            <br><td><input type="text" name="staffAddress" class="form-control"
                size="30" rows = "5" cols = "30" value="<?php echo $array1['staffAddress']?>"></td>
                <!--แสดงข้อมูลจากตัวแปร $array1 คือ staffAddress มาแสดง -->
            </td>
        </tr>

       <tr>
            <td><b>เบอร์โทร : </b></td> <!--ตั้งชื่อ name เป็น staffTal -->
            <br><td><input type="text" name="staffTal" class="form-control"
                size="30"  value="<?php echo $array1['staffTal']?>"></td><!--แสดงข้อมูลจากตัวแปร $array1 คือ staffTal มาแสดง -->
            
            </td>
        </tr>

        <tr>
            <td><b>ตำแหน่ง : </b></td>
            <td>
            <br> <!--ตั้งชื่อ name เป็น staffposition ทำเป็น select ให้เลือก-->
            <select class="form-control" name="staffposition"  value="<?php echo $array1['staffposition']?>">
      <option>---------โปรดเลือก---------</option>              <!--แสดงข้อมูลจากตัวแปร $array1 คือ staffposition มาแสดง -->
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
            <br> <button type="submit" name="btnUpdate" class="btn btn-success">แก้ไข</button>  <!--ปุ่มแก้ไข-->
                 <button type="reset" name="btnReset" class="btn btn-danger">ยกเลิก</button>  <!--ปุ่มยกเลิก-->

            </td>
        </tr>
    </table>
    
    </div>
    </form>
</body>
</html>
<?php
    }
}
?>

<?php
if(isset($_POST['btnUpdate'])){
    $sql="UPDATE staff /*แก้ไขตาราง staff */
          SET staffName = '".$_POST['staffName']."',        /*SET staffName รับค่า staffName โดยส่งเป็น POST */
              staffAddress = '".$_POST['staffAddress']."',  /*SET staffAddress รับค่า staffAddress โดยส่งเป็น POST */
              staffTal = '".$_POST['staffTal']."',          /*SET staffTal รับค่า staffTal โดยส่งเป็น POST */
              staffposition = '".$_POST['staffposition']."' /*SET staffposition รับค่า staffposition โดยส่งเป็น POST */
          WHERE staffID = '".$_POST['staffID']."' ";        /*SET staffID รับค่า staffID โดยส่งเป็น POST */
          
    mysqli_query($conn,$sql); /*ปิดการใช้ mysql */
    echo "<script> alert(' แก้ไขข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('http://localhost/project615051200389/searchstaff.php');</script>";
    
    mysqli_close($conn);
}
?>
