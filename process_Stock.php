<?php
// Database configuration
$servername = "localhost"; // Replace with your server name if different
$username = "username"; // Replace with your database username
$password = "password"; // Replace with your database password
$dbname = "waqas_cloth_house"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") 

$product_name_male = $_POST['Product_Name_Male'] ?? '';
$product_name_female = $_POST['Product_Name_Female'] ?? '';
$other_product = $_POST['Other_Product'] ?? '';

// Initialize a variable to hold the selected product
$selected_product = '';

// Count the number of non-empty inputs
$filled_inputs = 0;
if (!empty($product_name_male)) {
    $filled_inputs++;
    $selected_product = $product_name_male;
}
if (!empty($product_name_female)) {
    $filled_inputs++;
    $selected_product = $product_name_female;
}
if (!empty($other_product)) {
    $filled_inputs++;
    $selected_product = $other_product;
}

if ($filled_inputs === 1) {
    // Sanitize the input to prevent SQL injection
    $selected_product = mysqli_real_escape_string($conn, $selected_product);

    // SQL query to insert data into your table
    $sql = "INSERT INTO Add_Stock (Product_Name_Male) VALUES ('$selected_product')";

    



    $box = isset($_POST['Box']) ? mysqli_real_escape_string($conn, $_POST['Box']) : '';
    $meter = isset($_POST['Meter']) ? mysqli_real_escape_string($conn, $_POST['Meter']) : '';
    $retail_price = isset($_POST['Retail_Price']) ? mysqli_real_escape_string($conn, $_POST['Retail_Price']) : '';
    $purchase_price = isset($_POST['Purchase_price']) ? mysqli_real_escape_string($conn, $_POST['Purchase_price']) : '';
    $quantity = isset($_POST['Quntity']) ? mysqli_real_escape_string($conn, $_POST['Quntity']) : '';
    $gender = isset($_POST['Gender']) ? mysqli_real_escape_string($conn, $_POST['Gender']) : '';
    $warehouse_id = isset($_POST['Warehouse_ID']) ? mysqli_real_escape_string($conn, $_POST['Warehouse_ID']) : '';
    $place = isset($_POST['Place']) ? mysqli_real_escape_string($conn, $_POST['Place']) : '';
    $season = isset($_POST['Season']) ? mysqli_real_escape_string($conn, $_POST['Season']) : '';
    $brand = isset($_POST['Brand']) ? mysqli_real_escape_string($conn, $_POST['Brand']) : '';
    $out_of_stock = isset($_POST['Out_of_Stock']) ? mysqli_real_escape_string($conn, $_POST['Out_of_Stock']) : '';
    $size = isset($_POST['Size']) ? mysqli_real_escape_string($conn, $_POST['Size']) : '';
    $category = isset($_POST['Category']) ? mysqli_real_escape_string($conn, $_POST['Category']) : '';
    $damage_piece = isset($_POST['Damage_Piece']) ? mysqli_real_escape_string($conn, $_POST['Damage_Piece']) : '';
    $description = isset($_POST['Description']) ? mysqli_real_escape_string($conn, $_POST['Description']) : '';

    // Attempt insert query execution
    $sql = "INSERT INTO Add_Stock (Product_Name_Male, Box, Meter, Retail_Price, Purchase_Price, Quantity, Gender, Warehouse_ID, Place, Season, Brand, Out_of_Stock, Size, Category, Damage_Piece, Description)
            VALUES ('$selected_product', '$box', '$meter', '$retail_price', '$purchase_price', '$quantity', '$gender', '$warehouse_id', '$place', '$season', '$brand', '$out_of_stock', '$size', '$category', '$damage_piece', '$description')";
    
    
    // if (mysqli_query($conn, $sql)) {
    //     echo "Records added successfully.";
    // } else {
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    // }

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Please select or enter only one product.";
}



// Close connection
mysqli_close($conn);
?>
