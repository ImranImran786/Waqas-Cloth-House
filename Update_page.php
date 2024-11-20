<?php
session_start();

// Database connection details
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "waqas_cloth_house";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch pages for the navbar
$sql = "SELECT page_name, display_page FROM admin_access_pages WHERE Status = 'update'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Update Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Basic Navbar Styling */
        .navbar {
            background-color: aqua !important; /* Dark background color for the navbar */
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            margin-bottom: -8px;
            margin-left: 6px;
            margin-right: 7px;
        }

        .navbar-brand {
            color: blue !important; /* White text color for the brand */
            font-weight: bold; /* Bold text for the brand */
            padding-left: 5px;
        }

        .navbar-nav .nav-link {
            color: #ffffff; /* White text color for nav links */
            margin-left: 5px; /* Spacing between nav links */
            font-weight: 10px;
        }

        .navbar-nav .nav-link:hover {
            color: black; /* Lighter color for hover effect */
            /* text-decoration: underline; Underline on hover */
        }

        /* Responsive Navbar */
        @media (max-width: 767.98px) {
            .navbar-nav {
                margin-top: 10px; /* Margin top for nav links on small screens */
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Admin Update Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a href="admin_dashboard.html">Back</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <?php
                // Check if there are results from the query
                if ($result->num_rows > 0) {
                    // Output each page as a navbar item
                    while ($row = $result->fetch_assoc()) {
                        $page_name = $row["page_name"];
                        $display_page = $row["display_page"];
                        echo "<li class='nav-item'>
                                <a class='nav-link' href='?page={$page_name}'>{$display_page}</a>
                              </li>";
                    }
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='#'>No Pages Found</a></li>";
                }
                ?>
            </ul>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container_fluid">
        <?php
        // Default page or page requested via query parameter
        $requested_page = isset($_GET['page']) ? $_GET['page'] : 'default.php';

        // Validate and include the requested page if it exists
        if (file_exists($requested_page) && $requested_page !== 'admin_dashboard.php') {
            include $requested_page;
        } else {
            // echo "<h2>Page Not Found</h2><p>The requested page does not exist.</p>";
        }
        ?>
    </div>

    <!-- Optional JavaScript for Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Close the database connection
// $conn->close();
?>
