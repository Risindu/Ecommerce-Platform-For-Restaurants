<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="signup_2.css">
    <title>Signup Page</title>
</head>
<body>
    <div class="signup-container">
        <h2>Create an Account</h2>
        <form action="user_registration.php" method="post">
            <label for="username">First Name:</label>
            <input type="text" id="firstname" name="firstname" required>

            <label for="username">Last Name:</label>
            <input type="text" id="lastname" name="lastname" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirm Password:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone_number" required>

            <button type="submit">Sign Up</button>
            <p style="text-align: center;">Already have an account <a href="login.php">Login</a></p>
        </form>
    </div>
   </div> 
</body>
</html>
