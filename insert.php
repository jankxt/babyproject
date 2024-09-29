<?php
session_start(); // เริ่มต้นเซสชัน
// ตรวจสอบว่าผู้ใช้ล็อกอินหรือยัง
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php'); // ถ้าไม่ได้ล็อกอิน ส่งกลับไปหน้า login.php
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

// ดึงข้อมูลคำสั่งซื้อจากฐานข้อมูล
$sql_orders = "SELECT * FROM orders"; // เปลี่ยนชื่อเทเบิลตามที่คุณใช้
$result_orders = $conn->query($sql_orders);

// ดึงข้อมูลผู้ใช้งานจากฐานข้อมูล
$sql_users = "SELECT username, email, id FROM users"; // เพิ่ม id เพื่อใช้ในลิงค์ลบและแก้ไข
$users_result = $conn->query($sql_users); // สร้างตัวแปรให้กับผลลัพธ์

?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Orders</title>
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
        img {
            width: 100px; /* ขนาดรูปภาพ */
        }
    </style>
</head>
<body>

<h1>จัดการข้อมูลสมาชิกและการสั่งซื้อ</h1>

<h2>สมาชิก</h2>
<table>
    <tr>
        <th>ชื่อผู้ใช้</th>
        <th>อีเมล</th>
        <th>การจัดการ</th>
    </tr>
    <?php while ($row = $users_result->fetch_assoc()) { ?>
    <tr>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td>
            <a href="delete.php?id=<?= $row['id'] ?>&type=user">ลบ</a> |
            <a href="update.php?id=<?= $row['id'] ?>&type=user">แก้ไข</a>
        </td>
    </tr>
    <?php } ?>
</table>

<h2>รายการคำสั่งซื้อ</h2>
<table>
    <tr>
        <th>ชื่อสินค้า</th>
        <th>รูปภาพ</th>
        <th>ชื่อผู้ซื้อ</th>
        <th>ที่อยู่</th>
        <th>เมือง</th>
        <th>รหัสไปรษณีย์</th>
        <th>ราคา</th>
        <th>จำนวน</th>
    </tr>
    <?php
    // ตรวจสอบว่ามีคำสั่งซื้อหรือไม่
    if ($result_orders && $result_orders->num_rows > 0) {
        // แสดงรายการคำสั่งซื้อทั้งหมด
        while ($row = $result_orders->fetch_assoc()) {
            // ดึงชื่อสินค้าจากเทเบิล products โดยใช้ product_name
            $product_name = $row['product_name'];
            $sql_product = "SELECT image_url FROM products WHERE product_name='$product_name'";
            $product_result = $conn->query($sql_product);
            $product_row = $product_result->fetch_assoc();
            $image_url = $product_row['image_url'];
            
            

            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["product_name"]) . "</td>";
            echo "<td><img src='" . htmlspecialchars($image_url) . "' alt='" . htmlspecialchars($row["product_name"]) . "'></td>";
            echo "<td>" . htmlspecialchars($row["customer_name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["address"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["city"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["postal_code"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["price"]) . " บาท</td>";
            echo "<td>" . htmlspecialchars($row["quantity"]) . "</td>";
            echo "<td>
            <a href='edit_order.php?id=" . $row['id'] . "'>แก้ไข</a> |
            <a href='delete_order.php?id=" . $row['id'] . "' onclick='return confirm(\"คุณแน่ใจว่าต้องการลบคำสั่งซื้อนี้?\");'>ลบ</a>
            </td>";
            echo "</tr>";
            
        }
    } else {
        echo "<tr><td colspan='8'>ไม่มีคำสั่งซื้อที่แสดง</td></tr>";
    }
    ?>
     <td>
    
</table>

<div class="logout">
            <a href="logout.php">ออกจากระบบ</a>
        </div>

</body>
</html>

<?php
// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
