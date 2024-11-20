<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>786</title>
    <style>
        h2 {
            margin-left: 30%;
            margin-top: 2%;
            font-size: 45px;
            font-family: Fantasy;
            word-spacing: 10px;
        }

        h4 {
            margin-top: -25px;
            margin-left: 31%;
            word-spacing: 10px;
            width: 360px;
            height: 30px;
            padding-left: 10px;
            background-color: black;
            color: white;
            font-size: 25px;
        }
        h3 {
            margin-left: 350px;
            margin-top: -15px;
            width: 330px;
            text-align: center;
        }
        h5 {
            margin-left: 305px;
            margin-top: -15px;
            font-size: 18px;
            word-spacing: 3px;
        }
        p {
            margin-top: -20px;
            font-size: 20px;
        }





        /* display the voice number cashier customer name data for bil */
        .responsive-table {
            font-size: 15px; 
            line-height: 3px;
            width: 15%;
            border-collapse: collapse;
        }
        /* Responsive CSS */
        @media (max-width: 600px) {
            .responsive-table, thead, tbody, th, td, tr {
                display: block;
            }
            th {
                display: none;
            }
            tr {
                margin-bottom: 1rem;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: center;
            }
            td {
                border: none;
                border-bottom: 1px solid #eee;
                flex: 1;
                position: relative;
                padding-left: 50%;
                box-sizing: border-box;
            }
            td:first-child {
                padding-left: 10px;
            }
            td:before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                top: 8px;
                white-space: nowrap;
                font-weight: bold;
            }
        }












        

        table {
            width: 80%;
            /* margin: 20px auto; */
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            padding-left: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .right-align {
            text-align: right;
        }


    </style>
    <script>
        function confirmDelete(order_id) {
            if (confirm("Are you sure you want to delete this order?")) {
                document.getElementById('delete-form-' + order_id).submit();
            }
        }
        
        function printPDF() {
            var firstSection = document.getElementById('first_section');
            var printButton = document.getElementById('print_button');
            firstSection.style.display = 'none';
            printButton.style.display = 'none';
            window.print();
            firstSection.style.display = 'block';
            printButton.style.display = 'block';
        }


        // when click on pdf btn then total bill is store in order table
        // function updateTotalBill() {
        //     var xhr = new XMLHttpRequest();
        //     xhr.open("POST", "update_total_bill.php", true);
        //     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState == 4 && xhr.status == 200) {
        //             alert(xhr.responseText);
        //             if (xhr.responseText.includes("successfully")) {
        //                 printPDF(); // Call your print function after updating the total bill
        //             }
        //         }
        //     };
            
        //     xhr.send();
        // } 
    </script>
</head>
<body>

<section id="first_section">
    <div class="container">
        <!-- <h3>Customer Orders</h3> -->
        <?php
        // Database connection parameters
        $servername = "localhost"; // Change this to your database server name
        $username = "username"; // Change this to your database username
        $password = "password"; // Change this to your database password
        $dbname = "waqas_cloth_house"; // Change this to your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



        









        // Handle delete request
        if (isset($_POST['delete'])) {
            $order_id = $_POST['order_id'];
            
            // Start transaction
            $conn->begin_transaction();
            
            // Delete the specific order
            $sql = "DELETE FROM orders WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $order_id);
            
            if ($stmt->execute()) {
                echo "Order deleted successfully.";

                // Resequence the order_id values
                $sql = "SET @count = 0";
                $conn->query($sql);
                
                $sql = "UPDATE orders SET order_id = @count:= @count + 1";
                $conn->query($sql);
                
                // Reset the auto-increment value
                $sql = "ALTER TABLE orders AUTO_INCREMENT = 1";
                $conn->query($sql);
                
                // Commit transaction
                $conn->commit();
            } else {
                echo "Error deleting order: " . $conn->error;
                // Rollback transaction in case of error
                $conn->rollback();
            }
            $stmt->close();
        }

        // Handle update request
        if (isset($_POST['update'])) {
            $order_id = $_POST['order_id'];
            $item = $_POST['item'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $total = $_POST['total'];
            $sql = "UPDATE orders SET Item_of_customer_order = ?, Quantity = ?, Price = ?, discount = ?, current_total = ? WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("siidii", $item, $quantity, $price, $discount, $total, $order_id);
            if ($stmt->execute()) {
                echo "Order updated successfully.";
            } else {
                echo "Error updating order: " . $conn->error;
            }
            $stmt->close();
        }

        // Fetch the most recent customer_id
        $sql = "SELECT customer_id FROM orders ORDER BY customer_id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer_id = $row['customer_id'];

            // SQL query to select data from orders table for the given customer_id
            $sql = "SELECT order_id, Item_of_customer_order, Quantity, Price, discount, current_total FROM orders WHERE customer_id = ? ORDER BY customer_id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $customer_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Output data of each row
                echo "<table>
                        <tr>
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th class='right-align'>Total</th>
                            <th>Actions</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["order_id"]."</td>
                            <form id='delete-form-".$row["order_id"]."' method='POST'>
                                <td><input type='text' name='item' value='".$row["Item_of_customer_order"]."'></td>
                                <td><input type='number' name='quantity' value='".$row["Quantity"]."'></td>
                                <td><input type='number' step='0.01' name='price' value='".$row["Price"]."'></td>
                                <td><input type='number' step='0.01' name='discount' value='".$row["discount"]."'></td>
                                <td class='right-align'><input type='number' step='0.01' name='total' value='".$row["current_total"]."'></td>
                                <td>
                                    <input type='hidden' name='order_id' value='".$row["order_id"]."'>
                                    <input type='submit' name='update' value='Update'>
                                    <button type='button' onclick='confirmDelete(".$row["order_id"].")'>Delete</button>
                                    <input type='hidden' name='delete' value='true'>
                                </td>
                            </form>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No results found for the given customer ID.";
            }

            $stmt->close();
        } else {
            echo "No recent customer found.";
        }

        // Close connection
        // $conn->close();
        ?>
    </div>
    <button id="btn3"><a href="purchase.php">Generate Bill</a></button>
    <button id="back"><a href="Add_Customer.html">Back to order page</a></button>
