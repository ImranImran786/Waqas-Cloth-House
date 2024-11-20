<?php
// Database connection details

require 'dbcon.php';



// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security (optional but recommended)
    $employee_name = mysqli_real_escape_string($conn, $_POST['Employee_Name'] ?? '');
    $last_name = mysqli_real_escape_string($conn, $_POST['Last_name'] ?? '');
    $salary = mysqli_real_escape_string($conn, $_POST['Salary'] ?? '');
    $advanced_salary = mysqli_real_escape_string($conn, $_POST['Advanced_Salary'] ?? '');
    $advanced_salary_date = mysqli_real_escape_string($conn, $_POST['Advanced_Salary_Date'] ?? '');
    $remaining_salary = mysqli_real_escape_string($conn, $_POST['Ramaining_Salary'] ?? '');
    $remaining_salary_date = mysqli_real_escape_string($conn, $_POST['Ramaining_Salary_Date'] ?? '');
    $description = mysqli_real_escape_string($conn, $_POST['Description'] ?? '');

    // Insert query
    $sql = "INSERT INTO Employee_Salary_History (Employee_Name, Last_name, Salary, Advanced_Salary, Advanced_Salary_Date, Ramaining_Salary, Ramaining_Salary_Date, Description)
            VALUES ('$employee_name', '$last_name', '$salary', '$advanced_salary', '$advanced_salary_date', '$remaining_salary', '$remaining_salary_date', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "New salary record added successfully "."<br><br><br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}





// $searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';

$sq = "SELECT First_Name, Last_Name FROM add_employee";


$result = $conn->query($sq);

if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {
        echo "<tr onclick='selectPrice(this); selectProduct(this); '>";
        echo "<td>" . $row["First_Name"] . "</td>";
        echo "<td>" . $row["Last_Name"] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td>No products found</td></tr>";
}



// Close connection
$conn->close();
?>
