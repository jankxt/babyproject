<?php
session_start(); // เริ่มต้นเซสชัน
// ตั้งค่าชื่อผู้ใช้และรหัสผ่านที่ล็อกไว้
define('ADMIN_USERNAME', 'admin'); // ชื่อผู้ใช้
define('ADMIN_PASSWORD_HASH', 'admin123'); // รหัสผ่านที่เข้ารหัส

// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ตรวจสอบการล็อกอิน
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ตรวจสอบข้อมูลแอดมิน
    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['admin_logged_in'] = true; // ตั้งค่าการล็อกอิน
            header("Location: insert.php"); // เปลี่ยนหน้าไปที่หน้า insert
            exit();
        } else {
            $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
        }
    } else {
        $error = "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง";
    }
}

// ปิดการเชื่อมต่อ
$conn->close();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบแอดมิน</title>
</head>
<body>

<h1>เข้าสู่ระบบแอดมิน</h1>

<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

<form method="POST" action="">
    <label for="username">ชื่อผู้ใช้:</label>
    <input type="text" name="username" required>
    <br>
    <label for="password">รหัสผ่าน:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">เข้าสู่ระบบ</button>
</form>

</body>
</html>
