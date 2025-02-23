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
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Hash the password

//SQL to insert data into database
$sql = "INSERT INTO users (username, email, phone, password) VALUES ('$username', '$email', '$phone', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
