<?php
				require_once'connect.php';
				   //รันรหัส auto
			$sql2 = "SELECT MAX(proID) AS proID FROM product";
			$query = mysqli_query($conn,$sql2);
			// $row = mysqli_num_rows($query);
			$rs = mysqli_fetch_array($query);
			// echo $row;
			if($rs['proID'] !=""){
				$sub = substr($rs['proID'],1)+1;
				$proID = sprintf('P%01.0f', $sub);
				// $courseId = "c".$sub;
			}else{
				$proID = "P1";//รันแบบ S1,S2,....
			}
			?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ข้อมูล Product</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body background="image/11.jpg">


<form method = "post" action = "http://localhost/project615051200389/product.php" enctype="multipart/form-data"> <!-- ให้รันมาหน้า product.php-->
<div class="container-fluid">

    <table border = "0" align = "center">
        <tr>
            <td height = "50"></td>
        </tr>
        <tr>
        <td></td>
            <td height = "100"><h2>เพิ่มข้อมูลผลิตภัณฑ์</h2></td>  <!--หัวข้อเพิ่มข้อมูลบริการ-->
        </tr>

        <tr>
            <td><b>รหัสสินค้า : </b></td>
            <td>
            <input type="text" name="proID"  class="form-control" style="width: 350px"
             value= "<?php echo $proID; ?>" disabled="disabled" >  <!--ทำให้ล็อกตัวไอดีไว้-->
			<input type="hidden" class="form-control"  name="proID"  value= "<?php echo $proID; ?>"  > <!--รับข้อมูล ID ไว้แบบซ่อน-->
            </td>
        </tr>

        <tr>
            <td><b>ชื่อสินค้า : </b> </td>
            <td>
            <br><input type = "text" name = "proname"  class="form-control">  <!--ทำเป็นกล่องข้อความ ตั้งชื่อ name เป็น proname-->
            </td>
        </tr>

        <tr>
            <td><b>ยี่ห้อ : </b> </td>
            <td>
            <br><input type = "text" name = "probrand"  class="form-control">  <!--ทำเป็นกล่องข้อความ ตั้งชื่อ name เป็น probrand-->
            </td>
        </tr>

        <tr>
            <td><b>ภาพ : </b></td>
            <td>
            <br> <input type = "file" name = "fileUpload" id="proImage" class="form-control"> <!-- ตั้งชื่อ name เป็น proImage-->
            </td>
        </tr>

        <tr>
            <td><b>รายละเอียดสินค้า : </b></td>
            <td>
         
            <br><textarea rows = "5" cols = "30" name = "prodetail"  class="form-control"></textarea>  
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
<br><br>
<!--ปุ่มย้อนหลับหน้าหลัก-->
<a class="btn btn-warning" a href="kanox/indexHome.html" target="_blank"  role="button"><h4>ย้อนกลับหน้าหลัก</h4></a><br><br><br>

<?php
require_once("connect.php");  //เชื่อมต่อฐานข้อมูล   

if(isset($_POST['submit'])){  //ถ้ากด submit
    $pid = $_POST['proID'];    // ประกาศตัวแปร $pid
    $pname = $_POST['proname'];  // ประกาศตัวแปร $pname
    $brand = $_POST['probrand'];  // ประกาศตัวแปร $brand
    $det = $_POST['prodetail'];    // ประกาศตัวแปร $det
   
    if(!empty($_FILES['fileUpload']["name"])){
        $old_filename = $_FILES['fileUpload']['tmp_name'];
        $new_filename = "product_".$_FILES['fileUpload']['name'];
        //ตั้งชื่อใหม่
        //copy file ภาพไปเก็บไว้ในโฟเดอร์ upload
        copy($_FILES['fileUpload']["tmp_name"],"upload/".$_FILES['fileUpload']['name']);
    }
    //คำสั่ง sql ในการ insert
    $sql = "INSERT INTO product(proID,proName,probrand,proDetail,proImage)
             VALUES('$pid','$pname','$brand','$det','$new_filename')";
    
    //echo "คำสั่ง sql = ".$sql."<br>";
    
    //mysqli_query($conn,$sql) or die('insert error');
    
    if(mysqli_query($conn,$sql)){
        echo "<script> alert(' บันทึกข้อมูลสำเร็จ '); </script>";
        echo "<script> window.location.assign('product.php');</script>";
    }  else{  //ถ้าไม่ใช่จะขึ้น ผิดพลาด
        echo "ผิดพลาด :".$sql."<br>".mysqli_error($conn);
    }
    
    } // if isset
    mysqli_close($conn); //ปิดการเชื่อมต่อฐานข้อมูล 

?>

<?php

//โชว์บนหน้า staff

 include 'connect.php';
//1. เชื่อมต่อ database: 
  //ไฟล์เชื่อมต่อกับ database ที่เราได้สร้างไว้ก่อนหน้าน้ี

//2. query ข้อมูลจากตาราง tb_member: 
$query = "SELECT * FROM product ORDER BY proID  asc" or die("Error:" . mysqli_error()); 
//3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
$result = mysqli_query($conn, $query); 
//4 . แสดงข้อมูลที่ query ออกมา โดยใช้ตารางในการจัดข้อมูล: 

echo "<div class='container'><table border='1' align='center' class='table table-info table-hover' >";
//หัวข้อตาราง
echo "<tr align='center' bgcolor='#CCCCCC'><td>รหัสสินค้า</td><td>ชื่อสินค้า</td><td>ยี่ห้อ</td><td>ภาพ</td><td>รายละเอียดสินค้า</td></tr>";
while($row = mysqli_fetch_array($result)) { 
  echo "<tr>";          
  echo "<td>" .$row["proID"] .  "</td> ";        //ดึงข้อมูล  proID           จาก database มาแสดงในตาราง
  echo "<td>" .$row["proName"] .  "</td> ";      //ดึงข้อมูล  proName         จาก database มาแสดงในตาราง
  echo "<td>" .$row["probrand"] .  "</td> ";     //ดึงข้อมูล  probrand        จาก database มาแสดงในตาราง
  echo "<td>" .$row["proImage"] .  "</td> ";     //ดึงข้อมูล  proImage        จาก database มาแสดงในตาราง
  echo "<td>" .$row["proDetail"] .  "</td> ";    //ดึงข้อมูล  proDetail       จาก database มาแสดงในตาราง
  
 

  
}
echo "</table> </div>";
//5. close n$connnection
mysqli_close($conn);
?>