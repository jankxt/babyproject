<?php
include 'db.php';

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];
$user_id = 1; // สมมติว่า ID ผู้ใช้งานคือ 1

$sql = "INSERT INTO orders (product_name, quantity, price, user_id) VALUES ('$product_name', '$quantity', '$price', '$user_id')";

if ($conn->query($sql) === TRUE) {
    echo "การสั่งซื้อสำเร็จ!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
