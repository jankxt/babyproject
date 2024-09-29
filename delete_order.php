<?php
// เชื่อมต่อกับฐานข้อมูล
include 'db.php';

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    // ลบคำสั่งซื้อจากฐานข้อมูล
    $sql = "DELETE FROM orders WHERE id='$order_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: orders_list.php"); // เปลี่ยนไปยังหน้ารายการคำสั่งซื้อ
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบ: " . $conn->error;
    }
} else {
    echo "ไม่พบคำสั่งซื้อนี้";
    exit();
}
