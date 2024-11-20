<?php
// Database connection parameters
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

// Function to check if Bill_ID exists in add_customer table
function checkBillId($conn, $bill_id) {
    $stmt = $conn->prepare("SELECT customer_id FROM add_customer WHERE customer_id = ?");
    $stmt->bind_param("i", $bill_id);
    $stmt->execute();
    $stmt->store_result();
    
    // Check if a row was returned
    return $stmt->num_rows > 0;
}

// Get form data
$delivery_boy_name = $_POST['Delivery_Boy_Name'] ?? '';
$address = $_POST['Customer_Address'] ?? '';
$bill_id = $_POST['Bill_ID'] ?? '';
$ship_id = $_POST['Ship_ID'] ?? '';
$shipping_cost = $_POST['Shipping_Cost'] ?? '';
$date_of_shipment = $_POST['Date_of_Shipment'] ?? '';
$mode_of_travel = $_POST['Mode_of_Travel'] ?? '';

// Sanitize inputs to prevent SQL injection
$delivery_boy_name = mysqli_real_escape_string($conn, $delivery_boy_name);
$address = mysqli_real_escape_string($conn, $address);
$bill_id = mysqli_real_escape_string($conn, $bill_id);
$ship_id = mysqli_real_escape_string($conn, $ship_id);
$shipping_cost = mysqli_real_escape_string($conn, $shipping_cost);
$date_of_shipment = mysqli_real_escape_string($conn, $date_of_shipment);
$mode_of_travel = mysqli_real_escape_string($conn, $mode_of_travel);

// Check if Bill_ID exists in add_customer table
if (checkBillId($conn, $bill_id)) {
    // SQL query to insert data into the Add_Supplier table
    $sql = "INSERT INTO Add_Supplier (Delivery_Boy_Name, Customer_Address, Bill_ID, Ship_ID, Shipping_Cost, Date_of_Shipment, Mode_of_Travel) 
            VALUES ('$delivery_boy_name', '$address', '$bill_id', '$ship_id', '$shipping_cost', '$date_of_shipment', '$mode_of_travel')";

    if ($conn->query($sql) === TRUE) {
        echo "New supplier record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Bill ID does not match any customer.";
}

// Close the database connection
$conn->close();
?>
