<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านขายสินค้าออนไลน์</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* ตั้งค่าพื้นหลัง */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-image: url('imge/e26a2260f4e56f737c1992b82685b910.jpg');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
            color: white;
        }

        /* แถบหัวสำหรับโลโก้และชื่อร้าน */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(255, 192, 203, 0.9); /* สีชมพูโปร่งใส */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* โลโก้ร้าน */
        header img {
            height: 300px; /* ปรับขนาดโลโก้ */
            border-radius: 50%; /* ทำให้เป็นวงกลม */
            object-fit: cover;
        }

        /* ชื่อร้าน */
        header h1 {
            font-size: 3em;
            color: #bd076c; /* สีชมพูเข้ม */
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        /* เมนูนำทาง */
        nav {
            background-color: rgba(255, 192, 203, 0.7);
            padding: 10px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        nav ul li {
            margin: 0 15px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 2em;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }

        nav ul li a:hover {
            background-color: #f3a2bd;
            color: #fff;
        }

        /* ส่วนหลัก */
        .content {
            text-align: center;
            padding: 50px 20px;
        }

        .recommended-products {
            margin-top: 50px;
            padding: 20px;
            background-color: rgba(255, 192, 203, 0.5); /* สีพื้นหลังโปร่งใส */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .recommended-products h2 {
            font-size: 3em;
            margin-bottom: 30px;
            color: #bd076c; /* สีชมพูเข้ม */
        }

        .product-list {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .product {
            border: 5px solid #fff;
            padding: 20px;
            height: 720px;
            width: 560px; /* ปรับขนาดสินค้า */
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 10px; /* มุมโค้งของสินค้า */
            background-color: rgba(255, 255, 255, 0.9); /* พื้นหลังสินค้า */
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 30px;
            margin-bottom: 30px;
        }

        .product h3 {
            font-size: 1.5em;
            margin-bottom: 10px;
            color: #bd076c; /* สีชมพูเข้ม */
        }

        .product p {
            font-size: 1.2em;
            color: #bd076c; /* สีชมพูเข้ม */
        }

        .product:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        /* Footer */
        footer {
            background-color: rgba(0, 0, 0, 0.3);
            color: white;
            text-align: center;
            padding: 20px 0;
            margin-top: 90px;
            font-size: 1.5em;
        }

    </style>
</head>
<body>
    <!-- แถบหัวโลโก้และชื่อร้าน -->
    <header>
        <img src="imge/large (2).png" alt="โลโก้ร้าน">
        <h1>GOODIES PURFUME</h1>
    </header>

    <nav>
        <ul>
            <li><a href="register.html">Login</a></li>
            <li><a href="catalog.php">Products</a></li>
            <li><a href="about.html">Member</a></li>
            <li><a href="insert.php">⚙️</a></li>
        </ul>
    </nav>

    <div class="recommended-products">
        <h2>สินค้าแนะนำ</h2>
        <div class="product-list">
            <div class="product">
                <img src="imge/S__174751770.jpg" alt="สินค้า 1" />
                <h3>Sugar Dream</h3>
                <p>ราคา: 1200 บาท</p>
            </div>
            <div class="product">
                <img src="imge/S__174751766.jpg" alt="สินค้า 2" />
                <h3>Cotton Candy Dream</h3>
                <p>ราคา: 1599 บาท</p>
            </div>
            <div class="product">
                <img src="imge/S__174833668.jpg" alt="สินค้า 3" />
                <h3>Pink Velvet</h3>
                <p>ราคา: 1090 บาท</p>
            </div>
            <div class="product">
                <img src="imge/S__174751764.jpg" alt="สินค้า 3" />
                <h3>Sugar Petal</h3>
                <p>ราคา: 2459 บาท</p>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Goodies.co | สงวนลิขสิทธิ์</p>
    </footer>
</body>
</html>
