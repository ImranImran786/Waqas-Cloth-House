<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>786</title>
    <style>
        h2 {
            margin-left: 1.9%;
            /* margin-top: 2%; */
            font-size: 45px;
            font-family: Fantasy;
            word-spacing: 10px;
        }

        h4 {
            margin-top: -10px;
            margin-left: 4%;
            word-spacing: 10px;
            width: 360px;
            padding-top: 1px;
            height: 35.5px;
            padding-left: 10px;
            background-color: black;
            color: white;
            font-size: 28px;
        }
        h3 {
            margin-left: 5%;
            margin-top: -6px;
            width: 330px;
            text-align: center;
        }
        h5 {
            margin-left: 4%;
            margin-top: -8px;
            font-size: 18px;
            word-spacing: 3px;
            /* text-align: center; */
        }
        /* p {
            margin-top: -20px;
            font-size: 20px;
        } */





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



        #backdiv{
        width: 100%;
        float: left;
        height: 70px;
        /* border: 5px solid black; */
    }

    #backdiv #back {
      width: 13%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 2px;
      margin-left: 2%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #backdiv #back:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }




    #print_button {
      width: 13%;
      height: 50px;
      color: black;
      background-color: white;
      margin-top: 2px;
      margin-left: 2%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
      cursor: pointer;
    }
    #print_button:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }



    /* update and delete button color  */
    input[type='text'],
        input[type='number'] {
            /* width: 100%; */
            padding: 8px;
            margin: 4px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type='submit'] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            margin: 4px 2px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type='submit']:hover {
            background-color: blue;
        }

        .right-align input[type='number'] {
            text-align: right;
        }






        /* Crlt P shortcut for print  */
        
@media print {
    /*body * {
        visibility: hidden;
    }*/
    #printable-section, #printable-section * {
        visibility: visible;
    }
    #printable-section {
        position: absolute;
        left: 0;
        top: 0;
    }
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
        
    </script>
</head>
<body>

<section id="first_section">
    <div class="container">
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







// Function to check if a value is a number
function is_number($value) {
    return is_numeric($value);
}

