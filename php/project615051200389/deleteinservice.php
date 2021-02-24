<?php
    require('connect.php'); //เชื่อมต่อฐานข้อมูล
    if(isset($_GET['delete_id'])){
        $delete_id = $_GET['delete_id'];
        $sql = "DELETE FROM inservice /*ลบข้อมูลใน inservice*/ 
        WHERE cusID = '".$delete_id."'";
        $result = mysqli_query($conn,$sql);
        echo "<script> alert(' ลบข้อมูลสำเร็จ '); </script>"; /*ลบข้อมูลเรียบร้อยแล้ว */
        echo "<script> window.location.assign('http://localhost/project615051200389/searchinservice.php');</script>"; 
        /*กลับไปยังฟอร์ม searchinservice */
        mysqli_close($conn); 

    }
    