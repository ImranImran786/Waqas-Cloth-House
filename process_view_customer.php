<?php
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

$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
if (!empty($searchQuery)) {
    $sql = "SELECT * FROM add_customer WHERE serving_employee LIKE '%$searchQuery%' OR phone LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT * FROM add_customer";
}
$result = $conn->query($sql);

$output = "";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $customer_id = $row["customer_id"];
        $output .= "<tr>";
        $output .= "<td>" . $row["customer_id"] . "</td>";
        $output .= "<td>" . $row["first_name"] . "</td>";
        $output .= "<td>" . $row["last_name"] . "</td>";
        $output .= "<td>" . $row["address"] . "</td>";
        $output .= "<td>" . $row["city"] . "</td>";
        $output .= "<td>" . $row["phone"] . "</td>";
        $output .= "<td>" . $row["email"] . "</td>";
        $output .= "<td>" . $row["bank"] . "</td>";
        $output .= "<td>" . $row["transaction_id"] . "</td>";
        $output .= "<td>" . $row["serving_employee"] . "</td>";
        $output .= "</tr>";

        // Fetch orders for the current customer_id
        $orderSql = "SELECT Item_of_customer_order, Purchase_date, Quantity, Price, discount, current_total,total_bill, profit_per_customer, total_dicount_per_customer FROM orders WHERE customer_id = $customer_id";
        $orderResult = $conn->query($orderSql);

        if ($orderResult->num_rows > 0) {
            $output .= "<tr><td colspan='10'><table>";
            $output .= "<tr>
                <th>Item</th>
                <th>Purchase Date</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Current Total</th>
                <th>total Bill after Discount</th>
                <th>profit per customer</th>
                <th>total discount per customer</th>
            </tr>";
            while ($orderRow = $orderResult->fetch_assoc()) {
                $output .= "<tr>";
                $output .= "<td>" . $orderRow["Item_of_customer_order"] . "</td>";
                $output .= "<td>" . $orderRow["Purchase_date"] . "</td>";
                $output .= "<td>" . $orderRow["Quantity"] . "</td>";
                $output .= "<td>" . $orderRow["Price"] . "</td>";
                $output .= "<td>" . $orderRow["discount"] . "</td>";
                $output .= "<td>" . $orderRow["current_total"] . "</td>";
                $output .= "<td>" . $orderRow["total_bill"] . "</td>";
                $output .= "<td>" . $orderRow["profit_per_customer"] . "</td>";
                $output .= "<td>" . $orderRow["total_dicount_per_customer"] . "</td>";
                $output .= "</tr>";
            }
            $output .= "</table></td></tr>";
        } else {
            $output .= "<tr><td colspan='10'>No orders found for this customer.</td></tr>";
        }
    }
} else {
    $output .= "<tr><td colspan='10'>No results found</td></tr>";
}

echo $output;

$conn->close();
?>