// Handle update request
if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $new_quantity = $_POST['quantity']; // Fetch the new quantity from the form input
    $discount = $_POST['discount']; // Fetch the discount value from the form input
    $new_price = $_POST['price']; // Fetch the price value from the form input
    $product_colour_name = $_POST['product_colour_name']; // Fetch the price value from the form input

    // Check if the new quantity is a number
    if (is_number($new_quantity)) {
        echo "New discount -------------> " . $discount . "<br>";
        // Fetch the current quantity, discount, price, and item_of_customer_order from the orders table
        $sql = "SELECT Quantity, Discount, Price, item_of_customer_order, product_colour_name FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $current_quantity = $row['Quantity'];
        $current_discount = $row['Discount'];
        $current_price = $row['Price'];
        $item_of_customer_order = $row['item_of_customer_order'];
        $product_colour_name = $row['product_colour_name'];

        echo "Previous discount --------> " . $current_discount . "<br>";

        $difference = $new_quantity - $current_quantity;

        // echo "you Increase Quantity : " . $difference . "<br>""<br>";

        if ($difference > 0) {
            // Check the available stock in add_stock table
            $sql = "SELECT Quantity , Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $available_stock = $row['Quantity'];
            $Purchase_Price = $row['Purchase_Price'];



            // add data in or update data in product colour table start 
        $sql = "SELECT colour_quantity FROM product_colour WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // $current_quantity = $row['Quantity'];
        $colour_quantity = $row['colour_quantity'];

        if ($colour_quantity >= $difference) {
            if ($available_stock >= $difference) {
                // Update the orders table

                $Total_profit_per = $new_price - $Purchase_Price;
                $Total_profit_per_customer = $Total_profit_per*$new_quantity;
                $sql = "UPDATE orders SET gross_profit = ?, Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("iidii", $Total_profit_per_customer , $new_quantity, $discount, $new_price, $order_id);
                $stmt->execute();




                // add data in or update data in product colour table start 
        $colour_quantity_after_sub = $colour_quantity - $difference;
        $sql = "UPDATE product_colour SET colour_quantity = ? WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $colour_quantity_after_sub, $item_of_customer_order, $product_colour_name);
        $stmt->execute();

        // echo "The item_of_customer_order is ---------> " . $item_of_customer_order . "<br>";
        // echo "The product_colour_name is ---------> " . $product_colour_name . "<br>";
        // echo "The colour_in_qunatity is ---------> " . $colour_quantity . "<br>";
        // echo "The new_quantity_without_difference is ---------> " . $difference . "<br>";
        // add data in or update data in product colour table end


                $new_stock_quantity = $available_stock - $difference;
                $sql = "UPDATE add_stock SET Quantity = ? WHERE Product_Name_Male = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("is", $new_stock_quantity, $item_of_customer_order);
                $stmt->execute();

                echo "The previous Quantity in stock is ---------> " . $available_stock . "<br>";
                echo "The New Quantity in stock is --------------> " . $new_stock_quantity . "<br>";
                echo "---------------------------------------------------------------- successfully ---------------------------------------------------------------- <br><br>";
            } else {
                echo "Insufficient stock. Available stock is: " . $available_stock;
            }
        } else {
            echo "Insufficient stock In this Colours. Available stock is: " . $colour_quantity;
        }


        } elseif ($difference < 0) {
            // Handle case where quantity is decreased in the orders table
            $sql = "SELECT Quantity, Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $available_stock = $row['Quantity'];
            $Purchase_Price = $row['Purchase_Price'];

            // Update the orders table
            // $sql = "UPDATE orders SET Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
            // $stmt = $conn->prepare($sql);
            // $stmt->bind_param("idii", $new_quantity, $discount, $new_price, $order_id);
            // $stmt->execute();

            $Total_profit_per = $new_price - $Purchase_Price;
            $Total_profit_per_customer = $Total_profit_per*$new_quantity;
            $sql = "UPDATE orders SET gross_profit = ?, Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("iidii", $Total_profit_per_customer , $new_quantity, $discount, $new_price, $order_id);
            $stmt->execute();



            // add data in or update data in product colour table start 
        $sql = "SELECT colour_quantity FROM product_colour WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // $current_quantity = $row['Quantity'];
        $colour_quantity = $row['colour_quantity'];

        // $new_quantity_without_suf = abs($new_quantity_without_suffix);
        $colour_quantity_after_sub = $colour_quantity - $difference;
        $sql = "UPDATE product_colour SET colour_quantity = ? WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $colour_quantity_after_sub, $item_of_customer_order, $product_colour_name);
        $stmt->execute();

        // echo "The item_of_customer_order is ---------> " . $item_of_customer_order . "<br>";
        // echo "The product_colour_name is ---------> " . $product_colour_name . "<br>";
        // echo "The colour_in_qunatity is ---------> " . $colour_quantity . "<br>";
        // echo "The new_quantity_without_difference is ---------> " . $difference . "<br>";
        // add data in or update data in product colour table end


            // Update the add_stock table
            $new_stock_quantity = $available_stock - $difference; // Since difference is negative, this adds the absolute value

            $sql = "UPDATE add_stock SET Quantity = ? WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("is", $new_stock_quantity, $item_of_customer_order);
            $stmt->execute();
            
            echo "The previous Quantity in stock is ---------> " . $available_stock . "<br>";
            echo "The New Quantity in stock is --------------> " . $new_stock_quantity . "<br>";
            echo "---------------------------------------------------------------- successfully ---------------------------------------------------------------- <br><br>";





        } else {
            $sql = "SELECT Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $Purchase_Price = $row['Purchase_Price'];

            $Total_profit_per = $new_price - $Purchase_Price;
            $Total_profit_per_customer = $Total_profit_per*$new_quantity;

            // If there's no change in quantity, just update the discount and price if they're different
            if ($current_discount != $discount || $current_price != $new_price) {
                $sql = "UPDATE orders SET gross_profit = ?, Discount = ?, Price = ? WHERE order_id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("idii", $Total_profit_per_customer , $discount, $new_price, $order_id);
                $stmt->execute();
                echo "Discount and/or price updated successfully.";
            } else {
                echo "No change in quantity, discount, or price.";
            }
        }
    } else {
        // Run this code if Quantity is in the format "5 (M)"






// --------------------------------Meter update code ----------------------------------------
        echo "Meter.";        // Handle update request
if (isset($_POST['update'])) {
    $order_id = $_POST['order_id'];
    $new_quantity = $_POST['quantity']; // Fetch the new quantity from the form input

    $discount = $_POST['discount']; // Fetch the discount value from the form input
    $new_price = $_POST['price']; // Fetch the price value from the form input

    // Fetch the current quantity, discount, price, and item_of_customer_order from the orders table
    $sql = "SELECT Quantity, Discount, Price, item_of_customer_order, product_colour_name FROM orders WHERE order_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    // $current_quantity = $row['Quantity'];
    $current_discount = $row['Discount'];
    $current_price = $row['Price'];
    $item_of_customer_order = $row['item_of_customer_order'];
    $product_colour_name = $row['product_colour_name'];



    echo "Previous discount --------> " . $current_discount . "<br>";
    // $new_quantity = $_POST['quantity']; // Example: "5 (M)"
// Extract the numeric value from $new_quantity
$numeric_quantity = floatval(preg_replace('/[^0-9.]/', '', $new_quantity));
$current_quantitys = $row['Quantity'];
$current_quantity = floatval(preg_replace('/[^0-9.]/', '', $current_quantitys));
// Perform your calculations
$new_quantity_without_suffix = $numeric_quantity - $current_quantity;
// Append the "(M)" suffix back to the calculated quantity
$difference = $new_quantity_without_suffix . " (M)";

// // Display the result
// echo "New current_quantity without: " . $current_quantity . "<br>";
// echo "New Quantity: " . $difference . "<br>";



    // $difference = $new_quantity - $current_quantity;

    if ($difference > 0) {
        // Check the available stock in add_stock table
        $sql = "SELECT Meter, Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $item_of_customer_order);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $available_stock = $row['Meter'];
        $Purchase_Price = $row['Purchase_Price'];



            $sql = "SELECT colour_in_meter FROM product_colour WHERE product_name = ? && colour_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            // $current_quantity = $row['Quantity'];
            $colour_in_meter = $row['colour_in_meter'];


        if ($colour_in_meter >= $new_quantity_without_suffix) {
        if ($available_stock >= $new_quantity_without_suffix) {
            // Update the orders table
            $Total_profit_per = $new_price - $Purchase_Price;





            $new_quantity = $_POST['quantity']; // Example: "5 (M)"
            $numeric_quantity = floatval(preg_replace('/[^0-9.]/', '', $new_quantity));
            // Extract the numeric value from $new_quantity
            $Total_profit_per_customer_without_M = $Total_profit_per * $numeric_quantity;
            $Total_profit_per_customer = $Total_profit_per_customer_without_M . " (M)";

            // $Total_profit_per_customer = $Total_profit_per * $new_quantity;


            $sql = "UPDATE orders SET gross_profit = ?, Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            // $quantity_in_meters = $new_quantity . " (M)";
            $stmt->bind_param("dsdii", $Total_profit_per_customer, $new_quantity, $discount, $new_price, $order_id);
            $stmt->execute();



            $colour_meter_after_sub = $colour_in_meter - $new_quantity_without_suffix;
            $sql = "UPDATE product_colour SET colour_in_meter = ? WHERE product_name = ? && colour_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $colour_meter_after_sub, $item_of_customer_order, $product_colour_name);
            $stmt->execute();

            // echo "The item_of_customer_order is ---------> " . $item_of_customer_order . "<br>";
            // echo "The product_colour_name is ---------> " . $product_colour_name . "<br>";
            // echo "The colour_in_meter is ---------> " . $colour_in_meter . "<br>";
            // echo "The new_quantity_without_suffix is ---------> " . $new_quantity_without_suffix . "<br>";


            // Update the add_stock table
            $new_stock_quantity_without_suffix = $available_stock - $new_quantity_without_suffix;
            $new_stock_quantity = $new_stock_quantity_without_suffix . " (M)";
            
            $sql = "UPDATE add_stock SET Meter = ? WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $new_stock_quantity, $item_of_customer_order);
            $stmt->execute();

            
            echo "The previous Meter in stock is ---------> " . $available_stock . "<br>";
            echo "The New Meter in stock is ------1--------> " . $new_stock_quantity . "<br>";
            echo "---------------------------------------------------------------- successfully ---------------------------------------------------------------- <br><br>";
        } else {
            echo "Insufficient stock Meter. Available stock is: " . $available_stock;
        }
    } else {
        echo "Insufficient stock Meter In this Colour. Available stock is: " . $colour_in_meter;
    }
    } elseif ($difference < 0) {
        // Handle case where quantity is decreased in the orders table
        $sql = "SELECT Meter , Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $item_of_customer_order);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $available_stock = $row['Meter'];
        $Purchase_Price = $row['Purchase_Price'];

        // Update the orders table
        // $sql = "UPDATE orders SET Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
        // $stmt = $conn->prepare($sql);
        // $stmt->bind_param("sdii", $new_quantity, $discount, $new_price, $order_id);
        // $stmt->execute();

        $Total_profit_per = $new_price - $Purchase_Price;

        $new_quantity = $_POST['quantity']; // Example: "5 (M)"
        $numeric_quantity = floatval(preg_replace('/[^0-9.]/', '', $new_quantity));
        // Extract the numeric value from $new_quantity
        $Total_profit_per_customer_without_M = $Total_profit_per * $numeric_quantity;
        $Total_profit_per_customer = $Total_profit_per_customer_without_M . " (M)";
        
        // $Total_profit_per_customer = $Total_profit_per * $new_quantity;
        $sql = "UPDATE orders SET gross_profit = ?, Quantity = ?, Discount = ?, Price = ? WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        // $quantity_in_meters = $new_quantity . " (M)";
        $stmt->bind_param("dsdii", $Total_profit_per_customer, $new_quantity, $discount, $new_price, $order_id);
        $stmt->execute();



        // add data in or update data in product colour table start 
        $sql = "SELECT colour_in_meter FROM product_colour WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // $current_quantity = $row['Quantity'];
        $colour_in_meter = $row['colour_in_meter'];

        // $new_quantity_without_suf = abs($new_quantity_without_suffix);
        $colour_meter_after_sub = $colour_in_meter - $new_quantity_without_suffix;
        $sql = "UPDATE product_colour SET colour_in_meter = ? WHERE product_name = ? && colour_name = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $colour_meter_after_sub, $item_of_customer_order, $product_colour_name);
        $stmt->execute();

        // echo "The item_of_customer_order is ---------> " . $item_of_customer_order . "<br>";
        // echo "The product_colour_name is ---------> " . $product_colour_name . "<br>";
        // echo "The colour_in_meter is ---------> " . $colour_in_meter . "<br>";
        // echo "The new_quantity_without_suffix is ---------> " . $new_quantity_without_suffix . "<br>";
        // add data in or update data in product colour table end



        // Update the add_stock table
        // $new_quantity_without_suffix = abs($new_quantity_without_suffix);
        $new_stock_quantity_without_suffix = $available_stock - $new_quantity_without_suffix;
        $new_stock_quantity = $new_stock_quantity_without_suffix . " (M)";
        // $new_stock_quantity = $available_stock - $difference; 

        
        $sql = "UPDATE add_stock SET Meter = ? WHERE Product_Name_Male = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $new_stock_quantity, $item_of_customer_order);
        $stmt->execute();

        echo "The previous Meter in stock is ---------> " . $available_stock . "<br>";
        echo "The New Meter in stock is --------------> " . $new_stock_quantity . "<br>";
        echo "---------------------------------------------------------------- successfully ---------------------------------------------------------------- <br><br>";
    } else {

        $sql = "SELECT Purchase_Price FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $Purchase_Price = $row['Purchase_Price'];

            $Total_profit_per = $new_price - $Purchase_Price;
            $Total_profit_per_customer = $Total_profit_per*$new_quantity;

        // If there's no change in quantity, just update the discount and price if they're different
        if ($current_discount != $discount || $current_price != $new_price) {
            $sql = "UPDATE orders SET gross_profit = ?, Discount = ?, Price = ? WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("idii", $Total_profit_per_customer ,$discount, $new_price, $order_id);
            $stmt->execute();
            echo "Discount and/or price updated successfully.";
        } else {
            echo "No change in quantity, discount, or price.";
        }
    }
}

// -------------------------Meter update code end ----------------------------
}
}










