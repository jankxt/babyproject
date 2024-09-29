<?php
session_start();

// ตรวจสอบว่าผู้ใช้ล็อกอินอยู่หรือไม่
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: insert.php');
    exit();
}

// กำหนดค่าล็อคสำหรับชื่อผู้ใช้และรหัสผ่าน
$locked_email = "admin@example.com";
$locked_password = "admin123"; // คุณสามารถเข้ารหัสรหัสผ่านนี้ได้ด้วย password_hash()

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบชื่อผู้ใช้และรหัสผ่าน
    if ($email === $locked_email && $password === $locked_password) {
        // สร้าง session สำหรับล็อกอิน
        $_SESSION['loggedin'] = true;
        $_SESSION['email'] = $email;
        header('Location: insert.php');
        exit();
    } else {
        $error = "อีเมลหรือรหัสผ่านไม่ถูกต้อง";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>เข้าสู่ระบบ</h2>

    <?php if (isset($error)): ?>
        <p style="color:red;"><?= $error ?></p>
    <?php endif; ?>

    <form action="login.php" method="POST">
        <label for="email">อีเมล:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">รหัสผ่าน:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" value="เข้าสู่ระบบ">
    </form>
</body>
</html>
