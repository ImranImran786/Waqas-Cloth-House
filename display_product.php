<?php
// Database connection
$servername = "localhost";
$username = "username"; // Change to your database username
$password = "password"; // Change to your database password
$dbname = "waqas_cloth_house"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve search query
$product_name = isset($_GET['product_name']) ? $_GET['product_name'] : '';

// Prepare SQL statement
$sql = "SELECT colour_id, product_name, colour_name, colour_quantity, colour_in_meter FROM product_colour WHERE product_name LIKE ?";
$stmt = $conn->prepare($sql);
$searchTerm = '%' . $conn->real_escape_string($product_name) . '%'; // Add wildcard for LIKE query
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

// Output HTML with CSS styles
echo '<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 20px;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .table th, .table td {
        border: 1px solid #dee2e6;
        padding: 6px;
        text-align: left;
    }
    .table th {
        background-color: #007bff;
        color: white;
    }
    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #f2f2f2;
    }
    .table tbody tr:hover {
        background-color: #e2e2e2;
    }
</style>';

if ($result->num_rows > 0) {
    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Colour ID</th><th>Product Name</th><th>Colour Name</th><th>' . 
         ($result->fetch_assoc()['colour_in_meter'] == 0 ? 'Colour Quantity' : 'Colour In Meter') .
         '</th></tr></thead>';
    echo '<tbody>';

    // Reset result pointer to the beginning
    $result->data_seek(0);

    while ($row = $result->fetch_assoc()) {
        // Use parent.selectColour to call the function in the parent window (the HTML file)
        echo '<tr onclick="parent.selectColour(\'' . htmlspecialchars($row['colour_name']) . '\');" style="cursor: pointer;">';
        echo '<td>' . htmlspecialchars($row['colour_id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['product_name']) . '</td>';
        echo '<td>' . htmlspecialchars($row['colour_name']) . '</td>';
        
        // Display either colour_quantity or colour_in_meter based on the condition
        if ($row['colour_in_meter'] == 0) {
            echo '<td>' . htmlspecialchars($row['colour_quantity']) . '</td>';
        } else {
            echo '<td>' . htmlspecialchars($row['colour_in_meter']) . '</td>';
        }
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo "No products found.";
}

// Close connection
$stmt->close();
$conn->close();
?>