</section>















<!-- display data for bill  -->
<section>

    <div">
        <h2>WAQAS CLOTH HOUSE</h2>
        <h4>THE CLOTH SUPERSTORE</h4>
        <h3>236-13-B1, Abubakar Road Near Barkat Chowk Township Lahore</h3>
        <h5>Mobile no: 03004822786, 03444822786  Ph: 0424822786</h5>
    </div>
    

       <!-- to display name on bill -->
       <table class="responsive-table">
    <tbody>
        <?php
        // Assuming you have established a database connection $conn
        $sqll = "SELECT order_id FROM orders ORDER BY customer_id DESC LIMIT 1";
        $resultss = mysqli_query($conn, $sqll);

        if (mysqli_num_rows($resultss) > 0) {
            while($row = mysqli_fetch_assoc($resultss)) {
                echo "<tr>";
                echo "<th>Invoice # :</th>";
                echo "<td class='order-id' data-label='Invoice #'>10".$row["order_id"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No customers found</td></tr>";
        }
        ?>
    </tbody>
</table>
       <table class="responsive-table">
    <tbody>
        <?php
        // Assuming you have established a database connection $conn
        $sqll = "SELECT first_name FROM add_customer ORDER BY customer_id DESC LIMIT 1";
        $resultss = mysqli_query($conn, $sqll);

        if (mysqli_num_rows($resultss) > 0) {
            while($row = mysqli_fetch_assoc($resultss)) {
                echo "<tr>";
                echo "<th>Cashier :</th>";
                echo "<td class='first-name' data-label='First Name'>".$row["first_name"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No customers found</td></tr>";
        }
        ?>
    </tbody>
</table>
       <table class="responsive-table">
    <tbody>
        <?php
        // Assuming you have established a database connection $conn
        $sqll = "SELECT first_name FROM add_customer ORDER BY customer_id DESC LIMIT 1";
        $resultss = mysqli_query($conn, $sqll);

        if (mysqli_num_rows($resultss) > 0) {
            while($row = mysqli_fetch_assoc($resultss)) {
                echo "<tr>";
                echo "<th>Customer :</th>";
                echo "<td class='first-name' data-label='First Name'>".$row["first_name"]."</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No customers found</td></tr>";
        }
        ?>
    </tbody>
</table>
        


 






    <div class="container">
        <?php
        // Database connection parameters
        $db_host = 'localhost';
        $db_user = 'username'; // replace with your database username
        $db_pass = 'password'; // replace with your database password
        $db_name = 'waqas_cloth_house'; // replace with your database name

        // Create connection
        $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }



        
        // Fetch the most recent customer_id
        $sql = "SELECT customer_id FROM orders ORDER BY customer_id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer_id = $row['customer_id'];

            // SQL query to select data from orders table for the given customer_id
            $sql = "SELECT order_id, Item_of_customer_order, Quantity, Price, discount, current_total FROM orders WHERE customer_id = ? ORDER BY customer_id DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $customer_id);
            $stmt->execute();
            $result = $stmt->get_result();




            
            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Output data of each row
                echo "<table>
                        <tr>
                        ======================================================================================================================================
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th class='right-align'>Total</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["order_id"]."</td>
                            <td>".$row["Item_of_customer_order"]."</td>
                            <td>".$row["Quantity"]."</td>
                            <td>".$row["Price"]."</td>
                            <td>".$row["discount"]."</td>
                            <td class='right-align'>".$row["current_total"]."</td>
                        </tr>";
                }
                echo "</table>";
            } else {
                echo "No results found for the given customer ID.";
            }

            $stmt->close();
        } else {
            echo "No recent customer found.";
        }

        echo json_encode('======================================================================================================================================');


        


        // calculate_total_bill of products
        // Fetch the total bill and order count for the last customer
        $sqlll = "SELECT SUM(current_total) AS total_bill, MAX(customer_id) AS customer_id FROM orders WHERE customer_id = (SELECT MAX(customer_id) FROM orders)";
        $resultss = $conn->query($sqlll);
        
        
        if ($resultss->num_rows > 0) {
            $row = $resultss->fetch_assoc();
            $totalBill = $row['total_bill'];
            $customerId = $row['customer_id'];

            echo '<div><br></div>';
        echo 'Total Bill : '. $totalBill;
            // echo "Total Bill: " . $totalBill;
        
            // Reset previous total_bill values for the customer
            $resetQuery = "UPDATE orders 
                           SET total_bill = NULL 
                           WHERE customer_id = $customerId";
            
            if ($conn->query($resetQuery) === TRUE) {
                // Store the new total bill in the total_bill column for the last order of the customer
                $updateQuery = "UPDATE orders 
                                SET total_bill = $totalBill 
                                WHERE order_id = (SELECT MAX(order_id) FROM orders WHERE customer_id = $customerId)";
                
                if ($conn->query($updateQuery) === TRUE) {
                    echo "Total bill updated successfully.";
                } else {
                    echo "Error updating total bill: " . $conn->error;
                }
            } else {
                echo "Error resetting previous total bill: " . $conn->error;
            }
        } else {
            echo "Unable to fetch total bill.";
        }




        // Close connection
        $conn->close();
        ?>
        
        
    </div>
</section>


<section>

</section>

<!-- <button id="print_button" onclick="printPDF()">Pdf Report</button> -->
<button id="print_button" onclick="printPDF()">Pdf Report</button>
</body>
</html>