if (isset($_POST['delete'])) {
    $order_id = $_POST['order_id'];
    $new_quantity = $_POST['quantity']; // Fetch the new quantity from the form input
    $discount = $_POST['discount'];

    if (is_numeric($new_quantity)) {
        // Fetch the quantity, item_of_customer_order, and product_colour_name from the orders table
        $sql = "SELECT Quantity, item_of_customer_order, product_colour_name FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantity_to_add_back = $row['Quantity'];
            $item_of_customer_order = $row['item_of_customer_order'];
            $product_colour_name = $row['product_colour_name'];

            // Check if product_colour_name is empty
            if (empty($product_colour_name)) {
                echo "Error: Product colour is missing for item: $item_of_customer_order.<br>";
                return;  // Exit the script
            }

            // Delete the order from the orders table
            $sql = "DELETE FROM orders WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();

            // Add the quantity back to the stock (for Product_Name_Male)
            $sql = "SELECT Quantity FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_stock = floatval($row['Quantity']); 
                $new_stock_quantity = $current_stock + floatval($quantity_to_add_back);

                // Update the stock
                $sql = "UPDATE add_stock SET Quantity = ? WHERE Product_Name_Male = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $new_stock_quantity, $item_of_customer_order);
                $stmt->execute();

                echo "Previous Quantity in Stock of " . $item_of_customer_order . " : " . $current_stock . "<br>";
                echo "New Quantity in Stock of " . $item_of_customer_order . " : " . $new_stock_quantity . "<br>";
            } else {
                echo "Stock entry not found for item: $item_of_customer_order.<br>";
            }

            // Add the quantity back to the product_colour table (for Colour and Product)
            $sql = "SELECT colour_quantity FROM product_colour WHERE product_name = ? AND colour_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_stock_of_colour_quantity = floatval($row['colour_quantity']); 
                $new_stock_quantity_colour = $current_stock_of_colour_quantity + floatval($quantity_to_add_back); 

                // Update the product_colour stock
                $sql = "UPDATE product_colour SET colour_quantity = ? WHERE product_name = ? AND colour_name = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $new_stock_quantity_colour, $item_of_customer_order, $product_colour_name);
                $stmt->execute();

                echo "Previous Colour Quantity in Stock of " . $item_of_customer_order . " : " . $current_stock_of_colour_quantity . "<br>";
                echo "New Colour Quantity in Stock of " . $item_of_customer_order . " : " . $new_stock_quantity_colour . "<br>";
            } else {
                echo "Colour stock entry not found for item: $item_of_customer_order and colour: $product_colour_name.<br>";
            }

            echo "Order deleted and stock updated successfully.";
        } else {
            echo "Order not found for order_id: $order_id.<br>";
        }
    } 









    else {
        $order_id = $_POST['order_id'];
    
        // Fetch the quantity and item_of_customer_order from the orders table
        $sql = "SELECT Quantity, item_of_customer_order, product_colour_name FROM orders WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $order_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        // Check if the result exists before accessing it
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $quantity_to_add_back = $row['Quantity'];
            $item_of_customer_order = $row['item_of_customer_order'];
            $product_colour_name = $row['product_colour_name'];
    
            // Delete the order from the orders table
            $sql = "DELETE FROM orders WHERE order_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $order_id);
            $stmt->execute();
    
            // Add the quantity back to the stock
            $sql = "SELECT Meter FROM add_stock WHERE Product_Name_Male = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $item_of_customer_order);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if the stock entry exists before accessing it
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_stock = $row['Meter'];
                $new_stock_quantity = $current_stock + $quantity_to_add_back;
    
                $sql = "UPDATE add_stock SET Meter = ? WHERE Product_Name_Male = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ss", $new_stock_quantity, $item_of_customer_order);  // 'd' for float, 's' for string
                $stmt->execute();
            } else {
                echo "Stock entry not found for the item: $item_of_customer_order.<br>";
            }

            
    
            // Add the quantity back to the product_colour table
            $sql = "SELECT colour_in_meter FROM product_colour WHERE product_name = ? AND colour_name = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $item_of_customer_order, $product_colour_name);
            $stmt->execute();
            $result = $stmt->get_result();
            
            // Check if the product colour entry exists before accessing it
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $current_stock_of_colour_in_meter = $row['colour_in_meter'];
                $new_stock_quantity_colour_in_meter = $current_stock_of_colour_in_meter + $quantity_to_add_back;
    
                $sql = "UPDATE product_colour SET colour_in_meter = ? WHERE product_name = ? AND colour_name = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("sss", $new_stock_quantity_colour_in_meter, $item_of_customer_order, $product_colour_name);
                $stmt->execute();
            } else {
                echo "Product colour entry not found for the item: $item_of_customer_order and colour: $product_colour_name.<br>";
            }
    
            // Display success message with details
            echo "Previous Meter in Stock of $item_of_customer_order : $current_stock<br>";
            echo "New Meter in Stock of $item_of_customer_order : $new_stock_quantity<br>";
            echo "Order deleted and Meter in stock adjusted successfully.";
        } else {
            echo "Order not found for order_id: $order_id.<br>";
        }
    }
    
        // -----------------Meter update delete code end ----------------------------------
}






    
        // Fetch the most recent customer_id
        $sql = "SELECT customer_id FROM orders ORDER BY customer_id DESC LIMIT 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer_id = $row['customer_id'];

            // SQL query to select data from orders table for the given customer_id
            $sql = "SELECT order_id, Item_of_customer_order, Quantity, Price, discount, current_total, product_colour_name FROM orders WHERE customer_id = ? ORDER BY customer_id DESC";
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
                            <th>Colour Name</th>
                            <th class='right-align'>Total</th>
                            <th>Actions</th>
                        </tr>";
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>".$row["order_id"]."</td>
                            <form id='delete-form-".$row["order_id"]."' method='POST'>
                                <td><input type='text' name='item' value='".$row["Item_of_customer_order"]."'></td>
                                <td><input type='text' name='quantity' value='".$row["Quantity"]."'></td>
                                <td><input type='number' step='0.01' name='price' value='".$row["Price"]."'></td>
                                <td><input type='number' step='0.01' name='discount' value='".$row["discount"]."'></td>

                                <td><input type='text' step='0.01' name='product_colour_name' value='".$row["product_colour_name"]."'></td>

                                <td class='right-align'><input type='number' step='0.01' name='total' value='".$row["current_total"]."'></td>
                                <td>
                                    <input type='hidden' name='order_id' value='".$row["order_id"]."'>
                                    <input type='submit' name='update' value='Update'>
                                    <input type='submit' name='delete' value='Delete'>
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
        ?>
    </div>
    <!-- <button id="btn3"><a href="purchase.php">Generate Bill</a></button> -->
    <div id="backdiv">
        <button id="back"><a href="Add_Customer.html">Back</a></button>
    </div>
