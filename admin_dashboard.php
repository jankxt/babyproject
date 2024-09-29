<?php
session_start(); // เริ่มต้นเซสชัน

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php"); // เปลี่ยนหน้าไปที่หน้าล็อกอิน
    exit();
}

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

// ดึงข้อมูลสินค้าจากฐานข้อมูล
$sql = "SELECT * FROM products"; // เปลี่ยนเป็นชื่อเทเบิลของคุณ
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แดชบอร์ดแอดมิน</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>แดชบอร์ดแอดมิน</h1>

<h2>รายการสินค้า</h2>

<table>
    <tr>
        <th>ชื่อสินค้า</th>
        <th>ราคา</th>
        <th>จำนวน</th>
        <th>คำอธิบาย</th>
        <th>ลิงค์ภาพ</th>
    </tr>
    <?php
    // ตรวจสอบว่ามีสินค้าหรือไม่
    if ($result->num_rows > 0) {
        // แสดงสินค้าทั้งหมด
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["price"]) . " บาท</td>";
            echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["description"]) . "</td>";
            echo "<td><img src='" . htmlspecialchars($row["image_url"]) . "' alt='" . htmlspecialchars($row["product_name"]) . "' style='width:100px;'></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>ไม่มีสินค้าที่แสดง</td></tr>";
    }
    ?>
</table>

<a href="insert.php">เพิ่มสินค้า</a> | <a href="logout.php">ออกจากระบบ</a>

</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
