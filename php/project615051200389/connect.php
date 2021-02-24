<?php

    $host = "localhost"; //ชื่อ host หรือ ip address
    $username="root"; //ชื่อ user ที่ใช้ login DB
    $password = ""; // รหัสผ่านที่ใช้ login DB
    $dbname ="projectfinal"; // ชื่อ Database

    global $conn; //สร้างตัวแปรแบบ global
    $conn = mysqli_connect($host,$username,$password, $dbname) 
            or die("ไม่สามารถเชื่อมต่อฐานข้อมูลได้");
    mysqli_query($conn,'set names utf8'); 
    //กำหนด charset ให้ฐานข้อมูลเพื่ออ่านภาษาไทยได้


?>