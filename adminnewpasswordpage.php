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




if (isset($_GET['cnic'])) {
    $cnic = htmlspecialchars($_GET['cnic']); // Sanitize the CNIC value
} else {
    echo "<script>alert('CNIC not provided.');</script>";
    exit(); // Stop execution if no CNIC is provided
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
        $stmt = $conn->prepare("UPDATE adminlogin SET password = ?, username = ? WHERE CNIC = $cnic");
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
    <title>Reset Admin Password</title>
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




        #backdiv{
        width: 60%;
        float: left;
        height: 70px;
        /* border: 5px solid black; */
    }

    #backdiv #back {
      width: 50%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 8px;
      margin-left: 5%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #backdiv #back:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }
    </style>
</head>
<body>

<div class="reset-password">
    <h1>Reset Admin Password</h1>
    <form method="post" action="">
        <label for="username">Enter Username</label>
        <input type="text" name="username" placeholder="Username" required="required" autocomplete="off"/>

        <label for="new_password">Enter New Password</label>
        <input type="password" name="new_password" placeholder="New Password" required="required" autocomplete="off"/>

        <label for="confirm_password">Confirm New Password</label>
        <input type="password" name="confirm_password" placeholder="Confirm New Password" required="required" autocomplete="off"/>

        <button id="btn_submit" type="submit" name="submit">Submit</button>
    </form>
    <div id="backdiv">
        <button id="back"><a href="index.php">Back</a></button>
    </div>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
