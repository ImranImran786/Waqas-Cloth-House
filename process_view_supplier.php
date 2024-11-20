<?php
header('Content-Type: application/json');

// Database connection settings
$db_host = 'localhost';
        $db_user = 'username'; // replace with your database username
        $db_pass = 'password'; // replace with your database password
        $db_name = 'waqas_cloth_house'; // your database name

        // Create connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['error' => 'Connection failed: ' . $conn->connect_error]));
}

// SQL query to select data from Add_Supplier table
$sql = "SELECT supplier_id, Delivery_Boy_Name, Customer_Address, Bill_ID, Ship_ID, Shipping_Cost, Date_of_Shipment, Mode_of_Travel FROM Add_Supplier";
$result = $conn->query($sql);

$suppliers = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $suppliers[] = $row;
    }
}

// Close connection
$conn->close();

echo json_encode($suppliers);
?>
