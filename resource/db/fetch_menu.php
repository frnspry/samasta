<?php
// fetch_menu.php
include 'db_connect.php';

$sql = "SELECT m.name, m.price, oi.quantity
        FROM menu m
        JOIN order_items oi ON m.menu_id = oi.menu_id";
$result = $conn->query($sql);

$menuItems = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $menuItems[] = $row;
    }
}

echo json_encode($menuItems);

$conn->close();
?>
