<?php
// Database connection details
$servername = "localhost";
        $username = "username";
        $password = "password";
        $dbname = "waqas_cloth_house";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        // phpinfo();
        // echo 'Current PHP version: ' . phpversion();


// Function to handle file uploads
function handleFileUpload($file_input_name, $upload_dir) {
    if (!isset($_FILES[$file_input_name]) || $_FILES[$file_input_name]['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    // Create uploads directory if it doesn't exist
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $target_file = $upload_dir . basename($_FILES[$file_input_name]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        return null;
    }

    // Check file size (adjust as necessary)
    if ($_FILES[$file_input_name]["size"] > 500000) {
        return null;
    }

    // Allow certain file formats (you can modify this)
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        return null;
    }

    // If everything is ok, try to upload file
    if (move_uploaded_file($_FILES[$file_input_name]["tmp_name"], $target_file)) {
        return $target_file;
    } else {
        return null;
    }
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security (optional but recommended)
    $first_name = mysqli_real_escape_string($conn, $_POST['First_Name'] ?? '');
    $last_name = mysqli_real_escape_string($conn, $_POST['Last_Name'] ?? '');
    $address = mysqli_real_escape_string($conn, $_POST['Address'] ?? '');
    $phone_number = mysqli_real_escape_string($conn, $_POST['Phone_Number'] ?? '');
    $emergency_phone = mysqli_real_escape_string($conn, $_POST['Emergency_Phone_no'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['Email'] ?? '');
    $status = mysqli_real_escape_string($conn, $_POST['Status'] ?? '');
    $gender = mysqli_real_escape_string($conn, $_POST['Gender'] ?? '');
    $date_of_birth = mysqli_real_escape_string($conn, $_POST['Date_of_Birth'] ?? '');
    $cnic_no = mysqli_real_escape_string($conn, $_POST['CNIC_no'] ?? '');
    $date_of_joining = mysqli_real_escape_string($conn, $_POST['Date_of_joining'] ?? '');
    $terminating_date = mysqli_real_escape_string($conn, $_POST['Terminating_Date'] ?? '');

    // File upload handling
    $upload_dir = "uploads/";  // Directory where uploaded files will be stored
    $upload_picture = handleFileUpload('Upload_Picture', $upload_dir);
    $upload_cnic_front = handleFileUpload('Upload_CNIC_Picture_Front', $upload_dir);
    $upload_cnic_back = handleFileUpload('Upload_CNIC_Picture_Back', $upload_dir);

    // Insert query with file paths
    $sql = "INSERT INTO add_employee (First_Name, Last_Name, Address, Phone_Number, Emergency_Phone_no, Email, Status, Gender, Date_of_Birth, CNIC_no, Date_of_joining, Terminating_Date, Upload_Picture, Upload_CNIC_Picture_Front, Upload_CNIC_Picture_Back)
            VALUES ('$first_name', '$last_name', '$address', '$phone_number', '$emergency_phone', '$email', '$status', '$gender', '$date_of_birth', '$cnic_no', '$date_of_joining', '$terminating_date', '$upload_picture', '$upload_cnic_front', '$upload_cnic_back')";

    if ($conn->query($sql) === TRUE) {
        echo "New record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



// Query to select the latest uploaded images from add_employee table
$result = $conn->query("SELECT Upload_Picture, Upload_CNIC_Picture_Front, Upload_CNIC_Picture_Back FROM add_employee ORDER BY employee_id DESC LIMIT 1");

// Check if the query executed successfully
if ($result === FALSE) {
    echo "Error executing query: " . $conn->error;
} else if ($result->num_rows > 0) {
    echo "<h2>Uploaded Images</h2>";
    while ($row = $result->fetch_assoc()) {
        // Define the file paths for the uploaded images
        $uploads = 'uploads/' . basename($row['Upload_Picture']);
        $uploads2 = 'uploads/' . basename($row['Upload_CNIC_Picture_Front']);
        $uploads3 = 'uploads/' . basename($row['Upload_CNIC_Picture_Back']);
        
        // Check if the image files exist
        if (file_exists($uploads)) {
            echo "<div>";
            echo "<img src='" . htmlspecialchars($uploads) . "' alt='Employee Picture' style='max-width: 300px;'>";
            echo "<img src='" . htmlspecialchars($uploads2) . "' alt='Employee CNIC Front' style='max-width: 300px;'>";
            echo "<img src='" . htmlspecialchars($uploads3) . "' alt='Employee CNIC Back' style='max-width: 300px;'>";
            echo "</div>";
        } else {
            echo "<p>Image file not found: " . htmlspecialchars($uploads) . "</p>";
        }
    }
} else {
    echo "No images found.";
}
// Close connection
$conn->close();
?>