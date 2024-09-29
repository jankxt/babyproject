<?php
include 'db.php';

$id = $_GET['id'];
$type = $_GET['type'];

if ($type == 'user') {
    $sql = "DELETE FROM users WHERE id=$id";
} else if ($type == 'order') {
    $sql = "DELETE FROM orders WHERE order_id=$id";
}

if ($conn->query($sql) === TRUE) {
    echo "ลบข้อมูลสำเร็จ!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
