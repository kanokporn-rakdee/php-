<?php
 session_start();// การเรียกใช้งาน session
 $conn = mysqli_connect("localhost","root", "", "projectfinal"); //เชื่อมต่อฐานข้อมูล
 echo $_POST["txtUsername"]; //รับค่า txtUsername มาจาก Login.php
 echo $_POST["txtPassword"]; //รับค่า txtPassword มาจาก Login.php
 $strSQL="";
 $strSQL = "SELECT * FROM member WHERE Status = '$_POST[txtUsername]' and Password = '$_POST[txtPassword]'";//รับค่าจากตาราง member
 $objQuery = mysqli_query($conn,$strSQL);
 $objResult = mysqli_fetch_array($objQuery);
 // echo $objResult["id"];
 if(!$objResult) // ถ้าไม่ใช่ รหัสผ่านจะไม่ถูกต้อง 
 {
   echo ("Password ไม่ถูกต้อง");
 }
 else
 {
   $_SESSION["UserID"] = $objResult["UserID"]; //ประกาศตัวแปร  $_SESSION เพื่อรับค่า UserID
   $_SESSION["Username"] = $objResult["Username"]; //ประกาศตัวแปร  $_SESSION เพื่อรับค่า  Username

   session_write_close(); //ปิดการเรียกใช้ session
   
   if($objResult["Status"] == "ADMIN") //ประกาศตัวแปรเพื่อรับค่า Status ก็คือ ADMIN
   {
     header("location:kanox/indexHome.html"); //ถ้าใช่จะเชื่อมไปหน้า indexHome.html
   }
 }
 mysqli_close($conn); //การปิด mysqli
?>

