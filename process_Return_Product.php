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

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $product_name = $_POST['Product_Name'] ?? '';
    $return_reason = $_POST['Return_Reason'] ?? '';
    $bill_id = $_POST['Bill_ID'] ?? '';
    $quantity = $_POST['Quantity'] ?? '';
    $customer_name = $_POST['Customer_Name'] ?? '';
    $meter = $_POST['Meter'] ?? '';
    $refund_amount = $_POST['Refund_Amount'] ?? '';
    $product_colour_name = $_POST['product_colour_name'] ?? '';
    $Suit_Meter = $_POST['Suit_Meter'] ?? '';

    // Sanitize inputs to prevent SQL injection
    $product_name = $conn->real_escape_string($product_name);
    $return_reason = $conn->real_escape_string($return_reason);
    $bill_id = $conn->real_escape_string($bill_id);
    $quantity = $conn->real_escape_string($quantity);
    $customer_name = $conn->real_escape_string($customer_name);
    $meter = $conn->real_escape_string($meter);
    $refund_amount = $conn->real_escape_string($refund_amount);
    $product_colour_name = $conn->real_escape_string($product_colour_name);
    $Suit_Meter = $conn->real_escape_string($Suit_Meter);

    // Ensure the Meter is cast as an integer for proper arithmetic
    $meter = (int) $meter;
    $quantity = (int) $quantity;

    // SQL query to insert data into the Return_Product table
    $sql = "INSERT INTO Return_Product (Product_Name, colour_name_of_product, Return_Reason, Bill_ID, Meter, Quantity, Customer_Name, Refund_Amount) 
            VALUES ('$product_name', '$product_colour_name', '$return_reason', '$bill_id', '$meter', '$quantity', '$customer_name', '$refund_amount')";

    if ($conn->query($sql) === TRUE) {
        echo "New return record created successfully<br>";

        // Fetch the most recent return product data
        $sqlUpdate = "SELECT Product_Name, Quantity, Meter FROM Return_Product ORDER BY return_id DESC LIMIT 1";
        $result = $conn->query($sqlUpdate);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productName = $row['Product_Name'];
                $quantity = (int) $row['Quantity'];  // Ensure this is treated as an integer
                $meter = (int) $row['Quantity'];  // Ensure this is treated as an integer

                // Fetch the product colour details from product_colour table
                $sqlUpdate2 = "SELECT product_name, colour_name, colour_quantity, colour_in_meter 
                               FROM product_colour WHERE product_name = ? AND colour_name = ?";
                $stmt2 = $conn->prepare($sqlUpdate2);

                // Bind the correct product name and colour name for the product
                $stmt2->bind_param("ss", $productName, $product_colour_name);
                $stmt2->execute();
                $result2 = $stmt2->get_result();

                if ($result2->num_rows > 0) {
                    $colourRow = $result2->fetch_assoc();
                    $colour_quantity = (int) $colourRow['colour_quantity']; // Ensure integer type
                    $colour_in_meter = (int) $colourRow['colour_in_meter']; // Ensure integer type
                    $product_name = $colourRow['product_name'];
                    $colour_name = $colourRow['colour_name'];

                    if ($Suit_Meter == "Suit") {
                        // Update Quantity in add_stock table
                        $updateSql = "UPDATE add_stock SET Quantity = Quantity + ? WHERE Product_Name_Male = ?";
                        $stmt = $conn->prepare($updateSql);
                        $stmt->bind_param("is", $quantity, $productName);

                        // Update colour_quantity in product_colour table
                        $updateColourSql = "UPDATE product_colour SET colour_quantity = colour_quantity + ? WHERE product_name = ? AND colour_name = ?";
                        $stmtColour = $conn->prepare($updateColourSql);
                        $stmtColour->bind_param("iss", $quantity, $product_name, $colour_name);

                    } else {
                        // Update Meter in add_stock table
                        $updateSql = "UPDATE add_stock SET Meter = Meter + ? WHERE Product_Name_Male = ?";
                        $stmt = $conn->prepare($updateSql);
                        $stmt->bind_param("ss", $meter, $productName);

                        // Update colour_in_meter in product_colour table
                        $updateColourSql = "UPDATE product_colour SET colour_in_meter = colour_in_meter + ? WHERE product_name = ? AND colour_name = ?";
                        $stmtColour = $conn->prepare($updateColourSql);
                        $stmtColour->bind_param("sss", $meter, $product_name, $colour_name);
                    }

                    // Execute both update queries
                    $updateStockSuccess = $stmt->execute();
                    $updateColourSuccess = $stmtColour->execute();

                    if ($updateStockSuccess && $updateColourSuccess) {
                        echo "Stock and colour information updated successfully.<br>";
                    } else {
                        echo "Error updating stock or colour: " . $stmt->error . "<br>";
                    }

                    // Close the statements
                    $stmt->close();
                    $stmtColour->close();
                } else {
                    echo "No matching colour data found.<br>";
                }

                $stmt2->close();
            }
        } else {
            echo "No return products found.<br>";
        }

        // Check if return_reason is "damage" and update Damage_Piece column
        if (strtolower($return_reason) == 'demage') {
            $updateDamageSql = "UPDATE add_stock SET Damage_Piece = Damage_Piece + 1 WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($updateDamageSql);
            $stmt->bind_param("s", $product_name);

            if ($stmt->execute()) {
                echo "Damage pieces updated successfully.<br>";
            } else {
                echo "Error updating damage pieces: " . $stmt->error . "<br>";
            }
            $stmt->close();
        } else {
            echo "Return reason is not 'demage'.<br>";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Display the add_stock table data for selecting product
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
$sq = "SELECT Product_Name_Male, Retail_Price, Meter, Quantity, stock_id FROM add_stock";
if (!empty($searchQuery)) {
    $sq .= " WHERE Product_Name_Male LIKE '%$searchQuery%' OR Retail_Price LIKE '%$searchQuery%'";
}

$result = $conn->query($sq);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick='selectPrice(this); selectMeter(this); selectProduct(this);'>";
        echo "<td>" . $row["Product_Name_Male"] . "</td>";
        echo "<td>" . $row["Retail_Price"] . "</td>";
        echo "<td>" . $row["Meter"] . "</td>";
        echo "<td>" . $row["Quantity"] . "</td>";
        echo "<td>" . $row["stock_id"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>No products found</td></tr>";
}

// Close the connection
$conn->close();
?>
