
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login_2.css">
</head>
<body>
     <!-- Navigation Bar -->
   <div style="display:inline-block;">
   <nav>
    <img src="images/logo_2.png" alt="logo" style="width: 150px;padding-left: 20px;">
    <ul>
      <li><a href="index.php">Home</a></li>
      <li><a href="index.php#about">About</a></li>
      <li><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
    </ul>
    </nav>
 
     

    <div class="login-container">
        <form class="login-form" action = "user_log.php" method="post">
            <h2>Login</h2>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Login</button>
            <p style="text-align: center;">Don't have an account <a href="signup.php">Sign Up</a></p>

        </form>
    </div>

    </div> 
</body>
</html>
