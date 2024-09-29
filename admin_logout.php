<?php
session_start(); // เริ่มต้นเซสชัน
session_unset(); // เคลียร์ข้อมูลเซสชัน
session_destroy(); // ทำลายเซสชัน
header("Location: admin_login.php"); // เปลี่ยนหน้าไปที่หน้าเข้าสู่ระบบ
exit();
?>
