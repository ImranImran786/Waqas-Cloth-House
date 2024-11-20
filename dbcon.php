<?php
$db_host = 'localhost';
$db_user = 'username'; // replace with your database username
$db_pass = 'password'; // replace with your database password
$db_name = 'waqas_cloth_house'; // your database name

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>