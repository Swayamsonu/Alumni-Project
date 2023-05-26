<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alumni";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Check if user exists in the database
$sql = "INSERT into users ('username','password')VALUES(`$username`,`$password`)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // User exists, redirect to dashboard
    header("Location: localhost:5000/new.php");
    echo "CORRECT USERNAME";

} else {
    // User does not exist, display error message
    echo "Invalid username or password";
}

$conn->close();
?>