</section>














<!-- display data for bill  -->
<section>
<?php
date_default_timezone_set('Asia/Karachi'); // Set timezone to Pakistan
?>

    <div">
        <h2>WAQAS CLOTH HOUSE</h2>
        <h4>THE CLOTH SUPERSTORE</h4>
        <h3>236-13-B1, Abubakar Road Near Barkat Chowk Township Lahore</h3>
        <h5>Mobile no: 03004822786 , Ph: 04235216786</h5>
    </div>
    

       <!-- to display name on bill -->
       <table class="responsive-table">=0-
       <tbody>
    <?php
    // Assuming you have established a database connection $conn
    $sqll = "SELECT customer_id FROM orders ORDER BY customer_id DESC LIMIT 1";
    $resultss = mysqli_query($conn, $sqll);

    if (mysqli_num_rows($resultss) > 0) {
        while($row = mysqli_fetch_assoc($resultss)) {
            echo "<tr>";
            echo "<th style='display: table-cell; visibility: visible; margin-top: -7px;'>Invoice:</th>";
            echo "<td class='order-id' style='padding-left: 80px; font-style: italic; font-weight: bold; font-size: 17px; margin-top: -19px;'>10".$row['customer_id']."</td>";
            echo "</tr>";

        }
    } else {
        echo "<tr><td colspan='2' style=''>No customers found</td></tr>";
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
                echo "<th style='display: table-cell; visibility: visible; margin-top: -11px;'>Cashier:</th>";
                echo "<td class='first-name' style='padding-left: 100px; font-weight: bold; font-size: 15px; margin-top: -20px;'>".$row["first_name"]."</td>";
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
        <tbody>
    <?php
    // Assuming you have established a database connection $conn
    $sqll = "SELECT first_name FROM add_customer ORDER BY customer_id DESC LIMIT 1";
    $resultss = mysqli_query($conn, $sqll);

    if (mysqli_num_rows($resultss) > 0) {
        while($row = mysqli_fetch_assoc($resultss)) {
            echo "<tr>";
            echo "<th style='display: table-cell; visibility: visible; margin-top: -17px;'>Customer:</th>";
            echo "<td class='first-name' style='padding-left: 100px; font-weight: bold; font-size: 15px; margin-top: -25px;'>".$row["first_name"]."</td>";

            echo "<td style='font-size: 15px; font-weight: bolder; margin-top: -25px; margin-left:250px; text-align: right;'>" . date('n/j/y,') . "</td>";
            echo "<td style='font-size: 15px; font-weight: bolder; margin-top: -25px; margin-left:325px; text-align: right;'>" . date('g:i') . "</td>";
            echo "<td style='font-size: 15px; font-weight: bold; margin-top: -25px; margin-left:335px; text-align: right;'>" . date('') . "</td>";
            echo "<td style='font-size: 15px; font-weight: bold; margin-top: -25px; margin-left:355px; text-align: right;'>" . date(' A') . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='2'>No customers found</td></tr>";
    }
    ?>
</tbody>




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
    $sql = "SELECT Item_of_customer_order, Quantity, Price, discount, current_total FROM orders WHERE customer_id = ? ORDER BY customer_id DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $customer_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Debug statement to ensure this block runs
        
        // Initialize the order ID variable
        $order_id = 1;
        echo "<div style='margin-top: -15px;'></div>";
        echo json_encode('================================================================================================');
    
        // Output data of each row
        echo "<table>
                <tr style='margin-top: -7px;'>
        <th style='font-size: 22px; display: table-cell; visibility: visible;'>#</th>

        <th style='font-size: 22px; width: 10px; padding-left: 40px; text-align: center; display: table-cell; visibility: visible;'>Item</th>
        
        <th style='font-size: 22px; width: 50px; margin-left: 50px; text-align: center; display: table-cell; visibility: visible;'>Qty</th>
        <th style='font-size: 22px; width: 50px; margin-left: 10px; text-align: center; display: table-cell; visibility: visible;'>Price</th>
        <th style='font-size: 22px; width: 55px; margin-left: 10px; text-align: center; display: table-cell; visibility: visible;'>Dis</th>
        <th style='font-size: 22px; width: 80px; display: table-cell; visibility: visible;' class='right-align'>Total</th>
    </tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr style='width: 50%; font-weight: bolder; margin-top: -37px;'>
            <td style='width: 5%; font-size: 20px;'>" . $order_id . "</td>

            <td style=' font-size: 15px;'>" . $row["Item_of_customer_order"] . "</td>

            <td style=' text-align: center; font-size: 20px;'>" . $row["Quantity"] . "</td>

            <td style='text-align: center; font-size: 20px;'>" . $row["Price"] . "</td>

            <td style=' text-align: center; font-size: 20px;'>" . $row["discount"] . "</td>

            <td style='text-align: right; font-size: 20px;'>" . $row["current_total"] . "</td>
        </tr>";
            
            // Increment the order ID for the next row
            $order_id++;
        }
        
        echo "</table>";
    } else {
        echo "No results found for the given customer ID.";
    }
    

    $stmt->close();
} else {
    echo "No recent customer found.";
}

        echo "<div style='margin-top: -15px;'></div>";
        echo json_encode('================================================================================================');



         // total discount per customer and calculate total discount and store in database
        $sql = "SELECT SUM(discount) AS total_discount, MAX(customer_id) AS customer_id 
        FROM orders 
        WHERE customer_id = (SELECT MAX(customer_id) FROM orders)";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_discount = $row['total_discount'];
    $customerId = $row['customer_id'];

    // echo '<div><br></div>';
    // echo 'Total dis: ' . $total_discount;


    // $payable_bill = $totalBill - $total_discount;
    // echo '<div><br></div>';
    // echo 'Payable: ' . $payable_bill; 
    // echo '<div><br></div>';
    

    // Reset previous total_discount_per_customer values for the customer
    $resetQuery = "UPDATE orders 
                   SET total_dicount_per_customer = NULL 
                   WHERE customer_id = $customerId";

    if ($conn->query($resetQuery) === TRUE) {
        // Store the new total discount in the total_discount_per_customer column for the last order of the customer
        $updateQuery = "UPDATE orders 
                        SET total_dicount_per_customer = $total_discount 
                        WHERE order_id = (SELECT MAX(order_id) FROM orders WHERE customer_id = $customerId)";

        if ($conn->query($updateQuery) === TRUE) {
            // echo "Total discount updated successfully.";
        } else {
            echo "Error updating total discount: " . $conn->error;
        }
    } else {
        echo "Error resetting previous total discount: " . $conn->error;
    }
} else {
    echo "Unable to fetch total discount.";
}





        


        // calculate_total_bill of products
        // Fetch the total bill and order count for the last customer
        $sqlll = "SELECT SUM(current_total) AS total_bill, MAX(customer_id) AS customer_id FROM orders WHERE customer_id = (SELECT MAX(customer_id) FROM orders)";
        $resultss = $conn->query($sqlll);
        
        
        if ($resultss->num_rows > 0) {
            $row = $resultss->fetch_assoc();
            $totalBill = $row['total_bill'];
            $customerId = $row['customer_id'];

            echo '<div><br></div>';
        
            echo '<div style="font-size: 22px; margin-top:-22px; font-weight: bolder;">Total Bill: ' . $totalBill . '</div>';
            echo '<div><br></div>';
            echo '<div style="font-size: 22px; margin-top:-22px; font-weight: bolder;">Total dis: ' . $total_discount . '</div>';
            $payable_bill = $totalBill - $total_discount;
            echo '<div><br></div>';
            echo '<div style="font-size: 22px; margin-top:-22px; font-weight: bolder;">Payable: ' . $payable_bill . '</div>';
            echo '<div><br></div>';

            echo "<div style='margin-top: -20px;'></div>";
        echo json_encode('--------------------------------------------------------------------');

            echo '<div style="text-align:center; font-size: 15px; font-weight: bold; width:42%">Thank you for choosing Waqas Cloth House, where quality meets style. We are known for top-quality fabrics and stylish choices, offering a wide variety of premium cloth for all styles and events. We value your trust in our brand and look forward to serving you again!</div>';
            
            echo '<div><br><br><br><br></div>';

            // echo "Total Bill: " . $totalBill;
        
            // Reset previous total_bill values for the customer
            $resetQuery = "UPDATE orders 
                           SET total_bill = NULL 
                           WHERE customer_id = $customerId";
            
            if ($conn->query($resetQuery) === TRUE) {
                // Store the new total bill in the total_bill column for the last order of the customer
                $updateQuery = "UPDATE orders 
                                SET total_bill = $payable_bill 
                                WHERE order_id = (SELECT MAX(order_id) FROM orders WHERE customer_id = $customerId)";
                
                if ($conn->query($updateQuery) === TRUE) {
                    // echo "Total bill updated successfully.";
                } else {
                    echo "Error updating total bill: " . $conn->error;
                }
            } else {
                echo "Error resetting previous total bill: " . $conn->error;
            }
        } else {
            echo "Unable to fetch total bill.";
        }






       










         // calculate_profit_per_customer_ of products
        // Fetch the profit and order count for the last customer
        $sqlll = "SELECT SUM(gross_profit) AS profit_per_cust, MAX(customer_id) AS customer_id FROM orders WHERE customer_id = (SELECT MAX(customer_id) FROM orders)";
        $resultss = $conn->query($sqlll);
        
        
        if ($resultss->num_rows > 0) {
            $row = $resultss->fetch_assoc();
            $profit_per_cust = $row['profit_per_cust'];
            $customerId = $row['customer_id'];

        //     echo '<div><br></div>';
        // echo 'profit_per_customer : '. $profit_per_cust;
            // echo "Total Bill: " . $totalBill;
            echo '<div><br></div>';
            $profit_per_cust_after_dis = $profit_per_cust - $total_discount;
        
            // Reset previous total_bill values for the customer
            $resetQuery = "UPDATE orders 
                           SET profit_per_customer = NULL 
                           WHERE customer_id = $customerId";
            
            if ($conn->query($resetQuery) === TRUE) {
                // Store the new total bill in the total_bill column for the last order of the customer
                $updateQuery = "UPDATE orders 
                                SET profit_per_customer = $profit_per_cust_after_dis 
                                WHERE order_id = (SELECT MAX(order_id) FROM orders WHERE customer_id = $customerId)";
                
                if ($conn->query($updateQuery) === TRUE) {
                    // echo "Total bill updated successfully.";
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
        // $conn->close();
        ?>
        
        
    </div>
</section>


<section>

</section>

<!--<button id="print_button" onclick="printPDF()">Pdf Report</button> -->
    <button id="print_button" onclick="printPDF()">Print</button>
     
<!-- <button type="button" onclick="window.print();return false;">Pdf Report</button> -->
</div>
<br><br><br><br><br><br><br><br>
</div>
</body>
</html>
