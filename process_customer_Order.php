<?php
require 'dbcon.php';

// Retrieve the last customer ID from add_customer table
$sql = "SELECT customer_id FROM add_customer ORDER BY customer_id DESC LIMIT 1";
$result = $conn->query($sql);

$last_customer_id = null;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $last_customer_id = $row['customer_id'];
}

// Function to handle adding an order
function addOrder($conn, $customer_id, $customer_order, $quantity, $purchase_date, $price, $current, $total, $discount , $product_colour_name) {
    // Verify that customer_id exists
    $sql_check = "SELECT customer_id FROM add_customer WHERE customer_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    if (!$stmt_check) {
        die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
    }
    $stmt_check->bind_param("i", $customer_id);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows === 0) {
        echo "------------------------ Enter the Quqntity ------------------------" . "<br><br>";
        echo "Error: Customer ID does not exist.";
        exit;
    }

    // Retrieve current stock quantity, purchase price, and meter
    $query_stock = "
        SELECT s.Purchase_Price, s.Quantity, s.Meter
        FROM add_stock s
        WHERE s.Product_Name_Male = ?
    ";
    $stmt_stock = $conn->prepare($query_stock);
    $stmt_stock->bind_param("s", $customer_order);
    $stmt_stock->execute();
    $result_stock = $stmt_stock->get_result();

    if ($result_stock->num_rows > 0) {
        $row_stock = $result_stock->fetch_assoc();
        $Quantity_stock = $row_stock['Quantity'];
        $purchase_price = $row_stock['Purchase_Price'];
        $meter_stock = $row_stock['Meter'];


        if ($Quantity_stock > 0) {


            $colour_name = $product_colour_name; // Assuming product_colour_name is intended for color reference
                    $query_colour = "
                        SELECT colour_quantity
                        FROM product_colour 
                        WHERE product_name = ? AND colour_name = ?
                    ";
                    $stmt_colour = $conn->prepare($query_colour);
                    $stmt_colour->bind_param("ss", $customer_order, $colour_name);
                    $stmt_colour->execute();
                    $result_colour = $stmt_colour->get_result();

                    if ($result_colour->num_rows > 0) {
                        $row_colour = $result_colour->fetch_assoc();
                        $colour_quantity = $row_colour['colour_quantity'];

    // Check if sufficient quantity is available
                        if ($colour_quantity >= $quantity) {


            // Check if Quantity is available
            if ($Quantity_stock >= $quantity) {
                // Perform calculation
                $purchase_amount = $purchase_price * $quantity;
                $gross_profit = $current - $purchase_amount;

                // Insert the order
                $sql = "INSERT INTO orders (customer_id, Item_of_customer_order, Quantity, Purchase_date, Price, current_total, total_bill, discount, gross_profit, product_colour_name)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
                }

                $formatted_date = (new DateTime($purchase_date))->format('Y-m-d');
                $stmt->bind_param("isissdddss", $customer_id, $customer_order, $quantity, $formatted_date, $price, $current, $total, $discount, $gross_profit, $colour_name);

                if ($stmt->execute()) {
                    echo "----------------------successfully----------------------:". "<br><br>" . "New Quantity record created successfully" . "<br>";

                    // Update stock quantity in add_stock table
                    $new_stock = $Quantity_stock - $quantity;
                    $query_update_stock = "UPDATE add_stock SET Quantity = ? WHERE Product_Name_Male = ?";
                    $stmt_update_stock = $conn->prepare($query_update_stock);
                    $stmt_update_stock->bind_param("is", $new_stock, $customer_order);
                    $stmt_update_stock->execute();

    //                 $colour_name = $product_colour_name; // Assuming product_colour_name is intended for c
                            $new_colour_quantity = $colour_quantity - $quantity; // Adjust as necessary for your logic

                            $query_update_colour = "UPDATE product_colour SET colour_quantity = ? WHERE product_name = ? AND colour_name = ?";
                            $stmt_update_colour = $conn->prepare($query_update_colour);
                            $stmt_update_colour->bind_param("iss", $new_colour_quantity, $customer_order, $colour_name); // changed 'dss' to 'iss'

                            if ($stmt_update_colour->execute()) {
                                echo "Colour quantities updated successfully.<br><br>";
                            } else {
                                echo "Error updating colour quantities: " . $stmt_update_colour->error . "<br><br>";
                            }
                    // echo "Stock updated successfully.."  . "<br><br><br>";
                } else {
                    echo "Error:::::::::: " . $stmt->error;
                }
            } else {
                echo "----------------------Error----------------------:". "<br><br>". "Quantity is insufficient in Stock. Available Quantity: " . $Quantity_stock  . "<br><br>";
            }
        } else {
            echo "----------------------Error----------------------:". "<br><br>". " This colour is insufficient Stock Quantity In This Colour. Available Quantity is: " . $colour_quantity . "<br><br>";
        }
    } else {
        echo "Error: Product colour not found in the product_colour table.<br>";
    }
        }

        // Check cloth in Meter 
        if ($meter_stock > 0) {
            // Check if Meter is available

            $colour_name = $product_colour_name; // Assuming product_colour_name is intended for color reference
                    $query_colour = "
                        SELECT colour_in_meter
                        FROM product_colour 
                        WHERE product_name = ? AND colour_name = ?
                    ";
                    $stmt_colour = $conn->prepare($query_colour);
                    $stmt_colour->bind_param("ss", $customer_order, $colour_name);
                    $stmt_colour->execute();
                    $result_colour = $stmt_colour->get_result();

                    if ($result_colour->num_rows > 0) {
                        $row_colour = $result_colour->fetch_assoc();
                        $colour_in_meter = $row_colour['colour_in_meter'];

                    if ($colour_in_meter >= $quantity) {


            if ($meter_stock >= $quantity ) {
                // Perform calculation
                $purchase_amount = $purchase_price * $quantity;
                $gross_profit = $current - $purchase_amount;

                // Insert the order
                $sql = "INSERT INTO orders (customer_id, Item_of_customer_order, Quantity, Purchase_date, Price, current_total, total_bill, discount, gross_profit, product_colour_name)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if (!$stmt) {
                    die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
                }

                $formatted_date = (new DateTime($purchase_date))->format('Y-m-d');
                $quantity_in_meters = $quantity . " (M)";
                $stmt->bind_param("isssdddsds", $customer_id, $customer_order, $quantity_in_meters, $formatted_date, $price, $current, $total, $discount, $gross_profit, $colour_name);

                if ($stmt->execute()) {
                    echo "----------------------successfully----------------------:". "<br><br>" . "New Meter record created successfully." . "<br>";

                    // Update meter stock quantity in add_stock table
                    $new_meter_stock = $meter_stock - $quantity;

                    $query_update_meter_stock = "UPDATE add_stock SET Meter = ? WHERE Product_Name_Male = ?";
                    $stmt_update_meter_stock = $conn->prepare($query_update_meter_stock);
                    $stmt_update_meter_stock->bind_param("ss", $new_meter_stock, $customer_order);
                    $stmt_update_meter_stock->execute();

                            $new_colour_meter = $colour_in_meter - $quantity; // Adjust as necessary for your logic

                            $query_update_colour = "UPDATE product_colour SET colour_in_meter = ? WHERE product_name = ? AND colour_name = ?";
                            $stmt_update_colour = $conn->prepare($query_update_colour);
                            $stmt_update_colour->bind_param("sss", $new_colour_meter, $customer_order, $colour_name); // changed 'dss' to 'iss'

                            if ($stmt_update_colour->execute()) {
            
                                echo "Colour meters updated successfully and new colour quantity is " . $new_colour_meter . "<br><br>";
                            } else {
                                echo "Error updating colour meters: " . $stmt_update_colour->error . "<br><br>";
                            }
                            
                } else {
                    echo "Error::::::::::: " . $stmt->error;
                }
            } 
            
            else {
                echo "----------------------Error----------------------:". "<br><br>". " Meter is insufficient in Stock. Available Meter: " . $meter_stock . "<br><br>";
            }
        } else {
            echo "----------------------Error----------------------:". "<br><br>". " This colour is insufficient Stock Meter In This Colour. Available Meter is: " . $colour_in_meter . "<br><br>";
        }
        
        } else {
            echo "Error: Product colour not found in the product_colour table.<br>";
        }
        }
    } else {
        echo "Error: Product not found in stock.";
    }
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['order_customer_id'] ?? 0;
    $customer_order = $_POST['Item_of_customer_order'] ?? '';
    $quantity = $_POST['Quantity'] ?? 0;
    $purchase_date = $_POST['Purchase_date'] ?? '';
    $price = $_POST['Price'] ?? 0.0;
    $current = $_POST['current_total'] ?? 0.0;
    $total = $_POST['total_bill'] ?? 0.0;
    $discount = $_POST['discount'] ?? 0.0;
    $product_colour_name = $_POST['product_colour_name'] ?? 0.0;

    // Convert the purchase date to the correct format (if needed)
    $formatted_date = (new DateTime($purchase_date))->format('Y-m-d');

    // Call addOrder function
    addOrder($conn, $customer_id, $customer_order, $quantity, $formatted_date, $price, $current, $total, $discount, $product_colour_name);
}






