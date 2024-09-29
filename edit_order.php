<?php
// เชื่อมต่อกับฐานข้อมูล
include 'db.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // ดึงข้อมูลคำสั่งซื้อตาม ID
    $sql = "SELECT * FROM orders WHERE id='$order_id'";
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // อัปเดตข้อมูลคำสั่งซื้อ
        $product_name = $_POST['product_name'];
        $customer_name = $_POST['customer_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $postal_code = $_POST['postal_code'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $update_sql = "UPDATE orders SET product_name='$product_name', customer_name='$customer_name', 
                        address='$address', city='$city', postal_code='$postal_code', 
                        price='$price', quantity='$quantity' WHERE id='$order_id'";
        
        if ($conn->query($update_sql) === TRUE) {
            header("Location: orders_list.php"); // เปลี่ยนไปยังหน้ารายการคำสั่งซื้อ
            exit();
        } else {
            echo "เกิดข้อผิดพลาด: " . $conn->error;
        }
    }
} else {
    echo "ไม่พบคำสั่งซื้อนี้";
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>แก้ไขคำสั่งซื้อ</title>
</head>
<body>
    <h1>แก้ไขคำสั่งซื้อ</h1>
    <form method="POST" action="">
        <label for="product_name">ชื่อสินค้า:</label>
        <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($order['product_name']); ?>" required><br>

        <label for="customer_name">ชื่อผู้ซื้อ:</label>
        <input type="text" id="customer_name" name="customer_name" value="<?php echo htmlspecialchars($order['customer_name']); ?>" required><br>

        <label for="address">ที่อยู่:</label>
        <input type="text" id="address" name="address" value="<?php echo htmlspecialchars($order['address']); ?>" required><br>

        <label for="city">เมือง:</label>
        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($order['city']); ?>" required><br>

        <label for="postal_code">รหัสไปรษณีย์:</label>
        <input type="text" id="postal_code" name="postal_code" value="<?php echo htmlspecialchars($order['postal_code']); ?>" required><br>

        <label for="price">ราคา:</label>
        <input type="text" id="price" name="price" value="<?php echo htmlspecialchars($order['price']); ?>" required><br>

        <label for="quantity">จำนวน:</label>
        <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($order['quantity']); ?>" required><br>

        <button type="submit">บันทึกการเปลี่ยนแปลง</button>
    </form>
</body>
</html>
