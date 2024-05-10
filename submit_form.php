<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotelBook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$contact = $_POST['contact'];
$state = $_POST['state'];
$hotelname = $_POST['hotelname'];
$booking_date = $_POST['booking_date'];

// Prepare SQL statement
$sql = "INSERT INTO bookings (name, email, contact, state, hotelname, booking_date) VALUES ('$name', '$email', '$contact', '$state', '$hotelname', '$booking_date')";

if ($conn->query($sql) === TRUE) {
    ?>
    <script>

    setTimeout(function() {
        document.location.href = '/AppDevFinal';
        alert("Your Booking is Sent, We'll get back to you after it is Verified"); 
    }, 0);
    </script>
    <?php
} else {
    echo "Error executing SQL statement: " . $conn->error;
}
$conn->close();
?>

