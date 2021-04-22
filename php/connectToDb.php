<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phone_contacts";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}