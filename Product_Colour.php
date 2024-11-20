<?php
// Include the QR code library
include 'phpqrcode/qrlib.php';
// Database connection
$servername = "localhost"; // Update with your server name
$username = "username"; // Update with your database username
$password = "password"; // Update with your database password
$dbname = "waqas_cloth_house"; // Update with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize the filename
function sanitizeFileName($filename) {
    // Replace any invalid characters with a hyphen
    return preg_replace('/[\/:*?"<>|]/', '-', $filename);
}

$qrImage = '';
$downloadButton = '';
$printButton = '';
$productPrice = ''; // To store the price fetched from the database
$customPrice = ''; // To store the custom price entered by the user
$scannedData = ''; // To hold the scanned data
$finalPrice = ''; // To hold the final price
$stockID = ''; // To hold the stock_id
$colourid = ''; // To hold the final colour id
$Meter = ''; // To hold the Meter


// Retail_Price Total_Meter

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name']) && isset($_POST['colour_name']) && isset($_POST['Retail_Price'])) {

    $product = $_POST['product_name'];
    $colour = $_POST['colour_name'];
    // $total_meter = $_POST['Total_Meter'];
    $retail_price = $_POST['Retail_Price'];


    $productWithDetails = $product . ' - ' . $colour . ' - ' . $retail_price;  // Combine product and color







    // Fetch the Retail Price and stock_id from the database
    $stmt = $conn->prepare("SELECT Retail_Price, stock_id FROM add_stock WHERE Product_Name_Male = ? LIMIT 1");
    $stmt->bind_param("s", $product); // Bind only the product variable
    $stmt->execute();
    $stmt->bind_result( $productPrice, $stockID);
    $stmt->fetch();
    $stmt->close();

    // Use custom price if provided; otherwise, use the fetched price
    $finalPrice = !empty($customPrice) ? $customPrice : $productPrice;


//     $stmt = $conn->prepare("SELECT colour_id FROM product_colour WHERE product_name = ? && colour_name = ? LIMIT 1");
//     $stmt->bind_param("ss", $product , $colour); // Bind only the product variable
//     $stmt->execute();
//     $stmt->bind_result($colourid);
//     $stmt->fetch();
//     $stmt->close();
    

