<?php
include 'db.php'; // เชื่อมต่อฐานข้อมูล

// รับค่าจากฟอร์ม
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // เข้ารหัสผ่าน
$email = $_POST['email'];

// ตรวจสอบว่ามีการส่งข้อมูลเข้ามา
if (!empty($username) && !empty($password) && !empty($email)) {
    // SQL สำหรับการเพิ่มข้อมูลสมาชิก
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        // สมัครสมาชิกสำเร็จ ลิงก์ไปหน้า index
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
