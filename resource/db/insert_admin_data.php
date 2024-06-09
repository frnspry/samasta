<?php
// Include your database connection script
require_once 'db_connect.php';

// Get the JSON data from the request body
$json_data = file_get_contents('php://input');

// Decode the JSON data
$data = json_decode($json_data, true);

// Extract username and password from the decoded JSON data
$username = isset($data['username']) ? $data['username'] : null;
$password = isset($data['password']) ? $data['password'] : null;

try {
    if ($username && $password) {
        // Check if the username already exists
        $stmt = $dbh->prepare("SELECT COUNT(*) as count FROM admins WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($result['count'] > 0) {
            // If username already exists, send error message
            http_response_code(400); // Bad Request
            $response['error'] = "Username already exists";
        } else {
            // If username does not exist, insert into database
            $stmt = $dbh->prepare("INSERT INTO admins (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();
            
            // Add success message to the response
            $response['message'] = "Data inserted successfully";
        }
    } else {
        // If username or password is missing
        http_response_code(400); // Bad Request
        $response['error'] = "Username and password must be provided";
    }
} catch (PDOException $e) {
    // Add error message to the response
    $response['error'] = "Error: " . $e->getMessage();
}

// Set content type to JSON
header('Content-Type: application/json');

// Encode the response array to JSON and output it
echo json_encode($response);
?>
