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
$message = $_POST['message'];

// Prepare SQL statement
$sql = "INSERT INTO messages (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    ?>
    <script>

    setTimeout(function() {
        document.location.href = '/AppDevFinal';
        alert("Your Message is sent, We'll get back to you"); 
    }, 0);
    </script>
    <?php
} else {

    echo "Error executing SQL statement: " . $conn->error;
}
// Close connection
$conn->close();
?>
