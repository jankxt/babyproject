<?php
include 'db.php';

$id = $_GET['id'];
$type = $_GET['type'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // ตรวจสอบประเภทของการอัปเดต
    if ($type == 'user') {
        // รับค่าจากฟอร์ม
        $username = $_POST['username'];
        $email = $_POST['email'];
        
        // อัปเดตข้อมูลสมาชิก
        $sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "อัปเดตข้อมูลสมาชิกสำเร็จ!";
        } else {
            echo "Error: " . $conn->error;
        }
    } elseif ($type == 'order') {
        // รับค่าจากฟอร์ม
        $product_name = $_POST['product_name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        
        // อัปเดตข้อมูลการสั่งซื้อ
        $sql = "UPDATE orders SET product_name='$product_name', quantity=$quantity, price=$price WHERE order_id=$id";
        
        if ($conn->query($sql) === TRUE) {
            echo "อัปเดตข้อมูลการสั่งซื้อสำเร็จ!";
        } else {
            echo "Error: " . $conn->error;
        }
    }
    $conn->close();
    exit;
}

// ดึงข้อมูลปัจจุบันจากฐานข้อมูล
if ($type == 'user') {
    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
} elseif ($type == 'order') {
    $sql = "SELECT * FROM orders WHERE order_id=$id";
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปเดตข้อมูล</title>
</head>
<body>
    <h1>อัปเดตข้อมูล</h1>

    <?php if ($type == 'user'): ?>
        <!-- ฟอร์มอัปเดตข้อมูลสมาชิก -->
        <form method="POST" action="update.php?id=<?= $id ?>&type=user">
            <label>ชื่อผู้ใช้:</label>
            <input type="text" name="username" value="<?= $user['username'] ?>" required><br>
            <label>อีเมล:</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
            <button type="submit">อัปเดตสมาชิก</button>
        </form>
    <?php elseif ($type == 'order'): ?>
        <!-- ฟอร์มอัปเดตข้อมูลการสั่งซื้อ -->
        <form method="POST" action="update.php?id=<?= $id ?>&type=order">
            <label>ชื่อสินค้า:</label>
            <input type="text" name="product_name" value="<?= $order['product_name'] ?>" required><br>
            <label>จำนวน:</label>
            <input type="number" name="quantity" value="<?= $order['quantity'] ?>" required><br>
            <label>ราคา:</label>
            <input type="number" step="0.01" name="price" value="<?= $order['price'] ?>" required><br>
            <button type="submit">อัปเดตการสั่งซื้อ</button>
        </form>
    <?php endif; ?>

</body>
</html>
