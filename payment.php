<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$database = "srilankan_delights";
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the total amount is passed as a query parameter
if (isset($_GET['totalAmount'])) {
    $totalAmount = $_GET['totalAmount'];
} else {
    // Redirect to cart.php if the total amount is not provided
    header("Location: cart.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submitCardPayment"])) {
    // In a real scenario, you would integrate with a payment gateway provider
    // and handle sensitive information securely on the server side.

    // For this example, let's assume the payment is successful
    $paymentSuccessful = true;

    if ($paymentSuccessful) {
        // Insert payment data into the payment table
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
        $cartIds = ''; // Assume you have the cart IDs from a previous query

        $selectedPaymentMethod = 'card'; // This should come from the payment form

        $insertPaymentQuery = "INSERT INTO payment (user_id, cart_id, total_payment, payment_type) 
                               VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insertPaymentQuery);
        $stmt->bind_param("ssss", $userId, $cartIds, $totalAmount, $selectedPaymentMethod);

        if ($stmt->execute()) {
            echo '<p style="text-align:center">Payment successful! Total Amount: Rs. ' . $totalAmount . '</p>';

            // Delete existing cart items using prepared statement
            $deleteCartItemsQuery = "DELETE FROM cart WHERE user_id = ?";
            $deleteStmt = $conn->prepare($deleteCartItemsQuery);
            $deleteStmt->bind_param("s", $userId);

            if ($deleteStmt->execute()) {
                echo '';
            } else {
                echo '<p>Error deleting cart items: ' . $conn->error . '</p>';
            }

        } else {
            echo '<p>Error inserting payment data: ' . $conn->error . '</p>';
        }

        // Close the statement
        $stmt->close();
        $deleteStmt->close();
    } else {
        echo '<p>Payment failed. Please try again.</p>';
    }
}

// Handle back-home request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["back-home"])) {
    header("Location: index_logged.php");
    exit();
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <script src="https://kit.fontawesome.com/384012e869.js" crossorigin="anonymous"></script>  <script defer src="script.js"></script>
    <title>Card Payment</title>
</head>
<body>

    <h2 style="text-align:center;">Card Payment</h2>

    <p style="text-align:center">Total Payment Amount: Rs. <?php echo $totalAmount; ?></p>
    <form action="" method="post">
    <div style = "text-align:center;margin-top:20px">
        <button type="submit" name="back-home"><i class="fa fa-home" aria-hidden="true"></i></button>
    </div>
    </form>
    
    <form method="post" action="">
        <label for="cardNumber">Card Number:</label>
        <input type="text" id="cardNumber" name="cardNumber" required>
        <br>

        <label for="expiryDate">Expiry Date:</label>
        <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
        <br>

        <label for="cvv">CVV:</label>
        <input type="text" id="cvv" name="cvv" required>
        <br>

        <label for="cardHolderName">Cardholder Name:</label>
        <input type="text" id="cardHolderName" name="cardHolderName" required>
        <br>
        <div style = "text-align:center">
        <button type="submit" name="submitCardPayment">Confirm Payment</button>
        </div>    
    </form>

 
    
  

</body>
</html>
