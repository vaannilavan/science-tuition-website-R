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
$email = $_POST['email'];

//Generate token
$token = bin2hex(random_bytes(32)); 

//Insert token into database with expiration timestamp
$expiry = date('Y-m-d H:i:s', strtotime('+1 hour')); //Set expiration time to 1 hour from now

$sql = "INSERT INTO password_reset_tokens (email, token, expiry) VALUES ('$email', '$token', '$expiry')";

if ($conn->query($sql) === TRUE) {
    //Send reset link to the user's email address
    $reset_link = "http://yourdomain.com/reset_password.php?token=$token"; //Change this URL to your reset password page
    $message = "To reset your password, click the link below:\n\n$reset_link";
    mail($email, "Password Reset Link", $message);

    echo "Reset link sent to your email address. Please check your inbox.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
