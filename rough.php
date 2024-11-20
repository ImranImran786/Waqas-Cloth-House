<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto-Fetch Data from QR Code Scanner</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <!-- Hidden Scanner Input Field -->
    <input type="text" id="scannerInput" style="position: absolute; left: -9999px;">

    <!-- Automatically populated form fields with the scanned data -->
    <div class="mt-5">
        <h3>Auto-Filled Form</h3>
        <form id="otherForm">
            <div class="mb-3">
                <label for="scannedProductName" class="form-label">Scanned Product Name</label>
                <input type="text" class="form-control" id="scannedProductName" name="scanned_product_name" readonly>
            </div>

            <div class="mb-3">
                <label for="scannedColourName" class="form-label">Scanned Colour Name</label>
                <input type="text" class="form-control" id="scannedColourName" name="scanned_colour_name" readonly>
            </div>

            <!-- New Fields Added -->
            <div class="mb-3">
                <label for="scannedTotalMeter" class="form-label">Total Meter</label>
                <input type="number" class="form-control" id="scannedTotalMeter" name="scanned_total_meter" readonly>
            </div>

            <div class="mb-3">
                <label for="scannedRetailPrice" class="form-label">Retail Price</label>
                <input type="number" class="form-control" id="scannedRetailPrice" name="scanned_retail_price" readonly>
            </div>
        </form>
    </div>
</div>


<script>
    
// JavaScript to handle input and autofill other fields through qr scanner fetch data from qrq and auto fill input field
    let inputTimeout; // Variable to hold the timeout

    // Function to handle the scanned data
    function handleScannedData(scannedData) {
        console.log("Scanned Data:", scannedData); // Log scanned data

        // Check if the scanned data contains the separator " - "
        const separatorIndex = scannedData.indexOf(' - ');

        if (separatorIndex !== -1) {
            // Split the scanned data by " - " to get the individual values
            const dataParts = scannedData.split(' - ');

            // Assign values to respective form fields
            const productName = dataParts[0].trim();
            const colourName = dataParts[1].trim();
            const totalMeter = dataParts[2].trim();
            const retailPrice = dataParts[3].trim();

            // Fill the form fields with the scanned data
            document.getElementById('scannedProductName').value = productName;
            document.getElementById('scannedColourName').value = colourName;
            document.getElementById('scannedTotalMeter').value = totalMeter;
            document.getElementById('scannedRetailPrice').value = retailPrice;

            // Clear the scanner input after filling the fields
            document.getElementById('scannerInput').value = '';
        } else {
            console.log('Scanned data does not contain the expected separator " - " or is incomplete.');
        }
    }

    // set time for delay scann data -------------------------------------------------------------
    // document.getElementById('scannerInput').addEventListener('input', function() {
    //     const scannedData = this.value.trim();

    //     // Clear previous timeout
    //     clearTimeout(inputTimeout);

    //     // Set a timeout to wait before processing the input
    //     inputTimeout = setTimeout(() => {
    //         handleScannedData(scannedData); // Process the scanned data
    //     }, 1Fancey kather K/D - Aero Blue - 0.00 - 12000); // Adjust the delay if necessary (e.g., 100ms)
    // });


    
    // Function to initiate focus on the hidden input
    function focusScannerInput() {
        const scannerInput = document.getElementById('scannerInput');
        scannerInput.focus();
    }

    // Call the focus function after the document is loaded
    document.addEventListener('DOMContentLoaded', focusScannerInput);
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
