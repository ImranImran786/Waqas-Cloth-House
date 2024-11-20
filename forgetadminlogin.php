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
    $name = trim($_POST['name']);
    $fathername = trim($_POST['fathername']);
    $cnic = trim($_POST['cnic']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($fathername) || empty($cnic) || empty($email) || empty($password)) {
        echo "<script>alert('All fields are required.');</script>";
    } else {
        // Prepare and bind to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM adminlogin WHERE name = ? AND fathername = ? AND CNIC = ? AND email = ? AND emailpassword = ?");
        $stmt->bind_param("sssss", $name, $fathername, $cnic, $email, $password); // Note: Passwords should be hashed in production

        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching record was found
        if ($result->num_rows === 1) {
            // Redirect to the new password page
            header("Location: adminnewpasswordpage.php?cnic=" . urlencode($cnic));

            exit();
        } else {
            echo "<script>alert('Please enter correct data');</script>";
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .login {
            background-color: white;
            width: 33%;
            margin-left: 35%;
            height: 520px;
            border-radius: 15px;
            padding: 20px;
        }

        .login h1 {
            text-align: center;
            color: black;
            font-size: 30px;
        }

        .login input {
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

        #back {
            margin-top: 20px;
            margin-left: 5%;
            width: 80px;
            height: 30px;
            color: black;
            font-size: 15px;
            border: 2px solid blue;
            text-decoration: none;
        }

        #back:hover {
            color: white;
            background-color: rgb(75, 12, 247);
            border-color: black;
        }
    </style>
</head>
<body>

<div class="login">
    <h1>Forgot Login</h1>
    <form method="post" action="">
        <div id="input_form">
            <label for="name">Enter Your Name</label>
            <input type="text" name="name" placeholder="Name" required="required"autocomplete="off" />

            <label for="fathername">Enter Father's Name</label>
            <input type="text" name="fathername" placeholder="Father's Name" required="required" autocomplete="off"/>

            <label for="cnic">Enter CNIC</label>
            <input type="text" name="cnic" placeholder="CNIC" required="required" autocomplete="off"/>

            <label for="email">Enter Email</label>
            <input type="email" name="email" placeholder="Email" required="required" autocomplete="off"/>

            <label for="password">Enter Password</label>
            <input type="password" name="password" placeholder="Password" required="required" autocomplete="off"/>
        </div>
        <button id="btn_submit" type="submit" name="submit">Submit</button>
    </form>
    <button id="back"><a href="index.php">Back</a></button>
</div>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
