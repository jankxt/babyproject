<?php
session_start(); // เริ่มเซสชันเพื่อเข้าถึงข้อมูลในตะกร้า

// ตรวจสอบว่ามีสินค้าในตะกร้าหรือไม่
if (empty($_SESSION['cart'])) {
    header("Location: cart.php"); // ถ้าไม่มีสินค้าให้กลับไปที่ตะกร้า
    exit();
}

// ตรวจสอบว่ามีการส่งข้อมูลมาจากฟอร์ม
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // รับข้อมูลจากฟอร์ม
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';
    $postal_code = isset($_POST['postal_code']) ? $_POST['postal_code'] : '';
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

    // บันทึกข้อมูลการสั่งซื้อ
    foreach ($_SESSION['cart'] as $item) {
        $product_name = $item['name'];
        $quantity = $item['quantity'];
        $price = $item['price'];

        $sql = "INSERT INTO orders (customer_name, address, city, postal_code, product_name, quantity, price) 
                VALUES ('$name', '$address', '$city', '$postal_code', '$product_name', $quantity, $price)";
        
        if (!$conn->query($sql)) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
// เมื่อกดปุ่ม "เพิ่มลงในตะกร้า"
if (isset($_POST['add_to_cart'])) {
    // ดึงข้อมูลสินค้าที่ต้องการเพิ่ม
    $product_name = $_POST['product_name']; // ชื่อสินค้า
    $quantity = 1; // จำนวนสินค้า

    // เพิ่มสินค้าลงในตะกร้า
    $_SESSION['cart'][] = [
        'name' => $product_name,
        'quantity' => $quantity,
        'price' => $_POST['product_price'], // ราคาสินค้า
    ];

    // ส่งผู้ใช้ไปที่หน้า cart
    header("Location: cart.php");
    exit();
    // เคลียร์ตะกร้าหลังจากสั่งซื้อ
    unset($_SESSION['cart']);

    // โชว์ข้อความยืนยันการสั่งซื้อ
    echo "<h1>ขอบคุณสำหรับการสั่งซื้อ!</h1>";
    echo "<p>รายการสั่งซื้อของคุณได้รับการบันทึกเรียบร้อยแล้ว.</p>";

    // ปิดการเชื่อมต่อฐานข้อมูล
    $conn->close();
    exit();
}
// เมื่อกดปุ่ม "เพิ่มลงในตะกร้า"
if (isset($_POST['add_to_cart'])) {
    // ดึงข้อมูลสินค้าที่ต้องการเพิ่ม
    $product_name = $_POST['product_name']; // ชื่อสินค้า
    $quantity = 1; // จำนวนสินค้า

    // เพิ่มสินค้าลงในตะกร้า
    $_SESSION['cart'][] = [
        'name' => $product_name,
        'quantity' => $quantity,
        'price' => $_POST['product_price'], // ราคาสินค้า
    ];

    // ส่งผู้ใช้ไปที่หน้า cart
    header("Location: cart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>หน้าชำระเงิน</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .form-container { max-width: 600px; margin: auto; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
    </style>
</head>
<body>
<header>
        <div class="logo">
            <img src="imge/large (2).png" alt="Logo" style="width: 200px;height:200px; border-radius: 50%;">
            <h1>GOODIES PURFUME</h1>
        </div>
        <nav>
            <ul>
            <li><a href="index.php">home</a></li>
                <li><a href="register.html">Login</a></li>
                <li><a href="catalog.php">Products</a></li>
                <li><a href="about.html">About Me</a></li>
            </ul>
        </nav>
    </header>
<div class="form-container">
    <h1>กรอกข้อมูลการชำระเงิน</h1>
    <form method="POST" action="index.php">
        <div class="form-group">
            <label for="name">ชื่อ:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="address">ที่อยู่:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="city">เมือง:</label>
            <input type="text" id="city" name="city" required>
        </div>
        <div class="form-group">
            <label for="postal_code">รหัสไปรษณีย์:</label>
            <input type="text" id="postal_code" name="postal_code" required>
        </div>
        <button type="submit">ยืนยันการสั่งซื้อ</button>
    </form>
</div>

<footer>
        <p>© 2024 ร้านของเรา. สงวนสิทธิ์.</p>
        
    </footer> 
</body>
</html>
<style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
}

header {
    background-color: #ff99cc; /* สีชมพู */
    background-image: url('imge/e26a2260f4e56f737c1992b82685b910.jpg'); /* เปลี่ยน URL เป็นภาพพื้นหลังที่ต้องการ */
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
   
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: white;
    font-size : 1.5em;
}
h1 {
    text-align: center;
    color: #d5006d; /* สีชมพูเข้มสำหรับหัวข้อ */
    margin-top: 20px;
}
footer {
    background-color: #ff66b2; /* สีชมพูเข้ม */
    background-image: url('imge/e26a2260f4e56f737c1992b82685b910.jpg'); /* เปลี่ยน URL เป็นภาพพื้นหลังที่ต้องการ */
    background-size: cover;
    background-attachment: fixed;
    background-position: center;
    color: white;
    text-align: center;
    padding: 15px 0;
    position: relative;
    bottom: 0;
    width: 100%;
    margin-top: 20px;
}
.form-container {
        max-width: 20000px;
        height: 600px;
        margin: auto;
        padding: 20px;
        border: 1px solid #e1a7b3;
        border-radius: 8px;
        background-color: #f8e6ef;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #d5006d;
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #d5006d;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #e1a7b3;
        border-radius: 4px;
        font-size: 14px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #d5006d;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
    }

    button:hover {
        background-color: #c40061;
    }
</style>