$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
$sq = "SELECT Product_Name_Male, Retail_Price, Meter, Quantity, stock_id FROM add_stock";
if (!empty($searchQuery)) {
    $sq .= " WHERE Product_Name_Male LIKE '%$searchQuery%' OR stock_id LIKE '%$searchQuery%'";
}
// Query to get the last customer ID
$sqll = "SELECT customer_id FROM add_customer ORDER BY customer_id DESC LIMIT 1";

$result = $conn->query($sq);
$result2 = $conn->query($sqll);

if ($result->num_rows > 0 && $result2->num_rows > 0) {
    $lastCustomerIdRow = $result2->fetch_assoc();
    $lastCustomerId = $lastCustomerIdRow['customer_id'];

    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick='selectPrice(this); selectMeter(this); selectProduct(this); selectorderid(this); selectid(this);'>";
        echo "<td>" . $row["Product_Name_Male"] . "</td>";
        echo "<td>" . $row["Retail_Price"] . "</td>";
        echo "<td>" . $row["Meter"] . "</td>";
        echo "<td>" . $lastCustomerId . "</td>"; // Use the last customer ID from the second query
        echo "<td>" . $row["Quantity"] . "</td>";
        echo "<td>" . $row["stock_id"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>No products found</td></tr>";
}




// calculate total bill and total items
$sqlll = "SELECT SUM(current_total) AS total_bill, COUNT(*) AS order_count FROM orders WHERE customer_id = (SELECT MAX(customer_id) FROM orders)";
$resultss = $conn->query($sqlll);

if ($resultss->num_rows > 0) {
    $row = $resultss->fetch_assoc();
    $totalBill = $row["total_bill"];
    $totalItems = $row["order_count"];

    echo "<h4>Total Bill: " . number_format($totalBill, 2) . "</h4>";
    echo "<h4>Total Items: " . $totalItems . "</h4>";
} else {
    echo "<h4>Total Bill: 0</h4>";
    echo "<h4>Total Items: 0</h4>";
}
$conn->close();
?>
