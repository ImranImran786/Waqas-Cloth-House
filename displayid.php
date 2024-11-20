<?php
require 'dbcon.php'; // Include your database connection

// Get the JSON data sent from JavaScript or check for GET requests
$data = json_decode(file_get_contents("php://input"));

// Check if the 'action' parameter is received to differentiate between tasks
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($action === 'fetch_last_customer_id') {
        // Fetch the last customer ID from add_customer table
        $sql = "SELECT customer_id FROM add_customer ORDER BY customer_id DESC LIMIT 1";
        $result = $conn->query($sql);

        $last_customer_id = null;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $last_customer_id = $row['customer_id'];
        }

        // Return the last customer ID in JSON format
        echo json_encode(array("last_customer_id" => $last_customer_id));
    }
} else if (isset($data->action) && $data->action === 'fetch_meter') {
    // Check if product_name is received for fetching meter
    if (isset($data->product_name)) {
        $product_name = $data->product_name;

        // Query to fetch the meter value from add_stock table where product name matches
        $sql = "SELECT Meter FROM add_stock WHERE Product_Name_Male = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $product_name);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if any result is returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $meter = $row['Meter'];

            // Return meter in JSON format
            echo json_encode(array("success" => true, "meter" => $meter));
        } else {
            // No matching product found
            echo json_encode(array("success" => false, "message" => "No data found"));
        }
    } else {
        // Invalid request if product_name is not sent
        echo json_encode(array("success" => false, "message" => "Invalid request"));
    }
} else {
    // Invalid request if 'action' parameter is not sent
    echo json_encode(array("success" => false, "message" => "Invalid request"));
}
?>
