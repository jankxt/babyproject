<?php
// เชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce_db";

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// สินค้าที่จะเพิ่ม
$products = [
    ['Sweet Blossom', 1099.00, 10, 'กลิ่น: ดอกซากุระ, วานิลลา, และพีโอนี', 'imge/S__174751762.jpg'],
    ['Sugar Petal', 2459.00, 20, 'กลิ่น: ดอกพีช, น้ำตาลคาราเมล, และมัสค์อ่อนๆ', 'imge/S__174751764.jpg'],
    ['Vanilla Kiss', 1099.00, 20, 'กลิ่น: วานิลลา, ดอกแมกโนเลีย, และมะลิ
', 'imge/S__174751765.jpg'],
    ['Cotton Candy Dream', 1599.00, 20, 'กลิ่น: น้ำตาลสายไหม, ดอกกุหลาบ, และผลไม้หวาน', 'imge/S__174751766.jpg'],
    ['Honey Rose', 2490.00, 20, 'กลิ่น: น้ำผึ้ง, กุหลาบดามัสก์, และวานิลลา', 'imge/S__174751766.jpg'],
    ['Pink Velvet', 1090.00, 20, 'กลิ่น: ดอกพีโอนี, มัสค์อ่อน, และผลไม้มิกซ์เบอร์รี่', 'imge/S__174751768.jpg'],
    ['Peachy Glow', 1750.00, 20, 'กลิ่น: พีช, วานิลลา, และดอกลิลลี่', 'imge/S__174751769.jpg'],
    ['Sugar Dream', 1200.00, 20, 'กลิ่น: น้ำตาลวานิลลา, มะลิ, และลูกแพร์
', 'imge/S__174751770.jpg'],
    ['Candy Blossom', 2300.00, 20, 'กลิ่น: ดอกแมกโนเลีย, วนิลา และพีช', 'imge/S__174751771.jpg'],
    ['Velvet Sugar', 1299.00, 20, 'กลิ่น: วนิลา, มะลิ, และแป้งน้ำตาล
', 'imge/S__174751772.jpg'],
    ['Creamy Delight', 1709.00, 20, 'กลิ่น: วานิลลา, น้ำผึ้ง, และดอกไม้สีขาว', 'imge/S__174833668.jpg'],
    ['Rose Cotton', 1256.00, 20, 'กลิ่น: กุหลาบ, แป้งเด็ก, และวานิลลาผสมน้ำตาล', 'imge/S__174833670.jpg']
    // เพิ่มสินค้าอื่น ๆ ตามลำดับ
];

// เพิ่มสินค้าลงในฐานข้อมูล
foreach ($products as $product) {
    $name = $product[0];
    $price = $product[1];
    $quantity = $product[2];
    $description = $product[3];
    $image = $product[4];

    $sql = "INSERT INTO product (product_name, price, quantity, description, image_url)
            VALUES ('$name', $price, $quantity, '$description', '$image')";

    if ($conn->query($sql) === TRUE) {
        echo "เพิ่มสินค้า $name สำเร็จ<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
