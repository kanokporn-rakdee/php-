<?php
require_once('connect.php'); //เชื่อมต่อฐานข้อมูล
if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
             $sql= "SELECT * FROM service1
             WHERE serID ='".$update_id."'";
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
    <title>Updateservice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/44.jpg">
<!-- ให้รันมาหน้า updateservice.php-->
<form method = "post" action = "http://localhost/project615051200389/updateservice.php" enctype="multipart/form-data">
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td ><h2 align = "center">แก้ไขข้อมูลบริการ</h2></td><!--หัวข้อแก้ไขข้อมูลบริการ-->
        </tr>

        <tr>
                <td width="100"><b>รหัสบริการ</b></td><!--ตั้งชื่อ name เป็น serID -->
                <td width="100"><input type="text" name="serID" class="form-control"
                size="30"readonly value="<?php echo $array1['serID']?>"></td><!--ล็อก ID แก้ไขไม่ได้-->
            </tr>            
        

        <tr>
            <td><b>บริการ : </b></td><!--ตั้งชื่อ name เป็น serName ทำเป็น select ให้เลือก -->
            <td>
            <br> 
            <select class="form-control" name="serName"  value="<?php echo $array1['serName']?>">
      <option>---------โปรดเลือก---------</option>        <!--แสดงข้อมูลจากตัวแปร $array1 คือ serName มาแสดง -->
      <option>ล้างรถ 200 บาท</option>
      <option>ดูดฝุ่น 300 บาท</option>
      <option>เคลือบสี 400 บาท</option>
      <option>ทำความสะอาดภายใน 500 บาท</option>
      <option>ถ่ายน้ำมันเครื่อง 600 บาท</option>
     
    </select>
            </td>
        </tr>
 
        

        <tr>
            <td></td>
            <td>
            <br> <button type="submit" name="btnUpdate" class="btn btn-success">แก้ไข</button> <!--ปุ่มแก้ไข-->
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
    $sql="UPDATE service1 /*แก้ไขตาราง service1 */
          SET serName = '".$_POST['serName']."'/*SET serName รับค่า serName โดยส่งเป็น POST */
              
          WHERE serID = '".$_POST['serID']."' "; /*SET serID รับค่า serID โดยส่งเป็น POST */
          
    mysqli_query($conn,$sql);/*ปิดการใช้ mysql */
    echo "<script> alert(' แก้ไขข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('http://localhost/project615051200389/searchservice.php');</script>";
    
    mysqli_close($conn);
}
?>
