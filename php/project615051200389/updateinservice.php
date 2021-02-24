<?php
require_once('connect.php'); //เชื่อมต่อฐานข้อมูล
if(isset($_GET['update_id'])){
    $update_id=$_GET['update_id'];
             $sql= "SELECT * FROM inservice
             WHERE cusID ='".$update_id."'";
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
    <title>Inservice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/22.jpg">
<br><br><br>


<form method = "post" action = "http://localhost/project615051200389/updateinservice.php" enctype="multipart/form-data">
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h2>แก้ไขการเข้าใช้บริการ</h2></td><!--หัวข้อแก้ไขการเข้าใช้บริการ-->
        </tr>

        <tr>
                <td width="100"><b>รหัสเข้าใช้บริการ</b></td><!--ตั้งชื่อ name เป็น cusID -->
                <td width="100"><input type="text" name="cusID" class="form-control"
                size="30"readonly value="<?php echo $array1['cusID']?>"></td><!--ล็อก ID แก้ไขไม่ได้-->
            </tr>
        <tr>
            <td><b>วันที่เข้าใช้บริการ : </b></td><!--ตั้งชื่อ name เป็น cusDate -->
            <td>
             <input type = "date" name="cusDate"  class="form-control"  value="<?php echo $array1['cusDate']?>">
            </td>
        </tr>
        <tr>
            <td><b>รหัสลูกค้า : </b> </td><!--ตั้งชื่อ name เป็น idCus -->
            <td>
           <br> <input type = "text" name = "idCus"  class="form-control"  size="30" value="<?php echo $array1['idCus']?>">
            </td>
        </tr>

        <tr>
            <td><b>ชื่อลูกค้า : </b> </td><!--ตั้งชื่อ name เป็น nameCus -->
            <td>
           <br> <input type = "text" name = "nameCus"  class="form-control" size="30" value="<?php echo $array1['nameCus']?>">
            </td>
        </tr>

        <tr>
            <td height = "60"><b>บริการ : </b> </td><!--ตั้งชื่อ name เป็น serID ทำเป็น select ให้เลือก-->
            <td>
            <select name="serID" class="form-control"  value="<?php echo $array1['serID']?>">
            	<option value="">--โปรดเลือก--</option>
                             <?php 
                                require_once'connect.php';//เชื่อมต่อฐานข้อมูล
                                $sql = "SELECT * FROM service1 ORDER BY serName ASC";//เชื่อมไปยังฟอร์ม product
                                $query = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($query)){ 
                            ?>
                            <option value="<?php echo $row['serName']?>"><?php echo $row['serName']?>
                            <?php }?><!--แสดงข้อมูลจากตัวแปร $array1 คือ serName มาแสดง -->
                            
                            
            </select>          
            </td>
        </tr>

        <tr>
            <td height = "60"><b>ผลิตภัณฑ์ : </b> </td>
            <td>
            <select name="proID" class="form-control"> <!--ตั้งชื่อ name เป็น proID ทำเป็น select ให้เลือก-->
            	<option value="">--โปรดเลือก--</option>
                             <?php 
                                require_once'connect.php'; //เชื่อมต่อฐานข้อมูล
                                $sql = "SELECT * FROM product ORDER BY proName ASC";//เชื่อมไปยังฟอร์ม product
                                $query = mysqli_query($conn,$sql);
                            while($row=mysqli_fetch_array($query)){ 
                            ?>
                            <option value="<?php echo $row['proName']?>"><?php echo $row['proName']?>
                            <?php }?> <!--แสดงข้อมูลจากตัวแปร $array1 คือ proName มาแสดง -->
                            
                            
            </select>

            
            </td>
        </tr>

        <tr>
            <td><b>ราคารวม : </b> </td> <!--ตั้งชื่อ name เป็น cusPrice ทำเป็น select ให้เลือก-->
            <td>
           <br> <input type = "text" name = "cusPrice"  class="form-control" size="30"
                 value="<?php echo $array1['cusPrice']?>"> <!--แสดงข้อมูลจากตัวแปร $array1 คือ cusPrice มาแสดง -->
            </td>
        </tr>
      
        <tr>
            <td></td>
            <td>
            <br> <button type="submit" name="btnUpdate" class="btn btn-success">แก้ไข</button> <!--ปุ่มแก้ไข-->
                    <button type="reset" name="btnReset" class="btn btn-danger">ยกเลิก</button> <!--ปุ่มยกเลิก-->

            </td>
        </tr>
    </table>
    
    </div>
    </form>
</body>
</html>
<br><br><br><br><br><br>
<?php
    }
}
?>

<?php
if(isset($_POST['btnUpdate'])){
    $sql="UPDATE inservice /*แก้ไขตาราง inservice */
          SET cusID = '".$_POST['cusID']."',    /*SET cusID รับค่า cusID โดยส่งเป็น POST */
              cusDate = '".$_POST['cusDate']."',/*SET cusDate รับค่า cusDate โดยส่งเป็น POST */
              idCus= '".$_POST['idCus']."',     /*SET idCus รับค่า idCus โดยส่งเป็น POST */
              nameCus = '".$_POST['nameCus']."',/*SET nameCus รับค่า nameCus โดยส่งเป็น POST */
              serID= '".$_POST['serID']."',     /*SET serID รับค่า serID โดยส่งเป็น POST */
              proID= '".$_POST['proID']."',     /*SET proID รับค่า proID โดยส่งเป็น POST */
              cusPrice= '".$_POST['cusPrice']."'/*SET cusPrice รับค่า cusPrice โดยส่งเป็น POST */
          WHERE cusID = '".$_POST['cusID']."'"; /*SET cusID รับค่า cusID โดยส่งเป็น POST */
          
    mysqli_query($conn,$sql);/*ปิดการใช้ mysql */
    echo "<script> alert(' แก้ไขข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('http://localhost/project615051200389/searchinservice.php');</script>";
    
    mysqli_close($conn);
}
?>
