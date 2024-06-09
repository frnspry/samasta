<?php
// Include your database connection file
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username from the request body
    $data = json_decode(file_get_contents("php://input"), true);
    $adminUsername = $data['username'];

    try {
        // Prepare a DELETE statement
        $stmt = $dbh->prepare("DELETE FROM admins WHERE username = :username");

        // Bind the parameter
        $stmt->bindParam(':username', $adminUsername);

        // Execute the statement
        $stmt->execute();

        // Respond with a success message
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Respond with an error message
        http_response_code(500);
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    // Respond with an error if accessed via GET method
    http_response_code(405);
    echo json_encode(['error' => 'Method Not Allowed']);
}
?>
