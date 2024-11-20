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

// Handle deletion if delete_id is set
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Prepared statement to delete the row based on ID
    $stmt = $conn->prepare("DELETE FROM staff_access_pages WHERE id = ?");
    $stmt->bind_param("i", $delete_id);

    if ($stmt->execute()) {
        // Re-sequence the IDs after deletion
        resequenceTable($conn);
        echo "<script>alert('Record deleted and IDs resequenced successfully!');</script>";
        // Redirect to refresh the page after deletion
        echo "<script>window.location.href = 'delete_pages_of_staff.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    $stmt->close();
}

// Function to resequence the IDs
function resequenceTable($conn) {
    // First, update the IDs sequentially
    $update_ids_sql = "SET @new_id = 0; 
                       UPDATE staff_access_pages SET id = (@new_id := @new_id + 1) ORDER BY id ASC";
    if ($conn->multi_query($update_ids_sql)) {
        // Wait for the first query to complete and clear any results
        while ($conn->next_result()) {;}

        // Reset the AUTO_INCREMENT value to the new maximum `id`
        $conn->query("ALTER TABLE staff_access_pages AUTO_INCREMENT = 1");
    } else {
        echo "Error resequencing IDs: " . $conn->error;
    }
}

// Fetch data from staff_access_pages
$sql = "SELECT * FROM staff_access_pages ORDER BY id ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Pages</title>
    <style>
        /* Basic styling for the page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        /* Styling for the table */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f8f8f8;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styling for the delete button */
        .delete-btn {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        /* Styling for the no records row */
        .no-records {
            text-align: center;
            font-style: italic;
            color: #999;
        }

        /* Back to Dashboard button */
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }

        .back-button:hover {
            background-color: #2980b9;
        }
    </style>
    <script>
        function confirmDeletion(delete_id) {
            if (confirm("Are you sure you want to delete this record?")) {
                window.location.href = 'delete_pages_of_staff.php?delete_id=' + delete_id;
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Staff Pages</h2>

        <!-- Displaying Data -->
        <table>
            <thead>
                <tr>
                    <th>Seq. No</th> <!-- Sequential Number -->
                    <th>Page Name</th>
                    <th>Display Page</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $seq_no = 1; // Initialize sequential numbering
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $seq_no . "</td>"; // Display sequential number
                        echo "<td>" . htmlspecialchars($row['page_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['display_page']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Status']) . "</td>";
                        echo "<td><button class='delete-btn' onclick='confirmDeletion(" . $row['id'] . ")'>Delete</button></td>";
                        echo "</tr>";
                        $seq_no++; // Increment sequential number for next row
                    }
                } else {
                    echo "<tr><td colspan='5' class='no-records'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Back to Dashboard Button -->
        <a href="admin_dashboard.html" class="back-button">← Back to Dashboard</a>
    </div>

<?php
// Close connection
$conn->close();
?>
</body>
</html>
