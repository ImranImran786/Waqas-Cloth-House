<?php
// Include the QR code library
include 'phpqrcode/qrlib.php';
// Database connection
$servername = "localhost"; 
$username = "username"; 
$password = "password"; 
$dbname = "waqas_cloth_house";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Sanitize the filename function
function sanitizeFileName($filename) {
    return preg_replace('/[\/:*?"<>|]/', '-', $filename);
}

$qrImage = '';
$downloadButton = '';
$printButton = '';
$productPrice = '';
$customPrice = '';
$scannedData = '';
$finalPrice = '';
$stockID = '';
$Meter = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name']) && isset($_POST['colour_id']) && isset($_POST['Retail_Price'])) {
    // Retrieve form data
    $product_name = $_POST['product_name'];
    $colourid = $_POST['colour_id'];
    $retail_price = $_POST['Retail_Price'];

    // Fetch colour name and meter details from `product_colour` table
    $stmt = $conn->prepare("SELECT colour_in_meter, colour_name FROM product_colour WHERE product_name = ? AND colour_id = ? LIMIT 1");
    $stmt->bind_param("ss", $product_name, $colourid);
    $stmt->execute();
    $stmt->bind_result($Meter, $colour_name);
    $stmt->fetch();
    $stmt->close();
    if ($colour_name) {
        
        // Combine product name, colour name, and price for QR code content
        $productWithDetails = $product_name . ' - ' . $colour_name . ' - ' . $retail_price;
        // Fetch the Retail Price and stock_id from `add_stock`
        $stmt = $conn->prepare("SELECT Retail_Price, stock_id FROM add_stock WHERE Product_Name_Male = ? LIMIT 1");
        $stmt->bind_param("s", $product_name);
        $stmt->execute();
        $stmt->bind_result($productPrice, $stockID);
        $stmt->fetch();
        $stmt->close();

        $finalPrice = !empty($customPrice) ? $customPrice : $productPrice;
        if ($finalPrice !== null) {
            // Generate the QR code
            $sanitizedFileName = sanitizeFileName($productWithDetails);
            $qrDir = 'D:/xampp/htdocs/Online-Textile-Management-System-master/qrcodes/';
            if (!file_exists($qrDir)) {
                mkdir($qrDir, 0777, true);
            }
            $qrFile = $qrDir . $sanitizedFileName . '.png';
            QRcode::png($productWithDetails, $qrFile, QR_ECLEVEL_L, 10);
            
            $qrImage = '<img src="/Online-Textile-Management-System-master/qrcodes/' . $sanitizedFileName . '.png" alt="QR Code" />';
            $downloadButton = '<a href="/Online-Textile-Management-System-master/qrcodes/' . $sanitizedFileName . '.png" download="' . $sanitizedFileName . '.png" class="btn btn-success" style="margin-top: 20px;">Download QR Code</a>';
            $printButton = '<button class="btn btn-primary" style="margin-top: 20px;" onclick="printQRCode()">Print QR Code</button>';
            $scannedData = $productWithDetails;
        } else {
            $qrImage = '<p class="text-danger">Price not found for the specified product.</p>';
        }
    } else {
        echo json_encode(['error' => 'Colour name not found']);
    }
}
$conn->close();
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
                    <th>Product id</th>
                    <th>Product Name</th>
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
                $sql = "SELECT stock_id , Product_Name_Male, Retail_Price FROM add_stock";
                $result = $conn->query($sql);
                // Check if there are results and output them in table rows
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
    // Add an onclick event to select a product and send data to input fields
    echo "<tr class='product-item' onclick=\"selectProduct('" . htmlspecialchars($row['stock_id']) . "', '" . htmlspecialchars($row['Product_Name_Male']) . "', '" . htmlspecialchars($row['Retail_Price']) . "')\">";
    echo "<td>" . htmlspecialchars($row["stock_id"]) . "</td>";
    echo "<td>" . htmlspecialchars($row["Product_Name_Male"]) . "</td>";
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
        <label for="productstockid" class="form-label">Product Stock ID</label>
        <input type="text" class="form-control" id="productstockid" name="product_stock_id" required>
    </div>
    <div class="mb-3">
        <label for="productName" class="form-label">Product Name</label>
        <input type="text" class="form-control" id="productName" name="product_name" required>
    </div>
    <div class="mb-3">
        <label for="colourid" class="form-label">Colour ID</label>
        <input type="text" class="form-control" id="colourid" name="colour_id" required placeholder="Color name will auto-fill">
    </div>
    <div class="mb-3">
        <label for="Retail_Price" class="form-label">Retail Price</label>
        <input type="number" class="form-control" id="Retail_Price" name="Retail_Price">
    </div>
    <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
</form>
        </div>
    </div>
    <div id="part3">
              <button id="back"><a href="index.php">Back</a></button>
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
        function selectProduct(productstockid, productName, retailPrice) {
        document.getElementById('productstockid').value = productstockid;
        document.getElementById('productName').value = productName;
        document.getElementById('Retail_Price').value = retailPrice;
    }

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

        // let modifiedPrice = finalPrice.slice(0, -2);
// Convert the number to a string for easier manipulation
        // Create a new window for printing
        var printWindow = window.open('', '_blank');
        // Create HTML content for the print window
        printWindow.document.write('<html><head><title>Print QR Code</title>');
        printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">'); // Optional: Add Bootstrap CSS for styling
        printWindow.document.write('</head><body>');
        // printWindow.document.write('<h2>QR Code</h2>');
        // Add the QR code image to the print window
        printWindow.document.write('<img src="' + qrCodeImage.src + '" alt="QR Code" style="max-width: 100%; height: auto;">');
        // Add the final price with larger font and centered
        printWindow.document.write('<h1 style="font-size: 37px; margin-left:3.2%; margin-top:-45px; font-weight: bold;">' + 'P' + stockID + 'P' + finalPrice + 'C' + colourid  + '</h1>'); // Adjust price display style
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