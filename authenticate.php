<?php
session_start();

// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// SQL to retrieve user from database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Authentication success
        $_SESSION['username'] = $username;
        echo "Login successful. Welcome, $username!";
    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
