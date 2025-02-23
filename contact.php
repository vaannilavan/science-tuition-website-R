<?php
// Database 
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

// connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // SQL to insert data into database
    $sql = "INSERT INTO submissions (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to submission details page
        header("Location: submission_details.php?name=$name&email=$email&subject=$subject&message=$message");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// connection close
$conn->close();
?>
