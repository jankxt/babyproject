<?php
session_start(); // เริ่มเซสชันเพื่อเข้าถึงข้อมูลในตะกร้า

// ตรวจสอบว่ามีการโพสต์ข้อมูลจากหน้า catalog หรือไม่
if (isset($_POST['add_to_cart'])) {
    // สร้าง array สำหรับสินค้า
    $item = [
        'name' => $_POST['product_name'],
        'price' => $_POST['price'],
        'quantity' => $_POST['quantity'],
        'image_url' => $_POST['image_url']
    ];

    // เพิ่มสินค้าลงในตะกร้า
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $_SESSION['cart'][] = $item; // เพิ่มสินค้าใหม่ลงในตะกร้า
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

// ตรวจสอบว่ามีสินค้าที่เพิ่มในตะกร้าหรือไม่
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// จัดการลบสินค้าในตะกร้า
if (isset($_POST['remove_item'])) {
    $index = $_POST['item_index'];
    unset($_SESSION['cart'][$index]);
    $_SESSION['cart'] = array_values($_SESSION['cart']); // รีเซ็ตดัชนีของตะกร้า
}

// จัดการอัปเดตจำนวนสินค้าที่ต้องการซื้อ
if (isset($_POST['update_quantity'])) {
    $index = $_POST['item_index'];
    $new_quantity = $_POST['quantity'];

    // ทำการตรวจสอบจำนวนสินค้าให้ถูกต้อง (เป็นตัวเลข และมากกว่าศูนย์)
    if (is_numeric($new_quantity) && $new_quantity > 0) {
        $_SESSION['cart'][$index]['quantity'] = $new_quantity;
    }
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ตะกร้าสินค้า</title>
    <style>
        /* สไตล์พื้นฐาน */
        body { font-family: Arial, sans-serif; }
        .cart-item { margin-bottom: 20px; }
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

<h1>ตะกร้าสินค้า</h1>

<?php if (empty($_SESSION['cart'])): ?>
    <p>ไม่มีสินค้าในตะกร้า</p>
<?php else: ?>
    <?php foreach ($_SESSION['cart'] as $index => $item): ?>
        <div class="cart-item">
            <img src="<?= $item['image_url']; ?>" alt="<?= $item['name']; ?>" style="width:100px;height:100px;">
            <h2><?= $item['name']; ?></h2>
            <p>ราคา: <?= $item['price']; ?> บาท</p>
            <p>จำนวน: <?= $item['quantity']; ?></p>
            
            <form method="POST" style="display:inline;">
                <input type="hidden" name="item_index" value="<?= $index; ?>">
                <button type="submit" name="remove_item">ลบ</button>
            </form>
        </div>
    <?php endforeach; ?>
    <form method="POST" action="checkout.php">
    <button type="submit">ดำเนินการชำระเงิน</button>
</form>

<footer>
        <p>© 2024 ร้านของเรา. สงวนสิทธิ์.</p>
        
    </footer> 
<?php endif; ?>

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
    font-size : 2em;
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
    margin-top: 500px;
}
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f2; /* พื้นหลังสีชมพูอ่อน */
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #ff6699; /* สีชมพู */
            margin-bottom: 30px;
        }

        .cart-item {
            background-color: white;
            border: 2px solid #ff99cc; /* ขอบสีชมพู */
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: space-between; /* จัดให้มีช่องว่างระหว่างรูปกับข้อมูลสินค้า */
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1); /* ใส่เงาเบาๆ ให้การ์ดสินค้า */
        }

        .cart-item img {
            margin-right: 20px;
            border-radius: 8px;
        }

        .cart-item h2 {
            margin: 0;
            color: #ff66b2;
        }

        .cart-item p {
            margin: 5px 0;
        }

        .cart-item form {
            display: inline-block;
            margin-left: 20px;
        }

        button {
            background-color: #ff6699;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9em;
        }

        button:hover {
            background-color: #ff3366;
        }

        .cart-total {
            text-align: right;
            font-size: 1.5em;
            color: #ff66b2;
            margin-top: 20px;
        }

        .checkout-button {
            background-color: #ff6699;
            color: white;
            border: none;
            padding: 15px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.2em;
            width: 100%;
            display: block;
            margin-top: 20px;
        }

        .checkout-button:hover {
            background-color: #ff3366;
        }

        .empty-cart {
            text-align: center;
            color: #999;
        }
        </style>