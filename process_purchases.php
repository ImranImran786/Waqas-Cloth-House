<?php
// Database connection settings
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



if ($_SERVER["REQUEST_METHOD"] == "POST") 

$party_name = isset($_POST['Party_Name']) ? $_POST['Party_Name'] : '';
$other_party_name = isset($_POST['Other_Party_Name']) ? $_POST['Other_Party_Name'] : '';

$product_name_male = $_POST['Product_Name_Male'] ?? '';
$product_name_female = $_POST['Product_Name_Female'] ?? '';
$other_product = $_POST['Other_Product'] ?? '';

// Initialize a variable to hold the selected product
$selected_product = '';

// Count the number of non-empty inputs
$filled_inputs = 0;
if (!empty($party_name)) {
    $filled_inputs++;
    $selected_product = $party_name;
}
if (!empty($other_party_name)) {
    $filled_inputs++;
    $other_party_name = $other_party_name;
}

if ($filled_inputs === 1) {

    $selected_product = mysqli_real_escape_string($conn, $selected_product);

    // SQL query to insert data into your table
    $sql = "INSERT INTO add_purchases (Party_Name) VALUES ('$selected_product')";

// Retrieve form data

$purchase_date = isset($_POST['Purchase_Date']) ? $_POST['Purchase_Date'] : '';
$receiving_date = isset($_POST['Receiving_Date']) ? $_POST['Receiving_Date'] : '';
$contact = isset($_POST['Contact']) ? $_POST['Contact'] : '';
$total_bill = isset($_POST['Total_Bill']) ? $_POST['Total_Bill'] : '';
$paid_bill = isset($_POST['Paid_Bill']) ? $_POST['Paid_Bill'] : '';
$pending_dues = isset($_POST['Pending_Dues']) ? $_POST['Pending_Dues'] : '';
$previous_total_bill = isset($_POST['Previous_Total_Bill']) ? $_POST['Previous_Total_Bill'] : '';
$total_remaining_bill = isset($_POST['Total_Remaining_Bill']) ? $_POST['Total_Remaining_Bill'] : '';
$payment = isset($_POST['Payment']) ? $_POST['Payment'] : '';
$bill_no = isset($_POST['Bill_no']) ? $_POST['Bill_no'] : '';
$address = isset($_POST['Address']) ? $_POST['Address'] : '';
$city = isset($_POST['City']) ? $_POST['City'] : '';
$image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
$image_temp = isset($_FILES['image']['tmp_name']) ? $_FILES['image']['tmp_name'] : '';

// Combine Party_Name and Other_Party_Name into one column
$final_party_name = !empty($other_party_name) ? $other_party_name : $party_name;

// Upload image to the server
$target_dir = "uploads/";
$target_file = $target_dir . basename($image);
if (!empty($image_temp)) {
    move_uploaded_file($image_temp, $target_file);
}

// SQL query to insert data into the purchases table
$sql = "INSERT INTO add_purchases (Party_Name, Purchase_Date, Receiving_Date, Contact, Total_Bill, Paid_Bill, Pending_Dues, Previous_Total_Bill, Total_Remaining_Bill, Payment, Bill_no, Address, City, Image) 
        VALUES ('$final_party_name', '$purchase_date', '$receiving_date', '$contact', '$total_bill', '$paid_bill', '$pending_dues', '$previous_total_bill', '$total_remaining_bill', '$payment', '$bill_no', '$address', '$city', '$target_file')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize variables
    $Party_Name = $Bill_no = $Payment_Date = $Receiving_Person = $Payment = $Bank_Name = $Check_no = $Check_Date = $Raining_Payment = $pay_party_payment = "";

    // Check and assign values from $_POST
    if (isset($_POST['In_Party_Name'])) {
        $Party_Name = $conn->real_escape_string($_POST['In_Party_Name']);
    }
    if (isset($_POST['Bill_no'])) {
        $Bill_no = $conn->real_escape_string($_POST['Bill_no']);
    }
    if (isset($_POST['Payment_Date'])) {
        $Payment_Date = $conn->real_escape_string($_POST['Payment_Date']);
    }
    if (isset($_POST['Receiving_Person'])) {
        $Receiving_Person = $conn->real_escape_string($_POST['Receiving_Person']);
    }
    if (isset($_POST['Payment'])) {
        $Payment = $conn->real_escape_string($_POST['Payment']);
    }
    if (isset($_POST['Bank_Name'])) {
        $Bank_Name = $conn->real_escape_string($_POST['Bank_Name']);
    }
    if (isset($_POST['Check_no'])) {
        $Check_no = $conn->real_escape_string($_POST['Check_no']);
    }
    if (isset($_POST['Check_Date'])) {
        $Check_Date = $conn->real_escape_string($_POST['Check_Date']);
    }
    if (isset($_POST['pay_party_payment'])) {
        $pay_party_payment = $conn->real_escape_string($_POST['pay_party_payment']);
    }
    if (isset($_POST['Raining_Payment'])) {
        $Raining_Payment = $conn->real_escape_string($_POST['Raining_Payment']);
    }

    // Insert data into the database
    $sqll = "INSERT INTO installment_payments_purchases (In_Party_Name, Bill_no, Payment_Date, Receiving_Person, Payment, Bank_Name, Check_no, Check_Date, pay_party_payment, Raining_Payment)
            VALUES ('$Party_Name', '$Bill_no', '$Payment_Date', '$Receiving_Person', '$Payment', '$Bank_Name', '$Check_no', '$Check_Date', '$pay_party_payment', '$Raining_Payment')";

    if ($conn->query($sqll) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sqll . "<br>" . $conn->error;
}

// Function to upload image
function uploadImage($file) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($file["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        return false;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    }
}}
}
else {
    echo "Please select or enter only one product.";
}

// Close connection
$conn->close();
?>
