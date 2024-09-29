<?php
session_start(); // เริ่มเซสชันเพื่อเข้าถึงข้อมูลในตะกร้า

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
$sql = "SELECT product_name, price, quantity, description, image_url FROM products";
$result = $conn->query($sql);

// ตรวจสอบการ query
if ($result === FALSE) {
    echo "Error in SQL query: " . $conn->error;
    exit; // หยุดการทำงานของสคริปต์
}

// เริ่มต้น HTML
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" href="styles.css"> <!-- เพิ่มลิงก์ไปยังไฟล์ CSS ของคุณ -->
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
    font-size : 5em;
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
}
body {
    font-family: Arial, sans-serif;
    background-color: #f9f3f3; /* พื้นหลังชมพูอ่อน */
    color: #333; /* สีข้อความ */
    margin: 0;
    padding: 0;
}

h1 {
    text-align: center;
    color: #d5006d; /* สีชมพูเข้มสำหรับหัวข้อ */
    margin-top: 20px;
}

.product-list {
    display: flex;
    flex-wrap: wrap;
    justify-content: center; /* จัดให้กลาง */
    gap: 20px; /* ระยะห่างระหว่างสินค้า */
    padding: 20px; /* ระยะห่างภายใน */
}

.products {
    border: 2px solid #d5006d; /* กรอบชมพูเข้ม */
    border-radius: 10px; /* มุมโค้ง */
    height: 350px;
    width: 300px;
    padding: 10px;
    background-color: #ffffff; /* พื้นหลังของสินค้า */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* เงา */
    text-align: center; /* จัดให้กลาง */
    transition: transform 0.2s; /* เพิ่มความนุ่มนวล */
}

.products:hover {
    transform: scale(1.05); /* ขยายขนาดเมื่อเลื่อนเมาส์ */
}

.products img {
    border-radius: 10px; /* มุมโค้งสำหรับภาพสินค้า */
}

button {
    background-color: #d5006d; /* สีปุ่ม */
    color: white; /* สีข้อความในปุ่ม */
    border: none; /* ไม่มีกรอบ */
    padding: 10px 15px; /* ระยะห่างภายใน */
    border-radius: 5px; /* มุมโค้งของปุ่ม */
    cursor: pointer; /* เปลี่ยนเคอร์เซอร์เมื่อชี้ปุ่ม */
    transition: background-color 0.3s; /* เพิ่มความนุ่มนวลเมื่อเปลี่ยนสี */
}

button:hover {
    background-color: #b3004d; /* สีเมื่อชี้เมาส์ */
}

</style>
</head>
<body>

    <!-- ส่วนหัว -->
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

    <!-- เนื้อหาของหน้า Catalog -->
    <main>
        <h1>รายการสินค้า</h1>
        <div class="product-list"> <!-- เริ่มต้น div สำหรับรายการสินค้า -->

            <?php
            // ตรวจสอบว่ามีสินค้าหรือไม่
            if ($result->num_rows > 0) {
                // แสดงสินค้าทั้งหมด
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='products'>";
                    echo "<img src='" . $row["image_url"] . "' alt='" . $row["product_name"] . "' style='width:150px;height:150px;'>";
                    echo "<h2>" . $row["product_name"] . "</h2>";
                    echo "<p>ราคา: " . $row["price"] . " บาท</p>";
                    echo "<p>จำนวน: " . $row["quantity"] . "</p>";
                    echo "<p>คำอธิบาย: " . $row["description"] . "</p>";
                    
                    // ฟอร์มเพิ่มสินค้าในตะกร้า
                    echo "<form method='POST' action='cart.php' style='display:inline;'>";
                    echo "<input type='hidden' name='product_name' value='" . $row["product_name"] . "'>";
                    echo "<input type='hidden' name='price' value='" . $row["price"] . "'>";
                    echo "<input type='hidden' name='quantity' value='1'>"; // จำนวนสินค้าตั้งต้น
                    echo "<input type='hidden' name='image_url' value='" . $row["image_url"] . "'>";
                    echo "<button type='submit' name='add_to_cart'>เพิ่มลงในตะกร้า</button>";
                    echo "</form>";
                    
                    echo "</div>";
                }
            } else {
                echo "ไม่มีสินค้าที่แสดง";
            }
            ?>
            
        </div> <!-- จบ div สำหรับรายการสินค้า -->
    </main>

    <!-- ส่วนท้าย -->
    <footer>
        <p>© 2024 ร้านของเรา. สงวนสิทธิ์.</p>
        
    </footer>

    <!-- ปิดการเชื่อมต่อฐานข้อมูล -->
    <?php $conn->close(); ?>
    
</body>
</html>
