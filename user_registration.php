<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "srilankan_delights";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into a table named "user"
$tableName = "user";

// Use prepared statements to prevent SQL injection
$passwordToHash = $_POST['password'];

// Hash the password using Argon2 and the default options
$hashedPassword = password_hash($passwordToHash, PASSWORD_ARGON2I);

$stmt = $conn->prepare("INSERT INTO $tableName (first_name, last_name, address, email, phone_number, password) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssss", $_POST['firstname'], $_POST['lastname'], $_POST['address'], $_POST['email'], $_POST['phone_number'], $hashedPassword);

if ($stmt->execute()) {
    // Redirect to login.php
    header("Location: login.php");
    exit();
} else {
    echo "Error inserting data: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
