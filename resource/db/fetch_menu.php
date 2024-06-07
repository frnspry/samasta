<?php
// fetch_menu.php
include 'db_connect.php';

// Make sure $dbh is the PDO connection variable
$stmt = $dbh->query("SELECT menu_id, name FROM menu");
$menuItems = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $menuItems[] = $row;
}

echo json_encode($menuItems);
?>
