<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h2>Reset Password</h2>
    <form action="update_password.php" method="post">
        <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
        <label for="password">Enter your new password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Reset Password">
    </form>
</body>
</html>
