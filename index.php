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
      <li><a href="login.php">Login</a></li>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
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
    <div class="menu-item">
      <img src="images/food/spicy chicken curry.jpg" alt="Food Item 1" class="menu-img">
      <h3>Spicy Chicken Curry</h3>
      <p>A delicious and spicy chicken curry served with basmati rice.</p>
      <div class="item-details">
        <span class="price">Rs. 3200</span>
        <button class="order-button">Order Now</button>
        <label for="quantity-1" class="Quantity">Quantity:</label>
        <input type="number" id="quantity-1" name="quantity-1" value="1" min="1">
      </div>
    </div>
  
    <div class="menu-item">
      <img src="images/food/vegitable biriyani.jpg" alt="Food Item 2"class="menu-img">
      <h3>Vegetable Biryani</h3>
      <p>A flavorful vegetable biryani cooked with aromatic spices.</p>
      <div class="item-details">
        <span class="price">Rs.2000</span>
        <button class="order-button">Order Now</button>
        <label for="quantity-2" class="Quantity">Quantity:</label>
        <input type="number" id="quantity-2" name="quantity-2" value="1" min="1">
      </div>
    </div>
    <div class="menu-item">
        <img src="images/food/vegitable biriyani.jpg" alt="Food Item 2"class="menu-img">
        <h3>Vegetable Biryani</h3>
        <p>A flavorful vegetable biryani cooked with aromatic spices.</p>
        <div class="item-details">
          <span class="price">Rs.2000</span>
          <button class="order-button">Order Now</button>
          <label for="quantity-2" class="Quantity">Quantity:</label>
          <input type="number" id="quantity-2" name="quantity-2" value="1" min="1">
        </div>
      </div>
      <div class="menu-item">
        <img src="images/food/vegitable biriyani.jpg" alt="Food Item 2"class="menu-img">
        <h3>Vegetable Biryani</h3>
        <p>A flavorful vegetable biryani cooked with aromatic spices.</p>
        <div class="item-details">
          <span class="price">Rs.2000</span>
          <button class="order-button">Order Now</button>
          <label for="quantity-2" class="Quantity">Quantity:</label>
          <input type="number" id="quantity-2" name="quantity-2" value="1" min="1">
        </div>
      </div>
      <div class="menu-item">
        <img src="images/food/vegitable biriyani.jpg" alt="Food Item 2"class="menu-img">
        <h3>Vegetable Biryani</h3>
        <p>A flavorful vegetable biryani cooked with aromatic spices.</p>
        <div class="item-details">
          <span class="price">Rs.2000</span>
          <button class="order-button">Order Now</button>
          <label for="quantity-2" class="Quantity">Quantity:</label>
          <input type="number" id="quantity-2" name="quantity-2" value="1" min="1">
        </div>
      </div>
      <div class="menu-item">
        <img src="images/food/vegitable biriyani.jpg" alt="Food Item 2"class="menu-img">
        <h3>Vegetable Biryani</h3>
        <p>A flavorful vegetable biryani cooked with aromatic spices.</p>
        <div class="item-details">
          <span class="price">Rs.2000</span>
          <button class="order-button">Order Now</button>
          <label for="quantity-2" class="Quantity">Quantity:</label>
          <input type="number" id="quantity-2" name="quantity-2" value="1" min="1">
        </div>
        </div>
    </div>
  
    <!-- Add more menu items as needed -->
  
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
        <p style="margin-bottom: 10px;"><i class="fa fa-phone" style="margin-right: 10px;"></i> Reservations: +123 456 7890</p>
        <p style="margin-bottom: 10px;"><i class="fa fa-envelope" style="margin-right: 10px;"></i> Email: info@example.com</p>
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
