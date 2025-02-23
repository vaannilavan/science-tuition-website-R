<?php
//Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Retrieve form data
$token = $_POST['token'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the new password

//Update password in the database
$sql = "UPDATE users SET password='$password' WHERE reset_token='$token'";

if ($conn->query($sql) === TRUE) {
    echo "Password updated successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