//     if ($colourid) {
//     echo json_encode(['colour_id' => $colourid]);
// } else {
//     echo json_encode(['colour_id' => null]);
// }

   



    if ($finalPrice !== null) {
        // $productWithDetails = $product . ' - ' . $colour . ' -' . $finalPrice . ' - ' . $stockID;
    // Sanitize the combined product name and color to create a valid filename
    $sanitizedFileName = sanitizeFileName($productWithDetails);
    // Define the folder where to store the QR code image
    $qrDir = 'D:/xampp/htdocs/Online-Textile-Management-System-master/qrcodes/';
    // Ensure the directory exists
    if (!file_exists($qrDir)) {
        mkdir($qrDir, 0777, true);
    }
    // File path for the QR code with sanitized filename
    $qrFile = $qrDir . $sanitizedFileName . '.png';
    // Generate the QR code with the sanitized filename
    QRcode::png($productWithDetails, $qrFile, QR_ECLEVEL_L, 10);
    // Display the generated QR code image
    $qrImage = '<img src="/Online-Textile-Management-System-master/qrcodes/' . $sanitizedFileName . '.png" alt="QR Code" />';
    
    // Download button
    $downloadButton = '<a href="/Online-Textile-Management-System-master/qrcodes/' . $sanitizedFileName . '.png" download="' . $sanitizedFileName . '.png" class="btn btn-success" style="margin-top: 20px;">Download QR Code</a>';

    // Print button
    $printButton = '<button class="btn btn-primary" style="margin-top: 20px;" onclick="printQRCode()">Print QR Code</button>';

    // Set scanned data to display
     $scannedData = $productWithDetails; 
    } else {
        $qrImage = '<p class="text-danger">Price not found for the specified product.</p>';
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Colour Management with HEX Color Picker</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@jaames/iro@5"></script>
    <style>
        #colorWheel {
            margin: 20px auto;
        }

        .color-display {
            display: flex;
            align-items: center;
            margin-top: 20px;
            border: 2px solid #000;
            padding: 10px;
            width: 300px;
        }

        .color-box {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        .color-name {
            margin-top: 20px;
            font-size: 18px;
            font-weight: bold;
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 50px;
        }

        .product-list {
            max-height: 400px;
            overflow-y: auto;
            border-right: 1px solid #dee2e6;
        }

        .product-item {
            padding: 10px;
            cursor: pointer;
        }

        .product-item:hover {
            background-color: #f1f1f1;
        }

        .form-section {
            padding-left: 20px;
        }

        .color-option {
            display: flex;
            align-items: center;
        }

        .color-option img {
            width: 20px;
            height: 20px;
            margin-right: 5px;
        }




        #part3{
        margin-top: 44px;
        width: 100%;
        float: left;
        height: 70px;
        /* border: 5px solid black; */
    }

    #part3 #back {
      width: 13%;
      height: 50px;
      color: black;
      background-color: white;
      /* margin-top: 8px; */
      margin-left: 3%;
      border: 3px solid black;
      border-radius: 10px;
      box-shadow: 5px 5px 5px black;
      font-size: 25px;
    }
    #part3 #back:hover {
      color: black;
      background-color: white;
      border: 3px solid blue;
      border-radius: 10px;
      box-shadow: 5px 5px 5px blue;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            <!-- Left Side: List of Products -->


            <div class="row">
    <!-- Product List Table -->
    <div class="col-md-6 product-list">
        <h4>Product List</h4>
        <table class="table table-bordered table-hover table-sm" style="width: 100%;">
            <thead class="table-dark">
                <tr>
                    <th>Product Name</th>
                    <th>Meter</th>
                    <th>Retail Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection parameters
                $servername = "localhost";
                $username = "username"; // Adjust accordingly
                $password = "password"; // Adjust accordingly
                $dbname = "waqas_cloth_house"; // Adjust accordingly

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch products and their Meter and Retail Price from Add_Stock table
                $sql = "SELECT Product_Name_Male, Meter, Retail_Price FROM add_stock ORDER BY Product_Name_Male ASC";
                $result = $conn->query($sql);

                // Check if there are results and output them in table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Add an onclick event to select a product and send data to input fields
                        echo "<tr class='product-item' onclick=\"selectProduct('" . htmlspecialchars($row['Product_Name_Male']) . "', '" . htmlspecialchars($row['Meter']) . "', '" . htmlspecialchars($row['Retail_Price']) . "')\">";
                        echo "<td>" . htmlspecialchars($row["Product_Name_Male"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Meter"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["Retail_Price"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No products found</td></tr>";
                }

                // Close the database connection
                // $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</div>






            <!-- Right Side: Product Colour Form and Display -->
            <div class="col-md-8 form-section">
                <h4>Add Colour for Product</h4>
                <form id="productColourForm" method="POST" action="">
                    <div class="mb-3">
                        <label for="productName" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productName" name="product_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="colourName" class="form-label">Select Colour</label>
                        <input type="text" class="form-control" id="colourName" name="colour_name" required placeholder="Color name will auto-fill">
                    </div>

                    <div class="mb-3">
                        <label for="colourQuantity" class="form-label">Colour In Quantity</label>
                        <input type="number" class="form-control" id="colourQuantity" name="colour_quantity" placeholder="Enter quantity in Suit">
                    </div>

                    <div class="mb-3">
                        <label for="colourMeter" class="form-label">Colour In Meter</label>
                        <input type="number" class="form-control" id="colourMeter" name="colour_meter" placeholder="Enter quantity in Meter" step="0.01">
                    </div>

                    <div class="mb-3">
                        <!-- <label for="Total_Meter" class="form-label">Total Meter </label> -->
                        <input type="hidden" class="form-control" id="Total_Meter" name="Total_Meter" readonly>
                    </div>

                    <div class="mb-3">
                        <!-- <label for="Retail_Price" class="form-label">RetailPrice </label> -->
                        <input type="hidden" class="form-control" id="Retail_Price" name="Retail_Price" readonly>
                    </div>

                    <!-- <div class="mb-3">
                        <label for="Retail_Price" class="form-label">RetailPrice </label>
                        <input class="form-control" id="Retail_Price" name="Retail_Price">
                    </div> -->

                    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                </form>





                






                <?php
                // Insert data into the database when the form is submitted

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $product_name = isset($_POST['product_name']) ? $conn->real_escape_string($_POST['product_name']) : '';
                    $colour_name = isset($_POST['colour_name']) ? $conn->real_escape_string($_POST['colour_name']) : '';
                    $colour_quantity = isset($_POST['colour_quantity']) ? $conn->real_escape_string($_POST['colour_quantity']) : '';
                    $colour_meter = isset($_POST['colour_meter']) ? $conn->real_escape_string($_POST['colour_meter']) : '';
                
                    if (!empty($product_name) && !empty($colour_name)) {
                        // Insert query
                        $insert_sql = "INSERT INTO product_colour (product_name, colour_name, colour_quantity, colour_in_meter) 
                                       VALUES ('$product_name', '$colour_name', '$colour_quantity', '$colour_meter')";
                
                        if ($conn->query($insert_sql) === TRUE) {
                            // echo '<div class="alert alert-success mt-3">Colour added successfully!</div>';
                                echo '<script>alert("Colour added successfully!");</script>';




                                if ($conn->affected_rows > 0) {
                                    // Now that the data is inserted, fetch the colour_id
                                    $stmt = $conn->prepare("SELECT colour_in_meter , colour_id FROM product_colour WHERE product_name = ? AND colour_name = ? LIMIT 1");
                                    $stmt->bind_param("ss", $product, $colour); // Bind the product and colour variables
                                    $stmt->execute();
                                    $stmt->bind_result($Meter , $colourid);
                                    $stmt->fetch();
                                    $stmt->close();
                                
                                    // Check if colour_id is found and return JSON response
                                    if ($colourid) {
                                        echo json_encode(['colour_id' => $colourid]);
                                    } else {
                                        echo json_encode(['colour_id' => null]);
                                    }
                                } else {
                                    // Handle case where data was not inserted properly
                                    echo json_encode(['error' => 'Data insertion failed']);
                                }



                                
                        } else {
                            echo '<div class="alert alert-danger mt-3">Error: ' . $conn->error . '</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3">Please fill in all required fields!</div>';
                    }
                }


                
                // Close the database connection
                $conn->close();
                ?>

                <h4 class="mt-4">Pick a Custom Color</h4>
                <div id="colorWheel"></div>
                <div class="color-display">
                    <div id="colorBox" class="color-box" style="background-color: #000000;"></div>
                    <p id="colorNameDisplay">#000000</p>
                </div>
                <div class="color-name" id="colorDisplayName"></div> <!-- Area to display the color name -->
            </div>

        </div>
    </div>








    <div id="part3">
              <button id="back"><a href="admin_dashboard.html">Back</a></button>
    </div>
                


    <div class="container mt-5">
        <div id="qrCodeContainer" style="margin-top: 20px;">
            <?php if ($qrImage) echo $qrImage; ?>
            <?php if ($downloadButton) echo $downloadButton; ?>
            <?php if ($printButton) echo $printButton; ?>
        </div>

    </div>







    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript for handling product selection, color picking, and color name fetching -->
    <script>
        function selectProduct(productName) {
            document.getElementById('productName').value = productName;
        }

        // Create a new color picker
        var colorPicker = new iro.ColorPicker("#colorWheel", {
            width: 200,
            color: "#000000" // Set default color to black
        });

        // Event listener for color change
        colorPicker.on("color:change", function (color) {
            const colorBox = document.getElementById('colorBox');
            colorBox.style.backgroundColor = color.hexString;

            const hexCode = color.hexString;
            document.getElementById('colorNameDisplay').innerText = hexCode; // Show only HEX code
            document.body.style.backgroundColor = hexCode; // Change background color

            // Get the color name from the API and fill it in the color input field
            getColorName(hexCode);
        });

        // Function to get the color name from an API
        async function getColorName(hexCode) {
            try {
                const response = await fetch(`https://www.thecolorapi.com/id?hex=${hexCode.slice(1)}`);
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                const data = await response.json();
                const colorName = data.name.value || "Color name not found"; // Fallback if name is not available
                document.getElementById('colourName').value = colorName; // Set color name in the form input
                document.getElementById('colorDisplayName').innerText = colorName; // Display color name
            } catch (error) {
                console.error("Error fetching color name:", error);
                document.getElementById('colorDisplayName').innerText = "Error fetching color name";
            }
        }

        function selectProduct(productName, meter, retailPrice) {
        document.getElementById('productName').value = productName;
        document.getElementById('Total_Meter').value = meter;
        document.getElementById('Retail_Price').value = retailPrice;
    }



    // condition on input fields for Meter of colou and Quantity of colour only one choice -----------------
    document.getElementById("submitButton").addEventListener("click", function (event) {
        // Get the values of the input fields
        const colourQuantity = document.getElementById("colourQuantity").value;
        const colourMeter = document.getElementById("colourMeter").value;

        // Check if both fields are filled
        if (colourQuantity && colourMeter) {
            alert("Please fill only one field, either Quantity or Meter.");
            event.preventDefault(); // Prevent form submission
        }
        // Check if neither field is filled
        else if (!colourQuantity && !colourMeter) {
            alert("Please fill at least one field. Either Quantity or Meter is required.");
            event.preventDefault(); // Prevent form submission
        }
        // If only Quantity is filled, show confirmation
        else if (colourQuantity) {
            if (confirm("Are you sure you want to enter data in Quantity?")) {
                // Proceed with form submission (or additional logic)
            } else {
                event.preventDefault(); // Prevent form submission
            }
        }
        // If only Meter is filled, show confirmation
        else if (colourMeter) {
            if (confirm("Are you sure you want to enter data in Meter?")) {
                // Proceed with form submission (or additional logic)
            } else {
                event.preventDefault(); // Prevent form submission
            }
        }
    });
    





    function printQRCode() {
    // Get the QR code image element
    var qrCodeImage = document.querySelector('img[alt="QR Code"]');
    
    // Get the final price from the server-side PHP variable
    var finalPrice = '<?php echo htmlspecialchars($finalPrice); ?>'; // Ensure proper escaping
    var stockID = '<?php echo htmlspecialchars($stockID); ?>'; // Get the stock ID
    var colourid = '<?php echo htmlspecialchars($colourid); ?>'; // Get the stock ID
    var meter = '<?php echo htmlspecialchars($Meter); ?>'; // Get the stock ID

    // Check if the QR code image exists
    if (qrCodeImage) {
        // Create a new window for printing
        var printWindow = window.open('', '_blank');

        // let priceStr = finalPrice.toString();
        // // Check how many zeros are at the end and remove them accordingly
        // if (priceStr.endsWith("00")) {
        //     modifiedPrice = priceStr.slice(0, -2) + "AA"; // Remove the last two zeros
        // } else if (priceStr.endsWith("0")) {
        //     modifiedPrice = priceStr.slice(0, -1) + "A"; // Remove the last zero
        // }

        
        // Create HTML content for the print window
        printWindow.document.write('<html><head><title>Print QR Code</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">'); // Optional: Add Bootstrap CSS for styling
        printWindow.document.write('</head><body>');
        // printWindow.document.write('<h2>QR Code</h2>');
        
        // Add the QR code image to the print window
        printWindow.document.write('<img src="' + qrCodeImage.src + '" alt="QR Code" style="max-width: 100%; height: auto;">');
        
        // Add the final price with larger font and centered
        printWindow.document.write('<h1 style="font-size: 38px; margin-left:3.1%; margin-top:-45px; font-weight: bolder;">' + 'P' + stockID + 'P' + finalPrice + 'C' + colourid  + '</h1>'); // Adjust price display style

        if(meter > 0){
            printWindow.document.write('<h1 style="font-size: 45px; margin-left:15%; margin-top:-21px; font-weight: bold;">' + 'M' + '</h1>'); // Adjust price display style
        }

        // Close the HTML document in the print window
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        // Wait for the content to be fully loaded before printing
        printWindow.onload = function() {
            // Print the content
            printWindow.print();

            // Close the print window after printing
            printWindow.close();
        };
    } else {
        alert("QR Code is not available for printing.");
    }
}


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
