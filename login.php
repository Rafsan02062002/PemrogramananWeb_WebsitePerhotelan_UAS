<?php
session_start();

// Jika pengguna sudah login, redirect ke halaman dashboard
if (isset($_SESSION['username'])) {
    header("Location: landingpage.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Username dan password dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Ganti dengan username dan password yang valid
    $valid_username = "Rafsan";
    $valid_password = "12345";

    // Periksa apakah username dan password cocok
    if ($username === $valid_username && $password === $valid_password) {
        // Set session untuk menandakan user sudah login
        $_SESSION['username'] = $username;
        header("Location: landingpage.php"); // Redirect ke halaman dashboard
        exit();
    } else {
        $error = "Tolong masukkan, username dan password yang benar!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bahagia - Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Login</h1>
        <nav>
            <ul>
                <li><a href="landingpage.php">Home</a></li>
				<li><a href="Login.php">Login</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="booking-form.php">Booking Form</a></li>
                <li><a href="room-table.php">Room Rates</a></li>
                <li><a href="orders.php">Orders</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Login to Your Account</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <label for="username">Username : </label><input type="text" id="username" name="username" required><br>
            <label for="password">Password : </label><input type="password" id="password" name="password" required><br>
            <button type="submit">Login</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>
