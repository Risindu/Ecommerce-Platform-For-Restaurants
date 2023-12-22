<?php
session_start();

// Check if the username is set in the session
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if the username is not set
    header("Location: login.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$database = "srilankan_delights";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the cart table for the logged-in user
$userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
$sql = "SELECT COUNT(*) AS cart_count FROM cart WHERE user_id = $userId";
$result = $conn->query($sql);

$cartCount = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $cartCount = $row['cart_count'];
}


// Handle the form submission for order
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["order"])) {
    // Get the form data
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $unit_price = $_POST['unit_price'];
    $quantity = $_POST['quantity'];
    $total_price = $unit_price * $quantity;

    // Fetch user_id based on the username from the user table
    $username = $_SESSION['username'];
    $userQuery = "SELECT user_id FROM user WHERE first_name = '{$_SESSION['username']}'";
    $userResult = $conn->query($userQuery);

    if ($userResult->num_rows > 0) {
        $userData = $userResult->fetch_assoc();
        $user_id = $userData['user_id'];

        // Insert data into the cart table
        $insertQuery = "INSERT INTO cart (user_id, item_id, item_name, quantity, price) VALUES ('$user_id', '$item_id', '$item_name', '$quantity', '$unit_price')";

        if ($conn->query($insertQuery) === TRUE) {
            header("location: index_logged.php");
        } else {
            echo '<p>Error adding item to the cart: ' . $conn->error . '</p>';
        }
    } else {
        echo '<p>Error fetching user data.</p>';
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["book_table"])) {

        // Insert data into a table named "reservation"
        $tableName = "reservation";

        // Retrieve values from the form using $_POST
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $numberOfGuests = $_POST['guests'];

        $sql = "INSERT INTO $tableName (name, email, phone_number, number_of_guests, date_of_reservation, time_of_reservation)
                VALUES ('$name', '$email', '$phone_number', '$numberOfGuests', '$date', '$time')";

        if ($conn->query($sql) === TRUE) {
            echo "We have successfully reserved your table!";
        } else {
            echo "Error inserting data: " . $conn->error;
        }
}    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Diphylleia&family=Merriweather:wght@900&display=swap" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/384012e869.js" crossorigin="anonymous"></script>  <script defer src="script.js"></script>
  <title>Sri Lankan Restaurant</title>
</head>
<body>
  <!-- Navigation Bar -->
  <nav>
    <img src="images/logo_2.png" alt="logo" style="width: 150px;padding-left: 20px;">
    <ul>
      <li><a href="#home">Home</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="logout.php">Logout</a></li>
      <?php echo "<p><a href='cart.php'>" . $_SESSION['username'] . "'s Cart <i class='fas fa-shopping-cart'></i> ($cartCount)</a></p>"; ?>
    </ul>
  </nav>

  <!-- Hero Section -->
  <section id="home">
    <div class="hero-content">
      <h1 style="font-family: 'Merriweather', serif;">Welcome to Sri Lankan Delights</h1>
      <p style="font-family: 'Diphylleia', serif;;">Experience the authentic flavors of Sri Lanka</p>
      <button onclick="scrollToSection('reserve-table2')">Reserve a Table</button>
    </div>
  </section>

<!-- Menu Section -->
<section id="menu">
    <div style="text-align: center;color: white;padding-bottom: 80px;">
        <h2>Our Menu</h2>
    </div>
    
    <div id = "menu-sub">
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "srilankan_delights";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM menu";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $imagePath = 'images/food/' . $row['item_name'] . '.jpg';

            echo '<div class="menu-item">';
            echo '<img src="' . $imagePath . '" alt="' . $row['item_name'] . '" class="menu-img">';
            echo '<h3>' . $row['item_name'] . '</h3>';
            echo '<p>' . $row['item_description'] . '</p>';
            echo '<div class="item-details">';
            echo '<span class="price">Rs. ' . $row['price'] . '.00</span>';
            echo '<form method="post" action="">';  // Added the action attribute
            echo '<input type="hidden" name="item_id" value="' . $row['item_id'] . '">';
            echo '<input type="hidden" name="item_name" value="' . $row['item_name'] . '">';
            echo '<input type="hidden" name="unit_price" value="' . $row['price'] . '">';
            echo '<button type="submit" class="order-button" name="order">Order Now</button>';
            echo '<label for="quantity-' . $row['item_id'] . '" class="Quantity">Quantity:</label>';
            echo '<input type="number" id="quantity-1" name = "quantity"'.'" value="1" min="1">';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo '<p>No food items available.</p>';
    }

    $conn->close();
