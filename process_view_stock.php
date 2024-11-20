<?php
// Database connection
        $db_host = 'localhost';
        $db_user = 'username'; // replace with your database username
        $db_pass = 'password'; // replace with your database password
        $db_name = 'waqas_cloth_house'; // your database name

        // Create connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}




$searchProductName = isset($_GET['Product_Name_Male']) ? $_GET['Product_Name_Male'] : '';
$searchRetailPrice = isset($_GET['Retail_Price']) ? $_GET['Retail_Price'] : '';
$searchPlace = isset($_GET['Place']) ? $_GET['Place'] : '';

$sql = "SELECT stock_id, Product_Name_Male, Box, Meter, Retail_Price, Purchase_Price, Quantity, Gender, Warehouse_ID, Place, Season, Brand, Out_of_stock, Size, Category, Damage_Piece, Description, supplier_id FROM Add_Stock WHERE 1=1";

if ($searchProductName != '') {
    $sql .= " AND Product_Name_Male LIKE '%$searchProductName%'";
}
if ($searchRetailPrice != '') {
    $sql .= " AND Retail_Price LIKE '%$searchRetailPrice%'";
}
if ($searchPlace != '') {
    $sql .= " AND Place LIKE '%$searchPlace%'";
}


$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($data);
?>
