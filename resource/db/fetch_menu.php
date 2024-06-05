<?php
// fetch_menu.php
include 'db_connect.php';

$sql = "SELECT name, price, img FROM menu";
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