?>

  </section>
 <!-- Reserve Table Section -->
<section id="reserve-table2">
    <div class="reserve-content">
      <div class="reserve-form">
        <h2 style="font-size: 30px;margin-bottom: 30px; color: white;">Reserve a Table</h2>
        <form style="color: white;">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" required>
  
          <label for="email">Email</label>
          <input type="email" id="email" name="email" required>
  
          <label for="phone">Phone</label>
          <input type="tel" id="phone" name="phone" required>
  
          <label for="date">Date</label>
          <input type="date" id="date" name="date" required>
  
          <label for="time">Time</label>
          <input type="time" id="time" name="time" required>
  
          <button type="submit">Reserve Now</button>
        </form>
      </div>
    </div>
  </section>

  <!-- About Restaurant Section -->
<section id="about" style="text-align: center; padding: 50px 20px;">
    <h2 style="font-size: 36px; margin-bottom: 30px;">About Our Restaurant</h2>
    <div class="about-content" style="display: flex; justify-content: center; gap: 30px;">
  
      <div class="about-text" style="flex: 1; text-align: left;padding-left: 15%;">
        <p>Discover the rich and diverse culinary heritage of Sri Lanka at our restaurant. Our chefs meticulously craft each dish to bring you an authentic taste of the island's flavors.</p>
        <p>From traditional rice and curry to mouth-watering seafood specialties, we take pride in offering a delightful dining experience. At our restaurant, we source the finest local ingredients to ensure freshness and quality in every bite.</p>
      </div>
  
      <div class="about-details" style="flex: 1; text-align: left;padding-left: 50px;">
        <h3 style="font-size: 24px; margin-bottom: 20px;">Opening Hours</h3>
        <ul style="list-style: none; padding: 0; margin: 0;">
          <li style="margin-bottom: 10px;"><i class="fa fa-clock" style="margin-right: 10px;"></i> Monday - Friday: 11:00 AM - 10:00 PM</li>
          <li style="margin-bottom: 10px;"><i class="fa fa-clock" style="margin-right: 10px;"></i> Saturday: 10:00 AM - 11:00 PM</li>
          <li style="margin-bottom: 10px;"><i class="fa fa-clock" style="margin-right: 10px;"></i> Sunday: 12:00 PM - 9:00 PM</li>
        </ul>
        </div>
        <div class="about-details" style="flex: 1; text-align: left;padding-right: 80px;">
        <h3 style="font-size: 24px; margin-bottom: 20px;">Contact Information</h3>
        <p style="margin-bottom: 10px;"><i class="fa fa-phone" style="margin-right: 10px;"></i> Reservations: +94 711 234567</p>
        <p style="margin-bottom: 10px;"><i class="fa fa-envelope" style="margin-right: 10px;"></i> Email: srilankandelights@gmail.com</p>
        </div>
    </div>
  </section>
  
  

  <!-- Footer Section -->
<footer>
    <div class="footer-content">
      <div class="footer-logo">
        <img src="images/logo_2.png" alt="Logo" style="width: 150px;">
      </div>
      <p class="footer-text">Discover the unique flavors at our restaurant. Join us for an unforgettable dining experience.</p>
      <p class="footer-text">&copy; Risindu Madhushan</p>
      <div class="social-icons">
        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
      </div>
    </div>
  </footer>
  
</body>
</html>
