<?php
include 'db_connect.php'; // Menghubungkan ke database

// Memeriksa apakah ID pemesanan ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Mengambil data booking berdasarkan ID
    $sql = "SELECT * FROM bookings WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $checkin = $row['checkin'];
        $checkout = $row['checkout'];
        $room = $row['room'];
    } else {
        echo "Booking not found.";
        exit;
    }
} else {
    echo "No booking ID provided.";
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $room = $_POST['room'];

    $sql = "UPDATE bookings SET name='$name', checkin='$checkin', checkout='$checkout', room='$room' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Booking updated successfully.";
        header('Location: orders.php'); // Redirect ke halaman orders setelah update
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Edit Booking</h1>
        <nav>
            <ul>
                <li><a href="orders.php">Back to Orders</a></li>
            </ul>
        </nav>
    </header>

    <section>
        <form action="edit_booking.php?id=<?php echo $id; ?>" method="POST">
            <label for="name">Full Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required><br><br>

            <label for="checkin">Check-in Date:</label><br>
            <input type="date" id="checkin" name="checkin" value="<?php echo $checkin; ?>" required><br><br>

            <label for="checkout">Check-out Date:</label><br>
            <input type="date" id="checkout" name="checkout" value="<?php echo $checkout; ?>" required><br><br>

            <label for="room">Room Type:</label><br>
            <select id="room" name="room" required>
                <option value="single" <?php if ($room == 'single') echo 'selected'; ?>>Single Room</option>
                <option value="double" <?php if ($room == 'double') echo 'selected'; ?>>Double Room</option>
                <option value="suite" <?php if ($room == 'suite') echo 'selected'; ?>>Suite</option>
                <option value="executive-suite" <?php if ($room == 'executive-suite') echo 'selected'; ?>>Executive Suite</option>
            </select><br><br>

            <button type="submit">Update Booking</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 Hotel Bahagia. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close(); // Menutup koneksi ke database
?>
