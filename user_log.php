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

// Start a session at the beginning of your script
session_start();

// Search for data in a table named "user"
$tableName = "user";

// Use prepared statements to prevent SQL injection
$searchTerm_1 = $_POST['username'];

// Fetch hashed password from the database
$stmt = $conn->prepare("SELECT user_id, password FROM $tableName WHERE first_name = ?");
$stmt->bind_param("s", $searchTerm_1);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Bind the result variables
    $stmt->bind_result($user_id, $hashedPassword);
    $stmt->fetch();

    // Verify the password
    if (password_verify($_POST['password'], $hashedPassword)) {
        // Authentication successful
        // Store the username and user_id in the session
        $_SESSION['username'] = $searchTerm_1;
        $_SESSION['user_id'] = $user_id;

        // Close statement and connection
        $stmt->close();
        $conn->close();

        // Redirect to the desired page
        header("Location: index_logged.php");
        exit();
    }
}

// Close statement and connection
$stmt->close();
$conn->close();

echo "Login failed. Please check your username and password.";
?>
