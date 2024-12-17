<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Bahagia - Room Rates</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Hotel Bahagia - Room Rates</h1>
        <nav>
            <ul>
                <li><a href="landingpage.php">Home</a></li>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="booking-form.php">Booking Form</a></li>
                <li><a href="room-table.php">Room Rates</a></li>
                <li><a href="orders.php">Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <h2>Available Room Types</h2>
        <table border="1">
            <tr>
                <th>Room Type</th>
                <th>Price per Night</th>
                <th>Amenities</th>
            </tr>
            <tr>
                <td>Single Room</td>
                <td>Rp.3.000.000($200)</td>
                <td>Free Wi-Fi, Flat-screen TV, Minibar</td>
            </tr>
            <tr>
                <td>Double Room</td>
                <td>Rp.7.500.000($500) </td>
                <td>Free Wi-Fi, Flat-screen TV, Minibar, Spa Access</td>
            </tr>
            <tr>
                <td>Suite</td>
                <td>Rp.15.000.000($1000)</td>
                <td>Free Wi-Fi, Flat-screen TV, Minibar, Spa Access, Private Lounge</td>
            </tr>
            <tr>
                <td>Executive Suite</td>
                <td>Rp.30.000.000($2000)</td>
                <td>Free Wi-Fi, Flat-screen TV, Minibar, Spa Access, Private Lounge, VIP Service</td>
            </tr>
        </table>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>
