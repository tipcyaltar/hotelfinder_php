<?php
session_start();

// Check if not logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin_login.php");
    exit;
}

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

// Delete booking if delete button is clicked
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    $sql_delete_booking = "DELETE FROM bookings WHERE id = $delete_id";
    if ($conn->query($sql_delete_booking) === TRUE) {
        // Redirect to avoid resubmission
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error deleting booking: " . $conn->error;
    }
}

// Delete message if delete button is clicked
if (isset($_GET['delete_message'])) {
    $delete_message_id = $_GET['delete_message'];
    $sql_delete_message = "DELETE FROM messages WHERE id = $delete_message_id";
    if ($conn->query($sql_delete_message) === TRUE) {
        // Redirect to avoid resubmission
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error deleting message: " . $conn->error;
    }
}

// Update booking if edit form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_booking'])) {
    $edit_id = $_POST['edit_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $state = $_POST['state'];
    $hotelname = $_POST['hotelname'];
    $booking_date = $_POST['booking_date'];
    
    $sql_update_booking = "UPDATE bookings SET name='$name', email='$email', contact='$contact', state='$state', hotelname='$hotelname', booking_date='$booking_date' WHERE id=$edit_id";
    if ($conn->query($sql_update_booking) === TRUE) {
        // Redirect to avoid resubmission
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error updating booking: " . $conn->error;
    }
}

// Fetch all bookings
$sql_select_bookings = "SELECT * FROM bookings";
$result_bookings = $conn->query($sql_select_bookings);

// Fetch all messages
$sql_select_messages = "SELECT * FROM messages";
$result_messages = $conn->query($sql_select_messages);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        /* CSS styles */
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2, h3 {
            text-align: center;
            margin-top: 2;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 8px; /* Reduced padding */
            border: 1px solid #ddd;
            text-align: left;
            vertical-align: top;
        }

        th {
            background-color: #f2f2f2;
        }

        .logout-btn {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #FF6666;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 20px;
        }

        .logout-btn:hover {
            background-color: #FF0F0F;
        }

        .edit-btn {
            display: inline-block;
            padding: 5px 8px; /* Reduced padding */
            margin: 5px; /* Added margin */
            text-align: center;
            background-color: #32CD32;
            color: #fff;
            text-decoration: none;
            border-radius: 3px; /* Smaller border radius */
            font-size: 14px; /* Reduced font size */
        }

        .edit-btn:hover {
            background-color: #008000;
        }

        .delete-btn {
            display: inline-block;
            padding: 5px 8px; /* Reduced padding */
            margin: 5px; /* Added margin */
            text-align: center;
            background-color: #FF6666;
            color: #fff;
            text-decoration: none;
            border-radius: 3px; /* Smaller border radius */
            font-size: 14px; /* Reduced font size */
        }

        .delete-btn:hover {
            background-color: #FF0F0F;
        }

        /* Popup form styles */
        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fefefe;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            z-index: 9999;
        }

        .popup-content {
            display: flex;
            flex-direction: column;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Admin Dashboard</h2>
    <!-- Bookings Table -->
    <h3>Bookings</h3>
    <table>
        <!-- Table headers -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>State</th>
            <th>Hotel Name</th>
            <th>Booking Date</th>
            <th>Action</th>
        </tr>
        <!-- PHP code to fetch and display bookings -->
        <?php
        if ($result_bookings->num_rows > 0) {
            while ($row = $result_bookings->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['contact']."</td>";
                echo "<td>".$row['state']."</td>";
                echo "<td>".$row['hotelname']."</td>";
                echo "<td>".$row['booking_date']."</td>";
                echo "<td>
                        <a href='javascript:void(0)' onclick='openPopup(".$row['id'].")' class='edit-btn'>Edit</a>
                        <a href='admin_dashboard.php?delete=".$row['id']."' class='delete-btn'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No bookings found</td></tr>";
        }
        ?>
    </table>

   <!-- Edit Booking Popup Form -->
<div id="editPopup" class="popup">
    <div class="popup-content">
        <span class="close" onclick="closePopup()">&times;</span>
        <h3>Edit Booking</h3>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="margin-top: 20px;">
            <input type="hidden" id="edit_id" name="edit_id">
            <label for="name" style="margin-bottom: 10px;">Name:</label><br>
            <input type="text" id="name" name="name" required style="width: 95%; padding: 10px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <label for="email" style="margin-bottom: 10px;">Email:</label><br>
            <input type="email" id="email" name="email" required style="width: 95%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <label for="contact" style="margin-bottom: 10px;">Contact:</label><br>
            <input type="text" id="contact" name="contact" required style="width: 95%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <label for="state" style="margin-bottom: 10px;">State:</label><br>
            <input type="text" id="state" name="state" required style="width: 95%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <label for="hotelname" style="margin-bottom: 10px;">Hotel Name:</label><br>
            <input type="text" id="hotelname" name="hotelname" required style="width: 95%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <label for="booking_date" style="margin-bottom: 10px;">Booking Date:</label><br>
            <input type="date" id="booking_date" name="booking_date" required style="width: 95%; padding: 8px; margin-bottom: 15px; border-radius: 5px; border: 1px solid #ccc;"><br>
            <button type="submit" name="edit_booking" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Save</button>
        </form>
    </div>
</div>


<!-- Questions Board -->
<h3>Questions Board</h3>
    <table>
        <!-- Table headers -->
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        <!-- PHP code to fetch and display messages -->
        <?php
        if ($result_messages->num_rows > 0) {
            while ($row = $result_messages->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['message']."</td>";
                echo "<td>".$row['created_at']."</td>";
                echo "<td><a href='admin_dashboard.php?delete_message=".$row['id']."' class='delete-btn'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No messages found</td></tr>";
        }
        ?>
    </table>

    <!-- Logout Button -->
    <a href="admin_dashboard.php?logout=true" class="logout-btn">Logout</a>
</div>

<script>
    // Function to open the edit popup and populate the fields with booking data
    function openPopup(id) {
        document.getElementById("editPopup").style.display = "block";
        // Retrieve booking data from the table row
        var row = document.getElementById("row_" + id);
        document.getElementById("edit_id").value = id;
        document.getElementById("name").value = row.cells[1].innerHTML;
        document.getElementById("email").value = row.cells[2].innerHTML;
        document.getElementById("contact").value = row.cells[3].innerHTML;
        document.getElementById("state").value = row.cells[4].innerHTML;
        document.getElementById("hotelname").value = row.cells[5].innerHTML;
        document.getElementById("booking_date").value = row.cells[6].innerHTML;
    }

    // Function to close the edit popup
    function closePopup() {
        document.getElementById("editPopup").style.display = "none";
    }
</script>
</body>
</html>
