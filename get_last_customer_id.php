<?php
// Database connection
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

// Fetch last customer ID from database
$sql = "SELECT customer_id FROM add_customer ORDER BY customer_id DESC LIMIT 1";
$result = $conn->query($sql);

$last_customer_id = null;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_customer_id = $row['customer_id'];
}

// Close the connection
$conn->close();

// Output JSON response
header('Content-Type: application/json');
echo json_encode(array("last_customer_id" => $last_customer_id));
?>



<?php
// Fetch last customer ID from database
$last_customer_id = 59; // Replace with actual PHP code to fetch this from your database

// Output JSON response
header('Content-Type: application/json');
echo json_encode(array("last_customer_id" => $last_customer_id));
?>
