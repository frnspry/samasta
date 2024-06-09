<?php
// Include your database connection script
require_once 'db_connect.php';

try {
    // Begin transaction
    $dbh->beginTransaction();

    $stmt = $dbh->prepare("INSERT INTO customers (name, email, phone, no_rekening) VALUES (:name, :email, :phone, :no_rekening)");
    $stmt->execute([
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':phone' => $_POST['phone'],
        ':no_rekening' => $_POST['no_rekening']
    ]);
    $customer_id = $dbh->lastInsertId();


    // Insert reservation
    $stmt = $dbh->prepare("INSERT INTO reservations (customer_id, reservation_date, reservation_time, prices, invoice, peoples, table_type) VALUES (:customer_id, :reservation_date, :reservation_time, :prices, :invoice, :peoples, :table_type)");
    $stmt->execute([
        ':customer_id' => $customer_id,
        ':reservation_date' => $_POST['reservation_date'],
        ':reservation_time' => $_POST['reservation_time'],
        ':prices' => $_POST['prices'],
        ':invoice' => $_POST['invoice'],
        ':peoples' => $_POST['peoples'],
        ':table_type' => $_POST['table_type']
    ]);
    $reservation_id = $dbh->lastInsertId();

    // Insert order items
    $stmt = $dbh->prepare("INSERT INTO order_items (reservation_id, menu_id, quantity) VALUES (:reservation_id, :menu_id, :quantity)");
    foreach ($_POST['order_items'] as $item) {
        $stmt->execute([
            ':reservation_id' => $reservation_id,
            ':menu_id' => $item['menu_id'],
            ':quantity' => $item['quantity']
        ]);
    }

    // Commit transaction
    $dbh->commit();

    echo "Reservation and order items inserted successfully!";
} catch (PDOException $e) {
    // Rollback transaction if something went wrong
    $dbh->rollBack();
    echo "Error: " . $e->getMessage();
}
