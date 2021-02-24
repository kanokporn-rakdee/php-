<?php
require_once('connect.php'); //เชื่อมต่อฐานข้อมูล
if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
             $sql= "SELECT * FROM product
             WHERE proID ='".$update_id."'";
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
    <title>Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body  background="image/11.jpg">


<form method = "post" action = "http://localhost/project615051200389/updateproduct.php" enctype="multipart/form-data">
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h3>แก้ไขข้อมูลผลิตภัณฑ์</h3></td><!--หัวข้อแก้ไขข้อมูลผลิตภัณฑ์-->
            <br><br><br>
        </tr>

        <tr>
            <td><b>รหัสสินค้า : </b></td><!--ตั้งชื่อ name เป็น proID -->
                <td width="200">
                <input type="text" name="proID" class="form-control"
                size="30"readonly value="<?php echo $array1['proID']?>"></td><!--ล็อก ID แก้ไขไม่ได้-->
            
        </tr>

        <tr>
            <td><b>ชื่อสินค้า : </b> </td><!--ตั้งชื่อ name เป็น proName -->
            <td>
            <br><input type="text" name="proName" class="form-control"
                size="30" value="<?php echo $array1['proName']?>"></td><!--แสดงข้อมูลจากตัวแปร $array1 คือ proName มาแสดง -->
        </tr>

        <tr>
            <td><b>ยี่ห้อ : </b> </td><!--ตั้งชื่อ name เป็น probrand -->
            <td>
            <br><input type="text" name="probrand" class="form-control"
                size="30" value="<?php echo $array1['probrand']?>"></td><!--แสดงข้อมูลจากตัวแปร $array1 คือ probrand มาแสดง -->
        </tr>

        <tr>
            <td><b>รายละเอียดสินค้า : </b></td><!--ตั้งชื่อ name เป็น proDetail -->
            <td>
            <br><input type="text" name="proDetail" class="form-control"
                size="30" value="<?php echo $array1['proDetail']?>"></td><!--แสดงข้อมูลจากตัวแปร $array1 คือ proDetail มาแสดง -->
        </tr>

        <tr>
            <td><b>ภาพ : </b></td><!--ตั้งชื่อ name เป็น proImge -->
            <td>
            <br><input type="file" name="proImge" class="form-control"
                size="30" value="<?php echo $array1['proImage']?>"><!--แสดงข้อมูลจากตัวแปร $array1 คือ proImge มาแสดง -->
                
            </td>
        </tr>

        <tr>
            
            <td align =  "center">
            <br> <button type="submit" name="btnUpdate" class="btn btn-success">แก้ไข</button><!--ปุ่มแก้ไข-->
                    <button type="reset" name="btnReset" class="btn btn-danger">ยกเลิก</button><!--ปุ่มยกเลิก-->

            
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
    $sql="UPDATE product /*แก้ไขตาราง product */
          SET proName = '".$_POST['proName']."',    /*SET proName รับค่า proName โดยส่งเป็น POST */
              probrand = '".$_POST['probrand']."',  /*SET probrand รับค่า probrand โดยส่งเป็น POST */
              proDetail = '".$_POST['proDetail']."',/*SET proDetail รับค่า proDetail โดยส่งเป็น POST */
              proImage = '".$_POST['proImage']."'   /*SET proImage รับค่า proImage โดยส่งเป็น POST */
          WHERE proID = '".$_POST['proID']."' ";    /*SET proID รับค่า proID โดยส่งเป็น POST */


    mysqli_query($conn,$sql);/*ปิดการใช้ mysql */
    echo "<script> alert(' แก้ไขข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('http://localhost/project615051200389/searchproduct.php');</script>";
    
    mysqli_close($conn);
}
?>