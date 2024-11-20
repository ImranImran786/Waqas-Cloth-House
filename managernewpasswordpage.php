<?php
session_start(); // Start the session at the beginning

// Connection setup
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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Retrieve and sanitize user inputs
    $username = trim($_POST['username']);
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Check if new password and confirm password match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Prepare the update statement
        $stmt = $conn->prepare("UPDATE managerlogin SET password = ?, username = ?");
        $stmt->bind_param("ss", $new_password, $username);

        // Execute the query and check if it was successful
        if ($stmt->execute()) {
            echo "<script>alert('Password updated successfully.');</script>";
        } else {
            echo "<script>alert('Error updating password. Please try again.');</script>";
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Manager Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .reset-password {
            background-color: white;
            width: 33%;
            margin-left: 35%;
            height: 400px;
            border-radius: 15px;
            padding: 20px;
        }

        .reset-password h1 {
            text-align: center;
            color: black;
            font-size: 30px;
        }

        .reset-password input {
            font-size: large;
            width: 95%;
            height: 40px;
            margin-top: 10px;
            display: block;
        }

        #btn_submit {
            margin-top: 10%;
            margin-left: 27%;
            width: 150px;
            height: 50px;
            color: black;
            font-size: 30px;
            border: 2px solid blue;
            border-radius: 10px;
        }

        #btn_submit:hover {
            color: white;
            background-color: rgb(75, 12, 247);
            border-color: black;
        }
    </style>
</head>
<body>

<div class="reset-password">
    <h1>Reset Manager Password</h1>
    <form method="post" action="">
        <label for="username">Enter Username</label>
        <input type="text" name="username" placeholder="Username" required="required" autocomplete="off"/>

        <label for="new_password">Enter New Password</label>
        <input type="password" name="new_password" placeholder="New Password" required="required" autocomplete="off"/>

        <label for="confirm_password">Confirm New Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required="required" autocomplete="off"/>

        <button id="btn_submit" type="submit" name="submit">Submit</button>
    </form>
    <button id="back"><a href="manager.php">Back</a></button>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
