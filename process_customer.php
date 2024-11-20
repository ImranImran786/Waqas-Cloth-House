<?php
require 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'] ?? null;
    $last_name = $_POST['last_name'] ?? null;
    $address = $_POST['address'] ?? null;
    $city = $_POST['city'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $email = $_POST['email'] ?? null;
    $serving_employee = $_POST['serving_employee'] ?? null;
    $bank = $_POST['bank'] ?? null;
    $transaction_id = $_POST['transaction_id'] ?? null;

    $sql = "INSERT INTO add_customer (first_name, last_name, address, city, phone, email, serving_employee, bank, transaction_id)
            VALUES ('$first_name', '$last_name', '$address', '$city', '$phone', '$email', '$serving_employee', '$bank', '$transaction_id')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Operation Result</p>";
        echo "<p>New record created successfully</p>";
    } else {
        echo "<h1>Operation Result</h1>";
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}





$conn->close();
?>