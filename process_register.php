<?php
// เชื่อมต่อกับฐานข้อมูล
include 'db.php';

// ดึงข้อมูลจากฟอร์ม
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// ควรเข้ารหัสรหัสผ่านก่อนบันทึก
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// สร้างคำสั่ง SQL เพื่อบันทึกข้อมูลสมาชิก
$sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    // ถ้าบันทึกสำเร็จให้เปลี่ยนเส้นทางไปยังหน้า index
    header("Location: index.php");
    exit(); // ป้องกันไม่ให้มีการส่งข้อมูลเพิ่มเติมหลังจาก redirect
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
