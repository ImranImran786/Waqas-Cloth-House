<?php
// Database connection details
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

// To track if data is inserted
$data_inserted = false;

// Insert data into manager_access_pages if form is submitted
if (isset($_POST['submit'])) {
    $page_name = $_POST['page_name'];
    $display_page = $_POST['display_page'];
    $status = $_POST['status'];

    // Insert query for manager_access_pages
    $sql = "INSERT INTO manager_access_pages (page_name, display_page, Status) VALUES ('$page_name', '$display_page', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        // Set flag to true if data is inserted
        $data_inserted = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetch data from admin_access_pages
$sql = "SELECT * FROM admin_access_pages";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Pages to Manager</title>
    <style>
        /* Your existing styles */
        body {
            display: flex;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        .left {
            width: 30%;
            padding: 20px;
            border-right: 1px solid #ccc;
            background-color: #fff;
            height: 100vh;
            overflow-y: auto;
        }
        .right {
            width: 70%;
            padding: 20px;
            overflow-y: auto;
        }
        .page-item {
            cursor: pointer;
            margin-bottom: 10px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
        }
        .page-item:hover {
            background-color: #e0e0e0;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            max-height: 75vh;
            overflow-y: auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        form div {
            display: flex;
            flex-direction: column;
        }
        label {
            font-weight: bold;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: inset 1px 1px 5px rgba(0,0,0,0.1);
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-button {
            display: block;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .table-header {
            background-color: #f0f0f0;
            padding: 10px;
            font-weight: bold;
            text-align: center;
            border-bottom: 2px solid #ccc;
        }
    </style>
    <script>
        function fillForm(page_name, display_page, status) {
            document.getElementById('page_name').value = page_name;
            document.getElementById('display_page').value = display_page;
            document.getElementById('status').value = status;
        }
    </script>
</head>
<body>
    <!-- Left side to display admin_access_pages -->
    <div class="left">
        <h2>Admin Access Pages</h2>
        <div class="table-header">Page List</div>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="page-item" onclick="fillForm(\'' . $row['page_name'] . '\', \'' . $row['display_page'] . '\', \'' . $row['Status'] . '\')">';
                echo '<strong>Page Name:</strong> ' . $row['page_name'] . '<br>';
                echo '<strong>Display Page:</strong> ' . $row['display_page'] . '<br>';
                echo '<strong>Status:</strong> ' . $row['Status'];
                echo '</div>';
            }
        } else {
            echo "No pages found.";
        }
        ?>
    </div>

    <!-- Right side for manager_access_pages form -->
    <div class="right">
        <a href="admin_dashboard.html" class="back-button">← Back</a>
        <h2>Assign Pages to Manager</h2>
        <form action="assign_pages_manager_form.php" method="post">
            <div>
                <label for="page_name">Page Name:</label>
                <input type="text" id="page_name" name="page_name" required>
            </div>
            <div>
                <label for="display_page">Display Page:</label>
                <input type="text" id="display_page" name="display_page" required>
            </div>
            <div>
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" required>
            </div>
            <div>
                <button type="submit" name="submit">Assign Page</button>
            </div>
        </form>
    </div>

    <!-- JavaScript to show success alert -->
    <?php if ($data_inserted): ?>
        <script>
            alert('Data inserted successfully!');
        </script>
    <?php endif; ?>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
