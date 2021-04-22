<?php
require_once "connectToDb.php";

$username = $_POST['username'];
$email_user = $_POST['email_user'];
$password_user = $_POST['password'];

if (!isUsernameAlreadyTaken()) {
    $sql = "INSERT INTO users (user_name, user_email, user_password)
VALUES ('$username', '$email_user', '$password_user')";

    if (mysqli_query($conn, $sql)) {
        echo "Account created successfully! Back to Login";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

function isUsernameAlreadyTaken()
{
    global $conn;
    global $username;
    $sql = "SELECT * FROM users WHERE user_name='$username'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "This username is already taken";
        return true;
    }
    return false;
}

$conn->close();
