<?php
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

// Fetch search query (assuming this is for employee search, adjust as needed)
$searchQuery = isset($_GET['query']) ? $conn->real_escape_string($_GET['query']) : '';
if (!empty($searchQuery)) {
    $sql = "SELECT * FROM add_employee WHERE first_name LIKE '%$searchQuery%' OR phone_number LIKE '%$searchQuery%'";
} else {
    $sql = "SELECT * FROM add_employee";
}

$result = $conn->query($sql);

$output = "";

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $output .= "<tr>";
        $output .= "<td>" . $row["First_Name"] . "</td>";
        $output .= "<td>" . $row["Last_Name"] . "</td>";
        $output .= "<td>" . $row["Address"] . "</td>";
        $output .= "<td>" . $row["Phone_Number"] . "</td>";
        $output .= "<td>" . $row["Emergency_Phone_no"] . "</td>";
        $output .= "<td>" . $row["Email"] . "</td>";
        $output .= "<td>" . $row["Status"] . "</td>";
        $output .= "<td>" . $row["Gender"] . "</td>";
        $output .= "<td>" . $row["Date_of_Birth"] . "</td>";
        $output .= "<td>" . $row["CNIC_no"] . "</td>";
        $output .= "<td>" . $row["Date_of_joining"] . "</td>";
        $output .= "<td>" . $row["Terminating_Date"] . "</td>";

        // $output .= "<td>" . $row["Upload_Picture"] . "</td>";
        // c $row["Upload_CNIC_Picture_Front"] . "</td>";
        // $output .= "<td>" . $row["Upload_CNIC_Picture_Back"] . "</td>";

        $output .= "<td>" ."<img src='" . htmlspecialchars($row['Upload_Picture']) . "' alt='" . "' style='max-width: 200px;'>" . "</td>";
        $output .= "<td>" ."<img src='" . htmlspecialchars($row['Upload_CNIC_Picture_Front']) . "' alt='" . "' style='max-width: 200px;'>" . "</td>";
        $output .= "<td>" ."<img src='" . htmlspecialchars($row['Upload_CNIC_Picture_Back']) . "' alt='" . "' style='max-width: 200px;'>" . "</td>";

        $output .= "</tr>";

        // Assuming you want to fetch salary history for each employee
        $Employee_Name = $row['First_Name'];
        $Last_Name = $row['Last_Name'];

        // Fetch data from employee_salary_history table based on matching names
        $salarysql = "SELECT es.*
                      FROM employee_salary_history es 
                      WHERE es.Employee_Name LIKE '%$Employee_Name%' AND es.Last_Name LIKE '%$Last_Name%'";

        $salaryresult = $conn->query($salarysql);

        if ($salaryresult->num_rows > 0) {
            $output .= "<tr><td colspan='10'><table>";
            $output .= "<tr><th>First Name</th><th>Last Name</th><th>Salary</th><th>Advanced Salary</th><th>Advanced Salary Date</th><th>Remaining Salary</th><th>Remaining Salary Date</th><th>Description</th></tr>";

            // Output data of each row from salary history
            while ($salary_row = $salaryresult->fetch_assoc()) {
                $output .= "<tr>";
                $output .= "<td>" . $salary_row["Employee_Name"] . "</td>";
                $output .= "<td>" . $salary_row["Last_name"] . "</td>";
                $output .= "<td>" . $salary_row["Salary"] . "</td>";
                $output .= "<td>" . $salary_row["Advanced_Salary"] . "</td>";
                $output .= "<td>" . $salary_row["Advanced_Salary_Date"] . "</td>";
                $output .= "<td>" . $salary_row["Ramaining_Salary"] . "</td>";
                $output .= "<td>" . $salary_row["Ramaining_Salary_Date"] . "</td>";
                $output .= "<td>" . $salary_row["Description"] . "</td>";
                $output .= "</tr>";
            }

            $output .= "</table></td></tr>";
        } else {
            $output .= "<tr><td colspan='8'>No results found for employee salary</td></tr>";
        }
    }
} else {
    $output .= "<tr><td colspan='12'>No results found for employee</td></tr>";
}

echo $output;

$conn->close();
?>
